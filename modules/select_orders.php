<?php
include "dbconnect.php";

$sql_select_orders = $pdo->query('SELECT * FROM `orders` ORDER BY card_order ASC ');

