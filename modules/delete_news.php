<?php
include "../dbconnect/dbconnect.php";

$id = $_GET['id'];

// Delete this topic
$sql_news_delete = 'DELETE FROM `news` WHERE news_id = :getid ';
$del_id = $pdo->prepare($sql_news_delete);
$del_id -> execute([':getid' => $id]);

header('Location: ../view/news.php');