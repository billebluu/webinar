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
            <li>Buat Seminar</li>
            </ol>
            <h2>Buat Seminar</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">   
            <div class="container" style="padding: 0 200px;">
                <div class="card">
                    <h3 class="text-center card-header">Informasi Seminar</h3>
                    <form action="{{url('/pic-seminar/store-sertifikat')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-text grid-item p-4">
                            <div class="mb-3">
                                <label for="nama_seminar" class="form-label">Judul Seminar</label>
                                <input type="text" name="nama_seminar" class="form-control" id="nama_seminar" aria-describedby="nama_seminar">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_seminar" class="form-label">Tanggal Pelaksanaan Seminar</label>
                                <input type="date" name="tanggal_seminar" class="form-control" id="tanggal_seminar" aria-describedby="tanggal_seminar">
                            </div>
                            <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @endsection