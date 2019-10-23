       @extends('user_dashboard.layouts.layout')
@section('content')
<div style="padding-top:60px"></div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="page-header">
                    <h1>Your order has been placed!</h1>
                </div>

            <p><a  href="{{url('/order')}}">Your order</a> number is  {{$id}}</p>
                <p>A member of our team will review the order and contact you if further information is required.</p>

            </div>
        </div>

    </div>
    
    

@endsection