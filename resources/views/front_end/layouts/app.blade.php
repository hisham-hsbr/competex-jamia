<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('front_end.layouts.head')
</head>

<body>

    <!-- Header Area Start -->
    <header class="top">
        @include('front_end.layouts.header')
    </header>
    <!-- Header Area End -->
    @section('mainContent')
    @show


    <!-- ======= Footer ======= -->
    @include('front_end.layouts.footer')
    <!-- End Footer -->

</body>

</html>
