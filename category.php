
<?php
    include_once 'admin/class/Admin.php';

    $obj = new Admin();

    $displayCategory = $obj->display_p_category();

    $categoryData = array();

    while($data= mysqli_fetch_assoc($displayCategory)){
        $categoryData[] = $data;

    }

    if (isset($_GET['status']) && isset($_GET['id'])) {

        $catId = $_GET['id'];

        $catStatus = $_GET['status'];

        if ($catStatus=='cat_view') {
            
            $displayProductCategoryWise = $obj->display_product_category_wise($catId);
            $displayProductCategoryWiseData = array();

            while($displayProductCategory = mysqli_fetch_assoc($displayProductCategoryWise)){

                $displayProductCategoryWiseData[]= $displayProductCategory;
            }
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

            <!--Hero Section-->
    <div style="background-image: url('admin/uploads/<?php echo $category['cet_img'];?>');" class="hero-section hero-background">
        <h1 class="page-title"><?php echo $category['cet_name'];?></h1>
    </div>
       <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                <li class="nav-item"><a href="category.php?status=cat_view&&id=<?php echo $category['cet_id'];?>" class="permal-link"><span class="current-page"><?php echo $category['cet_name'];?></span></a></li>
            </ul>
        </nav>
    </div>
    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="product-category grid-style">

                        <div class="row">
                            <ul class="products-list">
                                <?php
                                    foreach($displayProductCategoryWiseData as $productData){
                                ?>
                                    <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="single-product.php?status=single_product&&id=<?php echo $productData['product_id'];?>" class="link-to-product">
                                                    <img src="admin/products/<?php echo $productData['product_image'];?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories"><?php echo $productData['cet_name'];?></b>
                                                <h4 class="product-title"><a href="single-product.php?status=single_product&&id=<?php echo $productData['product_id'];?>" class="pr-name"><?php echo $productData['product_name'];?></a></h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><span class="currencySymbol">BDT </span><?php echo $productData['product_d_price'];?></span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">BDT </span><?php echo $productData['product_r_price'];?></span></del>
                                                </div>
                                                <div class="slide-down-box">
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                                <li><span class="current-page">1</span></li>
                                <li><a href="#" class="link-page">2</a></li>
                                <li><a href="#" class="link-page">3</a></li>
                                <li><span class="sep">....</span></li>
                                <li><a href="#" class="link-page">20</a></li>
                                <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul>
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

    
