<!--header nav-->

<?php $__env->startSection('content'); ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">    <div class="page-header">
        <h1>Edit User</h1>
    </div>

    <div class="col-md-9 col-md-offset-1 panel panel-default">

        <div class="panel-body">

             <form action="<?php echo e(url('update_profile')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

              <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name-field">First Name</label>
                            <input type="text" id="first_name-field" name="first_name" class="form-control" value="<?php echo e($value->first_name); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="last_name-field">Last Name</label>
                            <input type="text" id="last_name-field" name="last_name" class="form-control" value="<?php echo e($value->last_name); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="email-field">Email</label>
                            <input type="text" id="email-field" name="email" class="form-control" value="<?php echo e($value->email); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="password-field">Password</label>
                            <input type="text" id="password-field" name="password" class="form-control" value=""/>
                            <span class="help-block"> Leave blank to keep old password. </span>
                        </div>
                        <div class="form-group">
                            <label for="address-field">Address</label>
                            <input type="text" id="address-field" name="Address" class="form-control" value="<?php echo e($value->Address); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="phone-field">Phone</label>
                            <input type="text" id="phone-field" name="Phone" class="form-control" value="<?php echo e($value->Phone); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="fax-field">Fax</label>
                            <input type="text" id="fax-field" name="Fax" class="form-control" value="<?php echo e($value->Fax); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="communication-preferences">Communication Preferences</label>
                            <p>Send me an email when:</p>
                            <table class="table" id="communication-preferences">
                                <thead></thead>
                                <tbody>
                                <tr>
                                    <td>An order is</td>
                                    <td>
                                        <p><input checked type="checkbox" name="order_creation_subscription"> created</p>
                                        <p><input checked type="checkbox" name="order_update_subscription"> updated</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A removal is</td>
                                    <td>
                                        <p><input checked type="checkbox" name="removal_creation_subscription"> created</p>
                                        <p><input checked type="checkbox" name="removal_update_subscription"> updated</p>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-default pull-right" type="submit" >Save</button>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            </form>
        </div>
    </div>


</div>
        </div>
    </div><!-- /.container -->
</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>