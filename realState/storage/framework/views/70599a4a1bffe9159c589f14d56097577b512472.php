
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
$user=DB::select('select * from settings');
// echo "<pre>";
// print_r($user); die();
?>
  <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <title><?php echo e($value->site_title); ?></title>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<link rel="stylesheet" type="text/css" href="<?= asset('backend/css/installSign.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= asset('backend/css/custom-order.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= asset('backend/css/custom-order-custom.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= asset('backend/css/banner_order.css') ?>">
      
  <script src="<?= asset('js/style.js') ?>"></script>
  
  
   
</head>
<body>
<!--header nav -->
 <?php echo $__env->make('user_dashboard.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


 <?php echo $__env->yieldContent('content'); ?>
 
 
</body>
</html>
