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
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <style>
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
        }
    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="vendor/twbs/bootstrap/docs/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="vendor/twbs/bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

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
$document .= "\nWAS=" . date("Y/m/d") . " : " . time() . "\n\n";
$document .= file_get_contents($path . $dir, FILE_USE_INCLUDE_PATH);


include("$lib_path/view-tabs-bootstrap.php");

?>

<div class="container">

    <div class="starter-template">
        <h1><?php echo $dir; ?></h1>

        <div id="tab-edit">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <textarea id="textedit" <?php echo TEXT_EDIT_WINDOW_SIZE; ?> name="newcontent"
                          style="<?php echo TEXT_EDIT_AREA_STYLE; ?>">

<?php echo $document; ?>
                </textarea><br>
                <input class="btn btn-info" type="submit" name="submit" value="Save">
                <input type="hidden" name="file" value="<?php echo $dir; ?>">
                <input type="hidden" name="action" value="source">
            </form>


        </div>
    </div>

    <div class="row">

        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>CMACC FORM</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Ti">Title</label>

                    <div class="col-md-9">
                        <input id="Ti" name="Ti" placeholder="Enter: Title of Document" class="form-control input-md"
                               required="" type="text">
                        <span class="help-block">help</span>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Conf.Exclude.Xref">Conf.Exclude.Xref</label>

                    <div class="col-md-9">
                        <input id="Conf.Exclude.Xref" name="Conf.Exclude.Xref" placeholder="placeholder"
                               class="form-control input-md" required="" type="text">
                        <span class="help-block">Help text</span>
                    </div>
                </div>

                <!-- Multiple Radios -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="radios">Obligations</label>

                    <div class="col-md-9">
                        <div class="radio">
                            <label for="radios-0">
                                <input name="radios" id="radios-0" value="1" checked="checked" type="radio">
                                {The_Receiving_Party}'s obligations with respect to all
                                {Confidential_Information_of_the_Disclosing_Party} will terminate only pursuant to
                                {Conf.Exclude.Xref}.
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radios-1">
                                <input name="radios" id="radios-1" value="2" type="radio">
                                {The_Receiving_Party}'s obligations with respect to all
                                {Confidential_Information_of_the_Disclosing_Party} will terminate on the earlier of
                                {Confidentiality.End.YMD} or when all such information has become subject to an
                                exclusion from confidentiality pursuant to {Conf.Exclude.Xref}.
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radios-2">
                                <input name="radios" id="radios-2" value="3" type="radio">
                                {The_Receiving_Party}'s obligations with respect to each element of
                                {Confidential_Information_of_the_Disclosing_Party} will terminate on the earlier of
                                {DurationOfConfidentiality} after the time such element was communicated by
                                {the_Disclosing_Party} to {the_Receiving_Party} or when all such information has become
                                subject to an exclusion from confidentiality pursuant to {Conf.Exclude.Xref}.
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <div class="col-md-12">
                        <button id="button1id" name="button1id" class="btn btn-primary">Save</button>
                        <a href="#" id="button2id" name="button2id" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="vendor/components/jquery/jquery.min.js"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="vendor/twbs/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
