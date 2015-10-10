<?php
/**
 * Displays
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CMACC</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="/vendor/twbs/bootstrap/docs/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/vendor/twbs/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php

ini_set("allow_url_include", true);

$lib_path = LIB_PATH;
$document = `perl $lib_path/openedit-parser.pl $path/$dir`;

include("$lib_path/view-tabs-bootstrap.php");

?>





<div class="container">

    <div class="starter-template">
        <h1><?php echo $dir; ?></h1>

        <div id="tab-edit">

            <?php
            echo "<form action=$_SERVER[PHP_SELF] method='post'>
        <textarea id='textedit' " . TEXT_EDIT_WINDOW_SIZE . " name='newcontent' style='" . TEXT_EDIT_AREA_STYLE . "'>";

            echo $document;

            echo "\nWAS=" . date("Y/m/d") . " : " . time() . "\n\n";

            echo file_get_contents($path . $dir, FILE_USE_INCLUDE_PATH);
            ?>

            </textarea><br>
            <input class="btn btn-info" type="submit" name="submit" value="Save">
            <input type="hidden" name="file" value="' . $dir . '">
            <input type="hidden" name="action" value="source">
            </form>


        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/vendor/components/jquery/jquery.min.js"></script>
<script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/vendor/twbs/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
