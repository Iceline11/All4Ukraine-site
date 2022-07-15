<?php

function APIstart() {
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
                        <good>https://all4ua.systemator.pro/recive.php</good>
                        <bad>https://all4ua.systemator.pro/recive.php</bad>
                    </urls>
                    <transactions>
                        <transaction>
                            <amount>100000</amount>
                            <currency>UAH</currency>
                            <desc>123</desc>
                            <info>{"dogovor":123456}</info>
                                <info>
                                        {
                                          "squadName": "Super hero squad",
                                          "homeTown": "Metro City",
                                          "formed": 2016,
                                          "secretBase": "Super tower",
                                          "active": true,
                                          "members": [
                                            {
                                              "name": "Molecule Man",
                                              "age": 29,
                                              "secretIdentity": "Dan Jukes",
                                              "powers": [
                                                "Radiation resistance",
                                                "Turning tiny",
                                                "Radiation blast"
                                              ]
                                            },
                                            {
                                              "name": "Madame Uppercut",
                                              "age": 39,
                                              "secretIdentity": "Jane Wilson",
                                              "powers": [
                                                "Million tonne punch",
                                                "Damage resistance",
                                                "Superhuman reflexes"
                                              ]
                                            },
                                            {
                                              "name": "Eternal Flame",
                                              "age": 1000000,
                                              "secretIdentity": "Unknown",
                                              "powers": [
                                                "Immortality",
                                                "Heat Immunity",
                                                "Inferno",
                                                "Teleportation",
                                                "Interdimensional travel"
                                              ]
                                            }
                                          ]
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

$new = APIstart();

header("Location: $new");

?>