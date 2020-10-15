<?php
$setting = App\SmGeneralSettings::find(1);
if(isset($setting->copyright_text)){ $copyright_text = $setting->copyright_text; }else{ $copyright_text = 'Copyright © 2020 All rights reserved | This template is made with by Codethemes'; }
if(isset($setting->logo)) { $logo = $setting->logo; } else{ $logo = 'public/uploads/settings/logo.png'; }
if(isset($setting->favicon)) { $favicon = $setting->favicon; } else{ $favicon = 'public/backEnd/img/favicon.png'; }
$login_background = App\SmBackgroundSetting::where([['is_default',1],['title','Login Background']])->first(); 
$active_style = App\SmStyle::where("school_id", 1)->where('is_active', 1)->first();
if(empty($login_background)){
    $css = "background: url(".url('public/backEnd/img/login-bg.jpg').")  no-repeat center; background-size: cover; ";
}else{
    if(!empty($login_background->image)){
        $css = "background: url('". url($login_background->image) ."')  no-repeat center;  background-size: cover;";
 
    }else{
        $css = "background:".$login_background->color;
    }
} 
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset($favicon)); ?>" type="image/png"/>
    <title>Login</title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/themify-icons.css" />
	    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/nice-select.css" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/select2/select2.css" />
	<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/toastr.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/saas/')); ?>/css/<?php echo e($active_style->path_main_style); ?>" />
</head>
<body class="login admin hight_100"  style=" <?php if($active_style->id==1): ?> <?php echo e($css); ?> <?php endif; ?> ">
<style>
	@media (max-width: 991px){
		.login.admin.hight_100 .login-height .form-wrap {
			padding: 50px 8px;
		}
		.login-area .login-height {
			min-height: auto;
		}
	}
	body{
		height: 100%;  
	}
	hr{
		background: linear-gradient(90deg, #7c32ff 0%, #c738d8 51%, #7c32ff 100%) !important;
    	height: 1px !important;
	}
	.invalid-select strong{
		font-size: 11px !important;
	}
</style>

    <!--================ Start Login Area =================-->
	<section class="login-area up_login">
 
		<div class="container">

			<?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
		 
			<div class="row mt-40">

				<?php 
					$users1 = App\User::where('role_id',1)->where('school_id', 1)->first();
					$email = @$users1->email;
					$password="123456";
				?>
					<?php if($users1): ?>
						<div class="col-md-3 mt-40">
							<h4 class="text-center text-white">System Admin</h4>
							<hr>
							<form method="POST" class="" action="<?php echo e(route('login')); ?>">
								<?php echo csrf_field(); ?>
								<input type="hidden" class=" small form-control mt-10" name="school_id" value="1" readonly="true" required>
								<input type="hidden" class="form-control mt-10" name="email" value="<?php echo e(@$email); ?>">
								<input type="hidden" class="form-control mt-10" name="password" value="<?php echo e($password); ?>">
								<input type="submit" class="primary-btn fix-gr-bg  mt-10 pull-right text-center col-lg-12" name="login" value="Super Admin Login">
							</form>

						</div>
					<?php endif; ?>

					<?php 
						$users1 = App\User::where('role_id', 1)->where('school_id', 2)->first();
						$email = @$users1->email;
						$password="123456";
					?>
					<?php if($users1): ?>
						<div class="col-md-3 mt-40">
							<h4 class="text-center text-white">School 2</h4>
							<hr>
							<form method="POST" class="" action="<?php echo e(route('login')); ?>">
								<?php echo csrf_field(); ?>
								<input type="hidden" class=" small form-control mt-10" name="school_id" value="2" readonly="true" required>
								<input type="hidden" class=" small form-control mt-10" name="email" value="<?php echo e(@$email); ?>" readonly="true" required>
								<input type="hidden" class="form-control mt-10" name="password" value="<?php echo e($password); ?>" readonly>
								<input type="submit" class="primary-btn fix-gr-bg  mt-10 pull-right text-center col-lg-12" name="login" value="Login">
							</form> 
						</div>
					<?php endif; ?>




					<?php 
						$users1 = App\User::where('role_id', 1)->where('school_id', 3)->first();
						$email = @$users1->email;
						$password="123456";
					?>
					<?php if($users1): ?> 
						<div class="col-md-3 mt-40">
							<h4 class="text-center text-white">School 3</h4>
							<hr> 
							<form method="POST" class="" action="<?php echo e(route('login')); ?>">
								<?php echo csrf_field(); ?>
								<input type="hidden" class=" small form-control mt-10" name="school_id" value="3" readonly="true" required>
								<input type="hidden" class=" small form-control mt-10" name="email" value="<?php echo e(@$email); ?>" readonly="true" required>
								<input type="hidden" class="form-control mt-10" name="password" value="<?php echo e($password); ?>" readonly>
								<input type="submit" class="primary-btn fix-gr-bg  mt-10 pull-right text-center col-lg-12" name="login" value="Login">
							</form> 
						</div>
					
					<?php endif; ?>


					<?php 
						$users1 = App\User::where('role_id', 1)->where('school_id', 4)->first();
						$email = @$users1->email;
						$password="123456";
					?>
					<?php if($users1): ?> 
						<div class="col-md-3 mt-40">
							<h4 class="text-center text-white">School 4</h4>
							<hr>

							<form method="POST" class="" action="<?php echo e(route('login')); ?>">
								<?php echo csrf_field(); ?>
								<input type="hidden" class=" small form-control mt-10" name="school_id" value="3" readonly="true" required>
								<input type="hidden" class=" small form-control mt-10" name="email" value="<?php echo e(@$email); ?>" readonly="true" required>
								<input type="hidden" class="form-control mt-10" name="password" value="<?php echo e($password); ?>" readonly>
								<input type="submit" class="primary-btn fix-gr-bg  mt-10 pull-right text-center col-lg-12" name="login" value="Login">
							</form>

						</div>
					<?php endif; ?>
			</div>
			<?php endif; ?>


			<input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
			<div class="row login-height justify-content-center align-items-center">
				<div class="col-lg-5 col-md-8">
					<div class="form-wrap text-center">
						<div class="logo-container">
							<a href="<?php echo e(url('/')); ?>"> 
								<img src="<?php echo e(asset(@$setting->logo)); ?>" alt="" class="logoimage">
							</a>
						</div>

						<h5 class="text-uppercase">Login Details</h5>

						<?php if(session()->has('message-success') != ""): ?>
		                    <?php if(session()->has('message-success')): ?>
		                    <p class="text-success"><?php echo e(session()->get('message-success')); ?></p>
		                    <?php endif; ?>
		                <?php endif; ?>
		                <?php if(session()->has('message-danger') != ""): ?>
		                    <?php if(session()->has('message-danger')): ?>
		                    <p class="text-danger"><?php echo e(session()->get('message-danger')); ?></p>
		                    <?php endif; ?>
		                <?php endif; ?>
						<form method="POST" class="" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        	<div class="form-group input-group mb-4 mx-3">
								<div class="input-effect">
                                        <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('school_id') ? ' is-invalid' : ''); ?>" name="school_id" id="select-school">
                                            <option data-display="Select School *" value="">Select school *</option>
                                            <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school->id); ?>"> <?php echo e($school->school_name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <?php if($errors->has('school_id')): ?>
                                    <span class="invalid-select text-left text-danger pl-3" role="alert">
                                        <strong><?php echo e($errors->first('school_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>
							<input type="hidden" name="username" id="username-hidden">



							<div class="form-group input-group mb-4 mx-3">
								<span class="input-group-addon">
									<i class="ti-email"></i>
								</span>
								<input class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="text" name='email' id="email-address" placeholder="Enter Email address"/>
								<?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>

							<div class="form-group input-group mb-4 mx-3">
								<span class="input-group-addon">
									<i class="ti-key"></i>
								</span>
								<input class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" type="password" name='password' id="password" placeholder="Enter Password"/>
								<?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>
							
							<div class="d-flex justify-content-between pl-30">
								<div class="checkbox">
									<input class="form-check-input" type="checkbox" name="remember" id="rememberMe" <?php echo e(old('remember') ? 'checked' : ''); ?>>
									<label for="rememberMe">Remember Me</label>
								</div>
								<div>
									<a href="<?php echo e(url('recovery/passord')); ?>">Forget Password?</a>
								</div>
							</div>

							<div class="form-group mt-30 mb-30">
								<button type="submit" class="primary-btn fix-gr-bg">
									<span class="ti-lock mr-2"></span>
									Login
                                </button>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!--================ Start End Login Area =================-->

	<!--================ Footer Area =================-->
	<footer class="footer_area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center"> 
					<p><?php echo $copyright_text; ?></p>   
				</div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area =================-->

    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/popper.js"></script>
	<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap.min.js"></script>
	<script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/nice-select.min.js"></script>
	<script src="<?php echo e(asset('public/backEnd/')); ?>/js/login.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/toastr.min.js"></script>

	<script type="text/javascript">
		if ($('.niceSelect').length) {
            $('.niceSelect').niceSelect();
        }

        $(document).ready(function() {
	        $("#email-address").keyup(function(){

			  $("#username-hidden").val($(this).val());
			});
	    });


	</script>

	<?php echo Toastr::message(); ?>



</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/Modules/Saas/Resources/views/auth/saas_login.blade.php ENDPATH**/ ?>