<?php
    include 'view/header.php'; // add header
    include 'view/menu.php'; // add menu
    include 'modules/select_orders.php';

    // popups
    $info = isset($_GET['info']) ? $_GET['info'] : "";
    if($info == "success") {
        require_once 'view/info_success.html';
    }
    elseif ($info == "first") {
        require_once 'view/info_first.html';
    }
    elseif ($info == "last") {
        require_once 'view/info_last.html';
    }
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
                <a type="button" href="modules/move_up.php?id=<?= $row->order_id ?>" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-arrow-up"></i></a>
                <a type="button" href="modules/move_down.php?id=<?= $row->order_id ?>" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-arrow-down"></i></a>
                <a type="button" href="edit_order.php?id=<?= $row->order_id ?>" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-circle-check"></i></a>
                <a type="button" href="edit_order.php?id=<?= $row->order_id ?>" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-eye"></i></a>
                <a type="button" href="edit_order.php?id=<?= $row->order_id ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                <a type="button" href="modules/delete_order.php?id=<?= $row->order_id ?>" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
            </div>
            <div class="order_date">
                <i class="fa-solid fa-calendar-days"></i><p><?= $row->date ?></p>
            </div>

            <h4><?= $row->name_ua ?></h4>
            <p><?= mb_substr($row->descr_ua,0,400) . " "?><a href="">(далі)</a></p>
            <div class="order_donations">
                <span class="order_collect">Зібрано:&nbsp;</span><span class="order_collect_text">₴ <?= $row->start_sum ?></span>
                <a class="order_collect_edit" data-bs-toggle="modal" data-bs-target="#modal_amount" data-id="<?= $row->order_id ?>" data-collect="<?= $row->start_sum ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <span class="order_quant">Донатерів: &nbsp;</span><span class="order_quant_text"><?= $row->donat_amount ?></span>




                <a href="view/view_order.php?id=<?= $row->order_id ?>" class="order_collect_edit" data-html="true" ><i class="fa-solid fa-eye"></i></a>


            </div>
            <div class="progress mb-1" style="height: 25px;">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= number_format($row->start_sum / $row->goal * 100, 2) ?>%;" aria-valuemin="0" aria-valuemax="100"><?= number_format($row->start_sum / $row->goal * 100, 2) ?> %</div>
            </div>

            <div class="buttons">
                <span class="order_goal">Ціль:&nbsp;</span><span class="order_goal_text">₴ <?= $row->goal ?></span>
                <a class="order_goal_edit"  data-bs-toggle="modal" data-bs-target="#modal_goal" data-id="<?= $row->order_id ?>" data-goal="<?= $row->goal ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="view/view_order.php?id=<?= $row->order_id ?>" class="btn btn-primary read_more">Читати далі</a>
                <a href="#" class="btn btn-warning donate">Задонатити</a>
            </div>
        </div>
        <hr class="separator">
    </div>
    <?php } ?>
</div>



<?php
    include 'view/update_amount.html'; // popup with amount
    include 'view/update_goal.html'; // popup with goal
?>

<script>
    $(function() {
        $(".order_collect_edit").click(
            function() {
                var nametitle = $(this).attr('data-collect');
                var orderid = $(this).attr('data-id');

                $(".showcollect").attr('value', nametitle);
                $(".id_hidden").attr('value', orderid);
            })
    });

    $(function() {
        $(".order_goal_edit").click(
            function() {
                var namegoal = $(this).attr('data-goal');
                var orderid = $(this).attr('data-id');

                $(".showgoal").attr('value', namegoal);
                $(".id_hidden").attr('value', orderid);
            })
    });
</script>

<?php
    include 'view/footer.php'; // add footer
?>