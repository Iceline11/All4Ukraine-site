<?php
    include 'view/header.php'; // add header
    include 'view/menu.php'; // add menu


?>



<div class="container">
    <h4 class="my-4">Добрі справи</h4>
    <div  class="order_card">
        <div class="admin_buttons">
            <button type="button" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
        </div>
        <img class="order_picture" src="img/dron.png"  alt="dron">
        <div class="order_subscr">
            <div class="order_date">
                <i class="fa-solid fa-calendar-days"></i><p>12.12.2021</p>
            </div>

            <h4>Дрон для 43-ї окремої артилерійської бригади</h4>
            <p>Щодня ми отримуємо сумні новини з Харківщини 💔. Ворог без перебору зносить з лиця землі житлові будинки, школи та садочки.
                Щодня поранені та загиблі😥🖤.
                Саме Харківщина є лідером після Маріуполя по зруйнованій інфр... <a href="">(далі)</a></p>
            <div class="order_donations">
                <span class="order_collect">Зібрано:&nbsp;</span><span class="order_collect_text">₴ 50000</span>
                <a class="order_collect_edit" href="" data-bs-toggle="modal" data-bs-target="#modal_amount"><i class="fa-solid fa-pen-to-square"></i></a>
                <span class="order_quant">Донатерів: &nbsp;</span><span class="order_quant_text">2</span>
                <a class="order_collect_edit" href=""><span><i class="fa-solid fa-eye"></i></span></a>
                <a class="order_collect_edit" href=""><span><i class="fa-solid fa-pen-to-square"></i></span></a>
            </div>
            <div class="progress mb-1" style="height: 25px;">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>

            <div class="buttons">
                <span class="order_goal">Ціль:&nbsp;</span><span class="order_goal_text">₴ 200000</span>
                <a class="order_goal_edit" href=""><span><i class="fa-solid fa-pen-to-square"></i></span></a>
                <a href="#" class="btn btn-primary read_more">Читати далі</a>
                <a href="#" class="btn btn-warning donate">Задонатити</a>
            </div>
        </div>
    </div>
    <div class="row">
        <button type="button" class="btn btn-outline-success">Нова заявка</button>
    </div>
</div>



<div class="modal fade" id="modal_amount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Змінити зібрану суму</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form>
                    <input type="number" value="2000"> грн.
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary">Змінити</button>
            </div>
        </div>
    </div>
</div>

<?php
    include 'view/footer.php'; // add footer
?>
