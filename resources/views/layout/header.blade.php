<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>
<header class="site-navbar light site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="index.html"><strong>Tutor</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">

              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                {{-- <li class="{{Request::segment(1)=='' ? 'active' : ''}}"><a href="{{route('index')}}" class="nav-link">Home</a></li>
                <li class="{{Request::segment(1)=='tutorial' ? 'active' : ''}}" ><a href="{{route('tutorial')}}" class="nav-link">Tutorials</a></li>
                <li class="{{Request::segment(1)=='test' ? 'active' : ''}}"><a href="{{route('test')}}" class="nav-link">Testimonials</a></li>
                  <li class="{{Request::segment(1)=='blog' ? 'active' : ''}}" ><a href="{{route('blog')}}" class="nav-link">Blog</a></li>
                  <li class="{{Request::segment(1)=='about' ? 'active' : ''}}"><a href="{{route('about')}}" class="nav-link">About</a></li>
                  <li class="{{Request::segment(1)=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}" class="nav-link">Contact</a></li> --}}
                  @if (Auth::check())
                      <li>
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                   <button class="btn btn-primary px-4">Logout</button>
                  </form>
                  </li>
                  @else

                  <li>
                  <a href="{{route('login')}}" class="nav-link">
                    <button class="btn btn-success px-4">Login</button>
                  </a>

                  </li>
                  <li>
                  <a href="{{route('register')}}" class="nav-link"><button class="btn btn-primary px-4">Register</button>
                  </a>

                  </li>
                     @endif
                </ul>
              </nav>
            </div>


          </div>
        </div>

      </header>
