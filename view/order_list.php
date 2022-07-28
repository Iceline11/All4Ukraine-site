<?php
include 'header.php'; // add header
include 'menu.php'; // add menu

if (isset($_GET['isadmin'])) {
    include '../modules/select_orders_admin.php';
} else {
    include '../modules/select_orders.php';
}

// popups
$info = isset($_GET['info']) ? $_GET['info'] : "";
if ($info == "success") {
    require_once 'view/info_success.html';
} elseif ($info == "first") {
    require_once 'view/info_first.html';
} elseif ($info == "last") {
    require_once 'view/info_last.html';
}

?>

    <div class="container">
        <div class="row">
            <h4 class="my-4">Добрі справи</h4>
            <?php if (isset($_GET['isadmin'])) {?>
                <a href="new_order.php" type="button"class="btn btn-outline-success mb-4">Нова заявка</a>
            <?php }?>
        </div>
        <?php
            while ($row = $sql_select_orders->fetch(PDO::FETCH_OBJ)) { // start while

            // sum on every order
            $sql_sum = $pdo->query("SELECT SUM(sum) FROM donate_list WHERE order_id = '$row->order_id' AND transfer_id IS NULL")->fetch(PDO::FETCH_ASSOC);
            $sql_sum_tranіfer = $pdo->query("SELECT SUM(sum) FROM donate_list WHERE transfer_id = '$row->order_id'")->fetch(PDO::FETCH_ASSOC);
            $sum = $sql_sum["SUM(sum)"] + $sql_sum_tranіfer["SUM(sum)"] + $row->start_sum;

        ?>
            <div class="row order_card" <?=$status = ($row->status == 3) ? 'style="opacity:50%"' : '' ?>>
                <div class="col-md-4 col-sm-4 img-container">

                    <img class="order_picture" src="../uploads/<?=$status = ($row->status == 2) ? "sucess.jpeg" : $row->pict_src ?>">
                </div>
                <div class="col-md-8 col-sm-8 order_subscr">
                    <?php if (isset($_GET['isadmin'])) {?>
                        <div class="admin_buttons">
                            <a type="button" href="../modules/move_up.php?id=<?= $row->order_id ?>"
                               class="btn btn-sm btn-info"><i class="fa-solid fa-arrow-up"></i></a>
                            <a type="button" href="../modules/move_down.php?id=<?= $row->order_id ?>"
                               class="btn btn-sm btn-info"><i class="fa-solid fa-arrow-down"></i></a>
                            <a type="button" class="btn btn-sm btn-success dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-eye"></i></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="../modules/change_status.php?id=<?= $row->order_id ?>&but=active">Активна</a></li>
                                    <li><a class="dropdown-item" href="../modules/change_status.php?id=<?= $row->order_id ?>&but=succes">Успішно закрита</a></li>
                                    <li><a class="dropdown-item" href="../modules/change_status.php?id=<?= $row->order_id ?>&but=hide">Неактивна (прихована)</a></li>
                                </ul>
                            <a type="button" href="edit_order.php?id=<?= $row->order_id ?>"
                               class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a type="button" href="../modules/delete_order.php?id=<?= $row->order_id ?>"
                               class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    <?php }?>
                    <div class="order_date">
                        <i class="fa-solid fa-calendar-days"></i>
                        <p><?= $row->date ?></p>
                    </div>
                    <a class="order_link_nostyle" href="view_order.php?od=<?= $row->card_order ?>"><h4><?= $row->name_ua ?></h4></a>
                    <p><?= mb_substr($row->descr_ua, 0, 400) . " " ?><a href="view_order.php?od=<?= $row->card_order ?>">(далі)</a></p>
                    <div class="order_donations">
                        <span class="order_collect">Зібрано:&nbsp;</span>
                        <?php if (isset($_GET['isadmin'])) {?>
                            <a class="order_collect_edit" data-bs-toggle="modal" data-bs-target="#modal_amount" data-id="<?= $row->order_id ?>"
                               data-collect="<?= $row->start_sum ?>"><i  class="fa-solid fa-pen-to-square"></i></a>
                        <?php }?>
                        <span class="order_collect_text">₴ <?= $sum ?></span>
                        <span class="order_quant">Донатерів: &nbsp;</span><span
                                class="order_quant_text">
                            <?php
                            // Select quantity for each order
                            $sql2 = $pdo->query("SELECT COUNT(*) FROM `donate_list` WHERE order_id = '$row->order_id'")->fetch(PDO::FETCH_ASSOC);
                            echo $sql2["COUNT(*)"];
                            ?>
                        </span>
                        <a href="view_order.php?od=<?= $row->card_order ?>" class="order_collect_edit"
                           data-html="true"><i class="fa-solid fa-eye"></i></a>
                    </div>
                    <div class="progress mb-1" style="height: 25px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar"
                             style="width: <?= number_format($sum / $row->goal * 100, 2) ?>%;"
                             aria-valuemin="0"
                             aria-valuemax="100"><?= number_format($sum / $row->goal * 100, 2) ?> %
                        </div>
                    </div>
                    <div class="row row_bottom">
                        <div class="col-md-5 d-flex align-items-center">
                            <span class="order_goal">Ціль:&nbsp;</span>
                        <?php if (isset($_GET['isadmin'])) {?>
                            <a class="order_goal_edit" data-bs-toggle="modal" data-bs-target="#modal_goal"
                               data-id="<?= $row->order_id ?>" data-goal="<?= $row->goal ?>"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                        <?php }?>
                        <div class="order_goal_text">₴ <?= $row->goal ?></div>
                        </div>
                        <div class="col-md d-flex justify-content-center donate_rearmore">
                            <a href="view_order.php?od=<?= $row->card_order ?>" class="btn btn-primary read_more">Докладніше</a>
                            <a class="donate btn btn-warning donate ms-3" data-bs-toggle="modal" data-bs-target="#modal_donate"
                               data-order-id="<?= $row->order_id ?>" data-card-order="<?= $row->card_order ?>" data-name="<?= $row->name_ua ?>">Задонатити</a>
                        </div>
                    </div>
                </div>
                <hr class="separator">
            </div>
        <?php } ?>
    </div>


<?php
include 'update_amount.html'; // popup with amount
include 'update_goal.html'; // popup with goal
include 'donate.html'; // popup with goal
?>
<script src="../js/data_sum_goal.js"></script>
<script src="../js/data_donate.js"></script>
<?php
include 'footer.php'; // add footer
?>