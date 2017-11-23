<?php

function generateLinkToDetailsPage($id)
{
        $link = "GamingDetails.php";
        $link .= "?id=";
        $link .= $id;

        return $link;
}

require_once("data.inc.php");

function renderPlayerRow(PlayerData $pp)
{
    $link = generateLinkToDetailsPage($pp->ranking);
    $trow = <<<PROW
    <tr>
        <td>{$pp->ranking}</td>
        <td>{$pp->ageRating}</td>
        <td>{$pp->name}</td>
        <td>{$pp->platform}</td>
        <td>{$pp->rating}</td>
        <td><a href="$link" class="btn btn-primary btn-sm" role="button">Details</a></td>
</tr>
PROW;
    return $trow;
}

function renderSquadTable(Squad $psquad)
{
    $trowdata = "";
    foreach($psquad->playerdata as $tp)
    {
        $trowdata .= renderPlayerRow($tp);
    }

    $ttable = <<<TABLE
 <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Age Rating</th>
                        <th>Name</th>
                        <th>Platform</th>
                        <th>Rating</th>
                   </tr>
                </thead>
                <tbody>
                {$trowdata}
                </tbody>
</table>
TABLE;
return $ttable;

}


function SearchSquadTable(Squad $psquad, $search)
{
    $trowdata = "";
    foreach($psquad->playerdata as $tp)
    {
        if(strpos(strtolower($tp->name.$tp->platform), strtolower($search))!==false){
            $trowdata .= renderPlayerRow($tp);
        }
    }

    $ttable = <<<TABLE
 <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Age Rating</th>
                        <th>Name</th>
                        <th>Platform</th>
                        <th>Rating</th>
                   </tr>
                </thead>
                <tbody>
                {$trowdata}
                </tbody>
</table>
TABLE;
                return $ttable;

}

function renderTag($pelement,$pcontent)
{
    $telement = <<<HTML
   <$pelement>$pcontent</$pelement>
HTML;
    return $telement;
}

?>