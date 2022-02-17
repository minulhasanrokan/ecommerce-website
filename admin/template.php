<?php
    session_start();

    // include main admin class
    include("class/admin.php");

    $adminId = $_SESSION['id'];
    $adminEmail = $_SESSION['email'];
    $adminName = $_SESSION['name'];

    if ($adminId==Null) {
        header('location:index.php');
    }

    if (isset($_GET['adminlogout'])) {
        $adminlogout = new Admin;
        $adminlogout->admin_logout($_GET['adminlogout']);
    }

	// include header file and function
	require "includes/header.php";
?>
  <body>
  <body>
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php
            	// include header navigation bar file and function
            	require "includes/header-nav.php";
            ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php
                    	// include side bar file and function
		            	require "includes/side-bar.php";
		            ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <!-- page content-->
                                        <?php
                                            if($views=="dashboard"){
                                                include('views/dashboard-view.php');
                                            }
                                            elseif ($views=="add-category") {
                                                include('views/add-category-view.php');
                                            }
                                            elseif ($views=="manage-cetegory") {
                                                include('views/manage-category-view.php');
                                            }
                                            elseif($views=="edit-category"){
                                                include('views/edit-category-view.php');
                                            }
                                            elseif ($views=="add-product") {
                                                include('views/add-product-view.php');
                                            }
                                            elseif ($views=="manage-product") {
                                                include('views/manage-product-view.php');
                                            }
                                            elseif ($views=="edit-product") {
                                                include('views/edit-product-view.php');
                                            }
                                            elseif ($views=="manage-users") {
                                                include('views/manage-users-view.php');
                                            }
                                        ?>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
	// include footer file and function
	require "includes/footer.php";
?>