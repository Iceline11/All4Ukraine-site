<?php
include 'header.php'; // add header
include 'menu.php'; // add menu
include "../dbconnect/dbconnect.php";
$order_id = $_GET['id'];
$sql_order_edit = "SELECT * FROM `orders` WHERE order_id = '$order_id'";

$sql_order_edit = $pdo->query("SELECT * FROM `orders` WHERE order_id = '$order_id'");
while ($row = $sql_order_edit->fetch())
{

?>


<div class="container">
    <h2 class="my-3">Редагувати заявку</h2>
    <form method="post" action="../modules/edit_order.php" enctype="multipart/form-data">
        <div class="row g-3 mt-1">
            <div class="col-sm-3">
                <img style="width: 90%" src="../uploads/<?=$row['pict_src']?>">
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <label for="exampleFormControlTextarea1" class="form-label">Назва (укр)</label>
                    <input type="text" class="form-control" aria-label="order_name" name="name_ua" value="<?=$row['name_ua']?>">
                    <input type="hidden" name="id" value="<?=$order_id?>">
                </div>
                <div class="row mt-2">
                    <label for="formFile" class="form-label">Нове фото:</label>
                    <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
                </div>
            </div>

        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (eng)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_en" value="<?=$row['name_en']?>">
            </div>
            <div class="col-sm-2">
                <label for="exampleFormControlTextarea1" class="form-label">Ціль по зборам</label>
                <input type="number" class="form-control" placeholder="грн." aria-label="order_goal" name="goal" value="<?=$row['goal']?>">
            </div>
            <div class="col-sm-2">
                <label for="formFile" class="form-label">Дата:</label>
                <input type="date" class="form-control" name="date" value="<?=$row['date']?>">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (sk)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_sk" value="<?=$row['name_sk']?>">
            </div>
            <div class="col-sm-2">
                <label for="exampleFormControlTextarea1" class="form-label">Наявна сума на початок</label>
                <input type="text" class="form-control" placeholder="грн." aria-label="order_goal" name="start_sum" value="<?=$row['start_sum']?>">
            </div>
            <div class="col-sm-2">
                <label for="exampleFormControlTextarea1" class="form-label">Кількість донатерів</label>
                <input type="number" class="form-control" aria-label="order_goal" name="donat_amount" value="<?=$row['donat_amount']?>">
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (укр)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descr_ua" rows="5"><?=$row['descr_ua']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (eng)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_en" rows="5"><?=$row['descr_en']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (sk)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_ck" rows="5"><?=$row['descr_ck']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <button type="submit" class="btn btn-success" name="add">Змінити</button>
        </div>
    </form>
</div>


<?php
};
include 'footer.php'; // add footer
?>
