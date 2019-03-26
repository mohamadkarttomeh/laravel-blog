
<nav class="navbar navbar-default" role="navigation">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="navbar-brand" href="/posts">My Bloge</a>
        </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="/posts">Posts</a></li>
                <li ><a href="/home">home</a></li>
                <li ><a href="/about">about</a></li>
                <li><a href="/contact">contact</a></li>
                @guest
                           
                @else

                <li>
                     <a href="/posts/create">  
                            <i class="fas fa-plus"></i>Create Post
                            
                    </a>
                </li>  

                <li>
                     <a href="{{ route('home') }}">  
                            <i class="fas fa-gear"></i>Admin
                            
                    </a>
                </li>  

                @endguest

            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                            @endguest
                        </ul>
            
           


        </div><!-- /.navbar-collapse -->

    </div>
</nav>
