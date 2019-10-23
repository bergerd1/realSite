<!--header nav-->

<?php $__env->startSection('content'); ?>




    
<div style="padding-top:60px"></div>

<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <h1>Remove a Sign</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs install-sign" role="tablist">
                <li role="presentation" class=" active ">
                    <a aria-controls="home" role="tab">Step 1: <strong>Set Location</strong></a>
                </li>
                <li role="presentation" class="">
                    <a aria-controls="profile" role="tab">Step 2: <strong>Removal Options</strong></a>
                </li>
                <li role="presentation" class="">
                    <a aria-controls="settings" role="tab">Step 3: <strong>Review Order</strong></a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active">

                    <div class="row">
    <div class="col-sm-12">
        <h2 class="tab-title">Where is the sign located?</h2>
    </div>
</div>

<div class="row">

   
        <form action="<?php echo e(url('/removal_sign_data1')); ?>" id="theform" class="sign-location" method="post" enctype="multipart/form-data">
   <?php echo e(csrf_field()); ?>

          
         

 <div class="col-sm-4">
            <div class="row">

                <div class="col-xs-12">

                    
                    <input type="radio" id="current-location" class="locations" name="existing_location"  value="1"  />

                    <label for="current-location" class="current-location" style="display:inline;">Current installation location</label>

                    <br>

                    <input type="radio" id="new-location" class="locations" name="existing_location"  checked="checked"  value="0" />

                    <label for="new-location" class="new-location" style="display:inline;">New location</label>

                    
                </div>

                <div id="cur-loc" class="col-sm-12"  style="display:none" >

                    <label for="current_location_address">Existing Order:</label>

                    
                    <select name="order_id" id="current_location_address"  value="nothing" class="full-width-input">
                        <option value="" selected="selected"></option>
                        <option value="Unknown" ><strong>Order Number - Sign Address</strong></option>
                                                                                                                                                                                                                        </select>

                    
                </div>

                <div id="new-loc" class="col-sm-12">

                    <label for="address-field">Address:</label>

                    
<p id="glocation"><input value="" type="text" id="searchInput" name="address" required></p>
                    <input type="hidden" name="status" value="Pending">

                    <br>

                </div>

                <div class="col-sm-12">

                    <label for="date">Removal date:</label>

                    
                    <input type="text" name="remove_by" id="datepicker"
                           value="<?php echo  date("Y/m/d"); ?>">

                    
                </div>

                <div class="col-sm-12">

                    
                    <label for="special_instructions">Special instructions:</label>

                    <textarea id="special_instructions" name="instructions"></textarea>
                     <input type="hidden" name="company_name" value="<?php $company_id=  Session::get('company_name'); echo $company_id;?>" >

                </div>

                <div class="col-sm-12">

                    <label for="file">Map or photo of desired location:</label>

                    
                    <input name="map_file" id="file" type="file" >

                    <small></small>

                </div>

            </div>
       
    </div>

    <div class="col-sm-8">
        <div class="map-iframe-wrapper">
          
            <div class="map" id="map"style="height:100%; width:100%;position: absolute" ></div>
                 <div class="form_area">
                     <input type="hidden" name="location" id="location">
                     <input type="hidden" name="lat" id="lat">
                     <input type="hidden" name="lng" id="lng">
                 </div>
        </div>
    </div>
 </form>
</div>

<div class="row">
    <div class="col-sm-12">
        <button type="submit" form="theform" id="next_step_button" class="btn btn-primary next-step">
            Next: Removal Options <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
            </div>
</div>

                </div>
            </div>

        </div>
    </div>

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
    
    
   <script>
                        $(document).ready(function() {
                            $('.locations').trigger('change');
                        });
                        $('.locations').change(function() {
                            var address_field = $('#address-field');
                            var cur_loc = $('#cur-loc');
                            if (parseInt($('input[name="existing_location"]:checked').val()) === 0) {
                                address_field.removeAttr('readonly');
                                cur_loc.hide('fast')
                            }else {
                                address_field.attr('readonly',true);
                                cur_loc.show('fast')
                            }
                        });
                    </script>     
                    
                    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>