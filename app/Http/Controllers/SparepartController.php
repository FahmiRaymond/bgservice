<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sparepart;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sparepart.index');
    }

    public function listData()
    {
        $sparepart = Sparepart::orderBy('id_sparepart', 'desc')->get();
        $no = 0;
        $data = array();
        foreach($sparepart as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_barang;
            $row[] = "Rp. ".format_uang($list->harga);
            $row[] = '<div class="btn-group">
                        <a onclick="editForm('.$list->id_sparepart.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                        <a onclick="deleteData('.$list->id_sparepart.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
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
        $sparepart = new Sparepart;
        $sparepart->nama_barang = $request['nama_barang'];
        $sparepart->harga = $request['harga'];
        $sparepart->save();
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
        $sparepart = Sparepart::find($id);
        echo json_encode($sparepart);
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
        $sparepart = Sparepart::find($id);
        $sparepart->nama_barang = $request['nama_barang'];
        $sparepart->harga = $request['harga'];
        $sparepart->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sparepart = Sparepart::find($id);
        $sparepart->delete();
    }
}