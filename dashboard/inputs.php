<?php
	//checking if specific fert is to be looked at
	$fert = $_GET['fertilizer']??"";
	if($fert){
		//gather more data on the fertikizer
		$fert_data = get_fertilizer($fert);
		$fert_name = $fert_data['name'];

		//getting fert summary
		$fert_summary = $Cooperative->get_fertilizer($current_cooperative, $fert, current_season());
	}
?>

<div class="uk-grid">
	<div class="uk-width-1-4">
		<h4 class="heading_a uk-margin-bottom">Ifumbire <?php if(!empty($fert_name)) echo " ya <i>$fert_name</i>"; ?> muri <?php echo $current_coop_name ?></h4>
	</div>
	<div class="uk-width-3-4">
		<button class="uk-button uk-button-primary" data-uk-modal="{target:'#add_fertilizer'}">MENYEKANISHA IFUMBIRE</button>
		<!-- <button class="md-fab md-fab-small md-fab-primary d_inline" id="declare_fertilizer" href="javascript:void(0)" data-uk-modal="{target:'#add_fertilizer'}"><i class="material-icons">add</i></button> -->
	</div>
</div>

<div class="md-card uk-margin-medium-bottom">
	<div class="md-card-content">
		<?php			
			if($fert){
					    $fertilizer_summary = $Cooperative->fertilizer_summary($current_cooperative, $fert, current_season());
					?>
					<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handlera hierarchical_show" data-uk-grid-margin>
					    <div>
					        <a href="harvest">
					            <div class="md-card">
					                <div class="md-card-content">
					                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
					                        <i class="material-icons md-color-red md-icon md-color-light-blue-800">spa</i>
					                    </div>
					                    <span class="uk-text-muted uk-text-small">Ifumbire yose</span>
					                    <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $fertilizer_summary['quantity']; ?><noscript><?php echo $fertilizer_summary['quantity']; ?></noscript> kg</span></h2>
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
					                    <span class="uk-text-muted uk-text-small">Ifumbire yatanzwe</span>
					                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $fertilizer_summary['assigned']; ?></noscript></span></h2>
					                </div>
					            </div>
					        </a>
					    </div>
					    <div>
					        <a href="harvest">
					            <div class="md-card">
					                <div class="md-card-content">
					                    <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?php echo $fertilizer_summary['remainingPercentage']; ?>/100</span></div>
					                    <span class="uk-text-muted uk-text-small">Ifumbire isigaye</span>
					                    <h2 class="uk-margin-remove"><span class="countUpMe"><noscript><?php echo $fertilizer_summary['remaining']; ?></noscript></span> kg</h2>
					                </div>
					            </div>
					        </a>
					    </div>
					    <div>
					        <a href="sell">
					            <div class="md-card">
					                <div class="md-card-content">
					                    <div  class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?php echo $fertilizer_summary['remaining']; ?>/100</span></div>
					                    <span class="uk-text-muted uk-text-small">Abahawe ifumbire</span>
					                    <h2 class="uk-margin-remove" id=""><?php echo number_format($fertilizer_summary['remaining']); ?></h2>
					                </div>
					            </div>
					        </a>
					    </div>
					</div>
					<div class="uk-grid">
							
						<div class="uk-width-medium-1-2">
							<div class="md-card uk-margin-medium-bottom">
								<div class="md-card-content">
									<h3 class="md-car-title">Abanyamuryango bahawe ifumbire</h3>
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
											//checking members who go the fertilizer
											$coop_ferts = $Cooperative->members_with_fertilizer($current_cooperative, $fert, current_season());
											for($n=0; $n<count($coop_ferts); $n++){
												$fert_assigned = $coop_ferts[$n];
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
									<h3 class="md-car-title">Abanyamuryango batarahabwa ifumbire</h3>
									<div class="dt_colVis_buttons"></div>
									<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
										<thead>
										<tr>
											<th>#</th>
											<th>Umunyamuryango</th>
											<th>Kora</th>
										</tr>
										</thead>

										<tbody>
										<?php
											$coop_notassigned_ferts = $Cooperative->members_without_fertilizer($current_cooperative, $fert,current_season());
											for($n=0; $n<count($coop_notassigned_ferts); $n++){
												$fert_assigned = $coop_notassigned_ferts[$n];
												?>
													<tr>
														<td><?php echo $n+1; ?></td>
														<td><?php echo $fert_assigned['member_name']; ?></td>
														<td><button class="md-btn assign_fertilizer_btn" data-membername="<?php echo $fert_assigned['member_name']; ?>" data-memberid="<?php echo $fert_assigned['userId']; ?>" data-uk-modal="{target:'#asign_fertilizer'}">TANGA</button></td>
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
					<div class="dt_colVis_buttons"></div>
					<table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>#</th>
							<th>Ubwoko</th>
							<th>Iyakiwe</th>
							<th>Iyatanzwe</th>
							<th>Isigaye mu bilo (Kg)</th>
							<th>Reba</th>
						</tr>
						</thead>

						<tbody>
						<?php
							$fertilizers = get_fertilizers();
							$coop_ferts = $Cooperative->get_fertilizers_summary($current_cooperative);
							for($n=0; $n<count($coop_ferts); $n++){
								$coop_fert = $coop_ferts[$n];
								$coop_fert_id = $coop_fert['fertilizerId'];
								?>
									<tr>
										<td><?php echo $n+1; ?></td>
										<td><?php echo $coop_fert['name']; ?></td>
										<td><?php echo $coop_fert['quantity']; ?></td>
										<td><?php echo $coop_fert['assigned']; ?></td>
										<td><?php echo $coop_fert['remaining']; ?></td>
										<td><a href="?fertilizer=<?php echo $coop_fert_id; ?>">REBA</a></td>
									</tr>
								<?php
							}
						?>
						</tbody>
					</table>
				<?php
			}

		?>
		
	</div>
</div>


<!-- <div class="md-fab-wrapper ">
	<button class="md-fab md-fab-primary d_inline" id="declare_fertilizer" href="javascript:void(0)" data-uk-modal="{target:'#add_fertilizer'}"><i class="material-icons">add</i></button>
</div> -->


<div class="uk-modal" id="add_fertilizer" aria-hidden="true" style="display: none; overflow-y: auto;">
	<div class="uk-modal-dialog" style="max-width:800px;">
		<div class="act-dialog" data-role="init">
			<div class="uk-modal-header uk-tile uk-tile-default">
				<h3 class="d_inline">Menyekanisha ifumbire</h3>
			</div>
			<form method="POST" enctype="multipart/form-data" id="add_fertilizer_form" autocomplete="off">
				<div class="md-card1">
					<div class="md-card-content1">
						<div class="md-input-wrapper md-input-filled">
							<label>Ifumbire</label>
							<select class="md-input label-fixed" id="fert_input" name="state">
								<option value=null>Hitamo</option>
								<?php
									foreach ($fertilizers as $key => $fert) {
										$fertname = $fert['name'];
										$fertid = $fert['id'];
										echo '<option value="'.$fertid.'">'.$fertname.'</option>';
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
				<h3 class="d_inline">Guha <span id="assignee_name"></span> ifumbire</h3>
			</div>
			<form method="POST" enctype="multipart/form-data" id="assign_fertilizer_form" autocomplete="off">
				<div class="md-card1">
					<div class="md-card-content1">
						<div class="md-input-wrapper md-input-filled">
							<label>Ifumbire</label>
							<?php
								$coop_ferts = $Cooperative->get_fertilizers($current_cooperative, current_season());
							?>
							<select class="md-input label-fixed" id="assign_fert_input" name="state">
								<option value=null>Hitamo</option>
								<?php

									foreach ($coop_ferts as $key => $fert) {
										$fertname = $fert['name'];
										$fertid = $fert['fertilizerId'];
										echo '<option value="'.$fertid.'">'.$fertname.'</option>';
									}
								?>
							</select>
						</div>
						<div class="md-input-wrapper">
							<label>Ingano (Kg)</label>
							<input type="number" min="0" id="assign_quantity_input" class="md-input" required="required">
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
	$js_files = array('js/fertilizer.js');
?>
