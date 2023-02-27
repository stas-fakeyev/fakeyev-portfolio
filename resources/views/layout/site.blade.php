<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ $title }} | Fakeyev site</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
			        		<meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icomoon-social.css') }}">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="{{ asset('css/leaflet.ie.css') }}" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <script src="{{ asset('js/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    </head>
    <body>
	        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						<ul>
							<li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="page-shopping-cart.html"><b>3 items</b></a></li>
							<li>
							<x-header.languages />
							</li>
										        		<li><a href="{{ route('login') }}">{{ __('auth.login') }}</a></li>
</ul>
</div><!-- end extras -->
</div><!-- end menu-extras -->
<x-header.menus />
</div><!-- end container -->
</div><!-- end main menu wrapper -->

@if($message = Session::get('message'))
	<x-alert>
	{{ $message }}
	</x-alert>
	@endif
	@if($message = Session::get('status'))
	<x-alert>
	{{ $message }}
	</x-alert>
	@endif

	
@yield('content')
	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
<x-footer.works />
<x-footer.menus />
<x-footer.contacts />
<x-footer.socials />
</div><!-- end row -->
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2013 {{ config('app.name') }}. {{ __('home.copyright') }}</div>
		    		</div>
		    	</div>

</div><!-- end container -->
</div><!-- end footer -->
        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('js/jquery-1.9.1.min.js') }}"><\/script>')</script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="{{ asset('js/jquery.fitvids.js') }}"></script>
        <script src="{{ asset('js/jquery.sequence-min.js') }}"></script>
        <script src="{{ asset('js/jquery.bxslider.js') }}"></script>
        <script src="{{ asset('js/main-menu.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
@stack('scripts')

</body>
</html>