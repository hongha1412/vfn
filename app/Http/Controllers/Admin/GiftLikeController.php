<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GiftLike;

class GiftLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage =  isset($_GET["perPage"]) ? $_GET["perPage"] : 10;
        $giftcodes = GiftLike::orderBy("amount", "desc")->paginate($perPage);

        $response = [
            'pagination' => [
                'total'        => $giftcodes->total(),
                'per_page'     => $giftcodes->perPage(),
                'current_page' => $giftcodes->currentPage(),
                'last_page'    => $giftcodes->lastPage(),
                'from'         => $giftcodes->firstItem(),
                'to'           => $giftcodes->lastItem()
            ],
            'data' => $giftcodes
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount'    => 'required'
        ]);
        
        $timegift = time() + $request->amount * 24 * 3600;
        $ends = date('d/m/Y', $timegift);

        $create = new GiftLike;
        $create->giftcode = $this->randGiftCode();
        $create->time = $timegift;
        $create->amount = $request->amount;
        $create->save();

        return response()->json($create);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return GiftCode::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'amount'    => 'required'
        ]);
        
        $timegift = time() + $request->amount * 24 * 3600;
        $ends = date('d/m/Y', $timegift);

        $edit = GiftLike::find($id);
        $edit->time = $timegift;
        $edit->amount = $request->amount;
        $edit->save();

        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GiftCode::find($id)->delete();
        return response()->json(['done']);
    }

    private function randGiftCode($length = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ9876543210';
        $charactersLength = strlen($characters);
        $randomString = 'VIPFBNOW';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
