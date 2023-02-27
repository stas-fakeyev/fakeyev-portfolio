<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard One | Notika - {{ $title ?? '' }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.ico') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/owl.transitions.css') }}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/jvectormap/jquery-jvectormap-2.0.3.css') }}">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/notika-custom-icon.css') }}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/wave/waves.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="{{ route('admin.index') }}"><img src="{{ asset('admin/img/logo/logo.png') }}" alt="admin panel logo" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
						<!-- search -->
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="search"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li>
<!-- messages -->
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="messages"><span><i class="notika-icon notika-mail"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Messages</h2>
                                    </div>
</div>
</li>
<!-- notifications -->
                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="notifications"><span><i class="notika-icon notika-alarm"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>3</span></div></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
</div>
</li>
<!-- tasks -->
                            <li class="nav-item"><a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="tasks"><span><i class="notika-icon notika-menus"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>2</span></div></a>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Tasks</h2>
                                    </div>
</div>
</li>
<!-- chat -->
                            <li class="nav-item"><a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" title="chat"><span><i class="notika-icon notika-chat"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Chat</h2>
                                    </div>
</div>
</li>
</ul>
</div><!-- end header top menu -->
</div><!-- end md 8 -->
</div><!-- end row -->
</div><!-- end container -->
</div><!-- end header top area -->
    <!-- End Header Top Area -->

    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
<x-admin.languages />
@can('viewAny', App\Models\Slider::class)
                                <li><a data-toggle="collapse" data-target="#homeslider" href="javascript:void(0)">{{ __('home-slider/pages.section_title') }}</a>
                                    <ul id="homeslider" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('admin.sliders.index') }}">{{ __('home-slider/pages.section_all') }}</a></li>
                                        <li><a href="{{ route('admin.sliders.create') }}">{{ __('home-slider/pages.section_add') }}</a></li>
                                    </ul>
                                </li>
								@endcan
								@can('viewAny', App\Models\User::class)
<!-- users -->
                                <li><a data-toggle="collapse" data-target="#users" href="javascript:void(0)">{{ __('users/pages.section_title') }}</a>
                                    <ul id="users" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('admin.users.index') }}">{{ __('users/pages.section_all') }}</a></li>
                                        <li><a href="{{ route('admin.users.create') }}">{{ __('users/pages.section_add') }}</a></li>
																			<li><a href="{{ route('admin.users.trash') }}">{{ __('users/pages.section_trash') }}</a></li>
                                    </ul>
                                </li>
@endcan
<!-- posts -->
								@can('viewAny', App\Models\Totalpost::class)
                                <li><a data-toggle="collapse" data-target="#posts" href="javascript:void(0)">{{ __('posts/pages.section_title') }}</a>
                                    <ul id="posts" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('admin.posts.index') }}">{{ __('posts/pages.section_all') }}</a></li>
                                        <li><a href="{{ route('admin.posts.create') }}">{{ __('posts/pages.section_add') }}</a></li>
																													<li><a href="{{ route('admin.posts.trash') }}">{{ __('posts/pages.section_trash') }}</a></li>
                                    </ul>
                                </li>
@endcan
<!-- categories -->
								@can('viewAny', App\Models\Totalcategory::class)
                                <li><a data-toggle="collapse" data-target="#categories" href="javascript:void(0)">{{ __('categories/pages.section_title') }}</a>
                                    <ul id="categories" class="collapse dropdown-header-top">
                                        <li><a href="{{ route('admin.categories.index') }}">{{ __('categories/pages.section_all') }}</a></li>
                                        <li><a href="{{ route('admin.categories.create') }}">{{ __('categories/pages.section_add') }}</a></li>
																													<li><a href="{{ route('admin.categories.trash') }}">{{ __('categories/pages.section_trash') }}</a></li>
                                    </ul>
                                </li>
@endcan
</ul>
</nav>
</div><!-- end mobile menu -->
</div>
</div><!-- end row -->
</div><!-- end container -->
</div><!-- end mobile menu area -->
@if($message = Session::get('message'))
	<x-alert>
	{{ $message }}
	</x-alert>
	@endif

<p>admin</p>
@yield('content')
    <!-- jquery
		============================================ -->
    <script src="{{ asset('admin/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('admin/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('admin/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('admin/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('admin/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('admin/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('admin/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="{{ asset('admin/js/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/js/jvectormap/jvectormap-active.js') }}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('admin/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/js/sparkline/sparkline-active.js') }}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('admin/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('admin/js/flot/flot-active.js') }}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{ asset('admin/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('admin/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('admin/js/knob/knob-active.js') }}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{ asset('admin/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('admin/js/wave/wave-active.js') }}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{ asset('admin/js/todo/jquery.todo.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('admin/js/plugins.js') }}"></script>
	<!--  Chat JS
		============================================ -->
    <script src="{{ asset('admin/js/chat/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/chat/jquery.chat.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="{{ asset('admin/js/tawk-chat.js') }}"></script>
</body>

</html>