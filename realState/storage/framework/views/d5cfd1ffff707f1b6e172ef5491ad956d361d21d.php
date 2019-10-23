<style>.form-control{border:solid 0.5px !important;border-color:#777575 !important;}
label{color:#fff !important;}
.row{margin-bottom:15px;}
.table>tbody>tr>th, .table>thead>tr>td, .table>thead>tr>th{font-weight:100 !important; font-size:17px !important;}
</style>



<?php $__env->startSection('content'); ?>

        <!-- Page Header -->
        <div class="page-header" style="border:none;">
  <?php $__currentLoopData = $sign_value1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h3 style="color:#fff;">Update Order #  <?php echo e($value->id); ?></h3>
    
            <h4 style="color:#fff;"><?php echo e($value->company_name); ?></h4>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
        <!-- /Page Header -->

        

        <!-- Page Body -->
        <div class="col-md-9 col-md-offset-1 panel panel-default" style="background:#222;">
            <div class="panel-body">
                <form action="<?php echo e(url('update_install_admin')); ?>" method="POST" enctype="multipart/form-data" id="update_form">
                      <?php echo e(csrf_field()); ?>

   
 <?php $__currentLoopData = $sign_value1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <input type="hidden" name="id" value="<?php echo e($value->id); ?>">

                    <!-- Order Status -->
                    <div class="row">

                        <!-- Status Select -->
                         <div class="col-sm-6">

                            <label for="status" style="color:#fff;">Order Status</label>

                            <select class="form-control" name="status" id="status">
                                    <option value="Waiting For Printing" >
                                        Waiting For Printing
                                    </option>
                                     <option value="Ready For Placement" >
                                        Ready For Placement
                                    </option>
                                                                    <option value="Placed" >
                                        Placed
                                    </option>
                                                                    <option value="On Hold" >
                                        On Hold
                                    </option>
                                                                    <option value="Recalled" >
                                        Recalled
                                    </option>
                                                                    <option value="Archived" >
                                        Archived
                                    </option>
                                                            </select>

                        </div>
                        <!-- /Status Select -->

                        <!-- Navigation Buttons -->
                        <div class="col-sm-6">
                            <br>

                            <button class="btn btn-primary" type="submit" name="draft">Save</button>

                            <a class="btn btn-default" href="<?php echo e(url('/currentorders')); ?>"> Go Back</a>

                        </div>
                        <!-- /Navigation Buttons -->

                    </div>
                    <!-- /Order Status -->

                    <hr />

                    <!-- Up-By && Instructions -->
                    <div class="row">

                        <div class="col-sm-4" class="text-right">
                            <label>Up by date:</label>
                                   <label><?php echo e($value->date); ?></label>
                        </div>

                        <div class="col-sm-8" class="text-right">
                            <label>Instructions:</label>
                      
                        <textarea class="form-control" id="instructions-field" rows="3" name="special_instructions" title="Instructions">
                            <?php echo e($value->special_instructions); ?>

                        </textarea>
                        </div>

                    </div>
                    <!-- /Up-By && Instructions -->
                    <!-- Location Fields -->
                    <div class="row">
                        <div class="col-md-12">

                            <label for="address-field">Location</label>

                            
                                <div class="input-group" style="width:100%;">

                                  <p id="glocation"  style="background:#000;">  <input type="text" name="address"  value="<?php echo e($value->address); ?>" class="form-control" class="form-control" readonly style="background:none;"></p>

                                    <span class="input-group-btn">
                                    <!--<button class="btn btn-default" type="button" id="btn_editAddress">Edit Address</button>-->
                                </span>

                                </div>

                             <div  id="map" style="width:100%; height: 200px" class="map_canvas"></div>
                                  <div class="form_area">
                                    <input type="hidden" name="location" id="location" value="<?php echo e($value->address); ?>">
                                   <input type="hidden" name="lat" value="<?php echo e($value->lat); ?>" id="lat">
                                  <input type="hidden" name="lng" value="<?php echo e($value->lng); ?>" id="lng">
                 </div>
                           

                        </div>
                    </div>
                    <!-- /Location Fields -->
                    <!-- Attachment Link -->
                        <div class="row">

                            <div class="col-md-2 text-right">
                                <label>Attached File:</label>
                            </div>

                            <div class="col-md-10">
                                <a href="" target="_new">
                             
                                  <img src="../backend/template_picture/<?php echo e($value->attachment); ?>" alt="image"  width="200px" height="200px"/>   
                                </a>
                            </div>

                        </div>
                        <!-- /Attachment Link -->

                    
                                            <!-- Attached Image Preview -->
                            <!-- /Attached Image Preview -->
                <!-- Notes -->
                    <div class="row">

                        <div class="col-md-2" class="text-right">
                            <label for="order-notes-field">Order Notes:</label>
                        </div>

                        <div class="col-md-10">
                            <textarea class="form-control" rows="5" id="order-notes-field" name="instructions-field">testing purpose</textarea>
                        </div>

                    </div>
                    <!-- /Notes -->
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php $__currentLoopData = $sign_value2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sign_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if($sign_val->template_order_quantity!=0) { ?>            
                 <div class="col-sm-6">
                     <h4 style="color:#fff;">Signs</h4>
                    <span class="image-title" style="color:#fff;"><?php echo e($sign_val->temp_name); ?></span>
                    <img src="../backend/template_picture/<?php echo e($sign_val->temp_picture); ?>" alt="" class="img-responsive" style="border:1px solid black">
                 </div>
<?php } ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                        
                   

                               
                                                
                  
                    
                    
                
                <!-- Pricing -->
                    <div class="row">
                        <div class="col-sm-12">

                            <h3 style="color:#fff;">Pricing</h3>

                            <!-- Pricing Table -->
                            <div class="table-responsive">
                                <table class="table table-striped">

                                    <thead>
                                    <tr style="border:solid 0.5px;">
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>

                                    <tbody class="templates" id="templates">

                                    <tr style="border:solid 0.5px;">
                                        <th colspan="4">Templates</th>
                                    </tr>
 <?php
$total="";
?>
                                        <?php $__currentLoopData = $sign_value2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sign_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                        
                                        if($sign_val->template_order_quantity !=0) { ?>
                                        <?php 
                                        
                                        $d1=$sign_val->template_order_quantity*$sign_val->temp_price;
                                       $total+=$d1;
                                        
                                        ?>
                        
                                         <tr>
                                        <td><?php echo e($sign_val->temp_name); ?></td>
                                        <td><?php echo e($sign_val->temp_price); ?></td>
                                        <td><?php echo e($sign_val->template_order_quantity); ?></td>
                                        <td class="price-line-item">$<?php echo $d1; ?>.00</td>
                                         </tr>
                                          <?php } ?>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        
                                       <tr  style="border:solid 0.5px;"> <th colspan="4">Install Options</th>
                                 <!--<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#installationModal">Edit Install Options</button>-->
                                 <!--                                                   </th>-->
                                    </tr>
                           
             <?php
                $totaldata="";
                ?>
                            <?php $__currentLoopData = $installation_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installation_detail_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                        
                                        $d4=$installation_detail_val->price*$installation_detail_val->installation_order;
                                        $totaldata+=$d4;
                                        
                                 ?>
                                 <tr class="collapse in installations">
                                   <td> <?php echo e($installation_detail_val->title); ?> </td>
                                   <td> <?php echo e($installation_detail_val->price); ?></td>
                                   <td> <?php echo e($installation_detail_val->installation_order); ?> </td>
                                
                                 
                                  <td>  $<?php echo $d4; ?>.00 </td>
                                
                               </tr>
                                   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                   <?php 

                 $total1=$total+$totaldata;
                 $tax=5.60;
                 $tax_val=$tax /100;
                 $Subtotal=$tax_val*$total1;
                 $Final= $Subtotal+$total1;
                 ?>    
                                    <tr>
                                        <td colspan="3">
                                            <label>Tax</label>
                                        </td>
                                     
                                        <td>$<?php echo $Subtotal; ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">
                                            <label>Total</label>
                                        </td>
                                        <td>$<?php echo $Final; ?></td>
                                    </tr>

                                    </tbody>

                                </table>
                            </div>
                            <!-- /Pricing Table -->

                            
                                <!-- Install Options Modal -->
                                <div class="modal fade" id="installationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Install Options</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                                                                            <div class="col-md-4">
                                                                                                                        <input min="0" type="number" step="1" class="form-control install-option-input" value="2" name="installOptions[7]" title="Install Option 7">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <b>Residential Hanging Post Install: $37.00</b><br>
                                                            <small>Residential Hanging Post Install</small>
                                                        </div>
                                                                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="modalSave">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Install Options Modal -->

                                
                            
                        </div>
                    </div>
                    <!-- /Pricing -->

                    <div class="row col-md-12">
                        <button class="btn btn-primary pull-right" type="submit" name="draft">Save</button>
                    </div>
 
                </form>
            </div>
        </div>
        <!-- /Page Body -->

 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBz-LGvlIHTQoeJ1E7GMplSXzbFy1d6Qso&libraries=places"></script>

 <!--<input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">-->

<script>
/* script */
function initialize() {
     <?php $__currentLoopData = $sign_value1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   var latlng = new google.maps.LatLng(<?php echo e($value->lat); ?>,<?php echo e($value->lng); ?>);
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
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
    
    
    






<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts/backend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>