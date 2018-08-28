<?php
    ob_start();
    include_once '../conn.php';
    include_once '../functions.php';
    require 'auth.php';
    require 'core/location.php';
    require 'core/cooperative.php';
    require 'core/crop.php';
    require 'core/product.php';
    require 'core/purchasingOrder.php';
    require 'core/message.php';
    require 'core/institution.php';
    require 'core/seller.php';
    $user_name = $user_data['name']??"";
    $current_user_pic = $user_data['profile_picture'];
    $standard_date = "d/m/Y";
    $standard_time = $standard_date." H:i";

    $current_cooperative = $user_data['cooperativeId'];

    //keeping coop_name for usage
    $current_cooperative_data = $Cooperative->get_cooperative($current_cooperative);
    $current_cooperative_name = $current_coop_name = $current_cooperative_data['name'];
    $current_coop_image = $current_cooperative_data['cooperativeImage'];
?>
<!doctype html>
 <html lang="en"> 
<head>
    <?php
        $title = "Welcome $user_name";
        include_once "scripts/head.php";
    ?>

    <!-- additional styles for plugins -->
    <!-- weather icons -->
    <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css" media="all">
    <!-- metrics graphics (charts) -->
    <link rel="stylesheet" href="bower_components/metrics-graphics/dist/metricsgraphics.css">
    <!-- chartist -->
    <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">
    
    <!-- select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">

    <!-- flag icons -->
    <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">


    <!-- themes -->
    <link rel="stylesheet" href="assets/css/themes/themes_combined.min.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Dropify -->
    <link rel="stylesheet" href="assets/skins/dropify/css/dropify.css">

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <?php

        //getting requested pages
        //checking the page
        $reqURI = trim($_SERVER['REQUEST_URI']??"", "/");


        //REMOVING GET_VARIABLES
        if($pos  = strripos($reqURI, "?")){
            //here get are sent
            $reqURI = substr_replace($reqURI, '', $pos);
        }

        $req_parts = explode("/", $reqURI);


        //remove all the parts before admin/
        $s = array_search("dashboard", $req_parts);
        for ($n=$s; $n >= 0; $n--) {
            unset($req_parts[$n]);
        }

        $req_parts = array_values($req_parts);

        $current_page_action = $base_page = $req_parts[0]??'home'; #base required page
    ?>
    <!-- main header -->
    <?php include 'navs.php'; ?>
    <!-- main header end -->
    <!-- main sidebar -->
    <?php include 'sidebar.php'; ?>
    <div id="page_content">
        <div id="page_content_inner">

            <!-- statistics (small charts) -->
            <!-- circular charts -->
            <!-- summary report panel -->
            
            <!-- end of summary report panel -->
            <!-- tasks -->
            <?php
                $valid_pages = array('home', 'pricing', 'field', 'communication', 'products', 'information', 'crops', 'harvest', 'sell', 'inputs', 'pesticides', 'land', 'information', 'orders');
                $redirect_pages = array('logout', 'access');

                //Check requested route
                if(is_int(array_search($base_page, $valid_pages))){
                    include $base_page.".php";
                }else if(is_int(array_search($base_page, $redirect_pages))){
                    header("location:$base_page.php");
                }else{
                    include "404.php" ;
                }
            ?>
        </div>
    </div>

    <!-- secondary sidebar -->
    <?php include 'activities.php'; ?>
    <!-- secondary sidebar end -->

    <script type="text/javascript">
        // variables declaration
        const current_cooperative = "<?php echo $user_data['cooperativeId']; ?>";
        const current_user = "<?php echo $user; ?>";
        const api_link = "../api/index.php";
    </script>

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="bower_components/chartist/dist/chartist.min.js"></script>
        <!-- maplace (google maps) -->
        <script src="http://maps.google.com/maps/api/js"></script>
        <script src="bower_components/maplace-js/dist/maplace.min.js"></script>
        <!-- peity (small charts) -->
        <script src="bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="bower_components/countUp.js/dist/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="bower_components/handlebars/handlebars.min.js"></script>
        <script src="assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="bower_components/clndr/clndr.min.js"></script>

        <!--  dashbord functions -->
        <script src="assets/js/pages/dashboard.min.js"></script>

        <!-- datatables -->
        <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <!-- datatables buttons-->
        <script src="bower_components/datatables-buttons/js/dataTables.buttons.js"></script>
        <script src="assets/js/custom/datatables/buttons.uikit.js"></script>
        <script src="bower_components/jszip/dist/jszip.min.js"></script>
        <script src="bower_components/pdfmake/build/pdfmake.min.js"></script>
        <script src="bower_components/pdfmake/build/vfs_fonts.js"></script>
        <script src="bower_components/datatables-buttons/js/buttons.colVis.js"></script>
        <script src="bower_components/datatables-buttons/js/buttons.html5.js"></script>
        <script src="bower_components/datatables-buttons/js/buttons.print.js"></script>
        
        <!-- datatables custom integration -->
        <script src="assets/js/custom/datatables/datatables.uikit.min.js"></script>

        <!--  datatables functions -->
        <script src="assets/js/pages/plugins_datatables.min.js"></script>

        <!-- Dropify -->
        <script src="bower_components/dropify/dist/js/dropify.min.js"></script>


        <?php
            echo $page_js??"";

            for($n=0; !empty($js_files) && $n<count($js_files) && is_array($js_files); $n++){
                $pfile = $js_files[$n];
                ?>
                    <script type="text/javascript" src="<?php echo $pfile ?>"></script>
                <?php
            }
        ?>
    <script>

        $(".input-number").on('keypress', function(e){
            if(isNaN(e.key)){
                alert("Numbers only allowed")
                return false;
            }
        })

        $(function() {
            if(isHighDensity()) {
                $.getScript( "assets/js/custom/dense.min.js", function(data) {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });

        $('.dropify').dropify();
    </script>
</body>
</html>