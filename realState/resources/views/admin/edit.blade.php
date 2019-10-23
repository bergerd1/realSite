@extends('admin.layouts.backend_layout')
<!--header nav-->
 

@section('content')
<style>.form-control{border:solid 0.5px;border-color:#7a7a7a;background:#000}</style>
<div class="col-sm-8 col-sm-offset-2  border">
    <h3 style="color:#fff;">Edit User</h3>
      <form method="POST" action="{{url('/admin/users/'.$item->id)}}">
          {{csrf_field()}}
        
         
           @foreach($data AS $dataVal)
        <div class="form-group">
            <div class="col-sm-6">
                <select id="company-field" name="role" class="form-control" onchange="updateAddress()">
                    <option value="">Assign User To A Role</option>
                    @foreach($roles AS $roleVal)
                      <option value="{{$roleVal->id}}" <?php if(isset($item->role_id) && ($item->role_id == $roleVal->id)){ ?> selected="selected" <?php } ?> >{{$roleVal->roles}}  </option>
                    @endforeach
                      
                  </select>
              </div>
            <div class="col-sm-6">
                <select id="company-field" name="company" class="form-control">
                    <option value="">Assign User To A Company</option>
                      @foreach($company AS $companyVal)
                      <option value="{{$companyVal->id}}"  <?php if(isset($dataVal->company_id) && ($dataVal->company_id == $companyVal->id)){ ?> selected="selected" <?php } ?> > {{$companyVal->company_name}}</option>
                    @endforeach
                  </select>
              </div>
            <div class="col-sm-6">
               <label> First Name </label>
              
               <input type="text" name="first_name" value="{{ $dataVal->first_name }}" class="form-control">
              
             </div>
          <div class="col-sm-6">
            <label>Last name</label>
            <input type="text" name="last_name" value="{{ $dataVal->last_name }}" class="form-control">
        </div>
         
          <div class="col-sm-6">
            <label>Fax</label>
            <input type="text" name="Fax" value="{{ $dataVal->Fax }}" class="form-control">
        </div>
          <div class="col-sm-6">
            <label>Phone</label>
            <input type="text" name="Phone" value="{{ $dataVal->Phone }}" class="form-control">
        </div>
         <div class="col-sm-12">
            <label>Email</label>
            <input type="email" name="email" value="{{ $item->email }}" class="form-control">
        </div>
         
         <div class="col-sm-12" style="margin-bottom:10px;">
            <label>Address</label>
            <input type="text" name="Address" value="{{ $dataVal->Address }}" class="form-control">
        </div>
      </div>
       {{method_field('PUT')}}
   <a href="{{url('admin/company')}}"  class="btn btn-default" >Back</a>

  <button type="submit" class="btn btn-default pull-right">Save</button>
  
   @endforeach
    </form>
     
</div>

@endsection