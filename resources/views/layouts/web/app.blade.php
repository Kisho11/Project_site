<!doctype html>
<html lang="en">
@include('layouts.web.includes.title')
<body>

<!--Header Start-->
@include('layouts.web.includes.header')
<!--Header End--> 


<!-- Begin Page Content -->
<div class="container-fluid">
    @yield('content')
</div>
<!-- /.container-fluid -->

<!-- Footer Start -->
@include('layouts.web.includes.footer')
<!-- Footer End --> 

<!-- Bottom Start -->
@include('layouts.web.includes.bottom')
<!-- Bottom End -->
</body>
</html>