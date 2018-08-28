<?php
	$crops = $Crop->list();
	$cooperativeId = $user_data['cooperativeId'];
	$coop_crops = $Cooperative->get_crops($current_cooperative); 
?>
<div class="uk-grid uk-grid-width-medium-1-2">
	<div class="uk-first-row">
		<h4 class="heading_a uk-margin-bottom">Ibiciro ku bihingwa bya <?php echo $current_coop_name ?></h4>
		<div class="md-card uk-margin-medium-bottom">
			<div class="md-card-content">
				<div class="dt_colVis_buttons"></div>
				<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>#</th>
						<th>Igihingwa</th>
						<th>Ubuziranenge</th>
						<th>Igiciro kigezweho</th>
						<th>Itariki</th>
						<!-- <th>Kora</th> -->
					</tr>
					</thead>

					<tbody>
					<?php
						// $sql = "SELECT * FROM (SELECT cp.*, cv.variety, cg.grade, cr.cropName FROM crops_pricing AS cp JOIN crop_varieties as cv ON cp.cropVariety = cv.id JOIN crop_grades as cg ON cp.cropGrade = cg.id JOIN crops AS cr ON cr.cropId = cp.cropId WHERE cp.cooperativeId = \"$cooperativeId\" ORDER BY cp.dateEstablished DESC) GROUP BY cropId, cv.id, cg.id";
						$sql = "SELECT * FROM (SELECT cp.*, cv.variety, cg.grade, cr.cropName FROM crops_pricing AS cp JOIN crop_varieties as cv ON cp.cropVariety = cv.id JOIN crop_grades as cg ON cp.cropGrade = cg.id JOIN crops AS cr ON cr.cropId = cp.cropId WHERE cp.cooperativeId = \"$cooperativeId\" GROUP BY cp.pricingId DESC) AS t GROUP BY cropId, cropVariety, cropGrade";
						$query = $conn->query($sql) or trigger_error($conn->error);

						$coop_crops = $Cooperative->get_crops($current_cooperative);
						for($n=0; $n<$query->num_rows; $n++){
							$coop_crop = $query->fetch_assoc();
							?>
								<tr>
									<td><?php echo $n+1; ?></td>
									<td><?php echo $coop_crop['cropName']." / ".$coop_crop['variety']??"-"; ?></td>
									<td><?php echo $coop_crop['grade']??"-"; ?></td>									
									<td><?php echo number_format((int)$coop_crop['amount']??"-"); ?></td>
									<td><?php echo date($standard_time, strtotime($coop_crop['dateEstablished']) ); ?></td>
									<!-- <td><button class="md-btn"><span class="menu_icon"><i class="material-icons md-color-light-green-800">edit</i></span></button></td> -->
								</tr>
							<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	 <div class="uk-first-row">
		<h4 class="heading_a uk-margin-bottom">Inama n'amakuru ku busabe bw'ibiciro ku bihigwa</h4>
		<div class="md-card uk-margin-medium-bottom">
			<div class="md-card-content">
				<p>
					Aha uzahasanga amakuru ku byifuzo by'ibiciro koperative yasabye
				</p>
			</div>
		</div>
	</div>
</div>


<div class="md-fab-wrapper ">
	<button class="md-fab md-fab-primary d_inline" id="launch_church_create" href="javascript:void(0)" data-uk-modal="{target:'#set_pricing_modal'}"><i class="material-icons">add</i></button>
</div>

<!-- Crop pricing modal -->
<div class="uk-modal" id="set_pricing_modal" aria-hidden="true" style="display: none; overflow-y: auto;">
	<div class="uk-modal-dialog" style="max-width:800px;">
		<div class="act-dialog" data-role="init">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Shyiramo igiciro cy'igihingwa</h3>
			</div>
			<form method="POST" enctype="multipart/form-data" id="set_pricing_form" autocomplete="off">
				<div class="md-card1">
					<div class="md-card-content1">
						<div class="md-input-wrapper md-input-filled">
							<label></label>
							<select class="md-input label-fixed" id="cropselect" name="state">
								<option value=null>Hitamo igihingwa</option>
								<?php
									                         
									foreach ($coop_crops as $key => $crop) {
										//looping through varieties
										$cropId = $crop['cropId'];
										$crop_variety = $crop['variety'];
										$varid = $crop['cropVariety'];
										echo '<option value="'.$crop['cropId'].'-'.$varid.'">'.$crop['cropName'].'-'.$crop_variety.'</option>';
										
									}
								?>
							</select>
							<span class="md-input-bar "></span>
						</div>
						<div class="md-input-wrapper md-input-filled">
							<label>Ubuziranenge</label>
							<select class="md-input label-fixed" id="crop_grade" name="state">
								<option value=null>Hitamo</option>
							</select>
						</div>
						<div class="md-input-wrapper">
							<label>Igiciro cyifuzwa</label>
							<input type="text" id="crop_price_input" maxlength="5" class="md-input input-number" required="required">
							<span class="md-input-bar "></span>
						</div>
					</div>                        
				</div>
				<div class="uk-modal-footer uk-text-right">
					<button class="md-btn md-btn-danger pull-left uk-modal-close">Bireke</button>
					<button class="md-btn md-btn-success pull-right" id="create-branch-btn">EMEZA</button>
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
	$js_files = array('bower_components/select2/dist/js/select2.min.js', 'js/pricing.js');
?>