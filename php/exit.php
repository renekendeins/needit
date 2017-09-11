<?php 
 $username = $_COOKIE['username_cookie'];


if (isset($_COOKIE['username_cookie'])) {
    unset($_COOKIE['username_cookie']);
    setcookie('username_cookie', '', time()-(86400*30), '/'); // empty value and old timestamp
}
header('location:../index.php');

 ?>