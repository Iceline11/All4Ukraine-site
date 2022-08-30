<?php
include "../dbconnect/dbconnect.php";

$spend_id = $_GET['id'];

// Delete this spend
$sql_spend_delete = 'DELETE FROM `spend_list` WHERE id = :getid ';

$del_id = $pdo->prepare($sql_spend_delete);
$del_id -> execute([':getid' => $spend_id]);

header('Location: ../view/report.php');