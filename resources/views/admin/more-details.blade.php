@extends('layouts-admin.main')
@section('title','Dashboard Admin SeminarKu')

    
    @section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Details Seminar</h1>
<!-- <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
    The charts below have been customized - for further customization options, please visit the <a
        target="_blank" href="https://www.chartjs.org/docs/latest/">official Chart.js
        documentation</a>.</p> -->

<!-- Content Row -->
<div class="row">

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Poster</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <img src="{{ asset('assets/img/skills.png') }}" width="90%" align="center" alt="">
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $seminar->nama_seminar }}</h6>
            </div>
            <div class="card-body">
                <ul>
                <li><strong>Lokasi</strong>: {{ $seminar->lokasi_seminar }}</li>
                <li><strong>Gmaps</strong>: {{ $seminar->gmaps_seminar }}</li>
                <li><strong>Tanggal</strong>: {{ date('d-m-Y', strtotime($seminar->tanggal_seminar)) }}</li>
                <li><strong>Biaya</strong>: {{ $seminar->gratis_berbayar }}</li>
                <li><strong>Tanggal Pendaftaran Awal</strong>: {{ date('d-m-Y', strtotime($seminar->tgl_pendaftaran_awal)) }}</li>
                <li><strong>Tanggal Pendaftaran Awal</strong>: {{ date('d-m-Y', strtotime($seminar->tgl_pendaftaran_akhir)) }}</li>
                <li><strong>Deskripsi Seminar</strong>: {{ $seminar->deskripi_seminar }}</li>
            </ul>
            </div>
        </div>

    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

    

@endsection