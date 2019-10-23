@extends('admin.layouts.backend_layout')
@section('content')

        <div class="row">
            <div class="col-md-12">    <div class="page-header">
        <h3 style="color:#fff !important;">Assign User Templates</h3>
    </div>

    <div class="col-md-9 col-md-offset-1 panel panel-default">

        
        <div class="panel-body">


            <form action="{{url('removeTemplateAssignUser')}}" method="POST">
               {{csrf_field()}}
                <div class="row">
                    <h3 style="color:#fff;">Jim Residential</h3>

                    <p></p>
                    <div class="table-responsive">
                        @foreach($user_detail as $key=>$value)
                                                
                                            <input type="hidden" value="<?=$key?>" name="company_id">
                                             <input type="hidden" value="<?=$value?>" name="user_id">
                                                    
                                                    @endforeach
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="4px"></th>
                                <th width="25%">Name</th>

                                <th>Image</th>

                            </tr>
                            </thead>

                            <tbody>
                                 @foreach($template_data AS $template_ass)
                                

                                                            <tr>

                                    <td><input name="temp_check[]" type="checkbox" checked="checked" value="{{ $template_ass->id }}">
                                               </td>
                                    <td>{{$template_ass->temp_name}}</td>
                                    <td>
                                        <img src="../backend/template_picture/{{$template_ass->temp_picture }}"
                                             style="border: 1px solid black;max-width:300px; max-height:100px;">
                                    </td>

                                </tr>
                                                                                  @endforeach
                                  @foreach($template_assign AS $template_val)
                                

                                                            <tr>

                                    <td><input name="template_id[]" type="checkbox" value="{{ $template_val->id }}">
                                               </td>
                                    <td>{{$template_val->temp_name}}</td>
                                    <td>
                                        <img src="../backend/template_picture/{{$template_val->temp_picture }}"
                                             style="border: 1px solid black;max-width:300px; max-height:100px;">
                                    </td>

                                </tr>
                                                                                  @endforeach
                
                                                        </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <a class="btn btn-default pull-left" href="">Back</a>
                        <button class="btn btn-default pull-right" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
        </div>
    </div><!-- /.container -->
</div>




@endsection