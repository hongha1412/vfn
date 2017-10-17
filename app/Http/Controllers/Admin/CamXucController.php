<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CamXuc;
use App\Models\RawToken;

class CamXucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage =  isset($_GET["perPage"]) ? $_GET["perPage"] : 10;
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $offset = ($page-1) * $perPage;
        $q = isset($_GET["q"]) ? $_GET["q"] : "";

        $camXucs = CamXuc::paginate($perPage);
        $camXucsLimit = isset($_GET["q"])
            ? CamXuc::where("fullname", "LIKE", "%".$q."%")->limit($perPage)->offset($offset)->get()
            : CamXuc::limit($perPage)->offset($offset)->get();

        $response = [
            'pagination' => [
                'total'        => $camXucs->total(),
                'per_page'     => $camXucs->perPage(),
                'current_page' => $camXucs->currentPage(),
                'last_page'    => $camXucs->lastPage(),
                'from'         => $camXucs->firstItem(),
                'to'           => $camXucs->lastItem()
            ],
            'data' => $this->getFbByToken($camXucsLimit)
        ];

        return response()->json($response);
    }

    private function getFbByToken($items) {
        $result = [];
        $tokens = RawToken::getAccessTokeList();
        foreach  ($items as $item) {
            if(sizeof($tokens) == 0) {
                $live = "<button class='btn btn-rounded btn-xs btn-danger'><i class='fa fa-times'></i> <b>Token Die</b></button>";
            } else {
                $tokensArray = collect($tokens)->toArray();
                if (in_array($item->access_token, $tokensArray)) {
                    $live = "<button class='btn btn-rounded btn-xs btn-danger'><i class='fa fa-times'></i> <b>Token Die</b></button>";
                } else {
                    $live = "<button class='btn btn-rounded btn-xs btn-success'><i class='fa fa-check'></i> <b>Hoạt Động</b></button>";
                }
            }
            $item["live"] = $live;
            array_push($result, $item);
        }

        return $result;
    }

    private function getDataFromUrl($url) {
        $file = file_get_contents($url, true);
        return json_decode($file);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CamXuc::find($id)->delete();
        return response()->json(['done']);
    }
}
