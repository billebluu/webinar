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
            <li>Edit Pembicara</li>
            </ol>
            <h2>Edit Pembicara</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">   
            <div class="container" style="padding: 0 50px;">
                <div class="card">
                    <h3 class="text-center card-header">Edit Pembicara</h3>
                    <form action="{{ url('/pic-seminar/store-pembicara-edited') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pembicara->id }}">
                    <div class="card-text grid-item p-4">
                        <div class="mb-3 form-group">
                        <label for="nama_pembicara" class="form-label">Nama Pembicara</label>
                        <input type="text" name="nama_pembicara" value="{{ old('nama_pembicara', $pembicara->nama_pembicara) }}" class="form-control @error('nama_pembicara') is-invalid @enderror" id="nama_pembicara" aria-describedby="nama_pembicara">
                            @error('nama_pembicara')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                        <label for="asal_instansi" class="form-label">Asal Instansi</label>
                        <input type="text" name="asal_instansi" value="{{ old('asal_instansi', $pembicara->asal_instansi) }}" class="form-control @error('nama_pembicara') is-invalid @enderror" id="nama_pembicara" aria-describedby="nama_pembicara">
                            @error('asal_instansi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                        <label for="topik_pembicara" class="form-label">Nama Pembicara</label>
                        <input type="text" name="topik_pembicara" value="{{ old('topik_pembicara', $pembicara->topik_pembicara) }}" class="form-control @error('nama_pembicara') is-invalid @enderror" id="nama_pembicara" aria-describedby="nama_pembicara">
                            @error('topik_pembicara')
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