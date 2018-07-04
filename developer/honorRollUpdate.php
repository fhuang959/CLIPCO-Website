<!DOCTYPE html>
<head>
    <title>CLIPCO - Honor Roll Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://cusdclipco.org/css.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        /* some css can go here */
        .error{
            color: red;
        }
        table, th, td {
            border: 0px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body id="myPage" class="bg-grey">
<div id="navbar-placeholder"></div>
<script>
    $(function () {
        $("#navbar-placeholder").load("http://cusdclipco.org/subpage_navbar.html");
    });
</script>

<div class="jumbotron text-center bg-white">
    <h1>Honor Roll Update</h1>
    <p>Add names to the honor roll page</p>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h2>Update form for honor roll names</h2>
            <?php 
            $grade = $level = $password_entered = $names = "";
            $password_incorrect = $names_empty = "";
            $names_accepted = "";
            $fileName = "";
            $verified = true;
            $Phase2 = false;
            try{
                $Phase2 = $_POST["Phase2"];
            } catch(Exception $e){
                $Phase2 = false;
            }
            try{
                $Phase2 = $_GET["Phase2"];
            } catch (Exception $e){
                $Phase2 = false;
            }
            
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $grade = test_input($_GET["grade"]);
                $level = test_input($_GET["level"]);
                $names = test_input($_POST["names"]);
                if(empty($_POST["psw"])){
                    $password_incorrect = "please enter the password";
                    $verified = false;
                }
                else{
                    $password_entered = test_input($_POST["psw"]);
                }

                $hash = '$2y$10$4ELKJAacHM8ysAOCJQRN0eCOeMNkrsF/qrlTJqqUohD73ZqVxBrqG';
                if(!password_verify($password_entered,$hash)){
                    $password_incorrect = "Password is incorrect";
                    $verified = false;
                } else{
                    //do nothing
                }
                if($verified && $Phase2){
                    $Phase2 = false;
                    $fileName = "/home/cusdzern/public_html/documents/honor roll names/" . $grade . "_" . $level . "_names.txt";
                    $fileToWrite = fopen($fileName, "w") or die ("Unable to open file!");
                    fwrite($fileToWrite,$names);
                    fclose($fileToWrite);
                    $fileToSort = fopen($fileName, "r");
                    $namesToSort = array("");
                    while(!feof($fileToSort)){
                        array_push($namesToSort,fgets($fileToSort));
                    }
                    fclose($fileToSort);
                    sort($namesToSort);
                    $sortedFile = fopen($fileName, "w");
                    $i=0;
                    while($i < count($namesToSort)){
                        $txt = $namesToSort[$i];
                        fwrite($sortedFile, $txt);
                        $i++;
                    }
                    fclose($sortedFile);
                    $message = $grade . "_" . $level . "_names.txt updated"; 
                    mail("jasper@cusdclipco.org", "Honor Roll Updated", $message);
                    $names_accepted = "Names Accepted!";
                    $password_incorrect = "";
                    $grade = $level = $password_entered = $names = "";
                }
            }
                
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                try{
                    $grade = test_input($_GET["grade"]);
                    $level = test_input($_GET["level"]);
                }
                catch(Exception $e){
                    //do nothing
                }
                if(!empty($grade) && !empty($level)){
                    $fileName = "/home/cusdzern/public_html/documents/honor roll names/" . $grade . "_" . $level . "_names.txt";
                    $fileToRead = fopen($fileName, "r");
                    while(!feof($fileToRead)){
                        $names = $names . fgets($fileToRead);
                    }
                    fclose($fileToRead);
                    $Phase2 = true;
                }
            }

            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }

            ?>
            <form id="GETform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
                <input type="hidden" name="Phase2" value="true">
                <h4><?php echo $names_accepted;?></h4>
                <table>
                    <tr>
                        <td>
                            Grade:
                        </td>
                        <td>
                            <select name="grade" required>
                                <option value="kindergarten"<?php if(!empty($grade) && $grade=="kindergarten"){echo "selected";}?> >Kindergarten</option>
                                <option value="1st grade"<?php if(!empty($grade) && $grade=="1st grade"){echo "selected";}?> >1st Grade</option>
                                <option value="2nd grade"<?php if(!empty($grade) && $grade=="2nd grade"){echo "selected";}?> >2nd Grade</option>
                                <option value="3rd grade"<?php if(!empty($grade) && $grade=="3rd grade"){echo "selected";}?> >3rd Grade</option>
                                <option value="4th grade"<?php if(!empty($grade) && $grade=="4th grade"){echo "selected";}?> >4th Grade</option>
                                <option value="5th grade"<?php if(!empty($grade) && $grade=="5th grade"){echo "selected";}?> >5th Grade</option>
                                <option value="6th grade"<?php if(!empty($grade) && $grade=="6th grade"){echo "selected";}?> >6th Grade</option>
                                <option value="7th grade"<?php if(!empty($grade) && $grade=="7th grade"){echo "selected";}?> >7th Grade</option>
                                <option value="8th grade"<?php if(!empty($grade) && $grade=="8th grade"){echo "selected";}?> >8th Grade</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Donaton Level:
                        </td>
                        <td>
                            <select name="level" required>
                                <option value="bronze" <?php if(!empty($level) && $level=="bronze"){echo "selected";}?> >Bronze</option>
                                <option value="silver" <?php if(!empty($level) && $level=="silver"){echo "selected";}?> >Silver</option>
                                <option value="gold"<?php if(!empty($level) && $level=="gold"){echo "selected";}?> >Gold </option>
                                <option value="platinum" <?php if(!empty($level) && $level=="platinum"){echo "selected";}?> >Platinum</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" value="Select" form="GETform">
                        </td>
                    </tr>
                </table>
            </form>
            <form id="POSTform" <?php if(!$Phase2){echo "style=\"visibility: hidden\"";}?> action="<?php echo "?grade=" . $grade . "&level=" . $level . "&Phase2=true";?>" method="POST">
                <input type="hidden" name="Phase2" value="true">
                <h2>Editing names for: <?php echo $grade?>, <?php echo $level?></h2>
                <h4>List will auto-alphabetize after submission</h4>
                <table>
                    <tr>
                        <td valign="top">
                            Names:
                        </td>
                        <td>
                            <textarea wrap="physical" name="names" rows="20" cols="50">
                                <?php echo $names;?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                          password:  
                        </td>
                        <td>
                            <span class="error"><?php echo $password_incorrect;?></span>
                            <input type="password" name="psw">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- blank -->
                        </td>
                        <td style="text-align: center;">
                             <input type="submit" value="Submit" form="POSTform">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-sm-4 col-xs-12" id="stock-image">
            <img src="http://cusdclipco.org/images/donations.JPG" class="subpage_image" alt="happy children">
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top"><span class="glyphicon glyphicon-chevron-up"></span></a>
</footer>
<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar  footer link
        $(".navbar a, footer a[href='#myPage").on('click', function (event) {
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