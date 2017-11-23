<?php

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkRequiredResponsesNotEmpty($formData)
{
    if (empty($formData["search"])) {
        return false;
    }else{
        return true;
    }
}

// ----INCLUDE APIS------------------------------------
include ("api/includes.inc.php");

$pnews = new Squad();

// ----PAGE GENERATION LOGIC---------------------------
$tpagecontent = createSearchPage();

/**
 * Create the HTML Markup for this Page
 *
 * @return string The Bootstrap-Based HTML Markup
 */
function createSearchPage()
{
    $search = $_POST["search"] ?? $formData["search"] ?? "";

    $PostTo = htmlspecialchars($_SERVER['PHP_SELF']);

    $tcontent = <<<FORMPAGE

<div class="container">
    <form class="form-horizontal" method="POST" action="$PostTo">

        <div class="form-group">
            <label class="control-label col-xs-3" for="lastName">Search:</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search" value="$search">
                    <input type="submit" class="btn btn-primary" value="Search" style="float:right;">
                </div>
        </div>


    </form>
</div>

FORMPAGE;
    return $tcontent;
    }

function search(Squad $pnews)
{

        $squadTable = SearchSquadTable($pnews, $_POST["search"]);

        $tpagecontent = <<<PAGE
<div class="container">
		<div class="row">
			<div class="panel panel-primary">
				<h2>Current Squad</h2>
				<p>List of Key First-Team Players</p>
				{$squadTable}
			</div>
		</div>
	</div>
PAGE;
    				return $tpagecontent;
}



// ----BUSINESS LOGIC----------------------------------
$formData = Array();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $formData["search"]          = test_input($_POST["search"]);
    if(checkRequiredResponsesNotEmpty($formData) == true){
        $tpagecontent .= search($pnews);
    }
    else {
        $tpagecontent = createSearchPage($formData);
    }
}
else
{
    $tpagecontent = createSearchPage($formData);
}


// ----BUILD OUR HTML PAGE----------------------------
/*
 $tscripts = renderScripts();
 $thead = renderHead("Session 10: Home");
 $tbody = renderBody($tpagecontent, $tscripts);
 $thtmlpage = renderHTMLDoc($thead, $tbody);
 echo $thtmlpage;

 */

$tpagetitle = "Home Page";
$tpagefooter = "";
$currPage = "search";
$tpage = new MasterPage($tpagetitle);



$tpage->setDynamic2($tpagecontent);

if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);

    $tpage->renderPage($currPage);

    ?>