<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #0d652d;
            /* Ubah warna latar belakang ke hijau */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        nav ul li {
            position: relative;
            display: inline-block;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
            display: block;
        }

        nav ul li a:hover {
            background-color: #0f7a3f;
            /* Ubah warna latar belakang saat dihover menjadi hijau yang lebih terang */
        }

        nav ul ul {
            display: none;
            position: absolute;
            background-color: #0d652d;
            /* Ubah warna latar belakang submenu ke hijau */
            border-top: 1px solid #444;
            top: 100%;
            left: 0;
            z-index: 1000;
        }

        nav ul li:hover ul {
            display: block;
        }

        nav ul ul li {
            display: block;
        }

        nav ul ul li a {
            padding: 10px 20px;
        }

        nav ul ul li a:hover {
            background-color: #0f7a3f;
            /* Ubah warna latar belakang submenu saat dihover menjadi hijau yang lebih terang */
        }

        .user-info {
            color: white;
            position: relative;
        }

        .user-info ul {
            display: none;
            position: absolute;
            background-color: #0d652d;
            /* Ubah warna latar belakang submenu user-info ke hijau */
            border: 1px solid #444;
            top: 100%;
            right: 0;
            z-index: 1000;
        }

        .user-info:hover ul {
            display: block;
        }

        .user-info ul li {
            display: block;
        }

        .user-info ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        .user-info ul li a:hover {
            background-color: #0f7a3f;
            /* Ubah warna latar belakang submenu saat dihover menjadi hijau yang lebih terang */
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_SESSION["username"]) || empty($_SESSION["username"]) || !isset($_SESSION["level"]) || empty($_SESSION["level"])) {
        header("location:logout.php");
        exit;
    }
    ?>

    <nav>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li>
                <a href="#">MASTER</a>
                <ul>
                    <?php if ($_SESSION["level"] == "admin") : ?>
                        <li><a href="user.php">Pengguna</a></li>
                    <?php endif ?>
                    <li><a href="barang.php">Barang</a></li>
                    <li><a href="pelanggan.php">Pelanggan</a></li>
                </ul>
            </li>
            <li>
                <a href="#">TRANSAKSI</a>
                <ul>
                    <li><a href="penjualan.php">Penjualan</a></li>

                </ul>
            </li>
        </ul>
        <div class="user-info">
            Selamat datang, <?= $_SESSION["username"] ?>!
            <ul>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>
    </nav>
</body>

</html>