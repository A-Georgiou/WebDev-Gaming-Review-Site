<?php

// ----INCLUDE APIS------------------------------------
include ("api/includes.inc.php");

$pnews = new Squad();





/**
 * Create the HTML Markup for this Page
 *
 * @return string The Bootstrap-Based HTML Markup
 */
function createPlayerPage(Squad $pnews)
{

    $squadTable = renderSquadTable($pnews);

    $tcontent = <<<PAGE
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
				return $tcontent;
}

$tpagetitle = "News";
$tpagecontent = createPlayerPage($pnews);
$tpagefooter = "";
$currPage = "news";
$tpage = new MasterPage($tpagetitle);



$tpage->setDynamic2($tpagecontent);

if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);

    $tpage->renderPage($currPage);

    ?>
