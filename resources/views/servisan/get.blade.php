@extends('layouts.app')
@section('title')
Daftar Servisan
@endsection

@section('breadcrumb')
@parent
<li>Servisan</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Tambah Data Servisan</h4>
                </div>

                <div class="panel-body">
                    <form action="{{ route('servisan.update', $servisan->id) }}" class="form-horizontal" role="form"
                        method="POST" }}>
                        {{ csrf_field() }} {{method_field('PATCH')}}

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="kode_hp" class="col-md-3 control-label">Kode HP</label>
                            <div class="col-md-6">
                                <input id="kode_hp" type="number" class="form-control" name="kode_hp" value="{{ $servisan->kode_hp }}"
                                    autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pemilik" class="col-md-3 control-label">Pemilik</label>
                            <div class="col-md-6">
                                <input id="pemilik" type="text" class="form-control" name="pemilik" value="{{ $servisan->pemilik }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_hp" class="col-md-3 control-label">Nomor HP</label>
                            <div class="col-md-6">
                                <input id="no_hp" type="number" class="form-control" name="no_hp" value="{{ $servisan->no_hp }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="merk" class="col-md-3 control-label">Merk</label>
                            <div class="col-md-6">
                                <select name="merk_id" id="merk_id" type="text" class="form-control" required>
                                    @foreach($merk as $list)
                                    <option value="{{ $list->id }}" @if ($list->id === $servisan->merk_id)
                                        selected
                                        @endif
                                        >{{ $list->nama_merk }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="model" class="col-md-3 control-label">Model</label>
                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control" name="model" value="{{ $servisan->model }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_imei" class="col-md-3 control-label">IMEI</label>
                            <div class="col-md-6">
                                <input id="no_imei" type="number" class="form-control" name="no_imei" value="{{ $servisan->no_imei }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kerusakan" class="col-md-3 control-label">Kerusakan</label>
                            <div class="col-md-6">
                                <input id="kerusakan" type="text" class="form-control" name="kerusakan" value="{{ $servisan->kerusakan }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="biaya" class="col-md-3 control-label">Biaya</label>
                            <div class="col-md-6">
                                <input id="biaya" type="text" class="form-control" name="biaya" value="{{ $servisan->biaya }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                            <div class="col-md-6">
                                <textarea id="keterangan" type="text" class="form-control" name="keterangan" value="{{ $servisan->keterangan }}"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('servisan') }}" class="btn btn-warning">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
