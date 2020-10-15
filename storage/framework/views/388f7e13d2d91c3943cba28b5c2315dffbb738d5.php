
<script src="<?php echo e(asset('public/backEnd/')); ?>/js/main.js"></script>

<div class="container-fluid">
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'fees-payment-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'myForm', 'onsubmit' => "return validateFormFees()"])); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="row mt-25">
                    <div class="col-lg-12">
                        <div class="no-gutters input-right-icon">
                            <div class="col">
                                <div class="input-effect">
                                    <input class="primary-input date form-control" id="startDate" type="text"
                                         name="date" value="<?php echo e(date('m/d/Y')); ?>" readonly>
                                        <label><?php echo app('translator')->getFromJson('lang.date'); ?></label>
                                        <span class="focus-border"></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="" type="button">
                                    <i class="ti-calendar" id="start-date-icon"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                <input type="hidden" name="real_amount" id="real_amount" value="<?php echo e($amount); ?>">
                <input type="hidden" name="student_id" value="<?php echo e($student_id); ?>">
                <input type="hidden" name="fees_type_id" value="<?php echo e($fees_type_id); ?>">

                <div class="row mt-25">
                    <div class="col-lg-12" id="sibling_class_div">
                        <div class="input-effect">
                            <input class="primary-input form-control" type="text" name="amount" value="<?php echo e($amount); ?>" id="amount">
                            <label><?php echo app('translator')->getFromJson('lang.amount'); ?> <span>*</span> </label>
                            <span class="focus-border"></span>
                            
                            <span class=" text-danger" role="alert" id="amount_error">
                                
                            </span>
                            
                        </div>
                    </div>
                </div>
                <div class="row mt-25">
                    <div class="col-lg-12">
                        <select class="niceSelect w-100 bb" name="discount_group" id="discount_group">
                            <option data-display="Discount Group " value=""><?php echo app('translator')->getFromJson('lang.discount'); ?> <?php echo app('translator')->getFromJson('lang.group'); ?> </option>
                            <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($discount->feesDiscount->type != "year"): ?>
                                    <?php if(!in_array($discount->id, $applied_discount)): ?>
                                    <option value="<?php echo e($discount->id); ?>"><?php echo e($discount->feesDiscount !=""?$discount->feesDiscount->name:""); ?></option>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php for($i = 1; $i <= date('m'); $i++): ?>
                                    <?php
                                    $discount_year = App\SmFeesPayment::discountMonth($discount->id, $i);
                                    ?>

                                    <?php if($discount_year == ""): ?>

                                    <option value="<?php echo e($discount->id.'-'.$i); ?>"><?php echo e($discount->feesDiscount->name.' for '. date('F', mktime(0, 0, 0, $i, 10))); ?> </option>

                                    <?php endif; ?>


                                    <?php endfor; ?>
                                <?php endif; ?>    

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        </select>
                    </div>
                </div>
                <div class="row mt-25">
                    <div class="col-lg-6">
                        <div class="input-effect">
                            <input class="primary-input form-control" type="number" name="discount_amount" id="discount_amount" value="0">
                            <label><?php echo app('translator')->getFromJson('lang.discount'); ?> <span></span> </label>
                            <span class="focus-border"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-effect">
                            <input class="primary-input form-control" type="text" name="fine" value="0" id="fine_amount" onblur="checkFine()">
                            <label><?php echo app('translator')->getFromJson('lang.fine'); ?> <span></span> </label>
                            <span class="focus-border"></span>
                        </div>
                    </div>
                </div>
                <div class="row mt-25" id="fine_title" style="display:none">
                   
                    <div class="col-lg-12">
                        <div class="input-effect">
                            <input class="primary-input form-control"  type="text" name="fine_title" >
                            <label><?php echo app('translator')->getFromJson('lang.fine'); ?> <?php echo app('translator')->getFromJson('lang.title'); ?> <span>*</span> </label>
                            <span class="focus-border"></span>
                        </div>
                    </div>
                </div>
                <script>
                function checkFine(){
                    var fine_amount=document.getElementById("fine_amount").value;
                    var fine_title=document.getElementById("fine_title");
                if (fine_amount>0) {
                    fine_title.style.display = "block";
                } else {
                    fine_title.style.display = "none";
                }
                }
                </script>
                <div class="row mt-50">
                    <div class="col-lg-3">
                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->getFromJson('lang.payment'); ?> <?php echo app('translator')->getFromJson('lang.mode'); ?> *</p>
                    </div>
                    <div class="col-lg-6">
                            <div class="d-flex radio-btn-flex ml-40">
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="cash" value="C" class="common-radio" checked>
                                    <label for="cash"><?php echo app('translator')->getFromJson('lang.cash'); ?></label>
                                </div>
                                <div class="mr-30">
                                    <input type="radio" name="payment_mode" id="cheque" value="Cq" class="common-radio">
                                    <label for="cheque"><?php echo app('translator')->getFromJson('lang.cheque'); ?></label>
                                </div>
                                <div>
                                    <input type="radio" name="payment_mode" id="dd" value="D" class="common-radio">
                                    <label for="dd"><?php echo app('translator')->getFromJson('lang.dd'); ?></label>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row mt-25">
                    <div class="col-lg-12" id="sibling_name_div">
                        <div class="input-effect mt-20">
                            <textarea class="primary-input form-control" cols="0" rows="3" name="note" id="note"></textarea>
                            <label><?php echo app('translator')->getFromJson('lang.note'); ?> </label>
                            <span class="focus-border textarea"></span>
                           
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-lg-12 text-center mt-40">
                <button class="primary-btn fix-gr-bg" id="save_button_sibling" type="button">
                    <span class="ti-check"></span>
                    save information
                </button>
            </div> -->
            <div class="col-lg-12 text-center mt-40">
                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->getFromJson('lang.cancel'); ?></button>

                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->getFromJson('lang.save'); ?> <?php echo app('translator')->getFromJson('lang.information'); ?></button>
                </div>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /Users/test/site/beka_school/resources/views/backEnd/feesCollection/fees_generate_modal.blade.php ENDPATH**/ ?>