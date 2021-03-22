<?php
// include "_config/conn.php";

$kunjung = "SELECT * FROM tb_pengunjung INNER JOIN tb_kelas on tb_pengunjung.id_kelas = tb_kelas.id_kelas
            ";

$run = mysqli_query($conn, $kunjung);

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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tgl Kunjung</th>
                                <th>Keperluan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($run as $tampil) :
                            ?>
                                <tr>
                                    <td style="width: 10px;"><?= $no ?></td>
                                    <td><?= $tampil['nama'] ?></td>
                                    <td style="width: 10px;"><?= $tampil['kelas'] ?></td>
                                    <td style="width: 100px;"><?= $tampil['tgl_kunjung'] ?></td>
                                    <td><?= $tampil['keperluan'] ?></td>
                                </tr>
                            <?php $no++;
                            endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>