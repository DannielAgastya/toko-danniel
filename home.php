<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <style>
        body {
            /* Menambahkan background image */
            background-image: url('img/16714651_coffe_branch_1.jpg');
            /* Ganti 'img/background.jpg' dengan path gambar latar belakang Anda */
            background-size: cover;
            /* Menyesuaikan ukuran gambar dengan ukuran halaman */
            background-position: center;
            /* Posisi gambar latar belakang di tengah */
            font-family: Arial, sans-serif;
            /* Menggunakan font Arial atau sans-serif */
        }

        /* CSS untuk mengatur ukuran gambar */
        img {
            display: block;
            /* Menjadikan gambar elemen blok */
            float: left;
            /* Mengatur gambar ke kiri */
            margin: 70px 20px 20px 20px;
            /* Memberikan margin atas 70px, kanan 20px, bawah 20px, kiri 20px */
            max-width: 30%;
            /* Mengatur lebar maksimum gambar agar tidak melebihi lebar container */
            height: auto;
            /* Tinggi gambar akan disesuaikan sesuai aspek rasio */
            transition: transform 0.5s;
            /* Efek transisi untuk animasi */
        }

        /* CSS untuk mengatur animasi saat dihover */
        img:hover {
            transform: scale(1.1);
            /* Memperbesar gambar sebesar 10% saat dihover */
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <div>
        <img src="img/4081449.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

    <div>
        <img src="img/3544089.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

    <div>
        <img src="img/4122024.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

    <div>
        <img src="img/19jan4.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

    <div>
        <img src="img/9700051_4243752.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

    <div>
        <img src="img/8584695_3953803.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

    <div>
        <img src="img/88740958_344.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

    <div>
        <img src="img/88741000_345.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

    <div>
        <img src="img/88740902_342.jpg">
        <!-- Ganti 'gambar_home.jpg' dengan lokasi dan nama file gambar Anda -->
    </div>

</body>

</html>