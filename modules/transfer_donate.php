<?php
$donate_id = $_POST['donate_id'];
$order_id = $_POST['order_id'];

include "../dbconnect/dbconnect.php";

$sql_transfer_donate = $pdo->query("UPDATE donate_list SET transfer_id = '$order_id' WHERE id = '$donate_id'");

$search_order = $pdo->query("SELECT order_id FROM donate_list where id='$donate_id'")->fetch(PDO::FETCH_OBJ);
echo $search_order->order_id;
$get_order = $pdo->query("SELECT card_order FROM orders where order_id='$search_order->order_id'")->fetch(PDO::FETCH_OBJ);

header("Location: ../view/view_order.php?od=$get_order->card_order");