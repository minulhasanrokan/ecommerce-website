<?php

    $displayProductCategoryWise = $obj->display_product_category_wise($catId);
    $displayProductCategoryWiseData = array();

    while($displayProductCategory = mysqli_fetch_assoc($displayProductCategoryWise)){

        $displayProductCategoryWiseData[]= $displayProductCategory;
    }

?>

<!-- related products -->
<div class="product-related-box single-layout">
    <div class="biolife-title-box lg-margin-bottom-26px-im">
        <span class="subtitle">All the best item for You</span>
        <h3 class="main-title">Related Products</h3>
    </div>
    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
        <?php
            foreach($displayProductCategoryWiseData as $product){

        ?>
        <li class="product-item">
            <div class="contain-product layout-default">
                <div class="product-thumb">
                    <a href="single-product.php?status=single_product&&id=<?php echo $product['product_id'];?>" class="link-to-product">
                        <img src="admin/products/<?php echo $product['product_image'];?>" alt="dd" width="270" height="270" class="product-thumnail">
                    </a>
                </div>
                <div class="info">
                    <b class="categories"><a href="category.php?status=cat_view&&id=<?php echo $product['cet_id'];?>" class="permal-link"><?php echo $product['cet_name'];?></a></b>
                    <h4 class="product-title"><a href="single-product.php?status=single_product&&id=<?php echo $product['product_id'];?>" class="pr-name">N<?php echo $product['product_name'];?></a></h4>
                    <div class="price">
                        <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $product['product_d_price'];?></span></ins>
                        <del><span class="price-amount"><span class="currencySymbol">£</span><?php echo $product['product_r_price'];?></span></del>
                    </div>
                    <div class="slide-down-box">
                        <p class="message">All products are carefully selected to ensure food safety.</p>
                        <div class="buttons">>
                            <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php }?>
    </ul>
</div>