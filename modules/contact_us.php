<?php

include "../dbconnect/dbconnect.php";
$name = $_POST['name'];
$contact = $_POST['contact'];
$text = $_POST['text'];

//Telegram message
//$message = $name . " хоче зв'язатись з нами зі сторінки: 'Контакти' з приводу питання: %0A" . $text .  "%0A %0A Контактні дані: " . $contact . ". @SachukOlga";
//$telegram_send = fopen("https://api.telegram.org/bot5476468086:AAHGcMnLexL9eSPgAtsjYuElYzPkm75R6RA/sendMessage?chat_id=-678534217&text=$message", "r");

header("Location: ../view/contacts.php?msg=success");