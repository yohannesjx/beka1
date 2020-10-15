<?php $__env->startSection('mainContent'); ?>

<?php
    function showPicName($data){
        $name = explode('/', $data);
        return $name[4];
    }
?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.examinations'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#">Examinations</a>
                <a href="<?php echo e(route('student_result')); ?>"><?php echo app('translator')->getFromJson('lang.result'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row">

            <!-- Start Student Details -->
            <div class="col-lg-12">
                <div class="main-title">
                    <h3 class="mb-20"><?php echo app('translator')->getFromJson('lang.exam_result'); ?></h3>
                </div>

                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="white-box no-search no-paginate no-table-info mb-2">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo e((@$exam->exam)!=''?@$exam->exam->name:''); ?></h3>
                        </div>
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('lang.subject'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.full_marks'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.passing_marks'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.obtained_marks'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.results'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    @$marks = App\SmStudent::marks(@$exam->exam_id, @$student_detail->id);
                                    @$grand_total = 0;
                                    @$grand_total_marks = 0;
                                    @$result = 0;

                                ?>
                                <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        @$subject_marks = App\SmStudent::fullMarks(@$exam->id, @$mark->subject_id);
                                        @$result_subject = 0;
                                        @$grand_total_marks += @$subject_marks->full_mark;
                                        if(@$mark->abs == 0){
                                            @$grand_total += @$mark->marks;
                                            if(@$mark->marks < @$subject_marks->pass_mark){
                                               @$result_subject++;
                                               @$result++;
                                            }

                                        }else{
                                            @$result_subject++;
                                            @$result++;
                                        }
                                    ?>
                                <tr>
                                    <td><?php echo e(@$mark->subject !=""?@$mark->subject->subject_name:""); ?></td>
                                    <td><?php echo e(@$subject_marks->full_mark); ?></td>
                                    <td><?php echo e(@$subject_marks->pass_mark); ?></td>
                                    <td><?php echo e(@$mark->marks); ?></td>
                                    <td>
                                        <?php if(@$result_subject == 0): ?>
                                            <span class="primary-btn small bg-success text-white border-0">Pass</span>
                                        <?php else: ?>
                                            <span class="primary-btn small bg-danger text-white border-0">Fail</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <?php if(count(@$marks) != ""): ?>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Grand Total: <?php echo e(@$grand_total); ?>/<?php echo e(@$grand_total_marks); ?></th>
                                    <th></th>
                                    <th>Grade: 
                                        <?php
                                            if(@$result == 0){
                                                @$percent = @$grand_total/@$grand_total_marks*100;
                                                foreach($grades as $grade){
                                                   if(floor(@$percent) >= @$grade->percent_from && floor(@$percent) <= @$grade->percent_upto){
                                                       echo @$grade->grade_name;
                                                   }
                                                }
                                            }else{
                                                echo "F";
                                            }
                                        ?>
                                    </th>
                                </tr>
                            </tfoot>
                            <?php endif; ?>
                        </table>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
            </div>
            <!-- End Student Details -->
        </div>

            
    </div>
</section>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/studentPanel/student_result.blade.php ENDPATH**/ ?>