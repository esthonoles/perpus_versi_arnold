<?php
date_default_timezone_set('Asia/Jakarta');
// session_start();

$conn = mysqli_connect('localhost', 'root', 'allzero', 'KP_perpus');
if (mysqli_connect_errno()) {
    echo mysqli_connect_errno();
}


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
