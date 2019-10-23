
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
  <link rel="stylesheet" type="text/css" href="<?= asset('backend/css/template_view.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= asset('backend/css/createsimple.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?= asset('backend/css/createorder.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= asset('backend/css/userEdit.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('backend/css/installSign.css') ?>">
     <link rel="stylesheet" type="text/css" href="<?= asset('backend/css/custom-order.css') ?>">
      <link rel="stylesheet" type="text/css" href="<?= asset('backend/css/custom-order-custom.css') ?>">
       <link rel="stylesheet" type="text/css" href="<?= asset('backend/css/banner_order.css') ?>">
   <link href="http://demosigns.westallisblue.com/css/banner_order.css" rel="stylesheet">
   <style>
       .navbar-nav>li{float:none !important;}
@media only screen and (min-width: 768px)
{.col-container {
    display: table;
    width: 100%;
    min-height:700px;
}

.col {
    display: table-cell;
    padding: 16px;
}
}
@media (min-width: 992px)
{
.col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
    float: none;
}
}
.navbar-default .navbar-nav>li>a{padding:15px 0px;color:#fff;}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{color:#fff;border:0.5px solid #807e7e;}
.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: transparent;
}
.table>tbody>tr>th, .table>thead>tr>td, .table>thead>tr>th {
padding: 19px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
    text-align: center;
    font-weight: 700;
    color: #F44336 !important;
    font-size: 18px;
    background: #222;
}
.dropdown-menu{background:#000000f0;}
.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{background:#000;color:#fff;}
.dropdown-menu>li>a{color:#fff;}
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
    color: #fff;
    background-color: transparent;
}
img{object-fit:contain;}
p{color:#fff;}
label{color:#fff;}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #fff;
    background: none;
    background-image: none;
    border: solid 0.5px;
    border-color:#7a7a7a;
    border-radius: 0px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.panel {
    margin-bottom: 20px;
    background:none;
    border: none;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
   </style>
</head>
<body style="padding:0px;height:100%;">
   
<!--header nav -->
<div class="col-container">
  <div class="col col-md-2" style="background:#185991">
    @include('admin.common.header')
  </div>

  <div class="col col-md-10" style="background:black">
    @yield('content')
  </div>
 </div>
 
</body>
</html>
