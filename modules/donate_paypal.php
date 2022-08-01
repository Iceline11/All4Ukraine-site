<?php
$data ='
{
    "intent": "CAPTURE",
    "purchase_units": [
        {
            "items": [
                {
                    "name": "T-Shirt",
                    "description": "Green XL",
                    "quantity": "1",
                    "unit_amount": {
                        "currency_code": "USD",
                        "value": "100.00"
                    }
                }
            ],
            "amount": {
                "currency_code": "USD",
                "value": "100.00",
                "breakdown": {
                    "item_total": {
                        "currency_code": "USD",
                        "value": "10.00"
                    }
                }
            }
        }
    ],
    "application_context": {
        "return_url": "https://example.com/return",
        "cancel_url": "https://example.com/cancel"
    }
}';

$ch = curl_init();
$url = 'https://api-m.sandbox.paypal.com/v2/checkout/orders';
$clientId = "Ad1yllXji_Ar2gTo7x0qnZ6rJLNQYefjipg27uNGd_zdJpZFvyZMLTbLYmmrj51tvZEmSvqrHlBIkdXi";
$secret = "EBXt0lg9V41JFkZdPLJqhwMTl-0EukRTGb8z9I_Y7y-lCyLzmVtsGNohRye5-B7VAHJ6lU5iWticiZoP";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-type: application/json',
    'Authorization: Bearer A21AAIwLke_sm4fcF4CZXmOzssOqYgIs0hamVqYJD56U2_S8mEyh_n_PH4UVohZ0Wz4q9tldrbm8_3cZCNN7-PBAOYpEQFPcg',
    'Accept: */*',
    'Accept-Encoding: gzip, deflate, br',
    'Connection: keep-alive',
    'Prefer: return=representation',
    'PayPal-Request-Id: A v4 style guid'
    ));
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$result = curl_exec($ch);
curl_close($ch);

var_dump($result);

?>
