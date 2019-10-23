 @extends('user_dashboard.layouts.layout')
@section('content')

    
<div style="padding-top:60px"></div>

    <div class="container">

        <div class="page-header">
               @foreach($banner_value as  $value) 
            <h1>Editing Removal new {{$value->id}}</h1>
               @endforeach 
        </div>
        
   <form action="{{url('update_banner')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
              @foreach($banner_value as  $value)
            <div class="row">
               <input type="hidden" value="{{$value->id}}" name="id" >
                <div class="col-md-6">

                    <h3>Removal Address</h3>
                    <p id="glocation"><input title="Address" type="text" name="address"  id="searchInput" class="form-control" value="{{$value->address}}"></p>
                    <hr>

                    <h3>Removal Instructions</h3>
                    <textarea class="form-control" name="removal_instructions">{{$value->removal_instructions}}</textarea>

                    <hr>

                    <h3>When should these signs be removed?</h3>
                    <input type="text" title="Remove By Date" class="form-control" name="remove_by" value="{{$value->remove_by}}">
                    
                    
                    <hr>


                    

                </div>

                <div class="col-md-6">

                    <div class="map-iframe-wrapper removal-map">
                     
                        <div  id="map" >
                            
                        </div>
                                  <div class="form_area">
                                    <input type="hidden" name="location" id="location" value="{{$value->address}}">
                                   <input type="hidden" name="lat" value="{{$value->lat}}" id="lat">
                                  <input type="hidden" name="lng" value="{{$value->lng}}" id="lng">
                 </div>
                    </div>

                    <hr style="margin-top:40px">

                    
                </div>

                    <button class="btn btn-success btn-block" type="submit" value="">Update Removal Order</button>
            </div>
  @endforeach 
        </form>

    </div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBz-LGvlIHTQoeJ1E7GMplSXzbFy1d6Qso&libraries=places"></script>

 <!--<input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">-->

<script>
/* script */
function initialize() {
         @foreach($banner_value as  $value)
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