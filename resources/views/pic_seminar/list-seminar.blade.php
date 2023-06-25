@extends('layouts.main-ip')
@section('title','SeminarKu')
    
    @section('container')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
            <li><a href="{{url('dashboard')}}">Dashboard</a></li>        
			<li>List Seminar</li>
            </ol>
            <h2>List Seminar</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">
        <div class="container">

            <div class="row">
            <div class="col-md-6 mt-2">
                <a href="#">
                <div class="p-cb cb-text cb-active" style="padding: 10px 20px; border-radius:10px; background-image: linear-gradient(to right, rgb(1, 169, 172), rgb(1, 219, 223)); border: 0px; color: white;">
                    <div style="font-size: 40px;" class="cb-title mt-2">0</div>
                    <div class="cb-content mt-3">
                    <p style="color: white;">Rekap peserta dari semua seminar</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-6 mt-2">
                <a href="#">
                <div class="p-cb cb-text cb-active" style="padding: 10px 20px; border-radius:10px; background-image: linear-gradient(to right, rgb(254, 93, 112), rgb(254, 144, 157)); color: white; border: 0px">
                    <div style="font-size: 40px;" class=" cb-title mt-2">0</div>
                    <div class="cb-content mt-3">
                    <p style="color: white;">
                        Rekap peserta yang mendaftar di semua seminar
                    </p>
                    </div>
                </div>
                </a>
            </div>
            </div>

            <div class="row" style="margin: 50px 0px 0px 0px; padding: 0px; border-radius: 10px">
            <hr class="solid"></hr>
            <div class="col-md-12">
                <div class="grid-item">
                <div class="widget border-box p-cb" style="cursor:default;">
                    <div style="padding: 10px 0;">
                        <h4>List Seminar</h4>
                        <div align="right" style="padding-bottom: 10px;">
                            <a href="{{url('pic-seminar/create-seminar')}}" class="btn btn-light" style="border-radius: 20px; border: 1px solid; color:#0d6efd">
                            <span class="fa fa-plus"></span>
                            <strong> + Buat Seminar </strong>
                            </a>
                        </div>
                    </div>
                    <div style="padding-bottom: 10px;">
                        <form method="post" name="form1" action="">
                            <div class="input-group mb-3">
                            <input name="keyword" type="text" value="" class="form-control" aria-describedby="basic-addon2" placeholder="Pencarian " fdprocessedid="kz0w0f">
                            <div class="input-group-append">
                                <input type="submit" style="background-color: #e7e7e7" class="input-group-text btn-info" value="Cari Seminar" id="basic-addon2" fdprocessedid="twmf26">
                            </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead>
                            <tr class="text-start">
                                <th>Judul Seminar</th>
                                <th class="text-center">Tanggal Pelaksanaan</th>
                                <th class="text-center">Peserta</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <!-- <tr>
                                <td colspan="4">Belum ada data.</td>
                            </tr> -->
                            @foreach($seminar as $seminar)
                            <tr>
                                <td>{{ $seminar->nama_seminar }}</td>
                                <td class="text-center">{{ $seminar->tanggal_seminar }}</td>
                                <td class="text-center">0</td>
                                <td class="text-center">
                                <a href="{{url('pic-seminar/view-peserta-seminar')}}"><button class="btn btn-info mx-2" type="button" value="Lihat Peserta">Lihat Peserta</button></a>
                                <a href="{{url('pic-seminar/sertifikat')}}"><button class="btn btn-primary" type="button" value="Lihat Peserta">Sertifikat</button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- end: grid layout -->
        </section>

    </main><!-- End #main -->

    @endsection