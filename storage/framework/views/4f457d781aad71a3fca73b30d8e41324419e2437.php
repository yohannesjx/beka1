<?php $__env->startSection('mainContent'); ?>

    <?php  $setting = App\SmGeneralSettings::find(1);  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   ?>
    <?php


    $module_links = [];
    $permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();
    $module_links = [];
    $modules = [];
    foreach ($permissions as $permission) {
        $module_links[] = $permission->module_link_id;
        $modules[] = $permission->moduleLink->module_id;
    }
    $modules = array_unique($modules);
    if (Auth::user()->role_id == 3) {
        $childrens = App\SmParent::myChildrens();
    }


    $active_style = App\SmStyle::where("school_id", Auth::user()->school_id)->where('is_active', 1)->first();


    ?>

    <section class="mb-40 up_dashboard">
        <div class="container-fluid p-0">
            <div class="row mb-30">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h3><?php echo app('translator')->getFromJson('lang.welcome'); ?> To Administrator</h3>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                    <?php elseif(session()->has('message-danger')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session()->get('message-danger')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-3 col-6">
                    <a href="<?php echo e(url('administrator/institution-list')); ?>" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3>Inistitutions</h3>
                                    <p class="mb-0"><?php echo app('translator')->getFromJson('lang.total'); ?> inistitutions</p>
                                </div>
                                <h1 class="gradient-color2">
                                    <?php if(isset($total_inistitutions)): ?>
                                        <?php echo e($total_inistitutions); ?>

                                    <?php endif; ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3>Students</h3>
                                    <p class="mb-0"><?php echo app('translator')->getFromJson('lang.total'); ?> <?php echo app('translator')->getFromJson('lang.students'); ?></p>
                                </div>
                                <h1 class="gradient-color2">
                                    <?php if(isset($students)): ?>
                                        <?php echo e($students); ?>

                                    <?php endif; ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3><?php echo app('translator')->getFromJson('lang.teachers'); ?></h3>
                                    <p class="mb-0"><?php echo app('translator')->getFromJson('lang.total'); ?> <?php echo app('translator')->getFromJson('lang.teachers'); ?></p>
                                </div>
                                <h1 class="gradient-color2">
                                    <?php if(isset($data['teachers'])): ?>
                                        <?php echo e($data['teachers']); ?>

                                    <?php endif; ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3><?php echo app('translator')->getFromJson('lang.staff'); ?></h3>
                                    <p class="mb-0"><?php echo app('translator')->getFromJson('lang.total'); ?> <?php echo app('translator')->getFromJson('lang.staff'); ?></p>
                                </div>
                                <h1 class="gradient-color2">
                                    <?php if(isset($data['staffs'])): ?>
                                        <?php echo e($data['staffs']); ?>

                                    <?php endif; ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
             </div>


    </section>


    <section class="up_dashboard" id="incomeExpenseDiv">
        <div class="container-fluid p-0">
            <div class="row">

                <?php if(in_array(135, $module_links) || Auth::user()->role_id == 1): ?>

                    <div class="col-lg-8 col-md-9">
                        <div class="main-title">
                            <h3 class="mb-30"> <?php echo app('translator')->getFromJson('lang.income_and_expenses_for'); ?> <?php echo e(date('M Y')); ?></h3>
                        </div>
                    </div>
                    <div class="offset-lg-2 col-lg-2 text-right col-md-3 up_ds_margin">
                        <button type="button" class="primary-btn small tr-bg icon-only" id="areaChartBtn">
                            <span class="pr ti-move"></span>
                        </button>

                        <button type="button" class="primary-btn small fix-gr-bg icon-only ml-10"
                                id="areaChartBtnRemovetn">
                            <span class="pr ti-close"></span>
                        </button>
                    </div>
                    <div class="col-lg-12">
                        <div class="white-box" id="areaChartDiv">
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <h1>(<?php echo e($currency); ?>) <?php echo e(number_format($m_total_income)); ?></h1>
                                        <p><?php echo app('translator')->getFromJson('lang.total_income'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <h1>(<?php echo e($currency); ?>) <?php echo e(number_format($m_total_expense)); ?></h1>
                                        <p><?php echo app('translator')->getFromJson('lang.total_expenses'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <h1>(<?php echo e($currency); ?>) <?php echo e(number_format($m_total_income - $m_total_expense)); ?></h1>
                                        <p><?php echo app('translator')->getFromJson('lang.total_profit'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <h1>(<?php echo e($currency); ?>) <?php echo e(number_format($m_total_income)); ?></h1>
                                        <p><?php echo app('translator')->getFromJson('lang.total_revenue'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div id="commonBarChart" style="height: 350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php endif; ?>

            </div>
        </div>
    </section>

    <section class="mt-50" id="incomeExpenseSessionDiv">
        <div class="container-fluid p-0">
            <div class="row">

                <?php if(in_array(136, $module_links) || Auth::user()->role_id == 1): ?>
                    <div class="col-lg-8 col-md-9">
                        <div class="main-title">
                            <h3 class="mb-30"><?php echo app('translator')->getFromJson('lang.income_and_expenses_for'); ?> <?php echo e(date('Y')); ?></h3>
                        </div>
                    </div>
                    <div class="offset-lg-2 col-lg-2 text-right col-md-3 up_ds_margin">
                        <button type="button" class="primary-btn small tr-bg icon-only" id="barChartBtn">
                            <span class="pr ti-move"></span>
                        </button>

                        <button type="button" class="primary-btn small fix-gr-bg icon-only ml-10"
                                id="barChartBtnRemovetn">
                            <span class="pr ti-close"></span>
                        </button>
                    </div>
                    <div class="col-lg-12">
                        <div class="white-box" id="barChartDiv">
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <h1>(<?php echo e($currency); ?>) <?php echo e(number_format($y_total_income)); ?></h1>
                                        <p><?php echo app('translator')->getFromJson('lang.total_income'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <h1>(<?php echo e($currency); ?>) <?php echo e(number_format($y_total_expense)); ?></h1>
                                        <p><?php echo app('translator')->getFromJson('lang.total_expenses'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <h1>(<?php echo e($currency); ?>) <?php echo e(number_format($y_total_income - $y_total_expense)); ?></h1>
                                        <p><?php echo app('translator')->getFromJson('lang.total_profit'); ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="text-center">
                                        <h1>(<?php echo e($currency); ?>) <?php echo e(number_format($y_total_income)); ?></h1>
                                        <p><?php echo app('translator')->getFromJson('lang.total_revenue'); ?></p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div id="commonAreaChart" style="height: 350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>


<?php
        $chart_data = "";

        for($i = 1; $i <= date('d'); $i++){

        $i = $i < 10? '0'.$i:$i;
            $income = App\SmAddIncome::monthlyIncome($i, NULL);
            $expense = App\SmAddIncome::monthlyExpense($i, NULL);

            

            $chart_data .= "{ day: '" . $i . "', income: " . $income . ", expense:" . $expense . " },";
        }

    ?>


    <?php
        $chart_data_yearly = "";

        for($i = 1; $i <= date('m'); $i++){

        $i = $i < 10? '0'.$i:$i;

            $yearlyIncome = App\SmAddIncome::yearlyIncome($i, NULL);

            $yearlyExpense = App\SmAddIncome::yearlyExpense($i, NULL);

            $chart_data_yearly .= "{ y: '" . $i . "', income: " . $yearlyIncome . ", expense:" . $yearlyExpense . " },";
        }





    ?>



<?php $__env->startSection('script'); ?>

    <script type="text/javascript">


        function barChart(idName) {
                window.barChart = Morris.Bar({
                element: 'commonBarChart',
                data: [<?php echo $chart_data; ?>],
                xkey: 'day',
                ykeys: ['income', 'expense'],
                labels: ['Income', 'Expense'],
                barColors: ['<?php echo e($active_style->barchart1); ?>', '<?php echo e($active_style->barchart2); ?>'],
                resize: true,
                redraw: true,
                gridTextColor: '<?php echo e($active_style->barcharttextcolor); ?>',
                gridTextSize: 12,
                gridTextFamily: '"poppins", sans-serif',
                barGap: 4,
                barSizeRatio: 0.3
            });
        }


        const monthNames = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];

        function areaChart() {
            window.areaChart = Morris.Area({
                element: 'commonAreaChart',
                data: [  <?php echo $chart_data_yearly; ?> ],
                xkey: 'y',
                parseTime: false,
                ykeys: ['income', 'expense'],
                labels: ['Income', 'Expense'],
                xLabelFormat: function (x) {
                    var index = parseInt(x.src.y);
                    return monthNames[index];
                },
                xLabels: "month",
                labels: ['Series A'],
                hideHover: 'auto',
                lineColors: ['<?php echo e($active_style->areachartlinecolor1); ?>', '<?php echo e($active_style->areachartlinecolor2); ?>'],
            });
        }

    </script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/Modules/Saas/Resources/views/dashboard2.blade.php ENDPATH**/ ?>