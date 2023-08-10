<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand" href="{{url('/')}}"><img src="{{Nfs::content('logo')}}" alt="" width="30" /><span class="text-1000 fs-1 ms-2 fw-medium"><span class="fw-bold">{{Nfs::content('app')}}</span></span></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
          <li class="nav-item"><a class="nav-link @if($link == 'home') active active @endif" aria-current="page" href="{{url('/')}}">Home</a></li>
          <li class="nav-item"><a class="nav-link @if($link == 'member') active active @endif" href="{{url('member')}}">Member</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Gatcha </a></li>
        </ul>
        <form class="d-flex py-3 py-lg-0">
          <a class="btn btn-link text-1000 fw-medium order-1 order-lg-0" href="{{url('login')}}">Sign in</a>
          <a class="btn btn-outline-danger rounded-pill order-0" href="{{url('register')}}" >Sign Up</a>
        </form>
      </div>
    </div>
  </nav>
