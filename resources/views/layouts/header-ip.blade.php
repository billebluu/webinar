<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">SeminarKu</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
      @auth
        <ul>
          
          <li>
            <form action="/dashboard" method="post" class="d-flex" role="search">
              @csrf
                <input class="form-control me-2" type="text" name="keyword" size="20" style="padding-right:50px"autofocus autocomplete="off" placeholder="Masukkan Keyword" aria-label="Search">
                <button class="search" type="submit" name="search">Search</button>
            </form>
          </li>
          <li><a class="nav-link scrollto" href="/request">Request Publish</a></li>
          <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>
          <li class="dropdown"><span>{{ auth()->user()->nama_user }}</span> <i class="bi bi-chevron-down"></i>
            <ul>
              <li><a href="{{url('profile')}}">Lihat Profil</a></li>
              <li><a href="{{url('event-request')}}">Event Request</a></li>
              <li>
                <form action="/logout" method="post">
                @csrf
                <button type="submit">Logout</button>
                </form>
              </li>
              
            </ul>
          </li>

        </ul>
        @endauth
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
