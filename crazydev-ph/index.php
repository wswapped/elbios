<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RBC</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
            
            <?php
            include ('nav.php');
            ?>



            <!-- this is for barcode scanner not tab--> 
<script language="javascript"> 
    function DoCheckLength(aTextBox) { 
      if (aTextBox.maxLength - aTextBox.value.length==0) { 
        document.theForm.submit(); 
        //beep.play(); 
      } 
    } 
  </script> 
<!-- end of Barcode Scanner -->  
<!--Script kung saan mag popop up ang Modal Pop up -->
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Invoice
                        <small>#007612</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Examples</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>

                <div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>Note:</b> This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>
                </div>

                <!-- Main content -->
                <section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i>Jewerly System, V1.2.
                                <small class="pull-right">Date: <?php date("F j, Y, g:i a"); ?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                    </div><!-- /.row -->

                       <?php 
                          include('connection.php');
                    ?>

                    

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                           
                             <form class="form-horizontal style-form" NAME="theForm" action="index.php" method="get" >
 
                              <?php
                    if(isset($_GET['item_barcode'])){ 
                    $item_barcode = ($_GET['item_barcode']);
                    
                    }

                    ?>
                            <input class="form-control" type="text" autofocus maxlength="6" onkeyup="return(DoCheckLength(this));" ID="firstTextBox" name="item_barcode" placeholder="Scan your item">
                              <p class="lead">Item Description</p>
                            </form>

 
                        <?php
                        if(empty($item_barcode))
                        {

                        }else
                        {

                         $sql=mysqli_query($conn," SELECT* from item where barcode_id = '.$item_barcode.' order by id  DESC limit 1")or die(mysqli_error());
                        while($result=mysqli_fetch_array($sql)){
                            $barcode_id = ''.$item_barcode['barcode_id'].''; 
                            $item = ''.$item_barcode['item'].''; 
                            $price = ''.$item_barcode['price'].''; 
                            $image = ''.$item_barcode['image'].''; 
                            }
                        ?>


                          <?php 
                             
                             echo '<center> <img src="image/'.$image.'" width="150px" height="150px" alt="Paypal"/></center>';
                          
                            ?>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                        <?php $today = date("F j, Y");?>
                            <p class="lead">Date: <?php date("F j, Y"); ?></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Barcode ID:</th>
                                         <td><?php echo ''.$result.'' ?></td>
                                    </tr>
                                    <tr>
                                        <th>ITEM Name:</th>
                                        <td><?php echo ''.$item.'' ?></td>
                                    </tr>
                                    <tr>
                                        <th>Price:</th>
                                         <td><?php echo ''.$price.'' ?></td>
                                    </tr>
                                 
                                </table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <?php
                }
                    ?>
                    <br>

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>  
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

    </body>
</html>