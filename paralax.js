//jumbotron paraplax script

var jumboHeight = $('.jumbotron').outerHeight();
function parallax(){
    var scrolled = $(window).scrollTop();
    $('.bg').css('height', (jumboHeight-(scrolled-350)) +'px');
}
$(window).scroll(function(e){
    parallax()+20;
});