<!DOCTYPE html>
<html>

<head>
    <title>Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('img/brown-papyrus-paper.jpg');
            /* Ganti path/to/your/background-image.jpg dengan path gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Optional: menjaga gambar tetap saat menggulir */
            color: black;
            /* Ganti warna teks agar cocok dengan gambar latar belakang */
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
            /* Menambahkan penegasan tebal */
        }

        table th {
            border: 2px solid black;
        }

        table tr:nth-child(even) {
            border: 1px solid black;
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

    $sql = "SELECT * FROM pelanggan";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Pelanggan</h1>
        <form action="new-pelanggan.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table border="1">
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>Nama</strong></th>
                <th><strong>Alamat</strong></th>
                <th><strong>Nomor Telepon</strong></th>
                <th><strong>Dibuat pada</strong></th>
                <th><strong>Diubah pada</strong></th>
                <th colspan="2"><strong>Aksi</strong></th>
            </tr>

            <?php $i = 1; ?>
            <?php while ($pelanggan = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><strong><?= $i ?></strong></td>
                    <td><strong><?= $pelanggan["nama"] ?></strong></td>
                    <td><strong><?= $pelanggan["alamat"] ?></strong></td>
                    <td><strong><?= $pelanggan["nomortelepon"] ?></strong></td>
                    <td><strong><?= $pelanggan["created_at"] ?></strong></td>
                    <td><strong><?= $pelanggan["updated_at"] ?></strong></td>
                    <td>
                        <form action="read-pelanggan.php" method="GET">
                            <input type="hidden" name="id" value='<?= $pelanggan["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-pelanggan.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $pelanggan["id"] ?>'>
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
            return confirm(`Hapus pelanggan '${id}'?`);
        }
    </script>
</body>

</html>