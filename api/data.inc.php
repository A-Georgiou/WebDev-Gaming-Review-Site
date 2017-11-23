<?php

//Include the Class Include
require_once("includes.inc.php");



class Squad
{
    public $playerdata = array();
    function __construct(){
        $this->playerdata[] = new PlayerData(1,"15+","Halo 3","95", "Xbox 360 / Xbox One", "2007", "First-person shooter", "https://www.gamespot.com/reviews/halo-3-review/1900-6179646/", "http://uk.ign.com/games/halo-3/xbox-360-734817");
        $this->playerdata[] = new PlayerData(2,"16+","Red Dead Redemption","92","Xbox 360 / Xbox One", "2010", "Action-Adventure", "http://uk.ign.com/articles/2010/05/17/red-dead-redemption-review", "https://www.gamespot.com/reviews/red-dead-redemption-review/1900-6262899/");
        $this->playerdata[] = new PlayerData(3,"12+","Portal 2","90","Xbox 360 / PS3", "2011", "Puzzle-platform", "http://uk.ign.com/articles/2011/04/19/portal-2-review", "http://www.pcgamer.com/portal-2-review/");
        $this->playerdata[] = new PlayerData(4,"12","The Legend of Zelda: Breath of the Wild","96","Nintendo Switch", "2017", "Action-adventure", "http://www.trustedreviews.com/the-legend-of-zelda-breath-of-the-wild-review", "http://uk.ign.com/articles/2017/03/02/the-legend-of-zelda-breath-of-the-wild-review");
        $this->playerdata[] = new PlayerData(5,"15+","The Elder Scrolls V: Skyrim","85","Xbox 360 / PS3 / Xbox One / PS4", "2011", "Action role-playing", "http://uk.ign.com/articles/2016/11/01/the-elder-scrolls-v-skyrim-special-edition-review", "https://www.gamespot.com/reviews/the-elder-scrolls-v-skyrim-review/1900-6344618/");
        $this->playerdata[] = new PlayerData(6,"12+","Overwatch","85", "Xbox One / PS4", "2016", "First-person shooter", "http://uk.ign.com/articles/2016/05/28/overwatch-review", "https://www.theguardian.com/technology/2016/may/27/overwatch-review-blizzard");
        $this->playerdata[] = new PlayerData(7,"16+","Fable II","82","Xbox 360", "2008", "Action role-playing", "https://www.gamespot.com/reviews/fable-ii-review/1900-6199669/", "http://www.eurogamer.net/articles/fable-ii-review");
        $this->playerdata[] = new PlayerData(8,"16+","Destiny", "79","Xbox 360 / PS3 / Xbox One / PS4", "2014", "Action role-playing", "http://uk.ign.com/articles/2014/09/03/destiny-review", "https://www.gamespot.com/reviews/destiny-review/1900-6415863/");
        $this->playerdata[] = new PlayerData(9,"16+","Borderlands 2","76","Xbox 360 / PS3 / Xbox One / PS4", "2012", "First-person shooter, action role-playing", "http://uk.ign.com/articles/2012/09/14/borderlands-2-review", "https://www.gamespot.com/reviews/borderlands-2-review/1900-6396650/");
        $this->playerdata[] = new PlayerData(10,"16+","Titanfall","73","Xbox 360 / Xbox One", "2014", "First-person shooter", "http://uk.ign.com/articles/2014/03/10/titanfall-review-2", "https://www.gamespot.com/reviews/titanfall-review/1900-6415690/");
        $this->playerdata[] = new PlayerData(11,"16+","Firewatch: Campo Santo","70","Xbox One / PS4", "2016", "Adventure", "http://uk.ign.com/articles/2016/02/08/firewatch-review", "https://www.theguardian.com/technology/2016/feb/08/firewatch-review-first-person-simulation-adventure-game");
    }
}

class LatestNews
{
    public $newsitems = array();
    function __construct()
    {
        $this->newsitems[] = new NewsItem();
        $this->newsitems[] = new NewsItem();
        $this->newsitems[] = new NewsItem();
        $this->newsitems[] = new NewsItem();
    }
}


?>