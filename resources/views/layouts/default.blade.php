<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <title>
    	@section('title')
        | Welcome to 
            Bus Stations Management System
        @show
    </title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib.css') }}">
    <!--end of global css-->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body>
    <!-- Header Start -->
    <header>
        <!-- Icon Section Start -->
        <div class="icon-section">
            <div class="container">
                <ul class="list-inline">
                    {{-- <li>
                        <a href="#"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="google-plus" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="linkedin" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="rss" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li class="pull-right">
                        <ul class="list-inline icon-position">
                            <li>
                                <a href="mailto:"><i class="livicon" data-name="mail" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="mailto:" class="text-white">info@joshadmin.com</a></label>
                            </li>
                            <li>
                                <a href="tel:"><i class="livicon" data-name="phone" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="tel:" class="text-white"><span>(703) <span class="direction_right">717-4200</span></span></a></label>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!-- //Icon Section End -->
        <!-- Nav bar Start -->
        <nav class="navbar navbar-default container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span><a href="#"><i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc"></i>
                    </a></span>
                </button>
                {{-- <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo_position">
                </a> --}}
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav navbar-right">

                    {{-- Home --}}
                    <li {!! (Request::is('/') ? 'class="active frontend_navbar"' : 'class="frontend_navbar"') !!}> <a href="{{ route('home') }}"> Home </a>
                    </li>

                    {{-- test --}}
                    {{-- @if(Sentinel::guest()) 
                    @else
                            <li {!! (Request::is('test') || Request::is('test/*') ? 'class="active frontend_navbar"' : 'class="frontend_navbar"') !!} class="frontend_navbar"> 
                                <a href="{{ URL::to('test') }}"> test </a>
                            </li>
                    @endif --}}

                        {{-- Bus --}}
                    <li class="frontend_navbar dropdown {!! (Request::is('bus') || Request::is('bus/*') || Request::is('bus/show') || Request::is('bus/edit')  ? 'active' : '') !!}">
                        <a href="{{ URL::to('bus') }}"> Bus </a>
                        {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Bus</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('bus') }}">Bus</a>
                            </li>
                            <li><a href="{{ URL::to('bus/create') }}">Create Bus</a>
                            </li>
                            <li><a href="{{ URL::to('bus/show') }}">show Bus</a>
                            </li>
                            <li><a href="{{ URL::to('bus/edit') }}">edit Bus</a>
                            </li>
                        </ul> --}}
                    </li>

                    {{-- Driver --}}
                    <li class="frontend_navbar dropdown {!! (Request::is('driver') || Request::is('driver/*')   ? 'active' : '') !!}">
                        <a href="{{ URL::to('driver') }}"> Driver </a>
                    </li>

                    {{-- Rider --}}
                    <li class="frontend_navbar dropdown {!! (Request::is('rider') || Request::is('rider/*')   ? 'active' : '') !!}">
                        <a href="{{ URL::to('rider') }}"> Rider </a>
                    </li>

                    {{-- Bus stop --}}
                    {{-- <li class="frontend_navbar dropdown {!! (Request::is('busstop') || Request::is('busstop/*')   ? 'active' : '') !!}">
                        <a href="{{ URL::to('busstop') }}"> Bus Stop </a>
                    </li> --}}

                    {{-- Accident --}}
                    <li class="frontend_navbar dropdown {!! (Request::is('accident') || Request::is('accident/*')   ? 'active' : '') !!}">
                        <a href="{{ URL::to('accident') }}"> Accident </a>
                    </li>

                    {{-- Seat --}}
                    {{-- <li class="frontend_navbar dropdown {!! (Request::is('seat') || Request::is('seat/*')   ? 'active' : '') !!}">
                        <a href="{{ URL::to('seat') }}"> Seat </a>
                    </li> --}}

                    {{-- Schedule --}}
                    <li class="frontend_navbar dropdown {!! (Request::is('schedule') || Request::is('schedule/*')   ? 'active' : '') !!}">
                        <a href="{{ URL::to('schedule') }}"> Schedule </a>
                    </li>

                    {{-- Queue --}}
                    <li class="frontend_navbar dropdown {!! (Request::is('queue') || Request::is('queue/*')   ? 'active' : '') !!}">
                        <a href="{{ URL::to('queue') }}"> Queue </a>
                    </li>

                    {{-- Reserve --}}
                    <li class="frontend_navbar dropdown {!! (Request::is('reserve') || Request::is('reserve/*')   ? 'active' : '') !!}">
                        <a href="{{ URL::to('reserve') }}"> Reserve </a>
                    </li>
                    

                        {{-- Features --}}
                    {{-- <li class="frontend_navbar dropdown {!! (Request::is('typography') || Request::is('advancedfeatures') || Request::is('grid') ? 'active' : '') !!}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Features</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('typography') }}">Typography</a>
                            </li>
                            <li><a href="{{ URL::to('advancedfeatures') }}">Advanced Features</a>
                            </li>
                            <li><a href="{{ URL::to('grid') }}">Grid System</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- pages --}}
                    {{-- <li class="frontend_navbar dropdown {!! (Request::is('aboutus') || Request::is('timeline') || Request::is('faq') || Request::is('blank_page')  ? 'active' : '') !!}"><a href="#" class="dropdown-toggle" data-toggle="dropdown" class="frontend_navbar"> Pages</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('aboutus') }}">About Us</a>
                            </li>
                            <li><a href="{{ URL::to('timeline') }}">Timeline</a></li>
                            <li><a href="{{ URL::to('price') }}">Price</a>
                            </li>
                            <li><a href="{{ URL::to('404') }}">404 Error</a>
                            </li>
                            <li><a href="{{ URL::to('500') }}">500 Error</a>
                            </li>
                            <li><a href="{{ URL::to('faq') }}">FAQ</a>
                            </li>
                            <li><a href="{{ URL::to('blank_page') }}">Blank</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- shop --}}
                    {{-- <li class="frontend_navbar dropdown {!! (Request::is('products') || Request::is('single_product') || Request::is('compareproducts') || Request::is('category')  ? 'active' : '') !!}"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Shop</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('products') }}">Products</a>
                            </li>
                            <li><a href="{{ URL::to('single_product') }}">Single Product</a>
                            </li>
                            <li><a href="{{ URL::to('compareproducts') }}">Compare Products</a>
                            </li>
                            <li><a href="{{ URL::to('category') }}">Categories</a></li>
                        </ul>
                    </li> --}}

                    {{-- Portofolio --}}
                    {{-- <li class="frontend_navbar dropdown {!! (Request::is('portfolio') || Request::is('portfolioitem') ? 'active' : '') !!}"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Portfolio</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('portfolio') }}">Portfolio</a>
                            </li>
                            <li><a href="{{ URL::to('portfolioitem') }}">Portfolio Item</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- News --}}
                    {{-- <li {!! (Request::is('news') || Request::is('news/*') ? 'class="active frontend_navbar"' : 'class="frontend_navbar"') !!} class="frontend_navbar">
                        <a href="{{ URL::to('news') }}">News</a>
                    </li> --}}

                    {{-- I didn't commented this --}}
                    {{-- <li class="dropdown {!! (Request::is('news') || Request::is('news_item') ? 'active' : '') !!}"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> News</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::to('news') }}">News</a>
                            </li>
                            <li><a href="{{ URL::to('news_item') }}">News Item</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- Blog --}}
                    {{-- <li {!! (Request::is('blog') || Request::is('blogitem/*') ? 'class="active frontend_navbar"' : 'class="frontend_navbar"') !!} class="frontend_navbar"><a href="{{ URL::to('blog') }}"> Blog</a>
                    </li> --}}

                    {{-- Contact --}}
                    {{-- <li {!! (Request::is('contact') ? 'class="active frontend_navbar"' : 'class="frontend_navbar"') !!} class="frontend_navbar"><a href="{{ URL::to('contact') }}">Contact</a>
                    </li> --}}

                    {{--based on anyone login or not display menu items--}}
                    @if(Sentinel::guest())
                        <li class="frontend_navbar"><a href="{{ URL::to('login') }}">Login</a>
                        </li>
                        <li class="frontend_navbar"><a href="{{ URL::to('register') }}">Register</a>
                        </li>
                    @else
                        <li {{ (Request::is('my-account') ? 'class=active' : '') }} class="frontend_navbar"><a href="{{ URL::to('my-account') }}">My Account</a>
                        </li>
                        <li class="frontend_navbar"><a href="{{ URL::to('logout') }}">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <!-- Nav bar End -->
    </header>
    <!-- //Header End -->
    
    <!-- slider / breadcrumbs section -->
    @yield('top')

    <!-- Content -->
    @yield('content')

    <!-- Footer Section Start -->
    <footer style="margin-top: 7%; margin-left: 0%;margin-right: 0%;width: 100%"
        <div class="container footer-text">

            <div class="col-sm-4" style="align-content: center">
                {{-- <hr id="hr_border"> --}}
                <h4 class="menu">Follow Us</h4>
                <ul class="list-inline"  id="footer_part">
                    <li>
                        <a href="#"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="google-plus" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="linkedin" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="rss" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- About Us Section Start -->
            <div class="col-sm-4 right_float">
                <h4>About Us</h4>
                
                
            </div>
            <!-- //About us Section End -->
            <!-- Contact Section Start -->
            <div class="col-sm-4 right_float">
                <h4>Contact Us</h4>
                
                {{-- <hr id="hr_border">
                <div class="news menu">
                    <h4>News letter</h4>
                    <p>subscribe to our newsletter and stay up to date with the latest news and deals</p>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="yourmail@mail.com" aria-describedby="basic-addon2">
                        <a href="#" class="btn btn-primary text-white" role="button">Subscribe</a>
                    </div>
                </div> --}}
            </div>
            

            <!-- //Contact Section End -->

            {{-- <!-- Recent post Section Start -->
            <div class="col-sm-4 right_float">
                <h4>Recent Posts</h4>
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object img-circle" src="{{ asset('assets/images/image_14.jpg') }}" alt="image">
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry dummy.
                        </p>
                        <p class="pull-right"><i>Sam Bellows</i></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object img-circle" src="{{ asset('assets/images/image_15.jpg') }}" alt="image">
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry dummy.
                        </p>
                        <p class="pull-right"><i>Emilly Barbosa Cunha</i></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object img-circle" src="{{ asset('assets/images/image_13.jpg') }}" alt="image">
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry dummy.
                        </p>
                        <p class="pull-right"><i>Sinikka Oramo</i></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object img-circle" src="{{ asset('assets/images/c1.jpg') }}" alt="image">
                        </a>
                    </div>
                    <div class="media-body">
                        <p class="media-heading">Lorem Ipsum is simply dummy text of the printing and type setting industry dummy.
                        </p>
                        <p class="pull-right"><i>Samsa Parras</i></p>
                    </div>
                </div>
            </div>
            <!-- //Recent Post Section End --> --}}
        </div>
    </footer>
    
    <!-- //Footer Section End -->
    <div   class="copyright">
        <div class="container">
        <p style="text-align: center">Copyright &copy; Abokor & Ahmed, 2019</p>
        </div>
    </div>
    {{--@if()--}}
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="right">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    {{--@endif--}}
    <!--global js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/lib.js') }}"></script>
    <!--global js end-->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->
</body>

</html>
