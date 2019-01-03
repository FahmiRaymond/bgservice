@extends('layouts.app')
@section('title')
Daftar Laporan
@endsection

@section('breadcrumb')
@parent
<li>Laporan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="col-sm-8">
                    <h3>Laporan</h3>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="2">No</th>
                            <th width="5">Kode</th>
                            <th>Tanggal</th>
                            <th>Pemilik</th>
                            <th>model</th>
                            <th>kerusakan</th>
                            <th>Biaya</th>
                            <th>Sparepart</th>
                            <th>Laba</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('laporan.form')
@endsection
@section('script')
<script type="text/javascript">
    var table;
    $(function () {
        table = $('.table').DataTable({
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "{{ route('laporan.data') }}",
                "type": "GET"
            },
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false
            }],
            'order': [1, 'desc']
        });

        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                url = "laporan/" + id;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#modal-form form').serialize(),
                    
                    success: function (data) {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    },
                    error: function () {
                        alert("Tidak dapat menyimpan data!");
                    }
                });
                return false;
            }
        });
    });

    function showForm(id) {   
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "laporan/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Data laporan');
                $('.modal-footer').hide();

                $('#id').val(data.id_garansi);
                $('#tanggal').val(data.tanggal).attr('readonly', true);
                $('#status').val(data.id_status).attr('readonly', true);
                $('#pemilik').val(data.pemilik).attr('readonly', true);
                $('#telepon').val(data.telepon).attr('readonly', true);
                $('#merk').val(data.id_merk).attr('readonly', true);
                $('#model').val(data.model).attr('readonly', true);
                $('#no_imei').val(data.no_imei).attr('readonly', true);
                $('#kerusakan').val(data.kerusakan).attr('readonly', true);
                $('#biaya').val(data.biaya).attr('readonly', true);
                $('#id_sparepart').val(data.id_sparepart).attr('readonly', true);
                $('#nama_barang').val(data.nama_barang).attr('readonly', true);
                $('#harga').val(data.harga).attr('readonly', true);
                $('#laba').val(data.laba).attr('readonly', true);
                $('#keterangan').val(data.keterangan).attr('readonly', true);

            },
            error: function () {
                alert("Tidak dapat menampilkan data!");
            }
        });
    }

    function editForm(id) {
        save_method = "edit";
        $('#modal-form form')[0].reset();
        $('input[name=_method]').val('PATCH');
        $.ajax({
            url: "laporan/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Garansi');
                $('.modal-footer').show();

                $('#id').val(data.id_laporan);
                $('#tanggal').val(data.tanggal).attr('readonly', false);
                $('#status').val(data.id_status).attr('readonly', false);
                $('#pemilik').val(data.pemilik).attr('readonly', false);
                $('#telepon').val(data.telepon).attr('readonly', false);
                $('#merk').val(data.id_merk).attr('readonly', false);
                $('#model').val(data.model).attr('readonly', false);
                $('#no_imei').val(data.no_imei).attr('readonly', false);
                $('#kerusakan').val(data.kerusakan).attr('readonly', false);
                $('#biaya').val(data.biaya).attr('readonly', false);
                $('#id_sparepart').val(data.id_sparepart).attr('readonly', false);
                $('#nama_barang').val(data.nama_barang).attr('readonly', false);
                $('#harga').val(data.harga).attr('readonly', false);
                $('#laba').val(data.laba).attr('readonly', false);
                $('#keterangan').val(data.keterangan).attr('readonly', false);
            },
            error: function () {
            alert("Tidak dapat menampilkan data!");
            }
        });
    }

    function deleteData(id) {
        if (confirm("Apakah yakin data akan dihapus?")) {
            $.ajax({
                url: "laporan/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                success: function (data) {
                    table.ajax.reload();
                },
                error: function () {
                    alert("Tidak dapat menghapus data!");
                }
            });
        }
    }
</script>
@endsection