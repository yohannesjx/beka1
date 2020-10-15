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
            <h1><?php echo app('translator')->getFromJson('lang.sms'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.biometrics'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.sms'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($certificate)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('student-certificate')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->getFromJson('lang.add'); ?>
                </a>
            </div>
        </div>
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
                                <?php echo app('translator')->getFromJson('lang.sms'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?>
                            </h3>
                        </div>
                          <?php if(in_array(50, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'sms-template/'.$template->id, 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

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
                                        <span class="text-primary">[name] [check_in_time] [father_name] [AttendanceDate] [checkout_time] [early_checkout_time] [dob] [present_address] [guardian] [created_at] [admission_no] [roll_no] [class] [section] [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone]</span>
                                        
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('admission_pro') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="admission_pro" maxlength="500"><?php echo e(isset($template)? $template->admission_pro: old('admission_pro')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student_admission_progress'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('admission_pro')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('admission_pro')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('student_admit') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="student_admit" maxlength="500"><?php echo e(isset($template)? $template->student_admit: old('student_admit')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student_admitted_message'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('student_admit')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('student_admit')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('login_disable') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="login_disable" maxlength="500"><?php echo e(isset($template)? $template->login_disable: old('login_disable')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.login'); ?> <?php echo app('translator')->getFromJson('lang.permission'); ?> <?php echo app('translator')->getFromJson('lang.disable'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('login_disable')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('login_disable')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('exam_schedule') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="exam_schedule" maxlength="500"><?php echo e(isset($template)? $template->exam_schedule: old('exam_schedule')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.exam_schedule'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('exam_schedule')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('exam_schedule')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('exam_publish') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="exam_publish" maxlength="500"><?php echo e(isset($template)? $template->exam_publish: old('exam_publish')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.exam'); ?> <?php echo app('translator')->getFromJson('lang.publish'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('exam_publish')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('exam_publish')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('due_fees') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="due_fees" maxlength="500"><?php echo e(isset($template)? $template->due_fees: old('due_fees')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.due'); ?> <?php echo app('translator')->getFromJson('lang.fees'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('due_fees')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('due_fees')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('collect_fees') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="collect_fees" maxlength="500"><?php echo e(isset($template)? $template->collect_fees: old('collect_fees')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.collect_fees'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('collect_fees')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('collect_fees')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('stu_promote') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="stu_promote" maxlength="500"><?php echo e(isset($template)? $template->stu_promote: old('stu_promote')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.promote'); ?> <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('stu_promote')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('stu_promote')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('attendance_sms') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="attendance_sms" maxlength="500"><?php echo e(isset($template)? $template->attendance_sms: old('attendance_sms')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.attendance'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('attendance_sms')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('attendance_sms')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('late_sms') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="late_sms" maxlength="500"><?php echo e(isset($template)? $template->late_sms: old('late_sms')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.late'); ?> <?php echo app('translator')->getFromJson('lang.attendance'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('late_sms')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('late_sms')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('absent') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="absent" maxlength="500"><?php echo e(isset($template)? $template->absent: old('absent')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.absent'); ?> <?php echo app('translator')->getFromJson('lang.attendance'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('absent')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('absent')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('er_checkout') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="er_checkout" maxlength="500"><?php echo e(isset($template)? $template->er_checkout: old('er_checkout')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.early'); ?> <?php echo app('translator')->getFromJson('lang.checkout'); ?>  (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('er_checkout')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('er_checkout')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('st_checkout') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="st_checkout" maxlength="500"><?php echo e(isset($template)? $template->st_checkout: old('st_checkout')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.checkout'); ?>  (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('st_checkout')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('st_checkout')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('st_credentials') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="st_credentials" maxlength="500"><?php echo e(isset($template)? $template->st_credentials: old('st_credentials')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.credentials'); ?>  (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('st_credentials')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('st_credentials')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('staff_credentials') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="staff_credentials" maxlength="500"><?php echo e(isset($template)? $template->staff_credentials: old('staff_credentials')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.staff'); ?> <?php echo app('translator')->getFromJson('lang.credentials'); ?>  (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('staff_credentials')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('staff_credentials')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('holiday') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="holiday" maxlength="500"><?php echo e(isset($template)? $template->holiday: old('holiday')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.holiday'); ?>  (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('holiday')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('holiday')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('leave_app') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="leave_app" maxlength="500"><?php echo e(isset($template)? $template->leave_app: old('leave_app')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.leave'); ?> <?php echo app('translator')->getFromJson('lang.application'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('leave_app')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('leave_app')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('approve_sms') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="approve_sms" maxlength="500"><?php echo e(isset($template)? $template->approve_sms: old('approve_sms')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.leave'); ?>  <?php echo app('translator')->getFromJson('lang.approve'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('approve_sms')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('approve_sms')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('birth_st') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="birth_st" maxlength="500"><?php echo e(isset($template)? $template->birth_st: old('birth_st')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.birthday'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('birth_st')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('birth_st')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('birth_staff') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="birth_staff" maxlength="500"><?php echo e(isset($template)? $template->birth_staff: old('birth_staff')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.staff'); ?> <?php echo app('translator')->getFromJson('lang.birthday'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('birth_staff')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('birth_staff')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('cheque_bounce') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="cheque_bounce" maxlength="500"><?php echo e(isset($template)? $template->cheque_bounce: old('cheque_bounce')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.cheque_bounce'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('cheque_bounce')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('cheque_bounce')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('l_issue_b') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="l_issue_b" maxlength="500"><?php echo e(isset($template)? $template->l_issue_b: old('l_issue_b')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.library_book_issue'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('l_issue_b')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('l_issue_b')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control<?php echo e($errors->has('re_issue_book') ? ' is-invalid' : ''); ?>" cols="0" rows="2" name="re_issue_book" maxlength="500"><?php echo e(isset($template)? $template->re_issue_book: old('re_issue_book')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.return'); ?> <?php echo app('translator')->getFromJson('lang.issue_books'); ?> (<?php echo app('translator')->getFromJson('lang.sms'); ?>) <span></span></label>
                                            <span class="focus-border textarea"></span>

                                            <?php if($errors->has('re_issue_book')): ?>
                                                <span class="error text-danger"><strong><?php echo e($errors->first('re_issue_book')); ?></strong></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                

                               
	                           <?php 
                                  $tooltip = "";
                                  if(in_array(50, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ){
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/resources/views/backEnd/systemSettings/sms_template.blade.php ENDPATH**/ ?>