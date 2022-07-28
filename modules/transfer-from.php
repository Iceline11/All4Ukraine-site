<?php
include "../dbconnect/dbconnect.php";

function transfer_from_link ($pdo, $trans_id) {
    $name = $pdo->query("SELECT * FROM orders WHERE order_id = '$trans_id'")->fetch(PDO::FETCH_OBJ);
    echo 'Перенесено з <b><a href="../view/view_order.php?od='. $name->card_order .'">"' . $name->name_ua . '"</a></b>';
}