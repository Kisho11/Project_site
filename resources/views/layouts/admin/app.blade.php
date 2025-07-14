<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin.includes.title')
</head>
<body>
    <!-- Header Start -->
    @include('layouts.admin.includes.header')
    <!-- Header End -->

    <!-- Main Content -->
    <div class="container-fluid mt-5 pt-5">
        <div class="row">
            <main role="main" class="col-12 px-4">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Footer Start -->
    @include('layouts.admin.includes.footer')
    <!-- Footer End -->

    <!-- Bottom Start -->
    @include('layouts.admin.includes.buttom')
    <!-- Bottom End -->
</body>
</html>
<style>
    .content-wrapper {
        min-height: calc(100vh - 120px);
        padding-bottom: 60px;
    }
    .footer-bottom {
        position: relative;
        bottom: 0;
        width: 100%;
        background: #481210;
        padding: 10px 0;
    }
</style>
