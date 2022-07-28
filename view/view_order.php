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

// show all orders
$sql_all_orders = $pdo->query('SELECT * FROM `orders` WHERE status = 1 ORDER BY card_order ASC ');

// show all orders except this one
$sql_other_orders = $pdo->query("SELECT * FROM `orders` WHERE status = 1 and card_order != '$card_order' ORDER BY card_order ASC");

// get array from DB
$sql_order_edit = $pdo->query("SELECT * FROM `orders` WHERE card_order = '$card_order'");
$res_edit = $sql_order_edit->fetch(PDO::FETCH_OBJ);

// sum on this order
$sql_sum = $pdo->query("SELECT SUM(sum) FROM donate_list WHERE order_id = '$res_edit->order_id' AND transfer_id IS NULL")->fetch(PDO::FETCH_ASSOC);
$sql_sum_tranіfer = $pdo->query("SELECT SUM(sum) FROM donate_list WHERE transfer_id = '$res_edit->order_id'")->fetch(PDO::FETCH_ASSOC);
$sum = $sql_sum["SUM(sum)"] + $sql_sum_tranіfer["SUM(sum)"] + $res_edit->start_sum;

//prev and next order
$prev = $res_edit->card_order - 1;
$next = $res_edit->card_order + 1;

// get donater list
$sql_donater_list = $pdo->query("SELECT * FROM `donate_list` WHERE order_id = '$res_edit->order_id'");

// transfer donater list
$sql_transfer_list = $pdo->query("SELECT * FROM `donate_list` WHERE transfer_id = '$res_edit->order_id'");

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
                <a class="donate btn btn-warning btn-sm"  data-bs-toggle="modal" data-bs-target="#modal_donate"
                   data-order-id="<?= $res_edit->order_id ?>" data-card-order="<?= $res_edit->card_order ?>" data-name="<?= $res_edit->name_ua ?>">+</a>
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

        <!--DONATE BUTTON-->
        <div class="row mt-2">
            <div class="d-flex justify-content-center my-4">
                <a class="donate btn btn-warning my-4 btn-lg" data-bs-toggle="modal" data-bs-target="#modal_donate"
                   data-order-id="<?= $res_edit->order_id ?>" data-card-order="<?= $res_edit->card_order ?>" data-name="<?= $res_edit->name_ua ?>">Задонатити</a>
            </div>
        </div>

        <!--DONATE HISTORY-->
        <div class="row mx-4 my-1">
            <h4>Історія донатів </h4>
        </div>
        <div class="row mx-4">
            <table class="table donater-table">
                <thead class="table-warning">
                <tr>
                    <th scope="col">Добродій</th>
                    <th scope="col">Сума</th>
                    <th scope="col">Дата донату</th>
                    <th scope="col">Переноси</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    include "../modules/transfer-link.php";
                    include "../modules/transfer-from.php";
                    // Donater list and transfers to
                    while ($row = $sql_donater_list->fetch(PDO::FETCH_OBJ)) {
                        echo "<tr><td>" . $row->donater . "</td>";
                        echo "<td>" . $row->sum . "</td>";
                        echo "<td>" . $row->date . "</td>";
                        echo "<td>";
                        if (isset($row->transfer_id)) {
                            echo transfer_link ($pdo, $row->transfer_id);
                        }
                        echo '<button data-donate-id="' . $row->id . '" type="button" class="btn btn-success btn-sm transfer-donate btn-history-replace" data-bs-toggle="modal" data-bs-target="#ReplaceDonate"><i class="fa-solid fa-arrows-left-right"></i></button>';
                        echo '<a type="button" href="../modules/delete_order.php?id=<?= $row->order_id ?>"
                               class="btn btn-sm btn-danger ms-2 btn-history-delete"><i class="fa-solid fa-trash-can"></i></a></td>';
                        echo "</td></tr>";
                    }
                    // Transfers from
                    while ($row_trans = $sql_transfer_list->fetch(PDO::FETCH_OBJ)) {
                        echo "<tr><td>" . $row_trans->donater . "</td>";
                        echo "<td>" . $row_trans->sum . "</td>";
                        echo "<td>" . $row_trans->date . "</td>";
                        echo "<td>";
                        if (isset($row_trans->transfer_id)) {
                            echo transfer_from_link ($pdo, $row_trans->order_id);
                        }
                        echo "</td></tr>";
                    } ?>
                </tbody>
            </table>
            <div class="col-sm mb-4"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDonate">Добавити</button></div>
        </div>

<!--Modal for replace-->
<div class="modal fade" id="ReplaceDonate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Перемістити ставку</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form action="../modules/transfer_donate.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="id_hidden" name="donate_id">
                        <select class="form-select" name="order_id">
                            <option selected>Виберіть куди перемістити донат</option>
                            <?php
                                while ($list = $sql_other_orders->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <option value="<?=$list->order_id?>"><?=$list->card_order . ". " . $list->name_ua . ", " . $list->date ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button class="btn btn-primary" type="submit">Перемістити</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<!--Modal for adding donate -->
<div class="modal fade" id="addDonate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Добавити донат</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <form action="../modules/donate_manual.php" method="post">
                <div class="row modal-body">
                    <div class="col-sm-8">
                        <input type="hidden" class="id_hidden" name="order_id" value="<?=$res_edit->order_id?>">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="donater">
                            <label for="floatingInput">Ім`я</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="sum">
                            <label for="floatingInput">Сумма, грн.</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button class="btn btn-primary" type="submit">Добавити</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'update_amount.html'; // popup with amount
include 'update_goal.html'; // popup with goal
include 'donate.html'; // popup with goal
?>
<script src="../js/modal_transfer.js"></script>
<!--<script src="../js/data_sum_goal.js"></script>-->
<script src="../js/data_donate.js"></script>
<?php
include '../view/footer.php'; // add footer
?>
