<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Garansi;
use App\Servisan;
use App\Merk;
use App\Status;
use DataTables;
use PDF;
use Dompdf\Dompdf;
use Redirect;

class GaransiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servisan = Servisan::all();
        $merk = Merk::all();
        $status = Status::all();
        $garansi = Garansi::all();
        return view('garansi.index', compact('servisan', 'merk', 'status'));
    }

    public function listData()
    {
        $garansi = Garansi::leftJoin('merk', 'merk.id_merk', '=', 'garansi.id_merk')
        ->leftJoin('status', 'status.id_status', '=', 'garansi.id_status')
        ->orderBy('garansi.id_garansi', 'desc')->get();
        $no = 0;
        $data = array();
        foreach($garansi as $list){
            $no ++;
            $row = array();
            $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_garansi."'>";
            $row[] = $no;
            $row[] = $list->id_garansi;
            $row[] = $list->tanggal;
            $row[] = $list->pemilik;
            $row[] = $list->telepon;
            $row[] = "<i>".$list->nama_merk." ".$list->model."</i>";
            $row[] = $list->kerusakan;
            $row[] = "<b>".$list->nama_status."</b>";;
            $row[] = "<div class='btn-group'>
                    <a onclick='showForm(".$list->id_garansi.")' class='btn btn-default btn-sm'><i class='fa fa-eye'></i></a>
                    <a onclick='editForm(".$list->id_garansi.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                    <a href=' /garansi/$list->id_garansi/notapdf' class='btn btn-warning btn-sm'><i class='fa fa-print'></i></a>
                    <a onclick='deleteData(".$list->id_garansi.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
                    <a href=' /laporan/$list->id_garansi/track' class='btn btn-success btn-sm'> ambil </a></div>";
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

        $servisan = Servisan::leftJoin('merk', 'merk.id_merk', '=', 'servisan.id_merk')
        ->leftJoin('status', 'status.id_status', '=', 'servisan.id_status')
        ->orderBy('servisan.id_servisan', 'desc')->get();
        $merk = Merk::all();
        $status = Status::all();
        return view('garansi.create', compact('servisan', 'merk', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $garansi = new Garansi;
        $garansi->tanggal = $request['tanggal'];
        $garansi->id_status = $request['status'];
        $garansi->id_servisan = $request['id_servisan'];
        $garansi->pemilik = $request['pemilik'];
        $garansi->telepon = $request['telepon'];
        $garansi->id_merk = $request['merk'];
        $garansi->model = $request['model'];
        $garansi->no_imei = $request['no_imei'];
        $garansi->kerusakan = $request['kerusakan'];
        $garansi->biaya = $request['biaya'];
        $garansi->keterangan = $request['keterangan'];
        $garansi->save();

        return redirect()->route('garansi.index');
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
        $garansi = Garansi::find($id);
        echo json_encode($garansi);
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
        $garansi = Garansi::find($id);
        $garansi->tanggal = $request['tanggal'];
        $garansi->pemilik = $request['pemilik'];
        $garansi->telepon = $request['telepon'];
        $garansi->id_merk = $request['merk'];
        $garansi->model = $request['model'];
        $garansi->no_imei = $request['no_imei'];
        $garansi->kerusakan = $request['kerusakan'];
        $garansi->biaya = $request['biaya'];
        $garansi->keterangan = $request['keterangan'];
        $garansi->id_status = $request['status'];
        $garansi->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $garansi = Garansi::find($id);
        $garansi->delete();
    }
    
    public function notaPDF(Garansi $garansi)
    {   
        $merk = Merk::all();
        $setting = $garansi;
        $pdf = PDF::loadView('garansi.notapdf', compact('garansi','merk'));
        $pdf->setPaper(array(0,0,650,390), 'potrait');      
        return $pdf->stream();
    }
}
