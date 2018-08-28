<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

 
<head>
	<?php
		$title = "Login";
		include_once '../conn.php';
		include_once 'scripts/head.php';
		include_once 'core/location.php';
	?>
	<!-- altair admin login page -->
	<link rel="stylesheet" href="assets/css/login_page.min.css" />
</head>
<body class="login_page login_page_v2">

	<div class="uk-container uk-container-center">
		<div class="md-card">
			<div class="md-card-content padding-reset">
				<div class="uk-grid uk-grid-collapse">
					<div class="uk-width-large-2-3 uk-hidden-medium uk-hidden-small">
						<div class="login_page_info uk-height-1-1" style="background-image: url('../images/profile.jpg')">
							<div class="info_content">
								<h1 class="heading_b">Intelligent Warehouse</h1>
								<span><i>A blend of advanced technologies for warehouse flexibility and automation</i></span>
								<!-- <p>
									<a class="md-btn md-btn-success md-btn-small md-btn-wave" href="javascript:void(0)">More info</a>
								</p> -->
							</div>
						</div>
					</div>
					<div class="uk-width-large-1-3 uk-width-medium-2-3 uk-container-center">
						<div class="login_page_forms">
							<div id="login_card">
								<div id="login_form">
									<div class="login_heading">
										<div class="user_avatar"></div>
									</div>
									<form id="frm_login">
										<div class="md-input-wrapper md-input-filled">
											<label for="login_username">Username</label>
											<input class="md-input label-fixed" type="text" id="login_username" name="login_username" required="" />
										</div>
										<div class="uk-form-row md-input-wrapper md-input-filled">
											<label for="login_password">Password</label>
											<input class="md-input label-fixed" type="password" id="login_password" name="login_password" required="" />
										</div>
										<div class="uk-margin-medium-top">
											<button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
											<center>
												<p>
													<img id="login_loader" src="https://loading.io/spinners/pies/lg.pie-chart-loading-gif.gif" style="width:120px;height: auto;display: none;">
												</p>
												<p id="login_errors" style="padding: 10px;border-radius: 10px;color: #fff;background: #dd4422;display: none;">Login error</p>
											</center>
										</div>
										<div class="uk-margin-top">
											<a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
											<span class="icheck-inline">
												<input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
												<label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
											</span>
										</div>
									</form>
								</div>
								<div class="uk-position-relative" id="login_help" style="display: none">
									<button type="button" class="uk-position-top-right uk-close uk-margin-right back_to_login"></button>
									<h2 class="heading_b uk-text-success">Can't log in?</h2>
									<p>Here’s the info to get you back in to your account as quickly as possible.</p>
									<p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
									<p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
								</div>
								<div id="login_password_reset" style="display: none">
									<button type="button" class="uk-position-top-right uk-close uk-margin-right back_to_login"></button>
									<h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
									<form>
										<div class="uk-form-row">
											<label for="login_email_reset">Your email address</label>
											<input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
										</div>
										<div class="uk-margin-medium-top">
											<a href="index-2.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
										</div>
									</form>
								</div>
							</div>
							<div class="uk-margin-top uk-text-center">
								<!-- <a href="#" id="signup_form_show">Create an account</a> -->
								<a href="create_cooperative.php">Create an account</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script type="text/javascript">
		var api_link  = "../api/index.php";
	</script>

	<!-- common functions -->
	<script src="assets/js/common.min.js"></script>
	<!-- scripts -->
	<script src="assets/js/register/index.js"></script>
	<!-- uikit functions -->
	<script src="assets/js/uikit_custom.min.js"></script>
	<!-- altair core functions -->
	<script src="assets/js/altair_admin_common.min.js"></script>
	<script src="assets/js/login.js"></script>
	<script src="assets/js/register.js"></script>
	<!-- altair login page functions -->
	<script src="assets/js/pages/login.min.js"></script>

	<script>
		// check for theme
		if (typeof(Storage) !== "undefined") {
			var root = document.getElementsByTagName( 'html' )[0],
				theme = localStorage.getItem("altair_theme");
			if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
				root.className += ' app_theme_dark';
			}
		}
	</script>

</body>
</html>