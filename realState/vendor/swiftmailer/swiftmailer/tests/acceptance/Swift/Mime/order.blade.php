@extends('user_dashboard.layouts.layout')
@section('content')

<link href="http://demosigns.westallisblue.com/css/bootstrap-select.min.css" rel="stylesheet">
<link href="http://demosigns.westallisblue.com/css/bootstrap-multiselect.css" rel="stylesheet">

<script src="http://demosigns.westallisblue.com/js/bootstrap-select.js"></script>
<script src="http://demosigns.westallisblue.com/js/bootstrap-multiselect.js"></script>
<div class="container">
        <div class="row">
            <div class="col-md-12">
    <div class="page-header clearfix">

        
            
        <h2>Sample Residential Real Estate </h2>

        <h3><?php echo session('name');?></h3>

        <h1 class="pull-left">Active Orders and Removals</h1>

        
    </div>

    <!-- Map && Search -->
    <div class="row">

        <!-- Map Index -->
        <div class="col-md-10">
            <p>
                <img src="https://maps.google.com/mapfiles/ms/icons/green-dot.png"> - Completed Order |
                <img src="https://maps.google.com/mapfiles/ms/icons/yellow-dot.png"> - In Process Order |
                <img src="https://maps.google.com/mapfiles/ms/icons/red-dot.png"> - On Hold Order
            </p>
        </div>
        <!-- /Map Index -->

        <!-- Filter Toggle -->
        <div class="col-md-2">
            <button type="button" class="btn btn-default btn-clear" id="btn_filtermap">Toggle Filter</button>
        </div>
        <!-- /Filter Toggle -->

        <!-- Map Placeholder -->
        <div id="mapCanvas" class="col-md-12" style="border: 2px solid rgb(56, 114, 172); position: relative; overflow: hidden; height: 500px;">
               <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBz-LGvlIHTQoeJ1E7GMplSXzbFy1d6Qso&libraries=places"></script>





 
 <div class="map" id="map" style="width: 100%; height: 500px;"></div>


   
                                                             
                                  
  <script type="text/javascript">
 
       var locations1 = [
         
        @foreach($install_sign_data_status1 AS $data)
             ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="edit_install/{{$data->id}}">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
        @endforeach   
        @foreach($banner_order_status1 AS $data)
           ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="view_order/{{$data->id}}">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
        @endforeach 
        @foreach($removal_sign_status1 AS $data)
         ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
         @endforeach 
    ];
    
     var locations2 = [
       
        @foreach($install_sign_data_status2 AS $data)
                 ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="edit_install/{{$data->id}}">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
        @endforeach   
        @foreach($banner_order_status2 AS $data)
           ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="view_order/{{$data->id}}">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
        @endforeach 
        @foreach($removal_sign_status2 AS $data)
         ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
         @endforeach 
    ];
     var locations3 = [
        
        @foreach($install_sign_data_status3 AS $data)
                 ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="edit_install/{{$data->id}}">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
        @endforeach   
        @foreach($banner_order_status3 AS $data)
           ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="view_order/{{$data->id}}">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
        @endforeach 
        @foreach($removal_sign_status3 AS $data)
         ['<h2>Order-No. {{$data->id}}</h2> <br/> {{$data->address}} <br/> Order Status:{{$data->status}}<br/><br/><a href="">View Order</a> <br/><br><a href="{{url('removals/create')}}">Create Removal</a>',{{$data->lat}},{{$data->lng}} ],
         @endforeach 
    ];
  
   $( document ).ready(function() {
	  
    
var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 3,
      center: new google.maps.LatLng( 28,77),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

     var image1 = {
    url: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
   
  };
  var image2 = {
    url: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
   
  };
  var image3 = {
    url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
   
  };
    
      for (i = 0; i < locations1.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations1[i][1], locations1[i][2]),
         id: "some",
         icon: image1,
          
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations1[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
      for (i = 0; i < locations2.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations2[i][1], locations2[i][2]),
        icon: image2,
      
        map: map
        
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations2[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
      for (i = 0; i < locations3.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations3[i][1], locations3[i][2]),
        icon: image3,
        
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations3[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
  })
  
  
function userID(obj) {
    myFunction(obj,function(result) {
          var install_sign_data_status1=result.install_sign_data_status1;
          var banner_order_status1=result.banner_order_status1;
          var removal_sign_status1=result.removal_sign_status1;
          var install_sign_data_status2=result.install_sign_data_status2;
          var banner_order_status2=result.banner_order_status2;
          var removal_sign_status2=result.removal_sign_status2;
          var install_sign_data_status3=result.install_sign_data_status3;
          var banner_order_status3=result.banner_order_status3;
          var removal_sign_status3=result.removal_sign_status3;
          
          
     var locations4=[];
      
   
      var test = [
          install_sign_data_status1.forEach(function(data){
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
             }),
          
            banner_order_status1.forEach(function(data) {
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status1.forEach(function(data) {
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          ]  
        
        
   
     var locations5=[];
    
      var test = [
          install_sign_data_status2.forEach(function(data){
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
          }),
          
            banner_order_status2.forEach(function(data) {
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status2.forEach(function(data) {
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          ]    
          
           
    
      var locations6=[];
     

      var test = [
          install_sign_data_status3.forEach(function(data){
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
          }),
          
            banner_order_status3.forEach(function(data) {
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status3.forEach(function(data) {
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          
          ]  
      // var locations6= [status3,banner3,removal3];
           
           console.log(locations4);
           console.log(locations5);
           console.log(locations6);
           
           
           
            
$(document ).ready(function() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 3,
      center: new google.maps.LatLng( 28,77),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    var image1 = {
        url: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
    };
    var image2 = {
        url: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
    };
    var image3 = {
         url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
    };
  
    
    for (i = 0; i < locations4.length; i++) { 

      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations4[i][1], locations4[i][2]),
         id: "some",
         icon: image1,
           title: 'Hello 1!',
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations4[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
    
    
    for (i = 0; i < locations5.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations5[i][1], locations5[i][2]),
        icon: image2,
         title: 'Hello 2!',
        map: map
        
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations5[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
    
    for (i = 0; i < locations6.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations6[i][1], locations6[i][2]),
        icon: image3,
          title: 'Hello 3!',
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations6[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
  })

    });
}
   
   
   

function companyID(obj) {
    myFunction1(obj,function(result) {
          var install_sign_data_status1=result.install_sign_data_status1;
          var banner_order_status1=result.banner_order_status1;
          var removal_sign_status1=result.removal_sign_status1;
          var install_sign_data_status2=result.install_sign_data_status2;
          var banner_order_status2=result.banner_order_status2;
          var removal_sign_status2=result.removal_sign_status2;
          var install_sign_data_status3=result.install_sign_data_status3;
          var banner_order_status3=result.banner_order_status3;
          var removal_sign_status3=result.removal_sign_status3;
          
          
     var locations4=[];
      
   
      var test = [
          install_sign_data_status1.forEach(function(data){
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
             }),
          
            banner_order_status1.forEach(function(data) {
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status1.forEach(function(data) {
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          ]  
        
        
   
     var locations5=[];
    
      var test = [
          install_sign_data_status2.forEach(function(data){
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
          }),
          
            banner_order_status2.forEach(function(data) {
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status2.forEach(function(data) {
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          ]    
          
           
    
      var locations6=[];
     

      var test = [
          install_sign_data_status3.forEach(function(data){
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
          }),
          
            banner_order_status3.forEach(function(data) {
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status3.forEach(function(data) {
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          
          ]  
      // var locations6= [status3,banner3,removal3];
           
           console.log(locations4);
           console.log(locations5);
           console.log(locations6);
           
           
           
            
$(document ).ready(function() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 3,
      center: new google.maps.LatLng( 28,77),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    var image1 = {
        url: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
    };
    var image2 = {
        url: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
    };
    var image3 = {
         url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
    };
  
    
    for (i = 0; i < locations4.length; i++) { 

      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations4[i][1], locations4[i][2]),
         id: "some",
         icon: image1,
           title: 'Hello 1!',
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations4[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
    
    
    for (i = 0; i < locations5.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations5[i][1], locations5[i][2]),
        icon: image2,
         title: 'Hello 2!',
        map: map
        
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations5[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
    
    for (i = 0; i < locations6.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations6[i][1], locations6[i][2]),
        icon: image3,
          title: 'Hello 3!',
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations6[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
  })

    });
}
   
   

function statusID(obj) {
    myFunction2(obj,function(result) {
          var install_sign_data_status1=result.install_sign_data_status1;
          var banner_order_status1=result.banner_order_status1;
          var removal_sign_status1=result.removal_sign_status1;
          var install_sign_data_status2=result.install_sign_data_status2;
          var banner_order_status2=result.banner_order_status2;
          var removal_sign_status2=result.removal_sign_status2;
          var install_sign_data_status3=result.install_sign_data_status3;
          var banner_order_status3=result.banner_order_status3;
          var removal_sign_status3=result.removal_sign_status3;
          
          
     var locations4=[];
      
   
      var test = [
          install_sign_data_status1.forEach(function(data){
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
             }),
          
            banner_order_status1.forEach(function(data) {
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status1.forEach(function(data) {
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          ]  
        
        
   
     var locations5=[];
    
      var test = [
          install_sign_data_status2.forEach(function(data){
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
          }),
          
            banner_order_status2.forEach(function(data) {
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status2.forEach(function(data) {
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          ]    
          
           
    
      var locations6=[];
     

      var test = [
          install_sign_data_status3.forEach(function(data){
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
          }),
          
            banner_order_status3.forEach(function(data) {
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status3.forEach(function(data) {
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          
          ]  
      // var locations6= [status3,banner3,removal3];
           
           console.log(locations4);
           console.log(locations5);
           console.log(locations6);
           
           
           
            
$(document ).ready(function() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 3,
      center: new google.maps.LatLng( 28,77),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    var image1 = {
        url: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
    };
    var image2 = {
        url: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
    };
    var image3 = {
         url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
    };
  
    
    for (i = 0; i < locations4.length; i++) { 

      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations4[i][1], locations4[i][2]),
         id: "some",
         icon: image1,
           title: 'Hello 1!',
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations4[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
    
    
    for (i = 0; i < locations5.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations5[i][1], locations5[i][2]),
        icon: image2,
         title: 'Hello 2!',
        map: map
        
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations5[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
    
    for (i = 0; i < locations6.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations6[i][1], locations6[i][2]),
        icon: image3,
          title: 'Hello 3!',
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations6[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
  })

    });
}
    
 function typeID(obj) {
    myFunction3(obj,function(result) {
          var install_sign_data_status1=result.install_sign_data_status1;
          var banner_order_status1=result.banner_order_status1;
          var removal_sign_status1=result.removal_sign_status1;
          var install_sign_data_status2=result.install_sign_data_status2;
          var banner_order_status2=result.banner_order_status2;
          var removal_sign_status2=result.removal_sign_status2;
          var install_sign_data_status3=result.install_sign_data_status3;
          var banner_order_status3=result.banner_order_status3;
          var removal_sign_status3=result.removal_sign_status3;
          
          
     var locations4=[];
      
   
      var test = [
          install_sign_data_status1.forEach(function(data){
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
             }),
          
            banner_order_status1.forEach(function(data) {
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status1.forEach(function(data) {
             locations4.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          ]  
        
        
   
     var locations5=[];
    
      var test = [
          install_sign_data_status2.forEach(function(data){
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
          }),
          
            banner_order_status2.forEach(function(data) {
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status2.forEach(function(data) {
             locations5.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          ]    
          
           
    
      var locations6=[];
     

      var test = [
          install_sign_data_status3.forEach(function(data){
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_install_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
          }),
          
            banner_order_status3.forEach(function(data) {
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="edit_banner_admin/'+data.id+'/'+data.type+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            }),
                
            removal_sign_status3.forEach(function(data) {
             locations6.push(['<h2>Order-No. ' +data.id+'</h2><br>'+data.address+'<br>Order Status:'+data.status+'<br/><br/><a href="view_order_admin/'+data.id+'">View Order</a>',parseFloat(data.lat),parseFloat(data.lng)]);
            })
          
          ]  
      // var locations6= [status3,banner3,removal3];
           
           console.log(locations4);
           console.log(locations5);
           console.log(locations6);
           
           
           
            
$(document ).ready(function() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 3,
      center: new google.maps.LatLng( 28,77),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    var image1 = {
        url: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
    };
    var image2 = {
        url: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
    };
    var image3 = {
         url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
    };
  
    
    for (i = 0; i < locations4.length; i++) { 

      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations4[i][1], locations4[i][2]),
         id: "some",
         icon: image1,
           title: 'Hello 1!',
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations4[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
    
    
    for (i = 0; i < locations5.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations5[i][1], locations5[i][2]),
        icon: image2,
         title: 'Hello 2!',
        map: map
        
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations5[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
    
    for (i = 0; i < locations6.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations6[i][1], locations6[i][2]),
        icon: image3,
          title: 'Hello 3!',
        map: map
       
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations6[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    };
    
  })

    });
}
  </script>
    
 
        </div>

        <!-- Search Form -->
        <div class="hide" id="map_filter">
            <form>

                
                
                    <!-- Users Select -->
                    <div class="form-group">

                        <label for="s_user">Users: </label><br>

                        <span class="hide-native-select">
                                                    
                    <div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="None selected">
                        <span class="multiselect-selected-text">Select User</span> <b class="caret"></b></button>
                        <ul class="multiselect-container dropdown-menu">
                             @foreach($user AS $data)
                                    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="{{$data->name}}" onclick="userID(this)">{{$data->name}}</label></a></li>
                             @endforeach 
                            </ul>
                    </div></span>

                    </div>
                    <!-- /Users Select -->

                    <!-- Companies Select -->
                    <div class="form-group">

                        <label for="s_company">Companies</label><br>

                        <span class="hide-native-select">
                            <!--<select multiple="" class="form-control mapFilter mutiselect" id="s_company" name="companies[]">-->
                            <!--                                       <option value="">select Company</option>-->
                            <!--                                                       @foreach($company AS $data)-->
                            <!--                                                                <option value="{{$data->id}}">{{$data->company_name}}</option>-->
                            <!--                                                       @endforeach -->
                            <!-- </select>-->
                         <div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="None selected">
                             <span class="multiselect-selected-text">Select Company</span> <b class="caret"></b></button>
                             <ul class="multiselect-container dropdown-menu">
                                  @foreach($company AS $data)
                                             <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="{{$data->company_name}}" onclick="companyID(this)"> {{$data->company_name}}</label></a></li>
                                   @endforeach 
                                
                             </ul>
                             </div>
                        </span>

                    </div>
                    <!-- /Companies Select -->

                
                <!-- Created After Input -->
                <!--<div class="form-group">-->

                <!--    <label for="s_created">Created After</label><br>-->

                <!--    <input type="text" id="s_created" class="form-control datepicker mapFilter hasDatepicker" name="created_at">-->

                <!--</div>-->
                <!-- /Created After Input -->

                <!-- Placed After Input -->
                <!--<div class="form-group">-->

                <!--    <label for="s_placement">Placed After</label><br>-->

                <!--    <input type="text" id="s_placement" class="form-control datepicker mapFilter hasDatepicker" name="placement_date">-->

                <!--</div>-->
                <!-- /Placed After Input -->

                <!-- Status Select -->
                <div class="form-group">

                    <label for="s_status">Status</label><br>

                    <span class="hide-native-select"> 
                    <div class="btn-group">
                    <button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="None selected">
                            <span class="multiselect-selected-text">None selected</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu">
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Placed" onclick="statusID(this)"> Completed</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Waiting For Printing" onclick="statusID(this)"> In Process</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="On Hold" onclick="statusID(this)"> On Hold</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Archived" onclick="statusID(this)"> Archived</label></a></li>
                                </ul>
                                </div>
                            </span>
                   </div>
                <!-- /Status Select -->

                <!-- Type -->
                <div class="form-group">

                    <label for="s_type">Order Type</label><br>

                 
                    <select   onchange="typeID(this)" class="form-control mapFilter mutiselect" id="s_type">
                        <option value="install_order" >Order</option>
                        <option value="removal_order" >Removal</option>
                        <option value="banner_order">Banner</option>
                    </select>

                </div>
                <!-- /Type -->

                <!-- Address Search -->
                <!--<div class="form-group">-->

                <!--    <label for="s_address">Address</label><br>-->

                <!--    <input type="text" name="search" class="form-control mapFilter" id="s_address">-->

                <!--</div>-->
                <!-- /Address Search -->

                <!-- Clear Form Button -->
                <div class="form-group">
                    <a href="{{url('/order')}}" type="button" class="btn btn-default btn-clear">Clear</a>
                </div>
                <!-- /Clear Form Button -->

            </form>
        </div>
        <!-- /Search Form -->

    </div>
    <!-- /Map && Search -->

    <hr>

    <div class="row col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" id="templates-body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#orders" data-toggle="tab">Sign Placements</a></li>
                    <li><a href="#banners" data-toggle="tab">Banner Orders</a></li>
                    <li><a href="#removals" data-toggle="tab">Sign Removals</a></li>
                    <li><a href="#archived" data-toggle="tab">Archived Orders</a></li>
                    <li><a href="#all" data-toggle="tab">All Orders</a></li>
                                            <!--<li><a href="#what" data-toggle="tab">Orphaned Orders</a></li>-->
                                    </ul>
                <!-- /Nav Tabs -->

                <!-- Nav Body -->
                <div class="tab-content">

                    <!-- Orders -->
                    <div class="tab-pane fade in active" id="orders">
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                    <th>Up By Date</th>
                                </tr>
                                </thead>

                                <tbody>
                                     @foreach($sign_value1 AS $orders_val)
                                      <tr>
                                        <td>O-{{$orders_val->id}}</td>
                                        <td>{{$orders_val->company_name}}</td>
                                        <td>{{$orders_val->status}}</td>
                                        <td>{{$orders_val->address}}</td>
                                        <td>
                                            {{$orders_val->date}}
                                        </td>
                                        <td class="text-right">
                                           <a class="btn btn-default " href="edit_install/{{$orders_val->id}}">Edit</a>
                                           <a class="btn btn-danger" href="delete_install_sign/{{$orders_val->id}}">Delete</a>
                                        </td>
                                    </tr>
                                     @endforeach
                                                                  
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /Orders -->

                    <!-- Banners -->
                    <div class="tab-pane fade" id="banners">
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                <tr><th>ID</th>
                                <th>Status</th>
                                <th>Company</th>
                                <th>Address</th>
                                <th>Install By</th>
                                <th>Remove By</th>
                                <th></th>
                                </tr></thead>

                                <tbody>                          
                                      @foreach($banner_order AS $orders_val)
                                     <tr>
                                        <td>B-{{$orders_val->id}}</td>
                                        <td>{{$orders_val->status}}</td>
                                        <td>{{$orders_val->company_name}}</td>
                                        <td>{{$orders_val->address}}</td>
                                        <td>{{$orders_val->Installation_date}}</td>
                                        <td>{{$orders_val->remove_by}}</td>
                                        <td>
                                         <a href="edit_banner/{{$orders_val->id}}/{{$orders_val->type}}">
                                        <button class="btn btn-default btn-block" style="margin-bottom:2px">Edit</button>
                                        </a>
                                        <a type="submit" href="delete_banner/{{$orders_val->id}}" class="btn btn-danger btn-block">Delete</a>

                                        </td>
                                    </tr>
                                         @endforeach
                                         </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /Banners -->

                    <!-- Removals -->
                    <div class="tab-pane fade" id="removals">
                        <div class="table-responsive">
                                                            <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company</th>
                                        <th>Order ID</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Remove By Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                           @foreach($removal_sign AS $orders_val)
                                         <tr>
                                            <td>R-{{$orders_val->id}}</td>
                                           
                                            <td>{{$orders_val->company_name}}</td>
                                           <td> </td>
                                            <td>{{$orders_val->address}}</td>
                                            <td>{{$orders_val->status}}</td>
                                            <td>{{$orders_val->remove_by}}</td>
                                            <td> <a class="btn btn-default" href="view_order/{{$orders_val->id}}">View</a>
                                             <a class="btn btn-default" href="edit_removal/{{$orders_val->id}}">Edit</a>
                                            <a type="submit" href="delete_sign_removals/{{$orders_val->id}}" class="btn btn-danger btn-block">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach                          
                                                                          
                                  </tbody>

                                </table>
                                                    </div>
                    </div>
                    <!-- /Removals -->

                     <!--Simple Orders -->
                    <div class="tab-pane fade" id="archived">
                        <div class="table-responsive">
                                                            <table class="table table-striped">

                                    <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                    <th>Up By Date</th>
                                </tr>
                                </thead>

                                <tbody>
                                     @foreach($archived AS $orders_val)
                                      <tr>
                                        <td>O-{{$orders_val->id}}</td>
                                        <td>{{$orders_val->company_name}}</td>
                                        
                                        <td>{{$orders_val->status}}</td>
                                        <td>{{$orders_val->address}}</td>
                                        <td>
                                            {{$orders_val->date}}
                                        </td>
                                        <td class="text-right">
                                           <a class="btn btn-default " href="edit_install/{{$orders_val->id}}">Edit</a>
                                           <a class="btn btn-danger" href="delete_install_sign/{{$orders_val->id}}">Delete</a>
                                        </td>
                                    </tr>
                                     @endforeach
                                                                  
                                </tbody>

                                </table>
                                                    </div>
                    </div>
                    <!-- /Simple Orders -->

                    <!-- All Orders -->
                    <div class="tab-pane fade" id="all">
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                    <th>Up By Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                 @foreach($sign_value1 AS $orders_val)
                                   <tr>
                                        <td>O-{{$orders_val->id}}</td>
                                        <td>{{$orders_val->company_name}}</td>
                                        <td>{{$orders_val->status}}</td>
                                        <td>{{$orders_val->address}}</td>
                                        <td>{{$orders_val->date}}</td>
                                        <td class="text-right">
                                            <a class="btn btn-default " href="edit_install/{{$orders_val->id}}">View</a>
                                        </td>
                                    </tr>
                                  @endforeach
                                  @foreach($removal_sign AS $orders_val)
                                        <tr>
                                            <td>R-{{$orders_val->id}}</td>
                                            <td>{{$orders_val->company_name}}</td>
                                            <td>{{$orders_val->status}} </td>
                                            <td>{{$orders_val->address}}</td>
                                            <td>{{$orders_val->remove_by}}</td>
                                            <td> <a class="btn btn-default" href="view_order/{{$orders_val->id}}">View</a></td>
                                        </tr>
                                  @endforeach
                                    
                                    @foreach($banner_order AS $orders_val)
                                     <tr>
                                        <td>B-{{$orders_val->id}}</td>
                                        <td>{{$orders_val->company_name}}</td>
                                        <td>{{$orders_val->status}}</td>
                                        <td>{{$orders_val->address}}</td>
                                        <td>{{$orders_val->remove_by}}</td>
                                        <td>
                                         <a href="edit_banner/{{$orders_val->id}}/{{$orders_val->type}}">
                                        <button class="btn btn-default btn-block" style="margin-bottom:2px">View</button>
                                        </a>
                                        </td>
                                    </tr>
                                     @endforeach
                            </table>
                        </div>
                    </div>
                    <!-- /Archived Orders -->

                                            <!-- Orphaned Orders -->
                        <!--<div class="tab-pane fade" id="what">-->
                        <!--    <div class="table-responsive">-->
                        <!--        <table class="table table-striped">-->

                        <!--            <thead>-->
                        <!--            <tr>-->
                        <!--                <th>Order ID</th>-->
                        <!--                <th>Deleted At</th>-->
                        <!--            </tr>-->
                        <!--            </thead>-->

                        <!--            <tbody>-->
                        <!--                                                </tbody>-->

                        <!--        </table>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- /Orphaned Orders -->
                    
                </div>
                <!-- Nav Body -->

            </div>
        </div>
    </div>

</div>
        </div>
    </div>
    
    
      <script>
    $(function () {
        $(".datepicker").datepicker();
    });
</script>


    <script>
        $("#btn_filtermap").click(function() {
            var map_canvas = $("#mapCanvas");
                if (map_canvas.hasClass( "col-md-12" )) {
                    map_canvas.removeClass("col-md-12").addClass("col-md-8");
                    $("#map_filter").addClass("col-md-4").removeClass("hide");
                }else{
                    map_canvas.removeClass("col-md-8").addClass("col-md-12");
                    $("#map_filter").addClass("hide").removeClass("col-md-4");
                }
            });
    </script>
      
    <script>
    
    function myFunction(obj,callback){
         var url = "./User__Orders1";
     var data;
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            $.ajax({
                  url: url,
                  method: 'get',
                  data: { 'name': obj.value},
                  success: function(response){
                    data= JSON.parse(response);
                  callback(data);
                  }
            });
    }
    
     function myFunction1(obj,callback){
         var url = "./Company__Orders1";
     var data;
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            $.ajax({
                  url: url,
                  method: 'get',
                  data: { 'company_name': obj.value},
                  success: function(response){
                    data= JSON.parse(response);
                  callback(data);
                  }
            });
    }
    
     function myFunction2(obj,callback){
         var url = "./Status__Orders1";
     var data;
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            $.ajax({
                  url: url,
                  method: 'get',
                  data: { 'status': obj.value},
                  success: function(response){
                    data= JSON.parse(response);
                  callback(data);
                  }
            });
    }
     function myFunction3(obj,callback){
         var url = "./Orders__type1";
     var data;
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            $.ajax({
                  url: url,
                  method: 'get',
                  data: { 'type': obj.value},
                  success: function(response){
                    data= JSON.parse(response);
                  callback(data);
                  }
            });
    }

    </script>
    


@endsection