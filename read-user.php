<!DOCTYPE html>
<html>

<head>
    <title>Read User</title>
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
    if ($_SESSION["level"] != "admin") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }

    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $user = mysqli_fetch_array($query);
    ?>

    <div class="container">
        <form action="update-user.php" method="POST">
            <h1>Lihat User</h1>

            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="old_password" value="<?= $user["password"] ?>">

            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="username" value="<?= $user["username"] ?>" readonly></td>
                </tr>
                <tr>
                    <td>Kata Sandi</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Tingkat</td>
                    <td>
                        <select name="level" readonly>
                            <option value="admin" <?= $user["level"] == "admin" ? "selected" : "" ?>>admin</option>
                            <option value="keuangan" <?= $user["level"] == "keuangan" ? "selected" : "" ?>>keuangan</option>
                            <option value="logistik" <?= $user["level"] == "logistik" ? "selected" : "" ?>>logistik</option>
                        </select>
                    </td>
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