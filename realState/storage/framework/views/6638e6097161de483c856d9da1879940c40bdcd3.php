<?php $__env->startSection('title', 'Error'); ?>

<?php $__env->startSection('message', 'Sorry, we are having a temporary problem. We have been alerted and will be rolling out a fix soon'); ?>
<?php echo $__env->make('errors::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>