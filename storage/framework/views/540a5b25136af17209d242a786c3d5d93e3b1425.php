<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.teacher_class_routine_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.reports'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.teacher_class_routine_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->getFromJson('lang.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if(session()->has('message-success') != ""): ?>
                        <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(session()->has('message-danger') != ""): ?>
                        <?php if(session()->has('message-danger')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('message-danger')); ?>

                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'teacher-class-routine-report', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-12 mt-30-md">
                                    <select class="w-100 bb niceSelect form-control <?php echo e($errors->has('teacher') ? ' is-invalid' : ''); ?>" name="teacher">
                                        <option data-display="<?php echo app('translator')->getFromJson('lang.select_teacher'); ?> *" value=""><?php echo app('translator')->getFromJson('lang.select_teacher'); ?> *</option>
                                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($teacher->id); ?>" <?php echo e(isset($teacher_id)? ($teacher_id == $teacher->id? 'selected':''):''); ?>><?php echo e($teacher->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('teacher')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('teacher')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->getFromJson('lang.search'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
    </div>
</section>

<?php if(isset($class_times)): ?>
<section class="mt-20">
    <div class="container-fluid p-0">
        <div class="row mt-40">
            <div class="col-lg-6 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->getFromJson('lang.class_routine'); ?></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="display school-table school-table-style" cellspacing="0" width="100%">
                    <thead>
                        <?php if(session()->has('success') != ""): ?>
                        <tr>
                            <td colspan="8">
                                <div class="alert alert-success">
                                    <?php echo e(session()->get('success')); ?>

                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th>Class Period</th>
                            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo e($sm_weekend->name); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $class_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <tr>
                            <td><?php echo e($class_time->period); ?><br><?php echo e(date('h:i A', strtotime($class_time->start_time)).' - '.date('h:i A', strtotime($class_time->end_time))); ?></td>

                            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <td>
                                <?php if($class_time->is_break == 0): ?>
                                <?php if($sm_weekend->is_weekend != 1): ?>


                                <?php
                                    $assinged_class_routine = App\SmClassRoutineUpdate::teacherAssingedClassRoutine($class_time->id, $sm_weekend->id, $teacher_id);
                                ?>
                                <?php if($assinged_class_routine == ""): ?>
                                N/A
                                <?php else: ?>
                                    <span class=""><strong><?php echo e($assinged_class_routine->subject->subject_name); ?></strong></span>
                                    <br>
                                    <span class="">class: <?php echo e($assinged_class_routine->class->class_name); ?></span><br>
                                    <span class="">section : <?php echo e($assinged_class_routine->section->section_name); ?></span></br>
                                    <span class=""><?php echo e($assinged_class_routine->classRoom->room_no); ?></span></br>
                                    
                                <?php endif; ?>   
                                <?php else: ?>
                                        <?php echo app('translator')->getFromJson('lang.weekend'); ?>

                                <?php endif; ?>
                                <?php endif; ?>
                            </td>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/reports/teacher_class_routine_report.blade.php ENDPATH**/ ?>