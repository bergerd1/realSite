 
 <div class="row"><nav class="navbar navbar-default" style="background:transparent !important;border:none;">
    <div class="container-fluid">
        <div class="top-bar" style="border-bottom:solid 1px;border-color:#ccc;"><img src="<?php echo url('front/image/logo_new.png'); ?>"></div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse" style="padding-top:40px;">
             
            <ul class="nav navbar-nav navbar-left">
                
                <li class="dropdown"><a href="{{url('templates')}}">Template Creator</a></li>
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="{{url('settings')}}">Site Settings</a>
                        </li>

                        <li>
                            <a href="{{url('profiles')}}">Profile</a>
                        </li>
 
                        <li>

                            <!-- <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                        </form>  -->
                                        
                                                       
                                       <a href="{{ route('logout') }}" id="sweta"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" <?php if (Auth::guest()){ ?> action="{{url('login')}}"; <?php } else { ?>action="{{ route('logout') }}" <?php } ?> style="dispaly:none" method="POST">
                                            {{ csrf_field() }}
                                        </form>
                                                 
                           

                        </li>

                    </ul>
        </li> 

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Order Management <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('currentorders')}}">Current Orders</a></li>
                        <li><a href="{{url('sign_overview')}}">Signs Overview</a></li>
                        <li><a href="{{url('removal_overview')}}">Removal Overview</a></li>
                        <li><a href="{{url('createsimple')}}">Other Order</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Account Management <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('admin/users')}}">Users</a></li>
                        <li><a href="{{url('admin/company')}}">Companies</a></li>
                        <li><a href="{{url('costs')}}">Installations/Removals</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    </div>
</nav>