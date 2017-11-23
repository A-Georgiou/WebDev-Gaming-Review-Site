<?php
// ----INCLUDE APIS------------------------------------
// Include our Website API
include ("api/includes.inc.php");

function test_input($data)
{
    $data = str_replace(' ', '', $data);
    $data = str_replace(':', '', $data);
    $data = trim($data);
    $data = strtolower($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function returnEditorial(PlayerData $pp)
{
    $editorial = file("data/editorial.txt");
    return $editorial[($pp->ranking) - 1];
}

function renderReviewRow($line, $ranking)
{
    $trow="";
    $reviewID=$ranking;
    $userpass = explode("#", $line);
    if($reviewID==$userpass[2]){
    $trow = <<<PROW
    <tr>
        <td>$userpass[0]</td>
        <td>$userpass[1]</td>
        <td>$userpass[3]</td>
        </tr>
PROW;
    }
    return $trow;
}

function renderReviewTable($ranking)
{
    $reviewID = $ranking;
    $trowdata = "";
    $accountinfo = array();
    $fh = fopen("data/reviews.txt",'r');
    while($line = fgets($fh))
    {
        $trowdata .= renderReviewRow($line, $reviewID);
    }
    fclose($fh);
    $ttable = <<<TABLE
    <hr>
 <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Star Rating:</th>
                        <th>Review:</th>
                        <th>Reviewer:</th>
                   </tr>
                </thead>
                <tbody>
                {$trowdata}
                </tbody>
</table>
TABLE;
                return $ttable;

}

// ----PAGE GENERATION LOGIC---------------------------
function createPlayerDetailsPage(PlayerData $pp)
{
    $gameTable = renderReviewTable($pp->ranking);
    $review = returnEditorial($pp);
    $name = test_input($pp->name);
    $tcontent = <<<DETAILSPAGE

<div class="container">
     <h1>Game Details:</h1>
           <div class="row">
             <div class="col-xs-6">
                 <h2>{$pp->name}:</h2>
                     <div class="well">
                         <h3>Game Ranking: {$pp->ranking}</h3>
                         <h3>Age Rating: {$pp->ageRating}</h3>
                         <h3>Platform: {$pp->platform}</h3>
                         <h3>Genre: {$pp->genre}</h3>
                         <h3>Year of Release: {$pp->release}</h3>
                         <h3>External Reviews:</h3> <h4><a href="{$pp->review1}">Review 1</a><br><a href="{$pp->review2}">Review 2</a></h4>
                    </div>
            </div>
            <div class="col-xs-6">
            <h2>Editorial Review:</h2>
                     <div class="well">
                         <h4>$review</h4>
                         <h4>Rating: {$pp->rating}</h4>
                    </div>
            </div>
        </div>
        <div>
           <img class="img-responsive" src="img/$name.jpg" alt="Chania">
        </div>

    <form method="post" action="review.php">
            <div class="row">
                <h4>Rating: </h4>
                <div class="rate col-xm-2">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
            </div>
               <div class="row">
                  <div class="review col-xm-2">
                      <h4>Review:</h4>
                      <textarea id="review" name="review" rows="10" cols="70"></textarea>
               <input type="hidden" name="prev_page" value="$pp->ranking" />
                  </div>
               <input type="submit" class="btn btn-primary" value="Submit" />
          </div>
    </form>

    {$gameTable}


</div>

DETAILSPAGE;
    return $tcontent;
}
// ----BUSINESS LOGIC----------------------------------
$getData = Array();
$tpagecontent = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = test_input($_GET["id"] ?? - 1);
    $tsquad = new Squad();
    foreach ($tsquad->playerdata as $tp) {
        if ($tp->ranking == $id) {
            $tpagecontent = createPlayerDetailsPage($tp);
        }
    }
}
// ----BUILD OUR HTML PAGE----------------------------
$tpagetitle = "News";
$tpagefooter = "";
$currPage = "news";
$tpage = new MasterPage($tpagetitle);

$tpage->setDynamic2($tpagecontent);

if (! empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);

$tpage->renderPage($currPage);

?>
