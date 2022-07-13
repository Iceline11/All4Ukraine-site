<?php

include "dbconnect.php";

// recive POST dates
$id = htmlspecialchars($_POST['id']);
$amount = htmlspecialchars($_POST['amount']);

//insert into DB
$sql_update_amount = "UPDATE `orders` SET
                      `start_sum` = '$amount'
                WHERE `orders`.`order_id` = '$id'";

$count = $pdo->query($sql_update_amount);

header('Location: ../index.php?info=success');
