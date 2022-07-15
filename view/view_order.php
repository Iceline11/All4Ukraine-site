<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../modules/dbconnect.php";

// recive GET id
$order_id = $_GET['id'];

// get array from DB
$sql_order_edit = "SELECT * FROM `orders` WHERE order_id = '$order_id'";
$sql_order_edit = $pdo->query("SELECT * FROM `orders` WHERE order_id = '$order_id'");

// start while
while ($row = $sql_order_edit->fetch(PDO::FETCH_OBJ)) {  ?>

    <div class="container">
        <div class="row mx-4 d-flex align-items-center">
            <div class="col-sm-12  position-relative">
                <i class="arrow-left fa-solid fa-chevron-left"></i>
                <i class="arrow-right fa-solid fa-chevron-right"></i>
                <h2 class="mt-4"><?= $row->name_ua ?></h2>
                <p class="mb-4">Дата отримання заявки: <?= $row->date ?></p>
            </div>
            <div class="col-sm-12">
                <div class="progress ml-2 mb-1" style="height: 35px;">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= number_format($row->start_sum / $row->goal * 100, 2) ?>%;" aria-valuemin="0" aria-valuemax="100"><?= number_format($row->start_sum / $row->goal * 100, 2) ?> %</div>
                </div>
            </div>
            <div class="col-sm-12 orders_numbers mb-4">
                <span class="order_collect_view">Зібрано:&nbsp;</span><span class="order_collect_text_view">₴ <?= $row->start_sum ?> &nbsp</span>
                <a href="#" class="btn btn-warning btn-sm">+</a>
                <span class="order_goal_view">Ціль:&nbsp;</span><span class="order_goal_text_view">₴ <?= $row->goal ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 d-flex">
                <img class="align-self-center rounded" style="width: 90%" src="../uploads/<?= $row->pict_src ?>">
            </div>
            <div class="col-sm-7 align-self-center">
                <p><?= $row->descr_ua ?></p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="d-flex justify-content-center my-4">
                <a href="#" class="btn btn-warning my-4 btn-lg">Задонатити</a>
            </div>
        </div>
        <div class="row my-1 text-center">
            <h3>Історія донатів </h3>
        </div>
        <div class="row">
            <table class="table">
                <thead class="table-warning">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Обращение</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php
} // end while
include '../view/footer.php'; // add footer
?>
