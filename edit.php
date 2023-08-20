<?php
include 'config.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT * FROM `mahasiswa` WHERE id = '$id'";
    $sql = mysqli_query($db, $query);
    $mahasiswa = mysqli_fetch_assoc($sql);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sistem Beasiswa</title>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Css -->
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <!-- TopBar -->
    <section class="bg-dark">
        <div class="row">
            <div class="col-md-4">
                <p class="text-center navbar-top">
                    <a href="index.php" class="text-decoration-none text-white"> Pilihan Beasiswa </a>
                </p>
            </div>
            <div class="col-md-4">
                <p class="text-center navbar-top">
                    <a href="daftar.php" class="text-decoration-none text-white"> Daftar </a>
                </p>
            </div>
            <div class="col-md-4">
                <p class="text-center navbar-top">
                    <a href="hasil.php" class="text-decoration-none text-white"> Hasil </a>
                </p>
            </div>
        </div>
    </section>

    <h3 class="text-center mt-3"> Edit Status </h3>

    <!-- Form -->
    <section>
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <?php if ($_GET['status'] == 'success') : ?>
                    <div class="alert alert-success" role="alert">
                        Berhasil Menambahkan data
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <p> Edit Status Ajuan </p>
                    </div>
                    <div class="card-body">
                        <form action="updatestatus.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="nama"> Status Ajuan </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_ajuan" id="status_ajuan1" value="terverifikasi" <?= ($mahasiswa['status_ajuan'] == 'terverifikasi') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="status_ajuan1">
                                            Layak Verifikasi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_ajuan" id="status_ajuan2" value="belum" <?= ($mahasiswa['status_ajuan'] == 'belum') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="status_ajuan2">
                                            Belum Layak Verifikasi
                                        </label>
                                    </div>
                                    <button type="submit" name="update" value="update" class="btn btn-success mt-3">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Option 1: Bootstrap Bundle with Popper-->
    <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>