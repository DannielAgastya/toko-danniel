<!DOCTYPE html>
<html>

<head>
    <title>User</title>
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
            border: 2px solid black;
            /* Tambahkan garis tebal pada tabel */
        }

        table th,
        table td {
            padding: 8px;
            border: 2px solid black;
            text-align: center;
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
    if ($_SESSION["level"] != "admin") {
        // jika di sesi ini levelnya bukan admin, akses ditolak
        echo "<strong>Anda tidak dapat mengakses halaman ini</strong>";
        exit;
    }

    require "koneksi.php";

    // cari semua user dari database
    $sql = "SELECT * FROM user";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Pengguna</h1>
        <form action="new-user.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Tingkat</th>
                <th>Dibuat pada</th>
                <th>Diubah pada</th>
                <th colspan="2">Aksi</th>
            </tr>
            <!-- ambil (fetch) data user satu per satu, lalu tampilkan -->
            <?php $i = 1; ?>
            <?php while ($user = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><strong><?= $i ?></strong></td>
                    <td><strong><?= $user["username"] ?></strong></td>
                    <td><strong><?= $user["level"] ?></strong></td>
                    <td><strong><?= $user["created_at"] ?></strong></td>
                    <td><strong><?= $user["updated_at"] ?></strong></td>
                    <td>
                        <form action="read-user.php" method="GET">
                            <input type="hidden" name="id" value='<?= $user["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-user.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $user["id"] ?>'>
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
    </div>
    <script>
        // tampilkan konfirmasi sebelum hapus
        function konfirmasi(form) {
            formData = new FormData(form);
            id = formData.get("id");
            return confirm(`Hapus user '${id}'?`);
        }
    </script>
</body>

</html>