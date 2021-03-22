ini buat perpanjang peminjaman
<?php
$id = $_GET['id'];
$tgl1 = $_GET['tgl'];

echo $id, $tgl1;
$tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgl1)));

$result = mysqli_query($conn, "UPDATE tb_sirkulasi SET tgl_kembali = '$tgl2' 
                                                        WHERE id_sirkulasi = '$id'");
if ($result) {
    echo "
<script>
alert('Perpanjang Peminjaman Berhasil!');
    document.location.href = '?pages=peminjaman';
</script>
";

    // header('Location: anggota.php');
} else {
    echo "Err:" . $result . "" . mysqli_error($conn);
}

?>