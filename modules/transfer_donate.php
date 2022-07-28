<?php
$donate_id = $_POST['donate_id'];
$order_id = $_POST['order_id'];

include "../dbconnect/dbconnect.php";

$sql_transfer_donate = $pdo->query("UPDATE donate_list SET transfer_id = '$order_id' WHERE id = '$donate_id'");

$order = $pdo->query("SELECT card_order FROM orders where order_id='$order_id'")->fetch(PDO::FETCH_OBJ);
header("Location: ../view/view_order.php?od=$order->card_order");