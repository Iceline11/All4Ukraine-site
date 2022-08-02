<?php
//DB connect
include "../dbconnect/dbconnect.php";
// parsing data from view/donate.html
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

// values list
$order_name = $data["order"]["order_name"];
$order_id = $data["order"]["order_id"];
$card_order = $data["order"]["card_order"];
$sum = $data["order"]["sum"];
$currency = $data["order"]["currency"];
$flexCheckCheckedIpay = $data["order"]["flexCheckCheckedIpay"];
$donater_name = $data["order"]["donater_name"];

//Current date
date_default_timezone_set('Europe/Kiev');
$date = date("Y-m-d H:i:s");

function add_paypal ($order_id, $sum, $donater_name, $flexCheckCheckedIpay, $date) {
    global $pdo;
    $pdo->query("INSERT INTO `donate_list` (
                            `id`,
                            `order_id`,
                            `sum`,
                            `donater`,
                            `method`,
                            `date`,
                            `status`,
                            `allow_transfer`,
                            `transfer_id`
                           )
              VALUES (
                      NULL,
                      '$order_id',
                      '$sum',
                      '$donater_name',
                      'IPay',
                      '$date',
                      1,
                      '$flexCheckCheckedIpay',
                      NULL
                      )");
//Telegram message
    //$message = "Успішний донат від " . $donater_name . " на сумму " . $sum .  " " . $currency . ". Метод: PayPal";
    //$telegram_send = fopen("https://api.telegram.org/bot5476468086:AAHGcMnLexL9eSPgAtsjYuElYzPkm75R6RA/sendMessage?chat_id=-678534217&text=$message", "r");
return "Status: ok";
}

$start = add_paypal($order_id, $sum, $donater_name, $flexCheckCheckedIpay, $date);
echo $start;

?>