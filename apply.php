<!DOCTYPE html>
<head>
    <title>CLIPCO - Apply</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css">
        #form-table{
            border-width: 0px solid rgba(0,0,0,0);
        }

        .error{
            color: red;
        }
    </style>
</head>
<body id="myPage" class="bg-grey" onload="loadImage(0)">
<div id="navbar-placeholder"></div>
<script>
    $(function () {
        $("#navbar-placeholder").load("subpage_navbar.html");
    });
</script>
<?php
    $nameErr = $emailErr = $positionErr = "";
    $name = $email = $position = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $nameErr = "Name is required";
        } else{
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $nameErr = "Only letters and white space allowed"; 
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format"; 
            }
        }
        
        if (empty($_POST["position"])) {
            $positionErr= "please select a position";
        } else {
            $position = test_input($_POST["position"]);
        }
    }

    /*$file = fopen("application-responses.txt", "a")
    fwrite($file, "\n");
    $timeStamp = date("Y-m-d") + " " + date("h:i:sa") + "\n";
    fwrite($file, $timeStamp);
    $nameWrite = "Name: " + $name + "\n";
    fwrite($file, $nameWrite);
    $emailWrite = "Email: " + $email + "\n";
    fwrite($file, $emailWrite);
    $positionWrite = "Position: " + $position + "\n";
    fwrite($file, $positionWrite);
    fclose($file);*/



    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<div class="jumbotron text-center bg-white">
    <h1>Apply</h1>
    <p>Become A part of CLIPCO</p>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h2>Application Form</h2>
            <h4>Please fill out this form and we will get back to you as soon as possible.</h4>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <table id="form-table">
                    <tbody>
                        <tr>
                            <td>
                                Name:  
                            </td>
                            <td>
                                <input type="text" name="name">
                                <span class="error"><?php echo $nameErr;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               E-mail: 
                            </td>
                            <td>
                                <input type="text" name="email">
                                <span class="error"><?php echo $emailErr;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Desired Position:
                            </td>
                            <td>
                                <select name="position">
                                    <option selected="selected" value="Kindergarten">Kindergarten Rep</option>
                                    <option value="2nd grade">2nd Grade Rep</option>
                                    <option value="4th grade">4th Grade Rep</option>
                                    <option value="8th grade">8th Grade Rep</option>
                                </select>
                                <span class="error"><?php echo $positionErr;?></span>
                            </td>     
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                 <input type="submit" name="submit" value="Submit">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
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