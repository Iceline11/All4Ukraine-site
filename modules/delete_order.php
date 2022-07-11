<?php
include "dbconnect.php";
$order_id = $_GET['id'];
$sql_order_delete = "DELETE FROM `orders` WHERE order_id = '$order_id'";
$pdo->query($sql_order_delete);
header('Location: ../index.php');