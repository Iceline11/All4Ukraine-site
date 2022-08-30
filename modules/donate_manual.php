<?php
include "../dbconnect/dbconnect.php";
$order_id = $_POST['order_id'];
$donater_name = $_POST['donater'];
$sum = $_POST['sum'];
$method = $_POST['method'];
$allow = $_POST['allow'];


//Current date
date_default_timezone_set('Europe/Kiev');
$date = date("Y-m-d H:i:s");

$sql_new_donate = "INSERT INTO `donate_list` (
                            `id`,
                            `order_id`,
                            `sum`,
                            `donater`,
                            `method`,
                            `date`,
                            `status`,
                            `allow_transfer`,
                            `transfer_id`
                           )
              VALUES (
                      NULL,
                      '$order_id',
                      '$sum',
                      '$donater_name',
                      '$method',
                      '$date',
                      1,
                      '$allow',
                      NULL
                      )";
$count = $pdo->query($sql_new_donate);

if (isset($_POST['page'])) {
    header("Location: ../view/report.php");
}
else {
    $order = $pdo->query("SELECT card_order FROM orders where order_id='$order_id'")->fetch(PDO::FETCH_OBJ);
    header("Location: ../view/view_order.php?od=$order->card_order");
}
