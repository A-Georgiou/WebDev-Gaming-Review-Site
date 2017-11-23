<?php

/////////////////////
// Class to represent
// a News Item
/////////////////////
class NewsItem
{
    //-------CLASS FIELDS------------------
    public $heading;
    public $summary;
    public $link;
    public $linktext;




    //-------CONSTRUCTORS------------------
    public function __construct($pheading = "Default Heading",$psummary = "Default Summary",
                                $plink="#",$plinktext = "More..")
    {
        $this->heading  = $pheading;
        $this->summary  = $psummary;
        $this->link     = $plink;
        $this->linktext = $plinktext;

    }
    //-------METHODS-----------------------
    public function getHTML()
    {
        $tnewsitem = <<<NI
		    <section class="list-group-item">
				<h4 class="list-group-item-heading">{$this->heading}</h4>
				<p class="list-group-item-text">{$this->summary}</p>
				<a class="btn btn-xs btn-default" href="{$this->link}">{$this->linktext}</a>
			</section>
NI;
		return $tnewsitem;
    }
}


class PlayerData
{
    public $ranking;
    public $ageRating;
    public $name;
    public $rating;
    public $platform;
    public $release;
    public $genre;
    public $review1;
    public $review2;

    public function __construct($psno,$ppos,$pfn,$pln,$pnat = "Spanish", $pyr, $pgnr, $pr1, $pr2)
    {
        $this->ranking = $psno;
        $this->ageRating = $ppos;
        $this->name = $pfn;
        $this->rating = $pln;
        $this->platform = $pnat;
        $this->release = $pyr;
        $this->genre = $pgnr;
        $this->review1 = $pr1;
        $this->review2 = $pr2;
    }


}

?>