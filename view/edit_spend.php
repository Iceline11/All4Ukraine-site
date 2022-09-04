<?php
include '../view/header.php'; // add header
$menuitem = "report"; // active page
include '../view/menu.php'; // add menu

// show item by id
$id = $_GET['id'];
$sql_item_edit = $pdo->query("SELECT * FROM `spend_list` WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);

?>
<div class="container">
    <div class="my-4">
        <form action="../modules/edit_spend.php" method="post">
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-floating mb-3">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="text" class="form-control" id="item" placeholder="name@example.com" name="item" value="<?=$sql_item_edit['item']?>" required>
                        <label for="item">Товар</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="quant" placeholder="name@example.com" name="quant"  value="<?=$sql_item_edit['quant']?>" required>
                        <label for="quant">Кількість</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <input type="date" class="form-control py-3" name="date"  value="<?=$sql_item_edit['date']?>">
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="sum"  value="<?=$sql_item_edit['price']?>" required>
                        <label for="floatingInput">Сумма, грн.</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <select class="form-select" aria-label="Пример выбора по умолчанию" name="category" required>
                        <option selected>Категорія</option>
                        <option <?php if ($sql_item_edit['category'] == "амуніція") echo "selected" ?> value="амуніція">амуніція</option>
                        <option <?php if ($sql_item_edit['category'] == "госп товари") echo "selected" ?> value="госп товари">госп товари</option>
                        <option <?php if ($sql_item_edit['category'] == "ліки") echo "selected" ?> value="ліки">ліки</option>
                        <option <?php if ($sql_item_edit['category'] == "засоби звязку") echo "selected" ?> value="засоби звязку">засоби звязку</option>
                        <option <?php if ($sql_item_edit['category'] == "авто") echo "selected" ?> value="авто">авто</option>
                        <option <?php if ($sql_item_edit['category'] == "ПНБ і тепловізори") echo "selected" ?> value="ПНБ і тепловізори">ПНБ і тепловізори</option>
                        <option <?php if ($sql_item_edit['category'] == "Біноклі і далекоміри") echo "selected" ?> value="Біноклі і далекоміри">Біноклі і далекоміри</option>
                        <option <?php if ($sql_item_edit['category'] == "Приціли") echo "selected" ?> value="Приціли">Приціли</option>
                        <option <?php if ($sql_item_edit['category'] == "дрон") echo "selected" ?> value="дрон">дрон</option>
                        <option <?php if ($sql_item_edit['category'] == "засоби живлення") echo "selected" ?> value="засоби живлення">засоби живлення</option>
                        <option <?php if ($sql_item_edit['category'] == "ліхтарі") echo "selected" ?> value="ліхтарі">ліхтарі</option>
                        <option <?php if ($sql_item_edit['category'] == "інше") echo "selected" ?> value="інше">інше</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button class="btn btn-primary my-3" type="submit">Змінити</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include '../view/footer.php'; // add footer
?>