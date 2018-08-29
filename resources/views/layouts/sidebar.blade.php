<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded">
          <ul class="nav nav-pills flex-column lmenu">
            <li class="nav-item">
              <a class="nav-link active lactive" href="{{url('/dashboard')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('merchants')}}">Merchants</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('getallfees')}}">Fees List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('merchantfeemapping')}}">Merchant Fees Mapping</a>
            </li>
            <li data-toggle="collapse" data-target="#service" class="collapsed nav-item">
              <a href="#" class="nav-link">Merchant Profile <i class="fa fa-angle-right"></i></a>
            </li>  
            <ul class="sub-menu collapse" id="service">
              <li style="list-style-type: none;padding: 6px;"><a style="padding-left: 0px !important;" href="getusers">Manage Users</a></li>
              <li style="list-style-type: none;padding: 6px;"><a style="padding-left: 0px !important;" href="getroleslist">Role List</a></li>
            </ul>
            <li class="nav-item">
              <a class="nav-link" href="{{url('fee')}}">New Fees List</a>
            </li>

           
          </ul>
</nav>