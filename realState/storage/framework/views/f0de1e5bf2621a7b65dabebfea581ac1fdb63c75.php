       
<?php $__env->startSection('content'); ?>
<div style="padding-top:60px"></div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="page-header">
                    <h1>Your order has been placed!</h1>
                </div>

            <p><a  href="<?php echo e(url('/order')); ?>">Your order</a> number is  <?php echo e($id); ?></p>
                <p>A member of our team will review the order and contact you if further information is required.</p>

            </div>
        </div>

    </div>
    
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>