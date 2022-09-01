<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";

// Define max order
$sql_max_order = $pdo->query('SELECT MAX(card_order) FROM orders');
$order_res = $sql_max_order->fetch(PDO::FETCH_OBJ);
$result_in_array =  (array) $order_res;

// recive POST dates
$id = $_POST['id'];
$name_ua = htmlspecialchars($_POST['name_ua']);
$name_en = htmlspecialchars($_POST['name_en']);
$name_sk = htmlspecialchars($_POST['name_sk']);
$date = htmlspecialchars($_POST['date']);
$goal = htmlspecialchars($_POST['goal']);
$start_sum = htmlspecialchars($_POST['start_sum']);
$descr_ua = htmlspecialchars($_POST['descr_ua']);
$descr_en = htmlspecialchars($_POST['descr_en']);
$descr_ck = htmlspecialchars($_POST['descr_ck']);


// if we have new picture
//if($_FILES["fileToUpload"]["name"] !== "") {
//
//    include "pic_upload_ua.php";
//    $new_picture = basename($_FILES["fileToUpload"]["name"]);
//    $pict_src = "`pict_src` = '$new_picture', ";
//}
//else {
//    $pict_src = NULL;
//}

// check pictures for ua
if ($_FILES["fileToUpload_ua"]["name"] !== "") {
    $pict_ua = basename($_FILES["fileToUpload_ua"]["name"]);
    include "pic_upload_ua.php";
    $pict_src_ua = "`pict_src_ua` = '$pict_ua', ";
}
else {
    $pict_src_ua = NULL;
}

// check pictures for en
if ($_FILES["fileToUpload_en"]["name"] !== "") {
    $pict_en = basename($_FILES["fileToUpload_en"]["name"]);
    include "pic_upload_en.php";
    $pict_src_en = "`pict_src_en` = '$pict_en', ";
}
else {
    $pict_src_en = NULL;
}

// check pictures for sk
if ($_FILES["fileToUpload_sk"]["name"] !== "") {
    $pict_sk = basename($_FILES["fileToUpload_sk"]["name"]);
    include "pic_upload_sk.php";
    $pict_src_sk = "`pict_src_sk` = '$pict_sk', ";
}
else {
    $pict_src_sk = NULL;
}


//insert into DB
$sql_edit_order = "UPDATE `orders` SET
                      `name_ua` = '$name_ua', 
                      `name_en` = '$name_en',
                      `name_sk` = '$name_sk', 
                      `date` = '$date',
                      `goal` = '$goal', 
                      `start_sum` = '$start_sum',
                    " . $pict_src_ua . "
                    " . $pict_src_en . "
                    " . $pict_src_sk . "
                      `descr_ua` = '$descr_ua', 
                      `descr_en` = '$descr_en', 
                      `descr_ck` = '$descr_ck', 
                      `status` = '1'
                WHERE `orders`.`order_id` = '$id'";

$count = $pdo->query($sql_edit_order);
if ($count==true) {
    echo "<br> Заявка успішно змінена";
}
else {
    echo "Щось пішло не так";
}

include '../view/footer.php'; // add footer
