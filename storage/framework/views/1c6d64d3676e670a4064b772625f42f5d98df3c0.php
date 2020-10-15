<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1><?php echo app('translator')->getFromJson('lang.issue_books'); ?></h1>
      <div class="bc-pages">
        <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
        <a href="#"><?php echo app('translator')->getFromJson('lang.library'); ?></a>
        <a href="<?php echo e(url('member-list')); ?>"><?php echo app('translator')->getFromJson('lang.member'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></a>
      </div>
    </div>
  </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
  <div class="container-fluid p-0">

    <div class="row mt-40">
      <div class="col-lg-12">
        <?php echo $__env->make('backEnd.partials.alertMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
         <div class="col-lg-12">
          <table id="table_id" class="display school-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="15%"><?php echo app('translator')->getFromJson('lang.member'); ?> <?php echo app('translator')->getFromJson('lang.id'); ?></th>
                <th width="15%"><?php echo app('translator')->getFromJson('lang.full_name'); ?></th>
                <th width="15%"><?php echo app('translator')->getFromJson('lang.member_type'); ?></th>
                <th width="15%"><?php echo app('translator')->getFromJson('lang.phone'); ?></th>
                <th width="15%"><?php echo app('translator')->getFromJson('lang.email'); ?></th>
                <th width="15%"><?php echo app('translator')->getFromJson('lang.action'); ?></th>
              </tr>
            </thead>

            <tbody>
               <?php $__currentLoopData = $activeMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($value->member_ud_id); ?></td>

                

                <td>
                  
                  <?php if($value->member_type == '2'): ?>
                      <?php echo e($value->studentDetails != ""? $value->studentDetails->full_name:''); ?>

                  <?php else: ?>
                      <?php echo e($value->staffDetails != ""? $value->staffDetails->full_name:''); ?>

                  <?php endif; ?>
                  
                </td>

                <td><?php echo e($value->memberTypes->name); ?></td>
                <td>
                  <?php if($value->member_type == '2'): ?>
                      <?php echo e($value->studentDetails != ""? $value->studentDetails->mobile:''); ?>

                  <?php else: ?>
                      <?php echo e($value->staffDetails != ""? $value->staffDetails->mobile:''); ?>

                  <?php endif; ?>
                  
                  </td>
                <td>
                  <?php if($value->member_type == '2'): ?>
                      <?php echo e($value->studentDetails != ""? $value->studentDetails->email:''); ?>

                  <?php else: ?>
                      <?php echo e($value->staffDetails != ""? $value->staffDetails->email:''); ?>

                  <?php endif; ?>
                    
                </td>
                <td>
                  <div class="dropdown">
                    <a class="primary-btn fix-gr-bg" href="<?php echo e(url('issue-books/'.$value->member_type.'/'.$value->student_staff_id)); ?>"><?php echo app('translator')->getFromJson('lang.issue_return_Book'); ?></a>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/library/memberLists.blade.php ENDPATH**/ ?>