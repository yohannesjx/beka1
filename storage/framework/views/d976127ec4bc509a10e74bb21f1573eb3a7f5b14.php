<?php $__env->startSection('mainContent'); ?>
<?php
    function showPicName($data){
        $name = explode('/', $data);
        return $name[3];
    }
?>
<section class="sms-breadcrumb mb-40 white-box up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.email'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.template'); ?> <?php echo app('translator')->getFromJson('lang.settings'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.email'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($certificate)): ?>
        <?php if(in_array(481, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('student-certificate')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->getFromJson('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
           
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($certificate)): ?>
                                    <?php echo app('translator')->getFromJson('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->getFromJson('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->getFromJson('lang.email'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?>
                            </h3>
                        </div>

                        <?php if(in_array(481, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'templatesettings/email-template', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                            <div class="white-box">
                            <div class="add-visitor">
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger')); ?>

                                        </div>
                                        <?php endif; ?>
                                        
                                        
                                    </div>
                                </div>

                               
                                <div class="row mt-25">
                                    <div class="col-lg-12 mb-20">

                                        <span class="text-primary">[name] [email] [admission_number] [school_name]</span>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('password_reset_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="password_reset_message" maxlength="500"><?php echo e(isset($template)? $template->password_reset_message: old('password_reset_message')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.password_reset_message'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('password_reset_message')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('password_reset_message')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12 mb-20">

                                        <span class="text-primary">[student_name] [email] [admission_number] [password] [father_name] [school_name]</span>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('student_login_credential_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="student_login_credential_message" maxlength="500"><?php echo e(isset($template)? $template->student_login_credential_message: old('student_login_credential_message')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student_login_credential_message'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('student_login_credential_message')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('student_login_credential_message')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12 mb-20">
                                        <span class="text-primary">[name]  [father_name] [email] [admission_number] [password] [student_name] [school_name]</span>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('guardian_login_credential_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="guardian_login_credential_message" maxlength="500"><?php echo e(isset($template)? $template->guardian_login_credential_message: old('guardian_login_credential_message')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.guardian_login_credential_message'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('guardian_login_credential_message')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('guardian_login_credential_message')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row mt-25">
                                    <div class="col-lg-12 mb-20">

                                        <span class="text-primary">[name] [admission_number] [guardian_name] [class] [section] [school_name]</span>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('student_registration_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="student_registration_message" maxlength="500"><?php echo e(isset($template)? $template->student_registration_message: old('student_registration_message')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student_registration_message'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('student_registration_message')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('student_registration_message')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row mt-25">
                                    <div class="col-lg-12 mb-20">

                                        <span class="text-primary">[name] [student_name] [school_name]</span>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('guardian_registration_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="guardian_registration_message" maxlength="500"><?php echo e(isset($template)? $template->guardian_registration_message: old('guardian_registration_message')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.guardian_registration_message'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('guardian_registration_message')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('guardian_registration_message')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row mt-25">
                                    <div class="col-lg-12 mb-20">

                                        <span class="text-primary">[name] [username] [password] [school_name]</span>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('staff_login_credential_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="staff_login_credential_message" maxlength="500"><?php echo e(isset($template)? $template->staff_login_credential_message: old('staff_login_credential_message')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.staff_login_credential_message'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('staff_login_credential_message')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('staff_login_credential_message')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>   

                               <!--  <div class="row mt-25">
                                    <div class="col-lg-12 mb-20">

                                        <span class="text-primary">[name] [student_name] [father_name] [mother_name] [school_name]</span>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('send_email_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="send_email_message" maxlength="500"><?php echo e(isset($template)? $template->send_email_message: old('send_email_message')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.send_email_message'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('send_email_message')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('send_email_message')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row mt-25">
                                    <div class="col-lg-12 mb-20">

                                        <span class="text-primary">[name] [amount] [school_name]</span>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('dues_payment_message') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="dues_payment_message" maxlength="500"><?php echo e(isset($template)? $template->dues_payment_message: old('dues_payment_message')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.dues_payment_message'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('dues_payment_message')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('dues_payment_message')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('email_footer_text') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="email_footer_text" maxlength="500"><?php echo e(isset($template)? $template->email_footer_text: old('email_footer_text')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.email_footer_text'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('email_footer_text')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('email_footer_text')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                               
	                           <?php 
                                  $tooltip = "";
                                  if(in_array(481, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($certificate)): ?>
                                                <?php echo app('translator')->getFromJson('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->getFromJson('lang.save'); ?>
                                            <?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/Modules/TemplateSettings/Resources/views/emailTemplate.blade.php ENDPATH**/ ?>