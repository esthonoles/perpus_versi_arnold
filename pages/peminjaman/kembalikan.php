ini proses kembalikan
<?php
// require_once ""
$kode = $_GET['id'];
$tanggal = date("Y-m-d");

$result = mysqli_query($conn, "UPDATE tb_sirkulasi SET tgl_kembali = '$tanggal', status = 'kembali' 
                                                        WHERE id_sirkulasi = '$kode'");
if ($result) {
    echo "
<script>
alert('Pengembalian Buku Berhasil!');
    document.location.href = '?pages=peminjaman';
</script>
";

    // header('Location: anggota.php');
} else {
    echo "Err:" . $result . "" . mysqli_error($conn);
}

?>