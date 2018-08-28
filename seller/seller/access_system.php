
<!DOCTYPE html>
<html lang="en">
<?php include 'utils/login_header.php'; ?>
<body>
    <div style="display: block;" class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/login_bg.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="frm_login" action="" method="POST">
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" id="email" name="password" type="text" required="" placeholder="Email Here"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><!-- <i class="fa fa-lock m-r-5"></i> --> Forgot pwd?</a> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <center id="loader" style="display: none;">
                                        <i class="fa fa-spinner fa-spin fa-5x"></i>
                                        <sub>Mutegereze gato....</sub>
                                    </center>
                                </p>
                                <p id="errors" style="padding: 10px;color: #fff;border-radius: 10px;background: #dd4422;display: none;">
                                    
                                </p>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div>Don't have an account? <a href="register" class="text-info m-l-5"><b>Sign Up</b></a></div>
                            </div>
                        </div>
                    </form>
                    <?php include 'utils/forget_password.php'; ?>
                </div>
            </div>
        </div>
    </section>
        <!-- Scripts -->
    <?php include 'utils/scripts.php'; ?>
    <?php include 'utils/my_scripts.php'; ?>
</body>

</html>