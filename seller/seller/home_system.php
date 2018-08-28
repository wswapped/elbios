<?php 
require 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'utils/home_meta_tags.php'; ?>
    <title>Ikaze - Wholesaler</title>
    <?php include 'utils/home_stylesheet.php'; ?>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div style="display: block;" class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->
        <?php 
        include 'utils/navigation.php';
        ?>
        <!-- End Topbar header -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php 
        include 'utils/sidebar.php';
        ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <?php 
                if(isset($_GET['action'])){
                    switch ($_GET['action']) {
                        case 'cooperatives':
                            include 'views/cooperatives.php';
                            break;
                        case 'stock':
                            include 'views/stock.php';
                            break;
                        
                        default:
                            include 'views/cooperatives.php';
                            break;
                    }
                }else{
                    include 'views/dashboard.php';
                }
                ?>
                <!-- .right-sidebar -->
                <?php include 'utils/rightbar.php'; ?>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
            </div>
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'utils/footer.php'; ?>
            <!-- ============================================================== -->
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- Scripts -->
    <?php include 'utils/scripts.php'; ?>
    <?php include 'utils/my_scripts.php'; ?>
</body>

</html>