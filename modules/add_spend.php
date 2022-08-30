<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";

$item = htmlspecialchars($_POST['item']);
$quant = htmlspecialchars($_POST['quant']);
$date = htmlspecialchars($_POST['date']);
$sum = htmlspecialchars($_POST['sum']);
$category = htmlspecialchars($_POST['category']);

//insert into DB
$sql_new_order = "INSERT INTO `spend_list` (
                      `id`, 
                      `item`, 
                      `quant`, 
                      `price`, 
                      `category`, 
                      `date`) 
              VALUES (
                      NULL, 
                      '$item', 
                      '$quant', 
                      '$sum', 
                      '$category', 
                      '$date')";
$count = $pdo->query($sql_new_order);
if ($count == true) {
    echo "<br> Заявка успішно додана";
} else {
    echo "Щось пішло не так";
}

include '../view/footer.php'; // add footer

?>