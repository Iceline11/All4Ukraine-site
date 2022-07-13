<?php include 'view/header.php'; // add header?>


    <button type="button" class="btn btn-primary" data-nametitle="Букет «Фруктовый Коктейль»" data-imgtovara="images/buket/2.jpg" data-pricetovar="1700 р." data-bs-toggle="modal" data-bs-target="#exampleModal">Заказать</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Быстрый заказ цветов</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-9 tovarinfo"></div>
                    </div>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ваше имя</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Например: Иван">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Ваш телефон</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Например: +797757775342">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Примечание</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Ваш адрес или примечание"></textarea>
                        </div>
                        <input id="hide1" type="hidden" value="">
                        <input id="hide2" type="hidden" value="">
                        <button type="submit" class="btn btn-primary w-100">Заказать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $(".btn").click(
                function() {
                    var nametitle = $(this).attr('data-nametitle');

                    $(".tovarinfo").append(nametitle);
                    $("#hide1").attr('value', nametitle);
                    $("#hide2").attr('value', pricetovar);
                })
        });
    </script>


<?php include 'view/footer.php'; // add header?>