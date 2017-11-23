<?php
session_start();
unset($_SESSION["auth_username"]);

$content = <<<CONTENT
    <meta http-equiv="refresh" content="3;url=index.php" />
    <h1>Redirecting in 3...</h1>
CONTENT;
echo $content;
?>