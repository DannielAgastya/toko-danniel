<!DOCTYPE html>
<html>

<head>
    <title>Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('img/brown-papyrus-paper.jpg');
            /* Path gambar latar belakang */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: transparent;
            /* Menambahkan lapisan transparan pada tabel */
        }

        table th,
        table td {
            padding: 8px;
            border: 2px solid black;
            text-align: center;
            font-weight: bold;
            /* Membuat teks tebal */
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

        .message {
            color: red;
        }

        /* CSS untuk menyembunyikan navbar saat mencetak */
        @media print {
            .navbar {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";
    $sql = "SELECT penjualan.id, barang.nama as nama_barang, penjualan.jumlah, penjualan.total_harga, user.username, penjualan.created_at FROM barang JOIN penjualan on barang.id = penjualan.id_barang JOIN user ON user.id = penjualan.id_staff ORDER BY penjualan.created_at DESC";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div class="container">
        <h1>Data Penjualan</h1>
        <button onclick="cetak()">Cetak</button> <!-- Tombol cetak -->
        <form action="new-penjualan.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table border="1">
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>Nama Barang</strong></th>
                <th><strong>Jumlah</strong></th>
                <th><strong>Total Harga</strong></th>
                <th><strong>Diinput oleh</strong></th>
                <th><strong>Waktu</strong></th>
                <th colspan="2"><strong>Aksi</strong></th>
            </tr>

            <?php $i = 1; ?>
            <?php while ($penjualan = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><strong><?= $i ?></strong></td>
                    <td><strong><?= $penjualan["nama_barang"] ?></strong></td>
                    <td><strong><?= $penjualan["jumlah"] ?></strong></td>
                    <td><strong><?= $penjualan["total_harga"] ?></strong></td>
                    <td><strong><?= $penjualan["username"] ?></strong></td>
                    <td><strong><?= $penjualan["created_at"] ?></strong></td>
                    <td>
                        <form action="read-penjualan.php" method="GET">
                            <input type="hidden" name="id" value='<?= $penjualan["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-penjualan.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $penjualan["id"] ?>'>
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
            return confirm(`Hapus penjualan '${id}'?`);
        }

        function cetak() {
            window.print();
        }
    </script>
</body>

</html>