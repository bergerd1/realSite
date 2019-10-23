 
<!--header nav-->

<?php $__env->startSection('content'); ?>
         
         
         
 
  <div style="padding-top:60px"></div>
               <div class="container">

               <div class="row">
                   <div class="col-sm-12">
                     <h1>Remove a Sign</h1>
                  </div>
                 </div>

               <div class="row">
                  <div class="col-sm-12">
            <ul class="nav nav-tabs install-sign" role="tablist">
                <li role="presentation" class=" previous ">
                    <a aria-controls="home" role="tab">Step 1: <strong>Set Location</strong></a>
                </li>
                <li role="presentation" class=" previous ">
                    <a aria-controls="profile" role="tab">Step 2: <strong>Removal Options</strong></a>
                </li>
                <li role="presentation" class=" active ">
                    <a aria-controls="settings" role="tab">Step 3: <strong>Review Order</strong></a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active">
                    <div class="row">
                       <div class="col-md-7">
                          <h2 class="tab-title">Review your removal order</h2>
                          <h3>All the signs at the location designated will be <strong>removed</strong>.</h3>
        
        <div class="row">
            <div class="col-xs-12">
                <div class="special-instructions">

                    <label for="special-instructions">Special instructions:</label>
<?php $__currentLoopData = $sign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <textarea form="submitButtons" rows="4" cols="50" id="special-instructions" name="instructions"><?php echo e($orders_val->instructions); ?></textarea>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>

    </div>

    <div class="col-md-5 sidebar">
        <div class="sidebar-inner">

            <h2 class="tab-title">Your Order</h2>

            <div class="row">

                <div class="col-xs-7">

                    <h4>Removal Location</h4>
   <?php $__currentLoopData = $sign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="address"><?php echo e($orders_val->address); ?> </span>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="col-xs-5">
                                        <!--<a href="<?php echo e(url('/')); ?>" class="change-location">change</a>-->
                </div>

                <div class="col-xs-12">
                    <hr>
                </div>

                <div class="col-xs-12">
                    <h4>Order summary:</h4>
                </div>

                <div class="row">

                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table">

                                <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Item</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
<?php
$total="";
?>
                                <tbody>
                                    <?php $__currentLoopData = $removalInstallation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php
                                     $total+=$value->price;
                                     ?>
                                     
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo e($value->title); ?></td>
                                        <td>$<?php echo e($value->price); ?></td>
                                    </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                        
                                       
                              <tr class="subtotal">
                                    <td></td>
                                    <td>Subtotal</td>
                                    <td>$<?php echo $total; ?>.00</td>
                                </tr>
                                <?php
                                
                                 $tax=5.60;
                                 $tax_val=$tax /100;
                                 $Subtotal=$tax_val*$total;
                                 //$Final= $Subtotal+$total1;
                                ?>
                                 <tr>
                                    <td></td>
                                    <td>Tax</td>
                                    <td>$<?php echo $Subtotal;?> </td>
                                </tr>
                                <tr class="order-total">
                                    <td></td>
                                    <td>Order Total</td>
                                    <td>$<?php echo $total+$Subtotal; ?></td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <form action="<?php echo e(url('/removal_confirmed')); ?>" method="post" >
                                            <?php echo e(csrf_field()); ?>

                            <div class="submit-buttons">
                               
                                <?php $__currentLoopData = $sign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!--<span class="address"><?php echo e($orders_val->id); ?> </span>-->
                                <input type="hidden" name="id" value="<?php echo e($orders_val->id); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                       
                                <button type="submit"  class="btn btn-primary next-step" >Place order</button>     
                             

                               <br/>

                                
                                <a href="<?php echo e(url('/order')); ?>" id="goBack" type="button" class="btn btn-primary next-step add-more-signs">Go Back</a>

                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

                </div>
            </div>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>