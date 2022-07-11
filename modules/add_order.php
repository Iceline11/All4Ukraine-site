<?php
include "dbconnect.php";

$name_ua = htmlspecialchars($_POST['name_ua']);
$name_en = htmlspecialchars($_POST['name_en']);
$name_sk = htmlspecialchars($_POST['name_sk']);
$date = htmlspecialchars($_POST['date']);
$goal = htmlspecialchars($_POST['goal']);
$start_sum = htmlspecialchars($_POST['start_sum']);
$donat_amount = htmlspecialchars($_POST['donat_amount']);
$pict_src = htmlspecialchars($_POST['pict_src']);
$descr_ua = htmlspecialchars($_POST['descr_ua']);
$descr_en = htmlspecialchars($_POST['descr_en']);
$descr_ck = htmlspecialchars($_POST['descr_ck']);

//insert into
$sql_new_order = "INSERT INTO `orders` (
                      `id`, 
                      `name_ua`, 
                      `name_en`, 
                      `name_sk`, 
                      `date`, 
                      `goal`, 
                      `start_sum`, 
                      `donat_amount`, 
                      `pict_src`, 
                      `descr_ua`, 
                      `descr_en`, 
                      `descr_ck`, 
                      `status`, 
                      `card_order`) 
              VALUES (
                      NULL, 
                      '$name_ua', 
                      '$name_en', 
                      '$name_sk', 
                      '$date', 
                      '$goal', 
                      '$start_sum', 
                      '$donat_amount', 
                      NULL, 
                      '$descr_ua', 
                      '$descr_en', 
                      '$descr_ck', 
                      '1', 
                      NULL)";
$count = $connection->exec($sql_new_order);
echo $count;
