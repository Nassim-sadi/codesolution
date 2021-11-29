<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top border-fix">
    <a class="navbar-brand" href="/"><img class="navbar-brand-logo" src="{!! asset('images/CodeSolution.png') !!}"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item nav-hover-2 @yield('activehome')">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item nav-hover-2  @yield('activequestion')">
                <a class="nav-link" href="/blog">Questions</a>
            </li>
            <li class="nav-item nav-hover-2 @yield('activetags')">
                <a class="nav-link" href="{{route('tags.index')}}">Tags</a>
            </li>
            <li class="nav-item nav-hover-2 @yield('activeusers')">
                <a class="nav-link" href="{{route('users.index')}}">Users</a>
            </li>
            <li class="nav-item nav-hover-2 @yield('activeabout')">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item nav-hover-2 @yield('activecontact')">
                <a class="nav-link" href="/contact">contact</a>
            </li>
        </ul>
       <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
        @guest
            <ul class="navbar-nav mr-1">
            <li class="nav-item" >
                <a class="nav-link nav-hover-2 " href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-hover-2" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item dropdown hover-color">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle hover-color" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: relative ;padding-left: 8px" v-pre><img src="{!! asset("uploads/avatars/")!!}/{{Auth::user()->avatar_user}}"  class="nav-profile rounded-circle"> Hello
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('posts.index') }}">Manage my Questions</a>
                        <a class="dropdown-item" href="{{ route('tags.index') }}">Manage Tags</a>
                        <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        @endguest
    </div>
</nav>
