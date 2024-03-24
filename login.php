<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* Background image */
            background-image: url(img/leaf-nature-backgrounds-pattern-illustration-plant-backdrop-design-abstract-vibrant-green-nature-wallpaper-illustration-generative-ai.jpg);
            background-size: cover;
            /* Scale the background image to cover the entire container */
            background-position: center;
            /* Center the background image */
            background-repeat: no-repeat;
            /* Do not repeat the background image */
            height: 100vh;
            /* Set height to full viewport height */
            display: flex;
            /* Flex container to center form vertically */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Transparent white background for form */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        button[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin-right: 10px;
            /* Menambahkan jarak kanan 10px */
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="validasi.php" method="POST">
        <h1>Selamat Datang!</h1>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">LOGIN</button>
                    <button type="reset">CLEAR</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>