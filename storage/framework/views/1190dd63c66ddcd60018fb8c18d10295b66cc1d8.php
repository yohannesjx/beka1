<?php
    $setting = App\SmGeneralSettings::find(1);

    if (isset($setting->copyright_text)) {
        $copyright_text = $setting->copyright_text;
    } else {
        $copyright_text = 'Copyright © 2019 All rights reserved | This template is made with by Codethemes';
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

  $active_style = App\SmStyle::where("school_id", 1)->where('is_active', 1)->first();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset($favicon)); ?>" type="image/png" />
    <title>New Institution Register</title>
    <meta name="_token" content="<?php echo csrf_token(); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/themify-icons.css" />
    <link rel="stylesheet" href="<?php echo e(asset('landing/css/toastr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/nice-select.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/select2/select2.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/fastselect.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/nice-select.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/saas/')); ?>/css/<?php echo e($active_style->path_main_style); ?>" />
</head>

<body class="reg_bg">
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
    </style>

    <!--================ Start Login Area =================-->
    <div class="reg_bg">

    </div>
    <section class="login-area  registration_area ">
        <div class="container">
            <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
            <div class="registration_area_logo">
                <a href="#"><img src="public/backEnd/img/logo.png" alt=""></a>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="text-center white-box single_registration_area">
                        <div class="reg_tittle">
                            <h5>Registration & Available Packages</h5>
                        </div>
                        <?php if (session()->has('message-success') != "") : ?>
                            <?php if (session()->has('message-success')) : ?>
                                <p class="text-success"><?php echo e(session()->get('message-success')); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (session()->has('message-danger') != "") : ?>
                            <?php if (session()->has('message-danger')) : ?>
                                <p class="text-danger"><?php echo e(session()->get('message-danger')); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <form method="POST" class="" action="<?php echo e(url('/institution-register-store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control<?php echo e($errors->has('school_name') ? ' is-invalid' : ''); ?>" required type="text" name='school_name' id="school_name" placeholder="Enter Institution Name *" />
                                        <?php if($errors->has('school_name')): ?>
                                        <span class="invalid-feedback text-left pl-3" role="alert">
                                            <strong><?php echo e($errors->first('school_name')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group input-group">
                                        <input class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" required type="password" name='password' id="password" placeholder="Enter Password *" />
                                        <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback text-left pl-3" role="alert">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group input-group">
                                        <input class="form-control<?php echo e($errors->has('school_code') ? ' is-invalid' : ''); ?>" required type="text" name='school_code' id="password" placeholder="Enter school code *" />
                                        <?php if($errors->has('school_code')): ?>
                                        <span class="invalid-feedback text-left pl-3" role="alert">
                                            <strong><?php echo e($errors->first('school_code')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>


                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group input-group">
                                        <input class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" required type="text" name='email' id="email" placeholder="Enter email *" />
                                        <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback text-left pl-3" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group input-group">
                                        <input class="form-control<?php echo e($errors->has('cpassword') ? ' is-invalid' : ''); ?>" required type="password" name='cpassword' id="cpassword" placeholder="Confirm Password *" />
                                        <?php if($errors->has('cpassword')): ?>
                                        <span class="invalid-feedback text-left pl-3" role="alert">
                                            <strong><?php echo e($errors->first('cpassword')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group input-group">
                                        <input class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" type="text" name='phone' id="mobile" placeholder="Enter phone number *" />
                                        <?php if($errors->has('phone')): ?>
                                        <span class="invalid-feedback text-left pl-3" role="alert">
                                            <strong><?php echo e($errors->first('phone')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="input-effect">
                                        <select class="niceSelect w-100 bb form-control" name="plans">
                                            <option data-display="Select Plan" value="">Select Plan *</option>
                                            <option value="monthly_price">Monthly</option>
                                            <option value="quarterly_price">Quarterly</option>
                                            <option value="yearly_price">Yearly</option>
                                            <option value="lifetime_price">Lifetime</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>


        <?php if($setting->school_payment == 0): ?>

            <div class="row justify-content-center align-items-center mt-30">
                <div class="col-lg-12">
                    <div class="text-center white-box single_registration_area">
                        <div class="reg_tittle">
                            <h5>Billing Information</h5>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group input-group">
                                    <input class="form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>" required type="text" name='first_name' placeholder="First name" />
                                    <?php if($errors->has('first_name')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" required type="text" name='last_name' placeholder="Last name" />
                                    <?php if($errors->has('last_name')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control<?php echo e($errors->has('company') ? ' is-invalid' : ''); ?>" required type="text" name='company' placeholder="Company" />
                                    <?php if($errors->has('company')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('company')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control<?php echo e($errors->has('billing_email') ? ' is-invalid' : ''); ?>" required type="email" name='billing_email' placeholder="Email address" />
                                    <?php if($errors->has('billing_email')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('billing_email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" required type="text" name='address' placeholder="Address" />
                                    <?php if($errors->has('address')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="input-effect">
                                    <select class="niceSelect w-100 bb form-control" name="country">
                                        <option data-display="Select Country" value="">Country</option>
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>" required type="text" name='city' placeholder="City" />
                                    <?php if($errors->has('city')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('city')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control<?php echo e($errors->has('state') ? ' is-invalid' : ''); ?>" type="text" required name='state' placeholder="State" />
                                    <?php if($errors->has('state')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('state')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control<?php echo e($errors->has('zip') ? ' is-invalid' : ''); ?>" required type="text" name='zip' placeholder="Zip code" />
                                    <?php if($errors->has('zip')): ?>
                                    <span class="invalid-feedback text-left pl-3" role="alert">
                                        <strong><?php echo e($errors->first('zip')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input_box_tittle">
                                    <h4>Payment Method</h4>
                                    <div class="form-group input-group d-block">
                                        <div class="d-flex">
                                            <div class="mr-30">
                                                <input type="radio" name="payment_method" id="relationFather" value="Credit Card" class="common-radio relationButton">
                                                <label for="relationFather">Credit Card</label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="payment_method" id="relationMother" value="Paypal" class="common-radio relationButton">
                                                <label for="relationMother">Paypal</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control" type="text" name='card_name' placeholder="Name on card" />
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control" type="text" name='card_number' placeholder="Credit card number" />
                                </div>
                                <div class="d-flex billing_info">
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='expiry_date' placeholder="Expiry Date" />
                                    </div>
                                    <div class="form-group input-group">
                                        <input class="form-control" type="text" name='card_cvv' placeholder="Card CVV" />
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control" type="text" name='tax_exemtion_id' placeholder="Tax Exemption ID" />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row mt-30">
                <div class="col-lg-12">
                    <div class="text-center white-box single_registration_area">
                        <div class="reg_tittle">
                            <h5>Additional Services</h5>
                        </div>

                        

                        <input name="additional_service" id="single_additional_label_2" value="19.67" type="checkbox" onclick="totalIt()">
                        <div class="single_additional_services">
                            <label for="single_additional_label_2"></label>
                            <div class="aingle_additional_img d-none d-lg-block">
                                <img src="public/backEnd/saas/img/single_additional_img.png" alt="#">
                            </div>
                            <div class="single_additional_text">
                                <h5>Assure Safety To Your Visitors & Convert Them To Customers — Included Free!</h5>
                                <p>SSL certificates assure your customers and visitors that any data (credit cards, passwords etc) they enter on your site is secure, and protected. Earn the trust of your visitors and convert them into customers. SSL Terms</p>
                            </div>
                            <span>$19.67</span>
                        </div>
                        <input name="additional_service" id="single_additional_label_3" value="20.26" type="checkbox" onclick="totalIt()">
                        <div class="single_additional_services">
                            <label for="single_additional_label_3"></label>
                            <div class="aingle_additional_img d-none d-lg-block">
                                <img src="public/backEnd/saas/img/single_additional_img.png" alt="#">
                            </div>
                            <div class="single_additional_text">
                                <h5>Assure Safety To Your Visitors & Convert Them To Customers — Included Free!</h5>
                                <p>SSL certificates assure your customers and visitors that any data (credit cards, passwords etc) they enter on your site is secure, and protected. Earn the trust of your visitors and convert them into customers. SSL Terms</p>
                            </div>
                            <span>$20.26</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-12">
                    <div class="text-center white-box single_registration_area">
                        <div class="reg_tittle">
                            <h5>Order Details</h5>
                        </div>
                        <div class="order_details_iner">
                            <div class="single_order_details">
                                <p>24/7/365 Phone, LiveChat, Email Support</p>
                                <p>FREE!</p>
                            </div>
                            <div class="single_order_details">
                                <p>Money Back Guarantee!</p>
                                <p>45 Days</p>
                            </div>
                            <div class="cupon_code">
                                <div class="cupon_code_iner single_cupon_code">
                                    <h4>Enter a Coupon Code</h4>
                                    
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="coupon code" aria-label="coupon">
                                        <div class="input-group-append">
                                            <a href="#" class="input-group-text" id="basic-addon2">Validate</a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="total single_cupon_code">
                                    <div class="single_order_details">
                                        <p>Subtotal:</p>
                                        <input value="$0.00" readonly="readonly" type="text" name="total">
                                    </div>
                                    <div class="single_order_details">
                                        <p>Amount Due</p>
                                        <input value="$0.00" readonly="readonly" type="text" name="due_amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-12">
                    <div class="text-center white-box privacy_police single_registration_area">
                        <div class="single_privacy_police">
                            <div class="mr-30">
                                <input type="radio" name="relationButton" id="privacy_police_radio" value="M" class="common-radio relationButton">
                                <label for="privacy_police_radio"></label>
                            </div>
                            <p class="pl-30">You have read and agree to Terms of Service and Cancellation Policy and acknowledge receipt of the Privacy Policy. </p>
                        </div>
                        <div class="single_privacy_police">
                            <p>By clicking "Checkout Now" you agree to have your personal information transferred, which is necessary to provide you with the services under our agreement with you. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="login_button text-center">
                        <button type="submit" class="primary-btn fix-gr-bg">
                            Checkout Now!
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>
    <!--================ Start End Login Area =================-->

    <!--================ Footer Area =================-->
    <footer class="footer_area registration_footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <p>Copyright © 2019 All rights reserved | This template is made with <span class="ti-heart"> </span>by <a href="#">Codepixar</a> </p>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End Footer Area =================-->


    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/popper.js"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/nice-select.min.js"></script>
    <script src="<?php echo e(asset('public/backEnd/saas/')); ?>/js/login.js"></script>
    <script src="<?php echo e(asset('public/backEnd/saas/')); ?>/js/validate.js"></script>
    <script src="<?php echo e(asset('public/backEnd/saas/')); ?>/js/additional.js"></script>
    <script src="<?php echo e(asset('public/backEnd/saas/')); ?>/js/main.js"></script>
    <script src="<?php echo e(asset('public/backEnd/saas/')); ?>/js/custom.js"></script>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/nice-select.min.js"></script>
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
    <script src="<?php echo e(asset('backend/js/toastr.js')); ?>"></script>
    <?php echo Toastr::message(); ?>


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


</body>

</html>
<?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/Modules/Saas/Resources/views/systemSettings/new_registration.blade.php ENDPATH**/ ?>