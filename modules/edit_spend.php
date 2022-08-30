<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";

$id = htmlspecialchars($_POST['id']);
$item = htmlspecialchars($_POST['item']);
$quant = htmlspecialchars($_POST['quant']);
$date = htmlspecialchars($_POST['date']);
$sum = htmlspecialchars($_POST['sum']);
$category = htmlspecialchars($_POST['category']);

//insert into DB
$sql_edit_spend = "UPDATE `spend_list` SET 
                    `item` = '$item',
                    `quant` = '$quant',
                    `price` = '$sum',
                    `category` = '$category',
                    `date` = '$date'
                    WHERE `spend_list`.`id` = '$id'";
$count = $pdo->query($sql_edit_spend);

if ($count == true) {
    echo "<br> Заявка успішно змінена";
} else {
    echo "Щось пішло не так";
}

include '../view/footer.php'; // add footer

?>