
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
$user=DB::select('select * from settings');
// echo "<pre>";
// print_r($user); die();
?>
  @foreach($user as $value)
  <title>{{$value->site_title}}</title>
  @endforeach
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
 @include('user_dashboard.common.header')


 @yield('content')
 
 
</body>
</html>
