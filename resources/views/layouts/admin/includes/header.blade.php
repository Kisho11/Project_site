<style>
    .header-wrap {
        display: block;
        position: fixed;
        z-index: 1000;
        /* Lowered from 9000 to prevent overlap with modals */
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
        padding: 10px 0;
        border-bottom: 2px solid #eee;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .nav-tabs .nav-link {
        color: #500d0a;
    }

    .nav-tabs .nav-link.active {
        background-color: #c5b0ae;
        color: #fff;
    }
</style>

<div class="loader-container" id="loader">
    <div class="loader"></div>
    <img src="{{ asset('web/assets/images/main/kmv-logo-plain.png') }}" alt="Logo" class="loader-logo" sizes="32x32">
</div>

<div class="header-wrap">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-2">
                <div class="logo">
                    <a href="https://staging.kmv.lk/" target="_blank">
                        {{-- https://kmv.lk --}}
                        <img style="height:40px;" alt="KMV Logo" class="logo-default"
                            src="{{ asset('web/assets/images/main/kmv-logo-title.png') }}">
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <nav class="navbar navbar-expand-md navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    {{-- <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ $title == 'Gallery' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Gallery</a>
                            </li>
                        </ul>
                    </div> --}}
                </nav>
            </div>
            {{-- <div class="col-md-3 d-flex justify-content-end align-items-center">
                <div class="header_info text-right">
                    <span class="mr-3">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </span>
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
                </div>
            </div> --}}
            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <div class="header_info text-right">
                    <span class="mr-3">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
