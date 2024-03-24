<!DOCTYPE html>
<html>

<head>
    <title>Read Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT penjualan.id, barang.nama as nama_barang, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at FROM barang JOIN penjualan on barang.id = penjualan.id_barang JOIN user ON user.id = penjualan.id_staff WHERE penjualan.id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $penjualan = mysqli_fetch_array($query);
    ?>

    <div class="container">
        <h1>Lihat Penjualan</h1>
        <table>
            <tr>
                <td>Nama barang</td>
                <td><input readonly type="text" value="<?= $penjualan["nama_barang"] ?>"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input readonly type="text" value="<?= $penjualan["jumlah"] ?>"></td>
            </tr>
            <tr>
                <td>Total harga</td>
                <td><input readonly type="text" value="<?= $penjualan["total_harga"] ?>"></td>
            </tr>
            <tr>
                <td>Diinput oleh</td>
                <td><input readonly type="text" value="<?= $penjualan["username"] ?>"></td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td><input readonly type="text" value="<?= $penjualan["created_at"] ?>"></td>
            </tr>
        </table>
    </div>
</body>

</html>