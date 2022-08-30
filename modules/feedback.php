<?php
$name = $_POST['name'];
$contact = $_POST['contact'];
$text = $_POST['text'];
$order_name = $_POST['order_name'];

//Telegram message
//$message = $name . " хоче зв'язатись з нами зі сторінки: %0A" . $order_name . "%0A З приводу питання: %0A" . $text .  "%0A %0A Контактні дані: " . $contact . ". @SachukOlga";
//$telegram_send = fopen("https://api.telegram.org/bot5476468086:AAHGcMnLexL9eSPgAtsjYuElYzPkm75R6RA/sendMessage?chat_id=-678534217&text=$message", "r");