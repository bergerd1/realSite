@extends('admin.layouts/backend_layout')

@section('content')
<!--  script    -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#company_id').change(function(){
       // $('#user_id').prop('selectedIndex',0);   $el.empty();
         $('#user_id').empty();
       var valueSelected = this.value;
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
       $.ajax({
           type : 'POST',
           url  : 'compEnrUser',
           data : {
              
               'company_id' : $('#company_id').val(),
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success:function(data){
               if((data.errors)){
                            console.log(data.errors);
                        }else{
                            console.log(data.length);
                            for( var i = 0; i < data.length;i++){
                               $('#user_id').append("<option value='"+data[i].id+"'>"+data[i].email+" </option>");
                            }
                       }
           }
       });
    });
    
});


</script>




<!--  end  script    -->

<meta name="csrf-token" content="{{ csrf_token() }}">
<style>    .form-control{border: solid 0.5px #7a7a7a;}</style>
        <div class="row">
            <div class="col-md-12">
    <div class="page-header" style="border:none;">
        <h3 style="color:#fff;">Select Customer and User to Create Order From</h3>
    </div>

    <div class="col-md-9 col-md-offset-1 panel panel-default">

        <!-- Errors -->
                <!-- /Errors -->

        <!-- Select Boxes -->
        <div class="panel-body">
            <form action="{{url('/createorder')}}" method="POST" class="form-horizontal">
          <!--{{ csrf_field() }}-->
          <!--{{ csrf_token() }}-->
                <div class="row">

                    <!-- Companies -->
                    <div class="col-md-6">
                        <div class=" ">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class="control-label" for="company">Company</label>

                            
                                <select id="company_id" name="company" class="form-control company" title="company">
                                    <option value="" disabled="" selected="">Select Company</option>
                                    @foreach($company AS $company_val)
                                    <option value="{{$company_val->id}}">{{$company_val->company_name}}</option>
                                    
                                    @endforeach
                                </select>

                                
                            
                        </div>
                    </div>
                    <!-- /Companies -->

                    <!-- Users -->
                    <div class="col-md-6">
                        

                            <label class="control-label" for="user_id">User</label>

                            
                                <select id="user_id" name="user_id" class="form-control user">
                                    <option>Select User...</option>
                                </select>
<br>
                                <button class="btn btn-default pull-right" type="submit" name="continue">Continue</button>
                            
                        </div>
                    <!-- /Users -->

                </div>

                

            </form>
        </div>
        <!-- /Select Boxes -->

    </div>

    
</div>
        </div>


 


@endsection