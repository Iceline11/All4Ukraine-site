<?php
$user = $_POST['user'];
$password = $_POST['password'];

if ($user == "All4Ukraine" and $password == "!sqqQWSaas1234") {
    setcookie("login", $user, time() + 14 * 86400, "/");
    setcookie("password", $password, time() + 14 * 86400, "/");
    header('Location: ../view/order_list.php');
}
else {
    header('Location: ../view/login.php');
}
?>