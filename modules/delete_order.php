<?php
include "dbconnect.php";

$order_id = $_GET['id'];

// Define quant order
$sql_quant_order = $pdo->query('SELECT COUNT(*) FROM orders');
$order_res = $sql_quant_order->fetch(PDO::FETCH_ASSOC);
$quant_order = $order_res["COUNT(*)"];


// Define card_order of this order
$sql_def_order = $pdo->query("SELECT card_order FROM orders WHERE order_id = '$order_id' ");
$order_res = $sql_def_order->fetch(PDO::FETCH_ASSOC);
$this_order =  $order_res["card_order"];

// Update orders
$n = $quant_order - $this_order - 1;
for ($i = 0; $i <= $n; $i++) {
    $new_order = $this_order + $i + 1;
    $sql_update_orders = $pdo->query("UPDATE orders SET card_order = card_order - 1 WHERE card_order = $new_order");
}


// Delete this order
$sql_order_delete = 'DELETE FROM `orders` WHERE order_id = :getid ';

$del_id = $pdo->prepare($sql_order_delete);
$del_id -> execute([':getid' => $order_id]);

header('Location: ../index.php');