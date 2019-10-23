@extends('admin.layouts.backend_layout')
<!--header nav-->
 

@section('content')

<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

    <div class="row">
        <div class="col-md-12">
            <!-- Header -->
            <div class="page-header clearfix" style="border:none;">
<br/><br/>
                <h3 style="color:#fff;" class="pull-left">Users</h3>

                <a class="btn btn-success pull-right" href="{{url('admin/users/create')}}">Create</a>

            </div>
            <!-- /Header -->

            <div class="col-md-12 panel panel-default">
                <div class="panel-body">
                   <div class="table-responsive">
                    <table id="tabledata" class="table table-striped">

                        <thead>
                            <tr>
                                <th style="width: 15%">User Name
                                    <!--<input type="text" class="form-control search-input" id="first_name" placeholder="User Name">-->
                                </th>
                                <th style="width: 20%">Company Name
                                    <!--<select class="form-control search-input" id="company_id">-->
                                    <!--    <option value="" disabled="" selected="">Company</option>-->
                                    <!--    <option value="">All Companies</option>-->
                                    <!--    @foreach($company AS $company_val)-->
                                    <!--        <option value="{{$company_val->id}}">{{$company_val->company_name}}</option>-->
                                    <!--    @endforeach-->
                                    <!--</select>-->
                                </th>
                                <th style="width:20%">Email
                                   <!--<form method="get">-->
                                   <!--     {{csrf_field()}}-->
                                   <!-- <input type="search" class="form-control search-input" name="name" id="email" value="hlo" placeholder="Email">-->
                                   <!-- </form> -->
                                </th>
                                <th style="width:15%">Roles
                                    <!--<select class="form-control search-input" id="roles" title="">-->
                                    <!--    <option value="" disabled="" selected="">Role</option>-->
                                    <!--    <option value="">All Roles</option>-->
                                    <!--     @foreach($roles AS $roles_val)-->
                                    <!--        <option value="{{$roles_val->id}}">{{$roles_val->roles}}</option>-->
                                    <!--    @endforeach-->
                                    <!--</select>-->
                                </th>
                                <th class="text-right" style="width:30%"></th>
                            </tr>
                        </thead>

                        <tbody id="UserTableBody" style="display: table-row-group;">
						<form method="POST" action="">
                             @foreach($userlist AS $userlist_val)
                            <tr id="user_7_row">
                                <td>
                                   {{ $userlist_val->name }}
								   
                                </td>
                                <td>{{ $userlist_val->company_name }}</td>
								
                                <td>
								{{ $userlist_val->email }}
								
								</td>
                                <td>
									{{ $userlist_val->roles }}
								
								</td>
                                <td class="text-right"><a class="btn btn-default" href="{{url('/admin/users/'.$userlist_val->id.'/edit')}}">Edit</a>
                                
                             <!--   <a class="btn btn-default" href="/realState/public/edit_template/{{ $userlist_val->company_id }}">Assign Templates</a>  -->
								
									<a class="btn btn-default" href="/realState/public/edit_template/{{$userlist_val->user_id }}">Assign Templates</a>
									
								   <a class="btn btn-danger" href="/realState/public/delete_users/{{ $userlist_val->user_id }}" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                           
                            
                            
                            
                           
                           
                           
                        </tbody>

                    </table>
                  </div>
                </div>
            </div>

        </div>
    </div>
<style>
    table.dataTable tr.odd{background:transparent !important;}
    table.dataTable tr.even{background:transparent !important;}
    table.dataTable tr.odd td.sorting_1{background:transparent !important;}
    table.dataTable tr.even td.sorting_1{background:transparent !important;}
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabledata').DataTable();
  } );
</script>


<!--user body part-->

@endsection


