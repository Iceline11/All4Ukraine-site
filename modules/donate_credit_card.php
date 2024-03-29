<?php
$sum = $_POST['donate_sum'];
$donater_name = $_POST['donater_name'];
$order_name = $_POST['order-name'];
$order_id = $_POST['id'];
$card_order = $_POST['card_order'];
$allow = $_POST['allow'];
if (isset($_COOKIE['ref'])) {
    $ref = $_COOKIE['ref'];
}
else {
    $ref = NULL;
}
$message = "Спроба донату на Ipay від " . $donater_name . " на " . $order_name . " на сумму " . $sum . " грн. (реферал: " . $ref . ")";
$telegram_send = fopen("https://api.telegram.org/bot5476468086:AAHGcMnLexL9eSPgAtsjYuElYzPkm75R6RA/sendMessage?chat_id=-678534217&text=$message", "r");

function APIstart($sum, $order_name, $order_id, $donater_name, $allow, $card_order, $ref) {
    $salt = sha1(microtime(true));
    $sign_key = "e8c0f6836dc5184da895acd2c63aed92107db1f1";
    $sign = hash_hmac('sha512', $salt, $sign_key);

    $data = '<?xml version="1.0" encoding="utf-8" standalone="yes"?>
                <payment>
                    <auth>
                        <mch_id>3815</mch_id>
                        <salt>' . $salt . '</salt>
                        <sign>' . $sign . '</sign>
                    </auth>
                    <urls>
                        <good>https://test.all4ukraine.org/view/view_order.php?od=' . $card_order . '&info=good</good>
                        <bad>https://test.all4ukraine.org/view/view_order.php?od=' . $card_order . '&info=bad</bad>
                    </urls>
                    <transactions>
                        <transaction>
                            <amount>' . $sum*100 . '</amount>
                            <currency>UAH</currency>
                            <desc>' . $order_name . '</desc>
                                <info>
                                    {
                                        "order_id": "'.$order_id.'",
                                        "sum": "'.$sum.'",
                                        "donater_name": "'.$donater_name.'",
                                        "method": "iPay",
                                        "allow": "'.$allow.'",
                                        "ref": "'.$ref.'"
                                    }
                                </info>
                        </transaction>
                    </transactions>
                    <lifetime>24</lifetime>
                    <lang>ru</lang>
                </payment>';

    $ch = curl_init();
    $url = 'https://sandbox-checkout.ipay.ua/api302';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['data' => $data]);

    $result = curl_exec($ch);
    curl_close($ch);

    $xml = simplexml_load_string($result);

    return $xml->url;
}

$new = APIstart($sum, $order_name, $order_id, $donater_name, $allow, $card_order, $ref);

header("Location: $new");

?>