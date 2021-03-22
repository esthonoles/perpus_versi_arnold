<?php
require_once "_config/conn.php";
$tgl = date("Y-m-d");

// tampil peminjaman
$select_data = "SELECT * FROM tb_sirkulasi
INNER JOIN tb_buku on tb_sirkulasi.id_buku = tb_buku.id_buku
INNER JOIN tb_anggota on tb_sirkulasi.no_induk = tb_anggota.no_induk 
INNER JOIN tb_kelas on tb_anggota.id_kelas = tb_kelas.id_kelas where status = 'pinjam'";
$run = mysqli_query($conn, $select_data);
$total_pinjam = mysqli_num_rows($run);

$tampil = mysqli_query($conn, "SELECT * FROM tb_pengunjung INNER JOIN tb_kelas on tb_pengunjung.id_kelas = tb_kelas.id_kelas where tgl_kunjung='$tgl'");

$total = mysqli_num_rows($tampil);

$anggota = mysqli_query($conn, "SELECT * FROM tb_anggota");
$total_anggota = mysqli_num_rows($anggota);

$buku = mysqli_query($conn, "SELECT * FROM tb_buku");
$total_buku = mysqli_num_rows($buku);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <h6 class="m-0 font-weight-bold text-primary">Tanggal: <?= $tgl ?> / <?= date('H:i:s') ?></h6>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Anggota</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_anggota ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_buku ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Peminjaman</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pinjam ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pengunjung</div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjam Buku</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-striped" width="90%" cellspacing="0">
                        <!-- <thead>
                            <tr>
                                <th>Nama Peminjam</th>
                                <th>Kelas</th>
                                <th>Judul Buku</th>
                                <th>Detail</th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <?php
                            foreach ($run as $pinjam) :
                            ?>
                                <tr>
                                    <td><?= $pinjam['nama'] ?></td>
                                    <td style="width: 10px;"><?= $pinjam['kelas'] ?></td>
                                    <td><?= $pinjam['judul'] ?></td>
                                    <td><a href="?pages=peminjaman" class="btn btn-sm btn-success">Detail</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengunjung Hari ini</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-striped" width="90%" cellspacing="0">
                        <!-- <thead class="table-bordered" style="color: white; background-color:#4e73df;">
                            <tr>
                                <th>Nama Pengunjung</th>
                                <th>Kelas</th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <?php
                            foreach ($tampil as $show) :
                            ?>
                                <tr>
                                    <td><?= $show['nama'] ?></td>
                                    <td><?= $show['kelas'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>