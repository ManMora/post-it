$(document).ready(function () {

    $(".post").keyup(function (){
         var x = $(this);
         makeajaxa(x);
         
     });


    function makeajaxa(x){
       
        var jqxhr = $.post( "api/postapi.php", {postoperation: '1', mail: window.user,  posttitle: x.parent().find('.title').val(), postcontent: x.val(), postid: x.parent().find('.id').val() })
            .done(function(response) {
                console.log(x);
                x.parent().find('.id').val(response);
                console.log(response);
                               })
            .fail(function() {

            })
            .always(function() {
                if(x.hasClass('post-end')){
                     x.removeClass('post-end');

                $( ".postCollection"  ).append('<div class="postWrapper"><div class="postIt"><input class="title" maxlength="20" type="text" name="title"><input class="id" value="" name"id" hidden="true" type"text"=""><hr><textarea class="post post-end"></textarea></div></div>');
                var y = $(".post-end");                                                                                                      
                y.bind("keyup",function (){ makeajaxa($(this)) }); 
                }
            });
        }

    $(".validateMail").focusout(function (){
        var jqxhr = $.post( "api/postapi.php", {postoperation: '2', mail: $(this).val()})
            .done(function(response) {
                if (response == "0"){
                    document.getElementById("Error").style.fontSize="small";
                    document.getElementById("Error").style.color = "green";
                    document.getElementById("Error").innerHTML = "Email Valido";
                }else if(response == "1"){
                    document.getElementById("Error").style.fontSize="small";
                    document.getElementById("Error").style.color = "#ff8020";
                    document.getElementById("Error").style.textAlign="center";
                    document.getElementById("Error").innerHTML = "ERROR: Formato De Email Incorrecto";
                }else if(response == "2"){
                    document.getElementById("Error").style.fontSize="small";
                    document.getElementById("Error").style.color = "red";
                    document.getElementById("Error").style.textAlign="center";
                    document.getElementById("Error").innerHTML = "ERROR: Email En Uso";
                }else{
                    document.getElementById("Error").innerHTML = "";
                }
                console.log(response);
                })
            .fail(function() {

            })
            .always(function() {
                
            });
        });
});

