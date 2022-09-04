<?php
include "../dbconnect/dbconnect.php";

$button = $_GET['but'];
$order_id = $_GET['id'];

class Order {
    public $id;
    public function status_active(){
        global $pdo;

        // Define quant order
        $sql_quant_order = $pdo->query('SELECT COUNT(*) FROM orders WHERE status =1');
        $order_res = $sql_quant_order->fetch(PDO::FETCH_ASSOC);
        $quant_order = $order_res["COUNT(*)"];

        // Add card-order
        $c_order = $quant_order +1;
        $pdo->query("UPDATE orders SET status = 1, card_order = '$c_order' WHERE order_id = '$this->id'");


    }
    public function status_sucess(){
        global $pdo;

        // Define quant order
        $sql_quant_order = $pdo->query('SELECT COUNT(*) FROM orders WHERE status =1');
        $order_res = $sql_quant_order->fetch(PDO::FETCH_ASSOC);
        $quant_order = $order_res["COUNT(*)"];

        // Define card_order of this order
        $sql_def_order = $pdo->query("SELECT card_order FROM orders WHERE order_id = '$this->id' ");
        $order_res = $sql_def_order->fetch(PDO::FETCH_ASSOC);
        $this_order =  $order_res["card_order"];

        // Update orders
        $n = $quant_order - $this_order;
        for ($i = 1; $i <= $n; $i++) {
            $new_order = $this_order + $i;
            $pdo->query("UPDATE orders SET `card_order` = `card_order` - 1 WHERE card_order = '$new_order'");
        }

        // Delete card_order
        $pdo->query("UPDATE orders SET card_order = 0 WHERE order_id = '$this->id'");

        // Change status to success to this order
        $pdo->query("UPDATE orders SET status = 2 WHERE order_id = '$this->id'");
    }
    public function status_hide(){
        global $pdo;

        // Define quant order
        $sql_quant_order = $pdo->query('SELECT COUNT(*) FROM orders WHERE status =1');
        $order_res = $sql_quant_order->fetch(PDO::FETCH_ASSOC);
        $quant_order = $order_res["COUNT(*)"];

        // Define card_order of this order
        $sql_def_order = $pdo->query("SELECT card_order FROM orders WHERE order_id = '$this->id' ");
        $order_res = $sql_def_order->fetch(PDO::FETCH_ASSOC);
        $this_order =  $order_res["card_order"];

        // Update orders
        $n = $quant_order - $this_order;
        for ($i = 1; $i <= $n; $i++) {
            $new_order = $this_order + $i;
            $pdo->query("UPDATE orders SET `card_order` = `card_order` - 1 WHERE card_order = '$new_order'");
        }

        // Delete card_order
        $pdo->query("UPDATE orders SET card_order = 0 WHERE order_id = '$this->id'");

        // Hide this order
        $pdo->query("UPDATE orders SET status = 3, card_order = NULL WHERE order_id = '$this->id'");
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

header('Location: ../view/order_list.php?isadmin=true');
