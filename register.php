<?php

include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
                            <div class="col-lg-7">
                                <!-- Basic registration form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- Registration form-->
                                        <form>
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (first name)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (last name)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)            -->
                                          
                                            <!-- Form Row    -->
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (confirm password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputConfirmPassword">Phone Number</label>
                                                        <input class="form-control" id="inputPhoneNumber" type="text" placeholder="Enter Phone number" />
                                                    </div>
                                                </div>
                                       
                                            </div>
                                            <!-- Form Group (create account submit)-->
                                            <a style="float: right;" class="btn btn-primary btn-block" href="#" onclick="registerUser();">Create Account</a>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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
<script>
 function registerUser() {
var inputFirstName = document.getElementById("inputFirstName").value;
var inputLastName = document.getElementById("inputLastName").value;
var inputEmailAddress = document.getElementById("inputEmailAddress").value;
var inputPassword = document.getElementById('inputPassword').value;
var inputPhoneNumber = document.getElementById('inputPhoneNumber').value;
if (inputFirstName == "" || inputFirstName == "0"|| inputEmailAddress == "" ||inputPassword == "" || inputPhoneNumber == "") {
    alert("Please fill all the fields");
    return;
}
// firstname or lastname should not be a number
if (isNaN(inputFirstName) == false || isNaN(inputLastName) == false) {
    alert("Please enter a valid name");
    return;
}

$.ajax({
   type: 'POST',
   url: 'registerUser.php',
   data: {
    inputFirstName: inputFirstName,
    inputLastName: inputLastName,
      inputEmailAddress: inputEmailAddress,
      inputPassword: inputPassword,
      inputPhoneNumber: inputPhoneNumber
     
   },
   success: function(res) {
       if(res=="Email Already exists, try another one"){
        alert(res);
        location.reload();

       }else if(res=="Successfully Registered"){
           alert(res);
          window.location.replace('login.php');

       }else{
      alert("Something went wrong please try again")

       }
   }
});

}

</script>