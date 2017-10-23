<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Price;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage =  isset($_GET["perPage"]) ? $_GET["perPage"] : 10;
        $accounts = Price::orderBy("package", "desc")->orderBy("vnd", "desc")->paginate($perPage);

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
            'vnd'    => 'required',
            'package'    => 'required',
            'daypackage'    => 'required',
        ]);
        
        $create = new Price;
        $create->type = $request->type;
        $create->vnd = $request->vnd;
        $create->package = $request->package;
        $create->daypackage = $request->daypackage;
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
            'vnd'    => 'required',
            'package'    => 'required',
            'daypackage'    => 'required',
        ]);
        
        $price = Price::find($id);
        $price->type = $request->type;
        $price->vnd = $request->vnd;
        $price->package = $request->package;
        $price->daypackage = $request->daypackage;
        $price->save();

        return response()->json($price);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Price::find($id)->delete();
        
        return response()->json(array('error' => false, 'message' => 'Xóa thành công'));
    }
}
