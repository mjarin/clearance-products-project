<nav class="bg-custom main-header navbar navbar-expand navbar-dark navbar-light">
    <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    </ul>

    <ul class="navbar-nav ml-auto">        
		<li class="dropdown user user-menu open">
            <a href="#" id="user-name-hover" class="text-decoration-none" data-toggle="dropdown" aria-expanded="true">
              <img src="{{asset('backend/dist/img/profile.jpg')}}" class="user-image" alt="User Image">
              {{-- <span class="hidden-xs text-white" style="font-size:19px;">
                @if()
                @php
                $user=App\Models\User::where('id','=',Session::get('LoggedUserId'))->first();
                @endphp
                {{$user->name}}
                @endif
              </span> --}}
            </a>
            <ul class="dropdown-menu" id="user-logout">
              <!-- User image -->
              <li class="user-header" id="user-logout-Li">
                <img src="{{asset('backend/dist/img/profile.jpg')}}" class="img-circle user-image" alt="User Image">
                <p class="text-white" style="font-size:20px;">
                    {{-- @if(Session::has('LoggedUserId'))
                    @php
                    $user=App\Models\User::where('id','=',Session::get('LoggedUserId'))->first();
                    @endphp
                    {{$user->name}}
                    @endif --}}
                {{-- <small class="text-white" style="font-size:17px;" >Member since Mar. 2022</small>  --}}
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  
                </div>
                <div class="pull-right cutom-hover">
                <a href="{{url('admin/logout')}}"  class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>


    </ul>
    </nav> 