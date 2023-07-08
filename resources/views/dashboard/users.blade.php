@extends('layouts.main')
@section('title','SeminarKu')

    
    @section('container')
    <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Discover Exciting Events</h1>
          <h2>Explore a Wide Array of Engaging Activities!</h2>
          <!-- <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div> -->
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Seminar yang akan berlangsung</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
        @if(session('success'))
        <script>
          window.onload = function() {
            alert('{{ session('success') }}');
          };
        </script>
        @endif

        <div class="row">
        
            <form action="/dashboard" method="GET" class="d-flex" role="search">
              @csrf
                <input class="form-control me-2" type="text" name="keyword" size="20" style="padding-right:50px"autofocus autocomplete="off" placeholder="Masukkan Keyword" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
            </form>
      <br>
      <br>
        <?php $i = 1; ?>
        @foreach ($pic_seminar as $row)

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
            @php
              $fileName = basename($row->poster);
            @endphp
              <div class="icon"><img src="{{ Storage::url('poster/' . $fileName) }}" width="90%" align="center"></div>
              <h4><a href="{{ route('dashboard.details-seminar', $row->id) }}">{{ $row->nama_seminar }}</a></h4>
              <p>
                  <b>Tanggal:</b> {{ date('d-m-Y', strtotime($row->tanggal_seminar)) }} <br>
                  <b>Lokasi:</b> {{ $row->lokasi_seminar }} <br>
                  <b>Biaya:</b> {{ $row->gratis_berbayar }} <br>
                  <b>Tanggal Pendaftaran Awal:<br></b> {{ date('d-m-Y', strtotime($row->tgl_pendaftaran_awal)) }} <br>
                  <b>Tanggal Pendaftaran Akhir:<br></b> {{ date('d-m-Y', strtotime($row->tgl_pendaftaran_akhir)) }} <br>
              </p>

            </div>
          </div>
          <br>

          
      <?php $i++; ?>
      @endforeach

      <!-- Pagination -->
      <div>
        Showing
        {{ $pic_seminar->firstItem() }}
        to
        {{ $pic_seminar->lastItem() }}
        of
        {{ $pic_seminar->total() }}
        entries
      </div>
      <div class="d-flex justify-content-end">
        {{ $pic_seminar->links() }}
      </div>

    </section>
    <!-- End Services Section -->

    
    @endsection