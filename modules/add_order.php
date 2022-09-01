<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";

$name_ua = htmlspecialchars($_POST['name_ua']);
$name_en = htmlspecialchars($_POST['name_en']);
$name_sk = htmlspecialchars($_POST['name_sk']);
$date = htmlspecialchars($_POST['date']);
$goal = htmlspecialchars($_POST['goal']);
$start_sum = htmlspecialchars($_POST['start_sum']);
$pict_src_ua = basename($_FILES["fileToUpload_ua"]["name"]);

// check pictures for en
if ($_FILES["fileToUpload_en"]["name"] !== "") {
    $pict_src_en = basename($_FILES["fileToUpload_en"]["name"]);
    include "pic_upload_en.php";
}
else {
    $pict_src_en = NULL;
}

// check pictures for sk
if ($_FILES["fileToUpload_sk"]["name"] !== "") {
    $pict_src_sk = basename($_FILES["fileToUpload_sk"]["name"]);
    include "pic_upload_sk.php";
}
else {
    $pict_src_sk = NULL;
}

$descr_ua = htmlspecialchars($_POST['descr_ua']);
$descr_en = htmlspecialchars($_POST['descr_en']);
$descr_ck = htmlspecialchars($_POST['descr_ck']);


include "pic_upload_ua.php";

// Define max order
$sql_max_order = $pdo->query('SELECT MAX(card_order) FROM orders');
$order_res = $sql_max_order->fetch(PDO::FETCH_OBJ);
$result_in_array =  (array) $order_res;
$new_order = $result_in_array["MAX(card_order)"] + 1;

//insert into DB
$sql_new_order = "INSERT INTO `orders` (
                      `order_id`, 
                      `name_ua`, 
                      `name_en`, 
                      `name_sk`, 
                      `date`, 
                      `goal`, 
                      `start_sum`, 
                      `pict_src_ua`, 
                      `pict_src_en`, 
                      `pict_src_sk`, 
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
                      '$pict_src_ua', 
                      '$pict_src_en', 
                      '$pict_src_sk', 
                      '$descr_ua', 
                      '$descr_en', 
                      '$descr_ck', 
                      '1', 
                      '$new_order')";
$count = $pdo->query($sql_new_order);
if ($count==true) {
    echo "<br> Заявка успішно додана";
}
else {
    echo "Щось пішло не так";
}

include '../view/footer.php'; // add footer
