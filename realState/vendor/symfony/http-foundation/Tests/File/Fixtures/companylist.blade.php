@extends('admin.layouts.backend_layout')
<!--header nav-->
 

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix" style="border:none;">

                    <h3 style="color:#fff;" class="pull-left">Customers</h3>

                    <a class="btn btn-success pull-right" href="{{url('admin/company/create')}}">Create</a>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Users</th>
                                    <th>Signs in Stock</th>
                                    <th>Signs to Print</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                @foreach($companylist AS $companylist_val)
                                <tr>

                                    <td>{{$companylist_val->company_name}} </td>

                                    <td>
                                        <p>{{$companylist_val->countUser}}</p>
                                    </td>

                                    <td>
                                        <p>14</p>
                                    </td>

                                    <td>
                                        <p>16</p>
                                    </td>

                                    <td class="text-right">

                                        <a class="btn btn-default " href="{{url('/admin/company/'.$companylist_val->id.'/edit')}}">Edit</a>
                                            <a href="/realState/public/delete_company/{{ $companylist_val->id }}" class="btn btn-danger" >Delete</a>
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
    <!-- /.container -->



@endsection