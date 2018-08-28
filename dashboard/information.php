<?php
	$subject_messages  = $Cooperative->get_messages_by_subject($current_cooperative);

?>
<div id="page_heading">
	<!-- <div class="heading_actions uk-visible-large">
		<a href="#" data-uk-tooltip="{pos:'bottom'}" title="Print"><i class="md-icon material-icons">&#xE8AD;</i></a>
		<a href="#" data-uk-tooltip="{pos:'bottom'}" title="Archive"><i class="md-icon material-icons">&#xE149;</i></a>
		<a href="#" data-uk-tooltip="{pos:'bottom'}" title="Spam"><i class="md-icon material-icons">&#xE160;</i></a>
		<a href="#" data-uk-tooltip="{pos:'bottom'}" title="Delete"><i class="md-icon material-icons">&#xE872;</i></a>
		<div data-uk-dropdown>
			<a href="#" data-uk-tooltip="{pos:'top'}" title="Move to"><i class="md-icon material-icons">&#xE2C7;</i></a>
			<div class="uk-dropdown uk-dropdown-small">
				<ul class="uk-nav">
					<li><a href="#">Action</a></li>
					<li><a href="#">Other Action</a></li>
					<li><a href="#">Other Action</a></li>
				</ul>
			</div>
		</div>
	</div> -->
	<div class="heading_actions uk-hidden-large">
		<div data-uk-dropdown>
			<a href="#"><i class="md-icon material-icons">&#xE5D4;</i></a>
			<div class="uk-dropdown uk-dropdown-small">
				<ul class="uk-nav">
					<li><a href="#">Print</a></li>
					<li><a href="#">Archive</a></li>
					<li><a href="#">Spam</a></li>
					<li><a href="#">Delete</a></li>
				</ul>
			</div>
		</div>
		<div data-uk-dropdown>
			<a href="#"><i class="md-icon material-icons">&#xE2C7;</i></a>
			<div class="uk-dropdown uk-dropdown-small">
				<ul class="uk-nav">
					<li><a href="#">Action</a></li>
					<li><a href="#">Other Action</a></li>
					<li><a href="#">Other Action</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php
		//check if there is thread it to be rendered
		$view_thread_id = $_GET['t']??"";
		if($view_thread_id){
			$thread_data = $Message->get_thread($view_thread_id);

			//getting institution data
			$inst_data = $Institution->get($thread_data[0]['institutionId']);
			$inst_name = $inst_data['name'];
			$message_from_image = $inst_data['image'];

			//initial message information to extract the title and who satarted the conversion
			$initial_message_data = $Message->get_message($view_thread_id);
			?>
				<h1><?php echo ucfirst($initial_message_data['subject']); ?></h1>
				<small>Byandikiranwa hamwe ba <i><?php echo $inst_name ?></i></small>
			<?php

		}else{
			?>
				<h1>Ubutumwa n'amakuru</h1>
				<span class="uk-text-muted uk-text-upper uk-text-small"><?php echo count($subject_messages); ?> messages</span>
			<?php
		}
	?>
	
</div>
<div class="uk-clearfix uk-position-relative">
	<aside id="page_aside" class="page_aside md-bg-grey-200">
		<div class="page_aside_inner">
			<ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav="{multiple:true}">
				<li class="uk-active"><a href="?part=inst"><i class="material-icons">&#xE0E1;</i>Ibigo</a></li>
				<li><a href="?part=mem"><i class="material-icons">&#xE151;</i>Abanyamuryango</a></li>
				<li class="uk-nav-divider"></li>
				<li class="uk-nav-header"><!-- 	 --></li>
				<li><a href="#"><span class="uk-nav-label md-bg-orange-500"></span>Ubutarasomwa</a></li>
				<li><a href="#"><span class="uk-nav-label md-bg-green-500"></span>Ubutarasubizwa</a></li>
				<!-- <li><a href="#"><span class="uk-nav-label md-bg-red-500"></span>Important</a></li>
				<li><a href="#"><span class="uk-nav-label md-bg-blue-500"></span>TODO</a></li> -->
			</ul>
		</div>
		<div class="page_aside_toggle"></div>
	</aside>
	<div id="page_overflow">
		<div class="uk-overflow-container">
			<?php
				
				if($view_thread_id){
					//getting thread's data
					if($thread_data){
						?>
							<div class="uk-section">
							 	<div class="uk-container uk-width-large">

								<div class="uk-card uk-card-default uk-border-rounded uk-margin-large-top">

								  <div class="uk-card-body uk-padding-small">
								  	<?php
								  		foreach ($thread_data as $key => $thread_msg) {
								  			$writtenBy = $thread_msg['writtenBy'];

								  			if($writtenBy == 'cooperative'){
								  				//getting cooperative data
								  				$party_image = $current_coop_image; #defined from index
								  				$party_name = $current_cooperative_name; #defined from index
								  			}else{
								  				$party_image = $message_from_image;
								  				$party_name = $inst_name;
								  			}

								  			?>
								  				<div class="uk-grid-small message-box-cont <?php echo $writtenBy == 'cooperative'?'me':'guest'; ?>" style="margin-bottom: 12px" uk-grid>
								  					<div>
								  						<img class="uk-border-circle" width="32" height="32" src="/<?php echo $party_image; ?>">
								  						<span><b><?php echo $party_name; ?></b></span>
								  					</div>
								  					
												  	<p class="">
												  		
												  		<span><?php echo $thread_msg['message']; ?></span>
												  	</p>
												  	<small><i><?php echo date("d M Y H:i", strtotime($thread_msg['createdDate'])) ?></i></small>
												</div>
												<div class="uk-clearfix"></div>
								  			<?php
								  		}

								  	?>
								<div class="uk-clearfix"></div>

								<div class="mt-5" style="margin-top: 50px;">
									<textarea class="uk-textarea" rows="4" id="reply-message-box" placeholder="Subiza ubutumwa"></textarea>
									<button class="uk-button uk-button-success" id="reply-message" data-thread='<?php echo $view_thread_id; ?>'>OHEREZA</button>
								</div>

								</div>

							  </div>
							</div>
						<?php
					}else{
						echo "<p class='uk-text-danger'>Thread does not exist or we have error in our application <a href='/'>Go Back</a></p>";
					}

				}else{
			?>
				<table class="uk-table uk-table-nowrap uk-table-hover md-bg-white" id="mailboxV2">
					<tbody>
						<?php
							foreach ($subject_messages as $key => $message) {
								$inst_data = $Institution->get($message['institutionId']);
								$msg = $message['initial_message'];
								?>
									<tr class="table-row">
										<!-- <td><input type="checkbox" name="checkbox_" id="checkbox_" data-md-icheck /></td> -->
										<td><a href="?t=<?php echo $message['threadId']; ?>" class=""><?php echo $inst_data['name']; ?></a></td>
										<td><?php echo $msg['subject']; ?></td>
										<td><?php echo date("d/m/Y H:i", strtotime($msg['createdDate'])) ?></td>
									</tr>
								<?php
							}
						?>
						
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>
</div>

<div class="md-fab-wrapper">
	<a class="md-fab md-fab-accent md-fab-wave" href="#mailbox_new_message" data-uk-modal="{center:true}">
		<i class="material-icons">add</i>
	</a>
</div>

<div class="uk-modal" id="mailbox_new_message">
	<div class="uk-modal-dialog">
		<button class="uk-modal-close uk-close" type="button"></button>
		<form>
			<div class="uk-modal-header">
				<h3 class="uk-modal-title">Compose Message</h3>
			</div>
			<div class="uk-margin-medium-bottom">
				<label for="mail_new_to">To</label>
				<input type="text" class="md-input" id="mail_new_to"/>
			</div>
			<div class="uk-margin-large-bottom">
				<label for="mail_new_message">Message</label>
				<textarea name="mail_new_message" id="mail_new_message" cols="30" rows="6" class="md-input"></textarea>
			</div>
			<div id="mail_upload-drop" class="uk-file-upload">
				<p class="uk-text">Drop file to upload</p>
				<p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
				<a class="uk-form-file md-btn">choose file<input id="mail_upload-select" type="file"></a>
			</div>
			<div id="mail_progressbar" class="uk-progress uk-hidden">
				<div class="uk-progress-bar" style="width:0">0%</div>
			</div>
			<div class="uk-modal-footer">
				<a href="#" class="md-icon-btn"><i class="md-icon material-icons">&#xE226;</i></a>
				<button type="button" class="uk-float-right md-btn md-btn-flat md-btn-flat-primary">Send</button>
			</div>
		</form>
	</div>
</div>
<?php
	$js_files = array('assets/js/pages/page_mailbox_v2.min.js', 'js/information.js');
?>
