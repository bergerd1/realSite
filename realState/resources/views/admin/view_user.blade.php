
@extends('admin.layouts.backend_layout')
<!--header nav-->
 

@section('content')
<div class="container-fluid">
    <div class="row col-md-offset-3 col-md-6">

        <br>

        
        
        
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <div class="page-header">
        <h1>View User</h1>
    </div>

    <div class="col-md-9 col-md-offset-1 panel panel-default">

        
        <div class="panel-body">

            <div class="row">
              @foreach($user_detail AS $user_detail_val)
                <div class="col-md-6">
                 
                    <h4>{{$user_detail_val->name}}</h4>

                    <p>{{$user_detail_val->address}}

                    <p><strong>Email:</strong> {{$user_detail_val->email}}</p>

                    <p><strong>Phone:</strong> {{$user_detail_val->phone}} <strong>Fax:</strong>{{$user_detail_val->Fax}} </p>

                </div>

                <div class="col-md-6">

                    <h4>Company</h4>

                    <p>{{$user_detail_val->company_name}}</p>

                    <h4>Role</h4>

                    <p>{{$user_detail_val->roles}}</p>

                </div>
                @endforeach

            </div>

            <p></p>

            <div class="row">

                <div class="table-responsive">

                    <h4>Assigned Templates</h4>

                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th width="25%">Name</th>
                            <th width="15%">Price</th>
                            <th>Image</th>

                        </tr>
                        </thead>

                        <tbody class="templates" id="templates">
                            @foreach($user_available_template AS $user_available_template_val)
                                                    <tr>
                                <td>{{$user_available_template_val->temp_name}}</td>

                                <td>$280.00</td>

                                <td>
                                    <img src="http://demosigns.westallisblue.com/template/asset/watermarked/4"
                                         height="100" style="border: 1px solid black;">
                                </td>

                            </tr>
                            @endforeach
                                                   
                                                   
                               
                                                </tbody>

                    </table>

                </div>

                <div class="row">

                    <a class="btn btn-default pull-left" href="">Back</a>

                    <!--<form action="8" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">-->

                    <!--    <input type="hidden" name="_method" value="delete">-->

                    <!--    <button class="btn btn-default" type="submit">Delete</button>-->

                    <!--</form>-->

                        <a class="btn btn-info pull-right" href="{{url('/currentorders')}}">
                            Impersonate User
                        </a>
                      @foreach($user_detail AS $user_detail_val)
                    <a class="btn btn-default pull-right" href="/realState/public/edit_template/{{$user_detail_val->user_id }}">
                        Edit Templates
                    </a>

                    <a class="btn btn-default pull-right" href="edit_user/{{$user_detail_val->id}}">
                        Edit User
                    </a>
 @endforeach
                </div>

            </div>

        </div>

    </div>

</div>
        </div>
    </div><!-- /.container -->
</div>
</div>

@endsection