<?php
include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";

$sql_donater_list = $pdo->query("SELECT * FROM `donate_list`");

// show all orders
$sql_all_orders = $pdo->query('SELECT * FROM `orders` WHERE status = 1 ORDER BY card_order ASC ');

// return status
function statusdescr($status) {
    if ($status == 1) {
        echo "Активна";
    }
    elseif ($status == 2) {
        echo "Успішно закрита";
    }
    else {
        echo "Неактивна (призупинена)";
    }
}

?>
<div class="container">
    <h3 class="mt-4">Звітність фонду All4Ukraine</h3>
    <div class="row">
        <table class="table">
            <thead class="table-warning">
            <tr>
                <th scope="col">Дата донату</th>
                <th scope="col">Сума</th>
                <th scope="col">Від дкого</th>
                <th scope="col">На яку заявку</th>
                <th scope="col">Статус заявки</th>
            </tr>
            </thead>
            <tbody>
                <?php while ($row = $sql_donater_list->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr><td>" . $row->date . "</td>";
                    echo "<td>" . $row->sum . "</td>";
                    echo "<td>" . $row->donater . "</td>";
                    echo "<td>";
                    // Select order
                    $order = $pdo->query("SELECT * FROM `orders` WHERE order_id = '$row->order_id'")->fetch(PDO::FETCH_ASSOC);
                    echo "<a href='view_order.php?od=". $order["card_order"] ."'>" . $order["name_ua"] . "</a>";
                    echo "</td><td>";
                    statusdescr($order["status"]);
                    echo "</td></tr>";
                } ?>
            </tbody>
        </table>
        <div class="col-sm mb-4"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDonate">Добавити</button></div>
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