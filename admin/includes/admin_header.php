<?php
include "admin_db.php";?>
<?php
include "functions.php";?>
<?php session_start();?>
<?php
 ob_start();
?>
<?php
if(isset($_SESSION['user_role']))
{
if ($_SESSION['user_role'] !== 'Adminstrator')
{
    header("Location: ../index.php");
}else{
    header("Location: ./index.php");
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ny7irx0ws16vuc3pr8n85a4t7e588mx3r5urb6gybbsvp64m"></script>
  <script src="js/script.js"></script>
 
</head>
