<?php
include "../dbconnect/dbconnect.php";

$id = $_GET['id'];

// Delete this topic
$sql_donate_delete = 'DELETE FROM `donate_list` WHERE id = :getid ';
$del_id = $pdo->prepare($sql_donate_delete);
$del_id -> execute([':getid' => $id]);


header('Location: ../view/order_list.php');