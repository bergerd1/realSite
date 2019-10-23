     @extends('user_dashboard.layouts.layout')
@section('content')
<div style="padding-top:60px"></div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="page-header">
                    <h1>Your removal has been placed!</h1>
                </div>

                <!--<p><a  href="{{url('/order')}}">Your removal Place</a></p>-->
 <p><a  href="{{url('/order')}}">Your removal order id is {{$id}}</a></p>
                <p>A member of our team will review the order and contact you if further information is required.</p>

            </div>
        </div>

    </div>
    
    
@endsection