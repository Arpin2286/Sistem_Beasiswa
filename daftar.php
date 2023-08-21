<?php
const ipk = 3;
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
    <!-- Top Bar -->
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

    <h3 class="text-center mt-3"> Daftar Beasiswa </h3>

    <!-- Form -->
    <section>
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <?php if ($_GET['status'] == 'success') : ?>
                    <div class="alert alert-success" role="alert">
                        Berhasil Menambahkan data
                    </div>
                <?php elseif ($_GET['status'] == 'gagal') : ?>
                    <div class="alert alert-danger" role="alert">
                        File harus dalam format jpg, pdf, atau zip.
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <p> Registrasi Beasiswa </p>
                    </div>
                    <div class="card-body">
                        <form action="add.php" method="POST" enctype="multipart/form-data">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="nama"> Masukkan Nama </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="email"> Masukkan Email </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="no_hp"> nomor hp </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="no_hp" id="no_hp" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="semester"> Semester saat ini </label>
                                </div>
                                <div class="col-md-8">
                                    <select name="semester" id="semester" name="semester" class="form-select" required>
                                        <option> Pilih semester </option>
                                        <option value="1"> 1 </option>
                                        <option value="2"> 2 </option>
                                        <option value="3"> 3 </option>
                                        <option value="4"> 4 </option>
                                        <option value="5"> 5 </option>
                                        <option value="6"> 6 </option>
                                        <option value="7"> 7 </option>
                                        <option value="8"> 8 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="ipk"> IPK </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" id="ipk" class="form-control" name="ipk" value="<?= ipk; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="beasiswa"> Pilihan Beasiswa </label>
                                </div>
                                <div class="col-md-8">
                                    <select id="beasiswa" name="beasiswa" class="form-select" required autofocus disabled>
                                        <option> Pilih beasiswa </option>
                                        <option value="akademik"> akademik </option>
                                        <option value="non-akademik"> non - akademik </option>
                                        <option value="bidikmisi"> bidikmisi </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="berkas"> Upload Berkas Syarat </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="berkas" id="berkas" required disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" name="daftar" value="daftar" id="submit" class="btn w-100 btn-success" disabled> Daftar </button>
                                </div>
                                <div class="col-6">
                                    <button type="reset" class="btn w-100 btn-secondary"> Batal </button>
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
    <script>
        $(document).ready(function() {
            // Get Value Input IPK
            var ipk = $("#ipk").val();
            if (ipk >= 3) {
                // Jika True Maka hapus disabled
                $("#beasiswa, #berkas, #submit").removeAttr("disabled");
            }
        });
    </script>
</body>

</html>