<div class="container-fluid">
	<?php

	include_once 'modules/topBreadcump.php';


	//file for receiving purchasing orders using ASN
	//check if there is a asn sent in post

	$receiveASN = 0;
	if(!empty($_POST)){
		$receiveASN = $_POST['receiveASN']??"";
	}

	//check if ASN was sent in GET
	if(!empty($_GET['receiveASN'])){
		$receiveASN = $_GET['receiveASN']??"";
	}

	//CHECK if we are receiving or listing goods expected to be received today
	if(empty($receiveASN) && !$receiveASN){
	?>
		<!-- .row -->
		<div class="row">
			<?php
				//getting orders expected to be received today
	            $ordersReceivingToday = $POrder->ordersReceivingToday();
	            // var_dump($ordersReceivingToday);
	        ?>
	        <div class="col-md-12">
	        		<div class="row">
	        		<div class="col-md-6">
	                	<div class="white-box m-b-0">
	                        <h3 class="text-info">Today Orders reception <span class="pull-right"><i class="fa fa-caret-up"></i> <?php echo count($ordersReceivingToday); ?></span></h3>
	                        <div id="receivingProgressChart"></div>
	                    </div>
	                    <div class="white-box">
	                        <div class="row">
	                            <div class="p-l-20 p-r-20">
	                                <div class="pull-left">
	                                    <div class="text-muted m-t-20">Received orders</div>
	                                    <h2>6</h2> </div>
	                                <div data-label="60%" class="css-bar css-bar-60 css-bar-lg m-b-0 css-bar-purple pull-right"></div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	        	</div>
	        	
	        </div>
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-10">Order expected to be received today</h3>



					<!-- <p class="text-muted m-b-30">Enter the purchase order or delivery note number to receive</p> -->

					<!-- <form id="checkOrderForm" method="POST">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
			                        <label>Delivery NO:</label>
			                        <div>
			                            <input type="text" class="form-control" name ='orderNumber' value=""> </div>
			                    </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>a</label>
			                    	<button class="btn btn-primary">Receive</button>
			                    </div>
							</div>
						</div>
					</form> -->



					<?php
						if(is_array($ordersReceivingToday)){
							?>
								<div class="table-responsive">
									<table id="example23" class="display nowrap table table-hover table-striped" cellspacing="0" width="100%">
										<thead>
											<tr>
				                                <th>#</th>
				                                <th>Order Number</th>
				                                <th>Number of Items</th>
				                                <th>Vendor</th>
				                                <th>Departure date</th>
				                                <th>Action</th>
				                            </tr>
										</thead>
										<tfoot>
											<tr>
				                                <th>#</th>
				                                <th>Order Number</th>
				                                <th>Number of Items</th>
				                                <th>Vendor</th>
				                                <th>Departure date</th>
				                                <th>Action</th>
				                            </tr>
										</tfoot>
										<tbody>
											<?php
				                                $n=0;
				                                foreach ($ordersReceivingToday as $key => $order) {
				                                    $n++;
				                                    $order = (object)$order;
				                                    $orderCode = $POrder->generateOrderNumber("P", $order->orderId);
				                                    $orderData = $POrder->details($order->orderId);
				                                    $supplierData = $Supplier->details($orderData['supplier']);
				                                    ?>
				                                        <tr>
				                                            <td><?php echo $n; ?></td>
				                                            <td><?php echo $orderCode; ?></td>
				                                            <td><?php echo $order->nItems; ?></td>
				                                            <td><?php echo $supplierData['name']; ?></td>
				                                            <td><?php echo date($standard_date, strtotime($order->departureDate)); ?></td>
				                                            <td>
				                                                <button type="button" class="btn btn-warning btn-outline btn-circle btn-lg m-r-5 deleteModalOpenBtn" data-toggle="modal" data-target="#deleteModal" data-whatever="@mdo">
				                                                	<a href="receive?receiveASN=<?php echo $order->id; ?>" style="color: inherit;">
				                                                		<i class="mdi mdi-human-handsup"></i>
				                                                	</a>
				                                                </button>
				                                                <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-20">
				                                                	<a href="vieworder?orderId=<?php echo $order->orderId; ?>" style="color: inherit;">
				                                                		<i class="ti-angle-right"></i></button>
				                                                	</a>
				                                            </td>
				                                        </tr>
				                                    <?php
				                                }
				                            ?>
										</tbody>
									</table>
								</div>
							<?php
						}
					?>

					
				</div>
			</div>
			<div class="col-md-12">
				<div class="btn-fab-wrapper">
					<button type="button" class="btn btn-primary btn-circle btn-xl" data-toggle="modal" data-target="#addProductModal"><i class="fa fa-plus"></i> </button>
				</div>
			</div>
		</div>
	<?php
		}else if(!empty($receiveASN) && $receiveASN){
			//here the ASN to be received was atttached let's go on to receiving
			$ASNData = $POrder->ASNdetails($receiveASN);

			//Items in the ASN items
			$nASNItems = count($ASNData['items']);


			if(empty($ASNData['orderId'])){
				echo "Advanced shipping notice can not be found";
			}else{
					//getting order data
					$orderData = $POrder->details($ASNData['orderId']);
					$orderCurrency = $orderData['currency'];

					$status = $orderData['status'];
					if($status != 'confirmed'){
						echo "<p class='text-danger'>Order is not yet confirmed by the supplier</p>";
					}else{
						$warehouseData = $Warehouse->details($orderData['warehouse']);
						$supplierData = $Supplier->details($orderData['supplier']);
						?>
							<h3>Receive goods from <b class="text-warning">#<?php echo $POrder->generateASNNumber($receiveASN); ?></b></h3>

							<div class="row">
								<div class="col-md-3">
									<div class="white-box">
										<p>Supplier: <?php echo $supplierData['name'] ?></p>
										<p>Warehouse: <?php echo $warehouseData['name'] ?></p>
										<p>Total amount: <?php echo number_format($orderData['totalAmount'])." ".$orderCurrency; ?></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="white-box">
										<p>Number of items: <?php echo number_format($nASNItems); ?></p>
										<p>ASN Percentage: <?php echo $warehouseData['name'] ?></p>
										<p>Remaining item: <?php echo number_format($orderData['totalAmount'])." ".$orderCurrency; ?></p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="barcode-container white-box">
										<span class="display-4">ASN Barcode</span>
										<?php
											include $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

											$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
											$code = $Bar->getBarcode($POrder->generateASNNumber($receiveASN), $Bar::TYPE_CODE_128, 2, 50, 'black');
											echo $code;
										?>
										<p class="text-small"><?php echo $POrder->generateASNNumber($receiveASN); ?></p>
									</div>
								</div>
							</div>
							<div class="row ">
								<div class="col-md-12 white-box">
									<div class="table-responsive">
										<table id="example23" class="display nowrap table table-hover table-striped" cellspacing="0" width="100%">
											<thead>
												<tr>
					                                <th>#</th>
													<th>Item</th>
													<th>Batch number</th>
													<th>Quantity</th>
													<th>Unit Price</th>
													<th>Total Amount</th>
													<th>Action</th>
					                            </tr>
											</thead>
											<tbody>
												<?php
					                                $n=0;
					                                foreach ($ASNData['items'] as $key => $ASNItem) {
					                                	// var_dump($ASNItem);
					                                    $n++;

					                                    //getting orderItemData
					                                    $orderItemData = (object)$POrder->itemDetails($ASNItem['orderItem']);
					                                    $orderId = $orderItemData->orderId;
					                                    $orderCode = $POrder->generateOrderNumber('P', $orderId);
					                                    $productData = $Product->details($orderItemData->productId);
					                                    // var_dump($orderItemData);
					                                    ?>
					                                        <tr>
					                                            <td><?php echo $n; ?></td>
					                                            <td><?php echo $productData['productName']; ?></td>
					                                            <td><?php echo $orderItemData->batchNumber; ?></td>
					                                            <td><?php echo number_format($orderItemData->productQuantity)." ".$orderItemData->productUnitMeasure; ?></td>
					                                            <td><?php echo number_format($orderItemData->productUnitPrice)." $orderCurrency"; ?></td>
					                                            <td><?php echo number_format($orderItemData->amount)." $orderCurrency"; ?></td>
					                                            <td>
					                                            	<button data-orderItemId=<?php echo $orderItemData->id; ?>  type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 showItemInspect"><i class="ti-angle-down"></i></button>
					                                            </td>
					                                        </tr>
					                                    <?php
					                                }
					                            ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-md-12 white-box hidden" id="itemReceive">
									<?php
		                                $n=0;
		                                foreach ($ASNData['items'] as $key => $ASNItem) {
		                                    $n++;
		                                    var_dump($ASNItem);
		                                    //getting orderItemData
		                                    $orderItemData = (object)$POrder->itemDetails($ASNItem['orderItem']);
		                                    $orderId = $orderItemData->orderId;
		                                    $orderCode = $POrder->generateOrderNumber('P', $orderId);
		                                    $productData = $Product->details($orderItemData->productId);
		                                    $manufacturer = $Manufacturer->details($orderItemData->manufacturer);
		                            ?>
		                                    <div class="panel panel-disabled hidden" id="">
					                            <div class="panel-heading">
					                            	<span>Inspect <?php echo $productData['productName']." in $orderCode"; ?></span>
					                                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a> </div>
					                            </div>
					                            <div class="panel-wrapper collapse in" aria-expanded="true">
					                                <div class="panel-body">
					                                	<div class="col-md-6">
						                                	<ul class="list-group">
						                                		<li class="list-group-item">
						                                			Product name: <?php echo $productData['productName']; ?>
						                                		</li>
						                                		<li class="list-group-item">
						                                			Manufacturer: <?php echo $manufacturer['name']; ?>
						                                		</li>
						                                		<li class="list-group-item">
						                                			Batch number: <?php echo $orderItemData->batchNumber; ?>
						                                		</li>
						                                	</ul>
						                                </div>
						                                <div class="col-md-6">
						                                	<ul class="list-group">
						                                		<li class="list-group-item">
						                                			Manufacture date: <?php echo standardDate($ASNItem['manufacturedDate']); ?>
						                                		</li>
						                                		<li class="list-group-item">
						                                			Expiry date: <?php echo standardDate($ASNItem['expiryDate']); ?>
						                                		</li>
						                                		<li class="list-group-item">
						                                			Shelf life: <?php echo dateDiff($ASNItem['manufacturedDate'], $ASNItem['expiryDate']); ?> days
						                                		</li>
						                                	</ul>
						                                </div>
						                                <div class="col-md-6">
						                                	<ul class="list-group">
						                                		<li class="list-group-item">
						                                			Quantity: <?php echo number_format($orderItemData->productQuantity)." ".$orderItemData->productUnitMeasure; ?>
						                                		</li>
						                                		<li class="list-group-item">
						                                			Unit price: <?php echo number_format($orderItemData->productUnitPrice)." $orderCurrency"; ?>
						                                		</li>
						                                		<li class="list-group-item">
						                                			Amount: <?php echo number_format($orderItemData->amount)." $orderCurrency"; ?>
						                                		</li>
						                                	</ul>
						                                </div>
						                                <div class="col-md-6 text-center">
						                                	<h4>Selected Quantity</h4>
						                                	<input data-plugin="knob" data-width="150" data-height="150" data-angleOffset="90" data-linecap="round" data-fgColor="#01c0c8" value="<?php echo $orderItemData->productQuantity ?>" data-max="<?php echo $orderItemData->productQuantity ?>" />
						                                </div>
						                                <div class="col-md-12 m-t-20">
						                                	<div class="panel panel-info">
									                            <div class="panel-heading">
									                            	<span><i class="mdi mdi-barcode"></i> Labels (RFID - Barcodes)</span>
									                                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a> </div>
									                            </div>
									                            <div class="panel-wrapper collapse in" aria-expanded="true">
									                                <div class="panel-body">
									                                	<?php
									                                		for ($n=1; $n <= $orderItemData->productQuantity; $n++) {
									                                			?>
									                                				<div class="col-md-2 m-b-10 m-l-10" style="border: 1px solid #eee">
										                                				<h4><?php echo $n.($n==1?'st':($n==2?'nd':($n==3?'rd':'th'))); ?> Item</h4>
										                                				<div>
										                                					<?php 
										                                						$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
																								$code = $Bar->getBarcode($n, $Bar::TYPE_CODE_128, 2, 30, 'black');
																								echo $code;
																								echo "$n";
																							?>
										                                				</div>
										                                				<p></p>
										                                			</div>
									                                			<?php

									                                		}
									                                	?>
										                                
									                                </div>
									                            </div>
									                        </div>
						                                </div>
					                                </div>
					                            </div>
					                        </div>
					                <?php
		                                }
		                            ?>
		                            <button class="btn btn-info">Receive</button>
									<button class="btn btn-info">Reject</button>
								</div>
							</div>
						<?php
					}
				?>

				<?php
			}
		}
	?>
</div>
<?php
	$js_files = array('js/products.js', '../plugins/bower_components/knob/jquery.knob.js', 'js/receive.js');
?>