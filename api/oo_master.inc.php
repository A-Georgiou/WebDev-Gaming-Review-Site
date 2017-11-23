<?php
session_start();

//Include our HTML Page Class
require_once("oo_page.inc.php");
require_once("includes.inc.php");

class MasterPage
{
    //-------FIELD MEMBERS----------------------------------------
    private $_htmlpage;     //Holds our Custom Instance of an HTML Page
    private $_dynamic_2;    //Field Representing our Dynamic Content #2
    private $_dynamic_3;    //Field Representing our Dynamic Content #3

    //-------CONSTRUCTORS-----------------------------------------
    function __construct($ptitle)
    {
        $this->_htmlpage = new HTMLPage($ptitle);
        $this->setPageDefaults();
        $this->setDynamicDefaults();
    }




    //-------GETTER/SETTER FUNCTIONS------------------------------
    public function getDynamic2() { return $this->_dynamic_2; }
    public function getDynamic3() { return $this->_dynamic_3; }
    public function setDynamic2($phtml) { $this->_dynamic_2 = $phtml; }
    public function setDynamic3($phtml) { $this->_dynamic_3 = $phtml; }
    public function getPage(): HTMLPage { return $this->_htmlpage; }

    //-------PUBLIC FUNCTIONS-------------------------------------

    public function createPage()
    {
       //Create our Dynamic Injected Master Page
       $this->setMasterContent();
       //Return the HTML Page..
       return $this->_htmlpage->createPage();
    }

    public function renderPage(&$currPage)
    {
       //Create our Dynamic Injected Master Page
       $this->setMasterContent($currPage);
       //Echo the page immediately.
       $this->_htmlpage->renderPage();
    }

    public function addCSSFile($pcssfile)
    {
        $this->_htmlpage->addCSSFile($pcssfile);
    }

    public function addScriptFile($pjsfile)
    {
        $this->_htmlpage->addScriptFile($pjsfile);
    }

    //-------PRIVATE FUNCTIONS-----------------------------------
    private function setPageDefaults()
    {

        $this->_htmlpage->setMediaDirectory("css", "js", "fonts", "img", "data");
        $this->addCSSFile("bootstrap.css");
        $this->addCSSFile("layout1.css");
        $this->addScriptFile("site.css");
        $this->addScriptFile("jquery-2.2.4.js");
        $this->addScriptFile("bootstrap.js");
        $this->addScriptFile("holder.js");


    }

    private function setDynamicDefaults()
    {
        $tcurryear = date("Y");
        $this->_dynamic_2 = "";
        $this->_dynamic_3 = <<<FOOTER
    <p>&copy; Andrew Georgiou - LJMU STUDENT {$tcurryear}</p>
FOOTER;
    }



    private function setMasterContent(&$currPage)
    {
        $activeHome = "";
        $activeSearch="";
        $activeNews="";
        $activeTopGames="";
        $activePlatforms="";
        $activeLogin="";
        $logInfo = "";

        if(isset($_SESSION["auth_username"]))
        {
            $username = $_SESSION["auth_username"];
            $loggedContent = <<<INFORMATION
            <a>Username: $username</a>
            <li role="presentation"><a href="logout.php">Logout</a></li>
INFORMATION;
        }
        else
        {
            $loggedContent = <<<INFORMATION
        <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
INFORMATION;
        }


        if($currPage == "news")
        {
           $activeNews="active";
        }
        else if($currPage == "home")
        {
            $activeHome="active";
        }
        else if($currPage == "search")
        {
            $activeSearch="active";
        }
        else if($currPage == "topGames")
        {
            $activeTopGames="active";
        }
        else if($currPage == "platforms")
        {
            $activePlatforms="active";
        }
        else if($currPage == "login")
        {
            $activeLogin="active";
        }
        $tmasterpage = <<<MASTER
<div class="container">
	<div class="header clearfix">

		<nav class="navbar navbar-default">
		  <div>
		      <div class="navbar-header" style="margin-top: 10px; margin-left: 20px;">
		      <h3>Andy Reviews</h3>
		      </div>

			<ul class="nav navbar-nav pull-right">
				<li role="presentation" class="$activeHome"><a href="index.php">Home</a></li>
				<li role="presentation" class="$activeSearch"><a href="search.php">Search</a></li>
				<li role="presentation" class="$activeNews"><a href="news.php">News</a></li>
				<li role="presentation" class="$activeTopGames"><a href="top_games.php">Top Games</a></li>
				<li class="dropdown">
                    <a class="dropdown-toggle $activePlatforms" data-toggle="dropdown" href="#">Platforms<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a>
                              <form method="post" action="search.php" class="inline">
                                    <input type="hidden" name="search" value="Nintendo Switch">
                                    <button type="submit" name="search" value="Nintendo Switch" class="link-button">
                                    NINTENDO SWITCH
                                    </button>
                                    </input>
                              </form>
                          </a></li>

                          <li><a href="#">
                          <form method="post" action="search.php" class="inline">
                                    <input type="hidden" name="search" value="Xbox 360">
                                    <button type="submit" class="link-button">
                                    XBOX 360
                                    </button>
                                    </input>
                              </form>
                          </a></li>

                          <li><a href="#">
                          <form method="post" action="search.php" class="inline">
                                    <input type="hidden" name="search" value="PS3">
                                    <button type="submit"class="link-button">
                                    PS3
                                    </button>
                                    </input>
                              </form>
                          </a></li>

                          <li><a href="#">
                          <form method="post" action="search.php" class="inline">
                                    <input type="hidden" name="search" value="Xbox One">
                                    <button type="submit" class="link-button">
                                    XBOX ONE
                                    </button>
                                    </input>
                              </form>
                          </a></li>

                          <li><a href="#">
                          <form method="post" action="search.php" class="inline">
                                    <input type="hidden" name="search" value="PS4">
                                    <button type="submit" class="link-button">
                                    PS4
                                    </button>
                                    </input>
                              </form>
                          </a></li>
                        </ul>
                </li>
				<li role="presentation" class="$activeLogin">$loggedContent</li>
			</ul>
		  </div>
		</nav>

	</div>

	<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
    <!-- Menu -->

    <!-- Items -->
    <div class="carousel-inner">

               <div class="item active">
            <img src="img/RESIZEDstanleyparable2.jpg" alt="Slide 1" />
        </div>

        <div class="item">
            <img src="img/RESIZEDlastofus.png" alt="Slide 1" />
        </div>

        <div class="item">
            <img src="img/RESIZEDportal2.jpg" alt="Slide 3" />
        </div>

        <div class="item">
            <img src="img/RESIZEDfirewatch.jpg" alt="Slide 4" />
        </div>

         <div class="item">
            <img src="img/RESIZEDdestiny.jpg" alt="Slide 5" />
        </div>

    </div>
</div>


	<div class="row details">
		{$this->_dynamic_2}
    </div>
    <footer class="footer">
		{$this->_dynamic_3}
	</footer>
</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form method="post" action="login.php">
					<input type="text" id="username" name="username" placeholder="Username">
					<input type="password" id="password" name="password" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>

				 <div class="login-help">
					<a href="register.php">Register</a> - <a href="#">Forgot Password</a>
			     </div>
			</div>
		</div>
</div>
MASTER;
        $this->_htmlpage->setBodyContent($tmasterpage);
    }
}

?>