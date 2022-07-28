<?php
    include 'header.php'; // add header
    include 'menu.php'; // add menu
?>

<div class="container">
    <h2 class="my-3">Добавити заявку</h2>
    <form method="post" action="../modules/add_order.php" enctype="multipart/form-data">
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (укр)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_ua">
            </div>
            <div class="col-sm">
                <div>
                    <label for="formFile" class="form-label">Фото</label>
                    <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
<!--                    <input class="form-control" type="file" id="formFile" name="pict_src">-->
                </div>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (eng)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_en">
            </div>
            <div class="col-sm-2">
                <label for="exampleFormControlTextarea1" class="form-label">Наявна сума</label>
                <input type="text" class="form-control" placeholder="грн." aria-label="order_goal" name="start_sum">
            </div>
            <div class="col-sm-2">
                <label for="exampleFormControlTextarea1" class="form-label">Ціль по зборам</label>
                <input type="number" class="form-control" placeholder="грн." aria-label="order_goal" name="goal">
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (sk)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_sk">
            </div>
            <div class="col-sm-4">
                <label for="formFile" class="form-label">Дата:</label>
                <input type="date" class="form-control" name="date" value="<?=date('Y-m-d');?>">
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (укр)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_ua" rows="5"></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (eng)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_en" rows="5"></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (sk)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_ck" rows="5"></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <button type="submit" class="btn btn-success" name="add">Добавити</button>
        </div>
    </form>
</div>


<?php
    include 'footer.php'; // add footer
?>
