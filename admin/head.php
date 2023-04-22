<?php
session_start();
ob_start();
if(!isset($_SESSION['loggedinuseremail'])){ //if login in session is not set
    header("Location: ../index.php");
    exit();
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Pizzamakering - Admin</title>
        <link href="../public/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous" />
    </head>