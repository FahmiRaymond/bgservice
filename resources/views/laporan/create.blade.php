@extends('layouts.app')

@section('title')
Tambah Data Laporan
@endsection

@section('breadcrumb')
@parent
<li>Laporan</li>
<li>Tambah</li>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Tambah Data Laporan</h4>
                </div>

                <div class="panel-body">
                    <form action="{{ route('laporan.store', $servisan) }}" class="form-horizontal" role="form" method="POST"
                        }}>
                        {{ csrf_field() }} {{method_field('POST')}}
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="tanggal" class="control-label col-sm-6">Tanggal :</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $servisan->tanggal }}"
                                        readonly oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label for="status" class="control-label col-sm-5">Status :</label>
                                <div class="col-sm-7">
                                    <select name="status" id="status" type="text" class="form-control pull-right"
                                        readonly>
                                        @foreach($status as $list)
                                        <option value="{{ $list->id_status }}" @if ($list->id_status ===
                                            $servisan->id_status)
                                            selected
                                            @endif
                                            >{{ $list->nama_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pemilik" class="control-label col-sm-3">Pemilik :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pemilik" name="pemilik" value="{{ $servisan->pemilik }}"
                                    autofocus readonly oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telepon" class="control-label col-sm-3">Telepon :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="telepon" name="telepon" readonly value="{{ $servisan->telepon }}"
                                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="merk" class="control-label col-sm-3">Merk :</label>
                            <div class="col-sm-8">
                                <select name="merk" id="merk" type="text" class="form-control" readonly>
                                    @foreach($merk as $list)
                                    <option value="{{ $list->id_merk }}" @if ($list->id_merk === $servisan->id_merk)
                                        selected
                                        @endif
                                        >{{ $list->nama_merk }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="model" class="control-label col-sm-3">Model :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="model" name="model" readonly value="{{ $servisan->model }}"
                                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_imei" class="control-label col-sm-3">Imei :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="no_imei" name="no_imei" value="{{ $servisan->no_imei }}"
                                    readonly>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kerusakan" class="control-label col-sm-3">Kerusakan :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kerusakan" name="kerusakan" readonly value="{{ $servisan->kerusakan }}"
                                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="biaya" class="control-label col-sm-3">Biaya :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="biaya" name="biaya" onkeyup="total();" value="{{ $servisan->biaya }}">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sparepart" class="control-label col-sm-3">Sparepart :</label>
                            <div class="col-sm-8">
                                <div class="col-sm-1">
                                    <a onclick="showForm()" class="btn btn-default">pilih</a>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-sm-3">
                                        <label for="id_sparepart" class="control-label">ID</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="id_sparepart" name="id_sparepart"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-3">
                                        <label for="nama_barang" class="control-label">nama</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-3">
                                        <label for="harga" class="control-label">harga</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="harga" name="harga" onkeyup="total();"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="laba" class="control-label col-sm-3" >Laba :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="laba" name="laba" readonly value="{{ $servisan->biaya }}"
                                required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="control-label col-sm-3">Keterangan :</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $servisan->keterangan }}"></textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" >Simpan</button>
                                <a href="{{ url('servisan') }}" class="btn btn-warning">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@include('laporan.sparepart')
{{-- @include('laporan.form') --}}
@endsection

@section('script')
<script type="text/javascript">
var table, save_method, tanggal;
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd = '0'+dd
    } 
    if(mm<10) {
        mm = '0'+mm
    } 
    today = yyyy + '-' + mm + '-' + dd;

$("#tanggal").val(today);

$('.tabel-sparepart').DataTable();


function showForm(){
    $('#modal-sparepart').modal('show');
}

function selectItem(id){
    $.ajax({
        url: "/sparepart/" + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            $('#modal-sparepart').modal('hide');

            $('#id_sparepart').val(data.id_sparepart);
            $('#nama_barang').val(data.nama_barang);
            $('#harga').val(data.harga).attr('readonly', false);
            var nbiaya = $("#biaya").val();
            var nharga = $("#harga").val();
            laba = nbiaya - nharga;
            $("#laba").val(laba);

        },
        error: function () {
            alert("Tidak dapat menampilkan data!");
        }
    });
}

function total() {
    var nbiaya = $("#biaya").val();
    var nharga = $("#harga").val();
    laba = nbiaya - nharga;
    
    $("#laba").val(laba);
}

</script>
@endsection
