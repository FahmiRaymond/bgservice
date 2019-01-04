<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servisan;
use App\Merk;
use App\Status;
use DataTables;
use PDF;
use Dompdf\Dompdf;
use Redirect;

class ServisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::all();
        $status = Status::all();
        return view('servisan.index', compact('merk', 'status'));
    }

    public function listData()
    {
        $servisan = Servisan::leftJoin('merk', 'merk.id_merk', '=', 'servisan.id_merk')
        ->leftJoin('status', 'status.id_status', '=', 'servisan.id_status')
        ->orderBy('servisan.id_servisan', 'desc')->get();
        $no = 0;
        $data = array();
        foreach($servisan as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->id_servisan;
            $row[] = $list->tanggal;
            $row[] = $list->pemilik;
            $row[] = $list->telepon;
            $row[] = "<i>".$list->nama_merk." ".$list->model."</i>";
            $row[] = $list->kerusakan;
            $row[] = "<b>".$list->nama_status."</b>";;
            $row[] = "<div class='btn-group'>
                    <a onclick='showForm(".$list->id_servisan.")' class='btn btn-default btn-sm'><i class='fa fa-eye'></i></a>
                    <a onclick='editForm(".$list->id_servisan.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                    <a href=' /servisan/$list->id_servisan/notapdf' class='btn btn-warning btn-sm'><i class='fa fa-print'></i></a>
                    <a onclick='deleteData(".$list->id_servisan.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
                    <a href=' /laporan/$list->id_servisan/create' class='btn btn-success btn-sm'> ambil </a></div>";
            $data[] = $row;
        }
        
        return Datatables::of($data)->escapeColumns([])->make(true);
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
        $servisan = new Servisan;
        $servisan->tanggal = $request['tanggal'];
        $servisan->id_status = $request['status'];
        $servisan->pemilik = $request['pemilik'];
        $servisan->telepon = $request['telepon'];
        $servisan->id_merk = $request['merk'];
        $servisan->model = $request['model'];
        $servisan->no_imei = $request['no_imei'];
        $servisan->kerusakan = $request['kerusakan'];
        $servisan->biaya = $request['biaya'];
        $servisan->keterangan = $request['keterangan'];
        $servisan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servisan = Servisan::find($id);
        echo json_encode($servisan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servisan = Servisan::find($id);
        echo json_encode($servisan);
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
        $servisan = Servisan::find($id);
        $servisan->tanggal = $request['tanggal'];
        $servisan->pemilik = $request['pemilik'];
        $servisan->telepon = $request['telepon'];
        $servisan->id_merk = $request['merk'];
        $servisan->model = $request['model'];
        $servisan->no_imei = $request['no_imei'];
        $servisan->kerusakan = $request['kerusakan'];
        $servisan->biaya = $request['biaya'];
        $servisan->keterangan = $request['keterangan'];
        $servisan->id_status = $request['status'];
        $servisan->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servisan = Servisan::find($id);
        $servisan->delete();
    }

    public function notaPDF(Servisan $servisan)
    {   
        $merk = Merk::all();
        $setting = $servisan;
        $pdf = PDF::loadView('servisan.notapdf', compact('servisan','merk'));
        $pdf->setPaper(array(0,0,650,390), 'potrait');      
        return $pdf->stream();
    }
}
