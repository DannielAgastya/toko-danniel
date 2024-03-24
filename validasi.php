<?php

require "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE username = '$username'";
$query = mysqli_query($koneksi, $sql);
$jumlah_user = mysqli_num_rows($query);

if ($jumlah_user == 1) {
    $user = mysqli_fetch_array($query);
    $password_benar = password_verify($password, $user["password"]);

    if ($password_benar) {
        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["level"] = $user["level"];
        header("location: home.php");
    } else {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                width: 50%;
                margin: 100px auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                text-align: center;
            }
            .notification {
                background-color: #f44336;
                color: white;
                padding: 10px;
                margin-bottom: 15px;
                border-radius: 5px;
            }
            .notification-close {
                float: right;
                cursor: pointer;
            }
        </style>
        </head>
        <body>
        <div class="container">
            <div class="notification">
                Username atau password tidak valid silahkan cek kembali ya!                 
                <span class="notification-close" onclick="this.parentElement.style.display=\'none\'">&times;</span>
            </div>
        </div>
        </body>
        </html>';
    }
} else {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .notification {
            background-color: #f44336;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .notification-close {
            float: right;
            cursor: pointer;
        }
    </style>
    </head>
    <body>
    <div class="container">
        <div class="notification">
            Username tidak ditemukan
            <span class="notification-close" onclick="this.parentElement.style.display=\'none\'">&times;</span>
        </div>
    </div>
    </body>
    </html>';
}
