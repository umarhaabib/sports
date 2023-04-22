<?php
session_start();
include 'db.php';
if(!isset($_SESSION['loggedinuserid'])){
        echo "You are not logged in please login to continue";
        // header("location: login.php"); 
      exit();
}
if (isset($_POST['id'])) {
    $query = "SELECT * FROM products WHERE id = '" . $_POST['id'] . "' limit 1";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['id'];
            $product_name = $row['name'];
            $product_price = $row['price'];

        }
    }
//    check if product id already available
    $query = "SELECT * FROM add_to_cart WHERE product_id = '" . $_POST['id'] . "'  and user_id = '" . $_SESSION['loggedinuserid'] . "'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Product already in cart";
        exit();
    } else {
        $query = "INSERT INTO add_to_cart (product_id,product_name,product_price,user_id)
        VALUES ('{$product_id}','{$product_name}','{$product_price}','{$_SESSION['loggedinuserid']}')";
        if (mysqli_query($db, $query)) {
            echo "Product added to cart successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
            echo "Error: " . $query . "<br>" . mysqli_error($db);
        }
    }

}
