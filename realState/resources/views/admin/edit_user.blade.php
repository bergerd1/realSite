@extends('admin.layouts.backend_layout')
<!--header nav-->
 

@section('content')
<style>label{color:#fff !important;}</style>

        <div class="row">
            <div class="col-md-12">
    <div class="page-header">
        <h3 style="color:#fff;">Edit User</h3>
    </div>

    <form action="{{ url('/update_user') }}" method="POST">
         {{csrf_field()}}
         
       
        <div class="col-md-9 col-md-offset-1 panel panel-default">

            
            <div class="panel-body">

              

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group ">

                            <label for="company-field">Assign User To A Company </label>
  
                            <select id="company-field" name="company_id" class="form-control">
                                  @foreach($company_value AS $company_val)
                                            <option value="{{$company_val->id}}">{{$company_val->company_name}}</option>
                                        @endforeach
                                                                
                                
                            </select>
 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">

                            <label for="user_role">Assign User Role</label>

                            <select name="role_id" id="user_role" class="form-control">
                                 @foreach($roles_value AS $roles_val)
                                            <option value="{{$roles_val->id}}">{{$roles_val->roles}}</option>
                                        @endforeach
                             </select>

                        </div>
                    </div>

                </div>
   @foreach($values AS $user_detail_val)
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group ">

                            <label for="first_name-field">First Name</label>

                            <input type="text" id="first_name-field" name="first_name" class="form-control"
                                   value="{{$user_detail_val->first_name}}"/>
                                   <input type="hidden" name="user_id" value="{{$user_detail_val->user_id}}">

                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">

                            <label for="last_name-field">Last Name</label>

                            <input type="text" id="last_name-field" name="last_name" class="form-control"
                                   value="{{$user_detail_val->last_name}}"/>

                            
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group ">

                            <label for="email-field">Email / Username</label>

                            <input type="text" id="email-field" name="email" class="form-control"
                                   value="{{$user_detail_val->email}}"/>

                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">

                            <label for="password-field">Password</label>

                            <input type="text" id="password-field" name="password" class="form-control" value=""/>

                            
                            <span class="help-block"> Leave blank to keep old password. </span>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group ">

                            <label for="address-field">Address</label>

                            <input type="text" id="address-field" name="Address" class="form-control"
                                   value="{{$user_detail_val->Address}}"/>

                            
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group ">

                            <label for="phone-field">Phone</label>

                            <input type="text" id="phone-field" name="Phone" class="form-control"
                                   value="{{$user_detail_val->Phone}}"/>

                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group ">

                            <label for="fax-field">Fax</label>

                            <input type="text" id="fax-field" name="Fax" class="form-control" value="{{$user_detail_val->Fax}}"/>

                            
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <label for="communication-preferences">Communication Preferences</label>

                        <p>Send me an email when:</p>

                        <table class="table" id="communication-preferences">

                            <thead></thead>

                            <tbody>

                            <tr>

                                <td>An order is</td>

                                <td>
                                    <p><input checked type="checkbox" name="order_creation_subscription"> created</p>
                                    <p><input checked type="checkbox" name="order_update_subscription"> updated</p>
                                </td>

                            </tr>

                            <tr>

                                <td>A removal is</td>

                                <td>
                                    <p><input checked type="checkbox" name="removal_creation_subscription"> created</p>
                                    <p><input checked type="checkbox" name="removal_update_subscription"> updated</p>
                                </td>

                            </tr>

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

            <div class="row">
                <a class="btn btn-default pull-left" href="">Back</a>
                <button class="btn btn-default pull-right" type="submit">Save</button>
            </div>
        </div>
            @endforeach
    </form>

</div>
        </div>
    </div><!-- /.container -->
</div>



@endsection