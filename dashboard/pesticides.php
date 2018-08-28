<?php
	$view_pest = $_GET['p']??"";
	$coop_pests = $Cooperative->get_pesticides($current_cooperative, current_season());
	if($view_pest){
		//here we load pest in coopreative
		$pesticide_data = get_pesticide($view_pest);
		// var_dump($pesticide_data);
		$pestname = $pesticide_data['name'];

		//summary of $view_fert in cooperative
		$pest_summary = $Cooperative->get_pesticide($current_cooperative, $view_pest, current_season());
		?>
			<div class="uk-grid">
				<div class="uk-width-1-4">
					<h4 class="heading_a uk-margin-bottom"><?php echo "$pestname muri $current_coop_name" ?></h4>
				</div>
				<div class="uk-width-3-4">
				</div>
			</div>
			<div class="uk-grid">
				<div class="uk-width-medium-1-2">
					<div class="md-card uk-margin-medium-bottom">
						<div class="md-card-content">
							<h3 class="md-car-title">Abanyamuryango bahawe umuti</h3>
							<div class="dt_colVis_buttons"></div>
							<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
								<thead>
								<tr>
									<th>#</th>
									<th>Umunyamuryango</th>
									<th>Ingano mu bilo (Kg)</th>
									<th>Itariki</th>
								</tr>
								</thead>

								<tbody>
								<?php
									$coop_assigned_pests = $Cooperative->members_with_pesticide($current_cooperative, $view_pest, current_season());
									for($n=0; $n<count($coop_assigned_pests); $n++){
										$fert_assigned = $coop_assigned_pests[$n];
										?>
											<tr>
												<td><?php echo $n+1; ?></td>
												<td><?php echo $fert_assigned['member_name']; ?></td>
												<td><?php echo $fert_assigned['quantity']; ?></td>
												<td><?php echo date("d/m/Y H:i:s", strtotime($fert_assigned['createdDate'])); ?></td>
											</tr>
										<?php
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="uk-width-medium-1-2">
					<div class="md-card uk-margin-medium-bottom">
						<div class="md-card-content">
							<h3 class="md-car-title">Abanyamuryango batarahabwa umuti</h3>
							<div class="dt_colVis_buttons"></div>
							<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
								<thead>
								<tr>
									<th>#</th>
									<th>Umunyamuryango</th>
									<th>Tanga</th>
								</tr>
								</thead>

								<tbody>
								<?php
									$coop_notassigned_pests = $Cooperative->members_notassigned_pesticides($current_cooperative, current_season());
									for($n=0; $n<count($coop_notassigned_pests); $n++){
										$pests_assigned = $coop_notassigned_pests[$n];
										?>
											<tr>
												<td><?php echo $n+1; ?></td>
												<td><?php echo $pests_assigned['member_name']; ?></td>
												<td><button class="md-btn assign_pesticide_btn" data-membername="<?php echo $pests_assigned['member_name']; ?>" data-memberid="<?php echo $pests_assigned['userId']; ?>" data-uk-modal="{target:'#asign_fertilizer'}">TANGA</button></td>
											</tr>
										<?php
									}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php
	}else{
?>
	<div class="uk-grid">
		<div class="uk-width-1-4">
			<h4 class="heading_a uk-margin-bottom">Imiti muri <?php echo $current_coop_name ?></h4>
		</div>
		<div class="uk-width-3-4">
			<button class="uk-button uk-button-primary" data-uk-modal="{target:'#add_pesticide'}">MENYEKANISHA IMITI</button>
		</div>
	</div>
	<div class="md-card uk-margin-medium-bottom">
		<div class="md-card-content">
			<div class="dt_colVis_buttons"></div>
			<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
				<thead>
				<tr>
					<th>#</th>
					<th>Ubwoko</th>
					<th>Iyakiriwe</th>
					<th>Iyatanzwe</th>
					<th>Isigaye mu bilo (Kg)</th>
					<th></th>
				</tr>
				</thead>

				<tbody>
				<?php					
					for($n=0; $n<count($coop_pests); $n++){
						$coop_pest = $coop_pests[$n];
						$pesticideId = $coop_pest['pesticideId'];
						// var_dump($coop_pest);
						?>
							<tr>
								<td><?php echo $n+1; ?></td>
								<td><?php echo $coop_pest['name']; ?></td>
								<td><?php echo $coop_pest['quantity']; ?></td>
								<td><?php echo $coop_pest['assigned']; ?></td>
								<td><?php echo $coop_pest['remaining']; ?></td>
								<td><a href="?p=<?php echo $pesticideId; ?>">REBA</a></td>
							</tr>
						<?php
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
<?php
	}
?>
<!-- <div class="md-fab-wrapper ">
	<button class="md-fab md-fab-primary d_inline" id="declare_fertilizer" href="javascript:void(0)" data-uk-modal="{target:'#add_pesticide'}"><i class="material-icons">add</i></button>
</div> -->


<div class="uk-modal" id="add_pesticide" aria-hidden="true" style="display: none; overflow-y: auto;">
	<div class="uk-modal-dialog" style="max-width:800px;">
		<div class="act-dialog" data-role="init">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Menyekanisha umuti</h3>
			</div>
			<form method="POST" enctype="multipart/form-data" id="add_pesticide_form" autocomplete="off">
				<div class="md-card1">
					<div class="md-card-content1">
						<div class="md-input-wrapper md-input-filled">
							<label>Ifumbire</label>
							<select class="md-input label-fixed" id="pest_input" name="state">
								<option value=null>Hitamo</option>
								<?php
									$all_pests = get_pesticides();
									foreach ($all_pests as $key => $fert) {
										$pestname = $fert['name'];
										$fertid = $fert['id'];
										echo '<option value="'.$fertid.'">'.$pestname.'</option>';
									}
								?>
							</select>
						</div>
						<div class="md-input-wrapper">
							<label>Ingano (Kg)</label>
							<input type="number" id="quantity_input" class="md-input" required="required">
							<span class="md-input-bar "></span>
						</div>

						<!-- <div class="md-input-wrapper">
							<label>Itariki yakiriwe</label>
							<input type="number" id="date_input" class="md-input" required="required">
							<span class="md-input-bar"></span>
						</div> -->						
					</div>                        
				</div>
				<div class="uk-modal-footer uk-text-right">
					<button class="md-btn md-btn-danger pull-left uk-modal-close">BIREKE</button>
					<button class="md-btn md-btn-success pull-right" id="create-branch-btn">MENYEKANISHA</button>
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

<div class="uk-modal" id="asign_fertilizer" aria-hidden="true" style="display: none; overflow-y: auto;">
	<div class="uk-modal-dialog" style="max-width:800px;">
		<div class="act-dialog" data-role="init">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Guha <span id="assignee_name"></span> umuti</h3>
			</div>
			<form method="POST" enctype="multipart/form-data" id="assign_pesticide_form" autocomplete="off">
				<div class="md-card1">
					<div class="md-card-content1">
						<div class="md-input-wrapper md-input-filled">
							<label>Umuti</label>
							<?php
								//getting unique
								$choose_pests = array();
								foreach ($coop_pests as $key => $pests) {
									if(empty($choose_pests[$pests['pesticideId']])){
										$choose_pests[$pests['pesticideId']] = $pests['name'];
									}
								}
							?>
							<select class="md-input label-fixed" id="assign_pest_input" name="state">
								<option value=null>Hitamo</option>
								<?php
									//getting unique
									$choose_pests = array();
									foreach ($coop_pests as $key => $pests) {
										if(empty($choose_pests[$pests['pesticideId']])){
											$choose_pests[$pests['pesticideId']] = $pests['name'];
										}
									}
									foreach ($choose_pests as $pestid => $pestname) {
										echo '<option value="'.$pestid.'">'.$pestname.'</option>';
									}
								?>
							</select>
						</div>
						<div class="md-input-wrapper">
							<label>Ingano (Kg)</label>
							<input type="number" id="assign_quantity_input" class="md-input" required="required">
							<span class="md-input-bar "></span>
						</div>
						<input type="hidden" id="assign_member" />					
					</div>                        
				</div>
				<div class="uk-modal-footer uk-text-right">
					<button class="md-btn md-btn-danger pull-left uk-modal-close">BIREKE</button>
					<button class="md-btn md-btn-success pull-right" id="create-branch-btn">TANGA</button>
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
	$js_files = array('js/pesticides.js');
?>
