@extends('layouts.app')
@section('title')
Laporan Pendapatan bulan Ke-{{($month) }}/{{($year) }}
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
                <a onclick="periodeForm()" class="btn btn-success"><i class="fa fa-calendar"></i> Ubah Bulan</a>
                <a href="laporan/pdf/{{$year}}/{{$month}}" target="_blank" class="btn btn-info"><i class="fa fa-print"></i>Print</a>
            </div>
            <div class="box-body">
                <table class="table table-striped tabel-laporan">
                    <thead>
                        <tr>
                            <th width="2">No</th>
                            <th>Tanggal</th>
                            <th>Pemilik</th>
                            <th>Model</th>
                            <th>Kerusakan</th>
                            <th>Biaya</th>
                            <th>Sparepart</th>
                            <th>Laba</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- @include('laporan.form') --}}
@include('laporan.periode')
@endsection
@section('script')
<script type="text/javascript">
    var table, year, month;
    $(function () {
       table = $('.tabel-laporan').DataTable({
            "dom": 'Brt',
            "bSort": false,
            "bPaginate": false,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "laporan/data/{{ $year }}/{{ $month }}",
                "type": "GET"
            }
        });
    });

    function periodeForm(){
        $('#modal-periode').modal('show');        
    }

    // function showForm(id) {
    //     $('#modal-form form')[0].reset();
    //     $.ajax({
    //         url: "laporan/" + id + "/edit",
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function (data) {
    //             $('#modal-form').modal('show');
    //             $('.modal-title').text('Data laporan');
    //             $('.modal-footer').hide();

    //             $('#id').val(data.id_garansi);
    //             $('#tanggal').val(data.tanggal).attr('readonly', true);
    //             $('#status').val(data.id_status).attr('readonly', true);
    //             $('#pemilik').val(data.pemilik).attr('readonly', true);
    //             $('#telepon').val(data.telepon).attr('readonly', true);
    //             $('#merk').val(data.id_merk).attr('readonly', true);
    //             $('#model').val(data.model).attr('readonly', true);
    //             $('#no_imei').val(data.no_imei).attr('readonly', true);
    //             $('#kerusakan').val(data.kerusakan).attr('readonly', true);
    //             $('#biaya').val(data.biaya).attr('readonly', true);
    //             $('#id_sparepart').val(data.id_sparepart).attr('readonly', true);
    //             $('#nama_barang').val(data.nama_barang).attr('readonly', true);
    //             $('#harga').val(data.harga).attr('readonly', true);
    //             $('#laba').val(data.laba).attr('readonly', true);
    //             $('#keterangan').val(data.keterangan).attr('readonly', true);

    //         },
    //         error: function () {
    //             alert("Tidak dapat menampilkan data!");
    //         }
    //     });
    // }

    // function editForm(id) {
    //     save_method = "edit";
    //     $('#modal-form form')[0].reset();
    //     $('input[name=_method]').val('PATCH');
    //     $.ajax({
    //         url: "laporan/" + id + "/edit",
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function (data) {
    //             $('#modal-form').modal('show');
    //             $('.modal-title').text('Edit Garansi');
    //             $('.modal-footer').show();

    //             $('#id').val(data.id_laporan);
    //             $('#tanggal').val(data.tanggal).attr('readonly', false);
    //             $('#status').val(data.id_status).attr('readonly', false);
    //             $('#pemilik').val(data.pemilik).attr('readonly', false);
    //             $('#telepon').val(data.telepon).attr('readonly', false);
    //             $('#merk').val(data.id_merk).attr('readonly', false);
    //             $('#model').val(data.model).attr('readonly', false);
    //             $('#no_imei').val(data.no_imei).attr('readonly', false);
    //             $('#kerusakan').val(data.kerusakan).attr('readonly', false);
    //             $('#biaya').val(data.biaya).attr('readonly', false);
    //             $('#id_sparepart').val(data.id_sparepart).attr('readonly', false);
    //             $('#nama_barang').val(data.nama_barang).attr('readonly', false);
    //             $('#harga').val(data.harga).attr('readonly', false);
    //             $('#laba').val(data.laba).attr('readonly', false);
    //             $('#keterangan').val(data.keterangan).attr('readonly', false);
    //         },
    //         error: function () {
    //             alert("Tidak dapat menampilkan data!");
    //         }
    //     });
    // }

    // function deleteData(id) {
    //     if (confirm("Apakah yakin data akan dihapus?")) {
    //         $.ajax({
    //             url: "laporan/" + id,
    //             type: "POST",
    //             data: {
    //                 '_method': 'DELETE',
    //                 '_token': $('meta[name=csrf-token]').attr('content')
    //             },
    //             success: function (data) {
    //                 table.ajax.reload();
    //             },
    //             error: function () {
    //                 alert("Tidak dapat menghapus data!");
    //             }
    //         });
    //     }
    // }

</script>
@endsection
