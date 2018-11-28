$(function(){
   $(window).on("scroll",function(){
       if ($(window).scrollTop() > 100){
        $(".menu").addClass("menu-scroll");
    } else{
        $(".menu").removeClass("menu-scroll");
       }
   });
});