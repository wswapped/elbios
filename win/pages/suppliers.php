<div class="container-fluid">
	<?php include_once 'modules/topBreadcump.php'; ?>
	<!-- .row -->
	<div class="row">
		<!-- <div class="col-md-12">
			<div class="white-box">
				<h3 class="box-title">Drugs & Materials</h3> </div>
		</div> -->
		<?php
            $products = $Product->list();
            $suppliers = $Supplier->list();
        ?>
		<div class="col-sm-12">
			<div class="white-box">
				<h3 class="box-title m-b-0">Vendors/Suppliers</h3>
				<p class="text-muted m-b-30">You can also export</p>
				<div class="table-responsive">
					<table id="example23" class="display nowrap table table-hover table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Manage</th>
                            </tr>
						</thead>
						<tfoot>
							<tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Manage</th>
                            </tr>
						</tfoot>
						<tbody>
							<?php
                                $n=0;
                                foreach ($suppliers as $key => $supplier) {
                                    $n++;
                                    $supplier = (object)$supplier;

                                    $userData = (object)$User->details($supplier->userId);
                                    ?>
                                        <tr>
                                            <td><?php echo $n; ?></td>
                                            <td><?php echo $userData->names; ?></td>
                                            <td><?php echo $userData->email; ?></td>
                                            <td><?php echo $supplier->location; ?></td>
                                            <td>                                   
                                                <button type="button" class="btn btn-success btn-outlinse btn-circle btn-lg m-r-5 editModalOpenBtn" data-toggle="modal" data-target="#editModal" data-whatever="@mdo"><i class="ti-pencil-alt"></i></button>
                                                <button type="button" class="btn btn-danger btn-outlinse btn-circle btn-lg m-r-5 deleteModalOpenBtn" data-toggle="modal" data-target="#deleteModal" data-whatever="@mdo"><i class="ti-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="btn-fab-wrapper">
				<button type="button" class="btn btn-primary btn-circle btn-xl" data-toggle="modal" data-target="#addProductModal"><i class="fa fa-plus"></i> </button>
			</div>
		</div>
	</div>
</div>

<!-- Modals -->
<div class="modal fade" id="editModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form id="updateProductForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h4 class="modal-title">Edit product #<span id="editProductIdInModal"></span></h4>
	           	</div>
	            <div class="modal-body">
	                
	                    <div class="form-group">
	                        <label for="recipient-name" class="control-label">Name:</label>
	                        <input type="text" class="form-control" id="productNameEdit">
	                    </div>
	                    <div class="form-group">
	                        <label for="message-text" class="control-label">Measurement Unit:</label>
	                        <select class="form-control select2" id="mainMeasurementUnitInput">
	                            <option>Select</option>
				                <?php
				                	$units = $Measurements->listUnits();
				                	foreach ($units as $key => $unit) {
				                		?>
				                			<option value="<?php echo $unit['symbol'] ?>"><?php echo $unit['name']."(".$unit['symbol'].")" ?></option>
				                		<?php
				                	}
				                ?>
	                            ?>
	                        </select>
	                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
	            </div>
	        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form id="deleteProductForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h4 class="modal-title">Delete #<span class="editProductIdInModal"></span></h4>
	           	</div>
	            <div class="modal-body">
                	<p class="text-warning">You are going to delete <b><span class="productNameReplace"></span></b></p>

                	<small>
                		The product wont be able to do further entry transactions but will be archived in several other transactions
                	</small>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Password:</label>
                        <input type="password" class="form-control" required="required">
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-danger waves-effect waves-light">DELETE</button>
	            </div>
	        </form>
        </div>
    </div>
</div>


<div class="modal fade" id="addProductModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form id="addSupplierForm">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h4 class="modal-title">Add supplier to WMS</h4>
	           	</div>
	            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="addProductName" required="required">
                    </div>
                    <div class="form-group">
                        <label for="supplierEmailInput" class="control-label">Email:</label>
                        <input type="email" class="form-control" id="supplierEmailInput" required="required">
                    </div>
                    <div class="form-group">
                        <label for="supplierPhoneInput" class="control-label">Phone:</label>
                        <input type="number" class="form-control" id="supplierPhoneInput" required="required">
                    </div>
                    <div class="form-group">
                        <label for="supplierLocationTextInput" class="control-label">Location:</label>
                        <input type="text" class="form-control" id="supplierLocationTextInput" required="required">
                    </div>
                    <div class="form-group">
	                    <label for="supplierUsernameInput" class="control-label">Username:</label>
	                    <input type="text" class="form-control" id="supplierUsernameInput">
	                </div>
	            </div>
	            
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-success waves-effect waves-light">ADD</button>
	            </div>
	        </form>
        </div>
    </div>
</div>

<?php
	$js_files = array('js/suppliers.js');
?>