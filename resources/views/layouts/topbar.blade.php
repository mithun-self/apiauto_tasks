<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top topnav">
        <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('/assets/images/logo.png')}}" class="img-responsive" alt=""></a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">
            @auth
            <!-- <li class="nav-item ">
            
              <a class="nav-link" href="#">	<img src="{{asset('/assets/images/profile.png')}}" class="img-fluid rounded hprofile" alt=""><span class="uname">Michael Carter</span></a>
            </li> -->
            <li class="nav-item ">
              <a class="nav-link logout" href="{{ url('/logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout</a>
              <form id="logout-form" action="{{ url('/logout') }}" method="get" style="display: none;">
                @csrf
              </form>
            </li>
            @else
            <li class="nav-item ">
            
              <a class="nav-link" href="{{route('post_admin_login_form')}}"> <span class="uname">Login</span></a>
            </li>
            @endauth
          </ul>
          
        </div>
  </nav>