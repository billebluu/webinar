@extends('layouts.main-ip')
@section('title','SeminarKu')
    
    @section('container')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
            <li><a href="{{url('dashboard')}}">Dashboard</a></li>        
			<li><a href="{{url('pic-seminar/')}}">Seminar</a></li>
            <li><a href="{{url('pic-seminar/view-pembicara/'.$pembicara->id_pic_seminar)}}">Pembicara</a></li>
            <li>Upload Ulang Materi</li>
            </ol>
            <h2>Upload Ulang Materi</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">   
            <div class="container" style="padding: 0 50px;">
                <div class="card">
                    <h3 class="text-center card-header">Upload Ulang Materi</h3>
                    <form action="{{ url('/pic-seminar/store-ulang-materi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pembicara->id }}">
                    <div class="card-text grid-item p-4">
                        <div class="mb-3 form-group">
                            <label for="materi_seminar" class="form-label">Materi (.pdf, .doc, .docx)</label>
                            <input type="file" name="materi_seminar" value="{{ old('materi_seminar', $pembicara->materi_seminar) }}" class="form-control @error('materi_seminar') is-invalid @enderror" id="materi_seminar" aria-describedby="materi_seminar">
                                @error('materi_seminar')
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