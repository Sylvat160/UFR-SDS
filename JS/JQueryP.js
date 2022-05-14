$(document).ready(function(){
    $('p').click(function(){
        $(this).hide();
    });
    $('.p1').dblclick(function(){
        $(this).hide();
    });

    $('.p2').hide();
    $('p1').mouseenter(function(){
        $('p2').show();
    });
    $('p1').mouseleave(function(){
        $('p2').hide();
    });
});
