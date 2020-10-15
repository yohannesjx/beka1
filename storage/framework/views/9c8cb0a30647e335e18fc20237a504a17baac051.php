<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
    #selectStaffsDiv, .forStudentWrapper{
        display: none;
    }
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background: linear-gradient(90deg, #7c32ff 0%, #c738d8 51%, #7c32ff 100%);
}

input:focus + .slider {
  box-shadow: 0 0 1px linear-gradient(90deg, #7c32ff 0%, #c738d8 51%, #7c32ff 100%);
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    <section class="sms-breadcrumb mb-40 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->getFromJson('lang.institution'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->getFromJson('lang.system_settings'); ?></a>
                    <a href="#"><?php echo app('translator')->getFromJson('lang.institution'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                <div class='row'>
                    <div class="offset-lg-9 col-lg-3 text-right mb-20">
                                    <a href="<?php echo e(url('administrator/institution-create')); ?>" class="primary-btn small fix-gr-bg">
                                        <span class="ti-plus pr-2"></span>
                                        <?php echo app('translator')->getFromJson('lang.add'); ?> <?php echo app('translator')->getFromJson('lang.new'); ?>
                                    </a>
                                </div>
                </div>
                 
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class="main-title">
                                        <h3 class="mb-0">
                                            <?php echo app('translator')->getFromJson('lang.institution'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?>
                                        </h3>
                                    </div>
                                </div>
                                
                            </div>




                                <div class="row mt-20">
                                    <div class="col-lg-12 white-box">

                                        <table id="table_id1" class="display school-table" cellspacing="0" width="100%">

                                            <thead>
                                            <?php if(session()->has('message-success-delete') != "" ||
                                             session()->get('message-danger-delete') != ""): ?>
                                                <tr>
                                                    <td colspan="3">
                                                        <?php if(session()->has('message-success-delete')): ?>
                                                            <div class="alert alert-success">
                                                                <?php echo e(session()->get('message-success-delete')); ?>

                                                            </div>
                                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                                            <div class="alert alert-danger">
                                                                <?php echo e(session()->get('message-danger-delete')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>


                                            <tr>
                                                <th><?php echo app('translator')->getFromJson('lang.sl'); ?></th>
                                                <th><?php echo app('translator')->getFromJson('lang.name'); ?></th>
                                                <th><?php echo app('translator')->getFromJson('lang.email'); ?></th>
                                                <th><?php echo app('translator')->getFromJson('lang.start_date'); ?></th>
                                                <th><?php echo app('translator')->getFromJson('lang.details'); ?></th>
                                             
                                                <th><?php echo app('translator')->getFromJson('lang.is_approved'); ?></th>

                                                <th><?php echo app('translator')->getFromJson('lang.login'); ?> <?php echo app('translator')->getFromJson('lang.access'); ?></th>
                                                <th><?php echo app('translator')->getFromJson('lang.action'); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count=1; ?> 
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id='<?php echo e($row->id); ?>'>
                                                    <td><?php echo e(@$count++); ?></td>
                                                    <td><?php echo e(@$row->school_name); ?></td>
                                                    <td> <?php echo e(@$row->email); ?> </td>

                                                    <td data-sort="<?php echo e($row->starting_date); ?>">
                                                        <?php echo e(@$row->starting_date != ""? App\SmGeneralSettings::DateConvater($row->starting_date):''); ?></td>
                                                   

                                                    <td>
                                                        <a href="<?php echo e(url('administrator/institution-details', @$row->id)); ?>">
                                                            <span class="ti-view-grid icongrediant"></span>
                                                        </a>
                                                    </td>
                                                     <td>
                                                        

                                                          <label class="switch">
                                                              <input type="checkbox"
                                                                     class="switch-input-institution-approve" <?php echo e(@$row->active_status == 1? 'checked':''); ?>>
                                                              <span class="slider round"></span>
                                                          </label>


                                                    </td>

                                                    <td>
                                                        

                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                       class="switch-input-institution-enable" <?php echo e(@$row->is_enabled == 'yes'? 'checked':''); ?>>
                                                                <span class="slider round"></span>
                                                            </label>


                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <?php echo app('translator')->getFromJson('lang.select'); ?>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="<?php echo e(url('administrator/institution-edit', [$row->id])); ?>"><?php echo app('translator')->getFromJson('lang.edit'); ?></a>
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
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo e(url('/')); ?>/Modules\Saas\Resources\assets\js\saas.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/Modules/Saas/Resources/views/institute/insitutionList.blade.php ENDPATH**/ ?>