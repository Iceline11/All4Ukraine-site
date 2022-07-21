<?php
include "../dbconnect/dbconnect.php";

$button = $_GET['but'];
$order_id = $_GET['id'];

class Order {
    public $id;
    public function status_active(){
        global $pdo;
        $pdo->query("UPDATE orders SET status = 1 WHERE order_id = '$this->id'");
    }
    public function status_sucess(){
        global $pdo;
        $pdo->query("UPDATE orders SET status = 2 WHERE order_id = '$this->id'");
    }
    public function status_hide(){
        global $pdo;
        $pdo->query("UPDATE orders SET status = 3 WHERE order_id = '$this->id'");
    }

}

$update = new Order();
$update->id=$order_id;

if ($button == "active") {
    $update->status_active();
}
elseif ($button == "succes") {
    $update->status_sucess();
}
elseif ($button == "hide") {
    $update->status_hide();
}

header('Location: ../index.php?isadmin=true');
