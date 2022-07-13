<?php

include "dbconnect.php";

// recive POST dates
$id = htmlspecialchars($_POST['id']);
$goal = htmlspecialchars($_POST['goal']);

//insert into DB
$sql_update_goal = "UPDATE `orders` SET
                      `goal` = '$goal'
                WHERE `orders`.`order_id` = '$id'";

$count = $pdo->query($sql_update_goal);

header('Location: ../index.php?info=success');
