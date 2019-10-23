@extends('admin.layouts.backend_layout')
@section('content')
<style>
    .tab-pane{border:none;}
    tr{border:solid 0.5px;}
</style>
    <div class="row">
        <div class="col-md-12">
            <!-- Page Header -->
            <div class="page-header clearfix">

                <!--h2>Sample Residential Real Estate</h2>

                <h3>Admin Admin</h3-->

                <h3 class="pull-left" style="color:#fff;">Removal Overview</h3>

            </div>
            <!-- /Page Header -->

            <div class="row col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="templates-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="&quot;active&quot;"><a href="#Incomplete" data-toggle="tab">Incomplete</a></li>
                            <li><a href="#Complete" data-toggle="tab">Complete</a></li>
                            <li><a href="#Deleted" data-toggle="tab">Deleted</a></li>
                        </ul>
                        <!-- /Nav Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="Incomplete" style="border:none;">
                                <div class="table-responsive">
                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Company</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Removed</th>
                                                <th>Order Date</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
 @foreach($Incomplete as  $value) 
                                            <tr>

                                                <td>
                                                   
                                                             {{$value->id}}
                                                       
                                                </td>

                                                <td>{{$value->company_name}}</td>

                                                <td>{{$value->status}}</td>

                                                <td>{{$value->address}}</td>

                                                <td>
                                                    {{$value->remove_by}}
                                                </td>

                                                <td class="text-right">
                                                    <a class="btn btn-default " href="view_order_admin/{{$value->id}}">View</a>
                                                </td>

                                            </tr>
  @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade in " id="Complete">
                                <div class="table-responsive">
                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Company</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Removed</th>
                                                <th>Order Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                     @foreach($Complete as  $value)                     

                                            <tr>

                                                 <td>
                                                   
                                                             {{$value->id}}
                                                       
                                                </td>

                                                <td>{{$value->company_name}}</td>

                                                <td>{{$value->status}}</td>

                                                <td>{{$value->address}}</td>

                                                <td>
                                                    {{$value->remove_by}}
                                                </td>


                                                <td class="text-right">
                                                    <a class="btn btn-default " href="view_order_admin/{{$value->id}}">View</a>
                                                </td>

                                            </tr>
  @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade in " id="Deleted">
                                <div class="table-responsive">
                                    <table class="table table-striped">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Company</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Removed</th>
                                                <th>Order Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>@foreach($Deleted as  $value) 
                                            <tr>

                                                <td>
                                                    {{$value->id}}
                                                </td>

                                                <td>{{$value->company_name}}</td>

                                                <td>{{$value->status}}</td>

                                                <td>{{$value->address}}</td>

                                                <td>
                                                    {{$value->remove_by}}
                                                </td>


                                                <td class="text-right">
                                                </td>

                                            </tr>
@endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Tab Content -->

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection