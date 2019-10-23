 @extends('user_dashboard.layouts.layout')
@section('content')

   
<div style="padding-top:60px"></div>

<div class="container order-info">

    <div class="row">

        <div class="col-sm-6">
            <h1>Order Info</h1>
        </div>

        <div class="col-sm-6">
            <div class="save-button-wrapper">

                <button type="submit" form="theform" class="btn btn-primary save">Save</button>

                <a href="" class="btn btn-default cancel">Cancel</a>

            </div>
        </div>

    </div>

    <form id="theform" action="{{url('update_banner1')}}" method="post" enctype="multipart/form-data" class="order-banner">
 {{csrf_field()}}
 

        <div class="banner-order-wrapper">

            <div class="row topbar">

                <div class="col-sm-6">
                    <div class="topbar-left-inner">

                        <label for="order_status">Order status:</label>
                                     @foreach($banner_value as  $value) 
                                        <i>{{$value->status}}</i>
                                      @endforeach 
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="topbar-right-inner">

                        
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-6">
                    <table class="info-table">
                          @foreach($banner_value as  $value) 
                        <tbody>
                        <tr>
                            <td class="heading">Order ID:</td>
                            <td>{{$value->id}}</td>
                        </tr>
                        <tr>
                            <td class="heading">Customer:</td>
                            <td>{{$value->user_name}}/ <strong>{{$value->company_name}}</strong></td>
                        </tr>
                        <tr>
                            <td class="heading">Order type:</td>
                            <td>Banner/Custom Graphic</td>
                        </tr>
                        <tr>
                            <td class="heading">Install by:</td>
                            <td><input type="text" name="install_by" class="datepicker" id="Installation_date" value="{{$value->Installation_date}}"></td>
                                                    </tr>
                            <input type="hidden" value="{{$value->id}}">                        
                        <tr>
                            <td class="heading">Location:</td>
                            <td id="glocation"><input id="searchInput" type="text" name="address"  value="{{$value->address}}"></td>
                        </tr>
                        <tr>
                            <td class="heading">Estimate:</td>
                            <td>
                                                                                                    No estimate provided yet.
                                                            </td>
                        </tr>
 @endforeach 
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-6">
                    <div class="map-iframe-wrapper">
                      
                        
                        <div  id="map"  style="border: 0"></div>
                                  <div class="form_area">
                                    <input type="hidden" name="location" id="location" value="{{$value->address}}">
                                   <input type="hidden" name="lat" value="{{$value->lat}}" id="lat">
                                  <input type="hidden" name="lng" value="{{$value->lng}}" id="lng">
                       </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <span class="banner-form-heading">Order Summary</span>
                </div>
            </div>
  @foreach($banner_value1 as  $value) 
         <div class="order-block">

                <!--<a class="delete-item" style="cursor: pointer;" onclick="$(this).parent().hide('fast',function(){$(this).remove()});total_banners--">-->
                <!--    <span class="glyphicon glyphicon-trash"></span><span>Delete</span>-->
                <!--</a>-->

                <div class="row">

                    <div class="col-sm-8">

                        <label for="banner_name">Name of the banner or custom graphic:</label>
                        <input type="text" name="banner_name[]" class="banner_name" value="{{$value->banner_name}}">
                           <input type="hidden" value="{{$value->id}}" name="bannerid[]">  

                        <label for="banner_description">Description (general design, text needed, approx size):</label>
                        <textarea name="banner_description[]" rows="4">{{$value->description}}</textarea>

                        <label for="installation_instructions">Install Instructions:</label>
                        <textarea name="installation_instructions[]" rows="4">{{$value->instructions}}</textarea>

                       
                    </div>

                    <div class="col-sm-4">

                        <label for="photo_upload">Map or photo of desired location:</label>
                                                    <img id="location_picture_0" src="http://demosigns.westallisblue.com/images/placeholder_01.png" alt="" class="img-responsive">
                                                <input onchange="readURL(this,'location_picture_0')" type="file" name="placement_location_pictures[0]">

                       
                        
                        
                    </div>

                </div>

            </div>
            
          
@endforeach
  <input type="hidden" value="<?php $i = 1; $i++; echo $i;?>" name="count">   
  <input type="hidden" value="{{$value->banner_id}}" name="banner_id">
            <!--<a style="cursor: pointer;" id="add_banner_button" class="btn btn-default add-banner">-->
            <!--    <span class="glyphicon glyphicon-plus-sign"></span><span>Add another banner/custom graphic</span>-->
            <!--</a>-->

            <div class="row">
                <div class="col-sm-12">

                    <span class="banner-form-heading">Total Charges</span>

                    <table class="total-charges">

                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price (USD)</th>
                                                    </tr>
                        </thead>

                        <tbody>

                                                                            
                        </tbody>

                    </table>

                                            <br>
                    
                    <table class="final-charges">

                        <tbody>
                        <tr>
                            <td class="heading">Subtotal</td>
                            <td id="SubTotal">$0.00</td>
                        </tr>
                        <tr>
                            <td class="heading">Tax</td>
                            <td id="Tax">$0.00</td>
                        </tr>
                        <tr class="final-price">
                            <td class="heading">Total</td>
                            <td id="TotalPrice">$0.00</td>
                        </tr>
                        </tbody>

                    </table>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="save-button-wrapper bottom">

                    <button type="submit" class="btn btn-primary save">Save</button>

                    <a href="{{url('/order')}}" class="btn btn-default cancel">Cancel</a>

                </div>
            </div>
        </div>
  
    </form>

</div>

<script type="text/javascript">

    var current_banner_id = parseInt('1');

    var total_banners = parseInt('1');

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

    function readURL(input,img_handle_id) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input)
                    .closest(".col-sm-4")
                    .find("#" + img_handle_id)
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function calculatePrice() {
        var SubTotal = 0;
        $.each($('.fee_price'),function(index,element) {
            SubTotal += parseFloat($(element).val());
        });
        var Tax = parseFloat('5.60') / 100 * SubTotal;
        var Total = SubTotal + Tax;
        $('#SubTotal').text('$' + SubTotal.toFixed(2));
        $('#Tax').text('$' + Tax.toFixed(2));
        $('#TotalPrice').text('$' + Total.toFixed(2));
    }

    $(document).ready(function() {
        calculatePrice();
    });

    $('.order-banner').submit(function() {
        $('#BannerTemplate').remove();
        $('#installation_fee_template').remove();
        $('input[name="banners_count"]').val(total_banners);
    });

</script>
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