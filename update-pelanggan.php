<?php

require "koneksi.php";

$id = $_POST["id"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$nomor_telepon = $_POST["nomortelepon"];

$sql = "UPDATE pelanggan SET nama = '$nama', alamat = '$alamat', nomortelepon = '$nomor_telepon' WHERE id = '$id'";
mysqli_query($koneksi, $sql);

if (mysqli_error($koneksi)) {
    echo mysqli_error($koneksi);
} else {
    header("location: pelanggan.php");
}
