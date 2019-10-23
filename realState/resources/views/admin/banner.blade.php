
    @extends('user_dashboard.layouts.layout')
@section('content')


  
  
  



    
<div style="padding-top:60px"></div>

    <div class="container">

        
        <div class="row">
            <div class="col-sm-12">
                <h1>Order a Banner/Custom Graphic</h1>
            </div>
        </div>

        <form action="{{url('/banner_order')}}" class="order-banner" method="post" enctype="multipart/form-data">
{{csrf_field()}}
           

            <div class="banner-order-wrapper">

                <div class="row">
                    <div class="col-sm-12">

                        <h2 class="banner-order-title">Order banners or custom graphics for a single location</h2>

                        <p>Please provide a description of your banner/custom graphic. You can order multiple banners or
                            graphics for a single location. We will review your information and then provide a quote
                            before processing your order.</p>

                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-6">

                        <span class="banner-form-heading">Where and when would you like the banner/graphics installed?</span>

                        <label for="address">Address or general location:</label>
                      <p id="glocation">  <input type="text"  name="address" id="searchInput"  value="" required></p>

                        <label for="datepicker">Installation date:</label>
                        <input type="text" name="Installation_date" id="datepicker" value="<?php echo  date("Y/m/d"); ?>">
                          <input type="hidden" name="remove_by"  value="N/A">
                          <input type="hidden" name="removal_instructions"  value="N/A">
                          <input type="hidden" name="order_id"  value="N/A">
                          <input type="hidden" name="type" value="banner">
                          <input type="hidden" name="company_name" value="<?php $company_id=  Session::get('company_name'); echo $company_id;?>" >
                           <input type="hidden" name="status" value="Awaiting Printing">
                          
                    </div>

                    <div class="col-sm-6">
                        <div class="map-iframe-wrapper">
                                
                         <div class="map" id="map"style="border:0" ></div>
                 <div class="form_area">
                     <input type="text" name="location" id="location">
                     <input type="text" name="lat" id="lat">
                     <input type="text" name="lng" id="lng">
                 </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <span class="banner-form-heading">Where and when would you like the banner/graphics installed?</span>
                    </div>
                </div>

                <div style="display:none" class="order-block" id="BannerTemplate">

                  
                    <a class="delete-item" style="cursor: pointer;" onclick="$(this).parent().hide('fast',function(){$(this).remove()});total_banners--;">
                        <span class="glyphicon glyphicon-trash"></span><span>Delete</span>
                    </a>

                    <div class="row">

                        <div class="col-sm-8">

                            <label for="banner_name">Name of the banner or custom graphic:</label>
                          <input type="text" name="banner_name[]" id="banner_name" class="banner_name">

                            <label for="banner_description[--BANNER_NO--]">Description (general design, text needed, approx size):</label>
                            <textarea name="description[]" id="banner_description[--BANNER_NO--]" rows="4"></textarea>

                            <label for="installation_instructions[--BANNER_NO--]">Installation Instructions:</label>
                            <textarea name="instructions[]" id="installation_instructions[--BANNER_NO--]" rows="4"></textarea>

                        </div>

                        <div class="col-sm-4">

                            <label for="photo_upload">Map or photo of desired location:</label>

                            <!--<img style="min-width:100%" src="http://demosigns.westallisblue.com/images/placeholder_01.png" alt="" class="img-responsive">-->

                            <input  type="file" name="map_photo[]">

                        </div>

                    </div>

                </div>

                <button type="button" id="add_banner_button" class="btn btn-default add-banner">
                    <span class="glyphicon glyphicon-plus-sign"></span><span>Add banner/custom graphic</span>
                </button>

            </div>

            <button href="#" type="submit" class="btn btn-default submit">Place Banner/Custom Order</button>

            <input style="display: none;" readonly name="banners_count" value="0" title="banners count">

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
    
    


<script type="text/javascript">

    var current_banner_id = 0;

    var total_banners = 0;

    $(document).ready(function() {
        $('#add_banner_button').trigger('click');
    });

    $('#add_banner_button').on('click',function() {
        var BannerTemplate = $('#BannerTemplate');
        BannerTemplate.before(
            '<div id="banner_' + current_banner_id + '" style="display: none;" class="order-block">' +
                BannerTemplate.html().replace(/--BANNER_NO--/g,current_banner_id) +
            '</div>'
        );
        $('#banner_' + current_banner_id)
            .show('fast')
            .removeAttr('id');
        current_banner_id++;
        total_banners++;
    });

    $("#datepicker")
        .datepicker({
            dateFormat: "mm-dd-yy",
            defaultDate: '06-11-2018',
            minDate: new Date()
        })
        .on('change',function() {
            $(this).attr('value', $(this).val());
        });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            var ImageTypes = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];  //acceptable file types

            var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
                isImage = ImageTypes.indexOf(extension) > -1,  //is extension in acceptable types
                isPdf = extension === 'pdf',
                isDoc = ['doc','docx'].indexOf(extension) > -1;

            reader.onload = function (e) {

                var src;

                if (isImage) {
                    src = e.target.result;
                }else if (isPdf) {
                    src = '';
                }else if (isDoc) {
                    src = '';
                }

                $(input)
                    .closest(".col-sm-4")
                    .find("img")
                    .attr('src', src)

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.order-banner').submit(function() {
        $('#BannerTemplate').remove();
        $('input[name="banners_count"]').val(total_banners);
    });

</script>


@endsection