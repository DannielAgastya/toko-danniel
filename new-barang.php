<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Barang</title>
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
            background-color: transparent;
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
    if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "logistik") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }
    ?>

    <div class="container">
        <h1>Tambah Barang</h1>
        <form action="create-barang.php" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori" required>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" min="0" name="stok" required></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="number" min="0" name="harga_beli" required></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="number" min="0" name="harga_jual" required></td>
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