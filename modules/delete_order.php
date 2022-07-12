<?php
include "dbconnect.php";
$order_id = $_GET['id'];
$sql_order_delete = 'DELETE FROM `orders` WHERE order_id = :getid ';
$del_id = $pdo->prepare($sql_order_delete);
$del_id -> execute([':getid' => $order_id]);

header('Location: ../index.php');