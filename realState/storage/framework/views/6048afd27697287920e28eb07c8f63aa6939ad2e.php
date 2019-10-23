    
<?php $__env->startSection('content'); ?>


  
  
  



    
<div style="padding-top:60px"></div>

    <div class="container">

        
        <div class="row">
            <div class="col-sm-12">
                <h1>Order a Banner/Custom Graphic</h1>
            </div>
        </div>

        <form action="" class="order-banner" method="post" enctype="multipart/form-data">

           

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
                        <input type="text" name="address" id="address" value="Chicago, IL">

                        <label for="datepicker">Installation date:</label>
                        <input type="text" name="install_by" id="datepicker" value="06-11-2018">

                    </div>

                    <div class="col-sm-6">
                        <div class="map-iframe-wrapper">
                            <div id="map" style="border:0"></div>
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
                            <input type="text" name="" id="banner_name" class="banner_name">

                            <label for="banner_description[--BANNER_NO--]">Description (general design, text needed, approx size):</label>
                            <textarea name="" id="banner_description[--BANNER_NO--]" rows="4"></textarea>

                            <label for="installation_instructions[--BANNER_NO--]">Installation Instructions:</label>
                            <textarea name="" id="installation_instructions[--BANNER_NO--]" rows="4"></textarea>

                        </div>

                        <div class="col-sm-4">

                            <label for="photo_upload">Map or photo of desired location:</label>

                            <img style="min-width:100%" src="http://demosigns.westallisblue.com/images/placeholder_01.png" alt="" class="img-responsive">

                            <input onchange="readURL(this)" type="file" name="">

                        </div>

                    </div>

                </div>

                <button type="button" id="add_banner_button" class="btn btn-default add-banner">
                    <span class="glyphicon glyphicon-plus-sign"></span><span>Add banner/custom graphic</span>
                </button>

            </div>

            <button href="#" class="btn btn-default submit">Place Banner/Custom Order</button>

            <input style="display: none;" readonly name="banners_count" value="0" title="banners count">

        </form>

    </div>




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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('user_dashboard.layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>