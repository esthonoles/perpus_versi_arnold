<?php
// include "_config/conn.php";

// $kembali = "SELECT * FROM log_pinjam 
//             INNER JOIN tb_anggota on log_pinjam.no_induk = tb_anggota.no_induk
//             INNER JOIN tb_buku on log_pinjam.id_buku = tb_buku.id_buku
//             INNER JOIN tb_sirkulasi on log_pinjam.id_sirkulasi = tb_sirkulasi.id_sirkulasi
//             ";

$select_data = "SELECT * FROM tb_sirkulasi
INNER JOIN tb_buku on tb_sirkulasi.id_buku = tb_buku.id_buku
INNER JOIN tb_anggota on tb_sirkulasi.no_induk = tb_anggota.no_induk 
INNER JOIN tb_kelas on tb_anggota.id_kelas = tb_kelas.id_kelas
-- INNER JOIN tb_anggota on tb_kelas.id_kelas = tb_anggota.id_kelas
where status = 'kembali'";
$run = mysqli_query($conn, $select_data);

// $run = mysqli_query($conn, $kembali);

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data logs tb_pengunjung</h1>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">cetak per tanggal</h6>
                <div>
                    <a href="" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm text-white-50"></i> PDF </a>

                    <a href="" type="reset" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eraser fa-sm text-white-50"></i> Excel</a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Anggota</th>
                                <th>Kelas</th>
                                <th>Judul Buku</th>
                                <th>Tgl Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($run as $tampil) :
                            ?>
                                <tr>
                                    <td "><?= $tampil['nama'] ?></td>
                                    <td><?= $tampil['kelas'] ?></td>
                                    <td><?= $tampil['judul'] ?></td>
                                    <td><?= $tampil['tgl_kembali'] ?></td>
                                </tr>
                            <?php
                            endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>