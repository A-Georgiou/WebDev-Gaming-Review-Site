<?php

// ----INCLUDE APIS------------------------------------
include ("api/includes.inc.php");


// ----PAGE GENERATION LOGIC---------------------------
$tpagecontent = createIndexPage();

/**
 * Create the HTML Markup for this Page
 *
 * @return string The Bootstrap-Based HTML Markup
 */
function createIndexPage()
{
    $tnewscontent = "";

    $tcontent = <<<PAGE
<div class="container">
     <div class="row">
        <div class="col-md-3">
            <a href="GamingDetails.php?id=1">
            <img src="img/halo3cover.jpg" width="500" class="image"></img>
            </a>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
            <a href="GamingDetails.php?id=3">
            <img src="img/portal_2_cover.jpg" width="500" class="image"></img>
        </div>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col-md-3">
            <a href="GamingDetails.php?id=8">
            <img src="img/destinycover.jpg" width="500" class="image"></img>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
            <a href="GamingDetails.php?id=11">
            <img src="img/firewatch.jpeg" width="500" class="image"></img>
        </div>
    </div>
</div>

PAGE;
				return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------


// ----BUILD OUR HTML PAGE----------------------------
/*
$tscripts = renderScripts();
$thead = renderHead("Session 10: Home");
$tbody = renderBody($tpagecontent, $tscripts);
$thtmlpage = renderHTMLDoc($thead, $tbody);
echo $thtmlpage;

*/

$tpagetitle = "Home Page";
$tpagecontent = createIndexPage();
$tpagefooter = "";
$currPage = "home";
$tpage = new MasterPage($tpagetitle);



$tpage->setDynamic2($tpagecontent);

if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);

$tpage->renderPage($currPage);

?>