<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="mb-3">
        <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
    </div>
    <div class="mb-3">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#modal-pinjam">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data Baru</span>
        </a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pinjam</th>
                        <th>Nama Siswa</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Trx-DM0003</td>
                        <td>Dulbahet asli</td>
                        <td>cara makan bua dengan kulitnya</td>
                        <td>10-10-11</td>
                        <td>11-11-11</td>
                        <td>
                            <a class="btn btn-sm btn-danger">dipinjam</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary" data-placement="bottom" title="kembalikan"><i class="fas fa-undo-alt"></i></a>
                            <a href="" class="btn btn-sm btn-success" data-placement="bottom" title="perpanjang"><i class="fas fa-clock">
                                </i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-pinjam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">text address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">text address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">text address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">text address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>