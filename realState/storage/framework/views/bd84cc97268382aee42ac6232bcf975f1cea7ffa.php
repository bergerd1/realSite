<!--header nav-->



  



<?php $__env->startSection('content'); ?>

<div class="col-sm-8 col-sm-offset-2  border" style="background:#222;">
    <h3 style="color:#fff;">Edit Company</h3><hr>
      <form method="POST" action="<?php echo e(url('admin/company/'.$item->id)); ?>">
          
          <?php echo e(csrf_field()); ?>

        
        
       
        <div class="form-group">
            <div class="col-sm-12">
               <label> Company Name </label>
               <input type="text" name="name" value="<?php echo e($item->name); ?>" class="form-control">
             </div>
          <div class="col-sm-12">
            <label>Address</label>
            <input type="text" name="address" value="<?php echo e($item->address); ?>" class="form-control">
        </div>

          <div class="col-sm-12">
            <label>Map</label>
           <textarea class="form-control" rows="5" id="comment"></textarea>
         </div>

          <div class="col-sm-12">
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo e($item->phone); ?>" class="form-control">
        </div>

          <div class="col-sm-12">
            <label> Fax</label>
            <input type="text" name="fax" value="fax" class="form-control">
           
        </div>

          <div class="col-sm-12">
            <label>Default rate fax</label>
            <input type="text" name="" value="" ="form-control">
        </div>

          <div class="col-sm-12">
            <label>Assigned Templates</label>
             <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Customer Price</th>
        <th>Stock level</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
        
           
                                <?php $__currentLoopData = $template_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $templateValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
            <tr>
               <td><input type="checkbox" value="<?php echo e($templateValue->id); ?>" checked="checked" name="temp_check[]"></td> 
              <td><?php echo e($templateValue->temp_name); ?></td>
                <td> <?php echo e($templateValue->temp_price); ?></td>
               <td> <input style="width:100px"  class="form-control" value=""></td>
               <td> <input style="width:100px" class="form-control"  value="" placeholder="Manage"> </td>
                <td><img src="../../../backend/template_picture/<?php echo e($templateValue->temp_picture); ?>" height="100px;" width="100px;"></td>
             </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              <!--<tr>-->
              <!--  <td>Trident</td>-->
              <!--  <td>$50</td>-->
              <!--  <td> <input style="width:100px"  class="form-control" value=""></td>-->
              <!--  <td> <input style="width:100px"  class="form-control" value="" placeholder="Manage"> </td>-->
                
               
              <!--</tr>-->
    </tbody>
  </table>
</div>



 <strong>Available Templates</strong>
 
   <?php echo e(method_field('PUT')); ?>


                    <!-- Available Templates -->
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <thead>
                            <tr style="border: solid 0.5px;">
                               
                                <th>Name</th>
                                <th>Price</th>
                                <th>Custom Price</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                                
                                <?php $__currentLoopData = $template; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $templateVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                 
                                 <tr>

                                        <td>
                                            <input name="template_id[]" type="checkbox" value="<?php echo e($templateVal->id); ?>">
                                        </td>

                                        <td><?php echo e($templateVal->temp_name); ?></td>   

                                        <td><?php echo e($templateVal->temp_price); ?></td>

                                        <td>
                                            <input style="width:100px" type="text" id="template_price10"
                                                   name="template_price10" class="form-control"
                                                   value=""/>
                                        </td>

                                        <td>
                                            <img src="../../../backend/template_picture/<?php echo e($templateVal->temp_picture); ?>"
                                                 style="max-width:300px; max-height:100px; border: 1px solid black;">
                                        </td>

                                    </tr>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                     
                           </tbody>

                        </table>
                    </div>
                      <div class="table-responsive">
                        <table class="table table-striped">

                            <thead>
                                <p>Assign Installation\Removal Costs</p>
                            <tr style="border: solid 0.5px;">
                                
                                <th></th>
                                
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                               
                              
                            </tr>
                            </thead>

                            <tbody>
                                
                           
                                   
                            <?php $__currentLoopData = $installation_removal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                                 <tr>
                                     
                                     
                                             
                            
                               
                                        <td>
                                            <input name="installRemovalcheck[]" type="checkbox"  
                                             
                                              <?php   
                                           
                                             
                                                    $val = $value->id;
                                             
                                                    if(isset($arr)){
                                                     if(in_array($val, $arr)){  ?>
                                                                      checked="checked"
                                                   <?php    }   }
                                                   ?> 
                                            
                                            value="<?php echo e($value->id); ?>">    
                                        </td>
                                            
                                        <td><?php echo e($value->title); ?></td>   
                                        
                                        <td><?php echo e($value->description); ?></td>
                                        <td><?php echo e($value->price); ?></td>
                                        <td>
                                             <input name="type[]" type="hidden" value="<?php echo e($value->Type); ?>">  
                                        </td>
                                      
                                       
                              
                                    </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                     
                           </tbody>

                        </table>
                    </div>
                    <!-- /Available Templates -->

</div>

 <input type="submit" value="save"/ style="padding:7px 25px; background:#eee;color:#222 !important;border:none;">

  </form>
     
</div>
<style>.col-sm-12{margin-bottom:10px;}</style>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.backend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>