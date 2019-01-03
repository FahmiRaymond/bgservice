<div class="modal fade" id="modal-form" tab-index="-1" aria-hiddden="true" data-backdrop="static" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <form class="form-horizontal" data-toggle="validator" method="post">
                    {{ csrf_field() }} {{ method_field('POST') }}
    
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title"></h2>
                    </div>
                    
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="tanggal" class="control-label col-sm-6">Tanggal :</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tanggal" name="tanggal" required
                                    oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
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
                            <label for="pemilik" class="control-label col-sm-3">Pemilik :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pemilik" name="pemilik" autofocus required
                                oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telepon" class="control-label col-sm-3">Telepon :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="telepon" name="telepon" required
                                oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="merk" class="control-label col-sm-3">Merk :</label>
                            <div class="col-sm-8">
                                <select name="merk" id="merk" type="text" class="form-control">
                                    <option value="">--merk--</option>
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
                                <input type="text" class="form-control" id="model" name="model" required
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
                                <input type="text" class="form-control" id="kerusakan" name="kerusakan" required
                                oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="biaya" class="control-label col-sm-3">Biaya :</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="biaya" name="biaya">
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
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning btn-save" type="submit">
                            <span class="glyphicon glyphicon-plus"></span>Simpan
                        </button>
                        <button class="btn btn-warning" type="button" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>