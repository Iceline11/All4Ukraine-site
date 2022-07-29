<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";
include "pic_upload.php";

$name_ua = htmlspecialchars($_POST['name_ua']);
$name_en = htmlspecialchars($_POST['name_en']);
$name_sk = htmlspecialchars($_POST['name_sk']);
$date = htmlspecialchars($_POST['date']);
$category = htmlspecialchars($_POST['category']);
$pict_src = basename($_FILES["fileToUpload"]["name"]);
$descr_ua = htmlspecialchars($_POST['descr_ua']);
$descr_en = htmlspecialchars($_POST['descr_en']);
$descr_ck = htmlspecialchars($_POST['descr_ck']);

//insert into DB
$sql_new_news = "INSERT INTO `news` (
                      `news_id`, 
                      `name_ua`, 
                      `name_en`, 
                      `name_sk`, 
                      `date`, 
                      `category`, 
                      `pict_src`, 
                      `descr_ua`, 
                      `descr_en`, 
                      `descr_ck`) 
              VALUES (
                      NULL, 
                      '$name_ua', 
                      '$name_en', 
                      '$name_sk', 
                      '$date', 
                      '$category', 
                      '$pict_src', 
                      '$descr_ua', 
                      '$descr_en', 
                      '$descr_ck')";
$count = $pdo->query($sql_new_news)->execute();;
if ($count==true) {
    echo "<br> Заявка успішно додана";
}
else {
    echo "Щось пішло не так";
}

include '../view/footer.php'; // add footer
