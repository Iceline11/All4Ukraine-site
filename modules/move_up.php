<?php
include "../dbconnect/dbconnect.php";

// Define id and card_order of this order
$order_id = $_GET['id'];
$sql_def_order = $pdo->query("SELECT * FROM orders WHERE order_id = '$order_id' ");
$order_res = $sql_def_order->fetch(PDO::FETCH_ASSOC);
$this_order = $order_res["card_order"];
$this_id = $order_res["order_id"];

// Define max order
$sql_max_order = $pdo->query("SELECT MAX(card_order) FROM orders");
$order_res = $sql_max_order->fetch(PDO::FETCH_ASSOC);
$max_card = $order_res["MAX(card_order)"];


if ($this_order == $max_card) {
    header('Location: ../index.php?info=first');
} else {
    //move order bottom with change previous order
    $next_order = $this_order + 1;
    $sql_move_top = $pdo->query("
    UPDATE orders SET card_order = card_order - 1 WHERE card_order = $next_order;
    UPDATE orders SET card_order = card_order + 1 WHERE order_id = $this_id
                                        ");

    header('Location: ../view/order_list.php?isadmin=true');
}