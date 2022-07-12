<?php
    include 'view/header.php'; // add header
    include 'view/menu.php'; // add menu
    include 'modules/select_orders.php';
?>



<div class="container">
    <div class="row">
        <h4 class="my-4">Добрі справи</h4><a href="new_order.php" type="button" class="btn btn-outline-success mb-4">Нова заявка</a>
    </div>
    <?php while ($row = $sql_select_orders->fetch(PDO::FETCH_OBJ)) { ?>
    <div  class="row order_card">
        <div class="img-container col-sm-4">
            <img class="order_picture" src="uploads/<?= $row->pict_src ?>" alt="dron">
        </div>
        <div class="col-sm-8 order_subscr">
            <div class="admin_buttons">
                <a type="button" href="modules/edit_order.php?id=<?= $row->order_id ?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                <a type="button" href="modules/delete_order.php?id=<?= $row->order_id ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
            </div>
            <div class="order_date">
                <i class="fa-solid fa-calendar-days"></i><p><?= $row->date ?></p>
            </div>

            <h4><?= $row->name_ua ?></h4>
            <p><?= mb_substr($row->descr_ua,0,400) . " "?><a href="">(далі)</a></p>
            <div class="order_donations">
                <span class="order_collect">Зібрано:&nbsp;</span><span class="order_collect_text">₴ <?= $row->start_sum ?></span>
                <a class="order_collect_edit" href="" data-bs-toggle="modal" data-bs-target="#modal_amount"><i class="fa-solid fa-pen-to-square"></i></a>
                <span class="order_quant">Донатерів: &nbsp;</span><span class="order_quant_text"><?= $row->donat_amount ?></span>
                <a class="order_collect_edit" href=""><span><i class="fa-solid fa-eye"></i></span></a>
                <a class="order_collect_edit" href=""><span><i class="fa-solid fa-pen-to-square"></i></span></a>
            </div>
            <div class="progress mb-1" style="height: 25px;">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= number_format($row->start_sum / $row->goal * 100, 2) ?>%;" aria-valuenow="<?= number_format($row->start_sum / $row->goal * 100, 2) ?>" aria-valuemin="0" aria-valuemax="100"><?= number_format($row->start_sum / $row->goal * 100, 2) ?></div>
            </div>

            <div class="buttons">
                <span class="order_goal">Ціль:&nbsp;</span><span class="order_goal_text">₴ <?= $row->goal ?></span>
                <a class="order_goal_edit" href=""><span><i class="fa-solid fa-pen-to-square"></i></span></a>
                <a href="#" class="btn btn-primary read_more">Читати далі</a>
                <a href="#" class="btn btn-warning donate">Задонатити</a>
            </div>
        </div>
        <hr class="separator">
    </div>
    <?php } ?>
</div>



<div class="modal fade" id="modal_amount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Змінити зібрану суму</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form>
                    <input type="number" value="2000"> грн.
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary">Змінити</button>
            </div>
        </div>
    </div>
</div>

<?php
    include 'view/footer.php'; // add footer
?>