<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Speed;
use App\Models\Vip;

class SpeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage =  isset($_GET["perPage"]) ? $_GET["perPage"] : 10;
        $accounts = Speed::orderBy("type", "desc")->orderBy("value", "desc")->paginate($perPage);

        $response = [
            'pagination' => [
                'total'        => $accounts->total(),
                'per_page'     => $accounts->perPage(),
                'current_page' => $accounts->currentPage(),
                'last_page'    => $accounts->lastPage(),
                'from'         => $accounts->firstItem(),
                'to'           => $accounts->lastItem()
            ],
            'data' => $accounts
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
            'type'    => 'required',
            'value'    => 'required'
        ]);
        
        $create = new Speed;
        $create->type = $request->type;
        $create->value = $request->value;
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
            'type'    => 'required',
            'value'    => 'required'
        ]);
        
        $edit = Speed::find($id);
        $edit->type = $request->type;
        $edit->value = $request->value;
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
        if ($this->checkUse($id)) {
            return response()->json(array('error' => true, 'message' => 'Speed đang được sử dụng'));
        } 

        Speed::find($id)->delete();
        
        return response()->json(array('error' => false, 'message' => 'Xóa thành công'));
    }

    private function checkUse($id) 
    {
        $vipList = Vip::getVipBySpeed($id);
        return sizeof($vipList) > 0;
    }
}
