<?php
include 'config.php';

// Hitung Jumlah Data penerima beasiswa akademik
$queryAkademik = "SELECT COUNT(*) FROM `mahasiswa` WHERE beasiswa = 'akademik'";
$sqlAkademik = mysqli_query($db, $queryAkademik);
$akademik = mysqli_fetch_assoc($sqlAkademik);
$jmlAkademik = $akademik['COUNT(*)'];

// Hitung jumlah data penerima beasiswa non akademik
$queryNonakademik = "SELECT COUNT(*) FROM `mahasiswa` WHERE beasiswa = 'non-akademik'";
$sqlNonakademik = mysqli_query($db, $queryNonakademik);
$nonakademik = mysqli_fetch_assoc($sqlNonakademik);
$jmlNonakademik = $nonakademik['COUNT(*)'];

// Hitung jumlah data penerima beasiswa bidikmisi
$queryBidikmisi = "SELECT COUNT(*) FROM `mahasiswa` WHERE beasiswa = 'bidikmisi'";
$sqlBidikmisi = mysqli_query($db, $queryBidikmisi);
$bidikmisi = mysqli_fetch_assoc($sqlBidikmisi);
$jmlBidikmisi = $bidikmisi['COUNT(*)'];

$total = totalData($jmlAkademik, $jmlNonakademik, $jmlBidikmisi);

function totalData($akademik, $nonakademik, $bidikmisi)
{
    $total = $akademik + $nonakademik + $bidikmisi;
    return $total;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Chart -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>

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

    <h3 class="text-center mt-3"> Grafik Pendataan Beasiswa </h3>
    <p class="text-center">Total Data <?= $total; ?></p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <a href="hasil.php" class="btn btn-secondary d-block">Kembali</a>
                <!-- Tampil Chart -->
                <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
            </div>
        </div>
    </div>
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            // Set Data
            const data = google.visualization.arrayToDataTable([
                ['Beasiswa', 'Jumlah'],
                ['Akademik', <?= $jmlAkademik ?>],
                ['Non Akademik', <?= $jmlNonakademik ?>],
                ['Bidikmisi', <?= $jmlBidikmisi ?>],
            ]);

            // Set Options
            const options = {
                title: 'Grafik Jumlah Penerima Beasiswa'
            };

            // Draw
            const chart = new google.visualization.BarChart(document.getElementById('myChart'));
            chart.draw(data, options);

        }
    </script>

    <!--Option 1: Bootstrap Bundle with Popper-->
    <script script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>