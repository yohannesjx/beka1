 <?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.send'); ?> <?php echo app('translator')->getFromJson('lang.sms'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.communicate'); ?></a>
                <a href="#"> <?php echo app('translator')->getFromJson('lang.send'); ?> <?php echo app('translator')->getFromJson('lang.sms'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->getFromJson('lang.send'); ?> <?php echo app('translator')->getFromJson('lang.sms'); ?> </h3>
                </div>
            </div>

        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'administrator/send-email', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12">
                <?php if(session()->has('message-success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message-success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <?php elseif(session()->has('message-danger')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session()->get('message-danger')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-7">
                        <div class="white-box">
                            <div class="">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-effect mb-30">
                     <input class="primary-input form-control<?php echo e($errors->has('email_subject') ? ' is-invalid' : ''); ?>" type="text" name="email_title" autocomplete="off" value="<?php echo e(old('email_title')); ?>">
                                            <label><?php echo app('translator')->getFromJson('lang.subject'); ?> <span>*</span> </label>
                                            <span class="focus-border"></span> <?php if($errors->has('email_subject')): ?>
                                            <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('email_subject')); ?></strong>
                        </span> <?php endif; ?>
                                        </div>

                                        <div class="input-effect">
                                            <textarea class="primary-input form-control <?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" cols="0" rows="4" name="description" id="details"><?php echo e(old('description')); ?></textarea>
                                            <label><?php echo app('translator')->getFromJson('lang.description'); ?> <span>*</span> </label>
                                            <span class="focus-border textarea"></span> <?php if($errors->has('description')): ?>
                                            <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('description')); ?></strong>
                        </span> <?php endif; ?>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">

                        <div class="row student-details">

                            <!-- Start Sms Details -->
                            <div class="col-lg-12">
                               

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <input type="hidden" name="selectTab" id="selectTab">
                                   
                                    
                    

                                    <!-- Start Class Section Tab -->
                                    <div>
                                        <div class="white-box">

                                            <div class="row mb-35">
                                                <?php if(session()->has('error-message')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(session()->get('error-message')); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php endif; ?>

                                                <div class="col-lg-12">
                                                    <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>" name="school_id" id="class_id_email_sms">
                                                        <option data-display="<?php echo app('translator')->getFromJson('lang.select'); ?> <?php echo app('translator')->getFromJson('lang.one'); ?>" value=""><?php echo app('translator')->getFromJson('lang.select'); ?> <?php echo app('translator')->getFromJson('lang.one'); ?></option>
                                                  
                                                    <?php $__currentLoopData = $institutions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->school_name); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                   
                                                </div>

                                                <div class="col-lg-12 mt-30" id="selectSectionsDiv">
                                                <label for="checkbox" class="mb-2"><?php echo app('translator')->getFromJson('lang.or'); ?></label>
                                                    
                                                    <div class="">
                                                    <input type="checkbox" id="select_all" class="common-checkbox" name="select_all">
                                                    <label for="select_all" class="mt-3"><?php echo app('translator')->getFromJson('lang.select_all'); ?></label>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
                <div class="white-box mt-30">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button class="primary-btn fix-gr-bg">
                                <span class="ti-check"></span> <?php echo app('translator')->getFromJson('lang.send'); ?>
                            </button>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/Modules/Saas/Resources/views/superadminReport/sendSms.blade.php ENDPATH**/ ?>