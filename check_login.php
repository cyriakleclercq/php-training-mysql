<?php
include 'log.php';

$password = (isset($_POST['password']) ? sha1($_POST['password']) : null);
$login = (isset($_POST['username']) ? $_POST['username'] : null);


    $sql = "SELECT `username`,`password`,`id` from `user` WHERE '$login' = `username` AND '$password' = `password`";

    $dub = $conn->query($sql);

    $row = $dub-> fetch_assoc();

    $login = $row['username'];
    $password = $row['password'];

    if (isset($_POST['username']) and isset($_POST['password'])) {

        if ($login == $_POST['username'] && $password == sha1($_POST['password'])) {

            session_start();

            $_SESSION['login'] = $_POST['username'];
            $_SESSION['password'] = sha1($_POST['password']);
            echo'jouis';

            header('Location:read.php');
        }
        else {

            echo'Pas les bons log';
        }
    }
