<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merk;
use DataTables;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merk.index');
    }

    public function listData()
    {
        $merk = Merk::orderBy('id_merk', 'desc')->get();
        $no = 0;
        $data = array();
        foreach($merk as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_merk;
            $row[] = '<div class="btn-group">
                        <a onclick="editForm('.$list->id_merk.')" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a onclick="deleteData('.$list->id_merk.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></div>';
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
        $merk = new Merk;
        $merk->nama_merk = $request['nama_merk'];
        $merk->save();
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
        $merk = Merk::find($id);
        echo json_encode($merk);
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
        $merk = Merk::find($id);
        $merk->nama_merk = $request['nama_merk'];
        $merk->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = Merk::find($id);
        $merk->delete();
    }
}
