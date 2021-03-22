<?php
$select_data = "SELECT * FROM tb_sirkulasi
INNER JOIN tb_buku on tb_sirkulasi.id_buku = tb_buku.id_buku
INNER JOIN tb_anggota on tb_sirkulasi.no_induk = tb_anggota.no_induk where status = 'pinjam'";
$run = mysqli_query($conn, $select_data);

// $tampil_pinjam = mysqli_query($conn, "SELECT * FROM tb_sirkulasi where status = 'pinjam'");

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="mb-3">
        <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
    </div>
    <div class="mb-3">
        <a href="?pages=peminjaman&aksi=tambah"" class=" btn btn-primary btn-icon-split btn-sm">
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
                        <th>Nama Siswa</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($run as $pinjam) :
                    ?>
                        <tr>

                            <td><?= $pinjam['nama'] ?></td>
                            <td><?= $pinjam['judul'] ?></td>
                            <td><?= $pinjam['tgl_pinjam'] ?></td>
                            <td><?= $pinjam['tgl_kembali'] ?></td>
                            <td>
                                <a class="btn btn-sm btn-danger"><?= $pinjam['status'] ?></a>
                            </td>
                            <td>
                                <a href="?pages=peminjaman&aksi=kembalikan&id=<?= $pinjam['id_sirkulasi']; ?>" class="btn btn-sm btn-primary" data-placement="bottom" title="kembalikan"><i class="fas fa-undo-alt"></i></a>
                                <a href="?pages=peminjaman&aksi=perpanjang&id=<?= $pinjam['id_sirkulasi']; ?>&tgl=<?= $pinjam['tgl_kembali'] ?>" class="btn btn-sm btn-success" data-placement="bottom" title="perpanjang"><i class="fas fa-clock">
                                    </i></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    endforeach
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>