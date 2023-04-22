<?php
include('header.php')
?>
<!-- view cart page -->
<div class="container">
    <div class="row">
        <div class="col-md-12  mt-3 ">
            <h1 class="text-center mt-3">Your Purchased Items</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $query = "SELECT * FROM add_to_cart where user_id = '" . $_SESSION['loggedinuserid'] . "'";
                    $result = mysqli_query($db, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['product_price']; ?></td>
                                <?php $total = $total + $row['product_price']; ?>
                            </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
            <hr>
            <!-- total -->
            <div class="row">
                <div class="col-md-6">
                    <h3 class="">Total Price: </h3>
                </div>
                <div class="col-md-6">
                    <h3 class="text-right"><?php echo $total; ?></h3>
                </div>
            </div>
            <!-- checkout or contineu -->
            <div class="row">
                <div class="col-md-12" style="">
                    <a href="index.php" class="btn btn-primary btn-lg btn-block">Continue Shopping</a>
                    <a href="checkout.php" class="btn btn-success btn-lg btn-block">Checkout</a>
                </div>
            </div>
        <?php } else {
        ?>
            <tr>
                <td colspan="2" class="text-center">Your cart is empty</td>
            </tr>
        <?php
                    }
        ?>
        </div>
    </div>