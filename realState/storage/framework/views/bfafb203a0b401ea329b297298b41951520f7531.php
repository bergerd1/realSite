<!--header nav-->
 

<?php $__env->startSection('content'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix" style="border:none;">

                    <h3 style="color:#fff;" class="pull-left">Customers</h3>

                    <a class="btn btn-success pull-right" href="<?php echo e(url('admin/company/create')); ?>">Create</a>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Users</th>
                                    <th>Signs in Stock</th>
                                    <th>Signs to Print</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                <?php $__currentLoopData = $companylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companylist_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e($companylist_val->company_name); ?> </td>

                                    <td>
                                        <p><?php echo e($companylist_val->countUser); ?></p>
                                    </td>

                                    <td>
                                        <p>14</p>
                                    </td>

                                    <td>
                                        <p>16</p>
                                    </td>

                                    <td class="text-right">

                                        <a class="btn btn-default " href="<?php echo e(url('/admin/company/'.$companylist_val->id.'/edit')); ?>">Edit</a>
                                            <a href="/realState/public/delete_company/<?php echo e($companylist_val->id); ?>" class="btn btn-danger" >Delete</a>
                                    </td>

                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.backend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>