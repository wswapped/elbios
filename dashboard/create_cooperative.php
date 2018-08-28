<?php
if(!session_id()){
	session_start();
}
if(isset($_POST['name']) && isset($_POST['username'])){
	require 'db.php';
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$category=mysqli_real_escape_string($con,$_POST['category']);
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$user_password=mysqli_real_escape_string($con, $_POST['user_password']);

	//register a user
	$query=mysqli_query($con,"INSERT INTO cooperatives(name,category,status,admin,password) VALUES('$name','$category','PENDING','$username','$user_password')");
	if($query){
		//start session and direct user to dashboard
		session_start();
		$_SESSION['user']=$username;
		$_SESSION['id']=get_co_id();
		echo "1";
	}else{
		die(mysqli_error($con));
	}
}

//function to get the cooperative id
function get_co_id(){
	$id;
	require 'db.php';
	$query=mysqli_fetch_assoc(mysqli_query($con,"SELECT id FROM cooperatives ORDER BY id DESC limit 1"));
	$id=$query['id'];

	return $id;
}
?>


<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

 
<head>
	<?php
		$title = "Create cooperative";
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
						<div class="login_page_info uk-height-1-1" style="background-image: url('assets/img/backgrounds/login_bg.jpg')">
							<div class="info_content">
								<h1 class="heading_b">Ikoranabuhanga rifasha amashyirahamwe</h1>
								Access to future information on how cooperative sells.
								<p>
									<a class="md-btn md-btn-success md-btn-small md-btn-wave" href="javascript:void(0)">More info</a>
								</p>
							</div>
						</div>
					</div>
					<div class="uk-width-large-1-3 uk-width-medium-2-3 uk-container-center">
						<div class="login_page_forms">
							<div id="login_card">
								<div id="register_form" >
									<button type="button" class="uk-position-top-right uk-close uk-margin-right back_to_login"></button>
											
									<?php
										$step = $_GET['step']??"";
										if($step=='1' || $step == ''){
											?>
												<h2 class="heading_a uk-margin-medium-bottom">Kongera koperative mu buryo</h2>
												<form id="frm_register1" class="">
													<div class="form-step" data-step=1>
														<div class="uk-form-row">
															<label for="name">Izina rya koperative</label>
															<input class="md-input" type="text" id="co_name" name="co_name" required="" />
														</div>
														<div class="uk-form-row">
															<label for="username">Ikiranga koperative </label>
															<input class="md-input" type="number" id="co_serial" name="co_serial"/>
															<small>Niba gisanzwe gihari</small>
														</div>
														<input type="hidden" id="step" value="1">
														<p>Aho ihereye</p>
														<div class="uk-form-row">
															<label for="select_province">Intara</label>
															<select id="select_province" name="co_province" class="md-input" required>
																<option value=null>Hitamo</option>
																<?php
																	$provinces = Location::get_provinces();
																	for ($i=0; $i < count($provinces) ; $i++) { 
																		?>
																			<option value="<?php echo $provinces[$i]['provincecode'] ?>"><?php echo $provinces[$i]['provinceizina'] ?></option>
																		<?php
																	}

																?>
															</select>

															<label for="select_district">Akarere</label>
															<select id="select_district" name="co_district" class="md-input" required>
																<option value=null>Hitamo</option>
															</select>

															<label for="select_sector">Umurenge</label>											
															<select id="select_sector" name="co_sector" class="md-input" required>
																<option value=null>Hitamo</option>
															</select>
														</div>

														<div class="uk-margin-medium-top">
															<button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">KOMEZA</button>
														</div> 
													</div>
												</form>
											<?php
										}
										else if($step=='2'){
											?>
												<form id="frm_register2">
													<div class="form-step uk-hiddena" data-step=2>
														<p><span class="uk-text-success">Koperative yawe yongewemo</span><br /><br />Shyiramo umwirondoro wawe</p>
														<div class="uk-form-row">
															<label for="name">Amazina yawe</label>
															<input class="md-input" type="text" id="admin_name"  required="" />
														</div>
														<div class="uk-form-row">
															<label for="username">Igihe wavukiye </label>
															<input class="md-input" type="hidden" id="coopid" value="<?php echo $_SESSION['cooperativeId']??"" ?>"/>
															<input class="md-input" type="date" id="admin_dob" name="co_serial"/>
														</div>

														<div class="uk-form-row">
															<label for="username">Numero y'indangamuntu </label>
															<input class="md-input validateNID" type="number" id="admin_nid" name="co_serial"/>
														</div>

														<div class="uk-form-row">
															<label for="username">Numero ya telephone </label>
															<input class="md-input validatePhone" type="number" id="admin_phone" name="co_serial"/>
														</div>

														<div class="uk-form-row uk-grid">
															<div class="uk-grid-medium-1-2">
									                            <p>
									                                <input type="radio" name="gender" id="radio_demo_1" value="m" data-md-icheck />
									                                <label for="radio_demo_1" class="inline-label">Gabo</label>
									                            </p>
									                        </div>
									                        <div class="uk-grid-medium-1-2">
									                            <p>
									                                <input type="radio" name="gender" id="radio_demo_2" value="f" data-md-icheck />
									                                <label for="radio_demo_2" class="inline-label">Gore</label>
									                            </p>
									                        </div>
								                        </div>


														<input type="hidden" id="step" value="1">
														<p>Aho utuye</p>
														<div class="uk-form-row">
															<label for="select_province">Intara</label>
															<select id="select_province" name="co_province" class="md-input select_province" required>
																<option value=null>Hitamo</option>
																<?php
																	$provinces = Location::get_provinces();
																	for ($i=0; $i < count($provinces) ; $i++) { 
																		?>
																			<option value="<?php echo $provinces[$i]['provincecode'] ?>"><?php echo $provinces[$i]['provinceizina'] ?></option>
																		<?php
																	}

																?>
															</select>

															<label for="select_district">Akarere</label>
															<select id="select_district" name="co_district" class="md-input select_district" required>
																<option disabled style="display: none;"></option>
																<option value=null>Hitamo</option>

															</select>

															<label for="select_sector">Umurenge</label>											
															<select id="select_sector" name="co_sector" class="md-input select_sector" required>
																<option value=null>Hitamo</option>																
															</select>
														</div>
														<div class="uk-form-row">
															<label for="name">Izina ryo kwinjira</label>
															<input class="md-input" type="text" id="username" value="<?php echo $_SESSION['cooperativeUsername']??""; ?>"  required="" />
														</div>
														<div class="uk-form-row">
															<label for="name">Ijambo banga</label>
															<input class="md-input" type="password" id="admin_password"  required="" />
														</div>
														<div class="uk-form-row">
															<label for="name">Subiramo ijambo banga</label>
															<input class="md-input" type="password" id="admin_password2"  required="" />
														</div>
														<div class="uk-margin-medium-top">
															<button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Emeza</button>
														</div>
													</div>
												</form>
											<?php
										}
									?>												
								</div>
							</div>
							<div class="uk-margin-top uk-text-center">
								<a href="access">Injira</a>
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
	<!-- <script src="assets/js/register/index.js"></script> -->
	<!-- uikit functions -->
	<script src="assets/js/uikit_custom.min.js"></script>
	<!-- altair core functions -->
	<script src="assets/js/altair_admin_common.min.js"></script>
<!-- 	<script src="assets/js/login.js"></script> -->
	<script src="assets/js/register.js"></script>
	<!-- altair login page functions -->
	<!-- <script src="assets/js/pages/login.min.js"></script> -->

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