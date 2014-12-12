<?php
    session_start();
    if(!isset($_SESSION['login_user']))
    {
        header('Location: index.php');
}
?>
<!doctype html>
<html>
<head>
    <title>[ Soaicl Network ]</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" type="text/css" />
</head>
