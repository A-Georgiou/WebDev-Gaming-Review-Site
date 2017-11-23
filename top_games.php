<?php

// ----INCLUDE APIS------------------------------------
include ("api/includes.inc.php");

$pnews = new Squad();

/**
 * Create the HTML Markup for this Page
 *
 * @return string The Bootstrap-Based HTML Markup
 */
function createGamePage(Squad $pnews)
{

    $gameTable = renderSquadTable($pnews);

    $tcontent = <<<PAGE
<div class="container">
		<div class="row">
			<div class="panel panel-primary">
				<h2>Current Squad</h2>
				<p>List of Key First-Team Players</p>
				{$gameTable}
			</div>
		</div>
	</div>
PAGE;
				return $tcontent;
}

$tpagetitle = "News";
$tpagecontent = createGamePage($pnews);
$tpagefooter = "";
$currPage = "topGames";
$tpage = new MasterPage($tpagetitle);



$tpage->setDynamic2($tpagecontent);

if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);

    $tpage->renderPage($currPage);

    ?>
