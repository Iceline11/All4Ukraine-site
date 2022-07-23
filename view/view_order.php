<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";

// recive GET card order
$card_order = $_GET['od'];

// Define max order
$sql_max_order = $pdo->query("SELECT MAX(card_order) FROM orders");
$order_res = $sql_max_order->fetch(PDO::FETCH_ASSOC);
$max_card = $order_res["MAX(card_order)"];


// get array from DB
$sql_order_edit = $pdo->query("SELECT * FROM `orders` WHERE card_order = '$card_order'");
$res_edit = $sql_order_edit->fetch(PDO::FETCH_OBJ);

// sum on this order
$sql_sum = $pdo->query("SELECT SUM(sum) FROM donate_list WHERE order_id = '$res_edit->order_id'")->fetch(PDO::FETCH_ASSOC);
$sum = $sql_sum["SUM(sum)"] + $res_edit->start_sum;

//prev and next order
$prev = $res_edit->card_order - 1;
$next = $res_edit->card_order + 1;

// get donater list
$sql_donater_list = $pdo->query("SELECT * FROM `donate_list` WHERE order_id = '$res_edit->order_id'");

// popups
$info = isset($_GET['info']) ? $_GET['info'] : "";
if ($info == "good") {
    require_once '../view/sucess_donate.html';
}
elseif ($info == "bad") {
    require_once '../view/failed_donate.html';
}
?>
    <div class="container">
        <div class="row mx-4 d-flex align-items-center">
            <div class="col-sm-12  position-relative">
                <?php
                 if ($res_edit->card_order > 1 )
                    echo
                    '<a href="view_order.php?od=' . $prev . '"><i class="arrow-right fa-solid fa-chevron-right"></i></a>';
                 if ($res_edit->card_order === $max_card )
                     echo
                         '<a href="view_order.php?od=1"><i class="arrow-left fa-solid fa-chevron-left"></i></a>';
                if ($res_edit->card_order < $max_card)
                    echo
                        '<a href="view_order.php?od=' . $next . '"><i class="arrow-left fa-solid fa-chevron-left"></i></a>';
                if ($res_edit->card_order == 1 )
                    echo
                    '<a href="view_order.php?od=' . $max_card . '"><i class="arrow-right fa-solid fa-chevron-right"></i></a>';
                ?>
                <h2 class="mt-4"><?= $res_edit->name_ua ?></h2>
                <p class="mb-4">Дата отримання заявки: <?= $res_edit->date ?></p>
            </div>
            <div class="col-sm-12">
                <div class="progress ml-2 mb-1" style="height: 35px;">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= number_format($sum / $res_edit->goal * 100, 2) ?>%;" aria-valuemin="0" aria-valuemax="100"><?= number_format($sum / $res_edit->goal * 100, 2) ?> %</div>
                </div>
            </div>
            <div class="col-sm-12 orders_numbers mb-4">
                <span class="order_collect_view">Зібрано:&nbsp;</span><span class="order_collect_text_view">₴ <?=$sum?> &nbsp</span>
                <a href="#" class="btn btn-warning btn-sm">+</a>
                <span class="order_goal_view">Ціль:&nbsp;</span><span class="order_goal_text_view">₴ <?= $res_edit->goal ?></span>
            </div>
        </div>
        <div class="row mx-4">
            <div class="col-sm-5 d-flex">
                <img class="align-self-center rounded" style="width: 100%" src="../uploads/<?= $res_edit->pict_src ?>">
            </div>
            <div class="col-sm-7 align-self-center">
                <p><?= $res_edit->descr_ua ?></p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="d-flex justify-content-center my-4">
                <a href="#" class="btn btn-warning my-4 btn-lg">Задонатити</a>
            </div>
        </div>
        <div class="row my-1 text-center">
            <h3>Історія донатів </h3>
        </div>
        <div class="row mx-4">
            <table class="table donater-table">
                <thead class="table-warning">
                <tr>
                    <th scope="col">Добродій</th>
                    <th scope="col">Сума</th>
                    <th scope="col">Дата донату</th>
                </tr>
                </thead>
                <tbody>
                    <?php while ($row = $sql_donater_list->fetch(PDO::FETCH_OBJ)) {
                        echo "<tr><td>" . $row->donater . "</td>";
                        echo "<td>" . $row->sum . "</td>";
                        echo "<td>" . $row->date . "</td></tr>";
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
include '../view/footer.php'; // add footer
?>
