<div class="modal" id="modal-sparepart" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                        &times; </span> </button>
                <h3>Cari Sparepart</h3>
            </div>

            <div class="modal-body">
                <table class="table table-striped tabel-sparepart">
                    <thead>
                        <tr>
                            <th width="3">ID</th>
                            <th>Nama Barang</th>
                            <th>QTY</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sparepart as $list)
                        <tr>
                            <th>{{ $list->id_sparepart }}</th>
                            <th>{{ $list->nama_barang }}</th>
                            <th>{{ $list->qty }}</th>
                            <th>Rp. {{ format_uang($list->harga) }}</th>
                            <th><a onclick="selectItem({{ $list->id_sparepart }})" class="btn btn-primary">
                                <i class="fa fa-check-circle"></i>Pilih</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>