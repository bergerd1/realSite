 
<!--header nav-->
 

<?php $__env->startSection('content'); ?>  
<div style="padding-top:60px"></div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="page-header">
                <h1>Site Settings</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
  
            
            <form action="<?php echo e(url('update_settings')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th style="width:25%;">Setting Name</th>
                        <th style="width:75%">Setting Value</th>
                    </tr>
                    </thead>

                    <tbody>
                    <!--<tr>-->
                    <!--    <td>Default Address</td>-->
                    <!--    <td>-->
                    <!--        <input class="form-control" type="text" name="default_address" value="Chicago, IL">-->
                    <!--    </td>-->
                    <!--</tr>-->
                    <tr>
                        <td>Site Title</td>
                        <td><input class="form-control" type="text" name="site_title" value="<?php echo e($value->site_title); ?>"></td>
                        <input type="hidden" name="id" value="<?php echo e($value->id); ?>">
                    </tr>
                    <tr>
                        <td>Site Logo</td>
                        <td>
                            <div class="row">

                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="logo" >
                                    <input type="hidden" name="logo_data" value="<?php echo e($value->logo); ?>">
                                </div>

                                <div class="col-md-3">
                                    <img class="img-responsive" style="float:right;max-width:100px;margin-right:20px;" src="./front/image/<?php echo e($value->logo); ?>">
                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Landing Image</td>
                        <td>
                            <div class="row">

                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="landing_image" value="" >
                                     <input type="hidden" name="landing_image_data" value="<?php echo e($value->landing_image); ?>">
                                </div>

                                <div class="col-md-3">
                                    <img class="img-responsive" style="float:right;max-width:100px;margin-right:20px;" src="./front/image/<?php echo e($value->landing_image); ?>">
                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>EULA</td>
                        <td>
                            <textarea rows="8" data-toggle="tooltip" title="Editing this field will force all users to re-accept the user agreement" class="form-control" name="eula"><?php echo e($value->eula); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Google API Key</td>
                        <td>
                            <input name="api_key" type="text" value="<?php echo e($value->api_key); ?>" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-primary" value="Save" style="float:right;margin-right:20px;">
                        </td>
                    </tr>
                    </tbody>

                </table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>
    </div>
    
    
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.backend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>