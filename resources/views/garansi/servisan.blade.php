<div class="modal" id="modal-servisan" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                        &times; </span> </button>
                <h3>Cari Servisan</h3>
            </div>

            <div class="modal-body">
                <table class="table table-striped tabel-servisan">
                    <thead>
                        <th width="3">ID</th>
                        <th>Tanggal</th>
                        <th>Pemilik</th>
                        <th>telepon</th>
                        <th>Model</th>
                        <th>Kerusakan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($servisan as $list)
                        <tr>
                            <th>{{ $list->id_servisan }}</th>
                            <th>{{ $list->tanggal }}</th>
                            <th>{{ $list->pemilik }}</th>
                            <th>{{ $list->telepon }}</th>
                            <th>{{ $list->nama_merk }} {{ $list->model }}</th>
                            <th>{{ $list->kerusakan }}</th>
                            <th><a onclick="selectItem({{ $list->id_servisan }})" class="btn btn-primary">
                                    <i class="fa fa-check-circle"></i>Pilih</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
