@extends('admin.layouts.backend_layout')
<!--header nav-->



  



@section('content')

<div class="col-sm-8 col-sm-offset-2  border" style="background:#222;">
    <h3 style="color:#fff;">Edit Company</h3><hr>
      <form method="POST" action="{{url('admin/company/'.$item->id)}}">
          
          {{csrf_field()}}
        
        
       
        <div class="form-group">
            <div class="col-sm-12">
               <label> Company Name </label>
               <input type="text" name="name" value="{{ $item->name }}" class="form-control">
             </div>
          <div class="col-sm-12">
            <label>Address</label>
            <input type="text" name="address" value="{{ $item->address }}" class="form-control">
        </div>

          <div class="col-sm-12">
            <label>Map</label>
           <textarea class="form-control" rows="5" id="comment"></textarea>
         </div>

          <div class="col-sm-12">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $item->phone }}" class="form-control">
        </div>

          <div class="col-sm-12">
            <label> Fax</label>
            <input type="text" name="fax" value="fax" class="form-control">
           
        </div>

          <div class="col-sm-12">
            <label>Default rate fax</label>
            <input type="text" name="" value="" ="form-control">
        </div>

          <div class="col-sm-12">
            <label>Assigned Templates</label>
             <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Customer Price</th>
        <th>Stock level</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
        
           
                                @foreach($template_data AS $templateValue)
                                   
            <tr>
               <td><input type="checkbox" value="{{$templateValue->id}}" checked="checked" name="temp_check[]"></td> 
              <td>{{ $templateValue->temp_name }}</td>
                <td> {{ $templateValue->temp_price }}</td>
               <td> <input style="width:100px"  class="form-control" value=""></td>
               <td> <input style="width:100px" class="form-control"  value="" placeholder="Manage"> </td>
                <td><img src="../../../backend/template_picture/{{ $templateValue->temp_picture }}" height="100px;" width="100px;"></td>
             </tr>
             @endforeach 
              <!--<tr>-->
              <!--  <td>Trident</td>-->
              <!--  <td>$50</td>-->
              <!--  <td> <input style="width:100px"  class="form-control" value=""></td>-->
              <!--  <td> <input style="width:100px"  class="form-control" value="" placeholder="Manage"> </td>-->
                
               
              <!--</tr>-->
    </tbody>
  </table>
</div>



 <strong>Available Templates</strong>
 
   {{method_field('PUT')}}

                    <!-- Available Templates -->
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <thead>
                            <tr style="border: solid 0.5px;">
                               
                                <th>Name</th>
                                <th>Price</th>
                                <th>Custom Price</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                                
                                @foreach($template AS $templateVal)
                                   
                 
                                 <tr>

                                        <td>
                                            <input name="template_id[]" type="checkbox" value="{{ $templateVal->id }}">
                                        </td>

                                        <td>{{ $templateVal->temp_name }}</td>   

                                        <td>{{ $templateVal->temp_price }}</td>

                                        <td>
                                            <input style="width:100px" type="text" id="template_price10"
                                                   name="template_price10" class="form-control"
                                                   value=""/>
                                        </td>

                                        <td>
                                            <img src="../../../backend/template_picture/{{ $templateVal->temp_picture }}"
                                                 style="max-width:300px; max-height:100px; border: 1px solid black;">
                                        </td>

                                    </tr>
                                     @endforeach   
                                     
                           </tbody>

                        </table>
                    </div>
                      <div class="table-responsive">
                        <table class="table table-striped">

                            <thead>
                                <p>Assign Installation\Removal Costs</p>
                            <tr style="border: solid 0.5px;">
                                
                                <th></th>
                                
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                               
                              
                            </tr>
                            </thead>

                            <tbody>
                                
                           
                                   
                            @foreach($installation_removal as $value)
                            
                            
                                 <tr>
                                     
                                     
                                             
                            
                               
                                        <td>
                                            <input name="installRemovalcheck[]" type="checkbox"  
                                             
                                              <?php   
                                           
                                             
                                                    $val = $value->id;
                                             
                                                    if(isset($arr)){
                                                     if(in_array($val, $arr)){  ?>
                                                                      checked="checked"
                                                   <?php    }   }
                                                   ?> 
                                            
                                            value="{{$value->id}}">    
                                        </td>
                                            
                                        <td>{{$value->title}}</td>   
                                        
                                        <td>{{$value->description}}</td>
                                        <td>{{$value->price}}</td>
                                        <td>
                                             <input name="type[]" type="hidden" value="{{$value->Type}}">  
                                        </td>
                                      
                                       
                              
                                    </tr>
                               @endforeach   
                                     
                           </tbody>

                        </table>
                    </div>
                    <!-- /Available Templates -->

</div>

 <input type="submit" value="save"/ style="padding:7px 25px; background:#eee;color:#222 !important;border:none;">

  </form>
     
</div>
<style>.col-sm-12{margin-bottom:10px;}</style>
 
@endsection