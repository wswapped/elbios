            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <div class="uk-overflow-container">
                         <div class="row">
                            <div class="col-lg-12">
                             <div class="uk-width-1-1">
                            <button class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#modal_overflow'}">SEND SMSM TO MEMBERS</button>
                            <button class="uk-button uk-button-danger uk-button-large">EXPORT PDF</button>
                            <div id="modal_overflow" class="uk-modal">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <h2 class="heading_a">Fill form to register new member</h2>
                <form id="frm_send_sms">
	            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Message Title</label>
                                        <input id="title" type="text" class="md-input" maxlength="106" required="" />
                                    </div>
                                    <div class="uk-width-medium-1-1">
		                            <select id="select_demo_1" class="md-input">
		                                <option value="" disabled selected hidden>Select...</option>
		                                <optgroup label="Members">
		                                    <option value="all">All members</option>
		                                </optgroup>
		                                <optgroup label="Institutions">
		                                    <option value="a2">ngo</option>
		                                </optgroup>
		                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label>Enter your message Here</label>
                                <textarea cols="30" rows="4" class="md-input"></textarea>
                            </div>
                            <div class="uk-form-row">
                            	<input type="hidden" id="co_id" value="<?php echo $_SESSION['id'];?>">
                                <CENTER><input type="submit" class="uk-button uk-button-primary uk-button-large" value="SEND & SAVE MESSAGE" /></CENTER>
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
                        <table class="uk-table uk-table-nowrap table_check">
                            <thead>
                            <tr>
                                <th class="uk-width-1-10 uk-text-center small_col"><input type="checkbox" data-md-icheck class="check_all"></th>
                                <th class="uk-width-1-10 uk-text-center">User Image</th>
                                <th class="uk-width-2-10">User Name</th>
                                <th class="uk-width-2-10 uk-text-center">Order Number</th>
                                <th class="uk-width-1-10 uk-text-center">Order Date</th>
                                <th class="uk-width-1-10 uk-text-center">Status</th>
                                <th class="uk-width-2-10 uk-text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><img class="md-user-image" src="assets/img/avatars/avatar_01_tn.png" alt=""/></td>
                                    <td>Brandyn Bosco</td>
                                    <td class="uk-text-center">73/2015</td>
                                    <td class="uk-text-center">24-01-2011</td>
                                    <td class="uk-text-center"><span class="uk-badge uk-badge-primary">New</span></td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><img class="md-user-image" src="assets/img/avatars/avatar_02_tn.png" alt=""/></td>
                                    <td>Kolby Abbott</td>
                                    <td class="uk-text-center">8/2015</td>
                                    <td class="uk-text-center">12-11-1970</td>
                                    <td class="uk-text-center"><span class="uk-badge">Accepted</span></td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><img class="md-user-image" src="assets/img/avatars/avatar_03_tn.png" alt=""/></td>
                                    <td>Lysanne Haag</td>
                                    <td class="uk-text-center">44/2015</td>
                                    <td class="uk-text-center">16-06-1975</td>
                                    <td class="uk-text-center"><span class="uk-badge uk-badge-danger">Declined</span></td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><img class="md-user-image" src="assets/img/avatars/avatar_04_tn.png" alt=""/></td>
                                    <td>Keshawn Jast</td>
                                    <td class="uk-text-center">15/2015</td>
                                    <td class="uk-text-center">13-10-1990</td>
                                    <td class="uk-text-center"><span class="uk-badge uk-badge-success">Shipped</span></td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><img class="md-user-image" src="assets/img/avatars/avatar_05_tn.png" alt=""/></td>
                                    <td>Vincenza Emmerich</td>
                                    <td class="uk-text-center">58/2015</td>
                                    <td class="uk-text-center">26-07-2009</td>
                                    <td class="uk-text-center"><span class="uk-badge uk-badge-success">Shipped</span></td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><img class="md-user-image" src="assets/img/avatars/avatar_06_tn.png" alt=""/></td>
                                    <td>Diego Rowe</td>
                                    <td class="uk-text-center">14/2015</td>
                                    <td class="uk-text-center">26-11-1998</td>
                                    <td class="uk-text-center"><span class="uk-badge uk-badge-success">Shipped</span></td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><img class="md-user-image" src="assets/img/avatars/avatar_07_tn.png" alt=""/></td>
                                    <td>Reid Nicolas</td>
                                    <td class="uk-text-center">44/2015</td>
                                    <td class="uk-text-center">28-01-1972</td>
                                    <td class="uk-text-center"><span class="uk-badge">Accepted</span></td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="uk-text-center uk-table-middle small_col"><input type="checkbox" data-md-icheck class="check_row"></td>
                                    <td class="uk-text-center"><img class="md-user-image" src="assets/img/avatars/avatar_08_tn.png" alt=""/></td>
                                    <td>Magnolia Walter</td>
                                    <td class="uk-text-center">90/2015</td>
                                    <td class="uk-text-center">22-09-1981</td>
                                    <td class="uk-text-center"><span class="uk-badge uk-badge-success">Shipped</span></td>
                                    <td class="uk-text-center">
                                        <a href="#"><i class="md-icon material-icons">&#xE254;</i></a>
                                        <a href="#"><i class="md-icon material-icons">&#xE88F;</i></a>
                                    </td>
                                </tr>
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