
<?php
    session_start();
    include_once 'admin/class/Admin.php';


    $obj = new Admin();

    $displayCategory = $obj->display_p_category();

    $categoryData = array();

    while($data= mysqli_fetch_assoc($displayCategory)){
        
        $categoryData[] = $data;

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
                <h2>User profile</h2>
                <h4>User Name:</h4>
                <a href="?status=logout">Logout</a>
                 <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr><th class="product-name">Product Image</th>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        
                                        <th class="product-subtotal">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail" data-title="Product Name">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img width="113" height="113" src="admin/products/" alt="shipping cart"></figure>
                                                </a>
                                            </td>
                                            <td class="product-thumbnail" data-title="Product Name">
                                                
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"></span></ins>
                                                    <del><span class="price-amount"></span></del>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
         
                    </div>
                </div>
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

    