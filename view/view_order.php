<?php
// add referal in cookie
if (isset($_GET['ref'])) {
    setcookie("ref", $_GET['ref'], time() + 14 * 86400, "/");
}


include '../view/header.php'; // add header
$menuitem = "orders"; // active page
include '../view/menu.php'; // add menu

// recive GET card order
if (isset($_GET['od'])){
    $card_order = $_GET['od'];
}

// Define max order
$sql_max_order = $pdo->query("SELECT MAX(card_order) FROM orders");
$order_res = $sql_max_order->fetch(PDO::FETCH_ASSOC);
$max_card = $order_res["MAX(card_order)"];

// show all orders
$sql_all_orders = $pdo->query('SELECT * FROM `orders` WHERE status = 1 ORDER BY card_order ASC ');

// show all orders except this one
if (isset($card_order)) {
    $sql_other_orders = $pdo->query("SELECT * FROM `orders` WHERE status = 1 and card_order != '$card_order' ORDER BY card_order ASC");
}
else {
    $sql_other_orders = $pdo->query("SELECT * FROM `orders` WHERE status = 1 and order_id != 1 ORDER BY card_order ASC");
}

// get array for this order from DB
if (isset($card_order)){
    $sql_order_edit = $pdo->query("SELECT * FROM `orders` WHERE card_order = '$card_order'");
}
else {
    $sql_order_edit = $pdo->query("SELECT * FROM `orders` WHERE order_id = 1");
}
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
<div class="container px-5">
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
            if (empty($card_order))
                echo
                    '<a href="view_order.php?od=' . $max_card . '"><i class="arrow-right fa-solid fa-chevron-right"></i></a>';
            ?>
            <h2 class="mt-4"><?php
                if (get_user_lang() == "ua") {
                    echo $res_edit->name_ua; }
                elseif (get_user_lang() == "en") {
                    echo $res_edit->name_en;; }
                else {
                    echo $res_edit->name_ck;;
                }
            ?></h2>
            <p class="mb-4"><?= $lang['order_data']?><?= $res_edit->date ?></p>
        </div>
        <div class="col-sm-12">
            <div class="progress ml-2 mb-1" style="height: 35px;">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= number_format($sum / $res_edit->goal * 100, 2) ?>%;" aria-valuemin="0" aria-valuemax="100"><?= number_format($sum / $res_edit->goal * 100, 2) ?> %</div>
            </div>
        </div>
        <div class="col-sm-12 orders_numbers mb-4">
            <span class="order_collect_view me-1"><?= $lang['collect']?></span><span class="order_collect_text_view">₴ <?=$sum?> &nbsp</span>
            <a class="donate btn btn-warning "  data-bs-toggle="modal" data-bs-target="#modal_donate"
               data-order-id="<?= $res_edit->order_id ?>" data-card-order="<?= $res_edit->card_order ?>" data-name="<?= $res_edit->name_ua ?>">Збільшити суму</a>
            <span class="order_goal_view me-1"><?= $lang['goal']?></span><span class="order_goal_text_view">₴ <?= $res_edit->goal ?></span>
        </div>
    </div>
    <div class="row mx-4">
        <div class="col-sm-5 d-flex">
            <img class="align-self-start rounded" style="width: 100%" src="../uploads/<?= $res_edit->pict_src_ua ?>">
        </div>
        <div class="col-sm-7 align-self-center">
            <p class="fs-6"><?php
                if (get_user_lang() == "ua") {
                    echo $res_edit->descr_ua; }
                elseif (get_user_lang() == "en") {
                    echo $res_edit->descr_en;; }
                else {
                    echo $res_edit->descr_ck;;
                }
                ?></p>
        </div>
    </div>

    <!--DONATE BUTTON-->
    <div class="row mt-2">
        <div class="d-flex justify-content-center my-4">
            <a class="donate btn btn-warning my-4 btn-lg" data-bs-toggle="modal" data-bs-target="#modal_donate"
               data-order-id="<?= $res_edit->order_id ?>" data-card-order="<?= $res_edit->card_order ?>" data-name="<?= $res_edit->name_ua ?>"><?= $lang['donate_btn']?></a>
        </div>
    </div>

    <!--DONATE HISTORY-->
    <div class="row mx-4 my-1">
        <h4><?= $lang['donate_history']?></h4>
    </div>
    <div class="row mx-4">
        <table class="table donater-table">
            <thead class="table-warning">
            <tr>
                <th scope="col"><?= $lang['donater']?></th>
                <th scope="col"><?= $lang['sum']?></th>
                <th scope="col"><?= $lang['date']?></th>
                <th scope="col"><?= $lang['transfers']?></th>

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
                    // transfer and delete buttons
                    if ($log == true and $pas == true) {
                        echo '<button data-donate-id="' . $row->id . '" type="button" class="btn btn-success btn-sm transfer-donate btn-history-replace" data-bs-toggle="modal" data-bs-target="#ReplaceDonate"><i class="fa-solid fa-arrows-left-right"></i></button>';
                        echo '<a type="button" href="../modules/delete_donate.php?id=' . $row->id . '"
                           class="btn btn-sm btn-danger ms-2 btn-history-delete"><i class="fa-solid fa-trash-can"></i></a></td>';
                    }
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
        <?php if ($log == true and $pas == true)
            echo '<div class="col-sm mb-4"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDonate">Добавити</button></div>'
        ?>
    </div>
</div>

    <!--Modal for replace-->
    <div class="modal fade" id="ReplaceDonate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Перемістити донат</h5>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
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
                    <div class="modal-body">
                        <div class="row">
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
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="method" placeholder="name@example.com" name="method">
                                    <label for="method">Метод</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckCheckedPaypal" name="allow" checked>
                                    <label class="form-check-label" for="flexCheckCheckedPaypal">
                                        <small>Дозволити перенести донат на іншу заяву при нагальній потребі</small>
                                    </label>
                                </div>
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
include 'donate.php'; // popup with goal
include 'footer.php'; // add footer
?>
<script src="../js/modal_transfer.js"></script>
<!--<script src="../js/data_sum_goal.js"></script>-->
<script src="../js/data_donate.js"></script>
