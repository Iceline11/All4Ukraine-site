<?php
include 'header.php'; // add header
include 'menu.php'; // add menu

$id = $_GET['id'];

$sql_news_edit = $pdo->query("SELECT * FROM `news` WHERE news_id = '$id'")->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2 class="my-3">Змінити новину</h2>
    <form method="post" action="../modules/edit_news.php" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-sm-3">
                <input type="hidden" name="id" value="<?=$id?>">
                <img class="mt-3" style="width: 90%" src="../uploads/<?=$sql_news_edit['pict_src']?>">
            </div>
            <div class="col-sm-5">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (укр)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_ua" value="<?=$sql_news_edit['name_ua']?>">
                <label for="exampleFormControlTextarea1" class="form-label mt-3">Назва (eng)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_en" value="<?=$sql_news_edit['name_en']?>">
            </div>
            <div class="col-sm">
                <div>
                    <label for="formFile" class="form-label">Фото</label>
                    <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
                    <label for="exampleFormControlTextarea1" class="form-label mt-3">Категорія</label>
                    <select class="form-select" aria-label="category" name="category">
                        <option value="1">Історії</option>
                        <option value="2">Звіти</option>
                        <option value="3">Новини</option>
                        <option value="4">Інше</option>
                    </select>
                    <!--                    <input class="form-control" type="file" id="formFile" name="pict_src">-->
                </div>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-8">
                <label for="exampleFormControlTextarea1" class="form-label">Назва (sk)</label>
                <input type="text" class="form-control" aria-label="order_name" name="name_sk" value="<?=$sql_news_edit['name_sk']?>">
            </div>
            <div class="col-sm-4">
                <label for="formFile" class="form-label">Дата:</label>
                <input type="date" class="form-control" name="date" value="<?=$sql_news_edit['date']?>">
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (укр)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_ua" rows="5"><?=$sql_news_edit['descr_ua']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (eng)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_en" rows="5"><?=$sql_news_edit['descr_en']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1">
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Опис (sk)</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="descr_sk" rows="5"><?=$sql_news_edit['descr_sk']?></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1 mb-3">
            <button type="submit" class="btn btn-success" name="add">Змінити</button>
        </div>
    </form>
</div>


<?php
include 'footer.php'; // add footer
?>
