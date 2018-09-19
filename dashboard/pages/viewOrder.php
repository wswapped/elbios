<?php

	//checking order to load
	if(empty($orderId)){
		$orderId = $_GET['orderId']??"";
	}
	//purchase order details
	$orderData = $POrder->details($orderId);
	// var_dump($orderData);
	$orderCode = $POrder->generateOrderNumber("P", $orderId);
	$orderCurency = $orderData['currency'];

	$warehouseData = $Warehouse->details($orderData['warehouse']);
	$orderItems = $orderData['items'];
?>
<script type="text/javascript">
	const currentOrderId = <?php echo $orderId; ?>;
</script>
<div class="row" id="validation">
	<div class="col-12">
		<div class="white-box">
			<div class="card-body wizard-content">
				<div class="row">
					<div class="col-md-8">
						<h4 class="card-title">Purchase order <b><span class="text-warning">#<?php echo $orderCode; ?></span></b></h4>
						<h6 class="card-subtitle">Issued on: <span><?php echo date($standard_date, strtotime($orderData['createdDate'])); ?></span></h6>
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5 confirmPurchaseOrderOpenBtn" data-toggle="modal" data-target="#importPurchaseOrder" data-whatever="@mdo"><i class="mdi mdi-cloud-download"></i></button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 m-t-40">
						<h3 class="box-title">Prefered shipments:</h3>
                        <ul class="list-icons">
                            <li><i class="fa fa-chevron-right text-danger"></i> Warehouse: <?php echo $warehouseData['name'] ?></li>
                            <li><i class="fa fa-chevron-right text-danger"></i> Date: <?php echo date($standard_date, strtotime($orderData['shipmentDate'])) ?> (<span class="text-warning"><i class="mdi mdi-clock"></i>in <?php echo dateDiff($orderData['shipmentDate'], date(DATE_ATOM)); ?> days</span>)</li>
                            <li><i class="fa fa-chevron-right text-danger"></i> Mode: <?php echo $orderData['shippingMode']; ?></li>
                        </ul>
					</div>
					<div class="col-md-12 m-t-40">
						<div class="table-responsive">
							<table id="example23" class="display nowrap table table-hover table-striped" cellspacing="0" width="100%">
								<thead>
									<tr>
		                                <th>#</th>
		                                <th>Item</th>
		                                <th>Quantity</th>
		                                <th>Unit Price</th>
		                                <th>Amount</th>
		                            </tr>
								</thead>
								<tbody>
									<?php
		                                $n=0;
		                                foreach ($orderItems as $key => $item) {
		                                	$item = (object)$item;
		                                    $n++;
		                                    $productData = $Product->details($item->productId);
		                                    ?>
		                                        <tr>
		                                            <td><?php echo $n; ?></td>
		                                            <td><?php echo $productData['productName']; ?></td>
		                                            <td><?php echo $item->productQuantity.' '.$item->productUnitMeasure; ?></td>
		                                            <td><?php echo "$item->productUnitPrice $orderCurency"; ?></td>
		                                            <td><?php echo number_format($item->amount??"0")." ".$orderCurency; ?></td>
		                                        </tr>
		                                    <?php
		                                }
		                            ?>
		                            <tr>
		                            	<td>Total</td>
		                            	<td>-</td>
		                            	<td>-</td>
		                            	<td>-</td>
		                            	<td><?php echo number_format($orderData['totalAmount'])." ".$orderCurency ?></td>
		                            </tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row">

					<?php
						//check supplier response on order
						$orderResponse = $POrder->checkSupplierStatus($orderId);

						if(!empty($orderResponse) && $orderResponse['status'])
						{
							$orderStatus = 1;
						}else{
							$orderStatus = 0;
						}

						if($currentUserType == 'supplier'){
							//check if this order is confirmed
							if($orderStatus){
								$differenceDays = dateDiff($orderResponse['arrivalDate'], date(DATE_ATOM));
								?>
									<div class="col-md-12 mt-50 display-4 h4">
										<p class="text-success"><i class="mdi mdi-check"></i> You confirmed the order!</p>
										<p class="text-warning"><i class="mdi mdi-clock-alert"></i> Shipping in <?php echo number_format($differenceDays); ?> days</p>
									</div>
								<?php
							}else{
								//show buttons for confirmation
								?>
								<div class="col-md-12">
									<button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5 confirmPurchaseOrderOpenBtn" data-toggle="modal" data-target="#confirmPurchaseOrder" data-whatever="@mdo"><i class="fas fa-check"></i></button>
									<button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5 confirmPurchaseOrderOpenBtn" data-toggle="modal" data-target="#confirmPurchaseOrder" data-whatever="@mdo"><i class="fas fa-times"></i></button>
								</div>
								<?php
							}
						}else{

						}
					?>

					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modals -->
<div class="modal fade modal-lg" id="confirmPurchaseOrder" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; width: 100%">
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
        	<form id="purchaseOrderConfirmationForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h4 class="modal-title">Confirm purchase order <span class="text-warning">#<?php echo $orderCode ?></span></h4>
	           	</div>
	            <div class="modal-body">
	                	<p><small>Thanks for your confirmation, next is ASN information provision</small></p>
	                    <!-- <div class="form-group">
	                        <label for="recipient-name" class="control-label">Name:</label>
	                        <input type="text" class="form-control" id="productNameEdit">
	                    </div> -->

	                    <section class="m-t-40">
                            <div class="sttabs tabs-style-underline tabs-style-underline-short-tabs">
                                <nav>
                                    <ul>
                                        <li><a href="#section-underline-1" class="sticon ti-home"><span>ASN Creation</span></a></li>
                                        <li><a href="#section-underline-2" class="sticon ti-export"><span>My WMS Integration</span></a></li>
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                                    <section id="section-underline-1">
                                        <h3>Advanced Shipping Notice <span class="text-warning">#ASN<?php echo $POrder->generateASNNumber($POrder->nextASNNumber()); ?></span></h3>                                        
                                        <input type="hidden" name="supplierASN" id="supplierASNInput" value="<?php echo $POrder->nextASNNumber(); ?>">
                                    	<div class="row m-t-40">
                                    		<div class="col-md-12 m-b-40">
                                    			<div class="table-responsive">
													<table id="example23" class="display nowrap table table-hover table-striped" cellspacing="0" width="100%">
														<thead>
															<tr>
								                                <th>#</th>
								                                <th>Item</th>
								                                <th>Batch Number</th>
								                                <th>Manufactured Date<span class="text-danger">*</span></th>
								                                <th>Expiry date<span class="text-danger">*</span></th>
								                                <!-- <th>Shelf life</th> -->
								                            </tr>
														</thead>
														<tbody>
															<?php
								                                $n=0;
								                                foreach ($orderItems as $key => $item) {
								                                	$item = (object)$item;
								                                    $n++;
								                                    $productData = $Product->details($item->productId);
								                                    ?>
								                                        <tr class="itemFeedBack" data-item="<?php echo $item->id ?>">
								                                            <td><?php echo $n; ?></td>
								                                            <td><?php echo $productData['productName']; ?></td>
								                                            <td><?php echo $item->batchNumber; ?></td>
								                                            <td>
								                                            	<div class="input-group">
							                                        				<input type="text" class="form-control datepicker-autoclose manufactureDateInput" placeholder="dd/mm/yyyy" required> <span class="input-group-addon"><i class="icon-calender"></i></span>
							                                        			</div>
								                                            </td>
								                                            <td>
								                                            	<div class="input-group">
							                                        				<input type="text" class="form-control datepicker-autoclose expiryDateInput" placeholder="dd/mm/yyyy" required> <span class="input-group-addon"><i class="icon-calender"></i></span>
							                                        			</div>
								                                            </td>
								                                        </tr>
								                                    <?php
								                                }
								                            ?>
														</tbody>
													</table>
												</div>
                                    		</div>

                                    		<div class="m-t-40"></div>
                                    		<div class="m-t-40"></div>

                                    		<div class="col-md-6">
                                    			<div class="form-group">
                                                    <label class="control-label">Departure <span class="text-danger">*</span>:</label>
                                                    <div class="input-group">
                                        				<input type="text" class="form-control datepicker-autoclose" placeholder="dd/mm/yyyy" required id="orderDepartureDate"> <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        			</div>
                                                </div>
                                    		</div>
                                    		<div class="col-md-6">
                                    			<div class="form-group">
                                                    <label class="control-label">Planned Arrival <span class="text-danger">*</span>:</label>
                                                    <div class="input-group">
                                        				<input type="text" class="form-control datepicker-autoclose" placeholder="dd/mm/yyyy" value="<?php echo date(str_ireplace("/", "-", $standard_date), strtotime($orderData['shipmentDate'])) ?>" id="orderArrivalDate"> <span class="input-group-addon"><i class="icon-calender"></i></span>
                                        			</div>
                                                </div>
                                    		</div>
                                    	</div>
                                    	<div class="form-group m-t-40">
                                        	<label class="control-label"><i class="mdi mdi-barcode"></i> Barcode type <span class="text-danger">*</span>:</label>
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input class="barcodeTypeInput" type="radio" name="barcode" id="upcInput" value="UPC" required="required">
                                                        <label for="upcInput">UPC</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input class="barcodeTypeInput" type="radio" name="barcode" id="eanInput" value="EAN" required="required">
                                                        <label for="eanInput">EAN</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input class="barcodeTypeInput" type="radio" name="barcode" id="pdf417Input" value="PDF417" required="required">
                                                        <label for="pdf417Input">PDF417</label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    	<div class="form-group m-t-20">
		                                    <label class="col-sm-12">Addition file</label>
		                                    <div class="col-sm-12">
		                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
		                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
		                                            <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
		                                    </div>
		                                </div>
		                                <div class="form-group m-t-20">
		                                    <label class="col-sm-12">Addition notes:</label>
		                                    <div class="col-sm-12">
		                                    	<textarea class="form-control" id="additionNotes"></textarea>
		                                    </div>
		                                </div>
                                    </section>
                                    <section id="section-underline-2">
                                        <h2>Your WMS</h2>
                                        <p>
                                        	Get data from your custom WMS solution
                                        </p>
                                        <div class="form-group">
		                                    <label class="col-sm-12">API endpoint</label>
		                                    <div class="col-sm-12">
		                                    	<input type="text" class="form-control" placeholder="URI">
		                                    </div>
		                                </div>
                                    </section>
                                </div>
                                <!-- /content -->
                            </div>
                            <!-- /tabs -->
                        </section>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-success waves-effect waves-light">CONFIRM</button>
	            </div>
	        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="importPurchaseOrder" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form id="addOtherPurchaseOrderForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h4 class="modal-title">Import purchase order to your system</h4>
	           	</div>
	            <div class="modal-body">
	                	<p><small>This interface allows you to import purchase order which was already prepared by external services or offline</small></p>
	                    <!-- <div class="form-group">
	                        <label for="recipient-name" class="control-label">Name:</label>
	                        <input type="text" class="form-control" id="productNameEdit">
	                    </div> -->

	                    <section class="m-t-40">
                            <div class="sttabs tabs-style-underline tabs-style-underline-short-tabs">
                                <nav>
                                    <ul>
                                        <li><a href="#section-underline-1" class="sticon ti-home"><span>Your format</span></a></li>
                                        <li><a href="#section-underline-2" class="sticon ti-export"><span>Intelliware</span></a></li>
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                                    <section id="section-underline-1">
                                        <h3>Download your system import file format</h3>
                                        <button class="btn btn-primary btn-outline"><i class="mdi mdi-cloud-download"></i> Download</button>
                                    	<!-- <div class="form-group">
		                                    <label class="col-sm-12">File upload</label>
		                                    <div class="col-sm-12">
		                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
		                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
		                                            <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
		                                    </div>
		                                </div> -->
                                    </section>
                                    <section id="section-underline-2">
                                        <h2>WMS Format</h2>
                                        <p>
                                        	Upload purchase order prepared with the predefined formats obtained from Intelliware WMS formats
                                        </p>
                                        <div class="form-group">
		                                    <label class="col-sm-12">File upload</label>
		                                    <div class="col-sm-12">
		                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
		                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
		                                            <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
		                                    </div>
		                                </div>
                                    </section>
                                </div>
                                <!-- /content -->
                            </div>
                            <!-- /tabs -->
                        </section>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-success waves-effect waves-light" data-dismiss="modal">FINISH</button>
	            </div>
	        </form>
        </div>
    </div>
</div>

<?php
	if(!empty($js_files) && is_array($js_files)){
		$js_files = array_merge($js_files, array('js/viewOrder.js'));
	}else{
		$js_files = array('js/viewOrder.js', '../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js');
	}
?>