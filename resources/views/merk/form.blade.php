<div class="modal fade" id="modal-form" tab-index="-1" aria-hiddden="true" data-backdrop="static" role="dialog">
    <div class="modal-dialog">
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
                        <label for="nama_merk" class="control-label col-sm-3">Nama Merk :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_merk" name="nama_merk" autofocus required>
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