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
            <li>Buat Sertifikat</li>
            </ol>
            <h2>Buat Sertifikat</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">   
            <div class="container" style="padding: 0 50px;">
                <div class="card">
                    <h3 class="text-center card-header">Sertifikat</h3>
                    <form action="{{ url('/pic-seminar/store-sertifikat') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $seminar->id }}">
                    <div class="card-text grid-item p-4">
                        <!-- Kode lainnya -->

                        <div class="mb-3 form-group">
                            <label for="sertifikat" class="form-label">Upload Template Sertifikat (.jpg, .jpeg, .png)</label>
                            <input type="file" name="sertifikat" value="{{ session('sertifikat') }}" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat" aria-describedby="sertifikat">
                            @error('sertifikat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 form-group">
                            <label for="setup_tgl_unduh" class="form-label">Tanggal Pengiriman Sertifikat</label>
                            <input type="date" name="setup_tgl_unduh" value="{{ session('setup_tgl_unduh') }}" class="form-control @error('setup_tgl_unduh') is-invalid @enderror" id="setup_tgl_unduh" aria-describedby="setup_tgl_unduh">
                            <p class="px-2 py-2" style="font-size: 13px;">* Sertifikat akan dikirim ke email peserta dan dapat diakses oleh peserta pada tanggal yang Anda tetapkan</p>
                            @error('setup_tgl_unduh')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mt-1" type="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- @endsection -->