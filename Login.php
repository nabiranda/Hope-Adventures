<?php
ob_start();
include "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.html");
    exit;
}

$email = mysqli_real_escape_string($conn, trim($_POST["email"] ?? ''));
$password = mysqli_real_escape_string($conn, trim($_POST["password"] ?? ''));

if ($email === '' || $password === '') {
    header("Location: login.html?error=1");
    exit;
}

$sql = "SELECT * FROM user WHERE email ='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($user) {
    header('Location: /HOPE/Home.html');
    exit;
} else {
    header("Location: login.html?error=1");
    exit;
}
?>