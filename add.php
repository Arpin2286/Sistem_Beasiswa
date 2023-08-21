<?php
// Panggil Koneksi ke DB
include 'config.php';

if ($_POST['daftar']) {
    // Import Request
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

    // Uploading
    UploadFile($berkas, $tmp_name);

    // Insert Data
    $query = "INSERT INTO `mahasiswa`(`nama`, `email`, `no_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status_ajuan`) VALUES ('$nama','$email','$no_hp','$semester','$ipk','$beasiswa','$berkas','$status_ajuan')";
    $sql = mysqli_query($db, $query);

    if ($sql) {
        // Jika Berhasil Insert Arahkan ke halaman form daftar
        header('Location: daftar.php?status=success');
    } else {
        // Jika Gagal munculkan pesan
        die('Terjadi kesalahan dalam menambahkan data');
    }
} else {
    // Jika Terjadi Kesalahan Pada Sisi Admin
    echo "Terjadi kesalahan pada sistem, silahkan hubungi admin.";
}

// Function untuk upload file
function UploadFile($berkas, $tmp_name)
{
    $x = explode('.', $berkas);
    $ekstensi = strtolower(end($x));
    $ekstensiDiperbolehkan = ['jpg', 'pdf', 'zip'];

    // Cek Ekstensi
    if (in_array($ekstensi, $ekstensiDiperbolehkan) === true) {
        $cek = move_uploaded_file($tmp_name, 'upload/' . $berkas);
    } else {
        header('Location: daftar.php?status=gagal');
        exit;
    }
}
