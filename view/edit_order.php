<?php
include 'header.php'; // add header
include 'menu.php'; // add menu

$order_id = $_GET['id'];
$sql_order_edit = "SELECT * FROM `orders` WHERE order_id = '$order_id'";

$sql_order_edit = $pdo->query("SELECT * FROM `orders` WHERE order_id = '$order_id'")->fetch(PDO::FETCH_ASSOC);


?>


<div class="container">
    <h2 class="my-3">Редагувати заявку</h2>
    <form method="post" action="../modules/edit_order.php" enctype="multipart/form-data">
        <div class="row g-3 mt-1">
            <div class="col-sm-6">
                <img style="height: 300px" src="../uploads/<?=$sql_order_edit['pict_src_ua']?>">
                <img style="height: 300px" src="../uploads/<?=$sql_order_edit['pict_src_en']?>">
                <img style="height: 300px" src="../uploads/<?=$sql_order_edit['pict_src_sk']?>">
            </div>
            <div class="col-sm-6">
                <label for="formFile" class="form-label">Нове фото(ua):</label>
                <input class="form-control" type="file" id="fileToUpload_ua" name="fileToUpload_ua">
                <label for="formFile" class="form-label">Нове фото(en):</label>
                <input class="form-control" type="file" id="fileToUpload_en" name="fileToUpload_en">
                <label for="formFile" class="form-label">Нове фото(sk):</label>
                <input class="form-control" type="file" id="fileToUpload_sk" name="fileToUpload_sk">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (укр)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_ua" value="<?=$sql_order_edit['name_ua']?>">
                <input type="hidden" name="id" value="<?=$order_id?>">
            </div>
            <div class="col-sm-4">
                <label for="exampleFormControlTextarea1" class="form-label">Наявна сума</label>
                <input type="text" class="form-control" placeholder="грн." aria-label="order_goal" name="start_sum" value="<?=$sql_order_edit['start_sum']?>">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (eng)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_en" value="<?=$sql_order_edit['name_en']?>">
            </div>
            <div class="col-sm-4">
                <label for="exampleFormControlTextarea1" class="form-label">Ціль по зборам</label>
                <input type="number" class="form-control" placeholder="грн." aria-label="order_goal" name="goal" value="<?=$sql_order_edit['goal']?>">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (sk)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_sk" value="<?=$sql_order_edit['name_sk']?>">
            </div>
            <div class="col-sm-4">
                <label for="formFile" class="form-label">Дата:</label>
                <input type="date" class="form-control" name="date" value="<?=date('Y-m-d');?>">
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (укр)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descr_ua" rows="5"><?=$sql_order_edit['descr_ua']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (eng)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_en" rows="5"><?=$sql_order_edit['descr_en']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (sk)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_ck" rows="5"><?=$sql_order_edit['descr_ck']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1 mb-4">
            <button type="submit" class="btn btn-success" name="add">Змінити</button>
        </div>
    </form>
</div>


<?php
include 'footer.php'; // add footer
?>
