<?php
include 'config.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $status_ajuan = $_POST['status_ajuan'];

    $query = "UPDATE `mahasiswa` SET `status_ajuan`='$status_ajuan' WHERE id = '$id'";
    $sql = mysqli_query($db, $query);

    if ($sql) {
        header('Location: hasil.php?status=updatesuccess');
    } else {
        die('Data tidak berhasil dihapus.....');
    }
}
