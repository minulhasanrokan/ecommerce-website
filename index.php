
<?php
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

            
            <?php 
                include_once 'inc/main-slider.php';

                include_once 'inc/feature-slider.php';

                include_once 'inc/home-products.php';

                include_once 'inc/promotion-one.php';

                include_once 'inc/promotion-two.php';

                include_once 'inc/home-top-rated-products.php';

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

    
