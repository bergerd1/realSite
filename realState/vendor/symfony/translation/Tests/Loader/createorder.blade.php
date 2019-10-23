@extends('admin.layouts/backend_layout')

@section('content')


 

 <div class="container">
 <form action="{{url('/place_order')}}" method="post" enctype="multipart/form-data">
       {{csrf_field()}}

        <div class="page-header">
            <h1>Create Order</h1>
        </div>

        <div class="col-md-9 col-md-offset-1 panel panel-default">

            <!-- Order Ownership -->
            <div class="panel-body">

                <div class="row">

                    <!-- Company Name -->
                    <div class="col-md-6">

                        <label>Company Name</label>
  @foreach($company1 AS $company_val)
                        <h4>{{$company_val->company_name}} </h4>
                        <input type="hidden" name="company_name" value="{{$company_val->company_name}}">
                            <input type="hidden" class="form-control" name="status" value="Waiting For Printing">
  @endforeach
                    </div>
                    <!-- /Company Name -->

                    <!-- Users Name -->
                    <div class="col-md-6">

                        <label>User Name</label>
 @foreach($user1 AS $user_val)
                        <h4>{{$user_val->name}}</h4>
                          <input type="hidden" name="user_name" value="{{$user_val->name}}">
  @endforeach
                    </div>
                    <!-- /Users Name -->

                </div>

                <hr>

            </div>
            <!-- /Order Ownership -->

            <!-- Form Body -->
            <div class="panel-body">
               
                    <!-- Name Input -->
                    <div class="row">
                        <div class="col-md-12">

                            <label>Name</label>

                            <input name="name" type="text" class="form-control">
                            <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">

                        </div>
                    </div>
                    <!-- /Name Input -->

                    <hr>

                    <!-- Description Input -->
                    <div class="row">
                        <div class="col-md-12">

                            <label>Description</label>

                            <textarea name="description" class="form-control"></textarea>

                        </div>
                    </div>
                    <!-- /Description Input -->

                    <hr>

                    <!-- Address Input -->
                    <div class="row">

                        <!-- Address Field -->
                        <div class="col-md-12">

                            <label for="address-field">Address </label>

                            <input type="text" id="searchInput" name="address" class="form-control nm-form" value="" placeholder="Enter a location" >

                        </div>
                        <!-- /Address Field -->

                        <!-- Map -->
                        <div class="row col-md-12 row-map">
                           
                         <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                 <div class="form_area">
                     <input type="text" name="location" id="location">
                     <input type="text" name="lat" id="lat">
                     <input type="text" name="lng" id="lng">
                 </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Map -->

            </div>
            <!-- /Address Input -->

            <hr>

            <!-- Quantity & File -->
            <div class="row">

                <!-- Quantity Input -->
                <div class="col-md-6">

                    <label>Quantity</label>

                    <input type="number" name="quantity" class="form-control">

                </div>
                <!-- /Quantity Input -->

                <!-- File Upload -->
                <div class="col-md-6">

                    <label>File Upload</label>

                    <input type="file" class="form-control" name="file">

                </div>
               
                

            
                <!-- /File Upload -->

            </div>
            <!-- /Quantity & File -->

            <hr>

            <!-- Submit -->
            <div class="row">

                <br>

                <div class="col-md-6 col-md-offset-3">

                    <!-- Checkbox -->
                    <div id="confirm_checkbox">

                        <input type="checkbox">

                        <strong>I acknowledge that by submitting this form that I am granting permission to proceed with this work order.</strong>

                    </div>
                    <!-- /Checkbox -->

                    <!-- Button -->
                   
                        <input type="submit" value="Create Order" class="btn btn-primary">
                   
                    <!-- /Button -->

                </div>

            </div>
            <!-- /Submit -->

          
        </div>
        <!-- /Form Body -->

    </div>
  </form>
    </div>

   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBz-LGvlIHTQoeJ1E7GMplSXzbFy1d6Qso&libraries=places"></script>

 <!--<input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">-->

<script>
/* script */
function initialize() {
   var latlng = new google.maps.LatLng(28.5355161,77.39102649999995);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
   document.getElementById('location').value = address;
   document.getElementById('lat').value = lat;
   document.getElementById('lng').value = lng;
}
google.maps.event.addDomListener(window, 'load', initialize);
</script> 
    
    
    
    
    

    


@endsection