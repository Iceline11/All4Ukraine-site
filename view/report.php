<?php
include '../view/header.php'; // add header
$menuitem = "report"; // active page
include '../view/menu.php'; // add menu

// Info for profit
$sql_donater_list = $pdo->query("SELECT * FROM `donate_list`");

// Info for spend
$sql_spends = $pdo->query("SELECT * FROM `spend_list`");

// show all orders
$sql_all_orders = $pdo->query('SELECT * FROM `orders` WHERE status = 1 ORDER BY card_order ASC ');

?>
<div class="container">
    <h3 class="mt-4"><?= $lang['reports_all4ua']?></h3>
    <ul class="nav nav-tabs px-3 my-3">
        <li class="nav-item">
            <a class="nav-link active" href="#spend" data-bs-toggle="tab" ><?= $lang['report_spend']?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#profit" data-bs-toggle="tab"><?= $lang['report_profit']?></a>
        </li>
    </ul>
    <div class="tab-content" id="case-spend">
        <div class="tab-pane fade show active mx-4 mb-4" id="spend" role="tabpanel" aria-labelledby="pills-home-tab">
            <!-- Spend -->
            <div class="row">
                <table class="table">
                    <thead class="table-warning">
                    <tr>
                        <th scope="col"><?= $lang['report_bdate']?></th>
                        <th scope="col"><?= $lang['report_item']?></th>
                        <th scope="col"><?= $lang['report_quant']?></th>
                        <th scope="col"><?= $lang['report_price']?></th>
                        <th scope="col"><?= $lang['report_category']?></th>
                        <?php
                            if ($log == true and $pas == true) {
                                echo '<th scope="col">Дії</th>';
                            }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($log == true and $pas == true) echo
                        '<tr>
                            <td colspan="6">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_spend">Добавити</button>
                            </td>
                        </tr>';

                     while ($row = $sql_spends->fetch(PDO::FETCH_OBJ)) {
                        echo "<tr><td>" . $row->date . "</td>";
                        echo "<td>" . $row->item . "</td>";
                        echo "<td>" . $row->quant . "</td>";
                        echo "<td>" . $row->price . "</td>";
                        echo "<td>" . $row->category . "</td>";

                        if ($log == true and $pas == true)
                            echo '
                            <td>
                                <div class="row">
                                    <div class="col-sm">
                                        <a type="button" href="edit_spend.php?id=' . $row->id . '"
                                               class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <div class="col-sm">
                                        <a type="button" href="../modules/delete_spend.php?id=' . $row->id . '"
                                               class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </div>
                            </td> ';

                        echo "</tr>";
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-content" id="case-profit">
            <div class="tab-pane fade mx-4 mb-4" id="profit" role="tabpanel" aria-labelledby="pills-profile-tab">
                <!-- Profit -->
                <div class="row">
                    <table class="table">
                        <thead class="table-warning">
                        <tr>
                            <th scope="col"><?= $lang['report_date']?></th>
                            <th scope="col"><?= $lang['report_sum']?></th>
                            <th scope="col"><?= $lang['report_donater']?></th>
                            <th scope="col"><?= $lang['report_to']?></th>
                            <th scope="col"><?= $lang['report_status']?></th>
                            <?php
                            if ($log == true and $pas == true)
                                echo '<th scope="col">Метод донату</th>';
                            ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($log == true and $pas == true) echo
                        '<tr>
                            <td colspan="6">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDonate">Добавити</button>
                            </td>
                        </tr>';

                        while ($row = $sql_donater_list->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr><td>" . $row->date . "</td>";
                            echo "<td>" . $row->sum . "</td>";
                            echo "<td>" . $row->donater . "</td>";
                            echo "<td>";
                            // Select order
                            $order = $pdo->query("SELECT * FROM `orders` WHERE order_id = '$row->order_id'")->fetch(PDO::FETCH_ASSOC);
                            echo "<a href='view_order.php?od=". $order["card_order"] ."'>" . $order["name_ua"] . "</a>";
                            echo "</td><td>";
                            if ($order["status"] == 1)
                                echo $lang['report_status_active'];
                            elseif ($order["status"] == 2)
                                echo $lang['report_status_closed'];
                            else
                                echo $lang['report_status_stopped'];
                            echo "</td>";

                            if ($log == true and $pas == true)
                                echo "<td>" . $row->method . "</td>";

                            echo "</tr>";
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--Modal for adding donate -->
    <div class="modal fade" id="addDonate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Добавити донат</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form action="../modules/donate_manual.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm">
                                <select class="form-select mb-3" name="order_id">
                                    <option selected>Заявка</option>
                                    <?php

                                    while ($list = $sql_all_orders->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                        <option value="<?=$list->order_id?>"><?=$list->card_order . ". " . $list->name_ua . ", " . $list->date ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="hidden" name="page" value="report">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="donater">
                                    <label for="floatingInput">Ім`я</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="sum">
                                    <label for="floatingInput">Сумма, грн.</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="donate_method" placeholder="name@example.com" name="method">
                                    <label for="donate_method">Метод донату</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckCheckedPaypal" name="allow" checked>
                                    <label class="form-check-label" for="flexCheckCheckedPaypal">
                                        <small>Дозволити перенести донат на іншу заяву при нагальній потребі</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                        <button class="btn btn-primary" type="submit">Добавити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal for adding spend -->
    <div class="modal fade" id="add_spend" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Добавити затрати</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form action="../modules/add_spend.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="item" placeholder="name@example.com" name="item" required>
                                    <label for="item">Товар</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="quant" placeholder="name@example.com" name="quant" value="1" required>
                                    <label for="quant">Кількість</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="date" class="form-control py-3" name="date" value="<?=date('Y-m-d');?>">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="sum" required>
                                    <label for="floatingInput">Сумма, грн.</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <select class="form-select" aria-label="Пример выбора по умолчанию" name="category" required>
                                    <option selected>Категорія</option>
                                    <option value="амуніція">амуніція</option>
                                    <option value="госп товари">госп товари</option>
                                    <option value="ліки">ліки</option>
                                    <option value="засоби звязку">засоби звязку</option>
                                    <option value="авто">авто</option>
                                    <option value="ПНБ і тепловізори">ПНБ і тепловізори</option>
                                    <option value="Біноклі і далекоміри">Біноклі і далекоміри</option>
                                    <option value="Приціли">Приціли</option>
                                    <option value="дрон">дрон</option>
                                    <option value="засоби живлення">засоби живлення</option>
                                    <option value="ліхтарі">ліхтарі</option>
                                    <option value="інше">інше</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                        <button class="btn btn-primary" type="submit">Добавити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include '../view/footer.php'; // add footer
?>