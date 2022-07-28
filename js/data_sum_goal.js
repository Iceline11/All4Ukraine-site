$(function () {
    $(".order_collect_edit").click(
        function () {
            var nametitle = $(this).attr('data-collect');
            var orderid = $(this).attr('data-id');

            $(".showcollect").attr('value', nametitle);
            $(".id_hidden").attr('value', orderid);
        })
});

$(function () {
    $(".order_goal_edit").click(
        function () {
            var namegoal = $(this).attr('data-goal');
            var orderid = $(this).attr('data-id');

            $(".showgoal").attr('value', namegoal);
            $(".id_hidden").attr('value', orderid);
        })
});