<?php
include('header.php');
?>
<?php
//sign in
if (isset($_POST['loginAttempt'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($db, $_POST['inputEmailAddress']);
        $password = mysqli_real_escape_string($db, $_POST['inputPassword']);
        
        $sql = "SELECT * FROM users WHERE  email = '$email' AND password = '$password'";
        
        $result = mysqli_query($db, $sql);
       
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            
                $userrole =  $row['role'];
                $_SESSION['loggedinusername']= $row['first_name']." ".$row['last_name'];
                $_SESSION['loggedinuseremail'] = $email;
                $_SESSION['loggedinuserid'] = $row['id'];
                $_SESSION['loggedinuserrole'] = $userrole;
               if($userrole=='Admin'){
                   header("location: admin/dashboard.php");
                }elseif($userrole=='User'|| $userrole=='Customer' || $userrole=='' || $userrole==null){
                    header("location: index.php");
                }
                //unset($_SESSION['error_accour']);
            }
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

<!-- FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Karla&family=Nova+Mono&family=Rock+Salt&family=Yatra+One&family=Yuji+Boku&family=Yuji+Syuku&display=swap" rel="stylesheet">

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- EXTERNAL CSS -->
<link rel = "stylesheet" href= "public/css/styles.css">
<style>
    body {
        background-image: url("public/images/hero_image2.jpg");
    }
</style>
</head>
<body>
<div class="d-flex flex-column h-100">
<main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form method="post">
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" name="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" name="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div style="float: right;" class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input  class="btn btn-primary" value="Login" type="submit" name="loginAttempt"/>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>