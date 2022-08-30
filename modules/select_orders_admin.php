<?php
include "../dbconnect/dbconnect.php";
$sql_select_orders = $pdo->query('SELECT * FROM `orders` WHERE `order_id` !=1 ORDER BY card_order DESC');

