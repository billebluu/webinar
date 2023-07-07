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
            <li>Sertifikat</li>
            </ol>
            <h2>Sertifikat</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">   
            <div class="container" style="background-color: #f3f5fa; border-radius: 50px;">
                <div style="display: flex; flex-direction:column; justify-content: center; align-items: center; min-height:50vh;">
                    <img src="{{ asset('img/sertif-uploaded.png') }}" width="10%" />
                    <p class="text-center mt-4" style="font-size:22px;"><strong> Template sertifikat peserta seminar sudah diupload! </strong></p>
                </div>
            </div>
            <!-- <div class="container" style="display: flex; flex-direction: row;"> -->
                <div class="container mt-5" style="background-color: #f3f5fa; border-radius: 50px;">
                    <div class="p-5">
                        @foreach($seminar as $seminar)
                        @php
                            $fileName = basename($seminar->sertifikat);
                        @endphp
                        <p>Tanggal pengiriman sertifikat : {{$seminar->setup_tgl_unduh}}</p>
                        <p>Template Sertifikat :</p>
                        <img src="{{ Storage::url('sertifikat/' . $fileName) }}" width="40%" alt="Sertifikat" />
                    @endforeach
                    </div>
                </div>
                <!-- <div class="container mt-5" style="background-color: #f3f5fa; border-radius: 50px;">
                    <div class="p-5">
                    
                    </div>
                </div>
            </div> -->
        </section>
    </main><!-- End #main -->

    @endsection