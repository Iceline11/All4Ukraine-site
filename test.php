<?php
    include 'view/header.php'; // add header ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <table class="table table-hover">
        <tr data-user-id="123">
            <td class="uid">123</td>
            <td class="uname">username-123</td>
            <td><a href="#" class="edit">edit</a></td>
        </tr>
        <tr data-user-id="321">
            <td class="uid">321</td>
            <td class="uname">username-321</td>
            <td><a href="#" class="edit">edit</a></td>
        </tr>
    </table>



    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" class="userId" id="uid">
                    <input type="text" class="userName" id="uname" name="userName" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary" id="save">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>


<script>
    var $editRow = null;

    $(".edit").click(function(e){
        $editRow = $(this).closest("tr");

        $("#uid").val($editRow.data('user-id'));
        $("#uname").val($editRow.find(".uname").text());

        $("#myModal").modal('show');
    });


    $("#save").click(function(){
        $editRow.find(".uname").text( $("#uname").val() );
        $(this).closest('.modal').modal('hide');

//    $.post("some-url.php", { ..... })
//       .done(function(){
        // обновить таблицу, закрыть окно
        // $editRow.find(".uname").text( $("#uname").val() );
        //  $(this).closest('.modal').modal('hide');
//       })
//       .fail(function(){
//          // ничего не делать, ошибка
//       }) ;
    });

</script>

<?php
include 'view/footer.php'; // add header ?>