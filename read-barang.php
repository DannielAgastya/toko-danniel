<!DOCTYPE html>
<html>

<head>
    <title>Read Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 10px;
        }

        table td input,
        table td select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        table td button {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table td button[type="reset"] {
            background-color: #f44336;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM barang WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $barang = mysqli_fetch_array($query);
    ?>

    <div class="container">
        <form action="update-barang.php" method="POST">
            <h1>Lihat Barang</h1>

            <input type="hidden" name="id" value="<?= $id ?>">

            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?= $barang["nama"] ?>"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                            <option value="makanan" <?= $barang["kategori"] == "makanan" ? "selected" : "" ?>>makanan</option>
                            <option value="minuman" <?= $barang["kategori"] == "minuman" ? "selected" : "" ?>>minuman</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" value="<?= $barang["stok"] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="number" name="harga_beli" value="<?= $barang["harga_beli"] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="number" name="harga_jual" value="<?= $barang["harga_jual"] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">ATUR ULANG</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>