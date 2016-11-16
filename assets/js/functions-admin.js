/*Delete Galerias*/
$('.btn-danger').click(function(){



    $(this).parent().parent().find('.alert').removeClass('hidden');
    $(this).parent().parent().find('.alert').fadeIn("Slow");

    });
$('.close').click(function(){

    $(this).parent().parent().fadeOut('Slow');
    })
$('.cancel-erase').click(function(){

    $(this).parent().fadeOut('Slow');
    })
$('.erase').click(function(){
    $table = $(this).parent().parent().find('.table').val();
    $where = $(this).parent().parent().find('.where').val();
    $content = $(this).parent().parent().parent();

    $content.hide();
    $(this).parent().parent().parent().parent().find('.alert-success').removeClass('hidden');

    $.ajax({
    type: "POST",
    url: baseurl+"/delete/",
    data: "table=" + $table + "&where=" + $where ,
    success : function(text){
    if (text == "Success"){

    $content.hide();

    }
}
});

});


/*---------------*/



