<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
             
            <ul class="nav navbar-nav navbar-left">

              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Order Management <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('order')}}">Current Orders</a></li>
                        <li><a href="{{url('overview/sign')}}">Signs Overview</a></li>
                        <li><a href="{{url('overview/removal')}}">Removal Overview</a></li>
                        <li><a href="{{url('install_sign')}}">Order Sign</a></li>
                        <li><a href="{{url('removals/create')}}">Removal Request</a></li>
                    </ul>
                </li>
              

            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                    <ul class="dropdown-menu" role="menu">


                        <li>
                            <a href="{{url('/profile')}}">Profile</a>
                        </li>
 
                        <li>

                             <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                           

                        </li>

                    </ul>
        </li>
            </ul>

         
        </div>
    </div>
</nav>