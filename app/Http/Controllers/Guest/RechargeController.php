<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Common\Message;
use App\Models\Account;
use App\Models\LogCard;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class RechargeController extends Controller
{
    public function index()
    {
        return view('guest.recharge.index');
    }

    public function process(Request $request)
    {
        // Generate transaction id
        $transid = rand() . '_' . env('PARTNER_ID');

        // Get provider code
        switch (Input::get('provider')) {
            case 'VIETTEL':
                $provider = 'VTT';
                break;
            case 'MOBI':
                $provider = 'VMS';
                break;
            case 'GATE':
                $provider = 'FPT';
                break;
            case 'VTC':
                $provider = 'VTC';
                break;
            case 'VINA':
                $provider = 'VNP';
                break;
            default:
                $provider = '';
        }

        // Check valid data
        $validator = Validator::make($request->all(), [
            'provider' => 'required|string|max:32',
            'seri' => 'required|string|max:100',
            'pin' => 'required|string|max:100',
            'username' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response((new Message(false, $validator->messages()->all()))->toJson(), 200);
        }
        if ($provider == '') {
            return response((new Message(false, 'Provider not valid'))->toJson(), 200);
        }

        // Create post fields
        $fields = array(
            'partnerId' => env('PARTNER_ID'),
            'telco' => $provider,
            'serial' => Input::get('seri'),
            'cardcode' => Input::get('pin'),
            'transId' => $transid,
            'key' => $this->signature_hash($provider, Input::get('seri'), Input::get('pin'), $transid)
        );

        // Create guzzle object
        $client = new Client(['base_uri' => 'http://mpay123.com/']);
        // Param build
        $data = [];
        $data['form_params'] = $fields;
        $data['headers']['content-type'] = 'application/x-www-form-urlencoded';

        // Get response
        $response = $client->request('POST', 'CardCharge.ashx', $data);
        $result = json_decode($response->getBody()->getContents());

        // Get recharge user info
        $rechargeUser = null;
        if (env('ENABLE_GIFT')) {
            $rechargeUser = Account::getIdByUsername(Input::get('username'));
        } else {
            $rechargeUser = Auth::user();
        }

        // Process invalid recharge user id
        if ($rechargeUser == null) {
            return response((new Message(false, 'Cannot retrieve user id from given username'))->toJson(), 200);
        }

        // Process result data
        if ($result->ResCode == 1) {
            // Save log
            LogCard::create([
                'userid' => Auth::id(),
                'receive_userid' => $rechargeUser->id,
                'telco' => Input::get('provider'),
                'serial' => Input::get('seri'),
                'cardcode' => Input::get('pin'),
                'amount' => $result->Amount * 1000,
                'price' => $result->Price,
                'transid' => $result->TransId,
            ]);

            // Add funds to user account
            $rechargeUser->vnd += $result->Amount;
            $rechargeUser->save();
        }

        return response((new Message(($result->ResCode == 1), $result->Message))->toJson(), 200);
    }

    /**
     * Create api key hash string
     *
     * @param $telco provider code
     * @param $serial card serial
     * @param $cardCode card pin code
     * @param $transid transaction id
     * @return string hashed string key
     */
    private function signature_hash($telco, $serial, $cardCode, $transid)
    {
        return md5(env('PARTNER_ID') . '-' . env('PARTNER_SECRET') . '-' . $telco . '-' . $serial . '-' . $cardCode . '-' . $transid);
    }

    /**
     * Get recharge log by logged in user
     *
     * @return list recharge log
     */
    public function getRechargeLog()
    {
        $lsLog = LogCard::getLogByUserId(Auth::id());
        return response((new Message(true, json_encode($lsLog)))->toJson(), 200);
    }
}
