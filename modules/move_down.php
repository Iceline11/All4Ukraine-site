<?php
include "../dbconnect/dbconnect.php";

// Define id and card_order of this order
$order_id = $_GET['id'];
$sql_def_order = $pdo->query("SELECT * FROM orders WHERE order_id = '$order_id' ");
$order_res = $sql_def_order->fetch(PDO::FETCH_ASSOC);
$this_order =  $order_res["card_order"];
$this_id =  $order_res["order_id"];

if ($this_order == 1) {
    header('Location: ../index.php?info=last');
}
else {
    //move order to top with change previous order
    $previous_order = $this_order - 1;
    $sql_move_top = $pdo->query("
    UPDATE orders SET card_order = card_order + 1 WHERE card_order = $previous_order;
    UPDATE orders SET card_order = card_order - 1 WHERE order_id = $this_id
                                        ");

    header('Location: ../index.php');
}