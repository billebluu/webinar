@extends('layouts.main-ip')
@section('title','SeminarKu')
    
    @section('container')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
            <li><a href="{{url('dashboard')}}">Dashboard</a></li>        
			<li><a href="{{url('pic-seminar')}}">List Seminar</a></li>
            <li><a href="{{url('pic-seminar/view-pembicara/'.request()->segment(3))}}">Pembicara</a></li>
            <li>Buat Seminar</li>
            </ol>
            <h2>Buat Seminar</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">   
            <div class="container" style="padding: 0 50px;">

                <form action="{{ url('/pic-seminar/store-pembicara') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $seminar->id }}">
                    @csrf
                    <div class="card mt-3">
                        <h3 class="text-center card-header">Informasi Pembicara</h3>
                        <div class="card-text grid-item p-4">
                            <div class="mb-3 form-group">
                                <label for="nama_pembicara" class="form-label">Nama Pembicara</label>
                                <input type="text" name="nama_pembicara" class="form-control @error('nama_pembicara') is-invalid @enderror" id="nama_pembicara" aria-describedby="nama_pembicara">
                                @error('nama_pembicara')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="asal_instansi" class="form-label">Asal Instansi</label>
                                <input type="text" name="asal_instansi" class="form-control @error('asal_instansi') is-invalid @enderror" id="asal_instansi" aria-describedby="asal_intansi">
                                @error('asal_instansi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="topik_pembicara" class="form-label">Topik</label>
                                <input type="text" name="topik_pembicara" class="form-control @error('topik_pembicara') is-invalid @enderror" id="topik_pembicara" aria-describedby="topik_pembicara">
                                @error('topik_pembicara')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="materi_seminar" class="form-label">File Materi</label>
                                <input type="file" name="materi_seminar" class="form-control @error('materi_seminar') is-invalid @enderror" id="materi_seminar" aria-describedby="materi_seminar">
                                @error('materi_seminar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </main><!-- End #main -->

    <!-- @endsection -->