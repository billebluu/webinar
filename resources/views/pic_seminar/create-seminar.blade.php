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
                    <form action="{{url('/pic-seminar/store-seminar')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-text grid-item p-4">
                            <div class="mb-3">
                                <label for="nama_seminar" class="form-label">Judul Seminar</label>
                                <input type="text" name="nama_seminar" class="form-control" id="nama_seminar" aria-describedby="nama_seminar">
                            </div>
                            <div class="mb-3">
                                <label for="deskripi_seminar" class="form-label">Deskripsi Seminar</label>
                                <textarea class="form-control" name="deskripi_seminar" id="deskripi_seminar" aria-describedby="deskripi_seminar"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi_seminar" class="form-label">Lokasi Seminar</label>
                                <input type="text" name="lokasi_seminar" class="form-control" id="lokasi_seminar" aria-describedby="lokasi_seminar">
                            </div>
                            <div class="mb-3">
                                <label for="gmaps_seminar" class="form-label">URL Maps Lokasi Seminar</label>
                                <input type="text" name="gmaps_seminar" class="form-control" id="gmaps_seminar" aria-describedby="gmaps_seminar">
                            </div>
                            <div class="mb-3">
                                <label for="vidcon_seminar" class="form-label">URL Platform Webinar</label>
                                <input type="text" name="vidcon_seminar" class="form-control" id="vidcon_seminar" aria-describedby="vidcon_seminar">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_seminar" class="form-label">Tanggal Pelaksanaan Seminar</label>
                                <input type="date" name="tanggal_seminar" class="form-control" id="tanggal_seminar" aria-describedby="tanggal_seminar">
                            </div>
                            <div class="mb-3">
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
                            <div class="mb-3">
                                <label for="poster" class="form-label">Upload Poster Seminar</label>
                                <input type="file" name="poster" class="form-control" id="poster" aria-describedby="poster">
                            </div>
                            <hr class="solid mt-5">
                            <div class="mb-3">
                                <label for="tgl_pendaftaran_awal" class="form-label">Tanggal Awal Pendaftaran Seminar</label>
                                <input type="date" name="tgl_pendaftaran_awal" class="form-control" id="tgl_pendaftaran_awal" aria-describedby="tgl_pendaftaran_awal">
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pendaftaran_akhir" class="form-label">Tanggal Akhir Pendaftaran Seminar</label>
                                <input type="date" name="tgl_pendaftaran_akhir" class="form-control" id="tgl_pendaftaran_akhir" aria-describedby="tgl_pendaftaran_akhir">
                            </div>
                            <div class="mb-3">
                                <!-- <label for="setup_tgl_unduh" class="form-label">Tanggal Unduh Sertifikat</label> -->
                                <input type="hidden" name="setup_tgl_unduh" value="" class="form-control" id="setup_tgl_unduh" aria-describedby="setup_tgl_unduh">
                            </div>
                            <div class="mb-3">
                                <!-- <label for="sertifikat" class="form-label">Upload Template Sertifikat</label> -->
                                <input type="hidden" name="sertifikat" value="" class="form-control" id="sertifikat" aria-describedby="sertifikat">
                            </div>
                            <button class="btn btn-primary mt-3" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>

                <!-- <div class="card mt-3">
                <h3 class="text-center card-header">Informasi Pembicara</h3>
                <div class="card-text grid-item p-4">
                    <div class="mb-3">
                    <label for="nama_pembicara" class="form-label">Nama Pembicara</label>
                    <input type="text" class="form-control" id="nama_pembicara" aria-describedby="nama_pembicara">
                    </div>
                    <div class="mb-3">
                    <label for="asal_intansi" class="form-label">Asal Instansi</label>
                    <input type="text" class="form-control" id="asal_intansi" aria-describedby="asal_intansi">
                    </div>
                    <div class="mb-3">
                    <label for="topik_pembicara" class="form-label">Topik</label>
                    <input type="text" class="form-control" id="topik_pembicara" aria-describedby="topik_pembicara">
                    </div>
                    <div class="mb-3">
                    <label for="materi_seminar" class="form-label">File Materi</label>
                    <input type="file" class="form-control" id="materi_seminar" aria-describedby="materi_seminar">
                    </div>
                    <div id="form-tambahan"></div>
                    <div align="right" style="padding-bottom: 10px;">
                    <a class="btn btn-light" style="border-radius: 20px; border: 1px solid green;" onclick="tambahForm()">
                        <span class="fa fa-plus"></span>
                        <strong> + Tambah Pembicara </strong>
                    </a>
                    </div>
                </div>
                </div>
                </form> -->
            </div>
        </section>
    </main><!-- End #main -->

    @endsection