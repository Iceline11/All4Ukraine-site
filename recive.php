<?php
$string = file_get_contents('php://input'); //catch data
$xml = str_replace('xml=', '', $string); // delete xml=
$xmlObj = simplexml_load_string($xml); //convert to string
$res = json_decode($xmlObj->transactions->transaction->info); // catch info

$order_id = $res->order_id;
$sum = $res->sum;
$donater_name = $res->donater_name;
$method = $res->method;
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
                            `transfer_id`
                           )
              VALUES (
                      NULL,
                      '$order_id',
                      '$sum',
                      '$donater_name',
                      '$method',
                      '$date',
                      1,
                      NULL
                      )";
echo $sql_new_order;
$count = $pdo->query($sql_new_order);