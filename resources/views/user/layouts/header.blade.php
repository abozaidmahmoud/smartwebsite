 <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="post.html">Sample Post</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    @if(auth::guest())
                    <li>
                        <a href="{{url('user/login')}}">Login</a>
                    </li>
                     <li>
                        <a href="{{route('register')}}">Register</a>
                    </li>
                    @else

                   
                     <li>
                        <a href="#" onclick="event.preventDefault();
                                            document.getElementById('logout_form').submit()
                        ">logout</a>
                        <form method="post" action="{{route('logout')}}" id="logout_form">
                            {{csrf_field()}}
                        </form>
                    </li>
                    @endif

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
     <!-- Page Header -->
    <header class="intro-header" style="background-image: url(@yield('img_head')) ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>@yield('title')</h1>
                        <hr class="small">
                        <span class="subheading">@yield('description')</span>
                    </div>
                </div>
            </div>
        </div>
    </header>