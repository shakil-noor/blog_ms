<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('Layouts.BackSite._head')
</head>

<body>
   <!-- Start Left menu area -->
    @include('Layouts.BackSite._sidebar')
    <!-- End Left menu area -->

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('Layouts.BackSite._header')

        @yield('main_content')

        @include('Layouts.BackSite._footer')
    </div>

    @include('Layouts.BackSite._script')
	@yield('cus-js')
    @include('sweetalert::alert')
</body>

</html>