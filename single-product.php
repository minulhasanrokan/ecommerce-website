
<?php
    include_once 'admin/class/Admin.php';

    $obj = new Admin();


    if (isset($_GET['status']) && isset($_GET['id'])) {

        $productId = $_GET['id'];

        $productStatus = $_GET['status'];

        if ($productStatus=='single_product') {
            
            $displayProduct = $obj->display_single_product($productId);

            $data= mysqli_fetch_assoc($displayProduct);

            $catId = $data['cet_id'];

        }
        else{
            header('location:index.php');
        }
    }
    else{
        header('location:index.php');
    }

    include_once 'inc/head.php';
?>
<body class="biolife-body">

    <?php 
        include_once 'inc/pre-loader.php';

        include_once 'inc/header.php';
    ?>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

    <div style="background-image: url('admin/products/<?php echo $data['product_image'];?>');" class="hero-section hero-background">
        <h1 class="page-title"><?php echo $data['product_name'];?></h1>
    </div>
>
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="category.php?status=cat_view&&id=<?php echo $data['cet_id'];?>" class="permal-link"><span class="current-page"><?php echo $data['cet_name'];?></span></a></li><li class="nav-item"><span class="current-page"><?php echo $data['product_name'];?></span></li>
            </ul>
        </nav>
        <div class="sumary-product single-layout">
                    <div class="media">
                        <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                            <li><img src="admin/products/<?php echo $data['product_image'];?>" alt="" width="500" height="500"></li>
                            
                        </ul>
                    </div>
                    <div class="product-attribute">
                        <h3 class="title"><?php echo $data['product_name'];?></h3>
                        <p class="excerpt">
                            <?php echo $data['product_des'];?>
                        </p>
                        <div class="price">
                            <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $data['product_d_price'];?></span></ins>
                            <del><span class="price-amount"><span class="currencySymbol">£</span><?php echo $data['product_r_price'];?></span></del>
                        </div>
                        <div class="shipping-info">
                            <p class="shipping-day">3-Day Shipping</p>
                            <p class="for-today">Pree Pickup Today</p>
                        </div>
                    </div>
                    <div class="action-form">
                        <div class="quantity-box">
                            <span class="title">Quantity:
                                <?php 
                                    if (isset($_POST['update_total'])) {
                                        
                                        $quantity = $_POST['quantity'];
                                         echo $quantity;
                                    }
                                    else{
                                        echo 1;
                                    }
                                ?>
                            </span>
                            <form method="post" action="">
                                <input name="quantity" value="<?php 
                                    if (isset($_POST['update_total'])) {
                                        
                                        $quantity = $_POST['quantity'];
                                         echo $quantity;
                                    }
                                    else{
                                        echo 1;
                                    }
                                ?>" type="number" name="quantity">
                                <br/> <br/>
                                <input class="btn btn-primary" value="Update Total" type="submit" name="update_total">
                           </form>
                        </div>
                        <div class="total-price-contain">
                            <span class="title">Total Price:</span>
                            <p class="price">
                                <?php 
                                    if (isset($_POST['update_total'])) {

                                        if (empty($_POST['quantity'])) {
                                            echo "Quantity Should Not Be Less Than 1";
                                        }
                                        else{
                                            $quantity = $_POST['quantity'];
                                         echo $quantity*$data['product_d_price']; 
                                        }
                                        
                                        
                                    }
                                    else{
                                        echo $data['product_d_price'];
                                    }
                                ?>
                                    
                                </p>
                        </div>
                        <div class="buttons">
                            <a href="add-to-cart.php?product_id=<?php echo $data['product_id'];?>" class="btn add-to-cart-btn">add to cart</a>
                            <p class="pull-row">
                                <a href="#" class="btn wishlist-btn">wishlist</a>
                                <a href="#" class="btn compare-btn">compare</a>
                            </p>
                        </div>
                        <div class="location-shipping-to">
                            <span class="title">Ship to:</span>
                            <select name="shipping_to" class="country">
                                <option value="-1">Select Country</option>
                                <option value="america">America</option>
                                <option value="france">France</option>
                                <option value="germany">Germany</option>
                                <option value="japan">Japan</option>
                            </select>
                        </div>
                        <div class="social-media">
                            <ul class="social-list">
                                <li><a href="#" class="social-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="acepted-payment-methods">
                            <ul class="payment-methods">
                                <li><img src="assets/images/card1.jpg" alt="" width="51" height="36"></li>
                                <li><img src="assets/images/card2.jpg" alt="" width="51" height="36"></li>
                                <li><img src="assets/images/card3.jpg" alt="" width="51" height="36"></li>
                                <li><img src="assets/images/card4.jpg" alt="" width="51" height="36"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php 
                    include_once 'inc/related-product.php';
                ?>
            <?php 
                include_once 'inc/brand.php';
            ?>
        </div>
    </div>
    </div>
    

    <?php 
        include_once 'inc/footer.php';

        include_once 'inc/footer-mobile.php';

        include_once 'inc/mobile-global.php';

        include_once 'inc/quick-over-view.php';

        include_once 'inc/footer-bottom.php';
    ?>

    
