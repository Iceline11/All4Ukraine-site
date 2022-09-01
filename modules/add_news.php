<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";
include "pic_upload_ua.php";

$name_ua = htmlspecialchars($_POST['name_ua']);
$name_en = htmlspecialchars($_POST['name_en']);
$name_sk = htmlspecialchars($_POST['name_sk']);
$date = htmlspecialchars($_POST['date']);
$category = htmlspecialchars($_POST['category']);
$pict_src = basename($_FILES["fileToUpload"]["name"]);
$descr_ua = htmlspecialchars($_POST['descr_ua']);
$descr_en = htmlspecialchars($_POST['descr_en']);
$descr_sk = htmlspecialchars($_POST['descr_sk']);

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
                      `descr_sk`) 
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
                      '$descr_sk')";
$count = $pdo->query($sql_new_news);

echo "<br> Заявка успішно додана";


include '../view/footer.php'; // add footer
