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
            <li>Edit Status Peserta</li>
            </ol>
            <h2>Edit Status Peserta</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">   
            <div class="container" style="padding: 0 50px;">
                <div class="card">
                    <h3 class="text-center card-header">Edit Status Peserta</h3>
                    <form action="{{ url('/pic-seminar/store-status-peserta') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $peserta->id }}">
                    <div class="card-text grid-item p-4">
                        <div class="mb-3 form-group">
                        <label for="status_peserta" class="form-label">Status Peserta</label>
                        <input type="text" name="status_peserta" value="{{ old('status_peserta', $peserta->status_peserta) }}" class="form-control @error('status_peserta') is-invalid @enderror" id="status_peserta" aria-describedby="status_peserta">
                            @error('status_peserta')
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