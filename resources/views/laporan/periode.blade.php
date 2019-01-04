<div class="modal" id="modal-periode" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" data-toggle="validator" method="POST" action="laporan">
                {{ csrf_field() }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                            &times; </span> </button>
                    <h3 class="modal-title">Periode Laporan</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="control-label col-sm-3">Bulan </label>
                        <div class="col-sm-9">
                            <select id="month" name="month" class="form-control">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="12">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-sm-3">Tahun </label>
                        <div class="col-sm-9">
                            <select id="year" name="year" class="form-control">
                                <?php
                                $mulai= date('Y') - 50;
                                for($i = $mulai;$i<$mulai + 100;$i++){
                                    $sel = $i == date('Y') ? ' selected="selected"' : '';
                                    echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>
                        Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>