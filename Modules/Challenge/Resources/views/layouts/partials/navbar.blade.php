<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{ url('/challenge') }}" class="navbar-brand d-flex align-items-center">
                <strong>Challenge</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                        @role('admin')
                        <li class="nav-item">
                            <a href="{{ url('/admincp') }}" class="nav-link">AdminCP</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/question') }}" class="nav-link">Questions</a>
                        </li>
                        @endrole

                        @hasanyrole('user|admin')
                        <li class="nav-item">
                            <a href="{{ url('/challenge') }}" class="nav-link">Challenge</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/challenge/list') }}" class="nav-link">My Challenge List</a>
                        </li>
                        @endhasanyrole
                 </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                    @endguest
                    
                </ul>
            </div>
        </div>
    </nav>
</header>