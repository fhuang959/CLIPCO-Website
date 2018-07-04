<!DOCTYPE html>
<head>
    <title>CLIPCO - Update Meeting Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://cusdclipco.org/css.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> 
    <script type="text/javascript" src="jquery.date_input.js"></script>
    <link rel="stylesheet" href="http://github.com/jonleighton/date_input/raw/master/date_input.css" type="text/css">
    <script type="text/javascript">$($.date_input.initialize);</script>
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
        <h1>Update Meeting Records</h1>
        <p>Update the meeting minutes and agendas</p>
    </div>
    <?php

        $date = "";
        $type = "";
        $password_entered = "";
        $password_incorrect = "";
        $dateErr = "";
        $typeErr = "";
        $imageErr = "";
        $imageSuccess = "";
        $inputVerified = true;
        $file = "";

        include 'about.php';

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if(!empty($_POST["date"])){
                $date = test_input($_POST["date"]);
                $date = str_replace(" ", "-", $date);
            } else {
                $dateErr = "please enter the meeting date.";
                $inputVerified = false;
            }

            if(!empty($_POST["type"])){
                $type = test_input($_POST["type"]);
            } else {
                $typeErr = "please select the type of document.";
                $inputVerified = false;
            }

            if(!empty($_POST["psw"])){
                $password_entered = test_input($_POST["psw"]);
            } else {
                $password_incorrect = "Please enter the password.";
                $inputVerified = false;
            }

            $hash = '$2y$10$1Vlz7FfbY1J/cEM.39GtpOoFGvDcKS8/0cC2VyagFLrppTC8cDGB2';
            if(!password_verify($password_entered,$hash)){
                $password_incorrect = "Password is incorrect";
                $inputVerified = false;
            } else{
                //do nothing
            }

            if (empty($_FILES["fileToUpload"]["tmp_name"])) {
                $imageEr = "Please select a file to upload.";
                $inputVerified = false;
            } else{
                 $file_tmp = $_FILES['fileToUpload']['tmp_name'];
            }

            if($inputVerified){
               
                $size = $_FILES['fileToUpload']['size'];
                $fileType = $_FILES['fileToUpload']['type'];
                $name = $_FILES['fileToUpload']['name'];
                $maxSize = 2000000;
                $file = "/home/cusdzern/public_html/documents/clipco meeting $type/$date.pdf";
                $extension = strtolower(substr($name, strpos($name, ".") + 1));


                //check file type
                if(!($extension == 'pdf' && $fileType == 'application/pdf')){
               		$imageErr = "Only pdf files are accepted.";
                } else{
               		//check file size (should only get this far if file type is good)
               		if ($size > $maxSize) {
               			$imageErr = "File must be less than 2mb";
               		} else{
               			if(move_uploaded_file($file_tmp, $file)){
               				echo "Document was uploaded! <br>";
                            $run = new main();
                            $run->run();
                            //reset everything
                            $date = "";
                            $password_entered = "";
                            $type = "";
               			} else{
               				$imageErr = "Sorry, there was an error";
               			}
               		}
                }   
            }
        }

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <h2>Update Meeting Minutes and Agendas</h2>
                <?php if(!empty($imageSuccess)){echo "<h4>$imageSuccess<h4>";}?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                    <table>
                        <tr>
                            <td>
                                Select the date of the Meeting:
                                <?php if(!empty($dateErr)){echo "<br><span class=\"error\">" . $dateErr . "</span>";} ?>
                            </td>
                            <td>
                                <input type="text" name="date" class="date_input" value="<?php echo $date;?>" >
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                Select Meeting type:
                            </td>
                            <td>
                                <?php if(!empty($typeErr)){echo "<br><span class=\"error\">" . $typeErr . "</span>";} ?>
                                <input type="radio" name="type" value="agendas" <?php if(!empty($type) && $type == "agendas"){echo "checked";} ?>>Agenda<br>
                                <input type="radio" name="type" value="minutes" <?php if(!empty($type) && $type == "minutes"){echo "checked";} ?>>Minutes<br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Please select a file to upload.
                            </td>
                            <td>
                                <?php if(!empty($imageErr)){echo "<span class=\"error\">" . $imageErr . "</span>";} ?>
                                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password:
                            </td>
                            <td>
                                <span class="error"><?php echo $password_incorrect;?></span>
                                <input type="password" name="psw" <?php if($inputVerified){echo"value=\"$password_entered\"";}?>>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <input type="submit" value="Upload File" name="submit">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-sm-4 col-xs-12" id="stock-image">
                <img src="http://www.cusdclipco.org/images/placeholder1.jpg" class="subpage_image">
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