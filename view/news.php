<?php
include 'header.php'; // add header
include 'menu.php'; // add menu
include "../dbconnect/dbconnect.php";

// Select news
$sql_select_news = $pdo->query('SELECT * FROM `news` ORDER BY date DESC');
?>

<div class="container">
    <div class="row">
        <h4 class="my-4">Новини</h4>
            <a href="new_news.php" type="button"class="btn btn-outline-success mb-4">Добавити</a>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <?php
            while ($row = $sql_select_news->fetch(PDO::FETCH_OBJ)) { // start while ?>
            <div class="card mb-4">
                <img src="../uploads/photo_2022-05-19%2012.55.06.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm news_date">
                            <i class="fa-solid fa-calendar-days me-1 color-orange"></i>
                            <p><?= $row->date ?></p>
                        </div>
                        <div class="col-sm news_tag">
                            <i class="fa-solid fa-tag me-1 color-orange"></i>
                            <p><?php
                                if ($row->category == 1) echo "Історії";
                                elseif ($row->category == 2) echo "Звіти";
                                elseif ($row->category == 3) echo "Новини";
                                else  echo "інше";
                                ?></p>
                        </div>
                    </div>
                    <div class="card-title">
                        <a type="button" href="edit_news.php?id=<?= $row->order_id ?>"
                           class="bt_edit_news btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a type="button" href="../modules/delete_news.php?id=<?= $row->order_id ?>"
                           class="bt_del_news btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        <h5><?= $row->name_ua ?></h5>
                    </div>
                    <p class="card-text"><?= $row->descr_ua ?> <a href="view_news.php"> (далі)</a></p>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="col-sm ms-4">
            <h4>Категорії</h4>
            <ul class="list-group">
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Все</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Історії</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Звіти</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Новини</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Інше</a></li>
            </ul>
            <h4 class="mt-4">Архіви</h4>
            <ul class="list-group">
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Лютий</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Березень</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Квітень</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Травень</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Червень</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Липень</a></li>
                <li class="list-group-item"><a href="#" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i>Серпень</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
include 'footer.php'; // add footer
?>
