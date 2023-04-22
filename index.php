<?php
include('header.php')
?>

<body>
    <div class="hero_image">
        <div class="hero_text">
        </div>
    </div>
    <div style="width: 85%;margin-left: 8%;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Products</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- show product card -->
                                        <?php
                                            $sql = "SELECT * FROM products";
                                            $result = mysqli_query($db, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <img style="height: 300px;" class="card-img-top" src="public/product_images/<?php echo $row['image'] ?>" alt="Card image cap">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                                                <!-- price -->
                                                                <p class="card-text"><?php echo $row['price'] ?></p>
                                                                <p class="card-text"><?php echo $row['description'] ?></p>
                                                                <!-- product rating system -->
                                                          
                                                                <!-- add to cart -->
                                                                <div class="col-md-12 mt-1" style="background-color: #f68d10;">
                                                                    <a onclick=addToCart(<?php echo $row['id'] ?>) class="btn  col-md-12 mt-1" style="font-weight: bold;">Add to cart</a>
                                                                </div>
                                                                <br />
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php }
                                            }
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</body>

</html>
<style type="text/css">
    .star_rated {
        color: gold;
    }

    .star {
        text-shadow: 0 0 1px #F48F0A;
        cursor: pointer;
    }
</style>
<script type="text/javascript">
    function ratestar(id, rate) {
        $.ajax({
            type: 'Post',
            url: 'rating.php',
            data: {
                'productid': id,
                'rating': rate
            },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    }

    function addToCart(id) {

        $.ajax({
            url: 'addToCart.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(response) {
if(response=="You are not logged in please login to continue"){
    alert(response);
    window.location.href="login.php";
}else{
    alert(response);


}

            }
        });
    }
</script>