<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CLIPCO - ASEP Registration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            /* some css can go here */
            .error{
                color: red;
            }
            b {
                font-weight: bolder;
                color: black;
            }
            #classes-table, #classes-table th, #classes-table td {
                border: 0px;
                border-bottom: 1px solid rgb(150, 150, 150);
                padding: 2px 3px;
            }

            .xs-hide{
                max-height: 50vh;
            }

            #form-table{
                margin: auto;
                width: 100%;
            }

            #stock-image img{
                padding: 2px;
            }


        </style>
    </head>
    <body id="top" class="bg-grey" onload="onLoad()">
        <div id="navbar-placeholder"></div>
        <script>
            $(function () {
                $("#navbar-placeholder").load("subpage_navbar.html");
            });
        </script>

        <div class="jumbotron text-center bg-white">
            <h1>ASEP Registration</h1>
            <p>Register your child for the After School Enrichment Program</p>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 col-xs-12" id="main-content">
                    <h2> Meyerholz-CLIP After School Enrichment Program (ASEP) Application </h2>
                    <p class="indent">Please complete, sign and return confirmation email with checks to the ASEP box in the Meyerholz office between <b>Monday 5/14/18 - Thursday 6/7/18.</b> (Please make sure checks are dropped off no later than 11:30AM on 6/7/18, as this is the last day of school.)  Please print student’s name, grade and class name on each check and attach with <b>paper clip - no staples.  Please make sure you register with the email that you check regularly for email,</b> any updates are notified by email. You are not guaranteed to get into all the classes that you signed up for.</p>
                    <p class="indent">More information on the ASEP program can be found <a href="/ASEP.html">here</a>.</p>
                    <h4>Checks payable:   CLIPCO     Date: 8/1/2018  (Please make separate checks for each class.)</h4>
                    <h4>Check memo: Child name, Grade (2018-2019), ASEP class</h4>
                    <h4>Note:  This is not a fund raising activity for CLIPCO. <span class="error">Classes will be canceled when not enough donation is collected</span></h4>
                </div>
                <div class="col-sm-4 col-xs-12" id="stock-image" class="xs-hide">
                    <!-- scripty mcscriptface will fill this in-->
                    <script src="imageLoading.js" id="image-laoding-script"></script>
                </div>
                <script type="text/javascript">
                    function onload() {
                        loadImage(0);
                        resize_image();    
                    }

                    $(window).resize(function() {
                        resize_image();
                    });

                    function resize_image() {
                        image = document.getElementById("stock-image-image");
                        image.setAttribute("class","");
                        image.style.maxHeight = document.getElementById("main-content").clientHeight + "px";
                        image.style.maxWidth = document.getElementById("main-content").clientWidth/2 + "px"; 
                    }

                </script>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    //process form data
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        //Authorization stuff `
                        require '/home/cusdzern/php/quickstart.php';
                        require_once '/home/cusdzern/public_html/vendor/autoload.php';
                        require '/home/cusdzern/php/writeToPDF.php';

                        // Get the API client and construct the service object.
                        $client = getClient("ASEP");
                        $service = new Google_Service_Sheets($client);

                        // Prints the the entered data in a spreadsheet:
                        // https://docs.google.com/spreadsheets/d/1d12d3cevQuJcJpmdnbzSL7apKe-Gr9IK3EExFgW-zmw/edit

                        $spreadsheetId = '1d12d3cevQuJcJpmdnbzSL7apKe-Gr9IK3EExFgW-zmw';
                        $range = 'A:N';

                        $valueInputOption = "USER_ENTERED";
                        $insertDataOption = "INSERT_ROWS";

                        $spreadSheetData = array();
                        //$pdfData = array();

                        date_default_timezone_set('America/Los_Angeles');

                        array_push($spreadSheetData,date('m/d/y H:i:s'));

                        foreach ($_POST as $name => $value) {
                            if ($name == "date") {
                                $value = str_replace("-", "/", $value);
                            } elseif (gettype($value) == "array") {
                                $value = implode(",\n", $value);
                            }
                            //$pdfData[] =  array(str_replace("_", " ", $name)    , htmlspecialchars($value));
                            array_push($spreadSheetData, htmlspecialchars($value));
                        }

                        $values = [$spreadSheetData];

                        $requestBody = new Google_Service_Sheets_ValueRange([
                            'values' => $values,
                        ]);

                        $params = [
                            'valueInputOption' => $valueInputOption,
                            'insertDataOption' => $insertDataOption
                        ];

                        $requestBody->setMajorDimension("ROWS");
                        $requestBody->setRange($range);

                        $response = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody, $params);

                        /*
                    //create PDF
                    $pdf = new PDF();
                    // Column headings  
                    $header = array('Field', 'Response');
                    $pdf->SetFont('Arial','',14);
                    $pdf->AddPage();
                    $pdf->FancyTable($header,$pdfData);
                    $fileName = "/home/cusdzern/php/reimbursement_requests/" . str_replace(" ", "_", $spreadSheetData[1]) . "_" . str_replace("/", "-",$spreadSheetData[0]) . ".pdf";
                    $pdf->Output($name=$fileName, $dest='F');*/
                        echo "<h4>Your information has been recieved!</h4>";
                    }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <table id="form-table">
                            <caption class="text-center"><h4>ASEP Registration Form</h4><p>All fields are required.</p></caption>
                            <col width="30%">
                            <col width="70%">
                            <tr>
                                <td>
                                    Child Last Name:
                                </td>
                                <td>
                                    <input required type="text" name="Child_Last_Name">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Child First Name:
                                </td>
                                <td>
                                    <input required type="text" name="Child_First_Name">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Grade  (2018-2019)
                                </td>
                                <td>
                                    <input required type="text" name="Grade__(2018-2019)">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Parent/Guardian First &nbsp;&amp;&nbsp; Last Name
                                </td>
                                <td>
                                    <input required type="text" name="Parent/Guardian_First_&_Last_Name_1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Parent/Guardian First &nbsp;&amp;&nbsp; Last Name
                                </td>
                                <td>
                                    <input required type="text" name="Parent/Guardian_First_&_Last_Name_2">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:
                                </td>
                                <td>
                                    <input required type="email" name="Email">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Cell# please have number in the form of (###)-###-####&nbsp;:
                                </td>
                                <td>
                                    <input required type='tel' pattern='^(\d?[\(]?\d{3}[\)]?[\-]?\d{3}[\-]?\d{4})$' name="Cell#"> <!-- format: 1?(?###)?###-?#### --> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Emergency# please have number in the form of (###)-###-####&nbsp;:
                                </td>
                                <td>
                                    <input required type='tel' pattern='^(\d?[\(]?\d{3}[\)]?[\-]?\d{3}[\-]?\d{4})$' name="Emergency#"> <!-- format: 1?(?###)?###-?#### -->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Insurance carrier &nbsp;&amp;&nbsp; Group#:
                                </td>
                                <td>
                                    <input required type="text" name="Insurance_carrier_&_Group#">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Performing Art Child’s T-shirt size :
                                </td>
                                <td>
                                    <select name="child_shirt_size">
                                        <option value="YS">YS</option>
                                        <option value="YM">YM</option>
                                        <option value="YL">YL</option>
                                        <option value="AS">AS</option>
                                        <option value="AM">AM</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Performing Art Child’s Pant size (youth):
                                </td>
                                <td>
                                    <select name="child_pant_size">
                                        <option value="YS">YS</option>
                                        <option value="YM">YM</option>
                                        <option value="YL">YL</option>
                                        <option value="YXL">YXL</option>
                                        <option value="YXLL">YXLL</option>
                                        <option value="AM">AM</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Childcare at YMCA on ASEP class days?
                                </td>
                                <td>
                                    <input required type="radio" name="ymca" value="Yes">&nbsp;Yes&nbsp;&nbsp;&nbsp;<input required type="radio" name="ymca" value="No" checked>&nbsp;No<br>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    Select The classes that your child will be participating in (<a href="/ASEP_class_information.html">more information on classes</a>):
                                </td>
                                <td>
                                    <table id="classes-table">
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Class</th>
                                            <th>Meeting Days</th>
                                            <th>Requirements</th>
                                            <th>Suggested Donation</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Game - Go (FQ 2018) (English speaking)">
                                            </td>
                                            <td>
                                                Chinese Game - Go (FQ 2018) (English speaking)
                                            </td>
                                            <td>
                                                Monday
                                            </td>
                                            <td>
                                                3rd&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>
                                                120
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Game - Go (SQ 2018) (English Speaking)">
                                            </td>
                                            <td>
                                                Chinese Game - Go (SQ 2018) (English Speaking)
                                            </td>
                                            <td>
                                                Monday
                                            </td>
                                            <td>
                                                3rd&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>
                                                120
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Dance I (English speaking)">
                                            </td>
                                            <td>
                                                Chinese Dance I (English speaking) - 8 max
                                            </td>
                                            <td>
                                                Monday
                                            </td>
                                            <td>
                                                K&nbsp;&amp;&nbsp;1st
                                            </td>
                                            <td>
                                                280
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Dance I (English speaking)">
                                            </td>
                                            <td>
                                                Chinese Dance I (English speaking) - 8 max
                                            </td>
                                            <td>
                                                Monday
                                            </td>
                                            <td>
                                                2nd&nbsp;&amp;&nbsp;3rd, or 1 yr dance
                                            </td>
                                            <td>
                                                280
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Dance II (English speaking)">
                                            </td>
                                            <td>
                                                Chinese Dance II (English speaking) - 10 max
                                            </td>
                                            <td>
                                                Tuesday
                                            </td>
                                            <td>
                                                2 year ASEP dance
                                            </td>
                                            <td>
                                                280
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Dance III (English speaking)">
                                            </td>
                                            <td>
                                                Chinese Dance III (English speaking)- 10 max
                                            </td>
                                            <td>
                                                Tuesday
                                            </td>
                                            <td>
                                                Adv - 3year Dance
                                            </td>
                                            <td>
                                                280
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Zhongruan (Chinese Speaking)">
                                            </td>
                                            <td>
                                                Zhongruan (Chinese Speaking)
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                1st to 3rd
                                            </td>
                                            <td>
                                                300 
                                            </td>
                                        </tr>       
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Zhongruan (Chinese Speaking)">
                                            </td>
                                            <td>
                                                Zhongruan (Chinese Speaking)
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                4th&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>
                                                300
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Lion Dance I (English Speaking)">
                                            </td>
                                            <td>
                                                Lion Dance I (English Speaking)
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                1st&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>
                                                180
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Lion Dance II (English Speaking)">
                                            </td>
                                            <td>
                                                Lion Dance II (English Speaking)
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                Adv, 1yr ASEP
                                            </td>
                                            <td>
                                                180
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Percussion (English Speaking)">
                                            </td>
                                            <td>
                                                Percussion (English Speaking)
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                1st&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>
                                                180
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Flute I (English speaking) ">
                                            </td>
                                            <td>
                                                Chinese Flute I (English speaking)
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                3rd
                                            </td>
                                            <td>
                                                260 
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Flute I (English Speaking)">
                                            </td>
                                            <td>
                                                Chinese Flute I (English Speaking)
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                4th&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>
                                                260 
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Flute II (English speaking) ">
                                            </td>
                                            <td>
                                                Chinese Flute II (English speaking)
                                            </td>
                                            <td>
                                                Friday 
                                            </td>
                                            <td>
                                                1 yr ASEP Flute
                                            </td>
                                            <td>
                                                220
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Flute III (English speaking) ">
                                            </td>
                                            <td>
                                                Chinese Flute III (English speaking)
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                2 yr ASEP Flute
                                            </td>
                                            <td>
                                                220
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Erhu I (Chinese Speaking)">
                                            </td>
                                            <td>
                                                Chinese Erhu I (Chinese Speaking)<br><em>Additional deposit for instrument</em>
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                2nd&nbsp;&amp;&nbsp;3rd
                                            </td>
                                            <td>
                                                260 
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Erhu I (Chinese speaking)">
                                            </td>
                                            <td>
                                                Chinese Erhu I (Chinese speaking)<br><em>Additional deposit for instrument</em>
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                4th&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>
                                                260
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Chinese Erhu II (Chinese speaking)">
                                            </td>
                                            <td>
                                                Chinese Erhu II (Chinese speaking)<br><em>Additional deposit for instrument</em>
                                            </td>
                                            <td>
                                                Friday
                                            </td>
                                            <td>
                                                1 yr ASEP
                                            </td>
                                            <td>
                                                260
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Wushu 1">
                                            </td>
                                            <td>
                                                Wushu 1
                                            </td>
                                            <td>
                                                Tuesday
                                            </td>
                                            <td>
                                                1st&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>
                                                320
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Wushu II">
                                            </td>
                                            <td>
                                                Wushu II
                                            </td>
                                            <td>
                                                Tuesday
                                            </td>
                                            <td>
                                                1 yr Wushu
                                            </td>
                                            <td>
                                                320
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="classes[]" value="Student Volunteer">
                                            </td>
                                            <td>
                                                Student Volunteer
                                            </td>
                                            <td>
                                                Classtime
                                            </td>
                                            <td>
                                                8th&nbsp;&amp;&nbsp;up
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <button class="btn btn-default btn-lg" type="Submit">Submit</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-center">
            <a href="#top" title="To Top"><span class="glyphicon glyphicon-chevron-up"></span></a>
        </footer>
        <script src="js.js"></script>
    </body>
</html>