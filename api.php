<?php
$salt = sha1(microtime(true));

$sign_key = "e8c0f6836dc5184da895acd2c63aed92107db1f1";
$sign = hash_hmac('sha512', $salt, $sign_key);

//
//$xml = simplexml_load_file('request.xml');
//
//$xml->auth->salt = $salt;
//$xml->auth->sign = $sign;


$data = '
<?xml version="1.0" encoding="utf-8" standalone="yes"?>
<payment>
    <auth>
        <mch_id>2023</mch_id>
        <salt>' . $salt . '</salt>
        <sign>' . $sign . '</sign>
    </auth>
    <urls>
        <good>http://www.example.com/ok/</good>
        <bad>http:// www.example.com/fail/</bad>
    </urls>
    <transactions>
        <transaction>
            <amount>55</amount>
            <currency>UAH</currency>
            <desc>Покупка товара/услуги</desc>
            <info>{"dogovor":123456}</info>
            <smch_id>4301</smch_id>
        </transaction>
    </transactions>
    <trademark>{"ru":"название на русском","ua":"назва на українській","en":"english name"}</trademark>
    <lifetime>24</lifetime>
    <lang>ru</lang>
</payment>
';


// инициализация сеанса
$url = "https://sandbox-checkout.ipay.ua/api302";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// вернуть ответ
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// добавляем переменные
curl_setopt($ch, CURLOPT_POSTFIELDS, ['data' => $data]);

$result = curl_exec($ch);
curl_close($ch);

$xml = simplexml_load_string($result);

echo $xml->url;





//// загрузка страницы и выдача её браузеру
//$result = curl_exec($ch);
//
//// завершение сеанса и освобождение ресурсов
//curl_close($ch);
//$xml = simplexml_load_string($result);
//$json = json_encode($xml);
//$json = json_decode($json);




//echo '<pre>';
//var_dump($xml);
//echo '</pre>';