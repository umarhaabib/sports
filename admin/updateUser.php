<?php
include '../db.php';
if(isset ($_POST['inputFirstName']) ){
    $query = "UPDATE `users` SET `first_name` = '".$_POST['inputFirstName']."',`last_name` = '".$_POST['inputLastName']."',`email` = '".$_POST['inputEmailAddress']."',`password` = '".$_POST['inputPassword']."',`phone` = '".$_POST['inputPhoneNumber']."',role='".$_POST['inputRole']."' WHERE `id` = ".$_POST['inputId']."";
       if (mysqli_query($db, $query)) {
        echo "Record updated successfully";
    }
} else {
    echo "Error updating record: " . mysqli_error($db);
}
?>