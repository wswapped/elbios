<?php
	//CHECK THE users
	$user = $_GET['user']??"";

	//check if the user aint set
	include_once '../conn.php';
    include_once '../functions.php';
    require '../core/user.php';

    if(!$user){
    	header("location:/win");
    	die();
    }

    //check the details
    $userDetails = $User->details($user);
    $userNames = $userDetails['names'];

    if(!$userDetails){
    	header("location:/win");
    	die();
    }

    if($userDetails['password']){
    	header("location:/win");
    	die();
    }

    //password can be set and profile picture	    
?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../logo.png">
<title>elbios</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">

<!-- Dropify -->
<link rel="stylesheet" href="../plugins/bower_components/dropify/dist/css/dropify.min.css">

<!-- color CSS -->
<link href="css/colors/default.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Welcome to elbios WMS</h1>
			<p>Thank you for accepting our invitation to working together</p>
			<p>Please set up your account here</p>
		</div>
	</div>
</section>
<section id="wrapper" class="login-register">
	<div class="login-box">
		<div class="white-box">
			<form class="form-horizontal form-material" id="setupForm" method="POST" action="" enctype="multipart/form-data">
				<div class="text-danger" id="loginErrors"></div>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
						//check submission
						$password = $_POST['password'];

						if(!empty($_FILES['picture'])){
							$profileFile = $_FILES['picture'];
							$ext = pathinfo($profileFile['name'], PATHINFO_EXTENSION);

							$pictureName = strtolower('/images/users/'.str_ireplace(" ", "_", $userNames).time().".$ext");

							if(move_uploaded_file($profileFile['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$pictureName)){
								echo "<p class='text-success'>Profile picture setup successfully</p>";

								$User->updatePassword($user, $password);
								$User->updateProfilePicture($user, $pictureName);

								header('location:win');
							};
						}
					}
				?>
				<div class="form-group">
					<div class="col-xs-12 text-center">
						<div class="user-thumb text-center">
							<label>Profile picture</label>
                			<input type="file" id="input-file-now-custom-2" class="dropify img-circle" data-height="100" name="picture" required />
							<!-- <img alt="thumbnail" class="img-circle" width="100" src="../plugins/images/users/genu.jpg"> -->
							<h3><?php echo $userDetails['names']; ?></h3>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<div class="col-xs-12">
						<input class="form-control" type="password" id="password" name="password" required="" placeholder="Password">
					</div>
				</div>
				<div class="form-group ">
					<div class="col-xs-12">
						<input class="form-control" type="password" id="rpassword" required="" placeholder="Repeat password">
					</div>
				</div>
				<div class="form-group text-center">
					<div class="col-xs-12">
						<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Setup</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- jQuery -->
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<script src="../plugins/bower_components/dropify/dist/js/dropify.min.js"></script>


<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
	$(document).ready(function() {
	    // Basic
	    $('.dropify').dropify();
	    // Translated
	    $('.dropify-fr').dropify({
	        messages: {
	            default: 'Glissez-déposez un fichier ici ou cliquez',
	            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
	            remove: 'Supprimer',
	            error: 'Désolé, le fichier trop volumineux'
	        }
	    });
	    // Used events
	    var drEvent = $('#input-file-events').dropify();
	    drEvent.on('dropify.beforeClear', function(event, element) {
	        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
	    });
	    drEvent.on('dropify.afterClear', function(event, element) {
	        alert('File deleted');
	    });
	    drEvent.on('dropify.errors', function(event, element) {
	        console.log('Has Errors');
	    });
	    var drDestroy = $('#input-file-to-destroy').dropify();
	    drDestroy = drDestroy.data('dropify')
	    $('#toggleDropify').on('click', function(e) {
	        e.preventDefault();
	        if (drDestroy.isDropified()) {
	            drDestroy.destroy();
	        } else {
	            drDestroy.init();
	        }
	    })
	});
</script>
<script type="text/javascript">
	$("#setupForm").on('submit', function(e){

		//emptying the errors
		$("#loginErrors").html('')

		//check password
		var password = $("#password").val()
		var rpassword = $("#rpassword").val()

		if(password.toString().length>=8){
			//check if passwords are same
			if(password == rpassword){
				//form can be submitted
				return true;
			}else{
				//passwords does not match
				$("#loginErrors").append('Passwords does not match');
				return false;
			}
		}else{
			//the password is too short
			$("#loginErrors").append('Passwords is too short, enter at least 8 characters');
			return false;
		}
	})
</script>
</body>
</html>
