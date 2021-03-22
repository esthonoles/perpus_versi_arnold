<?php
include 'koneksi.php';

$nama =  '%' . htmlspecialchars($_POST['nama']) . '%';

$i = 1;
$query = "SELECT * FROM tb_anggota WHERE nama LIKE ? ORDER BY nama ASC LIMIT 10";
$dewan1 = $db1->prepare($query);
$dewan1->bind_param("s", $nama_mahasiswa);
$dewan1->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
    $data[$i]['no_induk'] = $row['no_induk'];
    $data[$i]['nama'] = $row['nama'];
    $data[$i]['id_kelas'] = $row['id_kelas'];
    // $data[$i]['avatar'] = $row['avatar'];

    $i++;
}

$out = array_values($data);
echo json_encode($out);
