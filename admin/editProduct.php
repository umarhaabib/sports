<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';
include '../db.php';
if ($_SESSION['loggedinuserrole'] == "User") {
    header('Location: ../index.php');
    die();
}

if (isset($_POST['update'])) {
    if (!empty($_FILES["fileToUpload"]["name"])) {
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../public/product_images/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
        $updateQuery = "UPDATE products SET `name` = '" . $_POST['inputProductName'] . "',
        `description` = '" . $_POST['inputDescription'] . "',`price` = '" . $_POST['inputPrice'] . "'
        , `image` = '$file_name' WHERE `id` = '" . $_GET['id'] . "'";
        if (mysqli_query($db, $updateQuery)) {

            header("Location: allProducts.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }
    } else {
        $updateQuery = "UPDATE products SET `name` = '" . $_POST['inputProductName'] . "', `description` = '" . $_POST['inputDescription'] . "',`price` = '" . $_POST['inputPrice'] . "' WHERE `id` = '" . $_GET['id'] . "'";
        if (mysqli_query($db, $updateQuery)) {

            header("Location: allProducts.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
}
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-xl px-12 mt-12">
                <div style="justify-content: center;margin-top: 20px" class="row">
                    <div class="col-xl-10">
                        <div class="card mb-4">
                            <div class="card-header">Edit Product Details</div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    <?php

                                    $sql = "SELECT * from products  where id='" . $_GET['id'] . "' ";
                                    $query = mysqli_query($db, $sql);

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <input required type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">
                                                    <label class="small mb-1" for="inputParkName">Product name</label>
                                                    <input required class="form-control" name="inputProductName" type="text" placeholder="Enter Product name" value="<?php echo $row1['name']; ?>" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPhone">Price</label>
                                                    <input required class="form-control" name="inputPrice" type="text" placeholder="Enter Price" value="<?php echo $row1['price']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">

                                                <div class="col-md-12">
                                                    <label class="small mb-1" for="inputDescription">Product description</label>
                                                    <textarea required class="form-control" name="inputDescription" type="text" placeholder="Enter Product description"><?php echo $row1['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-12">
                                                    <label class="small mb-1" for="Image">Image</label>
                                                    <input class="form-control" name="fileToUpload" type="file" />
                                                </div>
                                            </div>
                                       </div>

                            <!-- Save changes button-->
                            <input class="btn btn-primary" name="update" type="submit" value="Save changes">
                    <?php
                             }
                        }
                    ?>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</main>
<?php
include '../admin/footer.php';
?>
</div>
</div>