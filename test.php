<!DOCTYPE html>
<head>
    <title>CLIPCO - subpage title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="paralax.js"></script>
    <style type="text/css">
        /* some css can go here */
    </style>
</head>
<body id="myPage" class="bg-grey" onload="loadImage(0)">
<div id="navbar-placeholder"></div>
<script>
    $(function () {
        $("#navbar-placeholder").load("subpage_navbar.html");
    });
</script>

<div class="jumbotron text-center bg-white">
    <h1>Page Title</h1>
    <p>A subtitle for the page</p>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h2><?php echo "some text!!!"?></h2>
            <h4>A bunch of text that is pretty big, but not as big as the title can go here. It's like a little
                paragraph explaining what the page is about. I like trees because they are green. green is a nice color.
                Except for cars. Cars should not be green. The green cars are always the evil ones. Don't do drugs.</h4>
            <br>
            <p>Some more text can go here. It's smaller than the paragraph before. Still important though. He may not be
                as big an showey as the other paragraph but he's trying his hardest. AAAAAAAHHHHHHHH. Why am i alife?
                一個星期過，我功課多，我還沒有做我的生詞合約，我被老師罵，我想自殺，名字又有九個叉。那是你的問題。</p>
            <br>
            <button class="btn btn-default btn-lg" id="clickMe" onclick="doFunction();">Call to Action!</button>
        </div>
        <div class="col-sm-4 col-xs-12" id="stock-image">
            <!-- scripty mcscriptface will fill this in-->
             <script src="imageLoading.js" id="image-laoding-script"></script>
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top"><span class="glyphicon glyphicon-chevron-up"></span></a>
</footer>
<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar  footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
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
        $(window).scroll(function () {
            $(".slideanim").each(function () {
                var pos = $(this).offset().top;
                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>
</body>
</html>