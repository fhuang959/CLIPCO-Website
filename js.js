/**
* js.js for cusdclipco.org
**/


//function for getting parameters from the url
function getParameterByName(name) {
        url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) throw "parameter not found";
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

//scroll script
function scrollScript(){
    // Add smooth scrolling to all links in navbar  footer link
    $(".navbar a, footer a[href='#top'], .slide-link").on('click', function (event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
            // Store hash
            var hash = this.hash;
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function () {
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
}

//slideAnim script
function slideAnim(){
    $(".slideanim").each(function () {
        var pos = $(this).offset().top;
        var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
            $(this).addClass("slide");
        }
    });
}

//xs-hide
function xs_hide(){
    if($(window).width() <= 768){
        $(".xs-hide").remove();
    }
}


$(document).ready(function () {

    //scroll script
    scrollScript();

    //xs-hide
    xs_hide();

    $(window).scroll(function () {
        slideAnim();
    });

})

$(window).resize( function () {
    xs_hide();
});


