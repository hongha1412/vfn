<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Vip;
use App\Enum\PackageType;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage =  isset($_GET["perPage"]) ? $_GET["perPage"] : 10;
        $accounts = Package::orderBy("type", "desc")->orderBy("total", "desc")->paginate($perPage);

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findAll()
    {
        return response()->json(Package::orderBy("type", "desc")->orderBy("total", "desc")->get());
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
            'total'    => 'required'
        ]);
        
        $create = new Package;
        $create->type = $request->type;
        $create->total = $request->total;
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
            'total'    => 'required'
        ]);
        
        $edit = Package::find($id);
        $edit->type = $request->type;
        $edit->total = $request->total;
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
            return response()->json(array('error' => true, 'message' => 'Package đang được sử dụng'));
        } 

        Package::find($id)->delete();
        
        return response()->json(array('error' => false, 'message' => 'Xóa package thành công'));
    }

    private function checkUse($id) 
    {
        $vipList = Vip::getVipByPackage($id);
        return sizeof($vipList) > 0;
    }
}
