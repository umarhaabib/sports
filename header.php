<?php 
session_start();
ob_start();
include "db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- General Info 
  ________________________________________________ -->
    <meta charset="utf-8">
    <title>Online Pizzamaker </title>
    <meta name="description" content="A one stop shop to search for national parks in your area.">

    <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="public/css/client-styles.css">
    <link rel = "stylesheet" href= "public/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
    <nav class="navbar navbar-expand-sm" style="justify-content: center;background-color: #f68d10;">
        <a class="navbar-brand" href="#"><img src="public/images/logo.JPEG" alt="logo" style="height: 55px;">
		</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active text-dark" href="index.php">Home</a>
            </li>
            <!-- about us -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="about.php">About Us</a>
            </li>
            
            <li class="nav-item dropdown">
            </li>
            <?php 
            if(isset($_SESSION['loggedinuserid'])){?>
                
            <li class="nav-item">
                <a class="nav-link text-dark" href="viewCart.php">View Cart</a>
            </li>

        <?php } ?>
            </li>
            <li class="nav-item">

            </li>
     
            <?php if(isset($_SESSION['loggedinuseremail'])): ?>
        <li class="nav-item">
    <div style="height: 32px;margin-top: 5px;" class="btn-group ">
  <button type="button" class="btn btn-danger btn-sm">logout</button>
  <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only"></span>
  </button>
  <div class="dropdown-menu">
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="logout.php">logout</a>
  </div>
</div>
        </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="register.php">Register</a>
        </li>
        <li class="nav-item">
                <a class="nav-link text-dark" href="login.php">Login</a>
        </li>
        <?php endif; ?>
        </ul>
   
    </nav>
