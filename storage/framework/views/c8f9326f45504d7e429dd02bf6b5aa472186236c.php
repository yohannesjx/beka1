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
/* th,td{
    font-size: 9px !important;
    padding: 5px !important

} */
</style>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.module'); ?> <?php echo app('translator')->getFromJson('lang.manage'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.module'); ?> <?php echo app('translator')->getFromJson('lang.manage'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row"> 
            <div class="col-lg-12">
                <div class="row"> 
                    <div class="col-lg-10 col-xs-6 col-md-6 col-6 no-gutters ">
                        <div class="main-title sm_mb_20 sm2_mb_20 md_mb_20 mb-30 " >
                            <h3 class="mb-0"> <?php echo app('translator')->getFromJson('lang.module'); ?> <?php echo app('translator')->getFromJson('lang.manage'); ?></h3>
                        </div>
                    </div> 
                    
                </div>
                 
                <div class="row">
                    <div class="col-lg-12"> 
                        <table class="display school-table school-table-style" cellspacing="0" width="100%">
                            <thead>  
                                <?php if(session()->has('error') != ""): ?>
                                <tr>
                                    <th colspan="4">
                                        <?php if(session()->has('error')): ?>
                                            <div class="alert alert-danger">
                                                <?php echo e(session()->get('error')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </th>
                                </tr>
                                <?php endif; ?> 
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('lang.sl'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.name'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.status'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $count=1; ?> 
                                <?php $__currentLoopData = $is_module_available; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php  
                                    $is_module_available = 'Modules/' . $row->getName(). '/Providers/' .$row->getName(). 'ServiceProvider.php';
                                    if (! file_exists($is_module_available)){
                                        continue; 
                                    }
                                     ?>
                                
                                <tr>
                                <td><?php echo e(@$count++); ?></td>
                                <td>
                                    <a href="<?php echo e(url(strtolower($row->getName()).'/about')); ?>"><?php echo e(@$row->getName()); ?>  </a>
                                </td>
                                <td> 
                                    <?php if(@$row->isDisabled()): ?>
                                        <a  class="primary-btn small <?php echo e(@$row->getName()); ?> bg-warning text-white border-0" href="#"  > <?php echo app('translator')->getFromJson('lang.disable'); ?> </a>
                                    <?php else: ?> 
                                        <a  class="primary-btn small <?php echo e(@$row->getName()); ?> bg-success text-white border-0" href="#"  > <?php echo app('translator')->getFromJson('lang.enable'); ?> </a>
                                    <?php endif; ?> 
                                    </td>
                                    
                                    <td> 

                                        
                                          <?php if(file_exists($is_module_available)): ?> 
                                        <?php 
                                         

                                        $system_settings= App\SmGeneralSettings::find(1);
                                        $configName = $row->getName();
                                        $availableConfig=$system_settings->$configName;
                                          
                                        // dd($availableConfig);
                                        ?>
                                        <?php if($availableConfig==0): ?>
                                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'ManageAddOnsValidation', 'method' => 'POST'])); ?>

                                        <input type="hidden" name="name" value="<?php echo e(@$configName); ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control<?php echo e(@$errors->has('purchase_code') ? ' is-invalid' : ''); ?>" type="text" name="purchase_code" autocomplete="off" value="<?php echo e(old('purchase_code')); ?>">
                                                    <label><?php echo app('translator')->getFromJson('lang.purchase'); ?> <?php echo app('translator')->getFromJson('lang.code'); ?>  <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    <?php if($errors->has('purchase_code')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e(@$errors->first('purchase_code')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="col-lg-12 text-center">
                                                    <?php if(in_array(400, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                                        <button class="primary-btn fix-gr-bg" >
                                                            <span class="ti-check"></span> 
                                                                <?php echo app('translator')->getFromJson('lang.verify'); ?> 
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo e(Form::close()); ?>

                                        <?php else: ?> 
                                            <?php if('RolePermission' != $row->getName() && 'TemplateSettings' != $row->getName() ): ?> 
                                                <label class="switch">
                                                    <input type="checkbox" id="ch<?php echo e(@$row->getName()); ?>" onclick="changeModule(`<?php echo e(@$row->getName()); ?>`)" 
                                                    class="switch-input" <?php echo e(@$row->isDisabled() == true? '':'checked'); ?>>
                                                    <span class="slider round"></span>
                                                </label>  
                                            <?php else: ?>
                                            <p class="primary-btn fix-gr-bg small">Defautl</p> 
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php else: ?>
                                        <?php Module::find($row->getName())->disable(); ?> 
                                        <a href="https://spondonit.com/contact/" class="primary-btn fix-gr-bg small">Buy Now </a>
                                        <?php endif; ?>
                                        
                                    </td>


                                </tr> 

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/systemSettings/ManageAddOns.blade.php ENDPATH**/ ?>