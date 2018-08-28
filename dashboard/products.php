<div class="uk-margin-bottom">
	<h4 class="heading">Drugs and Materials</h4>
	<small>Section for what we sell and their status and meta information</small>
</div>
<?php
	$products = $Product->list();
	$gender_summary = $Cooperative->gender_summary($current_cooperative);
?>
<div class="md-card uk-margin-medium-bottom">
	<div class="md-card-content">
		<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-grid-margin>
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i class="material-icons md-color-red md-icon md-color-light-blue-800">people</i>
                </div>
                <span class="uk-text-muted uk-text-small">Total Quantity</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo count($products); ?></noscript></span></h2>
            </div>
        </div>
    </div>
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                    <i class="material-icons md-color-light-green-800">spa</i>
                </div>
                <span class="uk-text-muted uk-text-small">Total upcoming</span>
                <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $gender_summary['m']??0; ?></noscript></span></h2>
            </div>
        </div>
    </div>
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?php echo $gender_summary['f']??0; ?></span></div>
                <span class="uk-text-muted uk-text-small">Total leaving</span>
                <h2 class="uk-margin-remove"><span class="countUpMe"><noscript><?php echo $gender_summary['f']??0; ?></noscript></span></h2>
            </div>
        </div>
    </div>
    <div>
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></div>
                <span class="uk-text-muted uk-text-small">Distribution</span>
                <h2 class="uk-margin-remove" id=""><?php echo count($Cooperative->committee($current_cooperative)); ?></h2>
            </div>
        </div>
    </div>
</div>
		<div class="dt_colVis_buttons"></div>
		<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
			<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Quantity remaining</th>
				<th>Last entry</th>
				<th>Warehouse capacity</th>
				<th>Action</th>
			</tr>
			</thead>

			<tfoot>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Quantity remaining</th>
				<th>Last entry</th>
				<th>Warehouse capacity</th>
				<th>Action</th>
			</tr>
			</tfoot>

			<tbody>
			<?php
				for($n=0; $n<count($products); $n++){
					$product = $products[$n];
					?>
						<tr>
							<td><?php echo $n+1; ?></td>
							<td><?php echo $product['productName']; ?></td>
							<td><?php echo 0 ?></td>
							<td><?php echo date("d M Y H:i"); ?></td>
							<td><?php echo 0 ?></td>
							<td><button class="md-btn"><span class="menu_icon"><b><i class="material-icons md-color-light-green-800">navigate_next</i></b></span></button></td>
						</tr>
					<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>

<div class="md-fab-wrapper ">
	<button class="md-fab md-fab-primary d_inline" id="launch_church_create" href="javascript:void(0)" data-uk-modal="{target:'#church_create'}"><i class="material-icons">add</i></button>
</div>


<div class="uk-modal" id="church_create" aria-hidden="true" style="display: none; overflow-y: auto;">
	<div class="uk-modal-dialog" style="max-width:800px;">
		<div class="act-dialog" data-role="init">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Add product - Drug/material</h3>
			</div>
			<form method="POST" enctype="multipart/form-data" id="add_member_form" autocomplete="off">
				<div class="md-card1">
					<div class="md-card-content1">
						<div class="md-input-wrapper">
							<label>Name</label>
							<input type="text" id="name_input" class="md-input" required="required">
							<span class="md-input-bar "></span>
						</div>
						<div class="md-input-wrapper">
							<label>Unit of Measurement</label>
							<input type="number" id="NID_input" class="md-input validateNID" required="required">
							<span class="md-input-bar "></span>
						</div>


						<!-- <div class="md-input-wrapper">
							<p>
								<input type="radio" name="gender" id="radio_demo_1" value="m" data-md-icheck />
								<label for="radio_demo_1" class="inline-label">Gabo</label>
							</p>
							<p>
								<input type="radio" name="gender" id="radio_demo_2" value="f" data-md-icheck />
								<label for="radio_demo_2" class="inline-label">Gore</label>
							</p>
							<span class="md-input-bar "></span>
						</div> -->

						 <div class="md-input-wrapper">
						 	<label for="radio_demo_1" class="inline-label">Image</label>
						 	<input type="file" id="user_pic_input" class="dropify" data-allowed-file-extensions="jpg jpeg png"/>
							<span class="md-input-bar "></span>
						</div>
						
					</div>                        
				</div>
				<div class="uk-modal-footer uk-text-right">
					<button class="md-btn md-btn-danger pull-left uk-modal-close">BIREKE</button>
					<button class="md-btn md-btn-success pull-right" id="create-branch-btn">EMEZA</button>
				</div>
			</form>
		</div>
		<div class="act-dialog display-none" style="max-width:400px;" data-role="done">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Kongera umunyamuryango</h3>
				<p class="uk-text-success">Kongeramo umuyamuryango byagenze neza :)</p>
			</div>
		</div>
		</div>
	</div>
</div>
<?php
	$js_files = array('js/members.js');
?>
