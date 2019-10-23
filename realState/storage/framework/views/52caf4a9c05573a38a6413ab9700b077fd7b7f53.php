<!--header nav-->

<?php $__env->startSection('content'); ?>
  
<div style="padding-top:60px"></div>

<div class="container">

    
    <div class="row">
        <div class="col-sm-12">
            <h1>Install a Sign</h1>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-8">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs install-sign" role="tablist">

                <li role="presentation" class=" previous ">
                    <a  style="cursor: pointer;" onclick="document.getElementById('navStep1').submit()"  aria-controls="home" role="tab">Step 1: <strong>Set Location</strong></a>
                                    </li>

                <li role="presentation" class=" active ">
                    <a  style="cursor: pointer;" onclick="document.getElementById('navStep2').submit()"  aria-controls="profile" role="tab">Step 2: <strong>Order Signs</strong></a>
                                    </li>

                <li role="presentation" class="">
                    <a  aria-controls="messages" role="tab">Step 3: <strong>Install Options</strong></a>
                                    </li>

                <li role="presentation" class="">
                    <a onclick="document.getElementById('navStep4').submit()" aria-controls="settings" role="tab">Step 4: <strong>Review Order</strong></a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active choose-sign-blocks">

                                            <div class="row">
    <div class="col-sm-12">
        <h2 class="tab-title">Choose your sign(s)</h2>
    </div><!--col-sm-12-->
</div><!--row-->

<div class="row">
 
      
          <div class="col-md-12">
                <div id="template7" class="sign-block-inner ">

                    <div class="row">
   <form action="<?php echo e(url('/install_sign_data2')); ?>" class="choose-sign" method="post" id="the_form">
             <?php echo e(csrf_field()); ?>


                        <div class="col-md-3">
                            <div class="image-wrapper">
                          <img id="template_7_image" src="http://demosigns.westallisblue.com/template/asset/watermarked/7" alt="" class="img-responsive" style="border:1px solid black">
                                                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="copy-wrapper">
                               <span class="qty">0 in stock</span>
                                <span class="title">Residential 18&quot; Name Rider - JIM RESIDENTIAL</span>
                                <span class="price">$25.00</span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-wrapper">

                                <label for="qty_7">Qty:</label>
                                
                                <input min="0" id="qty_1" value="0" name="qty"
                                       aria-valuenow="0" autocomplete="off" class="ui-spinner-input sign-qty" role="spinbutton">

                             <button style="margin-top:5px;min-width:110px" id="cart_button_7"  type="button" onclick="sign3()"   class="btn btn-primary white-btn">
                                                                                    Add to Order
                             
                            </div>
                        </div>
              
                    </div>

                </div>
            </div>
       
<div class="col-md-12">
    <div id="template1" class="sign-block-inner ">
         <div class="row">

           
                        <div class="col-md-3">
                            <div class="image-wrapper">
                        <img id="template_1_image" src="http://demosigns.westallisblue.com/template/asset/watermarked/1" alt="" class="img-responsive" style="border:1px solid black">
                                                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="copy-wrapper">
                                         <span class="qty">7 in stock</span>
                                <span class="title">Residential FOR SALE 18x24</span>
                                <span class="price">$57.00</span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-wrapper">
                               <input type="hidden" name="qty1" value="0" id="sign1">
                               <input type="hidden" name="qty2" value="0" id="sign2">
                              
                                <label for="qty_1">Qty:</label>
                                 <input type="hidden" value="Residential 18 Name Rider - JIM RESIDENTIAL" name="sign_name1"> 
                                 <input type="hidden" value="Residential FOR SALE 18x24" name="sign_name2"> 
                              
                                  <input type="hidden" value="57.00" name="price1">
                                   <input type="hidden" value="25.00" name="price2">
                                <input min="0" id="qty_2" name="qty"
                                       value="0"
                                       aria-valuenow="0" autocomplete="off" class="ui-spinner-input sign-qty" role="spinbutton">

                                 <button style="margin-top:5px;min-width:110px" id="cart_button_1"  type="button" onclick="sign4()" class="btn btn-primary white-btn">
                                                                                    Add to Order
                                 </button>
                                
                            </div>
                        </div>
                       
                    </div>


                </div>
            </div>
        
        <button type="submit" form="the_form" id="next_step_button" class="btn btn-primary next-step">
            Next: Installation Options <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
     
  </form>
</div>


<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalForm">
    <div class="modal-dialog" role="document">
        <form action="" class="modal-form">
            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title" id="modalFormLabel">Customize</h4>

                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-7" id="canvas_container">
                            <canvas id="ImageCanvas" style="border:1px solid black"></canvas>
                        </div>

                        <div class="col-sm-5">

                            <label for="size-bar">Font Size</label>

                            <span class="minus">-</span>

                            <input id="size-bar" name="size-bar" type="range" min="20"  step="1" max="50" value="40">
                            <span class="plus">+</span>

                            <label for="text-alignment">Text Alignment</label>

                            <button type="button" class="btn btn-default full-width" onclick="centerObjectH()">
                                <span class="glyphicon glyphicon-resize-horizontal"></span> Center Horizontally
                            </button>

                            <button type="button" class="btn btn-default full-width" onclick="centerObjectV()">
                                <span class="glyphicon glyphicon-resize-vertical"></span> Center Vertically
                            </button>

                        </div>

                        <div class="col-xs-12">

                            <h4>To edit text</h4>

                            <span class="instructions">
                                Double-click the text you wish to edit.<br><br>
                                Use the font slider to increase or decrease font size.
                            </span>

                            <br><br>

                            <h4>To position text</h4>

                            <span class="instructions">Drag the text to the desired position. Or, use the buttons to automatically center the text on the sign.</span>

                        </div>

                    </div>
                </div>

                <div class="modal-footer">

                    <button id="modal-button" onclick="ParseCanvasMarkup()" type="button" class="btn btn-primary"></button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                </div>

            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">


        
    </div>
</div>

                    
                </div>
            </div>

        </div>

        <div class="col-md-4 sidebar" style="padding-top:60px">
            <div class="sidebar-inner">

                <h2 class="tab-title">Your Order</h2>

                <div class="row">

                    <div class="col-xs-7">

                        <h4>Installation Location</h4>
  
<?php $__currentLoopData = $sign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sign_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                        <span class="address"><?php echo e($sign_val->address); ?></span>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </div>

                    <div class="col-xs-5">
                                                                                <a style="cursor:pointer;" class="change-location" >
                                change
                            </a>
                                            </div>

                </div>

                <div class="col-xs-12">
                    <hr>
                </div>

                <div class="row">

                    <div class="col-xs-12">
                        <h4>Sign Costs:</h4>
                                            </div>

                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table">

                                <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Item</th>
                                                                    </tr>
                                </thead>

                                <tbody>

                                
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12">
                    <hr>
                </div>

                <div class="row">

                    <div class="col-xs-12">
                        <h4>Installation Costs</h4>
                                            </div>

                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table">

                                <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Item</th>
                                                                    </tr>
                                </thead>

                                <tbody>

                                
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

                
            </div>
        </div>

    </div>

</div>





 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>