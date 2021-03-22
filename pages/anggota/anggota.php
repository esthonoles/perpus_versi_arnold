<?php
require_once "_config/conn.php";

$kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
$select_data = "SELECT * FROM tb_anggota INNER JOIN tb_kelas on tb_anggota.id_kelas = tb_kelas.id_kelas";
$query = mysqli_query($conn, $select_data);
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="mb-3">
        <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
    </div>
    <div class="mb-3">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#add">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data Baru</span>
        </a>
        <a href="" class="btn btn-warning btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-upload"></i>
            </span>
            <span class="text">Import Data From Excel</span>
        </a>
        <!-- <a href="" class="btn btn-success btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-file-export"></i>
            </span>
            <span class="text">Export Data To Excel</span>
        </a> -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No Anggota</th>
                        <th>Nama Santri</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($query as $anggota) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $anggota['no_induk']; ?></td>
                            <td><?= $anggota['nama']; ?></td>
                            <td><?= $anggota['kelas']; ?></td>
                            <td><?= $anggota['jenis_kelamin']; ?></td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary btn-sm " id="btn_edit" data-toggle="modal" data-target="#modal_ubah" data-id="<?= $anggota['no_induk']; ?>" data-nama="<?= $anggota['nama'] ?>" data-kelas="<?= $anggota['id_kelas']; ?>" data-jk="<?= $anggota['jenis_kelamin']; ?>"><i class=" far fa-edit"></i> edit</a>

                                <a class="btn btn-danger btn-sm ml-2" onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="?pages=anggota&aksi=hapus&id=<?= $anggota['no_induk']; ?>"><i class="far fa-trash-alt">
                                    </i> hapus</a>
                            </td>
                        </tr>

                    <?php $no++;
                    endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- ------------------------ modal tambah data -->
<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Anggota </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Santri</label>
                        <input class="form-control text-uppercase" name="nama" type="text" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option>-- Pilih --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Pilih Kelas :</label>
                        <select class="form-control" name="kelas">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($kelas as $kls) : ?>
                                <option value="<?= $kls["id_kelas"]; ?>"><?= $kls["kelas"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" id="update" class="btn btn-primary" name="add" value="Simpan">

                        <!-- insert data anggota -->
                        <?php

                        // buat id otomatis
                        $query = mysqli_query($conn, "SELECT max(no_induk) as maxkode from tb_anggota");
                        $data = mysqli_fetch_array($query);
                        $id = $data['maxkode'];

                        $no = substr($id, 5, 4);

                        $no = (int) $no;
                        $no++;
                        $str = 'ID-DM';
                        $id_auto = $str . sprintf("%04s", $no);


                        if (isset($_POST['add'])) {

                            $nama = htmlspecialchars($_POST["nama"]);
                            $kelas = $_POST["kelas"];
                            $jk = $_POST["jenis_kelamin"];
                            $query = "INSERT INTO tb_anggota VALUES ('$id_auto','$nama','$kelas','$jk')";

                            if (mysqli_query($conn, $query)) {
                                echo " 
                                    <script>alert('data berhasil ditambahkan!');
                                    document.location.href= '?pages=anggota';
                                    </script>
                                    ";

                                // header('Location: anggota.php');
                            } else {
                                echo "Err:" . $query . "" . mysqli_error($conn);
                            }
                            mysqli_close($conn);
                        } ?>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- ------------------------End modal tambah data -->

<!-- ############## EDIT ANGGOTA ##################### -->

<div class="modal fade " id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Data Anggota</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modal_edit">
                <form id="form_edit" method="post">
                    <input type="hidden" name="fno_induk" id="fno_induk">
                    <div class="form-group">
                        <label for="nama">Nama Santri</label>
                        <input class="form-control text-uppercase" name="fnama" id="fnama" type="text" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="fjenis_kelamin" class="form-control" name="fjenis_kelamin">
                            <option>Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="fkelas" id="fkelas" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($kelas as $kls) : ?>
                                <option value="<?= $kls["id_kelas"]; ?>"><?= $kls["kelas"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn  btn-primary" name="update">Update</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php
if (isset($_POST['update'])) {

    $id = $_POST['fno_induk'];
    $nama = $_POST['fnama'];
    $kelas = $_POST['fkelas'];
    $jk = $_POST['fjenis_kelamin'];
    var_dump($_POST);
    // echo "$id";
    $update_query = mysqli_query($conn, "UPDATE tb_anggota SET 
                                                       nama='$nama', 
                                                       id_kelas='$kelas',
                                                       jenis_kelamin='$jk'
                                                       WHERE no_induk='$id' ");
    if ($update_query) {
        echo " 
            <script>alert('data berhasil diubah!');
            document.location.href= '?pages=anggota';
            </script>
            ";

        header('Location: anggota.php');
    } else {
        echo "Err:" . $update_query . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>



<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script>
    $(document).on("click", "#btn_edit", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var kelas = $(this).data('kelas');
        var jk = $(this).data('jk');
        $("#modal_edit #fno_induk").val(id);
        $("#modal_edit #fnama").val(nama);
        $("#modal_edit #fkelas").val(kelas);
        $("#modal_edit #fjenis_kelamin").val(jk);
    })

    // proses update

    $(document).ready(function(e) {
        $('#form').on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: 'anggota/ubah.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(msg) {
                    $('.table').html(msg);
                }
            })
        }));
    })
</script>