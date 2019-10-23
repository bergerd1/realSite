  
<!--header nav-->
 

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row col-md-offset-3 col-md-6">

        <br>

        
        
        
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <div class="col-md-9 col-md-offset-1">
        <h1>Create Removal Cost </h1>
    </div>

    <div class="col-md-9 col-md-offset-1 panel panel-default">

        
        <div class="panel-body">
            <form action="<?php echo e(url('/removal')); ?>" enctype="multipart/form-data" method="POST">

                <?php echo e(csrf_field()); ?>


                <!-- Form Fields -->
                <div>

                    <!-- Title -->
                    <div class="form-group ">

                        <label for="description-field">Title</label>

                        <input class="form-control" name="title" type="text" value="">

                        
                    </div>
                    <!-- /Title -->

                    <!-- Description -->
                    <div class="form-group ">

                        <label for="description-field">Description</label>

                        <input class="form-control" name="description" type="text" value="">

                        
                    </div>
                    <!-- /Description -->

                    <!-- Price -->
                    <div class="form-group ">

                        <label for="description-field">Price</label>

                        $<input class="form-control" name="price" type="text" value="0.00">

                    <input type="hidden" name="Type" value="Removal">    
                    </div>
                    <!-- /Price -->

                    <a class="btn btn-default" href="">Back</a>

                    <button class="btn btn-default" type="submit" name="submit" value="Removal">Save</button>

                </div>
                <!-- /Form Fields -->

            </form>
        </div>

    </div>

</div>
        </div>
    </div><!-- /.container -->
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.backend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>