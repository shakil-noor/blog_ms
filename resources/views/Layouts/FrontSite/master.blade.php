<!DOCTYPE html>
<html lang="en">
	<head>
    	@include('Layouts.FrontSite._head')
	</head>
	<body>

		<!-- header (logo section) -->
		@include('Layouts.FrontSite._header')
		<!-- end header (logo section) -->

		
		<!-- slaider -->
		@yield('slider')

		@yield('main_content')
		@include('Layouts.FrontSite._footer')
		
		
		<!-- Bootstrap core and theme JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		@include('Layouts.FrontSite._script')
		@yield('cus-js')
		
	</body>
</html>
