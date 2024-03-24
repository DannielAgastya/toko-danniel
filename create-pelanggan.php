<?php

require "koneksi.php";

$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$telepon = $_POST["nomortelepon"];

$sql = "INSERT INTO pelanggan (nama, alamat, nomortelepon) VALUES ('$nama', '$alamat', '$telepon')";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: pelanggan.php");
}
