<?php
include "../dbconnect/dbconnect.php";

function transfer_link ($pdo, $trans_id) {
    $name = $pdo->query("SELECT * FROM orders WHERE order_id = '$trans_id'")->fetch(PDO::FETCH_OBJ);
    echo 'Перенесено до <b><a href="../view/view_order.php?od='. $name->card_order .'">"' . $name->name_ua . '"</a></b>';
}