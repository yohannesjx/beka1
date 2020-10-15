<?php
$setting = App\SmGeneralSettings::find(1);
if (isset($setting->copyright_text)) {
    $copyright_text = $setting->copyright_text;
} else {
    $copyright_text = 'Copyright © 2020 All rights reserved | This template is made with by Codethemes';
}
if (isset($setting->logo)) {
    $logo = $setting->logo;
} else {
    $logo = 'public/uploads/settings/logo.png';
}

if (isset($setting->favicon)) {
    $favicon = $setting->favicon;
} else {
    $favicon = 'public/backEnd/img/favicon.png';
}

$login_background = App\SmBackgroundSetting::where([['is_default', 1], ['title', 'Login Background']])->first();

if (empty($login_background)) {
    $css = "background: url(" . url('public/backEnd/img/in_registration.png') . ")  no-repeat center; background-size: cover; ";
} else {
    if (!empty($login_background->image)) {
        $css = "background: url('" . url($login_background->image) . "')  no-repeat center;  background-size: cover;";
    } else {
        $css = "background:" . $login_background->color;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset('public/')); ?>/uploads/settings/favicon.png" type="image/png" />
    <title><?php echo e($setting->site_title); ?> | Student Registration</title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/themify-icons.css" />
    <link rel="stylesheet" href="<?php echo e(url('/public/')); ?>/landing/css/toastr.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/nice-select.css" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/select2/select2.css" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/backEnd/vendors/css/fastselect.min.css" />
    <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/vendors/css/toastr.min.css"/>
    <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/vendors/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/vendors/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="<?php echo e(url('public/backEnd/')); ?>/css/style.css"/>

</head>

<body class="reg_bg" style="background: url(<?php echo e(url('public/backEnd/img/in_registration.png')); ?>);">
    <style>
        @media (max-width: 991px) {
            .login.admin.hight_100 .login-height .form-wrap {
                padding: 50px 8px;
            }

            .login-area .login-height {
                min-height: auto;
            }
        }

        label.error {
            position: absolute;
            top: 100%;
            text-align: center;
            left: 3%;
            color: red;
        }

        span.error-message{
            display: flex;
        }

        div.error-message{
            display: table;
        }

        #g-recaptcha-error{
            display: flex;
            margin-top: 10px !important;
        }


        /* line 346, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker {
  padding: 30px 25px;
}

/* line 348, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker.dropdown-menu {
  border: 0;
}

/* line 351, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker.dropdown-menu td {
  padding: 10px 12.5px;
}
.datepicker table tr td.day:hover {
    border-radius: 20px;
    background: -webkit-linear-gradient(90deg, #7c32ff 0%, #c738d8 100%);
    background: -moz-linear-gradient(90deg, #7c32ff 0%, #c738d8 100%);
    background: -o-linear-gradient(90deg, #7c32ff 0%, #c738d8 100%);
    background: linear-gradient(90deg, #7c32ff 0%, #c738d8 100%);
}
/* line 354, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker.dropdown-menu th,
.datepicker.dropdown-menu td {
  color: #828bb2;
}

/* line 359, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker .datepicker thead tr:first-child th,
.datepicker .datepicker tfoot tr th {
  cursor: pointer;
  border-radius: 20px;
  font-size: 12px;
}

/* line 365, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker table tr td {
  border-radius: 20px;
}

/* line 374, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker table tr td.day {
  -webkit-transition: all 0.4s ease 0s;
  -moz-transition: all 0.4s ease 0s;
  -o-transition: all 0.4s ease 0s;
  transition: all 0.4s ease 0s;
}

/* line 376, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker table tr td.day:hover {
  border-radius: 20px;
}

/* line 385, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker thead tr:first-child th {
  position: relative;
}

/* line 387, ../../xampp/htdocs/infixeduB/public/backEnd/scss/admin/_component.scss */
.datepicker thead tr:first-child th:after {
  content: '';
  position: absolute;
  left: 0px;
  top: 0px;
  z-index: -1;
  width: 99%;
  height: 100%;
  border-radius: 50px;
  border: 1px solid #7c32ff;
}


.primary-input:focus ~ label, .primary-input.read-only-input ~ label, .has-content.primary-input ~ label {
    top: -14px;
    font-size: 11px;
    color: rgba(130, 139, 178, 0.8);
    text-transform: capitalize;
    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    text-align: left;
}

.primary-input:focus ~ label, .primary-input.read-only-input ~ label, .has-content.primary-input ~ label {
    top: -14px;
    font-size: 11px;
    color: rgba(130, 139, 178, 0.8);
    text-transform: capitalize;
    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    text-align: left;
    padding-left: 20px;
}

.primary-input {
    color: #415094;
    font-size: 13px;
    width: 100%;
    border: 0;
    padding: 4px 0;
    border-bottom: 1px solid rgba(130, 139, 178, 0.3);
    background-color: transparent;
    padding-bottom: 20px;
    position: relative;
    border-radius: 0px;
    z-index: 99;
}

.input-right-icon button i {
    position: relative;
    top: 5px;
}
.gradient-bg, .school-table .dropdown .dropdown-toggle:hover, .school-table .dropdown .dropdown-toggle:focus, .bootstrap-datetimepicker-widget table td.hour:hover, .bootstrap-datetimepicker-widget table td.minute:hover, .bootstrap-datetimepicker-widget table td span.glyphicon-chevron-up:hover:after, .bootstrap-datetimepicker-widget table td span.glyphicon-chevron-down:hover:after, .datepicker table tr td.active.day, .datepicker table tr td.day:hover, .datepicker thead tr:first-child th:hover, .pagination .page-link:hover, .common-calendar .fc-month-view .fc-day.fc-widget-content.fc-today, .common-calendar .fc-state-default.fc-corner-left:hover, .common-calendar .fc-button.fc-state-default:hover, .primary-btn.white:hover, .nice-select.tr-bg:hover, .admin .navbar .right-navbar .dropdown .badge, .admin .navbar .right-navbar .dropdown .primary-btn, .student-activities .single-activity .title:before, .single-cms-box:hover .single-cms .overlay, .client .events-item:hover .card .card-body .date, .client.light .overview-area .nav-tabs .nav-link:hover, .client.light .overview-area .nav-tabs .nav-link.active, .client.color .overview-area .nav-tabs .nav-link:hover, .client.color .overview-area .nav-tabs .nav-link.active {
    background: -webkit-linear-gradient(90deg, #7c32ff 0%, #c738d8 100%);
    background: -moz-linear-gradient(90deg, #7c32ff 0%, #c738d8 100%);
    background: -o-linear-gradient(90deg, #7c32ff 0%, #c738d8 100%);
    background: linear-gradient(90deg, #7c32ff 0%, #c738d8 100%);
}


.primary-input:focus label, .primary-input.read-only-input label, .has-content.primary-input ~ label {
padding-left: 20px;
}.primary-input {
padding-left: 20px;
}


.single_registration_area .relation-button {
    color: #828bb2;
    border: 0px;
    border-bottom: 0px solid #cec6e0;
    border-radius: 0px;
    background: transparent !important;
    padding: 0px 20px 20px 34px;
    font-size: 12px;
    font-weight: 400;
    letter-spacing: 1px;
    margin: 5px 0;
}
.single_registration_area .relation-button label {
    position: relative;
    float: left;
    line-height: 16px;
    text-indent: 28px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    text-transform: capitalize;
    padding-left: 5px !important;
}


/* line 29, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .form-group .form-control {
  color: #828bb2;
  border: 0px;
  border-bottom: 1px solid #cec6e0;
  border-radius: 0px;
  background: transparent !important;
  padding: 0px 20px 20px;
  font-size: 12px;
  font-weight: 400;
  letter-spacing: 1px;
  margin: 5px 0;
}

@media (max-width: 576px) {
  /* line 29, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .single_registration_area .form-group .form-control {
    padding: 0px 10px 10px;
  }
}

/* line 44, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .form-control {
  height: auto;
}

/* line 47, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .form-group {
  text-transform: capitalize;
  font-size: 12px;
  color: #828bb2;
}

/* line 52, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .nice-select.niceSelect {
  padding: 0 20px 13px;
  line-height: 31px;
  margin-bottom: 1rem;
}

@media (max-width: 576px) {
  /* line 52, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .single_registration_area .nice-select.niceSelect {
    padding: 0 10px 10px;
  }
}

/* line 60, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .nice-select:after {
  margin-top: -17px;
  right: 24px;
}

@media (max-width: 576px) {
  /* line 60, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .single_registration_area .nice-select:after {
    right: 16px;
  }
}

/* line 68, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .nice-select.open:after {
  margin-top: 10px;
  right: 21px;
}

/* line 72, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .nice-select.bb .current {
  font-weight: 400;
}

/* line 76, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .input_box_tittle h4 {
  font-size: 12px;
  text-transform: uppercase;
  font-weight: 400;
  color: #828bb2;
  margin-bottom: 12px;
  text-align: left;
}

/* line 84, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .input_box_tittle label {
  font-size: 14px;
  font-weight: 400;
}

/* line 88, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .input_box_tittle .form-group {
  margin: 17px 0 30px;
}

/* line 92, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .billing_info {
  justify-content: space-between;
}

/* line 94, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_registration_area .billing_info .form-group {
  width: 48%;
}

/* line 99, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.registration_area_logo {
  padding: 40px 0 100px;
  text-align: center;
}

@media (max-width: 576px) {
  /* line 99, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .registration_area_logo {
    padding: 40px 0 40px;
  }
  /* line 104, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .registration_area_logo img {
    max-width: 100px;
  }
}

@media (min-width: 576px) and (max-width: 768px) {
  /* line 99, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .registration_area_logo {
    padding: 40px 0 40px;
  }
  /* line 110, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .registration_area_logo img {
    max-width: 120px;
  }
}

/* line 115, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.registration_footer {
  padding-top: 50px;
}

/* line 118, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  margin-bottom: 10px;
}

/* line 124, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services .single_additional_text {
  text-align: left;
  padding: 30px 25px;
  background-color: #e2def0;
}

@media (max-width: 768px) {
  /* line 124, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .single_additional_services .single_additional_text {
    padding: 50px 15px 20px;
  }
}

/* line 131, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services .single_additional_text h5 {
  color: #415094;
  text-transform: capitalize;
  font-size: 14px;
  margin: 0 0 12px;
  letter-spacing: 0;
}

@media (min-width: 991px) {
  /* line 131, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .single_additional_services .single_additional_text h5 {
    max-width: 90%;
  }
}

/* line 141, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services .single_additional_text p {
  margin-bottom: 0;
  font-size: 12px;
  color: #828bb2;
}

/* line 147, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services span {
  background-color: #ff6d00;
  color: #fff;
  padding: 8px 23px;
  top: 0;
  right: 0;
  position: absolute;
}

/* line 155, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services label {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

/* line 164, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.order_details_iner .single_order_details {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #e2dff0;
  padding: 13px 0;
}

/* line 170, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.order_details_iner .single_order_details input {
  background-color: transparent;
  border: 0px solid transparent;
  text-align: right;
}

/* line 174, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.order_details_iner .single_order_details input:focus {
  outline: -webkit-focus-ring-color auto 0;
}

/* line 178, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.order_details_iner .single_order_details p, .order_details_iner .single_order_details input {
  font-size: 13px;
  font-weight: 300;
  color: #828bb2;
  margin-bottom: 0px;
}

@media (max-width: 576px) {
  /* line 164, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .order_details_iner .single_order_details {
    text-align: left;
  }
}

/* line 188, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.order_details_iner .cupon_code {
  display: flex;
  flex-wamp: wamp;
  justify-content: space-between;
}

@media (max-width: 576px) {
  /* line 188, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .order_details_iner .cupon_code {
    display: block;
  }
}

/* line 195, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.order_details_iner .cupon_code .single_cupon_code {
  flex: 41% 0 0;
}

/* line 201, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.cupon_code_iner h4 {
  font-size: 14px;
  float: left;
  text-align: left;
  text-transform: uppercase;
  margin: 33px 0 24px;
}

/* line 208, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.cupon_code_iner input.form-control {
  background-color: transparent;
  border: 0px transparent;
  border-bottom: 1px solid #cec7e1;
  border-radius: 0;
  text-transform: uppercase;
  color: #828bb2;
  font-size: 12px;
  padding: 2px 0 20px;
}

/* line 218, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.cupon_code_iner ::placeholder {
  color: #828bb2;
}

/* line 221, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.cupon_code_iner .input-group-append {
  margin-left: 20px;
}

/* line 224, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.cupon_code_iner a {
  border-radius: 5px;
  background-image: -moz-linear-gradient(0deg, #7c32ff 0%, #a235ec 70%, #c738d8 100%);
  background-image: -webkit-linear-gradient(0deg, #7c32ff 0%, #a235ec 70%, #c738d8 100%);
  background-image: -ms-linear-gradient(0deg, #7c32ff 0%, #a235ec 70%, #c738d8 100%);
  box-shadow: 0px 10px 20px 0px rgba(108, 39, 255, 0.3);
  padding: 10px 25px;
  color: #fff;
  text-transform: uppercase;
  font-size: 12px;
  border-radius: 6px !important;
  display: inline-block;
}

/* line 239, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.privacy_police p {
  text-align: left;
  margin-bottom: 0;
  font-size: 12px;
  color: #828bb2;
  line-height: 22px;
  margin-bottom: 15px;
}

/* line 250, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.privacy_police .single_privacy_police:last-child p {
  margin-bottom: 0;
}

/* line 255, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.privacy_police .common-radio:empty ~ label:before {
  top: 3px;
}

/* line 258, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.privacy_police .common-radio:checked ~ label:after {
  top: 0px;
}

/* line 264, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.login_button .primary-btn {
  padding: 10px 43px;
}

@media (max-width: 768px) {
  /* line 264, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
  .login_button .primary-btn {
    padding: 5px 25px;
  }
}

/* line 272, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.registration_footer p {
  font-size: 14px;
  color: #828bb2;
}

/* line 277, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.registration_footer span {
  color: #fff;
}

/* line 280, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.registration_footer a {
  color: #fff;
}

/* line 284, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.aingle_additional_img {
  width: 150px;
  height: 130px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #cec7e1;
}

/* line 291, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.aingle_additional_img img {
  width: 150px;
  height: 130px;
}

/* line 296, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_text {
  cursor: pointer;
}

/* line 300, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services .active_pack {
  background-color: #2b0568;
}

/* line 302, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services .active_pack h5 {
  color: #fff;
}

/* line 305, /Applications/MAMP/htdocs/infixsass/public/backEnd/scss/admin/_register.scss */
.single_additional_services .active_pack p {
  color: #828bb2;
}

/*---------------------------------------------------- */

/*# sourceMappingURL=../css/style.map */
    </style>

    <!--================ Start Login Area =================-->
    <div class="reg_bg">

    </div>
    <section class="login-area  registration_area ">
        <div class="container">
            <div class="registration_area_logo">
                 <?php if(!empty($setting->logo)): ?><img src="<?php echo e(asset($setting->logo)); ?>" alt="Login Panel"><?php endif; ?>
            </div>



            <?php if(\Session::has('success')): ?>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="text-center white-box single_registration_area">
                        <h1>Thank You</h1>
                        <h3><?php echo \Session::get('success'); ?></h3>
                        <a href="<?php echo e(url('/')); ?>" class="primary-btn small fix-gr-bg">
                            <!-- <span class="ti-plus pr-2"></span> -->
                            <?php echo app('translator')->getFromJson('lang.home'); ?>
                        </a>
                    </div>

                </div>
            </div>
            <?php else: ?>

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="text-center white-box single_registration_area">
                        <div class="reg_tittle mt-20 mb-20">
                            <h2><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.registration'); ?></h2>
                        </div>
                        <div class="reg_tittle mt-40">
                            <h5><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.info'); ?></h5>
                        </div>
                            <form method="POST" class="" action="<?php echo e(url('/parentregistration/student-store')); ?>" id="parent-registration">
                               <?php echo e(csrf_field()); ?>

                            <input type="hidden" id="url" value="<?php echo e(url('/')); ?>"> 


                            <div class="row">
                                <?php if(App\SmGeneralSettings::isModule('Saas')== TRUE): ?> 
                                <div class="col-lg-6">
                                    <div class="input-effect">
                                        <select class="niceSelect w-100 bb form-control" name="school" id="select-school">
                                            <option data-display="Select School *" value="">Select school *</option>
                                            <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school->id); ?>"> <?php echo e($school->school_name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="col-lg-6">
                                    <div class="input-effect" id="academic-year-div">
                                        <select class="niceSelect w-100 bb form-control" name="academic_year" id="select-academic-year">
                                            <option data-display="Select Academic Year *" value="">Select Academic Year *</option>
                                            <?php if(App\SmGeneralSettings::isModule('Saas')== FALSE): ?> 
                                            <?php $__currentLoopData = $academic_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academic_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <option value="<?php echo e($academic_year->id); ?>"><?php echo e($academic_year->year); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                       
                                    </div>
                                     <?php if($errors->has('academic_year')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"><?php echo e($errors->first('academic_year')); ?></div>
                                        <?php endif; ?>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-effect" id="class-div">
                                        <select class="niceSelect w-100 bb form-control" name="class" id="select-class">
                                            <option data-display="Select Class *" value="">Select Class *</option>
                                        </select>
                                    </div>
                                    <?php if($errors->has('class')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"><?php echo e($errors->first('class')); ?></div>
                                        <?php endif; ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-effect" id="section-div">
                                        <select class="niceSelect w-100 bb form-control" name="section" id="select-section">
                                            <option data-display="Select Section *" value="">Select Section *</option>
                                           
                                        </select>
                                    </div>
                                    <?php if($errors->has('section')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"><?php echo e($errors->first('section')); ?></div>
                                        <?php endif; ?>
                                </div> 

                                
                            </div> 

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='first_name' id="school_name" placeholder="student first Name *" value="<?php echo e(old('first_name')); ?>" />
                                    </div>
                                    <?php if($errors->has('first_name')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"><?php echo e($errors->first('first_name')); ?></div>
                                        <?php endif; ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='last_name' id="school_name" placeholder="stduent last Name *" value="<?php echo e(old('student_email')); ?>" />
                                    </div>
                                    <?php if($errors->has('last_name')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"><?php echo e($errors->first('last_name')); ?></div>
                                        <?php endif; ?>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-effect sm2_mb_20 md_mb_20">
                                        <select class="niceSelect w-100 bb form-control" name="gender">
                                            <option data-display="<?php echo app('translator')->getFromJson('lang.gender'); ?> *" value=""><?php echo app('translator')->getFromJson('lang.gender'); ?> *</option>
                                            <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($gender->id); ?>" <?php echo e(old('gender') == $gender->id? 'selected': ''); ?>><?php echo e($gender->base_setup_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <?php if($errors->has('gender')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"><?php echo e($errors->first('gender')); ?></div>
                                        <?php endif; ?>
                                </div>


                            <div class="col-lg-6">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="input-effect sm2_mb_20 md_mb_20">
                                            <input class="primary-input mydob date form-control<?php echo e($errors->has('date_of_birth') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                 name="date_of_birth" value="<?php echo e(date('d/m/Y')); ?>" autocomplete="off" id="date_of_birth">
                                                <label><?php echo app('translator')->getFromJson('lang.date_of_birth'); ?> *</label>
                                                <span class="focus-border"></span>
                                            <?php if($errors->has('date_of_birth')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('date_of_birth')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                                

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='age' id="age" placeholder="student Age *" readonly=""  value="<?php echo e(old('age')); ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="email" name='student_email' id="student_email" placeholder="student email" value="<?php echo e(old('student_email')); ?>"/>
                                    </div>
                                    <span class="text-danger error-message" id="student_email_error"></span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='student_mobile' id="student_mobile" placeholder="student Mobile" value="<?php echo e(old('student_mobile')); ?>" />
                                    </div>
                                    <span class="text-danger error-message" id="student_mobile_error"></span>
                                </div>

                            </div>

                            <div class="mt-40">

                                <h5><?php echo app('translator')->getFromJson('lang.guardian'); ?> <?php echo app('translator')->getFromJson('lang.info'); ?></h5>

                            </div>

                             <div class="row">
                                    
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='guardian_name' id="school_name" placeholder="Guardian Name *" value="<?php echo e(old('guardian_name')); ?>" />
                                    </div>
                                    <?php if($errors->has('guardian_name')): ?>
                                            <div class="text-danger error-message invalid-select mb-10"><?php echo e($errors->first('guardian_name')); ?></div>
                                        <?php endif; ?>
                                </div>
                                <div class="col-lg-6 d-flex relation-button">
                                    <p class="text-uppercase mb-0"><?php echo app('translator')->getFromJson('lang.guardian_relation'); ?></p>
                                    <div class="d-flex radio-btn-flex ml-30">
                                        <div class="mr-20">
                                            <input type="radio" name="relationButton" id="relationFather" value="F" class="common-radio relationButton" <?php echo e(old('relationButton') == "F"? 'checked': ''); ?>>
                                            <label for="relationFather"><?php echo app('translator')->getFromJson('lang.father'); ?></label>
                                        </div>
                                        <div class="mr-20">
                                            <input type="radio" name="relationButton" id="relationMother" value="M" class="common-radio relationButton" <?php echo e(old('relationButton') == "M"? 'checked': ''); ?>>
                                            <label for="relationMother"><?php echo app('translator')->getFromJson('lang.mother'); ?></label>
                                        </div>
                                        <div>
                                            <input type="radio" name="relationButton" id="relationOther" value="O" class="common-radio relationButton"  <?php echo e(old('relationButton') != ""? (old('relationButton') == "O"? 'checked': ''): 'checked'); ?>>
                                            <label for="relationOther"><?php echo app('translator')->getFromJson('lang.Other'); ?></label>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='guardian_email' id="guardian_email" placeholder="Guardian Email *" value="<?php echo e(old('guardian_email')); ?>"/>
                                    </div>
                                    <?php if($errors->has('guardian_email')): ?>
                                            <div class="text-danger error-message invalid-select mb-10" id="guardian_email_error"><?php echo e($errors->first('guardian_email')); ?></div>
                                        <?php else: ?>
                                            <div class="text-danger error-message invalid-select mb-10" id="guardian_email_error"></div>
                                        <?php endif; ?>

                                    </span>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='guardian_mobile' id="guardian_mobile" placeholder="Guardian  Mobile *" value="<?php echo e(old('guardian_mobile')); ?>"/>
                                    </div>
                                    <?php if($errors->has('guardian_mobile')): ?>
                                            <div class="text-danger error-message invalid-select mb-10" id="guardian_mobile_error"><?php echo e($errors->first('guardian_mobile')); ?></div>
                                        <?php else: ?>
                                            <div class="text-danger error-message invalid-select mb-10" id="guardian_mobile_error"></div>
                                        <?php endif; ?>
                                    </span>
                                </div>

                            </div>

                             <div class="row mt-20">

                                <div class="col-lg-12">
                                    <div class="form-group input-group">
                                        <textarea class="form-control" name='how_do_know_us' id="school_name" placeholder="How do you know us.?"><?php echo e(old('how_do_know_us')); ?></textarea>
                                    </div>
                                </div>

                            </div> 

                            <?php if($reg_setting->recaptcha == 1): ?>

                            <div class="row">

                                <div class="col-lg-12 text-center">
                                      <?php echo NoCaptcha::renderJs(); ?>

                                      <?php echo NoCaptcha::display(); ?>

                                    <span class="text-danger" id="g-recaptcha-error"><?php echo e($errors->first('g-recaptcha-response')); ?></span>
                                </div>

                            </div>

                            <?php endif; ?>

                            <div class="row mt-40">
                                <div class="col-lg-12">
                                    <div class="login_button text-center">
                                        <button type="submit" class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                           <?php echo app('translator')->getFromJson('lang.submit'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mt-30">
                                        <?php echo app('translator')->getFromJson('lang.note_for_multiple_child_registration'); ?>

                                        

                                        
                                    </div>
                                </div>
                                
                            </div>


                    </div>
                </div>
            </div>
            <?php endif; ?>

            
        </div>
        </form>
    </section>
    <!--================ Start End Login Area =================-->

    <!--================ Footer Area =================-->
    <footer class="footer_area registration_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                <p><?php echo @$copyright_text; ?></p>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End Footer Area =================-->


    <script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/popper.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/bootstrap.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/vendors/js/nice-select.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/js/login.js"></script>
    
    

    
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap-datepicker.min.js"></script>


    <script src="<?php echo e(url('/')); ?>/public/backEnd/js/main.js"></script>
    <script src="<?php echo e(url('/')); ?>/public/backEnd/js/custom.js"></script>

    <script src="<?php echo e(url('/public/js/registration_custom.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/toastr.min.js"></script>




    <script>
        $('.primary-btn').on('click', function(e) {
            // Remove any old one
            $('.ripple').remove();

            // Setup
            var primaryBtnPosX = $(this).offset().left,
                primaryBtnPosY = $(this).offset().top,
                primaryBtnWidth = $(this).width(),
                primaryBtnHeight = $(this).height();

            // Add the element
            $(this).prepend("<span class='ripple'></span>");

            // Make it round!
            if (primaryBtnWidth >= primaryBtnHeight) {
                primaryBtnHeight = primaryBtnWidth;
            } else {
                primaryBtnWidth = primaryBtnHeight;
            }

            // Get the center of the element
            var x = e.pageX - primaryBtnPosX - primaryBtnWidth / 2;
            var y = e.pageY - primaryBtnPosY - primaryBtnHeight / 2;

            // Add the ripples CSS and start the animation
            $('.ripple')
                .css({
                    width: primaryBtnWidth,
                    height: primaryBtnHeight,
                    top: y + 'px',
                    left: x + 'px'
                })
                .addClass('rippleEffect');
        });
    </script>
    <script type="text/javascript"></script>

    <script>
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $("#login").validate({

            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                cpassword: {
                    required: true,
                    minlength: 6,
                },
                school_name: {
                    required: true,
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        if ($('.niceSelect').length) {
            $('.niceSelect').niceSelect();
        }

        //dropdown visiable js
        $(".single_additional_services").on('click', function() {
            $(this).find(".single_additional_text").toggleClass("active_pack");

        });

        //dropdown visiable js
        function totalIt() {
            var input = document.getElementsByName("additional_service");
            var total = 0;
            for (var i = 0; i < input.length; i++) {
                if (input[i].checked) {
                    total = total + parseFloat(input[i].value);
                }
            }
            document.getElementsByName("total")[0].value = "$" + total.toFixed(2);
        }
    </script>

    <?php echo Toastr::message(); ?>

    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/Modules/ParentRegistration/Resources/views/registration.blade.php ENDPATH**/ ?>