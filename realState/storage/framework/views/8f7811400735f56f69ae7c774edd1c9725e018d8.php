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
                    <h2 class="tab-title">Choose installation options </h2>
                </div>
            </div>

<div class="row">
      <?php $z=0; ?>
    <form action="<?php echo e(url('/install_sign_data3')); ?>" name="form"   class="installation-options" method="post" id="the_form_ins">
               
       <?php echo e(csrf_field()); ?>

            
                <div class="col-md-6">

                    <div class="row">
                        <?php $__currentLoopData = $installation_option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installation_option_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php $z++; ?>
                        <div class="col-md-4">
   
                                    
                                             <tr>
                                        <td></td>
                                      
                                                                            </tr>
   
                         <input class="form-control install-option-input installation_qty<?=$z?>" style="float: none;" type="number" min="0" step="1"
                                   name="installation_qty[]"   value="">
                                   
                         <input type="hidden" name="installation_id[]" value="<?php echo e($installation_option_val->	install_removal); ?>">
                                  
                        </div>
                        <div class="col-md-8">
                            <div class="checkbox-copy">

                                <span class="checkbox-title"><?php echo e($installation_option_val->title); ?> (<?php echo e($installation_option_val->price); ?>)</span>

                                <span class="checkbox-text"><?php echo e($installation_option_val->description); ?></span>
                           
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                                   <input type="hidden" name="countins" id="countins" value="<?=$z?>">
                </div>

           
            <div class="clearfix visible-md visible-sm"></div>

        
   

<div class="row">
    <div class="col-sm-12">
        <button type="button" id="next_step_button_ins" form="the_form" class="btn btn-primary next-step">
            Last Step: Review Order <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
            </div>
</div> 
     
    </form>
    
    <script>
    $(document).ready(function(){
        var count = $('#countins').val();
       // alert(count);
       
         var s2 = [];
       $('#next_step_button_ins').click(function(){
          for(var j = 1; j <= count; j++){
          //  var ff =   $('.installation_qty'+j).val();
            // alert(ff);
          if( $('.installation_qty'+j).val() == ''){
           
          }else{
              s2.push($('.installation_qty'+j).val());
            
          }
          }
          var length = s2.length;
          // alert(length);
          if(length != 0){
          // alert('feffg');
             $("#the_form_ins").submit();
         }
         else{
             alert('Please select atleast one sign');
             }
       
       });
     
    });
</script>

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
 


  <?php $__currentLoopData = $sign_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="address"><?php echo e($value->address); ?></span>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </div>

                    <div class="col-xs-5">
                            <!--                                                    <a style="cursor:pointer;" class="change-location" onclick="document.getElementById('EditAddress').submit()">-->
                            <!--    change-->
                            <!--</a>-->
                                            </div>

                </div>

                <div class="col-xs-12">
                    <hr>
                </div>

                <div class="row">

                    <div class="col-xs-12">
                        <!--<h4>Sign Costs:</h4>-->
                        <!--                                                        <a style="margin-top:inherit;cursor:pointer" class="change-location" onclick="document.getElementById('ChangeSigns').submit()">-->
                        <!--        change-->
                        <!--    </a>-->
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

                                        <?php $__currentLoopData = $sign_value2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sign_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                        
                                        if($sign_val->template_order_quantity !=0) 
                                        { ?>
                                       
                                        <tr>
                                        <td><?php echo e($sign_val->template_order_quantity); ?></td>
                                        <td><?php echo e($sign_val->temp_name); ?></td>
                                     
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