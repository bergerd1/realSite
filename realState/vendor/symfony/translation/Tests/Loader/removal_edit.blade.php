@extends('admin.layouts/backend_layout')
<!--header nav-->

@section('content')

        <div class="row">
            <div class="col-md-12">    <div class="page-header">
                 @foreach($order_value as  $value)
        <h3>Removal # {{$value->id}}</h3>
       
        <h4>{{$value->company_name}}/{{$value->user_name}}</h4>
           @endforeach
    </div>
    <div class="col-md-offset-1 panel panel-default">
        <div class="panel-body">
            <form action="{{url('update_removal_admin')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
   
   @foreach($order_value as  $value) 
              
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-default pull-left" href="{{url('currentorders')}}">Go Back</a>
                    </div>
                        <div class="col-sm-6">
                            <select class="form-control"  name="status" id="installation_list">
                                                                                 <option value="Pending" >Pending</option>
                                                                                 <option value="Removal Completed" >Removal Completed</option>
                                                            </select>
                            <button class="btn btn-primary dropdown-toggle" type="submit">Save</button>
                        </div>
                                    </div>
                <hr/>
                <div class="row">
                    <div class="col-md-2" class="text-right">
                        <label>Remove by date:</label>
                    </div>
                    <div class="col-md-2">{{$value->remove_by}}</div>
                    <div class="col-md-2" class="text-right">
                        <label>Instructions:</label>
                    </div>
                    <div class="col-md-6"><textarea rows="5" name="instructions" class="form-control" >{{$value->instructions}}</textarea></div>
                    <input type="hidden" name="id" value="{{$value->id}}">
                </div>
                @endforeach
                                <h3>Removal Costs</h3>
                <div class="row col-md-12">
                    <ul class="list-group">
                                 @foreach($removalInstallation as $value)
									<li class="list-group-item">1 x {{$value->title}}: ${{$value->price}}</li>
				            	@endforeach
                                            </ul>
                </div>
                <hr/>
    @foreach($order_value as  $value)
                <div class="row">
                    <div class="col-md-12">
                        <label for="address-field">Location</label>
                        <p id="glocation"><input type="text" name="address-field" id="searchInput" value="{{$value->address}}"
                               class="form-control" disabled></p>
                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                 <div class="form_area">
                     <input type="hidden" name="location" id="location">
                     <input type="hidden" name="lat" id="lat">
                     <input type="hidden" name="lng" id="lng">
                 </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>File Attachment</h3>
                              <img src="../{{$value->map_file}}" width="200px" height="200px"/>   
                        <input type="file" class="form-control" name="map_file"><br>
                        <input type="hidden" name="map_file_data" value="{{$value->map_file}}">
                        <a href="../donwload-file/{{$value->id}}"><p>Download</p></a>
                                            </div>
                </div>
     @endforeach
                <hr>
                <div class="row">

                    <div class="col-md-12">


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Pricing</h3>

                            <div class="table-responsive">
                                <table class="table table-striped">

<?php
$total="";
?>
                                    <tbody class="templates" id="templates">
                                                                        @foreach($removalInstallation as $value)
                                  <?php
                                     $total+=$value->price;
                                     ?>
							 <tr>
							     <td colspan="3"><lable>Removal of signs cost</lable></td>
							     <td>${{$value->price}}</td>
							 </tr>
							       @endforeach
							       <?php
                                
                                 $tax=5.60;
                                 $tax_val=$tax /100;
                                 $Subtotal=$tax_val*$total;
                               
                                ?>
                             <tr>
                                 <td colspan="3"><lable>Out of service area fee</lable></td>
                                 <td>$0.00</td>
                            </tr>
                             <tr>
                                 <td colspan="3"><lable>Tax</lable></td>
                                 <td>$<?php echo $Subtotal;?> </td>
                            </tr>
                             <tr>
                                 <td colspan="3"><lable>Total</lable></td>
                                 <td>$<?php echo $total+$Subtotal; ?> </td>
                            </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>


                <div class="row">
                    <a class="btn btn-default pull-left" href=""> Back</a>
                                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                                    </div>
           </form> </div></div>
     


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
  
    
  $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script> 
    
    
    
    
    
        
         
@endsection