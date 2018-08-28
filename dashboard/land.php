<?php
	$members = $Cooperative->get_members($current_cooperative);
?>
<div class="uk-grid">
	<div class="uk-width-medium-3-4"><h4 class="heading_a uk-margin-bottom">Ubutaka bwa <?php echo $current_coop_name ?></h4></div>
	<div class="uk-width-medium-1-4"><span><button class="uk-button uk-button-primary" data-uk-modal="{target:'#add_land'}">ONGERAMO</button></span></div>
</div>

<div class="md-card uk-margin-medium-bottom">
	<div class="md-card-content">
		<div class="dt_colVis_buttons"></div>
		<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
			<thead>
			<tr>
				<th>#</th>
				<th>Nyirabwo</th>
				<th>Ubuso</th>
				<th>Kora</th>
			</tr>
			</thead>

			<tbody>
			<?php
				$coop_land = $Cooperative->get_land($current_cooperative);
				for($n=0; $n<count($coop_land); $n++){
					$land = $coop_land[$n];
					?>
						<tr>
							<td><?php echo $n+1; ?></td>
							<td><?php echo $land['ownerName']; ?></td>
							<td><?php echo $land['size']; ?></td>
							<td><a href="?m=" class="md-btn">REBA</a></td>
						</tr>
					<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>

<!-- <div class="md-fab-wrapper ">
	<button class="md-fab md-fab-primary d_inline" id="launch_church_create" href="javascript:void(0)" data-uk-modal="{target:'#church_create'}"><i class="material-icons">add</i></button>
</div> -->


<div class="uk-modal" id="add_land" aria-hidden="true" style="display: none; overflow-y: auto;">
	<div class="uk-modal-dialog" style="max-width:800px;">
		<div class="act-dialog" data-role="init">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Ongera Ubutaka bwa koperative</h3>
			</div>
			<form method="POST" enctype="multipart/form-data" id="add_land_form" autocomplete="off">
				<div class="md-card1">
					<div class="md-card-content1">
						<div class="md-input-wrapper md-input-filled">
							<p>Ubutaka wa:</p>
							<div class="md-form-row">
								<div class="md-input-wrapper">
									<span class="">
										<input type="radio" id="harvest_of_cooperative" class="md-input" name="landOwner" value="cooperative"><label for="harvest_of_cooperative">Koperative</label>
									</span>
									<span class="">
										<input type="radio" id="harvest_of_member" name="landOwner" value="member"><label for="harvest_of_member">Umunyamuryango</label>
									</span>
								</div>
							</div>
						</div>

						<div id="member-additional" class="uk-hidden">
							<div class="md-input-wrapper md-input-filled">
								<div>
									<span>Hitamo Umunyamuryango</span>
									<select id="owner_member_id">
										<option value="">Hitamo</option>
										<?php
											foreach ($members as $key => $member) {
												$member_name = $member['name'];
												$member_id = $member['userId'];
												echo "<option value='$member_id'>$member_name</option>";
											}
										?>
									</select>
								</div>
							</div>
						</div>

						<div class="md-input-wrapper">
							<label>Ikirango (numero y'icyangombwa cyangwa izina ryo kubutandukanya)</label>
							<input type="text" id="name_input" class="md-input" required="required">
							<span class="md-input-bar "></span>
						</div>
						<div class="md-input-wrapper">
							<label>Ingano</label>
							<input type="number" id="size_input" class="md-input" required="required">
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
				<h3 class="d_inline">Kongera ubutaka</h3>
				<p class="uk-text-success">Kongeramo ubutaka byagenze neza :)</p>
			</div>
		</div>
		</div>
	</div>
</div>
<?php
	$js_files = array('js/land.js');
?>
