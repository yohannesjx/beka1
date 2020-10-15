                    <?php if(@in_array(399, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                        <li>
                            <a href="<?php echo e(url('manage-adons')); ?>"><?php echo app('translator')->getFromJson('lang.module'); ?> <?php echo app('translator')->getFromJson('lang.manager'); ?></a>
                        </li>
                    <?php endif; ?>

                        <?php if(@in_array(401, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <li>
                                    <a href="<?php echo e(url('manage-currency')); ?>"><?php echo app('translator')->getFromJson('lang.manage'); ?> <?php echo app('translator')->getFromJson('lang.currency'); ?></a>
                                </li>
                        <?php endif; ?>

                       <?php if(in_array(410, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('email-settings')); ?>"><?php echo app('translator')->getFromJson('lang.email_settings'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(152, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('payment_method')); ?>"> <?php echo app('translator')->getFromJson('lang.payment_method'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(412, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('payment-method-settings')); ?>"><?php echo app('translator')->getFromJson('lang.payment_method_settings'); ?></a>
                            </li>
                        <?php endif; ?>

                       <?php if(@in_array(428, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                                <li>
                                    <a href="<?php echo e(route('base_setup')); ?>"><?php echo app('translator')->getFromJson('lang.base_setup'); ?></a>
                                </li>
                         <?php endif; ?>

                         <?php if(@in_array(549, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('language-list')); ?>"><?php echo app('translator')->getFromJson('lang.language'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(451, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('language-settings')); ?>"><?php echo app('translator')->getFromJson('lang.language_settings'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(456, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('backup-settings')); ?>"><?php echo app('translator')->getFromJson('lang.backup_settings'); ?></a>
                            </li>
                        <?php endif; ?>
                        
                       <?php if(@in_array(444, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('sms-settings')); ?>"><?php echo app('translator')->getFromJson('lang.sms_settings'); ?></a>
                            </li>
                        <?php endif; ?>
                       
                        <?php if(@in_array(463, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('button-disable-enable')); ?>"><?php echo app('translator')->getFromJson('lang.button'); ?> <?php echo app('translator')->getFromJson('lang.manage'); ?> </a>
                            </li>
                        <?php endif; ?>


                        <?php if(@in_array(477, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('about-system')); ?>"><?php echo app('translator')->getFromJson('lang.about'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(478, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('update-system')); ?>"><?php echo app('translator')->getFromJson('lang.update'); ?></a>
                            </li>
                        <?php endif; ?>
                       
                        <?php if(@in_array(480, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('templatesettings/email-template')); ?>"><?php echo app('translator')->getFromJson('lang.email'); ?> <?php echo app('translator')->getFromJson('lang.template'); ?></a>
                            </li>
                            
                        <?php endif; ?>
                        <?php if(@in_array(482, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                        <li>
                            <a href="<?php echo e(url('api/permission')); ?>"><?php echo app('translator')->getFromJson('lang.api'); ?> <?php echo app('translator')->getFromJson('lang.permission'); ?> </a>
                        </li>
                    <?php endif; ?>
<?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/partials/without_saas_school_admin_menu.blade.php ENDPATH**/ ?>