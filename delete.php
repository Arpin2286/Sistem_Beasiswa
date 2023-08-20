<?php
include 'config.php';

if (isset($_GET['destroy'])) {
    $id = $_GET['destroy'];

    $sql = "DELETE FROM `mahasiswa` WHERE id = '$id'";
    if (mysqli_query($db, $sql)) {
        header('Location: hasil.php?status=deletesuccess');
    } else {
        die('Data tidak berhasil dihapus.....');
    }
}
