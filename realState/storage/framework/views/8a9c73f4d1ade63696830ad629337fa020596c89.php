<!--header nav-->

<?php $__env->startSection('content'); ?>
 <!DOCTYPE html>
  



    <div class="container wrapper">

        
        <div class="row">
            <div class="col-sm-6">
                <div class="block-inner">
                     <h2 class="block-heading text-center">Order a sign</h2>
                         <h4 class="block-heading text-center">Order signs to be installed or removed on a single property</h4>

                    <a href="<?php echo e(url('/install_sign')); ?>" style="text-decoration: none">
                        <button type="button" class="btn btn-primary btn-lg">Order sign</button>
                    </a>

                    <a href="<?php echo e(url('/removals/create')); ?>" style="text-decoration: none">
                        <button style="background: white" type="button" class="btn btn-block btn-default butn">Remove sign</button>
                    </a>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="block-inner">

                    <h2 class="block-heading text-center">Banner or Custom Graphic</h2>

                    <h4  class="block-heading text-center">Order a banner or custom graphic to be installed or removed from a single property</h4>

                  
                        <a href="<?php echo e(url('/banner')); ?>" style="text-decoration: none">
                            <button type="button" class="btn btn-primary btn-lg">Order banner/custom graphic</button></a>
                  
                    <a href="<?php echo e(url('/remove_banner')); ?>" style="text-decoration: none">
                        <button style="background: white" type="button" class="btn btn-block btn-default butn">Remove banner/custom graphic</button>
                    </a>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12 bottom-cta">
                <h1 class="text">Want to change or check on an order
                <a href="<?php echo e(url('order')); ?>">
                    <button type="button" class="btn btn-primary btn-lg">View my orders</button></h2>
                </a>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>