<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('img/8851807_4002676.jpg');
            background-size: cover;
            /* Menyesuaikan ukuran gambar dengan ukuran halaman */
            background-position: center;
            /* Posisi gambar latar belakang di tengah */
            background-repeat: no-repeat;
            /* Do not repeat the background image */
        }

        #container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 8px;
            vertical-align: top;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 16px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        button[type="submit"],
        button[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin-left: 10px;
            /* Tambahkan margin kiri di sini */
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";

    $id = $_SESSION["id"];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $user = mysqli_fetch_array($query);
    ?>

    <div id="container">
        <form action="update-profil.php" method="POST">
            <h1>Profil</h1>

            <input type="hidden" name="id" value="<?= $id ?>">

            <table>
                <tr>
                    <td><strong>Username:</strong></td>
                    <td><input readonly type="text" name="username" value="<?= $user["username"] ?>"></td>
                </tr>
                <tr>
                    <td><strong>Password Baru:</strong></td>
                    <td><input required type="password" name="new_password"></td>
                </tr>
                <tr>
                    <td><strong>Ulangi Password Baru:</strong></td>
                    <td><input required type="password" name="confirm_password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">Simpan</button>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>