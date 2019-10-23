@extends('admin.layouts/backend_layout')

@section('content')


    
<div class="container-fluid">
    <div class="row col-md-offset-3 col-md-6">
<br>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">    <div class="page-header">
    @foreach($order_value as  $value)
        <h1>Update Order # {{$value->id}}</h1>
         @endforeach 
        <p></p>
    </div>
    <div class="col-md-9 col-md-offset-1 panel panel-default">
        <div class="panel-body">
<form action="{{url('update_order')}}" method="POST" enctype="multipart/form-data" id="update_form">
   {{csrf_field()}}
                 @foreach($order_value as  $value) 
        
                <div class="row">
                    <div class="col-md-12">
                        <label for="sign_name">Name</label>
                        <input id="sign_name" type="text" name="name" class="form-control" value="{{$value->name}}">
                        <input type="hidden" name="id" value="{{$value->id}}">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5">{{$value->description}}</textarea>
                    </div>
                </div>
                <hr>
                                <div class="row">
                    <div class="col-md-12">
                        <label for="address-field">Address</label>
                        <p id="glocation"><input type="text" id="searchInput" name="address" class="form-control" value="{{$value->address}}"/></p>
                    </div>
                    <div class="row col-md-12" style="margin-right: auto; margin-left: auto;">
						<!--<div id="map" class="form-group map_canvas"></div>-->
						   
               <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                 <div class="form_area">
                     <input type="hidden" name="location" id="location">
                     <input type="hidden" name="lat" id="lat" value="{{$value->lat}}">
                     <input type="hidden" name="lng" id="lng" value="{{$value->lng}}">
                 </div>
		    	</div>
			
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="quantity">Quantity</label>
                        <input id="quantity" type="number" class="form-control" name="quantity" value="{{$value->quantity}}">
                    </div>
                    <div class="col-md-6">
                          <a href="" target="_blank"><label>File</label></a>
                             <input type="file" class="form-control" name="file">
                        &nbsp;
                        <a href="" target="_blank">
                            <img src="../backend/template_picture/{{$value->file}}" style="width: 100px;" />
                        </a>
                                            </div>
                </div>

                <hr>

                <div class="row">

                    <div class="col-md-6">
                        <label for="created_at">Created At</label> 
                                                    <input id="created_at" class="form-control" type="text" disabled value="{{$value->date}}">
                                            </div>

                    <div class="col-md-6">
                        <label for="updated_at">Updated At</label>
                                                    <input id="updated_at" class="form-control" type="text" disabled value="{{$value->date}}">
                                            </div>

                </div>

                <hr>

                <div class="row col-md-12">
                    <button class="btn btn-primary" type="submit">Save</button>
                   
                </div>
                 @endforeach 

            </form>
        </div>
    </div>
</div>
        </div>
    </div><!-- /.container -->
</div>
</div>

   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBz-LGvlIHTQoeJ1E7GMplSXzbFy1d6Qso&libraries=places"></script>

 <!--<input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">-->

<script>
/* script */
function initialize() {
       @foreach($order_value as  $value) 
   var latlng = new google.maps.LatLng({{$value->lat}},{{$value->lng}});
       @endforeach 
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

 function one(){
    setTimeout(function(){
        debugger;
        if(document.getElementById('searchInput').style.position === 'absolute'){
            two();
        }
        else{
            one();
        }
    },50);  
  }
  function two(){
      $($("#searchInput").detach()).appendTo("#glocation");
  $("#searchInput").removeAttr("style") ; 
  }
  one();
</script> 
    
    
    
    
    


@endsection