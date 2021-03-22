<?php
require_once "_config/conn.php";

$kelas = mysqli_query($conn, "SELECT * FROM tb_kelas ");

if (isset($_POST['tambah'])) {
    $kelas = htmlspecialchars($_POST['kelas']);

    $query = "INSERT INTO tb_kelas VALUES (null,'$kelas')";

    if (mysqli_query($conn, $query)) {
        echo " 
                <script>alert('data berhasil ditambahkan!');
                document.location.href= '?pages=kelas';
                </script>
                ";

        header('Location: kelas.php');
    } else {
        echo "Err:" . $query . "" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

?>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-xl-8 col-md-6">
                            <div class="table-responsive">
                                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($kelas as $kls) :
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $kls['kelas']; ?></td>
                                                <td style="width: 100px;"><a href="?pages=kelas&aksi=hapus&id=<?= $kls['id_kelas'] ?>" class="btn btn-sm btn-danger" name="hapus" onclick="return confirm('Anda yakin mau menghapus user ini ?')"><i class="far fa-trash-alt">
                                                        </i> hapus</a></td>
                                            </tr>
                                        <?php $no++;
                                        endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-4">
                            <form action="" method="POST">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="kelas" placeholder="tambah kelas" required>

                                </div>
                                <div class="input-group d-grid">
                                    <button type="submit" name="tambah" class="btn btn-primary btn-sm" style="width: 100%;"><i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>