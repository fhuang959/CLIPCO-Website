<!DOCTYPE html>
<head>
    <title>CLIPCO - Developer Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://cusdclipco.org/css.css">
    <script src="http://cusdclipco.org/.sorttable.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        /* some css can go here */
    </style>
</head>
<body id="top" class="bg-grey" onload="loadImage(0)">
<div id="navbar-placeholder"></div>
<script>
    $(function () {
        $("#navbar-placeholder").load("http://www.cusdclipco.org/subpage_navbar.html");
    });
</script>

<div class="jumbotron text-center bg-white">
    <h1>Developer</h1>
    <p>An Index Of the Developer Folder</p>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h4>Here are some of the backend and in-progress features of <a href="http://www.cusdclipco.org">www.cusdclipco.org</a></h4>
            <table class="sortable">
              <thead>
                <tr>
                  <th>Filename</th>
                  <th>Type</th>
                  <th>Size <small>(bytes)</small></th>
                  <th>Date Modified</th>
                </tr>
              </thead>
              <tbody>
              <?php
                // Opens directory
                $myDirectory=opendir(".");

                // Gets each entry
                while($entryName=readdir($myDirectory)) {
                  $dirArray[]=$entryName;
                }

                // Finds extensions of files
                function findexts($filename) {
                  $filename=strtolower($filename);
                  $exts = explode(".",$filename);
                  return $exts[count($exts)-1];
                }

                // Closes directory
                closedir($myDirectory);

                // Counts elements in array
                $indexCount=count($dirArray);

                // Sorts files
                sort($dirArray);

                // Loops through the array of files
                for($index=0; $index < $indexCount; $index++) {

                  // Gets File Names
                  $name=$dirArray[$index];
                  $namehref=$dirArray[$index];

                  // Gets Extensions
                  $extn=findexts($dirArray[$index]);

                  // Gets file size
                  $size=number_format(filesize($dirArray[$index]));

                  // Gets Date Modified Data
                  date_default_timezone_set("America/New_York");
                  $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
                  $timekey=date("YmdHis", filemtime($dirArray[$index]));
		              $class = "table-row";
                  // Print 'em
                  print("
                  <tr class='$class'>
                    <td><a href='./$namehref'>$name</a></td>
                    <td><a href='./$namehref'>$extn</a></td>
                    <td><a href='./$namehref'>$size</a></td>
                    <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
                  </tr>");
                }
              ?>
              </tbody>
            </table>
        </div>
        <div class="col-sm-4 col-xs-12" id="stock-image">
            <!-- scripty mcscriptface will fill this in-->
             <script src="http://cusdclipco.org/imageLoading.js" id="image-laoding-script"></script>
        </div>
    </div>
</div>
<footer class="container-fluid text-center">
    <a href="#top" title="To Top"><span class="glyphicon glyphicon-chevron-up"></span></a>
</footer>
<script src="http://cusdclipco.org/js.js"></script>
</body>
</html>