$('.left-side').mouseover(function(){
    $(this).css("z-index", "2");
    $('.right-side').css("z-index", "1");
});
$('.right-side').mouseover(function(){
    $(this).css("z-index", "2");
    $('.left-side').css("z-index", "1");
});