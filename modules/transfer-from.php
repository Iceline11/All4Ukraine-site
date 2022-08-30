<?php
include "../dbconnect/dbconnect.php";

function transfer_from_link ($pdo, $trans_id) {
    $name = $pdo->query("SELECT * FROM orders WHERE order_id = '$trans_id'")->fetch(PDO::FETCH_OBJ);
    if (get_user_lang() == "ua") {
        echo 'Перенесено з <b><a href="../view/view_order.php?od='. $name->card_order .'">"' . $name->name_ua . '"</a></b>'; }
    elseif (get_user_lang() == "en") {
        echo 'Transferred from <b><a href="../view/view_order.php?od='. $name->card_order .'">"' . $name->name_en . '"</a></b>'; }
    else {
        echo 'Prenesené z <b><a href="../view/view_order.php?od='. $name->card_order .'">"' . $name->name_ck . '"</a></b>';
    }
}