$(document).ready(function () {
    $('.status_link').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/getAtividadesStatus/" + $('.status_link').attr('data-id'),
            success: function(result){
            console.log(result);
        }});
    });

    $('.situacao_link').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: "/getAtividadesSituacao/" + $('.situacao_link').attr('data-id'),
            success: function(result){
                console.log(result);
            }});
    });
});