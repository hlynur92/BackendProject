<?php
session_start();
//unset($_SESSION['cart']);
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $GLOBALS['URL']; ?>includes/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['URL']; ?>includes/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Welcome to DuckWorld</title>

    <script src="https://www.google.com/recaptcha/api.js?render=6Lc9MqIUAAAAAATjUzEGIrqiLkeckUc9AWPwiZzn"></script>
</head>
