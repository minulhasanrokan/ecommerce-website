
<?php
    include_once 'admin/class/Admin.php';

    $obj = new Admin();

    include_once 'inc/head.php';

    if (isset($_POST['register'])) {
        
        $userRegister = $obj->user_register($_POST);
    }
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

<!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="signin-container">
                            <h3>
                                <?php
                    if (isset($userRegister)) {
                        echo $userRegister;
                        // code...
                    }
                    ?>
                            </h3>
                            <form action="" name="frm-register" method="post">
                                <p class="form-row">
                                    <label for="fid-name">User Name:<span class="requite">*</span></label>
                                    <input type="text" name="user_name" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                    <input type="email" name="email" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">First Name:<span class="requite">*</span></label>
                                    <input type="text" name="f_name" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Last Name:<span class="requite">*</span></label>
                                    <input type="text" name="l_name" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Mobile:<span class="requite">*</span></label>
                                    <input type="text" name="mobile" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" name="pass" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Confirm Password:<span class="requite">*</span></label>
                                    <input type="password"  name="c_pass" value="" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button type="submit" name="register"  style="float:right;" class="btn btn-submit btn-bold" type="submit">Register Now</button>
                                    <a href="user-login.php" class="link-to-help">Login</a>
                                </p>
                            </form>
                        </div>
                    </div>
                                        <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Already Have a Account?</h4>
                                <p class="sub-title">Create an account with us and you’ll be able to:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="user-login.php" class="btn btn-bold">Log In Now</a>
                            </div>
                        </div>
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

    
