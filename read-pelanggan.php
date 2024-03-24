<!DOCTYPE html>
<html>

<head>
    <title>Data Pelanggan</title>
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

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        td:first-child {
            font-weight: bold;
            width: 30%;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button[type="submit"],
        button[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
        }

        button[type="reset"] {
            background-color: #f44336;
            margin-left: 10px;
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM pelanggan WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $pelanggan = mysqli_fetch_array($query);
    ?>

    <div class="container">
        <h1>Data Pelanggan</h1>
        <table>
            <tr>
                <th>Nama Pelanggan</th>
                <td><?= $pelanggan["nama"] ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $pelanggan["alamat"] ?></td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td><?= $pelanggan["nomortelepon"] ?></td>
            </tr>
            <tr>
                <th>Dibuat pada</th>
                <td><?= $pelanggan["created_at"] ?></td>
            </tr>
            <tr>
                <th>Diubah pada</th>
                <td><?= $pelanggan["updated_at"] ?></td>
            </tr>
        </table>
        <button onclick="window.location.href='pelanggan.php'">Kembali</button>
    </div>
</body>

</html>