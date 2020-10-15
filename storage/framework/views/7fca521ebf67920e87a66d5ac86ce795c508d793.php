<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.teachers'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.teachers'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.teachers'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
       
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->getFromJson('lang.teacher'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                                <tr> 
                                    <th><?php echo app('translator')->getFromJson('lang.teacher'); ?> <?php echo app('translator')->getFromJson('lang.name'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.email'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.phone'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr> 
                                    <td>
                                        <img src="<?php echo e(asset(@$value->teacher->staff_photo)); ?>" class="img img-thumbnail" style="width: 60px; height: auto;">
                                        <?php echo e(@$value->teacher !=""?@$value->teacher->full_name:""); ?>

                                    </td> 
                                    <td><?php echo e(@$value->teacher !=""?@$value->teacher->email:""); ?></td>
                                    <td><?php echo e(@$value->teacher !=""?@$value->teacher->mobile:""); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/studentPanel/studentTeacher.blade.php ENDPATH**/ ?>