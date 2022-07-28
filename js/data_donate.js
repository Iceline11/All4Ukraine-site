$(function () {
    $(".donate").click(
        function () {
            var orderid = $(this).attr('data-order-id');
            var cardorder = $(this).attr('data-card-order');
            var dataname = $(this).attr('data-name');

            $(".order_id_hidden").attr('value', orderid);
            $(".card_order_hidden").attr('value', cardorder);
            $("#name").text(dataname);
            $(".name").attr('value', dataname);
        })
});