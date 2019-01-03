@extends('layouts.app')

@section('title')
Tambah Data Garansi
@endsection

@section('breadcrumb')
@parent
<li>Garansi</li>
<li>Tambah</li>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Tambah Data Garansi</h4>
                </div>

                <div class="panel-body">
                    <form action="{{ route('garansi.store') }}" class="form-horizontal" role="form" method="POST"
                        }}>
                        {{ csrf_field() }} {{method_field('POST')}}
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="tanggal" class="control-label col-sm-6">Tanggal :</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tanggal" name="tanggal"
                                        readonly oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label for="status" class="control-label col-sm-5">Status :</label>
                                <div class="col-sm-7">
                                    <select name="status" id="status" type="text" class="form-control pull-right">
                                        @foreach($status as $list)
                                        <option value="{{ $list->id_status }}">{{ $list->nama_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sparepart" class="control-label col-sm-3">ID Servisan :</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a onclick="showForm()" class="btn btn-default">pilih</a>
                                    </span>
                                    <input type="text" class="form-control" id="id_servisan" name="id_servisan" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pemilik" class="control-label col-sm-3">Pemilik :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pemilik" name="pemilik"
                                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telepon" class="control-label col-sm-3">Telepon :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="telepon" name="telepon"
                                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="merk" class="control-label col-sm-3">Merk :</label>
                            <div class="col-sm-8">
                                <select name="merk" id="merk" type="text" class="form-control pull-right">
                                    @foreach($merk as $list)
                                    <option value="{{ $list->id_merk }}">{{ $list->nama_merk }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="model" class="control-label col-sm-3">Model :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="model" name="model"
                                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_imei" class="control-label col-sm-3">Imei :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="no_imei" name="no_imei">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kerusakan" class="control-label col-sm-3">Kerusakan :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kerusakan" name="kerusakan"
                                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="control-label col-sm-3">Keterangan :</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" >Simpan</button>
                                <a href="{{ url('garansi') }}" class="btn btn-warning">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@include('garansi.servisan')
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

$('.tabel-servisan').DataTable({
    "order": [[ 6, "asc" ]]
});

function showForm(){
    $('#modal-servisan').modal('show');
}

function selectItem(id){
    $.ajax({
        url: "/servisan/" + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            $('#modal-servisan').modal('hide');

            $('#id_servisan').val(data.id_servisan);
            $('#pemilik').val(data.pemilik);
            $('#telepon').val(data.telepon);
            $('#merk').val(data.id_merk);
            $('#model').val(data.model);
            $('#no_imei').val(data.no_imei);
            $('#kerusakan').val(data.kerusakan);
            $('#telepon').val(data.telepon);
        },
        error: function () {
            alert("Tidak dapat menampilkan data!");
        }
    });
}

</script>
@endsection
