<div class="modal fade" id="modal-form" tab-index="-1" aria-hiddden="true" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-lg">
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
                                <input type="text" class="form-control" id="tanggal" name="tanggal" readonly oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                    oninput="setCustomValidity('')">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <label for="status" class="control-label col-sm-5">Status :</label>
                            <div class="col-sm-7">
                                <select name="status" id="status" type="text" class="form-control pull-right" readonly>
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
                            <input type="text" class="form-control" id="pemilik" name="pemilik" autofocus readonly
                                oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="control-label col-sm-3">Telepon :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telepon" name="telepon" readonly oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="merk" class="control-label col-sm-3">Merk :</label>
                        <div class="col-sm-8">
                            <select name="merk" id="merk" type="text" class="form-control" readonly>
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
                            <input type="text" class="form-control" id="model" name="model" readonly oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_imei" class="control-label col-sm-3">Imei :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="no_imei" name="no_imei" readonly>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kerusakan" class="control-label col-sm-3">Kerusakan :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kerusakan" name="kerusakan" readonly oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
                                oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="biaya" class="control-label col-sm-3">Biaya :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="biaya" name="biaya" onkeyup="total();"
                                required required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sparepart" class="control-label col-sm-3">Sparepart :</label>
                        <div class="col-sm-8">
                            <div class="col-sm-1">
                                <a onclick="showPart()" class="btn btn-default">pilih</a>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-3">
                                    <label for="id_sparepart" class="control-label">ID</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="id_sparepart" name="id_sparepart"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-3">
                                    <label for="nama_barang" class="control-label">nama</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-3">
                                    <label for="harga" class="control-label">harga</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="harga" name="harga" onkeyup="total();"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="laba" class="control-label col-sm-3">Laba :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="laba" name="laba" readonly
                                required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
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