
<?php
    session_start();
    include_once 'admin/class/Admin.php';


    $obj = new Admin();

    $displayCategory = $obj->display_p_category();

    $categoryData = array();

    while($data= mysqli_fetch_assoc($displayCategory)){
        
        $categoryData[] = $data;

    }

    if (isset($_GET['remove_product'])) {

    $productId = $_GET['remove_product'];

    foreach($_SESSION['cart'] as $key=>$value){

        if ($productId==$value) {
            unset($_SESSION['cart'][$key]);

            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }

    }
    }

    if (isset($_GET['product_id'])) {
        
        $productId = $_GET['product_id'];

        if (isset($_SESSION['cart'])) {

            if(in_array($productId, $_SESSION['cart'])){
                echo "<script>
                    alert('This Product Already Added In Cart');
                </script>";
                
            }
            else{
                $count  = count($_SESSION['cart']);

                $_SESSION['cart'][$count]=$productId;
            }

        }
        else{
            $_SESSION['cart'][0]=$productId;
        }
    }

    $productData = array();

    if (isset($_SESSION['cart'])) {

        foreach($_SESSION['cart'] as $key=>$value){

            $displayProduct = $obj->display_single_product($value);

            while($data= mysqli_fetch_assoc($displayProduct)){
                $productData[] = $data;

            }
        }
    }
    else{

        $cart = "Your Cart Is Empty!!!";
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

            <div class="container">


                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $subTotal =0 ;
                                    $items = 0;
                                    foreach ($productData as $product) {

                                        $items++;

                                        $subTotal = $subTotal+$product['product_d_price'];
                                    ?>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail" data-title="Product Name">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img width="113" height="113" src="admin/products/<?php echo $product['product_image'];?>" alt="shipping cart"></figure>
                                                </a>
                                                <a class="prd-name" href="#"><?php echo $product['product_name'];?></a>
                                                <div class="action">
                                                    <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <a href="?remove_product=<?php echo $product['product_id'];?>" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><?php echo $product['product_d_price'];?></span></ins>
                                                    <del><span class="price-amount"><?php echo $product['product_r_price'];?></span></del>
                                                </div>
                                            </td>
                                         
                                            <td class="product-subtotal" data-title="Total">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><?php echo $product['product_d_price'];?></span></ins>
                                                    <del><span class="price-amount"><?php echo $product['product_r_price'];?></span></del>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php
                                        if (isset($cart)) {
                                            echo $cart;
                                        }
                                    ?>
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop">Back to Shop</a>
                                            <button class="btn btn-update" type="submit" disabled>update</button>
                                            <button class="btn btn-clear" type="reset">clear all</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal <span class="sub">(<?php echo $items;?> ittems)</span></b>
                                    <span class="stt-price"><?php echo $subTotal;?></span>
                                </div>
                            
                                <div class="btn-checkout">
                                    <a href="#" class="btn checkout">Check out</a>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php 

                include_once 'inc/brand.php';

            ?>

        </div>
    </div>

    <?php 
        include_once 'inc/footer.php';

        include_once 'inc/footer-mobile.php';

        include_once 'inc/mobile-global.php';

        include_once 'inc/quick-over-view.php';

        include_once 'inc/footer-bottom.php';
    ?>

    