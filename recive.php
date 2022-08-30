<?php
//Current date
date_default_timezone_set('Europe/Kiev');

$string = file_get_contents('php://input'); //catch data
$xml = str_replace('xml=', '', $string); // delete xml=
$xmlObj = simplexml_load_string($xml); //convert to string
$res = json_decode($xmlObj->transactions->transaction->info); // catch info

$order_id = $res->order_id;
$sum = $res->sum;
$donater_name = $res->donater_name;
$method = $res->method;
$allow = $res->allow;
$ref = $res->ref;
$date = date("Y-m-d H:i:s");

include "dbconnect/dbconnect.php";

$sql_new_order = "INSERT INTO `donate_list` (
                            `id`,
                            `order_id`,
                            `sum`,
                            `donater`,
                            `method`,
                            `date`,
                            `status`,
                            `allow_transfer`,
                            `transfer_id`,
                            `ref`
                           )
              VALUES (
                      NULL,
                      '$order_id',
                      '$sum',
                      '$donater_name',
                      '$method',
                      '$date',
                      1,
                      '$allow',
                      NULL,
                      '$ref'
                      )";
$count = $pdo->query($sql_new_order);
//Telegram message
$message = "Успішний донат від " . $donater_name . " на сумму " . $sum . " грн. Метод: Ipay. Реферал: " . $ref;
$telegram_send = fopen("https://api.telegram.org/bot5476468086:AAHGcMnLexL9eSPgAtsjYuElYzPkm75R6RA/sendMessage?chat_id=-678534217&text=$message", "r");