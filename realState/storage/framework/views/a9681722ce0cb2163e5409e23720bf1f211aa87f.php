  
<!--header nav-->
 

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row col-md-offset-3 col-md-6">

        <br>
<br/>
<br/>
        
        
        
    </div>
</div>

    <div class="container top-head">
      <div class="row">
         <div class="col-sm-12">
            <h2>Installation and Removal Costs </h2>
        <div class="pull-right pd-top">
        <a class="btn btn-success  " href="<?php echo e(url('create_installation')); ?>">Create Installation</a><nobr></nobr>
        <a class="btn btn-success  installation-btn" href="<?php echo e(url('create_removal')); ?>">Create Removal</a>
         </div>
        </div>
      </div>
   </div>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
     <div class="table-responsive ">
      <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="30%">Title</th>
                        <th width="30%">Description</th>
                        <th width="10%">Price</th>
                        <th width="10%">Type</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>

                <tbody>
<?php $__currentLoopData = $inst_rem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>
                    <td><?php echo e($value->title); ?></td>
                    <td><?php echo e($value->description); ?></td>
                    <td><?php echo e($value->price); ?></td>
                    <td> <?php echo e($value->Type); ?> </td>
                    <td class="text-right">
                        <a class="btn btn-default " href="edit_value/<?php echo e($value->id); ?>">Edit</a>
                            <a class="btn btn-danger" href="delete_value/<?php echo e($value->id); ?>" type="submit">Delete</a>
                                               

                    </td>
                </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 


                                </tbody>
            </table>

      </div>
    
    </div>


</div>
        </div>
    



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.backend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>