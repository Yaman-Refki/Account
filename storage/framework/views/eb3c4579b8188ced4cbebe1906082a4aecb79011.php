
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Transaction')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="row d-flex justify-content-end mt-2">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <?php echo e(Form::open(array('route' => array('customer.transaction'),'method' => 'GET','id'=>'frm_submit'))); ?>

                            <div class="all-select-box">
                                <div class="btn-box">
                                    <?php echo e(Form::label('date', __('Date'),['class'=>'text-type'])); ?>

                                    <?php echo e(Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control datepicker-range'))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="all-select-box">
                                <div class="btn-box">
                                    <?php echo e(Form::label('category', __('Category'),['class'=>'text-type'])); ?>

                                    <?php echo e(Form::select('category',  [''=>'All']+$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control select2'))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <a href="#" class="apply-btn" onclick="document.getElementById('frm_submit').submit(); return false;" data-toggle="tooltip" data-original-title="<?php echo e(__('apply')); ?>">
                                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                            </a>
                            <a href="<?php echo e(route('customer.transaction')); ?>" class="reset-btn" data-toggle="tooltip" data-original-title="<?php echo e(__('Reset')); ?>">
                                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
                            </a>

                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr>
                                <th> <?php echo e(__('Date')); ?></th>
                                <th> <?php echo e(__('Amount')); ?></th>
                                <th> <?php echo e(__('Account')); ?></th>
                                <th> <?php echo e(__('Type')); ?></th>
                                <th> <?php echo e(__('Category')); ?></th>
                                <th> <?php echo e(__('Description')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(Auth::user()->dateFormat($transaction->date)); ?></td>
                                    <td><?php echo e(Auth::user()->priceFormat($transaction->amount)); ?></td>
                                    <td><?php echo e(!empty($transaction->bankAccount())?$transaction->bankAccount()->bank_name .' '.$transaction->bankAccount()->holder_name:''); ?></td>
                                    <td><?php echo e($transaction->type); ?></td>
                                    <td><?php echo e($transaction->category); ?></td>
                                    <td><?php echo e($transaction->description); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Account\resources\views/customer/transaction.blade.php ENDPATH**/ ?>