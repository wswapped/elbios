<?php
    $crops = $Crop->list();
    $cooperativeCrops = $Cooperative->get_crops($current_cooperative);
    // $coop harvest
    $coop_harvest = $Cooperative->get_harvest($current_cooperative);
    // var_dump($coop_harvest);

    $sellers = $Seller->list_all();
?>
<div class="uk-grid">
	<div class="uk-width-medium-3-4"><h4 class="heading_a uk-margin-bottom">Gurisha Umusaruro wa <?php echo $current_coop_name ?></h4></div>
	<div class="uk-width-medium-1-4"><span><button class="uk-button uk-button-primary" data-uk-modal="{target:'#sell_modal'}">GURISHA</button></span></div>
</div>

<?php
    $harvest_summary = $Cooperative->harvest_summary($current_cooperative);
    // var_dump($harvest_summary);
?>
<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handlera hierarchical_show" data-uk-grid-margin>
    <div>
        <a href="sell">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i class="material-icons md-color-red md-icon md-color-light-blue-800">spa</i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Umusaruro wose</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $harvest_summary['total']; ?><noscript><?php echo $harvest_summary['total']; ?></noscript> kg</span></h2>
                </div>
            </div>
        </a>
    </div>
    <div>
        <a href="crops">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i class="material-icons md-color-light-green-800">spa</i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Ibihingwa</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $Cooperative->n_crops($user_data['cooperativeId']); ?></noscript></span></h2>
                </div>
            </div>
        </a>
    </div>
    <div>
        <a href="harvest">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?php echo $harvest_summary['remainingPercentage']; ?>/100</span></div>
                    <span class="uk-text-muted uk-text-small">Umusaruro Usigaye</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe"><noscript><?php echo $harvest_summary['remaining']; ?></noscript></span> kg</h2>
                </div>
            </div>
        </a>
    </div>
    <div>
        <a href="sell">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?php echo $harvest_summary['soldPercentage']; ?>/100</span></div>
                    <span class="uk-text-muted uk-text-small">Umusaruro wagurishijwe</span>
                    <h2 class="uk-margin-remove" id=""><?php echo number_format($harvest_summary['sold']); ?> kg</h2>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="md-card uk-margin-medium-bottom">
	<div class="md-card-content">
		<div class="dt_colVis_buttons"></div>
		<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Umuguzi</th>
					<th>Igihingwa</th>
					<th>Ubwoko</th>
					<th>Ingano</th>
					<th>Itariki yo kugurishwa</th>
					<!-- <th>Kora</th> -->
				</tr>
			</thead>
			<tbody>
			<?php
				$coop_harvest = $Cooperative->get_market($current_cooperative);
				for($n=0; $n<count($coop_harvest); $n++){
					$harvest = $coop_harvest[$n];
					?>
						<tr>
							<td><?php echo $n+1; ?></td>
							<td><?php echo $harvest['sellerName']; ?></td>
							<td><?php echo $harvest['cropName']; ?></td>
							<td><?php echo $harvest['variety']; ?></td>
							<td><?php echo number_format($harvest['quantity']); ?></td>
							<td><?php echo date("d/m/Y", strtotime($harvest['createdDate'])); ?></td>
							<!-- <td><button class="md-btn"><span class="menu_icon"><i class="material-icons md-color-light-green-800">edit</i></span></button></td> -->
						</tr>
					<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>
<!-- Crop addition modal -->
<div class="uk-modal" id="sell_modal" aria-hidden="true" style="display: none; overflow-y: auto;">
	<div class="uk-modal-dialog" style="max-width:800px;">
		<div class="act-dialog" data-role="init">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Kugurisha umusaruro wacu</h3>
			</div>
			<form method="POST" enctype="multipart/form-data" id="harvest_sell_form" autocomplete="off">
				<div class="md-card">
					<div class="md-card-content">
						<div class="md-input-wrapper md-input-filled">
							<label></label>
							<select class="md-input label-fixed" id="cropselect" name="state">
								<option value=null>Hitamo igihingwa</option>
								<?php                      
									foreach ($coop_harvest as $key => $crop) {
										//looping through varieties
										$cropId = $crop['cropId'];
										$crop_variety = $crop['variety'];
										$varid = $variety['cropVariety'];
										echo '<option value="'.$crop['cropId'].'-'.$varid.'">'.$crop['cropName'].'-'.$crop_variety.'</option>';
										
									}
								?>
							</select>
						</div>

						<div class="md-input-wrapper">
							<label>Ingano igurishwa</label>
							<input type="text" id="crop_sales_quantity_input" maxlength="6" class="md-input input-number" required="required">
							<span class="md-input-bar "></span>
						</div>

						<div class="md-input-wrapper md-input-filled">
							<label></label>
							<select class="md-input label-fixed" id="seller_input" name="state">
								<option value=null>Hitamo umucuruzi</option>
								<?php                            
									foreach ($sellers as $key => $seller) {
										//looping through sellers
										$seller_name = $seller['name'];
										$seller_id = $seller['userId'];
										echo '<option value="'.$seller_id.'">'.$seller_name.'</option>';
									}
								?>
							</select>
						</div>

						<!-- <div class="md-input-wrapper">
							<label>Umunyamuryango wazanye umusaruro</label>
							<input type="text" id="crop_price_input" maxlength="6" class="md-input input-number" required="required">
							<span class="md-input-bar "></span>
						</div> -->
					</div>                        
				</div>
				<div class="uk-modal-footer uk-text-right">
					<button class="md-btn md-btn-danger pull-left uk-modal-close">Bireke</button>
					<button class="md-btn md-btn-success pull-right" id="create-branch-btn">GURISHA</button>
				</div>
			</form>
		</div>
		<div class="act-dialog display-none" style="max-width:400px;" data-role="done">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Ibihingwa</h3>
				<p class="uk-text-success">Ni byiza! Igihingwa cyongewe mu byo koperative ihinga :)</p>
			</div>
		</div>
		</div>
	</div>
</div>

<?php
    //Loading the helper JS
    $js_files = array('bower_components/select2/dist/js/select2.min.js', 'js/sell.js');
?>