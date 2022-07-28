$(function () {
    $(".transfer-donate").click(
        function () {
            var donateid = $(this).attr('data-donate-id');

            $(".id_hidden").attr('value', donateid);
        })
});