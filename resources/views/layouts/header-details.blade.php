<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">SeminarKu</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
        @auth
         
          <li>
         
            <form action="/dashboard" method="post" class="d-flex" role="search">
              @csrf
                <input class="form-control me-2" type="text" name="keyword" size="20" style="padding-right:50px"autofocus autocomplete="off" placeholder="Masukkan Keyword" aria-label="Search">
                <button class="search2" type="submit" name="search2">Search</button>
            </form>
          </li>
          <li><a class="nav-link scrollto" href="{{url('dashboard')}}">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="/request">Request Publish</a></li>
          <li class="dropdown"><a href="#"><span>{{ auth()->user()->nama_user }}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{url('profile')}}">Lihat Profil</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <li>
                <form action="/logout" method="post">
                @csrf
                <button type="submit" >logout</button>
                </form>
              </li>
             
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        @endauth
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->