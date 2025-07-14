<div class="loader-container" id="loader">
  <div class="loader"></div>
  <img src="web/assets/images/main/kmv-logo-plain.png" alt="Logo" class="loader-logo" sizes="32x32">
</div>
<style>
    .header-wrap
    {
      display: block;
      position: fixed;
      z-index: 9000 !important;
      top: 0px;
      left: 0;
      width: 100%;
      background-color: #fff;
      padding-top: 0px;
      border-bottom: 2px solid #eee;
    }
</style>

<div class="header-wrap">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-12 navbar-light">
        <div class="logo"> <a href="{{ route('index') }}"><img style="height:62px;" alt="" class="logo-default" src="web/assets/images/main/kmv-logo-title.png"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      </div>
      <div class="col-lg-5 col-md-12">
        <div class="navigation-wrap" id="filters">
          <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#">Menu</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link <?php echo ($title == "Home") ? "active" : "" ?>"  href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"><a class="nav-link <?php echo ($title == "History" || $title == "Overview" || $title == "Administration" || $title == "Past Principals" || $title == "Principal") ? "active" : "" ?>"  href="{{ route('overview') }}">About</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="{{ route('history') }}">History</a></li>
                    <li><a href="{{ route('overview') }}">Overview</a></li>
                    <li><a href="{{ route('administration') }}">Administration</a></li>
                    <li><a href="{{ route('principals') }}">Past Principals</a></li>
                    <li><a href="{{ route('principal') }}">Principal's message</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link  <?php echo ($title == "News") ? "active" : "" ?>"  href="{{ route('news-events') }}">News & Events</a> <i class="fas fa-caret-down"></i>

                </li>
                <li class="nav-item"><a class="nav-link <?php echo ($title == "Achievements") ? "active" : "" ?>"   href="{{ route('achievements') }}">Achievements</a>

                </li>
                <li class="nav-item"><a class="nav-link <?php echo ($title == "Gallery") ? "active" : "" ?>"  href="{{ route('gallery') }}">Gallery</a> <i class="fas fa-caret-down"></i>

                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="col-lg-3">
        {{-- <div class="header_info ml-3">
            <div style="box-shadow: 0 11px 10px -8px #500d0ae3;" class="loginwrp"><a class="<?php echo ($title == "Login") ? "active" : "" ?>" href="{{ route('contact') }}">Login</a></div>
        </div> --}}
        {{-- <div class="header_info mr-3">
            <div style="box-shadow: 0 11px 10px -8px #500d0ae3;" class="loginwrp">
                <a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a> | <a href="{{ route('contact') }}" class="<?php echo ($title == "Contact Us") ? "active" : "" ?>">Contact Us</a>
            </div>
        </div> --}}
        <div class="header_info mr-3">
            <div style="box-shadow: 0 11px 10px -8px #500d0ae3;" class="loginwrp">
                <a href="{{ route('login') }}">Login</a> | <a href="{{ route('contact') }}" class="<?php echo ($title == "Contact Us") ? "active" : "" ?>">Contact Us</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
