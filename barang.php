<!DOCTYPE html>
<html>

<head>
    <title>Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('img/brown-papyrus-paper.jpg');
            /* Ganti 'background_image.jpg' dengan lokasi dan nama file gambar Anda */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            border: 2px solid black;
            text-align: center;
            font-weight: bold;
            /* Tambahkan properti ini untuk membuat semua teks di tebel */
        }

        table th {
            border-collapse: collapse;
        }

        table tr:nth-child(even) {
            border-collapse: collapse;
        }

        table tr:hover {
            background-color: #ddd;
        }

        button {
            padding: 6px 10px;
            cursor: pointer;
        }

        .container {
            margin: 20px;
        }

        .message {
            color: red;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";

    $sql = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Barang</h1>
        <form action="new-barang.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga beli</th>
                <th>Harga jual</th>
                <th>Dibuat pada</th>
                <th>Diubah pada</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php while ($barang = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $barang["nama"] ?></td>
                    <td><?= $barang["kategori"] ?></td>
                    <td><?= $barang["stok"] ?></td>
                    <td><?= $barang["harga_beli"] ?></td>
                    <td><?= $barang["harga_jual"] ?></td>
                    <td><?= $barang["created_at"] ?></td>
                    <td><?= $barang["updated_at"] ?></td>
                    <td>
                        <form action="read-barang.php" method="GET">
                            <input type="hidden" name="id" value='<?= $barang["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-barang.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $barang["id"] ?>'>
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
    </div>
    <script>
        function konfirmasi(form) {
            formData = new FormData(form);
            id = formData.get("id");
            return confirm(`Hapus barang '${id}'?`);
        }
    </script>
</body>

</html>