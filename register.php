<?php

function checkRequiredResponsesNotEmpty($formData)
{
    if (empty($formData["email"]) || empty($formData["firstName"]) || empty($formData["lastName"])) {
        return false;
    }else{
        return true;
    }
}

function isValidName($name)
{
    // pass variable through test input before this function
    if (! preg_match("/^[a-zA-Z ]*$/", $name)) {
        return false;
    }
    return true;
}

function isValidEmail($email)
{
    // pass variable through test input before this function
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function isValidURL($url)
{
    // pass variable through test input before this function
    if (! preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
        return false;
    }
    return true;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function registered($formData)
{
    echo "didnt get here";
    $dataToString = "\n" . $formData["email"] . " " . $formData["password"] . " " . $formData["firstName"] . " " . $formData["lastName"];
    file_put_contents("data/admin.txt", $dataToString, FILE_APPEND);
}


// ----INCLUDE APIS------------------------------------
include ("api/includes.inc.php");


// ----PAGE GENERATION LOGIC---------------------------
$tpagecontent = createformPage();

/**
 * Create the HTML Markup for this Page
 *
 * @return string The Bootstrap-Based HTML Markup
 */
function createformPage()
{

    $emailError = "";
    $emailErrorStyle="";
    $emailIcon = "";
    $emailEmpty = false;
    $emailIcon = "";
    $emailColor ="";

    $fNameError = "";
    $fNameErrorStyle = "";
    $fNameIcon = "";
    $fNameEmpty = false;
    $fNameColor = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // check email is valid


        if (empty($formData["email"])) {
            $emailError = "Email Required";
            $emailErrorStyle = "has-warning has-feedback";
            $emailIcon = "glyphicon-warning-sign";
            $emailEmpty = true;
            $emailColor = "color:orange;";
        } else if (! isValidEmail($formData["email"])) {
            $emailError = "Invalid Email";
            $emailErrorStyle = "has-error has-feedback";
            $emailIcon = "glyphicon-remove";
            $emailEmpty = true;
            $emailColor = "color:red;";
        }

        // check first name is valid
        if(empty($formData["firstName"])){
            $fNameError = "First Name Required";
            $fNameErrorStyle = "has-warning has-feedback";
            $fNameIcon = "glyphicon-warning-sign";
            $fNameEmpty = true;
            $fNameColor = "color:orange;";
        }else if (! isValidName($formData["firstName"])) {
            $fNameError = "Invalid First Name";
            $fNameErrorStyle = "has-error has-feedback";
            $fNameIcon = "glyphicon-remove";
            $fNameEmpty = true;
            $fNameColor = "color:#e74c3c;";
        }

    }

    $emailValue = $_POST["inputEmail"] ?? $formData["email"] ?? "";
    $firstNameValue = $_POST["firstName"] ?? $formData["firstName"] ?? "";
    $lastNameValue = $_POST["lastName"] ?? $formData["lastName"] ?? "";
    $phoneNumberValue = $_POST["phoneNumber"] ?? $formData["phoneNumber"] ?? "";
    $postalAddressValue = $_POST["postalAddress"] ?? $formData["postalAddress"] ?? "";
    $zipCodeValue = $_POST["ZipCode"] ?? $formData["ZipCode"] ?? "";

    $PostTo = htmlspecialchars($_SERVER['PHP_SELF']);


    $tcontent = <<<FORMPAGE

<div class="container">
    <form class="form-horizontal" method="POST" action="$PostTo">

FORMPAGE;
    $temailWithError = <<<FORMPAGE

    <div class="form-group $emailErrorStyle">
        <label class="control-label col-xs-3" for="inputEmail">Email:</label>
            <div class="col-xs-9" >
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="$emailValue">
                    <span class="glyphicon $emailIcon form-control-feedback"></span>

                <p id="email_help" class="helpblock" style="$emailColor">$emailError</p>
            </div>

FORMPAGE;
    $temail = <<<FORMPAGE

        <div class="form-group">
            <label class="control-label col-xs-3" for="inputEmail">Email:</label>
                <div class="col-xs-9" >
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="$emailValue">
                </div>

FORMPAGE;
    $tcontent .= $emailEmpty ? $temailWithError : $temail;
    $tcontent .= <<<FORMPAGE

        </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="inputPassword">Password:</label>
                    <div class="col-xs-9">
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                    </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" for="confirmPassword">Confirm Password:</label>
                    <div class="col-xs-9">
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                    </div>
            </div>

FORMPAGE;
    $tfNameWithError = <<<FORMPAGE

         <div class="form-group $fNameErrorStyle">
            <label class="control-label col-xs-3" for="firstName">First Name:</label>
                <div class="col-xs-9">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="$firstNameValue">
                         <span class="glyphicon $fNameIcon form-control-feedback"></span>
                 <p id="fname_help" class="helpblock" style="$fNameColor">$fNameError</p>
                </div>

FORMPAGE;
    $tfName = <<<FORMPAGE

                    <div class="form-group">
                        <label class="control-label col-xs-3" for="firstName">First Name:</label>
                            <div class="col-xs-9" >
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="$firstNameValue">
                            </div>

FORMPAGE;
    $tcontent .= $fNameEmpty ? $tfNameWithError : $tfName;
    $tcontent .= <<<FORMPAGE

                    </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="lastName">Last Name:</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="$lastNameValue">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="phoneNumber">Phone:</label>
                <div class="col-xs-9">
                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" value="$phoneNumberValue">
                </div>
        </div>

        <div class="form-group">
           <label class="control-label col-xs-3">Date of Birth:</label>
               <div class="col-xs-3">
                  <select class="form-control">
                     <option>Date</option>
                  </select>
               </div>

            <div class="col-xs-3">
                <select class="form-control">
                    <option>Month</option>
                </select>
            </div>

            <div class="col-xs-3">
                <select class="form-control">
                     <option>Year</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                  <label class="checkbox-inline">
                        <input type="checkbox" value="agree"> I agree to the <a href="#">Terms and Conditions</a>.
                  </label>
            </div>
        </div>

       <div class="form-group">
             <div class="col-xs-offset-3 col-xs-9">
                 <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>


    </form>
</div>

FORMPAGE;
    return $tcontent;
}

function createFormResponsePage()
{
    $tcontent = <<<FORMRESPONSE
     <div class="container">
        <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"><ahref="index.php">Home</a></li>
                        <li role="presentation" ><a href="club.php">Featured Club</a></li>
                        <li role="presentation"><a href="players.php">Top Players</a></li>
                        <li role="presentation" class="active"><a href="form.php">Form</a></li>
                    </ul>
                </nav>
            <h3 class="text-muted">Football News</h3>
        </div>

        <section class="panel panel-primary" id="Form Response">
            <div class="jumbotron">
                <h1>Thank You $firstName</h1>
                <p class="lead">Your form has been submitted. Thank you for keeping up to date with Footy around the World!</p>
                <p class="lead">You will receive weekly updates to $email</p>
            </div>
        </section>
    </div>
FORMRESPONSE;
    return $tcontent;
}

// ----BUSINESS LOGIC----------------------------------
$formData = Array();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $formData["email"]          = test_input($_POST["inputEmail"]);
    $formData["firstName"]      = test_input($_POST["firstName"]);
    $formData["lastName"]       = test_input($_POST["lastName"]);
    $formData["phoneNumber"]    = test_input($_POST["phoneNumber"]);
    $formData["password"]       = test_input($_POST["inputPassword"]);
    if(checkRequiredResponsesNotEmpty($formData) == true && isValidName($formData["firstName"]) && isValidName($formData["lastName"])){
        echo "HERE I AM";
        registered($formData);
    }
    else {
        echo "NOOOOOOOOO";
        $tpagecontent = createFormPage($formData);
    }
}
else
{
    echo "WHYYYY";
    $tpagecontent = createFormPage($formData);
}

// ----BUILD OUR HTML PAGE----------------------------



$tpagetitle = "Title";
$tpagecontent = createformPage();
$tpagefooter = "";
$currPage = "home";
$tpage = new MasterPage($tpagetitle);



$tpage->setDynamic2($tpagecontent);

if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);

    $tpage->renderPage($currPage);



?>