<?php
include "../dbconnect/dbconnect.php";

// Select orders for list
$sql_select_orders = $pdo->query('SELECT * FROM `orders` WHERE status = 1 OR status = 2 ORDER BY card_order DESC');




