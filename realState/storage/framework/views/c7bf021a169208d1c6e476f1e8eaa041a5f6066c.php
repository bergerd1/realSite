<?php $__env->startSection('content'); ?>
<!--header nav-->

         
<div class="container-fluid">
    <div class="row col-md-offset-3 col-md-6">

        <br>

        
        
        
    </div>
	 <?php $__currentLoopData = $removal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $removal_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">    <div class="page-header">
        <h1>Removal # <?php echo e($removal_val->id); ?></h1>
        <h4><?php echo e($removal_val->company_name); ?>/ <?php echo e($removal_val->user_name); ?></h4>
    </div>

<div class="col-md-9 col-md-offset-1 panel panel-default">
        <div class="panel-body">

            <div class="row">
								<a class="btn btn-default pull-left" href="">Edit</a>
								<a class="btn btn-default pull-right" href="">Go Back</a>
			</div>
			<hr>
		
			<div class="row">
			   
  
				<div class="col-md-2" class="text-right">
					<label>Remove by date:</label>
				</div>
				<div class="col-md-4"><?php echo e($removal_val->remove_by); ?></div>
				<div class="col-md-2" class="text-right">
					<label>Instructions:</label>
				</div>
				<div class="col-md-4"> <?php echo e($removal_val->instructions); ?></div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						<h3>Removal Costs</h3>
			<div class="row col-md-12">
				<ul class="list-group">
								  <?php $__currentLoopData = $removalInstallation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li class="list-group-item">1 x <?php echo e($value->title); ?>: $<?php echo e($value->price); ?></li>
				                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	             	             </ul>
             </div>
			<hr />
		 <?php $__currentLoopData = $removal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $removal_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>		
			<div class="row">
				<div class="col-md-12">
					<label for="address-field">Location</label>
					<input type="text" name="address-field" id="address-field" value="<?php echo e($removal_val->address); ?>" class="form-control" disabled>
					<div class="map_canvas"></div>
				</div>
			</div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

			<hr>
			<div class="row">

			<div class="col-md-12">


            </div>
              <div class="row">
                 <div class="col-md-12">
                 <h3>Pricing</h3>

                     <div class="table-responsive">
                         <table class="table table-striped">
<?php
$total="";
?>

                             <tbody class="templates" id="templates">
							  <?php $__currentLoopData = $removalInstallation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php
                                     $total+=$value->price;
                                     ?>
							 <tr>
							     <td colspan="3"><lable>Removal of signs cost</lable></td>
							     <td>$<?php echo e($value->price); ?></td>
							 </tr>
							       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							       <?php
                                
                                 $tax=5.60;
                                 $tax_val=$tax /100;
                                 $Subtotal=$tax_val*$total;
                               
                                ?>
                             <tr>
                                 <td colspan="3"><lable>Out of service area fee</lable></td>
                                 <td>$0.00</td>
                            </tr>
                             <tr>
                                 <td colspan="3"><lable>Tax</lable></td>
                                 <td>$<?php echo $Subtotal;?> </td>
                            </tr>
                             <tr>
                                 <td colspan="3"><lable>Total</lable></td>
                                 <td>$<?php echo $total+$Subtotal; ?> </td>
                            </tr>
                             </tbody>
                         </table>
                     </div>

                 </div>
              </div>

              </div>


            <div class="row">
        		<a class="btn btn-default pull-left" href=""> Back</a>
        		        		<a class="btn btn-default pull-right" href=""> Edit</a>
        		        	</div>
       </div>
    </div>


</div>
        </div>
    </div><!-- /.container -->
</div>
</div>
   
         
         
         
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts/backend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>