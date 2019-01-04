@extends('layouts.app')
@section('title')
Daftar Garansi
@endsection

@section('breadcrumb')
@parent
<li>Garansi</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="col-sm-8">
                    <h3>Data Garansi</h3>
                </div>
                <div class="col-sm-2 col-sm-offset-2">
                    <h3>
                        <a href="{{ route('garansi.create')}}" class="btn btn-warning pull-right">
                            <span><i class="fa fa-plus"></i> Garansi</span>
                        </a>
                    </h3>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="3">No</th>
                            <th width="5">ID</th>
                            <th>Tanggal</th>
                            <th>Pemilik</th>
                            <th>telepon</th>
                            <th>Model</th>
                            <th>Kerusakan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('garansi.form')
@endsection

@section('script')
<script type="text/javascript">
    var table, save_method;
    $(function () {
        table = $('.table').DataTable({
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "{{ route('garansi.data') }}",
                "type": "GET"
            },
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false
            }],
            'order': [2, 'desc']
        });  
        
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == "add") url = "{{ route('garansi.store') }}";
                else url = "garansi/" + id;

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
            url: "garansi/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Data garansi');
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
            url: "garansi/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Garansi');
                $('.modal-footer').show();

                $('#id').val(data.id_garansi);
                $('#tanggal').val(data.tanggal).attr('readonly', false);
                $('#status').val(data.id_status).attr('readonly', false);
                $('#pemilik').val(data.pemilik).attr('readonly', false);
                $('#telepon').val(data.telepon).attr('readonly', false);
                $('#merk').val(data.id_merk).attr('readonly', false);
                $('#model').val(data.model).attr('readonly', false);
                $('#no_imei').val(data.no_imei).attr('readonly', false);
                $('#kerusakan').val(data.kerusakan).attr('readonly', false);
                $('#biaya').val(data.biaya).attr('readonly', false);
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
                url: "garansi/" + id,
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
