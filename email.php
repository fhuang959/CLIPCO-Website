<!DOCTYPE html>
<head>
    <title>CLIPCO - Email</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://www.cusdclipco.org/css.css">
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
<body id="myPage" class="bg-grey" onload="loadImage(0)">
<div id="navbar-placeholder"></div>
<script>
    $(function () {
        $("#navbar-placeholder").load("https://www.cusdclipco.org/subpage_navbar.html");
    });
</script>

<div class="jumbotron text-center bg-white">
    <h1>Email Us</h1>
    <p>Get in contact with us</p>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <?php
            $board = $user = $subject = $body = "";
            $board_err = $subject_err = $body_err = $user_err = "";
            $sent = "";
            $invalid = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if(empty($_POST["board"])){
                    $invalid = true;
                    $board_err = "please specify a board member to contact. You can find a list of them <a href=\"contact.html\">here</a>.<br>";
                }else{
                    $board = test_input($_POST["board"])."@cusdclipco.org";
                }
                
                $user = test_input($_POST["user"]);

                if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
                    $invalid = true;
                    $user_err = "please enter a valid email"; 
                }

                if(empty($_POST["subject"])){
                    $invalid = true;
                    $subject_err = "please enter a subject for the email<br>";
                }else{
                    $subject = test_input($_POST["subject"]);
                }

                if(empty($_POST["body"])){
                    $invalid = true;
                    $body_err = "please enter a message to be sent<br>";
                }else{
                    $body = test_input($_POST["body"]);
                    $body = wordwrap($body, 70, "\r\n");
                }
                if(!$invalid){
                    if(empty($user)){
                        if(mail($board, $subject, $body)){
                            $sent = "Message sent successfully!<br>";
                            $board = $user = $subject = $body = "";
                        } else{
                            $sent = "Sorry, there was an error sending your message. Try again later.<br>";
                        }
                    } else{
                        $headers = 'From: ' . $user . "\r\n";
                        $body = $headers . $body;
                        if(mail($board, $subject, $body, $headers)){
                            $sent = "Message sent successfully!<br>";
                            $board = $user = $subject = $body = "";
                        } else{
                            $sent = "Sorry, there was an error sending your message. Try again later.<br>";
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
            <h2>Email a Board Member</h2>
            <h4><?php echo $sent;?></h4>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <table>
                    <tr>
                        <td>
                            Board Member Email:<br>
                            (Usually the Board member&apos;s firstname@cusdclipco.org)
                        </td>
                        <td>
                            <span class="error"><?php echo $board_err;?></span>
                            <input type="text" name="board" value="<?php if($_SERVER["REQUEST_METHOD"] == "GET"){echo htmlspecialchars($_GET["board"]);}?>"> @cusdclipco.org
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Your Email:
                        </td>
                        <td>
                            <span class="error"><?php echo $user_err;?></span>
                            <input type="text" name="user" value="<?php echo $user;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email Subject Line:
                        </td>
                        <td>
                            <span class="error"><?php echo $subject_err;?></span>
                            <input type="text" name="subject" value="<?php echo $subject;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Comments:
                        </td>
                        <td>
                            <span class="error"><?php echo $body_err;?></span>
                            <textarea cols="20" rows="5" name="body"><?php echo $body;?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="Send">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-sm-4 col-xs-12" id="stock-image">
            <!-- scripty mcscriptface will fill this in-->
             <script src="https://www.cusdclipco.org/imageLoading.js" id="image-laoding-script"></script>
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top"><span class="glyphicon glyphicon-chevron-up"></span></a>
</footer>
<script src="https://www.cusdclipco.org/js.js"></script>
</body>
</html>