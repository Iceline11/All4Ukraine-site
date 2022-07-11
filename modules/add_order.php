<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "dbconnect.php";
include "pic_upload.php";

$name_ua = htmlspecialchars($_POST['name_ua']);
$name_en = htmlspecialchars($_POST['name_en']);
$name_sk = htmlspecialchars($_POST['name_sk']);
$date = htmlspecialchars($_POST['date']);
$goal = htmlspecialchars($_POST['goal']);
$start_sum = htmlspecialchars($_POST['start_sum']);
$donat_amount = htmlspecialchars($_POST['donat_amount']);
$pict_src = basename($_FILES["fileToUpload"]["name"]);
$descr_ua = htmlspecialchars($_POST['descr_ua']);
$descr_en = htmlspecialchars($_POST['descr_en']);
$descr_ck = htmlspecialchars($_POST['descr_ck']);

//insert into DB
$sql_new_order = "INSERT INTO `orders` (
                      `order_id`, 
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
                      '$pict_src', 
                      '$descr_ua', 
                      '$descr_en', 
                      '$descr_ck', 
                      '1', 
                      NULL)";
$count = $pdo->query($sql_new_order);

echo "Заявка успішно додана";

include '../view/footer.php'; // add footer
