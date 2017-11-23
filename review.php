<?php

session_start();

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


if(!$_POST["rate"] or !$_POST["review"]) {
    echo "Please enter your rating and review.";
    $content = <<<CONTENT
    <meta http-equiv="refresh" content="2;url=GamingDetails.php?id=$prev_page" />
CONTENT;
    echo $content;
}else{
    $rating = $_POST['rate'];
    $review = $_POST['review'];
    $prev_page = $_POST['prev_page'];
    $user = $_SESSION["auth_username"];
    $fullReview = "\n" . $rating . "#" . $review . "#" . $prev_page . "#" . $user;
    $review = test_input($review);
    file_put_contents("data/reviews.txt", $fullReview, FILE_APPEND);
    $content = <<<CONTENT
    <h4>redirecting...</h4>
    <meta http-equiv="refresh" content="1;url=GamingDetails.php?id=$prev_page" />
CONTENT;
    echo $content;

}


?>