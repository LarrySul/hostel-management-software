<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Bisi</title>

	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" >
	<link rel="stylesheet" href="{{asset('css/bundle.css')}}" >
	<link rel="stylesheet" href="{{asset('css/sweetalert.css')}}" >
	<link rel="stylesheet" href="{{asset('css/kwicks-slider.css')}}" >
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}" >
	<link rel="stylesheet" href="{{asset('css/style.css')}}" >
	<link rel="stylesheet" href="{{asset('css/touchTouch.css')}}" >

</head>
<body>
	<div id="app">
		<div>@yield('content')</div>
	</div>

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
	</script>
	<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.cookie.js') }}"></script>
	<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('js/jquery.kwicks-1.5.1.js') }}"></script>
	<script src="{{ asset('js/jquery.preloader.js') }}"></script>
	<script src="{{ asset('js/superfish.js') }}"></script>
	<script src="{{ asset('js/touchTouch.jquery.js') }}"></script>
	<script src="{{ asset('js/forms.js') }}"></script>
	<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
	<script type="text/javascript">
		if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}         
		jQuery(window).load(function() {    
			$x = $(window).width();     
			if($x > 1024){          
				jQuery("#content .row").preloader();
			}    
			jQuery('.magnifier').touchTouch();          
			jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});  
		}); 
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-29231762-1']);
		_gaq.push(['_setDomainName', 'dzyngiri.com']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</body>
</html>
