@extends('layouts.main-ip')
@section('title','SeminarKu')
    
    @section('container')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
            <li><a href="{{url('dashboard')}}">Dashboard</a></li>        
			<li><a href="{{url('pic-seminar')}}">Seminar</a></li>
            <li>Buat Seminar</li>
            </ol>
            <h2>Buat Seminar</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">   
            <div class="container" style="padding: 0 100px;">
                <div class="card">
                    <h3 class="text-center card-header">Informasi Seminar</h3>
                    <form action="{{ url('/pic-seminar/store-seminar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-text grid-item p-4">
                            <div class="mb-3 form-group">
                                <label for="nama_seminar" class="form-label">Judul Seminar</label>
                                <input type="text" name="nama_seminar" class="form-control @error('nama_seminar') is-invalid @enderror" id="nama_seminar" aria-describedby="nama_seminar">
                                @error('nama_seminar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="deskripi_seminar" class="form-label">Deskripsi Seminar</label>
                                <textarea class="form-control @error('deskripi_seminar') is-invalid @enderror" name="deskripi_seminar" id="deskripi_seminar" aria-describedby="deskripi_seminar"></textarea>
                                @error('deskripi_seminar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="lokasi_seminar" class="form-label">Lokasi Seminar</label>
                                <input type="text" name="lokasi_seminar" class="form-control @error('lokasi_seminar') is-invalid @enderror" id="lokasi_seminar" aria-describedby="lokasi_seminar">
                                @error('lokasi_seminar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="gmaps_seminar" class="form-label">URL Maps Lokasi Seminar</label>
                                <input type="text" name="gmaps_seminar" class="form-control @error('gmaps_seminar') is-invalid @enderror" id="gmaps_seminar" aria-describedby="gmaps_seminar">
                                @error('gmaps_seminar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="vidcon_seminar" class="form-label">URL Platform Webinar</label>
                                <input type="text" name="vidcon_seminar" class="form-control @error('vidcon_seminar') is-invalid @enderror" id="vidcon_seminar" aria-describedby="vidcon_seminar">
                                @error('vidcon_seminar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="tanggal_seminar" class="form-label">Tanggal Pelaksanaan Seminar</label>
                                <input type="date" name="tanggal_seminar" class="form-control @error('tanggal_seminar') is-invalid @enderror" id="tanggal_seminar" aria-describedby="tanggal_seminar">
                                @error('tanggal_seminar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="gratis_berbayar" class="form-label">Jenis Seminar</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gratis_berbayar" id="gratis_berbayar" value="Gratis">
                                    <label class="form-check-label" for="gratis">Gratis</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gratis_berbayar" id="gratis_berbayar" value="Berbayar">
                                    <label class="form-check-label" for="berbayar">Berbayar</label>
                                </div>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="poster" class="form-label">Upload Poster Seminar</label>
                                <input type="file" name="poster" class="form-control @error('poster') is-invalid @enderror" id="poster" aria-describedby="poster">
                                @error('poster')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr class="solid mt-5">
                            <div class="mb-3 form-group">
                                <label for="tgl_pendaftaran_awal" class="form-label">Tanggal Awal Pendaftaran Seminar</label>
                                <input type="date" name="tgl_pendaftaran_awal" class="form-control @error('tgl_pendaftaran_awal') is-invalid @enderror" id="tgl_pendaftaran_awal" aria-describedby="tgl_pendaftaran_awal">
                                @error('tgl_pendaftaran_awal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="tgl_pendaftaran_akhir" class="form-label">Tanggal Akhir Pendaftaran Seminar</label>
                                <input type="date" name="tgl_pendaftaran_akhir" class="form-control @error('tgl_pendaftaran_akhir') is-invalid @enderror" id="tgl_pendaftaran_akhir" aria-describedby="tgl_pendaftaran_akhir">
                                @error('tgl_pendaftaran_akhir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- @endsection -->