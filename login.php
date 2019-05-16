<?php

$conn = new mysqli('localhost', 'root', 'root', 'SocialNetwork');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

$stmt = $conn->prepare('CALL SocialNetwork.login_check(?,?)');
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 0) {
    $row = $result->fetch_assoc();

    setcookie('uname', $username, time() + 7200);
    echo "<script>alert('Login Successful!'); window.location= 'index.php';</script>";
} else {
    echo "<script>alert('Please try again!');history.go(-1)</script>";
}
include 'login.html';
