            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <div class="uk-overflow-container">
                         <div class="row">
                            <div class="col-lg-12">
                             <div class="uk-width-1-1">
                            <button class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
                        </div>
                        </div>
                    </div>
                    <?php
						include 'Sensor.php';
						$data=array();
						$data = $sensor->get_sensors();
						?>
                        <table class="uk-table uk-table-nowrap table_check">
                            <thead>
                            <tr>
                                <th class="uk-width-1-10 uk-text-center small_col"><input type="checkbox" data-md-icheck class="check_all"></th>
                                <th class="uk-width-1-10 uk-text-center">DeviceId</th>
                                <th class="uk-width-2-10">Ground Moisture</th>
                                <th class="uk-width-2-10 uk-text-center">Ground Temperature</th>
                                <th class="uk-width-1-10 uk-text-center">Air Moisture</th>
                                <th class="uk-width-1-10 uk-text-center">Air Temperature</th>
                                <th class="uk-width-1-10 uk-text-center">Field Status</th>
                                <th class="uk-width-2-10 uk-text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
						<?php
						foreach ($data as $key => $value) {
							?>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><?php echo $value['device_id']; ?></td>
                                    <td><?php echo $value['field1']; ?></td>
                                    <td class="uk-text-center"><?php echo $value['field2']; ?></td>
                                    <td class="uk-text-center"><?php echo $value['field3']; ?></td>
                                    <td class="uk-text-center"><?php echo $value['field4']; ?></td>
                                    <td class="uk-text-center">
                                    	<div class="uk-card uk-card-primary" style="background: #2B6ECE;color:#fff;padding: 10px;border-radius: 10px;">
                                    		<?php echo $sensor->predict_ground_moisture($value['field1'],$value['field2'],$value['field4'],$value['field3'],$_SESSION['id']); ?>
                                    	</div>
                                    </td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
							<?php
						}
                    ?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="uk-pagination uk-margin-medium-top">
                        <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                        <li class="uk-active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><span>&hellip;</span></li>
                        <li><a href="#">10</a></li>
                        <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div>