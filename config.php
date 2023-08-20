<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$nama_db = 'beasiswa';

$db = mysqli_connect($server,$username,$password,$nama_db);

if(!$db){
    echo "Database belum terhubung". mysqli_connect_error();
}
