 <!-- Validation wizard -->
<div class="row" id="validation">
	<div class="col-12">
		<div class="white-box">
			<div class="card-body wizard-content">
				<div class="row">
					<div class="col-md-8">
						<h4 class="card-title">Preparing purchase order <b><span class="text-warning">##<?php echo $POrder->generateOrderNumber('P', $POrder->nextOrderNumber()); ?></span></b></h4>
						<h6 class="card-subtitle">Comphrensive manual purchase order creation for warehouse</h6>
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5 addUmucyoModalOpenBtn" data-toggle="modal" data-target="#addUmucyoModal" data-whatever="@mdo"><i class="mdi mdi-cloud-sync"></i></button>
					</div>
				</div>
				<form id="purchaseOrderForm" class="validation-wizard wizard-circle m-t-40">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="wfirstName2"> Currency:
									<span class="danger">*</span>
								</label>
								<select class="form-control select2" id="orderCurrencyInput" style="width: 100%">
		                            <option>Select</option>
					                <?php
					                	$currencies = $POrder->listCurrency();
					                	foreach ($currencies as $key => $currency) {
					                		?>
					                			<option value="<?php echo $currency['symbol'] ?>"><?php echo $currency['name']; ?></option>
					                		<?php
					                	}
					                ?>
		                        </select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="wfirstName2"> Warehouse:
									<span class="danger">*</span>
								</label>
								<select class="form-control select2" id="orderWareHouseInput" style="width: 100%">
		                            <option>Select</option>
					                <?php
					                	$warehouses = $Warehouse->list();
					                	foreach ($warehouses as $key => $warehouse) {
					                		?>
					                			<option value="<?php echo $warehouse['id'] ?>"><?php echo $warehouse['name']; ?></option>
					                		<?php
					                	}
					                ?>
		                        </select>
							</div>
						</div>
					</div>
					<div class="row m-t-40">
						<div class="col-md-3">
							<div class="form-group">
								<label for="itemCodeInput"> Product name :
									<span class="danger">*</span>
								</label>
								<select class="form-control select2" id="itemCodeInput" style="width: 100%">
		                            <option>Select</option>
					                <?php
					                	$products = $Product->list();
					                	foreach ($products as $key => $product) {
					                		?>
					                			<option value="<?php echo $product['productId'] ?>"><?php echo $product['productName']; ?></option>
					                		<?php
					                	}
					                ?>
		                        </select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="wlastName2"> Quantity :
									<span class="danger">*</span>
								</label>
								<div class="input-group">
                                    <input type="number" class="form-control" min="1" id="productQuantityInput" placeholder="Quantity">
                                    <div class="input-group-addon">
                                    	<select class="form-control select2" id="itemUnitSelect" style="width: 100%">
				                            <option>Unit</option>
				                        </select>
				                    </div>
                                </div>
                            </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="unitPriceInput">Unit price:</label>
								<input type="number" class="form-control" id="unitPriceInput"> </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="wphoneNumber2">Total amount:</label>
								<input type="text" class="form-control" id="totalPriceDisplay" disabled="disabled"> </div>
						</div>
					</div>

					<div class="row m-t-5">
						<div class="col-md-3">
							<div class="form-group">
								<label for="unitPriceInput">Batch number:</label>
								<input type="number" class="form-control" id="batchNumberInput"> </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
		                        <label for="manufacturerInput" class="control-label">Manufacturer:</label>
		                        <select class="form-control select2" id="manufacturerInput" style="width: 100%">
		                            <option>Select</option>
					                <?php
					                	$manufacturers = $Manufacturer->list();
					                	foreach ($manufacturers as $key => $manufacturer) {
					                		?>
					                			<option value="<?php echo $manufacturer['id'] ?>"><?php echo $manufacturer['name']; ?></option>
					                		<?php
					                	}
					                ?>
		                        </select>
		                    </div>
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-success btn-outline btn-circle m-r-5 m-b-5 addUmucyoModalOpenBtn pull-rsight" id="addPurchaseItemBtn"><i class="ti-plus"></i></button>
						</div>

						<div class="col-md-12">
							<div class="table-responsive" id="itemPlace" style="display: none;">
								<table id="example23" class="DataTable display nowrap table table-hover table-striped" cellspacing="0" width="100%">
									<thead>
										<tr>
			                                <th>#</th>
			                                <th>Product Name</th>
			                                <th>Batch Number</th>
			                                <th>Manufacturer</th>
			                                <th>Quantity</th>
			                                <th>Unit price</th>
			                                <th>Amount</th>
			                                <th>Manage</th>
			                            </tr>
									</thead>
									<!-- <tfoot>
										<tr>
											<th>#</th>
			                                <th>Product Name</th>
			                                <th>Quantity</th>
			                                <th>Unit price</th>
			                                <th>Amount</th>
			                                <th>Manage</th>
			                            </tr>
									</tfoot> -->
									<tbody id="orderItemsDisplay">
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row m-t-40">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="recipient-name" class="control-label">Supplier / vendor:</label>
		                        <select class="form-control select2" id="selectSupplier" style="width: 100%">
		                            <option>Select</option>
					                <?php
					                	$suppliers = $Supplier->list();
					                	foreach ($suppliers as $key => $supplier) {
					                		?>
					                			<option value="<?php echo $supplier['id'] ?>"><?php echo $supplier['name']; ?></option>
					                		<?php
					                	}
					                ?>
		                        </select>
		                    </div>
		                </div>
		                <div class="col-md-12">
		                    <div class="form-group">
		                        <label for="recipient-name" class="control-label">Budget holder:</label>
		                        <select class="form-control select2" id="selectBudgetHolder" style="width: 100%">
		                            <option>Select</option>
					                <?php
					                	$budgetHolders = $POrder->listBudgetHolders();
					                	foreach ($budgetHolders as $key => $holder) {
					                		?>
					                			<option value="<?php echo $holder['id'] ?>"><?php echo $holder['name']; ?></option>
					                		<?php
					                	}
					                ?>
		                        </select>
		                    </div>
		                </div>

		                <div class="col-md-12">
							<div class="form-group">
		                        <label for="recipient-name" class="control-label">Shipping mode:</label>
		                        <select class="form-control select2" id="shippingOptionInput" style="width: 100%">
		                            <option>Select</option>
		                            <option>Air</option>
		                            <option>Ocean</option>
		                            <option>Land</option>
		                        </select>
		                    </div>
		                </div>
		                <div class="col-md-12">
		                    <div class="form-group">
		                        <label for="recipient-name" class="control-label">Preferred shipment date:</label>
		                        <input type="date" class="form-control" id="shipmentDate">
		                    </div>
		                </div>
					</div>
					<p class="successCenter text-success"></p>
					<button class="btn btn-primary" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modals -->
<div class="modal fade" id="addUmucyoModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form id="addOtherPurchaseOrderForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h4 class="modal-title">Add prepared purchase order</h4>
	           	</div>
	            <div class="modal-body">
	                	<p><small>This interface allows you to export purchase order which was already prepared by external services or offline</small></p>
	                    <!-- <div class="form-group">
	                        <label for="recipient-name" class="control-label">Name:</label>
	                        <input type="text" class="form-control" id="productNameEdit">
	                    </div> -->

	                    <section class="m-t-40">
                            <div class="sttabs tabs-style-underline tabs-style-underline-short-tabs">
                                <nav>
                                    <ul>
                                        <li><a href="#section-underline-1" class="sticon ti-home"><span>E-procurement</span></a></li>
                                        <li><a href="#section-underline-2" class="sticon ti-export"><span>Intelliware</span></a></li>
                                    </ul>
                                </nav>
                                <div class="content-wrap">
                                    <section id="section-underline-1">
                                        <h3>E-procurement purchase order</h3>
                                        <p>
                                        	Contract created using E-procurement is uploaded here to Intelliware WMS. Upload the contract file.
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
	                <button type="submit" class="btn btn-success waves-effect waves-light" data-dismiss="modal">CREATE</button>
	            </div>
	        </form>
        </div>
    </div>
</div>