<!DOCTYPE html>
<head>
    <title>CLIPCO - Reimbursement Form</title>
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
        .category, .main-title{
            color: rgb(0,0,0);
            font-size: 1.25em;
            font-weight: bold;
        }

        .required{
            color: red;
        }
    </style>
</head>
<body id="top" class="bg-grey" onload="loadImage(0);">
<div id="navbar-placeholder"></div>
<script>
    $(function () {
        $("#navbar-placeholder").load("subpage_navbar.html");
    });
</script>

<div class="jumbotron text-center bg-white">
    <h1>Reimbursement Form</h1>
    <p>Request a Reimbursement from CLIPCO</p>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h2>CLIPCO Reimbursement Form</h2>
            <span class="required">Required *</span>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" target="_self" method="POST" id="mG61Hd" onsubmit="submitFunction();">
                <table>
                    <tbody id="table-body">
                        <tr>
                            <td>
                                <span class="main-title">Full Name</span><span class="required">*</span><br>
                                <span class="sub-title">Check will be payable to this name</span>
                            </td>
                            <td>
                                <input type="text" jsname="YPqjbf" autocomplete="off" tabindex="0" aria-label="Full Name" aria-describedby="i.desc.1142683551 i.err.1142683551" name="Full Name" value="" required dir="auto" data-initial-dir="auto" data-initial-value=""/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="main-title">Address</span><span class="required">*</span><br>
                                <span class="sub-title">Check will be mailed to this address</span>
                            </td>
                            <td>
                                <textarea jsname="YPqjbf" data-rows="1" tabindex="0" aria-label="Address" jscontroller="gZjhIf" jsaction="input:Lg5SV;ti6hGc:XMgOHc;rcuQ6b:WYd;" required name="Address" dir="auto" data-initial-dir="auto" data-initial-value=""></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="main-title">Email address</span><span class="required">*</span><br>
                                <span class="sub-title">All communication and a .pdf copy of this request will be sent to this email address</span>
                            </td>
                            <td>
                                <input type="email" jsname="YPqjbf" autocomplete="off" tabindex="0" aria-label="Email address" aria-describedby="i.desc.1819177329 i.err.1819177329" name="Email address" value="" required dir="auto" data-initial-dir="auto" data-initial-value=""/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="main-title">Date</span><span class="required">*</span>
                            </td>
                            <td>
                                <input type="date" name="date" id="date-input" jsname="YPqjbf">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="main-title">School</span><span class="required">*</span>
                            </td>
                            <td>
                                <input type="radio" name="School" jsname="L9xHkb" value="Meyerholz Elementary School">Meyerholz Elementary School<br>
                                <input type="radio" name="School" jsname="L9xHkb" value="Miller Middle School">Miller Middle School<br>
                                <input type="radio" name="School" jsname="L9xHkb" value="Combined School (ASEP, Graduation, CLIPCO Administration Expenses)">Combined School (ASEP, Graduation, CLIPCO Administration Expenses)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="main-title">Description of Purchase</span><span class="required">*</span><br>
                                <span class="sub-title">Please list general description of expenses and purpose</span>
                            </td>
                            <td>
                                <textarea jsname="YPqjbf" data-rows="1" tabindex="0" aria-label="Description of Purchase" jscontroller="gZjhIf" jsaction="input:Lg5SV;ti6hGc:XMgOHc;rcuQ6b:WYd;" required name="Description" dir="auto" data-initial-dir="auto" data-initial-value=""></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="main-title">Amount ($)</span><span class="required">*</span><br>
                                <span class="sub-title">If you have multiple receipts, please add up your total amount and list here</span>
                            </td>
                            <td>
                                <input type="number" step="0.01" jsname="YPqjbf" autocomplete="off" tabindex="0" aria-label="Amount ($)" aria-describedby="i.desc.1162410093 i.err.1162410093" name="Amount" value="" required dir="auto" data-initial-dir="auto" data-initial-value=""/>
                            </td>
                        </tr>
                        <tr id="category-row">
                            <td>
                                <span class="main-title">Category</span><span class="required">*</span><br>
                                <span class="sub-title">See Category and Subcategory List <a class="slide-link" href="#categories">below</a>. If you have multiple expenses in different categories, you must submit a new form for each category.</span>
                            </td>
                            <td>
                                 <select name="Category" jsname="L9xHkb" id="category-select">
                                    <option value="" selected hidden disabled>Select Category</option>
                                    <option value="CLIPCO Administration Costs">CLIPCO Administration Costs</option>
                                    <option value="Instructional Materials">Instructional Materials</option>
                                    <option value="ASEP">ASEP</option>
                                    <option value="Graduation Expenses">Graduation Expenses</option>
                                    <option value="Chinese New Year Parade">Chinese New Year Parade</option>
                                    <option value="CLIPCO T-shirt Expenses">CLIPCO T-shirt Expenses</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Assessment">Assessment</option>
                                    <option value="Professional Development - Training and Conferences">Professional Development - Training and Conferences</option>
                                </select>
                            </td>
                        </tr>

                        <!-- subcategory row will appear here -->
                        <!-- I am hiding this for now to let the google form handle it -->
                        <tr id="requesterName-row">
                            <td>
                                <span class="main-title">Requester's Name and Signature (sign after printing)</span><span class="required">*</span><br>
                                <span class="sub-title">Please print requester's name on this form and sign after printing</span>
                            </td>
                            <td>
                                <input type="text" jsname="YPqjbf" autocomplete="off" tabindex="0" aria-label="Requester&amp;#39;s Name and Signature (sign after printing)" aria-describedby="i.desc.1551471201 i.err.1551471201" name="Requester's Name" value="" required="" dir="auto" data-initial-dir="auto" data-initial-value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="main-title">Approver's Name and Signature (sign after printing)</span><br>
                                <span class="sub-title">Chair approval is required for CLIPCO Administration, ASEP, CLIPArt Materials, Graduation, and Chinese New Year Parade expenses.</span>
                            </td>
                            <td>
                                <input type="text" jsname="YPqjbf" autocomplete="off" tabindex="0" aria-label="Approver&amp;#39;s Name and Signature (sign after printing)" aria-describedby="i.desc.1147439033 i.err.1147439033" name="Approver's Name" value="" dir="auto" data-initial-dir="auto" data-initial-value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="main-title">Requester's Role/Title</span><span class="required">*</span><br>
                            </td>
                            <td>
                                <input type="text" jsname="YPqjbf" autocomplete="off" tabindex="0" aria-label="Requester&amp;#39;s Role/Title" aria-describedby="i.desc.1875476130 i.err.1875476130" name="Requester's Role/Title" value="" required="" dir="auto" data-initial-dir="auto" data-initial-value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><button class="btn btn-default btn-lg" type="Submit">Submit</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <br>
            <br>
            <div>
                <span id="categories" style="line-height: 3em;">&nbsp;</span>
                <h2>Donation Categories</h2>
                <hr>
                <span class="category">CLIPCO Administration Costs</span><br>
                <span class="subcategory">Community Events</span><br>
                <span class="subcategory">DGC (Direct Give Campaign) Expenses</span><br>
                <span class="subcategory">Outreach</span><br>
                <span class="subcategory">President Administration Exp.</span><br>
                <span class="subcategory">Postage/Mailing service</span><br>
                <br>
                <span class="category">Instructional Materials</span><br>
                <span class="subcategory">CLIP Art Material (K-5)</span><br>
                <span class="subcategory">CLIP Art Material (6-8)</span><br>
                <span class="subcategory">Grade K - Teacher Reimbursable</span><br>
                <span class="subcategory">Grade 1 - Teacher Reimbursable</span><br>
                <span class="subcategory">Grade 2 - Teacher Reimbursable</span><br>
                <span class="subcategory">Grade 3 - Teacher Reimbursable</span><br>
                <span class="subcategory">Grade 4 - Teacher Reimbursable</span><br>
                <span class="subcategory">Grade 5 - Teacher Reimbursable</span><br>
                <span class="subcategory">Grade 6 - Teacher Reimbursable</span><br>
                <span class="subcategory">Grade 7 - Teacher Reimbursable</span><br>
                <span class="subcategory">Grade 8 - Teacher Reimbursable</span><br>
                <span class="subcategory">Elementary Library Books (K-5)</span><br>
                <span class="subcategory">Books&nbsp;&amp;&nbsp;Supplemental Materials (6-8)</span><br>
                <br>
                <span class="subcategory">Professional Development</span><br>
                <span class="category">Professional Development</span><br>
                <br>
                <span class="category">Training and Conferences</span><br>
                <span class="subcategory">Training and Conferences</span><br>
                <br>
                <span class="category">Technology</span><br>
                <span class="subcategory">Technology</span><br>
                <br>
                <span class="category">Assessment</span><br>
                <span class="subcategory">Assessment</span><br>
                <br>
                <span class="category">ASEP</span><br>
                <span class="subcategory">ASEP - unallocated expense</span><br>
                <span class="subcategory">ASEP - Chinese Calligraphy Class</span><br>
                <span class="subcategory">ASEP - Chinese Dance Class</span><br>
                <span class="subcategory">ASEP - Chinese Lion Dance Class</span><br>
                <span class="subcategory">ASEP - Chinese Percussion Class</span><br>
                <span class="subcategory">ASEP - Chinese Wushu Class</span><br>
                <span class="subcategory">ASEP - Go Monday</span><br>
                <span class="subcategory">ASEP - Flute Class</span><br>
                <span class="subcategory">ASEP - Baking</span><br>
                <span class="subcategory">ASEP - Erhu</span><br>
                <br>
                <span class="category">Graduation</span><br>
                <span class="subcategory">Graduation Expenses</span><br>
                <br>
                <span class="category">CLIPCO T-shirt Expenses</span><br>
                <span class="subcategory">CLIPCO T-shirt Expenses</span><br>
            </div>
        </div>            
        <?php
            //process form data
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
                //Authorization stuff 
                require '/home/cusdzern/php/quickstart.php';
                require_once '/home/cusdzern/public_html/vendor/autoload.php';
                require '/home/cusdzern/php/writeToPDF.php';

                // Get the API client and construct the service object.
                $client = getClient('Reimbursement');
                $service = new Google_Service_Sheets($client);

                // Prints the the entered data in a spreadsheet:
                // https://docs.google.com/spreadsheets/d/1YT0j1dVIXR5KEY5e-aT3vhQIN4P5sFz9_yV3F2CPmNo/edit

                $spreadsheetId = '1YT0j1dVIXR5KEY5e-aT3vhQIN4P5sFz9_yV3F2CPmNo';
                $range = 'A:M';

                $valueInputOption = "USER_ENTERED";
                $insertDataOption = "INSERT_ROWS";

                $spreadSheetData = array();
                $pdfData = array();

                date_default_timezone_set('America/Los_Angeles');

                array_push($spreadSheetData,date('m/d/y H:i:s'));

                foreach ($_POST as $name => $value) {
                    if ($name == "date") {
                        $value = str_replace("-", "/", $value);
                    }
                    $pdfData[] =  array(str_replace("_", " ", $name)    , htmlspecialchars($value));
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
                //$requestBody->setValues([["hello"]]);

                $response = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody, $params);


                //create PDF
                $pdf = new PDF();
                // Column headings  
                $header = array('Field', 'Response');
                $pdf->SetFont('Arial','',14);
                $pdf->AddPage();
                $pdf->FancyTable($header,$pdfData);
                $fileName = "/home/cusdzern/php/reimbursement_requests/" . str_replace(" ", "_", $spreadSheetData[1]) . "_" . str_replace("/", "-",$spreadSheetData[0]) . ".pdf";
                $pdf->Output($name=$fileName, $dest='F');
            }
        ?>

        <div class="col-sm-4 col-xs-12" id="stock-image">
            <!-- scripty mcscriptface will fill this in-->
             <script src="imageLoading.js" id="image-loading-script"></script>
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    <a href="#top" title="To Top"><span class="glyphicon glyphicon-chevron-up"></span></a>
</footer>
<script src="js.js"></script>
<script id="base-js" src="googleform.js"></script>
<script type="text/javascript">
    clipcoAdminCosts = ["Community Events","DGC (Direct Give Campaign) Expenses","Outreach","President Administration Exp.","Postage/Mailing service"];
    instrMat = ["CLIP Art Material (K-5)","CLIP Art Material (6-8)","Grade K - Teacher Reimbursable","Grade 1 - Teacher Reimbursable","Grade 2 - Teacher Reimbursable","Grade 3 - Teacher Reimbursable","Grade 4 - Teacher Reimbursable","Grade 5 - Teacher Reimbursable","Grade 6 - Teacher Reimbursable","Grade 7 - Teacher Reimbursable","Grade 8 - Teacher Reimbursable","Elementary Library Books (K-5)","Books & Supplemental Materials (6-8)"];
    asep = ["ASEP - unallocated expense","ASEP - Chinese Calligraphy Class","ASEP - Chinese Dance Class","ASEP - Chinese Lion Dance Class","ASEP - Chinese Percussion Class","ASEP - Chinese Wushu Class","ASEP - Go Monday","ASEP - Flute Class","ASEP - Baking","ASEP - Erhu"];

    var subcategories = [];
    subcategories["CLIPCO Administration Costs"] = clipcoAdminCosts;
    subcategories["Instructional Materials"] = instrMat;
    subcategories["ASEP"] = asep;

    if ( $('[type="date"]').prop("type") != 'date') {
        console.log("date input not supported");
        document.getElementById("date-input").setAttribute("type","text");
        document.getElementById("date-input").setAttribute("class","date_input");
    }

    $('#category-select').change(function() {
        var category = $('#category-select').val();
        var row = null;
        if (!!document.getElementById("subcategory-row")){ //if subcategory-row exists
            //remove the old subcategory row
            document.getElementById("subcategory-row").parentNode.removeChild(document.getElementById("subcategory-row"));
        }   
        
        if(!!subcategories[category]){ //if the category is in the list of categories with sub-categories
            //create the new subcategory row
            row = document.createElement("TR");
            //set attributes
            row.setAttribute("id","subcategory-row");

            //create title data
            var title = document.createElement("TD");
            //create the title
            var title_text = document.createElement("SPAN");
            //set attributes
            title_text.setAttribute("class","main-title");
            //set inner text
            title_text.appendChild(document.createTextNode("Subcategory"));

            //create the required *
            var required_star = document.createElement("SPAN");
            //set attributes
            required_star.setAttribute("class","required");
            //set inner text
            required_star.appendChild(document.createTextNode("*"));

            //add contents to title data
            title.appendChild(title_text);
            title.appendChild(required_star);

            //create input data
            var input = document.createElement("TD");

            //create the select element
            var select = document.createElement("SELECT");
            //set attributes
            select.setAttribute("name","Subcategory");
            select.setAttribute("jsname","L9xHkb");
            select.setAttribute("id","subcategory-input");

            //add default select option
            var default_option = document.createElement("OPTION");
            //set attributes
            default_option.setAttribute("value","");
            default_option.setAttribute("selected","");
            default_option.setAttribute("disabled","");
            default_option.setAttribute("hidden","");
            //set inner text
            default_option.appendChild(document.createTextNode("Select Subcategory"));

            //append to select
            select.appendChild(default_option);

            //add the options
            for (var i = 0; i < subcategories[category].length; i++) {
                var subcat = subcategories[category][i];

                //create the option node
                var option = document.createElement("OPTION");
                //set attributes
                option.setAttribute("value",subcat);
                //set text
                option.appendChild(document.createTextNode(subcat));

                //append to select
                select.appendChild(option);
            }

            //add the select node to the input data node
            input.appendChild(select);

            //add table data to table row
            row.appendChild(title);
            row.appendChild(input);

            //add row to table below category row
            document.getElementById("table-body").insertBefore(row,document.getElementById("requesterName-row"));

        }   
    });

    function submitFunction () {
        if (!!!document.getElementById('subcategory-input')) { //if the subcategory input node does not exist
            var subcategoryInput = document.createElement("INPUT");
            subcategoryInput.setAttribute("name","Subcategory");
            subcategoryInput.setAttribute("value","N/A");
            subcategoryInput.setAttribute("type","hidden");
            document.getElementById("category-row").appendChild(subcategoryInput);
        }
    }

</script>
</body>
</html>