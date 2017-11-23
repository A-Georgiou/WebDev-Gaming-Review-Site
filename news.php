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

	<div class="row marketing">
		<article class="col-lg-6">
			<h2>Gaming News:</h2>
			<h4>
				<span class="label label-success">This Week</span> Call of Duty WWII
			</h4>
			<p class="text-primary">
				Its 2017, another year another Call of Duty game, this week we have been graciously gifted with the Official Call of Duty WWII Reveal Trailer.
				The trailer sadly features no actual gameplay footage and whether or not the "Actual In-Game Footage" is footage we will see in game or not is debatable
				we are looking forward to giving the game a full review upon release.</strong>
			</p>
			<p>
				So far this is the only Call of Duty WWII trailer unveiled so far. </br> What can we tell from this? we get an insight
				into the campaign will roll out. It looks like Sledgehammer Games will be delivering a gritty and realistic game which so
				far the tone has been very Band of Brother mixed with Saving Private Ryan so thats very promising. The first mission of the campaign
				will be a retelling of D-Day through a US centered account of one specific group of men. It takes place 1944-1945 so expect to see
				some incredible fall of nazi Germany in the end game.
			</p>


            <iframe width="500" height="290"
            src="//www.youtube.com/embed/D4Q_XYVescc">
            </iframe>
		</article>

        <div class="col-lg-6"></div>
        <article class="col-lg-6">
            <h2>Gaming News:</h2>
			<h4>
				<span class="label label-warning">Last Week</span> Call of Duty WWII
			</h4>
			<p class="text-primary">
				Its 2017, another year another Call of Duty game, this week we have been graciously gifted with the Official Call of Duty WWII Reveal Trailer.
				The trailer sadly features no actual gameplay footage and whether or not the "Actual In-Game Footage" is footage we will see in game or not is debatable
				we are looking forward to giving the game a full review upon release.</strong>
			</p>
			<p>
				So far this is the only Call of Duty WWII trailer unveiled so far. </br> What can we tell from this? we get an insight
				into the campaign will roll out. It looks like Sledgehammer Games will be delivering a gritty and realistic game which so
				far the tone has been very Band of Brother mixed with Saving Private Ryan so thats very promising. The first mission of the campaign
				will be a retelling of D-Day through a US centered account of one specific group of men. It takes place 1944-1945 so expect to see
				some incredible fall of nazi Germany in the end game.
			</p>


            <iframe width="500" height="290"
            src="//www.youtube.com/embed/D4Q_XYVescc">
            </iframe>
		</article>

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

$tpagetitle = "News";
$tpagecontent = createIndexPage();
$tpagefooter = "";
$currPage = "news";
$tpage = new MasterPage($tpagetitle);



$tpage->setDynamic2($tpagecontent);

if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);

    $tpage->renderPage($currPage);

    ?>