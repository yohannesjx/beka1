<?php
    use App\SmGeneralSettings; 
    $school_settings= SmGeneralSettings::where('school_id',Auth::user()->school_id)->first();
    if (Auth::user() == "") { header('location:' . url('/login')); exit(); }
    Session::put('permission', App\GlobalVariable::GlobarModuleLinks());
?>
<?php if(SmGeneralSettings::isModule('Saas')== TRUE && Auth::user()->is_administrator=="yes" && Session::get('isSchoolAdmin')==FALSE ): ?>
    <?php echo $__env->make('backEnd/partials/saas_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php else: ?>




<input type="hidden" name="url" id="url" value="<?php echo e(url('/')); ?>">
<nav id="sidebar">
    <div class="sidebar-header update_sidebar">
        <a href="<?php echo e(url('/')); ?>">
          <img  src="<?php echo e(file_exists(@$school_settings->logo) ? asset($school_settings->logo) : asset('public/uploads/settings/logo.png')); ?>" alt="logo">
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>
    </div>
    
    <ul class="list-unstyled components">
        <?php if(Auth::user()->role_id != 2 && Auth::user()->role_id != 3 ): ?>

            <?php if(@in_array(1, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
    
                <li>
                    <a href="<?php echo e(url('/admin-dashboard')); ?>" id="admin-dashboard">
                        <span class="flaticon-speedometer"></span>
                        <?php echo app('translator')->getFromJson('lang.dashboard'); ?>
                    </a>
                </li>

            <?php endif; ?>

            <?php if(@in_array(11, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuAdmin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-analytics"></span>
                        <?php echo app('translator')->getFromJson('lang.admin_section'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuAdmin">
                        <?php if(@in_array(12, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('admission_query')); ?>"><?php echo app('translator')->getFromJson('lang.admission_query'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(16, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('visitor')); ?>"><?php echo app('translator')->getFromJson('lang.visitor_book'); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(21, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('complaint')); ?>"><?php echo app('translator')->getFromJson('lang.complaint'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(27, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('postal-receive')); ?>"><?php echo app('translator')->getFromJson('lang.postal_receive'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(32, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('postal-dispatch')); ?>"><?php echo app('translator')->getFromJson('lang.postal_dispatch'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(36, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('phone-call')); ?>"><?php echo app('translator')->getFromJson('lang.phone_call_log'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(41, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('setup-admin')); ?>"><?php echo app('translator')->getFromJson('lang.admin_setup'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(49, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('student-certificate')); ?>"><?php echo app('translator')->getFromJson('lang.student_certificate'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(53, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('generate_certificate')); ?>"><?php echo app('translator')->getFromJson('lang.generate_certificate'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(45, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('student-id-card')); ?>"><?php echo app('translator')->getFromJson('lang.student_id_card'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(57, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('generate_id_card')); ?>"><?php echo app('translator')->getFromJson('lang.generate_id_card'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

            <?php endif; ?>

            <?php if(SmGeneralSettings::isModule('ParentRegistration')== TRUE ): ?>
            <?php if(@in_array(542, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
             <li>
                <a href="#subMenuStudentRegistration" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-reading"></span>
                    <?php echo app('translator')->getFromJson('lang.registration'); ?>
                </a>
                <ul class="collapse list-unstyled" id="subMenuStudentRegistration">
                        <?php if(@in_array(543, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                        <li>
                            <a href="<?php echo e(url('parentregistration/student-list')); ?>"> <?php echo app('translator')->getFromJson('lang.student_list'); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if(SmGeneralSettings::isModule('Saas') != TRUE): ?>
                            <?php if(@in_array(547, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('parentregistration/settings')); ?>"> <?php echo app('translator')->getFromJson('lang.settings'); ?></a>
                            </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
            </li>

            <?php endif; ?>
            <?php endif; ?>




            <?php if(@in_array(61, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuStudent" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-reading"></span>
                        <?php echo app('translator')->getFromJson('lang.student_information'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuStudent">
                       
                        <?php if(@in_array(71, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_category')); ?>"> <?php echo app('translator')->getFromJson('lang.student_category'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(64, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_list')); ?>"> <?php echo app('translator')->getFromJson('lang.student_list'); ?></a>
                            </li>
                        <?php endif; ?>


                        <?php if(@in_array(68, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_attendance')); ?>"> <?php echo app('translator')->getFromJson('lang.student_attendance'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(70, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_attendance_report')); ?>"> <?php echo app('translator')->getFromJson('lang.student_attendance_report'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(533, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(route('subject-wise-attendance')); ?>"> <?php echo app('translator')->getFromJson('lang.subject'); ?> <?php echo app('translator')->getFromJson('lang.wise'); ?> <?php echo app('translator')->getFromJson('lang.attendance'); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(535, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('subject-attendance-report')); ?>"> <?php echo app('translator')->getFromJson('lang.subject_attendance_report'); ?> </a>
                            </li>
                        <?php endif; ?>

                         <?php if(@in_array(62, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_admission')); ?>"><?php echo app('translator')->getFromJson('lang.student_admission'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(76, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_group')); ?>"><?php echo app('translator')->getFromJson('lang.student_group'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(81, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_promote')); ?>"><?php echo app('translator')->getFromJson('lang.student_promote'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(83, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('disabled_student')); ?>"><?php echo app('translator')->getFromJson('lang.disabled_student'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


                 <?php if(@in_array(245, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuAcademic" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-graduated-student"></span>
                        <?php echo app('translator')->getFromJson('lang.academics'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuAcademic"> 


                        <?php if(@in_array(537, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(route('optional-subject')); ?>"> <?php echo app('translator')->getFromJson('lang.optional'); ?> <?php echo app('translator')->getFromJson('lang.subject'); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(265, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('section')); ?>"> <?php echo app('translator')->getFromJson('lang.section'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(261, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('class')); ?>"> <?php echo app('translator')->getFromJson('lang.class'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(257, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('subject')); ?>"> <?php echo app('translator')->getFromJson('lang.subjects'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(269, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('class-room')); ?>"> <?php echo app('translator')->getFromJson('lang.class_room'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(273, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('class-time')); ?>"> <?php echo app('translator')->getFromJson('lang.cl_ex_time_setup'); ?></a>
                            </li>
                        <?php endif; ?>
                         <?php if(@in_array(253, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('assign-class-teacher')); ?>"> <?php echo app('translator')->getFromJson('lang.assign_class_teacher'); ?></a>
                            </li>
                        <?php endif; ?>
                         <?php if(@in_array(250, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('assign_subject')); ?>"> <?php echo app('translator')->getFromJson('lang.assign_subject'); ?></a>
                            </li>
                        <?php endif; ?>
                         <?php if(@in_array(246, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('class_routine_new')); ?>"> <?php echo app('translator')->getFromJson('lang.class_routine'); ?></a>

                            </li>
                        <?php endif; ?>

                    <!-- only for teacher -->
                        <?php if(Auth::user()->role_id == 4): ?>
                            <li>
                                <a href="<?php echo e(url('view-teacher-routine')); ?>"><?php echo app('translator')->getFromJson('lang.view'); ?> <?php echo app('translator')->getFromJson('lang.class_routine'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            
            <?php if(@in_array(87, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuTeacher" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-professor"></span>
                        <?php echo app('translator')->getFromJson('lang.study_material'); ?>
                    </a>

                    <ul class="collapse list-unstyled" id="subMenuTeacher">
                        <?php if(@in_array(88, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('upload-content')); ?>"> <?php echo app('translator')->getFromJson('lang.upload_content'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(92, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('assignment-list')); ?>"><?php echo app('translator')->getFromJson('lang.assignment'); ?></a>
                            </li>
                        <?php endif; ?>

                        

                        <?php if(@in_array(100, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('syllabus-list')); ?>"><?php echo app('translator')->getFromJson('lang.syllabus'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(105, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('other-download-list')); ?>"><?php echo app('translator')->getFromJson('lang.other_download'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(108, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
              
                <?php if(SmGeneralSettings::isModule('FeesCollection')== TRUE): ?>
                    <li>
                        <a href="#subMenuFeesCollection" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">
                            <span class="flaticon-wallet"></span>
                            <?php echo app('translator')->getFromJson('lang.fees_collection'); ?>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenuFeesCollection">
                            <li>
                                <a href="<?php echo e(url('feescollection/fees-term')); ?>"> <?php echo app('translator')->getFromJson('lang.fees'); ?> <?php echo app('translator')->getFromJson('lang.term'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('feescollection/fees-type')); ?>">  <?php echo app('translator')->getFromJson('lang.fees_type'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('feescollection/fees-type-assign')); ?>">  <?php echo app('translator')->getFromJson('lang.fees_type'); ?> <?php echo app('translator')->getFromJson('lang.assign'); ?></a>
                            </li> 
                            <li>
                                <a href="<?php echo e(url('feescollection/fine-setup')); ?>"> <?php echo app('translator')->getFromJson('lang.fees'); ?>  <?php echo app('translator')->getFromJson('lang.fine'); ?> <?php echo app('translator')->getFromJson('lang.setup'); ?></a>
                            </li> 
                            <li>
                                <a href="<?php echo e(url('feescollection/fees-discount')); ?>"> <?php echo app('translator')->getFromJson('lang.fees_discount'); ?></a>
                            </li>
        
                            <li>
                                <a href="<?php echo e(url('feescollection/assign-discount')); ?>">  <?php echo app('translator')->getFromJson('lang.assign'); ?> <?php echo app('translator')->getFromJson('lang.discount'); ?></a>
                            </li> 

                            <li>
                                <a href="<?php echo e(url('feescollection/fees-master')); ?>"> <?php echo app('translator')->getFromJson('lang.fees_master'); ?></a>
                            </li>

                            <li>
                                <a href="<?php echo e(route('collect_fees_final')); ?>"><?php echo app('translator')->getFromJson('lang.collect_fees'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('feescollection/term-wise-report')); ?>"> <?php echo app('translator')->getFromJson('lang.term_wise_report'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('feescollection/term-wise-students-report')); ?>"> <?php echo app('translator')->getFromJson('lang.term_wise_report'); ?> <?php echo app('translator')->getFromJson('lang.student'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('feescollection/type-wise-report')); ?>"> <?php echo app('translator')->getFromJson('lang.type_wise_report'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('feescollection/fees-due-report')); ?>">  <?php echo app('translator')->getFromJson('lang.due_wise_report'); ?></a>
                            </li>
        

                        </ul>
                    </li>
                <?php else: ?> 
                    <li>
                        <a href="#subMenuFeesCollection" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">
                            <span class="flaticon-wallet"></span>
                            <?php echo app('translator')->getFromJson('lang.fees_collection'); ?>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenuFeesCollection">
                            <?php if(@in_array(123, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <li>
                                    <a href="<?php echo e(route('fees_group')); ?>"> <?php echo app('translator')->getFromJson('lang.fees_group'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(@in_array(127, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <li>
                                    <a href="<?php echo e(route('fees_type')); ?>"> <?php echo app('translator')->getFromJson('lang.fees_type'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(@in_array(131, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <li>
                                    <a href="<?php echo e(route('fees_discount')); ?>"> <?php echo app('translator')->getFromJson('lang.fees_discount'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(@in_array(118, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <li>
                                    <a href="<?php echo e(url('fees-master')); ?>"> <?php echo app('translator')->getFromJson('lang.fees_master'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(@in_array(109, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <li>
                                    <a href="<?php echo e(route('collect_fees')); ?>"> <?php echo app('translator')->getFromJson('lang.collect_fees'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(@in_array(113, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <li>
                                    <a href="<?php echo e(route('search_fees_payment')); ?>"> <?php echo app('translator')->getFromJson('lang.search_fees_payment'); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(@in_array(116, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                                <li>
                                    <a href="<?php echo e(route('search_fees_due')); ?>"> <?php echo app('translator')->getFromJson('lang.search_fees_due'); ?></a>
                                </li>
                            <?php endif; ?>
                        
                        
                            
                        </ul>
                    </li>
                <?php endif; ?>
                

            <?php endif; ?>
            
            
            <?php if(@in_array(137, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-accounting"></span>
                        <?php echo app('translator')->getFromJson('lang.accounts'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuAccount">
                        <?php if(@in_array(148, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('chart-of-account')); ?>"> <?php echo app('translator')->getFromJson('lang.chart_of_account'); ?></a>
                            </li>
                        <?php endif; ?>
                       
                        <?php if(@in_array(156, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('bank-account')); ?>"> <?php echo app('translator')->getFromJson('lang.bank_account'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(139, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('add_income')); ?>"> <?php echo app('translator')->getFromJson('lang.income'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(138, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('profit')); ?>"> <?php echo app('translator')->getFromJson('lang.profit'); ?></a>
                            </li>
                        <?php endif; ?>
                        
                        <?php if(@in_array(143, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('add-expense')); ?>"> <?php echo app('translator')->getFromJson('lang.expense'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(147, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('search_account')); ?>"> <?php echo app('translator')->getFromJson('lang.search'); ?></a>
                            </li>
                        <?php endif; ?>
                        
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(160, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuHumanResource" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">
                        <span class="flaticon-consultation"></span>
                        <?php echo app('translator')->getFromJson('lang.human_resource'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuHumanResource">
                        <?php if(@in_array(180, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('designation')); ?>"> <?php echo app('translator')->getFromJson('lang.designation'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(184, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('department')); ?>"> <?php echo app('translator')->getFromJson('lang.department'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(161, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('staff_directory')); ?>"> <?php echo app('translator')->getFromJson('lang.staff_directory'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(165, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('staff_attendance')); ?>"> <?php echo app('translator')->getFromJson('lang.staff_attendance'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(169, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('staff_attendance_report')); ?>"> <?php echo app('translator')->getFromJson('lang.staff_attendance_report'); ?></a>
                            </li>
                        <?php endif; ?>


                        <?php if(@in_array(170, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('payroll')); ?>"> <?php echo app('translator')->getFromJson('lang.payroll'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(178, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('payroll-report')); ?>"> <?php echo app('translator')->getFromJson('lang.payroll_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(188, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuLeaveManagement" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">
                        <span class="flaticon-slumber"></span>
                        <?php echo app('translator')->getFromJson('lang.leave'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuLeaveManagement">
                       <?php if(@in_array(203, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('leave-type')); ?>"> <?php echo app('translator')->getFromJson('lang.leave_type'); ?></a>
                            </li>
                        <?php endif; ?>
                         <?php if(@in_array(199, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('leave-define')); ?>"> <?php echo app('translator')->getFromJson('lang.leave_define'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(189, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('approve-leave')); ?>"><?php echo app('translator')->getFromJson('lang.approve_leave_request'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(196, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('pending-leave')); ?>"><?php echo app('translator')->getFromJson('lang.pending_leave_request'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(193, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('apply-leave')); ?>"><?php echo app('translator')->getFromJson('lang.apply_leave'); ?></a>
                            </li>
                        <?php endif; ?>
                       
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(207, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuExam" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-test"></span>
                        <?php echo app('translator')->getFromJson('lang.examination'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuExam">
                       <?php if(@in_array(225, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('marks-grade')); ?>"> <?php echo app('translator')->getFromJson('lang.marks_grade'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(208, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('exam-type')); ?>"> <?php echo app('translator')->getFromJson('lang.add_exam_type'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(214, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('exam')); ?>"> <?php echo app('translator')->getFromJson('lang.exam_setup'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(@in_array(217, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('exam_schedule')); ?>"> <?php echo app('translator')->getFromJson('lang.exam_schedule'); ?></a>
                            </li>
                        <?php endif; ?>
                        

                        <?php if(Auth::user()->role_id == 4 || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('exam_attendance')); ?>"> <?php echo app('translator')->getFromJson('lang.exam_attendance'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(Auth::user()->role_id == 4 || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('marks_register')); ?>"> <?php echo app('translator')->getFromJson('lang.marks_register'); ?></a>
                            </li>
                        <?php endif; ?>

                        
                        <?php if(@in_array(229, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('send_marks_by_sms')); ?>"> <?php echo app('translator')->getFromJson('lang.send_marks_by_sms'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(230, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('question-group')); ?>"><?php echo app('translator')->getFromJson('lang.question_group'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(234, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('question-bank')); ?>"><?php echo app('translator')->getFromJson('lang.question_bank'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(238, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('online-exam')); ?>"><?php echo app('translator')->getFromJson('lang.online_exam'); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

       

            <?php if(@in_array(277, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                <li>
                    <a href="#subMenuHomework" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-book"></span>
                        <?php echo app('translator')->getFromJson('lang.home_work'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuHomework">
                        <?php if(@in_array(278, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('add-homeworks')); ?>"> <?php echo app('translator')->getFromJson('lang.add_homework'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(280, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('homework-list')); ?>"> <?php echo app('translator')->getFromJson('lang.homework_list'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(284, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('evaluation-report')); ?>"> <?php echo app('translator')->getFromJson('lang.evaluation_report'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

            <?php endif; ?>

            <?php if(@in_array(286, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuCommunicate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-email"></span>
                        <?php echo app('translator')->getFromJson('lang.communicate'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuCommunicate">
                        <?php if(@in_array(287, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('notice-list')); ?>"><?php echo app('translator')->getFromJson('lang.notice_board'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@$config->Saas == 1 && Auth::user()->is_administrator != "yes" ): ?>
                            
                            <li>
                                <a href="<?php echo e(url('administrator-notice')); ?>"><?php echo app('translator')->getFromJson('lang.administrator'); ?> <?php echo app('translator')->getFromJson('lang.notice'); ?></a>
                            </li>

                        <?php endif; ?>
                        
                        <?php if(@in_array(291, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('send-email-sms-view')); ?>"><?php echo app('translator')->getFromJson('lang.send_email'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(293, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('email-sms-log')); ?>"><?php echo app('translator')->getFromJson('lang.email_sms_log'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(294, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('event')); ?>"><?php echo app('translator')->getFromJson('lang.event'); ?></a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(url('sms-template-new')); ?>"><?php echo app('translator')->getFromJson('lang.sms_template'); ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(298, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenulibrary" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-book-1"></span>
                        <?php echo app('translator')->getFromJson('lang.library'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenulibrary">
                       <?php if(@in_array(304, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('book-category-list')); ?>"> <?php echo app('translator')->getFromJson('lang.book_category'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(299, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('add-book')); ?>"> <?php echo app('translator')->getFromJson('lang.add_book'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(301, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('book-list')); ?>"> <?php echo app('translator')->getFromJson('lang.book_list'); ?></a>
                            </li>
                        <?php endif; ?>
                        
                        <?php if(@in_array(308, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('library-member')); ?>"> <?php echo app('translator')->getFromJson('lang.library_member'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(311, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('member-list')); ?>"> <?php echo app('translator')->getFromJson('lang.member_list'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(314, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('all-issed-book')); ?>"> <?php echo app('translator')->getFromJson('lang.all_issued_book'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(315, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuInventory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-inventory"></span>
                        <?php echo app('translator')->getFromJson('lang.inventory'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuInventory">
                        <?php if(@in_array(316, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('item-category')); ?>"> <?php echo app('translator')->getFromJson('lang.item_category'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(320, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('item-list')); ?>"> <?php echo app('translator')->getFromJson('lang.item_list'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(324, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('item-store')); ?>"> <?php echo app('translator')->getFromJson('lang.item_store'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(328, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('suppliers')); ?>"> <?php echo app('translator')->getFromJson('lang.supplier'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(332, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('item-receive')); ?>"> <?php echo app('translator')->getFromJson('lang.item_receive'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(334, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('item-receive-list')); ?>"> <?php echo app('translator')->getFromJson('lang.item_receive_list'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(339, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('item-sell-list')); ?>"> <?php echo app('translator')->getFromJson('lang.item_sell'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(345, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('item-issue')); ?>"> <?php echo app('translator')->getFromJson('lang.item_issue'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(348, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuTransport" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-bus"></span>
                        <?php echo app('translator')->getFromJson('lang.transport'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuTransport">
                        <?php if(@in_array(349, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('transport-route')); ?>"> <?php echo app('translator')->getFromJson('lang.routes'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(353, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('vehicle')); ?>"> <?php echo app('translator')->getFromJson('lang.vehicle'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(357, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('assign-vehicle')); ?>"> <?php echo app('translator')->getFromJson('lang.assign_vehicle'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(361, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_transport_report')); ?>"> <?php echo app('translator')->getFromJson('lang.student_transport_report'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(362, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenuDormitory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-hotel"></span>
                        <?php echo app('translator')->getFromJson('lang.dormitory'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenuDormitory">
                        <?php if(@in_array(371, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('room-type')); ?>"> <?php echo app('translator')->getFromJson('lang.room_type'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(367, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('dormitory-list')); ?>"> <?php echo app('translator')->getFromJson('lang.dormitory'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(363, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('room-list')); ?>"> <?php echo app('translator')->getFromJson('lang.dormitory_rooms'); ?></a>
                            </li>
                        <?php endif; ?>
                        
                        
                        <?php if(@in_array(375, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_dormitory_report')); ?>"> <?php echo app('translator')->getFromJson('lang.student_dormitory_report'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(@in_array(376, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenusystemReports" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">
                        <span class="flaticon-analysis"></span>
                        <?php echo app('translator')->getFromJson('lang.reports'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenusystemReports">
                        <?php if(@in_array(538, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(route('student_report')); ?>"><?php echo app('translator')->getFromJson('lang.student_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(377, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('guardian_report')); ?>"><?php echo app('translator')->getFromJson('lang.guardian_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(378, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_history')); ?>"><?php echo app('translator')->getFromJson('lang.student_history'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(379, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_login_report')); ?>"><?php echo app('translator')->getFromJson('lang.student_login_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(381, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('fees_statement')); ?>"><?php echo app('translator')->getFromJson('lang.fees_statement'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(382, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('balance_fees_report')); ?>"><?php echo app('translator')->getFromJson('lang.balance_fees_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(383, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('transaction_report')); ?>"><?php echo app('translator')->getFromJson('lang.transaction_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(384, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('class_report')); ?>"><?php echo app('translator')->getFromJson('lang.class_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(385, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('class_routine_report')); ?>"><?php echo app('translator')->getFromJson('lang.class_routine'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(386, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('exam_routine_report')); ?>"><?php echo app('translator')->getFromJson('lang.exam_routine'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(387, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('teacher_class_routine_report')); ?>"><?php echo app('translator')->getFromJson('lang.teacher'); ?> <?php echo app('translator')->getFromJson('lang.class_routine'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(388, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('merit_list_report')); ?>"><?php echo app('translator')->getFromJson('lang.merit_list_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(388, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('custom-merit-list')); ?>"><?php echo app('translator')->getFromJson('custom'); ?> <?php echo app('translator')->getFromJson('lang.merit_list_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(389, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('online_exam_report')); ?>"><?php echo app('translator')->getFromJson('lang.online_exam_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(390, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('mark_sheet_report_student')); ?>"><?php echo app('translator')->getFromJson('lang.mark_sheet_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(391, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('tabulation_sheet_report')); ?>"><?php echo app('translator')->getFromJson('lang.tabulation_sheet_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(392, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('progress_card_report')); ?>"><?php echo app('translator')->getFromJson('lang.progress_card_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(392, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('custom-progress-card')); ?>"> <?php echo app('translator')->getFromJson('lang.custom'); ?> <?php echo app('translator')->getFromJson('lang.progress_card_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(393, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('student_fine_report')); ?>"><?php echo app('translator')->getFromJson('lang.student_fine_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(394, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(route('user_log')); ?>"><?php echo app('translator')->getFromJson('lang.user_log'); ?></a>
                            </li>
                        <?php endif; ?> 
                        <?php if(@in_array(539, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('previous-class-results')); ?>"><?php echo app('translator')->getFromJson('lang.previous'); ?> <?php echo app('translator')->getFromJson('lang.result'); ?> </a>
                            </li>
                        <?php endif; ?> 
                        <?php if(@in_array(540, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('previous-record')); ?>"><?php echo app('translator')->getFromJson('lang.previous'); ?> <?php echo app('translator')->getFromJson('lang.record'); ?> </a>
                            </li>
                        <?php endif; ?> 
                            

                    
                       
                         <?php if(SmGeneralSettings::isModule('ResultReports')== TRUE): ?>
                        
                            <li>
                                <a href="<?php echo e(url('resultreports/cumulative-sheet-report')); ?>"><?php echo app('translator')->getFromJson('lang.cumulative'); ?> <?php echo app('translator')->getFromJson('lang.sheet'); ?> <?php echo app('translator')->getFromJson('lang.report'); ?></a>
                            </li> 

                            <li>
                                <a href="<?php echo e(url('resultreports/continuous-assessment-report')); ?>"><?php echo app('translator')->getFromJson('lang.contonuous'); ?> <?php echo app('translator')->getFromJson('lang.assessment'); ?> <?php echo app('translator')->getFromJson('lang.report'); ?></a>
                            </li>
                            <li>

                                <a href="<?php echo e(url('resultreports/termly-academic-report')); ?>"><?php echo app('translator')->getFromJson('lang.termly'); ?> <?php echo app('translator')->getFromJson('lang.academic'); ?> <?php echo app('translator')->getFromJson('lang.report'); ?></a>
                                </li>
                            <li>

                                <a href="<?php echo e(url('resultreports/academic-performance-report')); ?>"><?php echo app('translator')->getFromJson('lang.academic'); ?> <?php echo app('translator')->getFromJson('lang.performance'); ?> <?php echo app('translator')->getFromJson('lang.report'); ?></a>
                                </li>
                            <li>

                                <a href="<?php echo e(url('resultreports/terminal-report-sheet')); ?>"><?php echo app('translator')->getFromJson('lang.terminal'); ?> <?php echo app('translator')->getFromJson('lang.report'); ?> <?php echo app('translator')->getFromJson('lang.sheet'); ?></a>
                                </li>
                            <li>

                                <a href="<?php echo e(url('resultreports/continuous-assessment-sheet')); ?>"><?php echo app('translator')->getFromJson('lang.continuous'); ?> <?php echo app('translator')->getFromJson('lang.assessment'); ?> <?php echo app('translator')->getFromJson('lang.sheet'); ?></a>
                                </li>
                            <li>

                                <a href="<?php echo e(url('resultreports/result-version-two')); ?>"><?php echo app('translator')->getFromJson('lang.result'); ?> <?php echo app('translator')->getFromJson('lang.version'); ?> V2</a>
                                </li>
                            <li>

                                <a href="<?php echo e(url('resultreports/result-version-three')); ?>"><?php echo app('translator')->getFromJson('lang.result'); ?> <?php echo app('translator')->getFromJson('lang.version'); ?> V3</a>
                            </li>
                             
                        <?php endif; ?> 


                    </ul>
                </li>
            <?php endif; ?>
            

            <?php if(@in_array(398, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenusystemSettings" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">
                        <span class="flaticon-settings"></span>
                        <?php echo app('translator')->getFromJson('lang.system_settings'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenusystemSettings">

                        <?php if(App\SmGeneralSettings::isModule('RazorPay')== TRUE && Auth::user()->role_id == 1): ?>  
                            <li>
                                <a href="<?php echo e(url('razorpay/about')); ?>">Razorpay</a>
                            </li>
                        <?php endif; ?>

                       
                       
                            
                        
                        <?php if(App\SmGeneralSettings::isModule('Saas')== TRUE): ?>
                            <li>
                                <a href="<?php echo e(url('school-general-settings')); ?>"> <?php echo app('translator')->getFromJson('lang.general_settings'); ?></a>
                            </li>
                        <?php else: ?>
                            <?php if(@in_array(405, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('general-settings')); ?>"> <?php echo app('translator')->getFromJson('lang.general_settings'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        
                       


                        <?php if(@in_array(417, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('rolepermission/role')); ?>"><?php echo app('translator')->getFromJson('lang.role'); ?></a>
                            </li>
                        <?php endif; ?>


                        <?php if(@in_array(421, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('login-access-control')); ?>"><?php echo app('translator')->getFromJson('lang.login_permission'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(@in_array(424, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('optional-subject-setup')); ?>"><?php echo app('translator')->getFromJson('lang.optional'); ?> <?php echo app('translator')->getFromJson('lang.subject'); ?></a>
                            </li>
                        <?php endif; ?>


                        <?php if(@in_array(121, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            
                        <?php endif; ?>
                        <?php
                            $config = App\SmGeneralSettings::find(1);
                        ?>
                        

                        <?php if(@in_array(432, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('academic-year')); ?>"><?php echo app('translator')->getFromJson('lang.academic_year'); ?></a>
                            </li>
                        <?php endif; ?>
                        

                        <?php if(@in_array(436, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('custom-result-setting')); ?>"><?php echo app('translator')->getFromJson('lang.custom_result_setting'); ?></a>
                            </li>
                        <?php endif; ?>
                        
                        <?php if(@in_array(440, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('holiday')); ?>"><?php echo app('translator')->getFromJson('lang.holiday'); ?></a>
                            </li>
                        <?php endif; ?>
                        

                        <?php if(@in_array(448, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('weekend')); ?>"><?php echo app('translator')->getFromJson('lang.weekend'); ?></a>
                            </li>
                        <?php endif; ?>
                       

                      


                
                       
                        <?php
                            $config = App\SmGeneralSettings::find(1);
                        ?>
                       <?php if(SmGeneralSettings::isModule('Saas')== FALSE   ): ?>

                       <?php echo $__env->make('backEnd/partials/without_saas_school_admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       
                        <?php endif; ?>

                       
                       
                    </ul>
                </li>
            <?php endif; ?>
 
            <?php if(SmGeneralSettings::isModule('InfixBiometrics')== TRUE ): ?>
                <li>
                    <a href="#BioSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-hotel"></span> 
                        <?php echo app('translator')->getFromJson('lang.biometrics'); ?>  
                    </a>
                    <ul class="collapse list-unstyled" id="BioSettings">
                       
                        <li>
                            <a href="<?php echo e(url('infixbiometrics/bio-settings')); ?>"><?php echo app('translator')->getFromJson('lang.biometrics'); ?> <?php echo app('translator')->getFromJson('lang.settings'); ?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo e(url('infixbiometrics/bio-attendance')); ?>"><?php echo app('translator')->getFromJson('lang.attendance'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('infixbiometrics/bio-attendance-reports')); ?>"><?php echo app('translator')->getFromJson('lang.staff'); ?> <?php echo app('translator')->getFromJson('lang.attendance'); ?> <?php echo app('translator')->getFromJson('lang.reports'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('infixbiometrics/student-bio-attendance-reports')); ?>"><?php echo app('translator')->getFromJson('lang.student'); ?> <?php echo app('translator')->getFromJson('lang.attendance'); ?> <?php echo app('translator')->getFromJson('lang.reports'); ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(App\SmGeneralSettings::isModule('Saas')== FALSE): ?>
           <?php if(@in_array(485, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                <li>
                    <a href="#subMenusystemStyle" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">
                        <span class="flaticon-settings"></span>
                        <?php echo app('translator')->getFromJson('lang.style'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="subMenusystemStyle">

                        <?php if(in_array(486, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                            <li>
                                <a href="<?php echo e(url('background-setting')); ?>"><?php echo app('translator')->getFromJson('lang.background_settings'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(in_array(490, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('color-style')); ?>"><?php echo app('translator')->getFromJson('lang.color'); ?> <?php echo app('translator')->getFromJson('lang.theme'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
<?php endif; ?>
            

           
            <?php if(App\SmGeneralSettings::isModule('Saas')== FALSE): ?>
                <?php if(@in_array(492, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>

                    <li>
                        <a href="#subMenufrontEndSettings" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">
                            <span class="flaticon-software"></span>
                            <?php echo app('translator')->getFromJson('lang.front_settings'); ?>
                        </a>
                        <ul class="collapse list-unstyled" id="subMenufrontEndSettings">
                            <?php if(@in_array(493, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('admin-home-page')); ?>"> <?php echo app('translator')->getFromJson('lang.home_page'); ?> </a>
                            </li>
                            <?php endif; ?>
                            <?php if(@in_array(495, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('news')); ?>"><?php echo app('translator')->getFromJson('lang.news_list'); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(500, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('news-category')); ?>"><?php echo app('translator')->getFromJson('lang.news'); ?> <?php echo app('translator')->getFromJson('lang.category'); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(504, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('testimonial')); ?>"><?php echo app('translator')->getFromJson('lang.testimonial'); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(509, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('course-list')); ?>"><?php echo app('translator')->getFromJson('lang.course_list'); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(514, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('contact-page')); ?>"><?php echo app('translator')->getFromJson('lang.contact'); ?> <?php echo app('translator')->getFromJson('lang.page'); ?> </a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(517, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('contact-message')); ?>"><?php echo app('translator')->getFromJson('lang.contact'); ?> <?php echo app('translator')->getFromJson('lang.message'); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(520, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('about-page')); ?>"> <?php echo app('translator')->getFromJson('lang.about_us'); ?> </a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(523, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('news-heading-update')); ?>"><?php echo app('translator')->getFromJson('lang.news_heading'); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(525, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('course-heading-update')); ?>"><?php echo app('translator')->getFromJson('lang.course_heading'); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(527, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('custom-links')); ?>"> <?php echo app('translator')->getFromJson('lang.custom_links'); ?> </a>
                            </li>
                            <?php endif; ?>

                            <?php if(@in_array(529, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1): ?>
                            <li>
                                <a href="<?php echo e(url('social-media')); ?>"> <?php echo app('translator')->getFromJson('lang.social_media'); ?> </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(SmGeneralSettings::isModule('Saas')== TRUE  && Auth::user()->is_administrator != "yes" ): ?>
          
                <li>
                    <a href="#Ticket" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="flaticon-settings"></span>
                        <?php echo app('translator')->getFromJson('lang.ticket_system'); ?>
                    </a>
                    <ul class="collapse list-unstyled" id="Ticket">
                        <li><a href="<?php echo e(url('school/ticket-view')); ?>"><?php echo app('translator')->getFromJson('lang.ticket_list'); ?></a>
                        </li>
                    </ul>
                    </li>

            <?php endif; ?>
        <?php endif; ?>

        <!-- Student Panel --> 
        <?php if(Auth::user()->role_id == 2): ?>
            <?php echo $__env->make('backEnd/partials/student_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <?php endif; ?>
        <!-- End student panel -->

        <!-- Parents Panel Menu -->
        <?php if(Auth::user()->role_id == 3): ?>
          <?php echo $__env->make('backEnd/partials/parents_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <!-- End Parents Panel Menu -->


    </ul>
</nav>
<?php endif; ?>
<?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/resources/views/backEnd/partials/sidebar.blade.php ENDPATH**/ ?>