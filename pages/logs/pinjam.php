<?php
// include "_config/conn.php";
$select_data = "SELECT * FROM tb_sirkulasi
INNER JOIN tb_buku on tb_sirkulasi.id_buku = tb_buku.id_buku
INNER JOIN tb_anggota on tb_sirkulasi.no_induk = tb_anggota.no_induk ";
$run = mysqli_query($conn, $select_data);;

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data logs Peminjaman Buku</h1>
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>Nama Siswa</th>
                                <th>Judul Buku</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($run as $pinjam) :
                            ?>
                                <tr>
                                    <td style="width: 5px;"><?= $no ?></td>

                                    <td><?= $pinjam['nama'] ?></td>
                                    <td><?= $pinjam['judul'] ?></td>
                                    <td><?= $pinjam['tgl_pinjam'] ?></td>
                                    <td><?= $pinjam['tgl_kembali'] ?></td>
                                    <td>
                                        <?= $pinjam['status'] ?>
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
    </div>
</div>