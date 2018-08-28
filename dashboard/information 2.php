<?php  ?>
        <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <div class="uk-overflow-container">
                         <div class="row">
                            <div class="col-lg-12">
                             <div class="uk-width-1-1">
                            <button class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#modal_overflow'}">ADD NEW COOPERATIVE MEMBER</button>
                            <button class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
                            <div id="modal_overflow" class="uk-modal">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <h2 class="heading_a">Fill form to register new member</h2>
                <form id="frm_reg_member">
	            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Member FirstName</label>
                                        <input id="firstname" type="text" class="md-input" maxlength="106" required="" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Member lastname</label>
                                        <input id="lastname" type="text" class="md-input" maxlength="106" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label>ID Number</label>
                                <input id="id_number" type="number" class="md-input" maxlength="16" required="" />
                            </div>
                            <div class="uk-form-row">
                                <label>Phone number</label>
                                <input id="phone" type="number" class="md-input" maxlength="16" required="" />
                            </div>
                            <div class="uk-form-row">
                                <label>Residence Address</label>
                                <input id="residence" type="text" class="md-input" maxlength="56" required="" />
                            </div>
                            <div class="uk-form-row">
                            	<input type="hidden" id="co_id" value="<?php echo $_SESSION['id'];?>">
                                <CENTER><input type="submit" class="uk-button uk-button-primary uk-button-large" value="SAVE MEMBER INFO" /></CENTER>
                                <p>
                                	<center><img id="loading" src="assets/img/loading.gif" style="width: 100px;height:auto;display: none;"></center>
                                </p>
                                <p id="errors" style="background: #dd4422;color: #fff;border-radius: 10px;padding: 10px;display: none;">test error</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</form>
                                </div>
                            </div>
                        </div>
                                        </div>
                                    </div>
                    <?php
                    require 'db.php';
                    include 'Cooperative.php';
                    //check if cooperative have members
                    $check=$cooperative->members_exist($_SESSION['id']);
                    if($check){
                    	//members are available
                    	?>
                        <table class="uk-table uk-table-nowrap table_check">
                            <thead>
                            <tr>
                                <th class="uk-width-1-10 uk-text-center small_col"><input type="checkbox" data-md-icheck class="check_all"></th>
                                <th class="uk-width-1-10 uk-text-center">User Image</th>
                                <th class="uk-width-2-10">FirstName</th>
                                <th class="uk-width-2-10 uk-text-center">LastName</th>
                                <th class="uk-width-1-10 uk-text-center">ID NUMBER</th>
                                <th class="uk-width-1-10 uk-text-center">phone</th>
                                <th class="uk-width-2-10 uk-text-center">status</th>
                                <th class="uk-width-2-10 uk-text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                    	<?php
					$members=array();
					$members=$cooperative->get_members($_SESSION['id']);
					$counter=0;
					foreach ($members as $key => $value) {
						?>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center">
                                    	<?php
                                    	if(($counter%2)==0){
                                    		?>
                                    		<span style="border-radius: 50%;font-size: 1.5em;padding: 15px;" class="uk-badge uk-badge-primary"><?php echo substr($value['f_name'],0,1); ?></span>
                                    		<?php
                                    	}else{
                                    		?>
                                    		<span style="border-radius: 50%;font-size: 1.5em;padding: 15px;" class="uk-badge uk-badge-danger"><?php echo substr($value['f_name'],0,1); ?></span>
                                    		<?php	
                                    	}
                                    	$counter=$counter+1; 
                                    	?>
                                    	
                                    </td>
                                    <td><?php echo $value['f_name']; ?></td>
                                    <td class="uk-text-center"><?php echo $value['l_name']; ?></td>
                                    <td class="uk-text-center"><?php echo $value['id_number']; ?></td>
                                    <td class="uk-text-center"><?php echo $value['phone']; ?></td>
                                    <td class="uk-text-center"><span class="uk-badge uk-badge-primary"><?php echo $value['status']; ?></span></td>
                                    <td class="uk-text-center">
                                        <a class="icon_edit" data-uk-modal="{target:'#modal_overflow'}" data="<?php echo $value['id']; ?>"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
						<?php
					}
					
					?>
                    </tbody>
                </table
					<?php
                    }else{
                    	echo "no members available now";
                    }
                    ?>
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
            <script src="assets/js/common.min.js"></script>
            <script src="assets/js/information/register.js"></script>