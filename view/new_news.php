<?php
include 'header.php'; // add header
include 'menu.php'; // add menu
?>

<div class="container">
    <h2 class="my-3">Добавити новину</h2>
    <form method="post" action="../modules/add_news.php" enctype="multipart/form-data">
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
            <div class="col-sm-4">
                <label for="exampleFormControlTextarea1" class="form-label">Категорія</label>
                <select class="form-select" aria-label="category" name="category">
                    <option value="1">Історії</option>
                    <option value="2">Звіти</option>
                    <option value="3">Новини</option>
                    <option value="4">Інше</option>
                </select>
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
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_sk" rows="5"></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1 mb-4">
            <button type="submit" class="btn btn-success" name="add">Добавити</button>
        </div>
    </form>
</div>


<?php
include 'footer.php'; // add footer
?>
