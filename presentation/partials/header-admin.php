<?php
session_start();
//unset($_SESSION['cart']);
//unset($_SESSION['loggedin']);
if(!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin'] = 0;
}
if ($_SESSION['loggedin'] == 0){
    header("Location: " . $GLOBALS['URL'] . "presentation/admin/index.php");
    exit;
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
    <link rel="stylesheet" href="<?php echo $GLOBALS['URL']; ?>includes/css/sb-admin.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['URL']; ?>includes/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS['URL']; ?>includes/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
