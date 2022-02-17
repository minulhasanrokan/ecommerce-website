<div class="header-bottom hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="vertical-menu vertical-category-block">
                    <div class="block-title">
                        <span class="menu-icon">
                            <span class="line-1"></span>
                            <span class="line-2"></span>
                            <span class="line-3"></span>
                        </span>
                        <span class="menu-title">All Category</span>
                        <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                    </div>
                    <div class="wrap-menu">
                        <ul class="menu clone-main-menu">
                        <?php
                        foreach ($categoryData as $category) {
                        ?>
                            <li class="menu-item">
                                <a href="category.php?status=cat_view&&id=<?php echo $category['cet_id'];?>" class="menu-name" data-title="Ocean Foods">
                                    <img style="width: 20px;" src="admin/uploads/<?php echo $category['cet_img'];?>"> <?php echo $category['cet_name'];?>
                                </a>
                            </li>
                        <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 padding-top-2px">
                <div class="header-search-bar layout-01">
                    <form action="#" class="form-search" name="desktop-seacrh" method="get">
                        <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                        <select name="category">
                            <option value="-1" selected>All Categories</option>
                            <?php
                                foreach ($categoryData as $category) {
                            ?>
                                <option value="<?php echo $category['cet_id'];?>"><?php echo $category['cet_name'];?></option>
                            <?php }?>

                        </select>
                        <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                    </form>
                </div>
                <div class="live-info">
                    <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+900) 123 456 7891</b></p>
                    <p class="working-time">Mon-Fri: 8:30am-7:30pm; Sat-Sun: 9:30am-4:30pm</p>
                </div>
            </div>
        </div>
    </div>
</div>