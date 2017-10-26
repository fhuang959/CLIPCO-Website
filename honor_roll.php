<!DOCTYPE html>
<head lang="en">
    <title>CLIPCO - CLIPCO Honor Roll</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="paralax.js"></script>
    <style type="text/css">

        .donation-level-title {
            font-size: 2em;
        }

        .grade-header {
            font-size: 1.5em;
        }

        .family-name {
            font-size: 1em;
        }

        .grade-header, .family-name {
            color: black;
        }

    </style>
</head>
<body id="top" onload="loadImage(0);">

<div id="navbar-placeholder"></div>
<script>
    $(function () {
        $("#navbar-placeholder").load("subpage_navbar.html");
    });
</script>

<div class="bg"></div>

<div class="jumbotron text-center">
    <h1>Honor Roll 2017-2018</h1>
    <p>Thank You to All the Families Who Donated</p>
</div>

<div class="container-fluid bg-grey">
    <div>
        <h4>The CLIPCO Board would like to thank the following donors for their support in the
            continuing success of CLIP.</h4>
    </div>
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h2>K-6 Families</h2>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span
                                    class="donation-level-title">Platinum</span><span class="donation-level-range">&nbsp;(dontation of $950 or more)</span></a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            $empty = true;
                            $grades = array("Kindergarten", "1st Grade", "2nd Grade", "3rd Grade", "4th Grade", "5th Grade", "6th Grade");
                            $length = count($grades);
                            for ($i=0; $i < $length; $i++) { 
                              $filename = "documents/honor roll names/" . strtolower($grades[$i]) . "_platinum_names.txt";
                              $file = fopen($filename, "r");
                              if(filesize($filename) > 0){
                                  echo "<span class=\"grade-header\">" . $grades[$i] . "</span><br>";
                                  $empty = false;
                                  while(! feof($file)){
                                    echo "<span class=\"family-name\">" . fgets($file). "</span><br>";
                                    }
                                  fclose($file);
                                  }
                              }
                              if($empty){
                                echo "Direct Give Competition is still on going. <a href=\"http://cusdclipco.org/donations.html\">Donate</a> now to see your name here!";
                              } 
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span
                                    class="donation-level-title">Gold</span><span class="donation-level-range">&nbsp;(dontation of $700 - $949)</span></a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            $empty = true;
                            $grades = array("Kindergarten", "1st Grade", "2nd Grade", "3rd Grade", "4th Grade", "5th Grade", "6th Grade");
                            $length = count($grades);
                            for ($i=0; $i < $length; $i++) { 
                              $filename = "documents/honor roll names/" . strtolower($grades[$i]) . "_gold_names.txt";
                              $file = fopen($filename, "r");
                              if(filesize($filename) > 0){
                                  echo "<span class=\"grade-header\">" . $grades[$i] . "</span><br>";
                                  $empty = false;
                                  while(! feof($file)){
                                    echo "<span class=\"family-name\">" . fgets($file). "</span><br>";
                                    }
                                  fclose($file);
                                  }
                              }
                              if($empty){
                                echo "Direct Give Competition is still on going. <a href=\"http://cusdclipco.org/donations.html\">Donate</a> now to see your name here!";
                              } 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span
                                    class="donation-level-title">Silver</span><span class="donation-level-range">&nbsp;(dontation of $450 - $699)</span></a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            $empty = true;
                            $grades = array("Kindergarten", "1st Grade", "2nd Grade", "3rd Grade", "4th Grade", "5th Grade", "6th Grade");
                            $length = count($grades);
                            for ($i=0; $i < $length; $i++) { 
                              $filename = "documents/honor roll names/" . strtolower($grades[$i]) . "_silver_names.txt";
                              $file = fopen($filename, "r");
                              if(filesize($filename) > 0){
                                  echo "<span class=\"grade-header\">" . $grades[$i] . "</span><br>";
                                  $empty = false;
                                  while(! feof($file)){
                                    echo "<span class=\"family-name\">" . fgets($file). "</span><br>";
                                    }
                                  fclose($file);
                                  }
                              }
                              if($empty){
                                echo "Direct Give Competition is still on going. <a href=\"http://cusdclipco.org/donations.html\">Donate</a> now to see your name here!";
                              } 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span
                                    class="donation-level-title">Bronze</span><span class="donation-level-range">&nbsp;(dontation of $225 - $449)</span></a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            $empty = true;
                            $grades = array("Kindergarten", "1st Grade", "2nd Grade", "3rd Grade", "4th Grade", "5th Grade", "6th Grade");
                            $length = count($grades);
                            for ($i=0; $i < $length; $i++) { 
                              $filename = "documents/honor roll names/" . strtolower($grades[$i]) . "_bronze_names.txt";
                              $file = fopen($filename, "r");
                              if(filesize($filename) > 0){
                                  echo "<span class=\"grade-header\">" . $grades[$i] . "</span><br>";
                                  $empty = false;
                                  while(! feof($file)){
                                    echo "<span class=\"family-name\">" . fgets($file). "</span><br>";
                                    }
                                  fclose($file);
                                  }
                              }
                              if($empty){
                                echo "Direct Give Competition is still on going. <a href=\"http://cusdclipco.org/donations.html\">Donate</a> now to see your name here!";
                              } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <h2>7-8 Families</h2>
            <div class="panel-group" id="accordion2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse5">
                                <span class="donation-level-title">Platimun</span><span class="donation-level-range">&nbsp;(Donation of $475 or more)</span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            $empty = true;
                            $grades = array("7th grade", "8th grade");
                            $length = count($grades);
                            for ($i=0; $i < $length; $i++) { 
                              $filename = "documents/honor roll names/" . strtolower($grades[$i]) . "_platinum_names.txt";
                              $file = fopen($filename, "r");
                              if(filesize($filename) > 0){
                                  echo "<span class=\"grade-header\">" . $grades[$i] . "</span><br>";
                                  $empty = false;
                                  while(! feof($file)){
                                    echo "<span class=\"family-name\">" . fgets($file). "</span><br>";
                                    }
                                  fclose($file);
                                  }
                              }
                              if($empty){
                                echo "Direct Give Competition is still on going. <a href=\"http://cusdclipco.org/donations.html\">Donate</a> now to see your name here!";
                              } 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse6"><span
                                    class="donation-level-title">Gold</span><span class="donation-level-range">&nbsp;(Donation of $350 - $474)</span></a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse">
                        <div class="panel-body">
                           <?php
                           $empty = true;
                           $grades = array("7th grade", "8th grade");
                            $length = count($grades);
                            for ($i=0; $i < $length; $i++) { 
                              $filename = "documents/honor roll names/" . strtolower($grades[$i]) . "_gold_names.txt";
                              $file = fopen($filename, "r");
                              if(filesize($filename) > 0){
                                  echo "<span class=\"grade-header\">" . $grades[$i] . "</span><br>";
                                  $empty = false;
                                  while(! feof($file)){
                                    echo "<span class=\"family-name\">" . fgets($file). "</span><br>";
                                    }
                                  fclose($file);
                                  }
                              }
                              if($empty){
                                echo "Direct Give Competition is still on going. <a href=\"http://cusdclipco.org/donations.html\">Donate</a> now to see your name here!";
                              } 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse7"><span
                                    class="donation-level-title">Silver</span><span class="donation-level-range">&nbsp;(Donation of $226 - $349)</span></a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            $empty = true;
                            $grades = array("7th grade", "8th grade");
                            $length = count($grades);
                            for ($i=0; $i < $length; $i++) { 
                              $filename = "documents/honor roll names/" . strtolower($grades[$i]) . "_silver_names.txt";
                              $file = fopen($filename, "r");
                              if(filesize($filename) > 0){
                                  echo "<span class=\"grade-header\">" . $grades[$i] . "</span><br>";
                                  $empty = false;
                                  while(! feof($file)){
                                    echo "<span class=\"family-name\">" . fgets($file). "</span><br>";
                                    }
                                  fclose($file);
                                  }
                              }
                              if($empty){
                                echo "Direct Give Competition is still on going. <a href=\"http://cusdclipco.org/donations.html\">Donate</a> now to see your name here!";
                              } 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapse8"><span
                                    class="donation-level-title">Bronze</span><span class="donation-level-range">&nbsp;(Donation of $225)</span></a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            $empty = true;
                            $grades = array("7th grade", "8th grade");
                            $length = count($grades);
                            for ($i=0; $i < $length; $i++) { 
                              $filename = "documents/honor roll names/" . strtolower($grades[$i]) . "_bronze_names.txt";
                              $file = fopen($filename, "r");
                              if(filesize($filename) > 0){
                                  echo "<span class=\"grade-header\">" . $grades[$i] . "</span><br>";
                                  $empty = false;
                                  while(! feof($file)){
                                    echo "<span class=\"family-name\">" . fgets($file). "</span><br>";
                                    }
                                  fclose($file);
                                  }
                              }
                              if($empty){
                                echo "Direct Give Competition is still on going. <a href=\"http://cusdclipco.org/donations.html\">Donate</a> now to see your name here!";
                              } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12" id="stock-image">
            <!-- scripty mcscriptface will fill this in-->
            <script src="imageLoading.js" id="image-laoding-script"></script>
        </div>
    </div>
</div>


<footer class="container-fluid text-center bg-grey">
    <a href="#top" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
    <p>* Donors have the option to remain anonymous. If you previously indicated your choice to be an anonymous donor
        but would like to have your name published, or if you wish to become anonymous, please e-mail us at
        clipcotreasurer@gmail.com.</p>
</footer>
<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar  footer link
        $(".navbar a, footer a[href='#top']").on('click', function (event) {
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