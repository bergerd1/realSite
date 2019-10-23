 
<?php $__env->startSection('content'); ?>
    
<div class="container-fluid">
    <div class="row col-md-offset-3 col-md-6">

        <br>

        
        
        
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <!-- Page Header -->
    <div class="page-header clearfix">

        <h2>Sample Residential Real Estate</h2>

        <h3>riyu Gupta</h3>

        <h1 class="pull-left">Removal Overview</h1>

    </div>
    <!-- /Page Header -->

    <div class="row col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" id="templates-body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                	                        <li class=&quot;active&quot;><a href="#Incomplete" data-toggle="tab" >Incomplete</a></li>
                                                                    <li ><a href="#Complete" data-toggle="tab" >Complete</a></li>
                                                                    <li ><a href="#Deleted" data-toggle="tab" >Deleted</a></li>
                                                            </ul>
                <!-- /Nav Tabs -->

                
                <!-- Tab Content -->
                <div class="tab-content">
                                            <div class="tab-pane fade in active" id="Incomplete">
                            <div class="table-responsive">
                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Removed</th>
                                        <th>Order Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        
                     <?php $__currentLoopData = $Incomplete; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <tr>

                                                <td>
                                                   
                                                             <?php echo e($value->id); ?>

                                                       
                                                </td>

                                                <td><?php echo e($value->company_name); ?></td>

                                                <td><?php echo e($value->status); ?></td>

                                                <td><?php echo e($value->address); ?></td>

                                                <td>
                                                    <?php echo e($value->remove_by); ?>

                                                </td>

                                                <td class="text-right">
                                                    <a class="btn btn-default " href="view_order/<?php echo e($value->id); ?>">View</a>
                                                </td>

                                            </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                       

                                                                            </tbody>

                                </table>
                            </div>
                        </div>
                                                                    <div class="tab-pane fade in " id="Complete">
                            <div class="table-responsive">
                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Removed</th>
                                        <th>Order Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        
                                      <?php $__currentLoopData = $Complete; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                     

                                            <tr>

                                                 <td>
                                                   
                                                             <?php echo e($value->id); ?>

                                                       
                                                </td>

                                                <td><?php echo e($value->company_name); ?></td>

                                                <td><?php echo e($value->status); ?></td>

                                                <td><?php echo e($value->address); ?></td>

                                                <td>
                                                    <?php echo e($value->remove_by); ?>

                                                </td>


                                                <td class="text-right">
                                                    <a class="btn btn-default " href="view_order/<?php echo e($value->id); ?>">View</a>
                                                </td>

                                            </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        

                                                                            </tbody>

                                </table>
                            </div>
                        </div>
                                                                    <div class="tab-pane fade in " id="Deleted">
                            <div class="table-responsive">
                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Removed</th>
                                        <th>Order Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody><?php $__currentLoopData = $Deleted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <tr>

                                                <td>
                                                    <?php echo e($value->id); ?>

                                                </td>

                                                <td><?php echo e($value->company_name); ?></td>

                                                <td><?php echo e($value->status); ?></td>

                                                <td><?php echo e($value->address); ?></td>

                                                <td>
                                                    <?php echo e($value->remove_by); ?>

                                                </td>


                                                <td class="text-right">
                                                </td>

                                            </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </tbody>

                                </table>
                            </div>
                        </div>
                                                            </div>
                <!-- /Tab Content -->

            </div>
       
</div> </div>
    </div>

</div>
        </div>
    </div><!-- /.container -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>