@extends('admin.layouts/backend_layout')

@section('content')
<!--header nav-->

         
<div class="container-fluid">
    <div class="row col-md-offset-3 col-md-6">

        <br>

        
        
        
    </div>
	 @foreach($removal as  $removal_val)
    <div class="container">
        <div class="row">
            <div class="col-md-12">    <div class="page-header">
        <h1>Removal # {{$removal_val->id}}</h1>
        <h4>{{$removal_val->company_name}}/ {{$removal_val->user_name}}</h4>
    </div>

<div class="col-md-9 col-md-offset-1 panel panel-default">
        <div class="panel-body">

            <div class="row">
								<a class="btn btn-default pull-left" href="">Edit</a>
								<a class="btn btn-default pull-right" href="">Go Back</a>
			</div>
			<hr>
		
			<div class="row">
			   
  
				<div class="col-md-2" class="text-right">
					<label>Remove by date:</label>
				</div>
				<div class="col-md-4">{{$removal_val->remove_by}}</div>
				<div class="col-md-2" class="text-right">
					<label>Instructions:</label>
				</div>
				<div class="col-md-4"> {{$removal_val->instructions}}</div>
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
			<hr />
		 @foreach($removal as  $removal_val)		
			<div class="row">
				<div class="col-md-12">
					<label for="address-field">Location</label>
					<input type="text" name="address-field" id="address-field" value="{{$removal_val->address}}" class="form-control" disabled>
					<div class="map_canvas"></div>
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
        		        		<a class="btn btn-default pull-right" href=""> Edit</a>
        		        	</div>
       </div>
    </div>


</div>
        </div>
    </div><!-- /.container -->
</div>
</div>
   
         
         
         
@endsection