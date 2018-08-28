<header id="header_main">
	<div class="header_main_content">
		<nav class="uk-navbar">
							
			<!-- main sidebar switch -->
			<a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
				<span class="sSwitchIcon"></span>
			</a>
			
			<!-- secondary sidebar switch -->
				<!-- <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
					<span class="sSwitchIcon"></span>
				</a> -->
			
				<!-- <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small">
					<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
						<a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
						<div class="uk-dropdown uk-dropdown-width-3">
							<div class="uk-grid uk-dropdown-grid">
								<div class="uk-width-2-3">
									<div class="uk-grid uk-grid-width-medium-1-3 uk-margin-bottom uk-text-center">
										<a href="page_mailbox.html" class="uk-margin-top">
											<i class="material-icons md-36 md-color-light-green-600">&#xE158;</i>
											<span class="uk-text-muted uk-display-block">Mailbox</span>
										</a>
										<a href="page_invoices.html" class="uk-margin-top">
											<i class="material-icons md-36 md-color-purple-600">&#xE53E;</i>
											<span class="uk-text-muted uk-display-block">Invoices</span>
										</a>
										<a href="page_chat.html" class="uk-margin-top">
											<i class="material-icons md-36 md-color-cyan-600">&#xE0B9;</i>
											<span class="uk-text-muted uk-display-block">Chat</span>
										</a>
										<a href="page_scrum_board.html" class="uk-margin-top">
											<i class="material-icons md-36 md-color-red-600">&#xE85C;</i>
											<span class="uk-text-muted uk-display-block">Scrum Board</span>
										</a>
										<a href="page_snippets.html" class="uk-margin-top">
											<i class="material-icons md-36 md-color-blue-600">&#xE86F;</i>
											<span class="uk-text-muted uk-display-block">Snippets</span>
										</a>
										<a href="page_user_profile.html" class="uk-margin-top">
											<i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
											<span class="uk-text-muted uk-display-block">User profile</span>
										</a>
									</div>
								</div>
								<div class="uk-width-1-3">
									<ul class="uk-nav uk-nav-dropdown uk-panel">
										<li class="uk-nav-header">Components</li>
										<li><a href="components_accordion.html">Accordions</a></li>
										<li><a href="components_buttons.html">Buttons</a></li>
										<li><a href="components_notifications.html">Notifications</a></li>
										<li><a href="components_sortable.html">Sortable</a></li>
										<li><a href="components_tabs.html">Tabs</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div -->
			
			<div class="uk-navbar-flip">
				<?php
					$messages = $Cooperative->get_recent_received_messages($current_cooperative, 3);
				?>
				<ul class="uk-navbar-nav user_actions">
					<li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
					<li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
					<li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
						<a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge"><?php echo count($messages); ?></span></a>
						<div class="uk-dropdown uk-dropdown-xlarge">
							<div class="md-card-content">
								
								<ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
									<li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Ubutumwa (<?php echo count($messages); ?>)</a></li>
									<li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Amamenyesha (0)</a></li>
								</ul>
								<ul id="header_alerts" class="uk-switcher uk-margin">
									<li>
										<ul class="md-list md-list-addon"> 
											<?php
												foreach ($messages as $thread_id => $message) {
													$intro_message = $message['initial_message'];
													$inst_data = $Institution->get($message['institutionId']);
													$inst_name = $inst_data['name'];
													?>
													<li>
														<div class="md-list-addon-element">
															<!-- <span class="md-user-letters md-bg-cyan">yh</span> -->
															<img class="md-user-image md-list-addon-avatar" src="/<?php echo $inst_data['image']; ?>" alt="Institution logo"/>
														</div>
														<div class="md-list-content">
															<span class="md-list-heading"><?php echo $inst_name; ?></span>
															<span class="uk-text-small uk-text-muted"><?php echo $intro_message['subject']; ?></span>
														</div>
													</li>
													<?php
												}

											?>
										</ul>
										<div class="uk-text-center uk-margin-top uk-margin-small-bottom">
											<a href="information" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Erekana byose</a>
										</div>
									</li>
									<li>
										<ul class="md-list md-list-addon">                                                
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
						<a href="#" class="user_action_image"><img class="md-user-image" src="/<?php echo $current_user_pic; ?>" style="height: 40px;" alt=""/></a>
						<div class="uk-dropdown uk-dropdown-small">
							<ul class="uk-nav js-uk-prevent">
								<li><a href="page_user_profile.html">Imyirondo yanjye</a></li>
								<!-- <li><a href="page_settings.html"></a></li> -->
								<li><a href="logout">Gusohokamo</a> </li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<!-- <div class="header_main_search_form">
		<i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
		<form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
			<input type="text" class="header_main_search_input" />
			<button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
			<script type="text/autocomplete">
				<ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
					{{~items}}
					<li data-value="{{ $item.value }}">
						<a href="{{ $item.url }}" class="needsclick">
							{{ $item.value }}<br>
							<span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>
						</a>
					</li>
					{{/items}}
					<li data-value="autocomplete-value">
						<a class="needsclick">
							Autocomplete Text<br>
							<span class="uk-text-muted uk-text-small">Helper text</span>
						</a>
					</li>
				</ul>
			</script>
		</form>
	</div> -->
</header>