<?php
include 'header.php'; // add header
$menuitem = "orders"; // active page
include 'menu.php'; // add menu

// SELECT ORDERS
if ($log == true and $pas == true) {
    include '../modules/select_orders_admin.php';
} else {
    include '../modules/select_orders.php';
}

// popups
$info = isset($_GET['info']) ? $_GET['info'] : "";
if ($info == "success") {
    require_once '../view/info_success.html';
} elseif ($info == "first") {
    require_once '../view/info_first.html';
} elseif ($info == "last") {
    require_once '../view/info_last.html';
}

?>

    <div class="container">
        <div class="row my-3">
            <div class="d-flex align-items-center">
                <div class="col-md-3 col-lg-4 col-md-4 d-none d-md-block">
                    <img src="../pictures/pickup1.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="view_order.php" class="order_link_nostyle"><h4 class="card-title"><?= $lang['free_balance_name']?></h4></a>
                            <div class="text-center text-red mb-2">
                                <span class="order_collect_text">₴ 12742</span>
                            </div>
                            <hr>
                            <p class="card-text"><?= $lang['free_balance_descr']?></p>
                            <div class="text-center">
                                <a href="view_order.php" class="btn btn-primary read_more mx-1 my-1"><?= $lang['detail']?></a>
                                <a class="donate btn btn-warning donate ms-3" data-bs-toggle="modal" data-bs-target="#modal_donate"
                                data-order-id="1" data-name="<?= $lang['free_balance_name']?>" data-card-order=""><?= $lang['donate_btn']?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-4 col-md-4 d-none d-sm-block">
                    <img src="../pictures/pickup2.png" class="img-fluid rounded-end" alt="...">
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="my-4"><?= $lang['good_deeds']?></h4>
            <?php
            if ($log == true and $pas == true) { ?>
                <a href="new_order.php" type="button"class="btn btn-outline-success mb-4">Нова заявка</a>
            <?php } ?>
        </div>
        <?php
            while ($row = $sql_select_orders->fetch(PDO::FETCH_OBJ)) {

            // sum on every order
            $sql_sum = $pdo->query("SELECT SUM(sum) FROM donate_list WHERE order_id = '$row->order_id' AND transfer_id IS NULL")->fetch(PDO::FETCH_ASSOC);
            $sql_sum_tranіfer = $pdo->query("SELECT SUM(sum) FROM donate_list WHERE transfer_id = '$row->order_id'")->fetch(PDO::FETCH_ASSOC);
            $sum = $sql_sum["SUM(sum)"] + $sql_sum_tranіfer["SUM(sum)"] + $row->start_sum;

        ?>
            <div class="row order_card" <?=$status = ($row->status == 3) ? 'style="opacity:50%"' : '' ?>>
                <div class="col-md-4 col-sm-4 img-container">
                    <?php
                    // get picture src
                    if ($status = ($row->status == 2)) {
                        $pict_src =  "sucess.jpeg";
                    } else {
                        if (get_user_lang() == "en" AND $row->pict_src_en !== NULL) {
                            $pict_src = $row->pict_src_en;
                        } elseif (get_user_lang() == "sk" AND $row->pict_src_sk !== NULL) {
                            $pict_src = $row->pict_src_sk;
                        } else {
                            $pict_src = $row->pict_src_ua;
                        }
                    }
                    ?>
                    <img class="order_picture" src="../uploads/<?=$pict_src?>">
                </div>
                <div class="col-md-8 col-sm-8 order_subscr">
                    <?php if ($log == true and $pas == true) {?>
                        <div class="admin_buttons">
                            <?php
                            if($row->status == 1) {
                                echo '<a type="button" href="../modules/move_up.php?id=' . $row->order_id . '"
                               class="btn btn-sm btn-info"><i class="fa-solid fa-arrow-up"></i></a>
                            <a type="button" href="../modules/move_down.php?id=' . $row->order_id . '"
                               class="btn btn-sm btn-info"><i class="fa-solid fa-arrow-down"></i></a>';
                            }
                            ?>
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
                    <a class="order_link_nostyle" href="view_order.php?od=<?= $row->card_order ?>"><h4><?php
                            if (get_user_lang() == "ua") {
                                echo $row->name_ua; }
                            elseif (get_user_lang() == "en") {
                                echo $row->name_en; }
                            else {
                                echo $row->name_ck;
                            }
                            ?></h4></a>
                    <p><?php
                        if (get_user_lang() == "ua") {
                            echo mb_substr($row->descr_ua, 0, 400) . " "; }
                        elseif (get_user_lang() == "en") {
                            echo mb_substr($row->descr_en, 0, 400) . " "; }
                        else {
                            echo mb_substr($row->descr_ck, 0, 400) . " ";
                        }
                        ?><a href="view_order.php?od=<?= $row->card_order ?>">(далі)</a></p>
                    <div class="order_donations">
                        <span class="order_collect me-1"><?= $lang['collect']?></span>
                        <?php if ($log == true and $pas == true) {?>
                            <a class="order_collect_edit" data-bs-toggle="modal" data-bs-target="#modal_amount" data-id="<?= $row->order_id ?>"
                               data-collect="<?= $row->start_sum ?>"><i  class="fa-solid fa-pen-to-square"></i></a>
                        <?php }?>
                        <span class="order_collect_text">₴ <?= $sum ?></span>
                        <span class="order_quant me-1"><?= $lang['donaters']?></span><span
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
                            <span class="order_goal me-1"><?= $lang['goal']?></span>
                        <?php if ($log == true and $pas == true) {?>
                            <a class="order_goal_edit" data-bs-toggle="modal" data-bs-target="#modal_goal"
                               data-id="<?= $row->order_id ?>" data-goal="<?= $row->goal ?>"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                        <?php }?>
                        <div class="order_goal_text">₴ <?= $row->goal ?></div>
                        </div>
                        <div class="col-md d-flex justify-content-end donate_rearmore">
                            <a href="view_order.php?od=<?= $row->card_order ?>" class="btn btn-primary read_more"><?= $lang['detail']?></a>
                            <a class="donate btn btn-warning donate ms-3" data-bs-toggle="modal" data-bs-target="#modal_donate"
                               data-order-id="<?= $row->order_id ?>" data-card-order="<?= $row->card_order ?>" data-name="<?= $row->name_ua ?>"><?= $lang['donate_btn']?></a>
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
include 'donate.php'; // popup with goal
?>
<script src="../js/data_sum_goal.js"></script>
<script src="../js/data_donate.js"></script>
<?php
include '../view/footer.php'; // add footer
?>