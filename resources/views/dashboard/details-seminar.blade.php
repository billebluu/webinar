@extends('layouts.main-details')
@section('title','SeminarKu')

    
    @section('container')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{url('dashboard')}}">Dashboard</a></li>
      <li>Seminar Details</li>
    </ol>
    <h2>Seminar Details</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-8">
        <div class="portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide">
            <img src="{{ asset('assets/img/skills.png') }}" width="90%" align="center" alt="">
            </div>

            <!-- <div class="swiper-slide">
              <img src="assets/img/portfolio/portfolio-2.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="assets/img/portfolio/portfolio-3.jpg" alt="">
            </div> -->

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>{{ $seminar->nama_seminar }}</h3>
          <ul>
            <li><strong>Lokasi</strong>: {{ $seminar->lokasi_seminar }}</li>
            <li><strong>Gmaps</strong>: {{ $seminar->gmaps_seminar }}</li>
            <li><strong>Tanggal</strong>: {{ date('d-m-Y', strtotime($seminar->tanggal_seminar)) }}</li>
            <li><strong>Biaya</strong>: {{ $seminar->gratis_berbayar }}</li>
            <li><strong>Tanggal Pendaftaran Awal</strong>: {{ date('d-m-Y', strtotime($seminar->tgl_pendaftaran_awal)) }}</li>
            <li><strong>Tanggal Pendaftaran Awal</strong>: {{ date('d-m-Y', strtotime($seminar->tgl_pendaftaran_akhir)) }}</li>
          </ul>
        </div>
        <div class="portfolio-description">
          <h2>Deskripsi Seminar</h2>
          <p>
            {{ $seminar->deskripi_seminar }}          
          </p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection