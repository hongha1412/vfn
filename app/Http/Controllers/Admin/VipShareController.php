<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VipShare;

class VipShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage =  isset($_GET["perPage"]) ? $_GET["perPage"] : 12;
        $q = isset($_GET["q"]) ? $_GET["q"] : "";
        $vipShares = isset($_GET["q"])
            ? VipShare::where("name", 'like', '%'.$q.'%')->paginate($perPage)
            : VipShare::paginate($perPage);
        
        $response = [
            'pagination' => [
                'total'        => $vipShares->total(),
                'per_page'     => $vipShares->perPage(),
                'current_page' => $vipShares->currentPage(),
                'last_page'    => $vipShares->lastPage(),
                'from'         => $vipShares->firstItem(),
                'to'           => $vipShares->lastItem()
            ],
            'data' => $vipShares
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
        //
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
            'idfb'    => 'required',
            'name'    => 'required'
        ]);

        $edit = VipShare::find($id)->update($request->all());

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
        VipShare::find($id)->delete();
        return response()->json(['done']);
    }
}
