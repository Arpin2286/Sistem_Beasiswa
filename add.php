<?php
include 'config.php';

if ($_POST['daftar']) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $beasiswa = $_POST['beasiswa'];
    $status_ajuan = "belum";

    // FILE
    $tmp_name = $_FILES['berkas']['tmp_name'];
    $berkas = $_FILES["berkas"]["name"];

    // die(var_dump($tmp_name));
    $x = explode('.', $berkas);
    $ekstensi = strtolower(end($x));
    $ekstensiDiperbolehkan = ['jpg', 'pdf', 'zip'];

    if (in_array($ekstensi, $ekstensiDiperbolehkan) === true) {
        $cek = move_uploaded_file($tmp_name, 'upload/' . $berkas);
        // die(var_dump($÷cek));
    } else {
        // die(var_dump($x));
        echo "<script> alert('Gagal Mengunggah file') </script>";
    }

    $cek = move_uploaded_file($tmp_name, 'upload' . $berkas);
    $query = "INSERT INTO `mahasiswa`(`nama`, `email`, `no_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status_ajuan`) VALUES ('$nama','$email','$no_hp','$semester','$ipk','$beasiswa','$berkas','$status_ajuan')";
    // $query = "INSERT INTO `mahasiswa`( `nama`, `email`, `no_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status_ajuan`) VALUES ('$nama','$email','$no_hp','$semester','$ipk','$beasiswa','$berkas', '$status_ajuan')";
    $sql = mysqli_query($db, $query);
    // die(var_dump($sql));

    if ($sql) {
        header('Location: daftar.php?status=success');
    } else {
        die('Terjadi kesalahan dalam menambahkan data');
    }
} else {
    echo "Terjadi kesalahan pada sistem, silahkan hubungi admin.";
}
