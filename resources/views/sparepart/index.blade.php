@extends('layouts.app')
@section('title')
Halaman Utama
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="col-sm-8">
                    <h3>Data Sparepart</h3>
                </div>
                <div class="col-sm-2 col-sm-offset-2">
                    <h3>
                        <a onclick="addForm()" class="btn btn-warning pull-right">
                            <span><i class="fa fa-plus"></i> Sparepart</span>
                        </a>
                    </h3>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="3">No</th>
                            <th width="250">Nama Barang</th>
                            <th width="60">Harga</th>
                            <th width="60">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('sparepart.form')
@endsection

@section('script')
<script type="text/javascript">
    var table, save_method;
    $(function () {
        table = $('.table').DataTable({
            "processing": true,
            "ajax": {
                "url": "{{ route('sparepart.data') }}",
                "type": "GET"
            }
        });

        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == "add") url = "{{ route('sparepart.store') }}";
                else url = "sparepart/" + id;

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

    function addForm() {
        save_method = "add";
        $('input[name= method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Data Sparepart');
        $('#kode').attr('readonly', false);
    }

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "sparepart/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Kategori');

                $('#id').val(data.id_sparepart);
                $('#nama_barang').val(data.nama_barang);
                $('#harga').val(data.harga);

            },
            error: function () {
                alert("Tidak dapat menampilkan data!");
            }
        });
    }

    function deleteData(id) {
        if (confirm("Apakah yakin data akan dihapus?")) {
            $.ajax({
                url: "sparepart/" + id,
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
