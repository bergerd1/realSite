<!--header nav-->

<?php $__env->startSection('content'); ?>



<div style="padding-top:60px"></div>

<div class="container">

    
    <div class="row">
        <div class="col-sm-12">
            <h1>Install a Sign</h1>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-8">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs install-sign" role="tablist">

                <li role="presentation" class=" previous ">
                    <a  style="cursor: pointer;" onclick="document.getElementById('navStep1').submit()"  aria-controls="home" role="tab">Step 1: <strong>Set Location</strong></a>
                                    </li>

                <li role="presentation" class=" previous ">
                    <a  style="cursor: pointer;" onclick="document.getElementById('navStep2').submit()"  aria-controls="profile" role="tab">Step 2: <strong>Order Signs</strong></a>
                                    </li>

                <li role="presentation" class=" active ">
                    <a  style="cursor: pointer;" onclick="document.getElementById('navStep3').submit()"  aria-controls="messages" role="tab">Step 3: <strong>Install Options</strong></a>
                                    </li>

                <li role="presentation" class="">
                    <a onclick="document.getElementById('navStep4').submit()" aria-controls="settings" role="tab">Step 4: <strong>Review Order</strong></a>
                </li>

            </ul>

            <!-- Tab panes -->
<div class="tab-content">
        <div role="tabpanel" class="tab-pane active choose-sign-blocks">

            <div class="row">
                <div class="col-sm-12">
                    <h2 class="tab-title">Choose installation options</h2>
                </div>
            </div>

<div class="row">
    <form action="<?php echo e(url('/install_sign_data3')); ?>" class="installation-options" method="post" id="the_form">

       <?php echo e(csrf_field()); ?>

            
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
   
                                    
                                             <tr>
                                        <td></td>
                                      
                                                                            </tr>
   
                         <input class="form-control install-option-input" style="float: none;" type="number" min="0" step="1"
                                   name="installation_qty" value="0" >
                                   <input type="hidden" name="price" value="37">
                        </div>
                        <div class="col-md-8">
                            <div class="checkbox-copy">

                                <span class="checkbox-title">Residential Hanging Post Install (37.00)</span>

                                <span class="checkbox-text">Residential Hanging Post Install</span>

                            </div>
                        </div>
                    </div>

                </div>

            
            <div class="clearfix visible-md visible-sm"></div>

        
   

<div class="row">
    <div class="col-sm-12">
        <button type="submit" id="next_step_button" form="the_form" class="btn btn-primary next-step">
            Last Step: Review Order <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
            </div>
</div> 
     
    </form>
</div>
                    
     </div>
    </div>
    </div>

        <div class="col-md-4 sidebar" style="padding-top:60px">
            <div class="sidebar-inner">

                <h2 class="tab-title">Your Order</h2>

                <div class="row">

                    <div class="col-xs-7">

                        <h4>Installation Location</h4>
 
<?php $__currentLoopData = $sign1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sign_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                        <span class="address"><?php echo e($sign_val->address); ?></span>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                    </div>

                    <div class="col-xs-5">
                                                                                <a style="cursor:pointer;" class="change-location" onclick="document.getElementById('EditAddress').submit()">
                                change
                            </a>
                                            </div>

                </div>

                <div class="col-xs-12">
                    <hr>
                </div>

                <div class="row">

                    <div class="col-xs-12">
                        <h4>Sign Costs:</h4>
                                                                                <a style="margin-top:inherit;cursor:pointer" class="change-location" onclick="document.getElementById('ChangeSigns').submit()">
                                change
                            </a>
                                            </div>

                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table">

                                <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Item</th>
                                                                    </tr>
                                </thead>

                                <tbody>
<?php $__currentLoopData = $sign2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sign_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($sign_val->qty1 !=0) { ?>
                                                                    <tr>
                                        <td><?php echo e($sign_val->qty1); ?></td>
                                        <td><?php echo e($sign_val->sign_name1); ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                                             
                                                                            
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

<?php $__currentLoopData = $sign2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sign_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if($sign_val->qty2 !=0) { ?>
                                                                    <tr>
                                        <td><?php echo e($sign_val->qty2); ?></td>
                                        <td><?php echo e($sign_val->sign_name2); ?></td>
                                                     </tr>
                                                      <?php } ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                 
            
                                </tbody>

                            </table>
                            
                        </div>
                    </div>

                </div>

                <div class="col-xs-12">
                    <hr>
                </div>

                <div class="row">

                    <div class="col-xs-12">
                        <h4>Installation Costs</h4>
                                            </div>

                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table">

                                <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Item</th>
                                                                    </tr>
                                </thead>
  
                                <tbody>
                                     <tr>
                                         <td>   </td>
                                         <td></td>
                                         </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

                
            </div>
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>