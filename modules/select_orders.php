<?php
include "dbconnect.php";

$sql_select_orders = "SELECT * FROM `orders`";
$orders = $pdo->query($sql_select_orders);
