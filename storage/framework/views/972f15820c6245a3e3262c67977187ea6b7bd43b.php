<!DOCTYPE html>
<html>
<head>
    <title><?php echo app('translator')->getFromJson('lang.fees'); ?> <?php echo app('translator')->getFromJson('lang.payment'); ?></title>
    <style>
    
        .school-table-style {
            padding: 10px 0px!important;
        }
        .school-table-style tr th {
            font-size: 8px!important;
            text-align: left!important;
        }
        .school-table-style tr td {
            font-size: 9px!important;
            text-align: left!important;
            padding: 10px 0px!important;
        }
        .logo-image {
            width: 10%;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/vendors/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/css/style.css" />
</head>
<body>
<?php  $setting = App\SmGeneralSettings::find(1);  if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; }   ?> 
 
    <table style="width: 100%;">
        <tr>
             
            <td style="width: 30%"> 
                <img src="<?php echo e(url($setting->logo)); ?>" alt="<?php echo e(url($setting->logo)); ?>"> 
            </td> 
            <td  style="width: 70%">  
                <h3><?php echo e($setting->school_name); ?></h3>
                <h4><?php echo e($setting->address); ?></h4>
            </td> 
        </tr> 
    </table>
    <hr>
    <table class="school-table school-table-style" cellspacing="0" width="100%">
        <tr>
                <td><?php echo app('translator')->getFromJson('lang.student_name'); ?></td>
                <td><?php echo e($student->full_name); ?></td>
                <td><?php echo app('translator')->getFromJson('lang.roll_number'); ?></td>
                <td><?php echo e($student->roll_no); ?></td>
        </tr>
        <tr>
                <td> <?php echo app('translator')->getFromJson('lang.father_name'); ?></td>
                <td><?php echo e($student->parents->fathers_name); ?></td>
                <td><?php echo app('translator')->getFromJson('lang.class'); ?></td>
                <td><?php echo e($student->className->class_name); ?></td>
        </tr>
        <tr>
                <td> <?php echo app('translator')->getFromJson('lang.section'); ?></td>
                <td><?php echo e($student->section->section_name); ?></td>
                <td><?php echo app('translator')->getFromJson('lang.admission_no'); ?></td>
                <td><?php echo e($student->admission_no); ?></td>
        </tr>
    </table>
    <div class="text-center"> 
        <h4 class="text-center mt-1"><span><?php echo app('translator')->getFromJson('lang.fees'); ?> <?php echo app('translator')->getFromJson('lang.payment'); ?></span></h4>
    </div>
	<table class="school-table school-table-style" cellspacing="0" width="100%">
        <thead>
            <tr align="center">
                <th><?php echo app('translator')->getFromJson('lang.date'); ?></th>
                <th><?php echo app('translator')->getFromJson('lang.fees_group'); ?></th>
                <th><?php echo app('translator')->getFromJson('lang.fees_code'); ?></th>
                <th><?php echo app('translator')->getFromJson('lang.mode'); ?></th>
                <th><?php echo app('translator')->getFromJson('lang.amount'); ?> (<?php echo e($currency); ?>)</th>
                <th><?php echo app('translator')->getFromJson('lang.discount'); ?> (<?php echo e($currency); ?>)</th>
                <th><?php echo app('translator')->getFromJson('lang.fine'); ?>(<?php echo e($currency); ?>)</th>
            </tr>
        </thead>

        <tbody>
            
            <tr align="center">
                <td>
                   
<?php echo e($payment->payment_date != ""? App\SmGeneralSettings::DateConvater($payment->payment_date):''); ?>


                </td>
                <td><?php echo e($group); ?></td>
                <td><?php echo e($payment->feesType->code); ?></td>
                <td>
                <?php if($payment->payment_mode == "C"): ?>
                        <?php echo e('Cash'); ?>

                <?php elseif($payment->payment_mode == "Cq"): ?>
                    <?php echo e('Cheque'); ?>

                <?php else: ?>
                    <?php echo e('DD'); ?>

                <?php endif; ?> 
                </td>
                <td><?php echo e($payment->amount); ?></td>
                <td><?php echo e($payment->discount_amount); ?></td>
                <td><?php echo e($payment->fine); ?></td>
                <td></td>
            </tr>
            
        </tbody>
    </table>
</body>
</html>
<?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/feesCollection/fees_payment_print.blade.php ENDPATH**/ ?>