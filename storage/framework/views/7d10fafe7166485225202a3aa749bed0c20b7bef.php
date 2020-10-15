<?php $__env->startSection('mainContent'); ?>
    <?php
        function showPicName($data){
        $name = explode('/', $data);
        return $name[3];
        }
    ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.homework_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.home_work'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.homework_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
 
    <div class="row mt-40">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo app('translator')->getFromJson('lang.homework_list'); ?></h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                        <thead>
                            
                            <?php if(session()->has('message-success') != "" ||
                            session()->get('message-danger') != ""): ?>
                            <tr>
                                <td colspan="9">
                                     <?php if(session()->has('message-success')): ?>
                                      <div class="alert alert-success">
                                          <?php echo e(session()->get('message-success')); ?>

                                      </div>
                                    <?php elseif(session()->has('message-danger')): ?>
                                      <div class="alert alert-danger">
                                          <?php echo e(session()->get('message-danger')); ?>

                                      </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                             <?php endif; ?>
                            
                            <tr>
                                <th><?php echo app('translator')->getFromJson('lang.class'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.section'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.subject'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.marks'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.homework_date'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.submission_date'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.evaluation_date'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.obtained_marks'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.status'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $homeworkLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                               $student_result = App\SmHomework::evaluationHomework(@$student_detail->id, @$value->id);


                               $uploadedContent = App\SmHomework::uploadedContent(@$student_detail->id, @$value->id);
                            ?>
                          
                            <tr>
                                <td><?php echo e(@$value->classes !=""?@$value->classes->class_name:""); ?></td>
                                <td><?php echo e(@$value->sections !=""?@$value->sections->section_name:""); ?></td>
                                <td><?php echo e(@$value->subjects !=""?@$value->subjects->subject_name:""); ?></td>
                                <td><?php echo e(@$value->marks); ?></td>
                                 <td  data-sort="<?php echo e(strtotime(@$value->homework_date)); ?>" >
                                   <?php echo e(@$value->homework_date != ""? App\SmGeneralSettings::DateConvater(@$value->homework_date):''); ?>


                                </td>
                                 <td  data-sort="<?php echo e(strtotime(@$value->submission_date)); ?>" >
                                    <?php echo e(@$value->submission_date != ""? App\SmGeneralSettings::DateConvater(@$value->submission_date):''); ?>


                                </td>
                                <td  data-sort="<?php echo e(strtotime(@$value->evaluation_date)); ?>" >
                                <?php if(!empty(@$value->evaluation_date)): ?>
                               <?php echo e(@$value->evaluation_date != ""? App\SmGeneralSettings::DateConvater(@$value->evaluation_date):''); ?>



                                <?php endif; ?>
                                </td>

                                
                               <td><?php echo e(@$student_result != ""? @$student_result->marks:''); ?></td>
                                <td>
                                    <?php if(@$student_result != ""): ?>
                                        
                                        <?php if(@$student_result->complete_status == "C"): ?>
                                        <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->getFromJson('lang.completed'); ?></button>
                                        <?php else: ?>
                                        <button class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->getFromJson('lang.incompleted'); ?></button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            Select
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">

                                         <a class="dropdown-item modalLink" title="Homework View" data-modal-size="modal-lg" href="<?php echo e(route('student_homework_view', [@$value->class_id, @$value->section_id, @$value->id])); ?>"><?php echo app('translator')->getFromJson('lang.view'); ?></a>

                                         <?php if($uploadedContent == ""): ?>

                                          <a class="dropdown-item modalLink" title="Add Homework content" data-modal-size="modal-lg" href="<?php echo e(url('add-homework-content', [@$value->id])); ?>">
                                            <?php echo app('translator')->getFromJson('lang.add_content'); ?></a>

                                          <?php else: ?>

                                          

                                          <a class="dropdown-item modalLink" title="Delete Homework content" data-modal-size="modal-md" href="<?php echo e(url('deleteview-homework-content', [@$value->id])); ?>">
                                            <?php echo app('translator')->getFromJson('lang.delete_uploaded_content'); ?></a>


                                          <a class="dropdown-item"
                                                               href="<?php echo e(url('download-uploaded-content/'.$value->id.'/'.Auth::user()->id)); ?>">
                                                                <?php echo app('translator')->getFromJson('lang.download_uploaded_content'); ?> <span
                                                                    class="pl ti-download"></span>
                                          </a>

                                          <?php endif; ?>


                                        </div>
                                    </div>
                                </td>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/studentPanel/student_homework.blade.php ENDPATH**/ ?>