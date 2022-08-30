<?php
include "../dbconnect/dbconnect.php";

// Select orders for list
$sql_select_orders = $pdo->query('SELECT * FROM `orders` WHERE `order_id` !=1 AND status = 1 OR status = 2 ORDER BY card_order DESC');




