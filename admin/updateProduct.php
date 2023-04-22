<?php
include '../db.php';
if ($_POST['condition'] == 'yes') {
    $random = rand(10000, 1000000);
    $img = base64_encode(file_get_contents( $_POST['pngBase64'] ));
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $savefile = @file_put_contents("../public/product_images/thumbnail__".$random.".png", $data);
    $cd = "thumbnail__".$random.".png";
       $updateQuery = "UPDATE products SET `name` = '" . $_POST['inputProductName'] . "', `price` = '" . $_POST['inputPrice'] . "', `description` = '" . $_POST['inputDescription'] . "',`sku` = '" . $_POST['inputSKU'] . "', `image` = '$cd', `quantity` = '" . $_POST['inputQauntity'] . "',brand_id ='" . $_POST['inputBrand'] . "' WHERE `id` = '" . $_POST['inputId'] . "'";
       if (mysqli_query($db, $updateQuery)) {
        echo "Product Updated Successfully!";
    }
  
} else {

   $sql = "UPDATE products SET `name` = '" . $_POST['inputProductName'] . "', `price` = '" . $_POST['inputPrice'] . "', `description` = '" . $_POST['inputDescription'] . "',`sku` = '" . $_POST['inputSKU'] . "', `quantity` = '" . $_POST['inputQauntity'] . "',brand_id ='" . $_POST['inputBrand'] . "' WHERE `id` = '" . $_POST['inputId'] . "'";
   if(mysqli_query($db,$sql))
   {
       echo " Updated Successfully!";
   }
}



?>