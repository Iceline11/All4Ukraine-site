<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";

// recive POST dates
$id = $_POST['id'];
$name_ua = htmlspecialchars($_POST['name_ua']);
$name_en = htmlspecialchars($_POST['name_en']);
$name_sk = htmlspecialchars($_POST['name_sk']);
$date = htmlspecialchars($_POST['date']);
$category = htmlspecialchars($_POST['category']);
$descr_ua = htmlspecialchars($_POST['descr_ua']);
$descr_en = htmlspecialchars($_POST['descr_en']);
$descr_sk = htmlspecialchars($_POST['descr_sk']);


// if we have new picture
if ($_FILES["fileToUpload"]["name"] !== "") {

    include "pic_upload.php";
    $new_picture = basename($_FILES["fileToUpload"]["name"]);
    $pict_src = "`pict_src` = '$new_picture', ";
} else {
    $pict_src = NULL;
}

//insert into DB
$sql_edit_order = "UPDATE `news` SET
                      `name_ua` = '$name_ua', 
                      `name_en` = '$name_en',
                      `name_sk` = '$name_sk', 
                      `date` = '$date',
                      `category` = '$category', 
                    " . $pict_src . "
                      `descr_ua` = '$descr_ua', 
                      `descr_en` = '$descr_en', 
                      `descr_sk` = '$descr_sk'
                WHERE `news`.`news_id` = '$id'";

$count = $pdo->query($sql_edit_order);
if ($count==true) {
    echo "<br> Заявка успішно додана<br><a href='../view/news.php'> До новин</a>";
}
else {
    echo "Щось пішло не так";
}

include '../view/footer.php'; // add footer
