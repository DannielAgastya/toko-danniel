<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
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

        form table {
            width: 100%;
        }

        form table td {
            padding: 10px;
        }

        form table td:first-child {
            width: 30%;
            text-align: right;
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
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
        }

        button[type="reset"] {
            background-color: #f44336;
            color: #fff;
            margin-left: 10px;
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah User</h1>
        <form action="create-user.php" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Kata Sandi</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Tingkat</td>
                    <td>
                        <select name="level">
                            <option value="admin">admin</option>
                            <option value="keuangan">keuangan</option>
                            <option value="logistik">logistik</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">ATUR ULANG</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>