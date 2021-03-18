<?php
require_once "_config/conn.php";
$show_buku = mysqli_query($conn, "SELECT * FROM tb_buku");

?>


<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="mb-3">
            <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
        </div>
        <div class="mb-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#tambahbuku">
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
            <a href="" class="btn btn-success btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-file-export"></i>
                </span>
                <span class="text">Export Data To Excel</span>
            </a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Kategori Buku</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah Buku</th>
                            <th>Kode ISBN</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($show_buku as $buku) : ?>
                            <tr>
                                <td style="width: auto;"><?= $no ?></td>
                                <td><?= $buku['judul'] ?></td>
                                <td><?= $buku['penulis'] ?></td>
                                <td><?= $buku['penerbit'] ?></td>
                                <td><?= $buku['kategori'] ?></td>
                                <td><?= $buku['tahun_terbit'] ?></td>
                                <td><?= $buku['jumlah'] ?></td>
                                <td><?= $buku['isbn'] ?></td>
                                <td class="d-sm-inline-flex ">

                                    <a href="" class="btn btn-sm btn-warning ml-1" id="btn_edit" data-toggle="modal" data-target="#modal_edit" data-id="<?= $buku['id_buku']; ?>" data-judul="<?= $buku['judul'] ?>" data-penulis="<?= $buku['penulis'] ?>" data-penerbit="<?= $buku['penerbit'] ?>" data-kategori="<?= $buku['kategori'] ?>" data-tahun="<?= $buku['tahun_terbit'] ?>" data-jumlah="<?= $buku['jumlah'] ?>" data-isbn="<?= $buku['isbn'] ?>">

                                        <i class=" far fa-edit"></i></a>
                                    <a href="?pages=buku&aksi=hapus&id=<?= $buku['id_buku']; ?>" class="btn btn-sm btn-danger ml-2"><i class="far fa-trash-alt">
                                        </i></a>

                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Form tambah buku -->
    <div class="modal fade " id="tambahbuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku Baru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="judul">Judul Buku </label>
                            <input class="form-control" name="judul" type="text" placeholder="judul buku" required>
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis </label>
                            <input class="form-control" name="penulis" type="text" placeholder="penulis" required>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input class="form-control" name="penerbit" type="text" placeholder="penerbit" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="kategori">
                                <option value="">-- Pilih --</option>
                                <option value="hibah">Buku Hibah</option>
                                <option value="pembelian">Pembelian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahunTerbit">Tahun Terbit</label>
                            <input class="form-control" name="tahun" type="number" placeholder="tahun terbit" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah </label>
                            <input class="form-control" name="jumlah" type="number" placeholder="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="isbn">Kode ISBN </label>
                            <input class="form-control" name="isbn" type="text" placeholder="kode isbn" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                        </div>
                    </form>
                </div>

                <?php
                $query = mysqli_query($conn, "SELECT max(id_buku) as maxkode from tb_buku");
                $data = mysqli_fetch_array($query);
                $id = $data['maxkode'];

                $no = substr($id, 5, 4);

                $no = (int) $no;
                $no++;
                $str = 'ID-BK';
                $id_auto = $str . sprintf("%04s", $no);

                echo "$id_auto";


                //  fungsi tambah data buku
                if (isset($_POST['simpan'])) {

                    $judul = htmlspecialchars($_POST["judul"]);
                    $penulis = htmlspecialchars($_POST["penulis"]);
                    $penerbit = htmlspecialchars($_POST["penerbit"]);
                    $kategori = ($_POST["kategori"]);
                    $tahunTerbit = htmlspecialchars($_POST["tahun"]);
                    $jumlah = htmlspecialchars($_POST["jumlah"]);
                    $isbn = htmlspecialchars($_POST["isbn"]);

                    var_dump($_POST);

                    $query = "INSERT INTO tb_buku VALUES ('$id_auto','$judul','$penulis','$penerbit','$kategori','$tahunTerbit','$jumlah', '$isbn')";

                    if (mysqli_query($conn, $query)) {
                        echo " 
                            <script>alert('data berhasil ditambahkan!');
                            document.location.href= '?pages=buku';
                            </script>
                            ";

                        header('Location: anggota.php');
                    } else {
                        echo "Err:" . $query . "" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }
                ?>

            </div>
        </div>
    </div>



    <!-- Modal Form edit buku -->
    <div class="modal fade " id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku Baru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_edit">
                    <form action="" method="POST">
                        <input type="hidden" id="fid_buku" name="fid_buku">
                        <div class="form-group">
                            <label for="judul">Judul Buku </label>
                            <input class="form-control" name="fjudul" id="fjudul" type="text" placeholder="judul buku" required>
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis </label>
                            <input class="form-control" name="fpenulis" id="fpenulis" type="text" placeholder="penulis" required>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input class="form-control" name="fpenerbit" id="fpenerbit" type="text" placeholder="penerbit" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="fkategori" id="fkategori">
                                <option value="">-- Pilih --</option>
                                <option value="hibah">Buku Hibah</option>
                                <option value="pembelian">Pembelian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahunTerbit">Tahun Terbit</label>
                            <input class="form-control" name="ftahun" id="ftahun" type="number" placeholder="tahun terbit" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah </label>
                            <input class="form-control" name="fjumlah" id="fjumlah" type="number" placeholder="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="isbn">Kode ISBN </label>
                            <input class="form-control" name="fisbn" id="fisbn" type="text" placeholder="kode isbn" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['fid_buku'];
    $judul = $_POST['fjudul'];
    $penulis = $_POST['fpenulis'];
    $penerbit = $_POST['fpenerbit'];
    $kategori = $_POST['fkategori'];
    $tahun = $_POST['ftahun'];
    $jumlah = $_POST['fjumlah'];
    $isbn = $_POST['fisbn'];

    $update_query = mysqli_query($conn, "UPDATE tb_buku SET 
                                                       judul='$judul', 
                                                       penulis='$penulis',
                                                       penerbit='$penerbit',
                                                       kategori='$kategori',
                                                       tahun_terbit='$tahun',
                                                       jumlah=$jumlah,
                                                       isbn=$isbn
                                                       WHERE id_buku='$id' ");
    if ($update_query) {
        echo " 
            <script>alert('data berhasil diubah!');
            document.location.href= '?pages=buku';
            </script>
            ";

        header('Location: buku.php');
    } else {
        echo "Err:" . $update_query . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}


var_dump($_POST);
?>



<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script>
    $(document).on("click", "#btn_edit", function() {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        var penulis = $(this).data('penulis');
        var penerbit = $(this).data('penerbit');
        var kategori = $(this).data('kategori');
        var tahun = $(this).data('tahun');
        var jumlah = $(this).data('jumlah');
        var isbn = $(this).data('isbn');

        console.log(id);

        $("#modal_edit #fid_buku").val(id);
        $("#modal_edit #fjudul").val(judul);
        $("#modal_edit #fpenulis").val(penulis);
        $("#modal_edit #fpenerbit").val(penerbit);
        $("#modal_edit #fkategori").val(kategori);
        $("#modal_edit #ftahun").val(tahun);
        $("#modal_edit #fjumlah").val(jumlah);
        $("#modal_edit #fisbn").val(isbn);
    })
</script>