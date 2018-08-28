<?php include 'header_report.php'; ?>

<?php //include 'chart.php'; ?>
<div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}">
	<div class="uk-width-medium-1-2">
		<div class="md-card">
			<div class="md-card-content">
				<div class="uk-overflow-container">
					<h4>Order alerts</h4>
					<?php
						$coop_harvest = $Cooperative->get_harvest($user_data['cooperativeId']);
					?>
					<table class="uk-table">
						<thead>
							<tr>
								<th class="uk-text-nowrap">Product</th>
								<th class="uk-text-nowrap">Customer</th>
								<th class="uk-text-nowrap">Quantity</th>
								<th class="uk-text-nowrap">Order received</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$coop_harvest = $Cooperative->get_harvest($user_data['cooperativeId']);
								for($n=0; $n<count($coop_harvest); $n++){
									$harvest = $coop_harvest[$n];
									$crop_variety = $harvest['variety'];
							?>
							<tr class="uk-table-middle">
								<td class="uk-width-3-10 uk-text-nowrap"><a href="harvest?id=<?php echo $harvest['cropId']; ?>"><?php echo $harvest['cropName']." $crop_variety"; ?></a></td>
								<td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge"><?php echo number_format($harvest['quantity']); ?></td>
								<td class="uk-width-3-10">
									<?php
										echo number_format( (int)( $Cooperative->current_crop_price($harvest['cropId'])['amount']??0) * ($harvest['quantity']) );
									?>
								</td>
							</tr>
							<?php } ?>
							<!-- <tr class="uk-table-middle">
								<td class="uk-width-3-10 uk-text-nowrap"><a href="page_scrum_board.html">ALTR-82</a></td>
								<td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge uk-badge-warning">Open</span></td>
								<td class="uk-width-3-10">
									<div class="uk-progress uk-progress-mini uk-progress-success uk-margin-remove">
										<div class="uk-progress-bar" style="width: 82%;"></div>
									</div>
								</td>
								<td class="uk-width-2-10 uk-text-right uk-text-muted uk-text-small">21.11.2015</td>
							</tr>
							<tr class="uk-table-middle">
								<td class="uk-width-3-10 uk-text-nowrap"><a href="page_scrum_board.html">ALTR-123</a></td>
								<td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge uk-badge-primary">New</span></td>
								<td class="uk-width-3-10">
									<div class="uk-progress uk-progress-mini uk-margin-remove">
										<div class="uk-progress-bar" style="width: 0;"></div>
									</div>
								</td>
								<td class="uk-width-2-10 uk-text-right uk-text-muted uk-text-small">12.11.2015</td>
							</tr>
							<tr class="uk-table-middle">
								<td class="uk-width-3-10 uk-text-nowrap"><a href="page_scrum_board.html">ALTR-164</a></td>
								<td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge uk-badge-success">Resolved</span></td>
								<td class="uk-width-3-10">
									<div class="uk-progress uk-progress-mini uk-progress-primary uk-margin-remove">
										<div class="uk-progress-bar" style="width: 61%;"></div>
									</div>
								</td>
								<td class="uk-width-2-10 uk-text-right uk-text-muted uk-text-small">17.11.2015</td>
							</tr>
							<tr class="uk-table-middle">
								<td class="uk-width-3-10 uk-text-nowrap"><a href="page_scrum_board.html">ALTR-123</a></td>
								<td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge uk-badge-danger">Overdue</span></td>
								<td class="uk-width-3-10">
									<div class="uk-progress uk-progress-mini uk-progress-danger uk-margin-remove">
										<div class="uk-progress-bar" style="width: 10%;"></div>
									</div>
								</td>
								<td class="uk-width-2-10 uk-text-right uk-text-muted uk-text-small">12.11.2015</td>
							</tr>
							<tr class="uk-table-middle">
								<td class="uk-width-3-10"><a href="page_scrum_board.html">ALTR-92</a></td>
								<td class="uk-width-2-10"><span class="uk-badge uk-badge-success">Open</span></td>
								<td class="uk-width-3-10">
									<div class="uk-progress uk-progress-mini uk-margin-remove">
										<div class="uk-progress-bar" style="width: 90%;"></div>
									</div>
								</td>
								<td class="uk-width-2-10 uk-text-right uk-text-muted uk-text-small">08.11.2015</td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="uk-width-medium-1-2">
		<!-- <div class="md-card">
			<div class="md-card-content">
				<h3 class="heading_a uk-margin-bottom">Statistics</h3>
				<div id="ct-chart" class="chartist"></div>
			</div>
		</div> -->
	</div>
</div>