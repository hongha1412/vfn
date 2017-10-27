<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Token;

class TokenController extends Controller
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
        $tokens = isset($_GET["q"])
                ? Token::where("ten", 'like', '%'.$q.'%')->paginate($perPage)
                : Token::paginate($perPage);

        $response = [
            'pagination' => [
                'total'        => $tokens->total(),
                'per_page'     => $tokens->perPage(),
                'current_page' => $tokens->currentPage(),
                'last_page'    => $tokens->lastPage(),
                'from'         => $tokens->firstItem(),
                'to'           => $tokens->lastItem()
            ],
            'data' => $tokens
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
            'idfb'    => 'required',
            'ten'    => 'required',
            'token'    => 'required'
        ]);
        
        $create = new Token;
        $create->idfb = $request->idfb;
        $create->ten = $request->ten;
        $create->token = $request->token;
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
        return response()->json(Token::find($id));
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
            'ten'    => 'required',
            'token'    => 'required'
        ]);
        
        $edit = Token::find($id);
        $edit->idfb = $request->idfb;
        $edit->ten = $request->ten;
        $edit->token = $request->token;
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
        Token::find($id)->delete();
        
        return response()->json(array('error' => false, 'message' => 'Xóa token thành công'));
    }

    public function destroyMultiple(Request $request) {
        if (sizeof($request->ids) <=0) {
            return response()->json(array('error' => true, 'message' => 'Vui lòng chọn token cần xóa!')); 
        }
        Token::destroy($request->ids);
        return response()->json(array('error' => false, 'message' => 'Xóa token thành công'));
    }
}
