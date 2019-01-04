<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servisan;
use App\Garansi;
use App\Merk;
use App\Status;
use App\Sparepart;
use App\Laporan;
use PDF;
use Dompdf\Dompdf;
use Redirect;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = date('m');
        $year = date('Y');
        $merk = Merk::all();
        $status = Status::all();
        return view('laporan.index', compact('merk', 'status', 'month', 'year'));
    }

    public function getData($year, $month){
        $year = $year;
        $month = $month;
        
        $laporan = Laporan::leftJoin('merk', 'merk.id_merk', '=', 'laporan.id_merk')
        ->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
        $no = 0;
        $data = array();
        $total_pendapatan = 0;
        $pendapatan = Laporan::whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('laba');
        $total_pendapatan += $pendapatan;
            foreach($laporan as $list){
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $list->tanggal;
                $row[] = $list->pemilik;
                $row[] = $list->nama_merk." ".$list->model;
                $row[] = $list->kerusakan;
                $row[] = "Rp. ".format_uang($list->biaya);
                $row[] = "Rp. ".format_uang($list->harga);
                $row[] = "Rp. ".format_uang($list->laba);
                $data[] = $row;
            }
        $data[] = array("","","","","","","Margin :","Rp. ".format_uang($total_pendapatan));

        return $data;
    }

    public function listData($year, $month)
    {
        $data = $this->getData($year, $month);

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function refresh(Request $request)
    {
        $year = $request['year'];
        $month = $request['month'];
        return view('laporan.index', compact('month', 'year')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function exportPDF($year, $month){
        $year = $year;
        $month = $month;
        $data = $this->getData($year, $month);

        $pdf = PDF::loadView('laporan.pdf', compact('year', 'month', 'data'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();
    }

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
