<?php
    if (Auth::user() == "") { header('location:' . url('/login')); exit(); }



    Session::put('permission', App\GlobalVariable::GlobarModuleLinks());



    if(Module::find('FeesCollection')){
        $module = Module::find('FeesCollection');
        $module_name = @$module->getName();
        $module_status = @$module->isDisabled();
    }else{
        $module_name =NULL;
        $module_status =TRUE;
    }
         



// dd($main_modules);
?>
<input type="hidden" name="url" id="url" value="<?php echo e(url('/')); ?>">
<nav id="sidebar">
    <div class="sidebar-header update_sidebar">
        <a href="<?php echo e(url('/')); ?>">
            <img  src="<?php echo e(file_exists(@$generalSetting->logo) ? asset($generalSetting->logo) : asset('public/uploads/settings/logo.png')); ?>" alt="logo">
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>
    </div>
    
    <ul class="list-unstyled components">
 

    <li>

        <?php if(Auth::user()->role_id == 1): ?>
            <a href="<?php echo e(url('/superadmin-dashboard')); ?>" id="admin-dashboard">
        <?php else: ?>
            <a href="<?php echo e(url('/admin-dashboard')); ?>" id="admin-dashboard">
        <?php endif; ?>
        
            <span class="flaticon-speedometer"></span>
            <?php echo app('translator')->getFromJson('lang.dashboard'); ?>
        </a>
    </li>

     <li>
        <a href="#subMenuStudentRegistration" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <span class="flaticon-reading"></span>
            <?php echo app('translator')->getFromJson('lang.registration'); ?>
        </a>
        <ul class="collapse list-unstyled" id="subMenuStudentRegistration">
           
                <li>
                    <a href="<?php echo e(url('parentregistration/saas-student-list')); ?>"> <?php echo app('translator')->getFromJson('lang.student_list'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(url('parentregistration/settings')); ?>"> <?php echo app('translator')->getFromJson('lang.settings'); ?></a>
                </li>
            </ul>
    </li>
    <li>
        <a href="#subMenuAdministrator" data-toggle="collapse" aria-expanded="false"
            class="dropdown-toggle">
            <span class="flaticon-analytics"></span>
            <?php echo app('translator')->getFromJson('lang.institution'); ?>
            
        </a>
        <ul class="collapse list-unstyled" id="subMenuAdministrator">
            <li>
                <a href="<?php echo e(url('administrator/institution-list')); ?>"><?php echo app('translator')->getFromJson('lang.institution'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></a>
            </li>
        </ul>
    </li>
    
    
    
    
    
    <li>
    <a href="#subMenuCommunicate" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">
        <span class="flaticon-email"></span>
        <?php echo app('translator')->getFromJson('lang.communicate'); ?>
    </a>
    <ul class="collapse list-unstyled" id="subMenuCommunicate">
        <li>
            <a href="<?php echo e(url('administrator/send-mail')); ?>"><?php echo app('translator')->getFromJson('lang.send'); ?> <?php echo app('translator')->getFromJson('lang.mail'); ?></a>
            <a href="<?php echo e(url('administrator/send-sms')); ?>"><?php echo app('translator')->getFromJson('lang.send'); ?> <?php echo app('translator')->getFromJson('lang.sms'); ?></a>
            <a href="<?php echo e(url('administrator/send-notice')); ?>"><?php echo app('translator')->getFromJson('lang.send'); ?> <?php echo app('translator')->getFromJson('lang.notice'); ?></a>
        </li>
    </ul>
    </li>
    
    <li>
    <a href="#subMenuInfixInvoice" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <span class="flaticon-accounting"></span> Reports </a>
    <ul class="collapse list-unstyled" id="subMenuInfixInvoice">
        <li><a href="<?php echo e(url('administrator/student-list')); ?>"><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/income-expense')); ?>"><?php echo app('translator')->getFromJson('lang.income'); ?>/<?php echo app('translator')->getFromJson('lang.expense'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/teacher-list')); ?>"><?php echo app('translator')->getFromJson('lang.teacher'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/class-list')); ?>"><?php echo app('translator')->getFromJson('lang.class'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/class-routine')); ?>"><?php echo app('translator')->getFromJson('lang.class'); ?> <?php echo app('translator')->getFromJson('lang.routine'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/student-attendance')); ?>"><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.attendance'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/staff-attendance')); ?>"><?php echo app('translator')->getFromJson('lang.staff'); ?> <?php echo app('translator')->getFromJson('lang.attendance'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/merit-list-report')); ?>"><?php echo app('translator')->getFromJson('lang.merit_list_report'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/mark-sheet-report-student')); ?>"><?php echo app('translator')->getFromJson('lang.mark_sheet_report'); ?></a></li>
        <li><a href="<?php echo e(url('administrator/tabulation-sheet-report')); ?>"><?php echo app('translator')->getFromJson('lang.tabulation_sheet_report'); ?></a></li>
    
        <li><a href="<?php echo e(url('administrator/progress-card-report')); ?>">Progress Card Report</a></li>
    </ul>
    </li>
    <li>
    <a href="#subMenusystemSettings" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">
        <span class="flaticon-settings"></span>
        <?php echo app('translator')->getFromJson('lang.system_settings'); ?>
    </a>
    <ul class="collapse list-unstyled" id="subMenusystemSettings">
        
            <li>
                <a href="<?php echo e(url('manage-adons')); ?>"><?php echo app('translator')->getFromJson('lang.module'); ?> <?php echo app('translator')->getFromJson('lang.manager'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('administrator/general-settings')); ?>"> <?php echo app('translator')->getFromJson('lang.general_settings'); ?></a>
            </li>
        
            <li>
                <a href="<?php echo e(url('administrator/email-settings')); ?>"><?php echo app('translator')->getFromJson('lang.email_settings'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('sms-settings')); ?>"><?php echo app('translator')->getFromJson('lang.sms_settings'); ?></a>
            </li>
    
            <li>
                <a href="<?php echo e(url('administrator/manage-currency')); ?>"><?php echo app('translator')->getFromJson('lang.manage-currency'); ?></a>
            </li>
            
        
            
        
        
            
        
            
        
            
        
            
        
            <li>
                <a href="<?php echo e(url('administrator/base-setup')); ?>"><?php echo app('translator')->getFromJson('lang.base_setup'); ?></a>
            </li>
        
            
        
            
            

            <?php if(@in_array(152, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="<?php echo e(route('payment_method')); ?>"> <?php echo app('translator')->getFromJson('lang.payment_method'); ?></a>
                </li>
            <?php endif; ?>

            <li>
                <a href="<?php echo e(url('payment-method-settings')); ?>"><?php echo app('translator')->getFromJson('lang.payment_method_settings'); ?></a>
            </li>
            
            <li>
                <a href="<?php echo e(url('language-list')); ?>"><?php echo app('translator')->getFromJson('lang.language'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('administrator/language-settings')); ?>"><?php echo app('translator')->getFromJson('lang.language_settings'); ?></a>
            </li>
        
            <li>
                <a href="<?php echo e(url('administrator/backup-settings')); ?>"><?php echo app('translator')->getFromJson('lang.backup_settings'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('button-disable-enable')); ?>"><?php echo app('translator')->getFromJson('lang.button'); ?> <?php echo app('translator')->getFromJson('lang.manage'); ?> </a>
            </li>
            <li>
                <a href="<?php echo e(url('templatesettings/email-template')); ?>"><?php echo app('translator')->getFromJson('lang.email'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('sms-template')); ?>"><?php echo app('translator')->getFromJson('lang.sms'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('about-system')); ?>"><?php echo app('translator')->getFromJson('lang.about'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('update-system')); ?>"><?php echo app('translator')->getFromJson('lang.update'); ?></a>
            </li>
        
            
        
        
    
    </ul>
    </li>
    
    
    
    
                    <li>
                        <a href="#subMenusystemStyle" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <span class="flaticon-settings"></span>
                            <?php echo app('translator')->getFromJson('lang.style'); ?>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenusystemStyle">
                                <li>
                                    <a href="<?php echo e(url('background-setting')); ?>"><?php echo app('translator')->getFromJson('lang.background_settings'); ?></a>
                                    
                                </li>
                                <li>
                                    <a href="<?php echo e(url('color-style')); ?>"><?php echo app('translator')->getFromJson('lang.color'); ?> <?php echo app('translator')->getFromJson('lang.theme'); ?></a>
                                    
                                </li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="#subMenuApi" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <span class="flaticon-settings"></span>
                            <?php echo app('translator')->getFromJson('lang.api'); ?>
                            <?php echo app('translator')->getFromJson('lang.permission'); ?>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenuApi">
                                <li>
                                    <a href="<?php echo e(url('administrator/api/permission')); ?>"><?php echo app('translator')->getFromJson('lang.api'); ?> <?php echo app('translator')->getFromJson('lang.permission'); ?> </a>
                                </li>
                        </ul>
                    </li>
    
    
    
                    
    
    
    <li>
    <a href="#Ticket" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <span class="flaticon-settings"></span>
        <?php echo app('translator')->getFromJson('lang.ticket_system'); ?>
    </a>
    <ul class="collapse list-unstyled" id="Ticket">
        <li><a href="<?php echo e(url('ticket-category')); ?>"> <?php echo app('translator')->getFromJson('lang.ticket_category'); ?></a></li>
        <li><a href="<?php echo e(url('ticket-priority')); ?>"><?php echo app('translator')->getFromJson('lang.ticket_priority'); ?></a></li>
        <li><a href="<?php echo e(url('admin/ticket-view')); ?>"><?php echo app('translator')->getFromJson('lang.ticket_list'); ?></a> </li> 
    </ul>
    </li>
    
    
    
    
    
    

       
        
        
        
        
            


    </ul>
</nav>
<?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/resources/views/backEnd/partials/saas_menu.blade.php ENDPATH**/ ?>