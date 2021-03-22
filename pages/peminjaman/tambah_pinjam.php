<?php
$tanggal = date("Y-m-d");

$tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tanggal)));



$query = mysqli_query($conn, "SELECT max(id_sirkulasi) as maxkode from tb_sirkulasi");
$data = mysqli_fetch_array($query);
$id = $data['maxkode'];
$no = substr($id, 5, 4);

$no = (int) $no;
$no++;
$str = 'TRX-P';
$id_pinjam = $str . sprintf("%04s", $no);

echo $id_pinjam;

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Transaksi Peminjaman Buku</h1>
    <a href="?pages=peminjaman" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-md-6 mx-auto">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form>
                    <div class="input-group mb-3">
                        <input type="text" name="cari_nama" id="cari_nama" class="form-control" placeholder="cari nama anggota...">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="kode">Kode Anggota</label>
                            <input type="text" name="kode" class="form-control" placeholder="kode anggota" disabled>

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="kelas" disabled>

                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="cari_buku" id="cari_buku" class="form-control" placeholder="cari judul buku...">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="pengarang">Penulis</label>
                            <input type="text" name="penulis" class="form-control" placeholder="pengarang" disabled>

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="thn_terbit">Tahun Terbit</label>
                            <input type="text" name="thn_terbit" class="form-control" placeholder="tahun terbit" disabled>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                        <input type="text" name="tgl_pinjam" class="form-control" placeholder="tanggal_pinjam" value="<?= $tanggal ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal Kembali</label>
                        <input type="text" name="tgl_kembali" class="form-control" placeholder="tanggal_kembali" value="<?= $tgl2 ?>" disabled>
                    </div>

                    <a href="" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm text-white-50"></i> Simpan</a>

                    <a href="" type="reset" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eraser fa-sm text-white-50"></i> Reset</a>

                </form>




            </div>
        </div>
    </div>
</div>