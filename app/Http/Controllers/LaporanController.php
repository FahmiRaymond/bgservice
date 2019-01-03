<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servisan;
use App\Garansi;
use App\Merk;
use App\Status;
use App\Sparepart;
use App\Laporan;

class LaporanController extends Controller
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
        $laporan = Laporan::all();
        return view('laporan.index', compact('merk', 'status'));
    }

    public function listData()
    {
        $laporan = Laporan::leftJoin('merk', 'merk.id_merk', '=', 'laporan.id_merk')
        ->leftJoin('status', 'status.id_status', '=', 'laporan.id_status')
        ->orderBy('laporan.id_laporan', 'desc')->get();
        $no = 0;
        $data = array();
        foreach($laporan as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->id_laporan;
            $row[] = $list->tanggal;
            $row[] = $list->pemilik;
            $row[] = "<i>".$list->nama_merk." ".$list->model."</i>";
            $row[] = $list->kerusakan;
            $row[] = "Rp. ".format_uang($list->biaya);
            $row[] = "Rp. ".format_uang($list->harga);
            $row[] = "Rp. ".format_uang($list->laba);
            $row[] = "<div class='btn-group'>
                    <a onclick='showForm(".$list->id_laporan.")' class='btn btn-default btn-sm'><i class='fa fa-eye'></i></a>
                    <a onclick='editForm(".$list->id_laporan.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                    <a onclick='deleteData(".$list->id_laporan.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
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
    public function create($id)
    {
        $servisan = Servisan::all();
        $servisan = Servisan::find($id);
        $sparepart = Sparepart::all();
        $merk = Merk::all();
        $status = Status::all();
        return view('laporan.create', compact('servisan', 'merk', 'status', 'sparepart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $laporan = new Laporan;
        $laporan->tanggal = $request['tanggal'];
        $laporan->id_status = $request['status'];
        $laporan->pemilik = $request['pemilik'];
        $laporan->telepon = $request['telepon'];
        $laporan->id_merk = $request['merk'];
        $laporan->model = $request['model'];
        $laporan->no_imei = $request['no_imei'];
        $laporan->kerusakan = $request['kerusakan'];
        $laporan->biaya = $request['biaya'];
        $laporan->id_sparepart = $request['id_sparepart'];
        $laporan->nama_barang = $request['nama_barang'];
        $laporan->harga = $request['harga'];
        $laporan->laba = $request['laba'];
        $laporan->keterangan = $request['keterangan'];
        $laporan->save();

        $servisan = Servisan::find($id);
        $servisan->id_status = 4;
        $servisan->update();

        return redirect()->route('servisan.index');
    }

    public function track($id)
    {
        $garansi = Garansi::all();
        $garansi = Garansi::find($id);
        $sparepart = Sparepart::all();
        $merk = Merk::all();
        $status = Status::all();
        return view('laporan.track', compact('garansi', 'merk', 'status', 'sparepart'));
    }

    public function commit(Request $request, $id)
    {
        $laporan = new Laporan;
        $laporan->tanggal = $request['tanggal'];
        $laporan->id_status = $request['status'];
        $laporan->pemilik = $request['pemilik'];
        $laporan->telepon = $request['telepon'];
        $laporan->id_merk = $request['merk'];
        $laporan->model = $request['model'];
        $laporan->no_imei = $request['no_imei'];
        $laporan->kerusakan = $request['kerusakan'];
        $laporan->biaya = $request['biaya'];
        $laporan->id_sparepart = $request['id_sparepart'];
        $laporan->nama_barang = $request['nama_barang'];
        $laporan->harga = $request['harga'];
        $laporan->laba = $request['laba'];
        $laporan->keterangan = $request['keterangan'];
        $laporan->save();

        $garansi = Garansi::find($id);
        $garansi->id_status = 4;
        $garansi->update();

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
        $laporan = Laporan::find($id);
        echo json_encode($laporan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = Laporan::find($id);
        echo json_encode($laporan);
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
        $laporan = Laporan::find($id);
        $laporan->tanggal = $request['tanggal'];
        $laporan->id_status = $request['status'];
        $laporan->pemilik = $request['pemilik'];
        $laporan->telepon = $request['telepon'];
        $laporan->id_merk = $request['merk'];
        $laporan->model = $request['model'];
        $laporan->no_imei = $request['no_imei'];
        $laporan->kerusakan = $request['kerusakan'];
        $laporan->biaya = $request['biaya'];
        $laporan->id_sparepart = $request['id_parepart'];
        $laporan->nama_barang = $request['nama_barang'];
        $laporan->harga = $request['harga'];
        $laporan->laba = $request['laba'];
        $laporan->keterangan = $request['keterangan'];
        $laporan->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();
    }
}
