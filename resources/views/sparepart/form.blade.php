<div class="modal fade" id="modal-form" tab-index="-1" aria-hiddden="true" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form class="form-horizontal" data-toggle="validator" method="post">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nama_barang" class="control-label col-sm-4">Nama Barang :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" autofocus required
                            oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="control-label col-sm-4">Harga :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="harga" name="harga" required
                            oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-save" type="submit">
                        <span class="glyphicon glyphicon-plus"></span>Simpan
                    </button>
                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>CLose
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>