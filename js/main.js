$(document).ready(function () {

    $(".post").keyup(function (){
        var x = $(this).parent();
        var jqxhr = $.post( "/api/postapi.php", {postoperation: '1', username: window.user,  posttitle: $(this).parent().find('.title').val(), postcontent: $(this).val(), postid: $(this).parent().find('.id').val() })
            .done(function(response) {
                x.find('.id').attr('value',response);
                console.log(response);
                })
            .fail(function() {

            })
            .always(function() {
                console.log(x);
            });
        });
});
