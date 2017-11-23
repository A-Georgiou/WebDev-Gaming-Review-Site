<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$accountinfo = array();
$fh = fopen('data/admin.txt','r');
while ($line = fgets($fh)) {
    $userpass = explode(" ", $line);
    $accountinfo += array($userpass[0]=>$userpass[1]);
}
fclose($fh);




function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if(!$_POST["username"] or !$_POST["password"]) {
    echo "Please enter your username and password.";
    $content = <<<CONTENT
    <meta http-equiv="refresh" content="3;url=index.php" />
CONTENT;
    echo $content;
}


if(test_input($password) == test_input($accountinfo[$username]))
{
    echo "Login successful!";
    $_SESSION["auth_username"] = $_POST["username"];
    $content = <<<CONTENT
    <meta http-equiv="refresh" content="3;url=index.php" />
CONTENT;
    echo $content;
}
else
{
    echo "Login incorrect, please try again.";
    $content = <<<CONTENT
    <meta http-equiv="refresh" content="3;url=index.php" />
CONTENT;
    echo $content;
}

?>