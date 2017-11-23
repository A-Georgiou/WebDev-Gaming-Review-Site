<?php

/**
 * Build up the Head Element for our Site.
 * @param string $pttitle The Page Title
 * @return string The HTML Head Element
 */
function renderHead($ptitle)
{
    $thead = <<<HEAD
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$ptitle}</title>
    <!-- Include Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/layout1.css" rel="stylesheet">
    </head>
HEAD;
    return $thead;
}

/**
 * Build up the Script Elements for our Site
 * @return string a collection of Script Tags.
 */
function renderScripts()
{
    $tscripts = <<<SCRIPTS
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.2.4.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.js"></script>
	<!-- Include Holder Generator JS -->
	<script src="js/holder.js"></script>
SCRIPTS;
    return $tscripts;
}

/**
 * Build up the HTML Body Element from
 * the given page content and scripts.
 * @param string $ppagecontent Content to go inside Body
 * @param string $pscripts Script HTML ELements
 * @return string
 */
function renderBody($ppagecontent,$pscripts)
{
    $tbody = <<<BODY
<body>
    <!--PHP GENERATED PAGE CONTENT -->
    {$ppagecontent}

    <!-- GENERATED SCRIPTS -->
    {$pscripts}
</body>
BODY;
    return $tbody;
}

/**
 * Build up the HTML Document given the head
 * and body elements.
 * @param string $phead - The Head Element
 * @param string $pbody - The Body Element
 * @return string The complete HTML page
 */
function renderHTMLDoc($phead,$pbody)
{
    $thtml = <<<HTML
<!DOCTYPE html>
<html lang="en">
    $phead

    $pbody
</html>
HTML;
    return $thtml;
}

?>