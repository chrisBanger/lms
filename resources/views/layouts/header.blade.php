  <!-- HEADER CSS START -->
  <header class="header">
        <div class="top-row d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="header-link">
                            <li class=""><i class="fa fa-envelope" aria-hidden="true"></i><a href="tel:{{$config['COMPANYPHONE']}}">
                            {{$config['COMPANYPHONE']}}</a></li>
                            <li class=""><i class="fa fa-phone" aria-hidden="true"></i> <a
                                    href="mailto:{{$config['COMPANYEMAIL']}}">{{$config['COMPANYEMAIL']}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="header-social">
                            @if(Auth::check())
                            <li class="sign-lg"><a href="{{route('signout')}}">Sign Out</a></li>
                            @else
                            <li class="sign-lg"><a href="{{route('sign-in')}}">Login</a><span>/</span><a href="{{route('sign-up')}}">Signup</a></li>
                            @endif

                           <li><i class=" fa fa-shopping-cart" aria-hidden="true"></i>

                                    <a href="https://clients.careywebhosting.com/uie/cart/" class="et-cart-info">
                                        <span>0 </span>Items
                                    </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-row">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="{{asset($logo->img_path)}}" alt="logo"></a>
                            <div class="hamburger d-block d-lg-none">
                                <div class="hamburger-container">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12 d-none d-lg-block">
                        <ul class="list-inline navigation-list text-right">
                            <li class="list-inline-item {{isset($homemenu )?'active':''}}"><a href="{{route('home')}}">Home </a></li>
                            <li class="{{isset($coursesmenu)?'active':''}}"><a href="{{route('courses')}}">Courses</a></li>
                            <li class="{{isset($faqsmenu)?'active':''}}"><a href="{{route('faq')}}">Faq</a></li>
                            <li class="{{isset($contactmenu)?'active':''}}"><a href="{{route('contact-us')}}">Contact Us</a></li>
                            

                            @if(Auth::check())
                  <li><a href="{{route('dashboard.myProfile')}}"><i class='bx bx-sm bx-user'></i>Dashboard</a>
           
                </li>
                  @else
                  <!-- <li><a href="{{route('sign-in')}}"><i class='bx bx-sm bx-user'></i></a></li> -->
                  <li class="sign-lg"><a href="{{route('sign-in')}}">Login</a><span>/</span><a href="{{route('sign-up')}}">Signup</a></li>
                  @endif
                           

                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- HEADER END -->
