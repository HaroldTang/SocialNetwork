<?php
$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
if ($_POST['submit']) {
    $stmt = $conn->prepare("CALL SocialNetwork.user_create(?,?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows != 0) {
        setcookie("uname", $username, time() + 7200);
        echo "<script>alert('Register Successful!');window.location= 'index.php';</script>";
    } else {
        echo "<script>alert('Failed');history.go(-1)</script>";
    }
}
include('register.html');
