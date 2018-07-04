<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<title>CLIPCO - About Us</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />
    	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
    	<link href="css.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    	<style type="text/css">table, th, td {
                border: 1px solid rgb(150, 150, 150);
                border-collapse: collapse;
                padding: 7px;
            }
    	</style>
    </head>
    <body>
        <div id="navbar-placeholder"></div>
        <script>
            $(function () {
                $("#navbar-placeholder").load("http://www.cusdclipco.org/subpage_navbar.html");
            });
        </script>
        <script type="text/javascript">
            $(function() {
                $("#board-directors").load("board_directors.html");
            });
        </script>
        <script type="text/javascript">
            $(function() {
                $("#program-directors").load("program_directors.html");
            });
        </script>

        <div class="jumbotron text-center">
            <h1>About Us</h1>
        </div>

        <div class="container-fluid bg-grey">
            <div class="row">
            <div class="col-sm-8 col-xs-12">
            <h2>About CLIPCO</h2>

            <h4>CLIPCO is the non-profit fundraising organization that supports the programs in CLIP that are not funded by normal school district funds. This includes Mandarin curriculum development, Mandarin classroom teaching materials, instructional aides in the classrooms, classroom equipment (PCs &amp; Mandarin software) and Chinese cultural and enrichment activities.</h4>
            &nbsp;

            <p>CLIPCO is run entirely by parent&nbsp;volunteers. We are always looking for new volunteers to join our team. No matter what your strengths are, you&#39;ll be an important addition to our extraordinary team. Contact us today for more information about volunteering or providing a donation!</p>
            &nbsp;

            <div><button class="btn btn-default btn-lg" data-target="#contacts" data-toggle="collapse" type="button">Board of Directors</button></div>

            <div class="collapse" id="contacts">
            <div class="row">
            <div class="col-sm-12 col-xs-12">
            <p>There are still open positions available. Please contact us to join our team!</p>

            <div id="board-directors"></div>
            </div>
            </div>
            </div>

            <p></p>

            <div><button class="btn btn-default btn-lg" data-target="#morecontacts" data-toggle="collapse" type="button">Program Directors</button></div>

            <div class="collapse" id="morecontacts">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <p>There are still open positions available. Please contact us to join our team!</p>
                        <div id="program-directors"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-xs-12">
                <h2>Meeting Minutes and Agenda</h2>

                <p>The Board of Directors meet on the third Thursday of each month at 7pm in the Meyerholz Flex Lab</p>

            <div class="panel-group" id="accordion">
                <!-- just keeping this stuff for the format -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" href="#collapse5">2017-2018 Meetings</a></h4>
                    </div>

                    <div class="panel-collapse collapse" id="collapse5">
                        <div class="panel-body">
                            October 19 meeting Agenda/Minutes
                        </div>
                    </div>
                </div>
                <!-- end format stuff -->

            </div>
            <a class="btn btn-default btn-lg" href="faq.html" role="button">FAQ</a>

            <div class="col-sm-4 col-xs-12" id="stock-image"><img alt="stock-image" class="subpage_image" src="images/about-us.JPG"></div>
        </div>
    </body>
</html>