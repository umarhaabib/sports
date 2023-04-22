<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php 
session_start();
include('db.php');

if(isset($_POST['save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone_number = $_POST['phone_number'];
    $total = $_POST['total'];
    $user_id = $_SESSION['loggedinuserid'];
    $query = "INSERT INTO `orders`(`first_name`, `last_name`, `address`, `city`, `phone_number`, `total`, `user_id`) VALUES ('$first_name','$last_name','$address','$city','$phone_number','$total','$user_id')";
    $result = mysqli_query($db, $query);
    if($result){
        $deleteQuery = "DELETE FROM `add_to_cart` WHERE `user_id` = '$user_id'";
        $deleteResult = mysqli_query($db, $deleteQuery);
        if($deleteResult){
            echo "<script>alert('Order Successfully Placed')
            window.location.href='index.php';
            </script>";        }
    
    }
    else{
        echo "<script>alert('Order Not Placed')</script>";
    }
}
?>
<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small></small></div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <?php 
                                $total = 0;
                                $query = "SELECT * FROM add_to_cart WHERE user_id = '".$_SESSION['loggedinuserid']."'";
                                $result = mysqli_query($db, $query);
                                if(mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $total = $total + $row['product_price'];
                                    ?>
                               
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><?php echo $row['product_name']?></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>$</span><?php echo $row['product_price']?></h6>
                                </div>
                                <?php
                                }
                                ?>
                           <!-- total -->
                           <div class="col-sm-12 col-xs-12">
                           <hr>
                           <hr>
                           </div>
                           <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">Total</div>
                                </div>
                            <div class="col-sm-3 col-xs-3 text-right">
                                <input type="hidden" name="total" value="<?php echo $total; ?>">
                                <h6><span>$</span><?php echo $total; ?></h6>
                            </div>
                                <?php
                                }else{
                                    ?>
                                    <div class="col-sm-3 col-xs-3">
                                        <p>No Product Found</p>
                                    </div>
                                    <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Details</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" value="" required/>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value=""required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="" required/></div>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="submit" class="btn btn-primary btn-submit-fix" value="Place Order" name="save">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
    </div>