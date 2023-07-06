@extends('layouts.main-ip')
@section('title','SeminarKu')
    
    @section('container')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
            <li><a href="{{url('dashboard')}}">Dashboard</a></li>        
			<li>Seminar</li>
            </ol>
            <h2>Seminar</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">
        <div class="container">
            
            <div class="row">
                <div class="col-md-6 mt-2">
                    <a href="#">
                        <div class="p-cb cb-text cb-active" style="padding: 10px 20px; border-radius:10px; background-image: linear-gradient(to right, rgb(1, 169, 172), rgb(1, 219, 223)); border: 0px; color: white;">
                            <div style="font-size: 40px;" class="cb-title mt-2">{{ $rekap_seminar }}</div>
                            <div class="cb-content mt-3">
                                <p style="color: white;">Rekap seminar yang dipublikasikan</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mt-2">
                    <a href="#">
                        <div class="p-cb cb-text cb-active" style="padding: 10px 20px; border-radius:10px; background-image: linear-gradient(to right, rgb(13, 110, 253), rgb(13, 170, 253)); color: white; border: 0px;">
                            <div style="font-size: 40px;" class=" cb-title mt-2">{{ $rekap_peserta }}</div>
                            <div class="cb-content mt-3">
                                <p style="color: white;">Rekap peserta yang mendaftar di semua seminar</p>
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
                            <div class="mb-4">
                                <h4>Daftar Seminar</h4>
                            </div>
                            <div class="mb-4 d-flex flex-row">
                                <form method="POST" name="form1" action="{{ url('pic-seminar/search') }}">
                                    @csrf
                                    <div class="input-group">
                                        <input name="keyword" type="text" value="" class="form-control" aria-describedby="basic-addon2" style="width: 270px;" placeholder="Kata Kunci">
                                        <div class="input-group-append">
                                            <input type="submit" style="background-color: #e7e7e7;" class="input-group-text btn-info" value="Cari" id="basic-addon2">
                                        </div>
                                    </div>
                                </form>
                                <div align="right">
                                    <a href="{{ url('/pic-seminar/create-seminar') }}" class="btn btn-primary ms-3" style="border-radius: 5px; border: 1px solid;">
                                        <strong> + Buat Seminar </strong>
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">

                                    <thead>
                                        <tr class="text-start">
                                            <th>Judul Seminar</th>
                                            <th class="text-center">Tanggal Pelaksanaan</th>
                                            <th class="text-center">Nama Pembicara</th>
                                            <th class="text-center">Jumlah Peserta</th>
                                            <th class="text-center">Status Validasi</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($seminars as $seminar)
                                            <tr>
                                                <td>{{ $seminar->nama_seminar }}</td>
                                                <td class="text-center">{{ $seminar->tanggal_seminar }}</td>
                                                <td class="text-start">
                                                    <ol>
                                                        @foreach ($seminar->pembicara as $pembicara)
                                                            <li>{{ $pembicara->nama_pembicara }}</li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                                <td class="text-center">{{ $seminar->jumlah_peserta }}</td>
                                                @if ($seminar->status === 'pending')
                                                <td class="text-center">Mohon menunggu validasi</td>
                                                @elseif ($seminar->status === '' || $seminar->status === 'null')
                                                <td class="text-center">-</td>
                                                @elseif ($seminar->status === 'accepted')
                                                <td class="text-center" style="color: green;">Seminar Anda diterima <br> & dipublikasikan</td>
                                                @else ($seminar->status === 'rejected')
                                                <td class="text-center" style="color: red;">Seminar Anda ditolak</td>
                                                @endif
                                                <td class="text-center">
                                                <a href="{{ url('pic-seminar/view-peserta-seminar/'.$seminar->id) }}"><button class="btn btn-outline-dark mx-1 my-1" style="border-radius:20px" type="button" value="Peserta">Peserta</button></a>
                                                @if ($seminar->sertifikat !== null && $seminar->setup_tgl_unduh !== null)
                                                        <a href="{{ url('/pic-seminar/view-sertifikat/'.$seminar->id) }}">
                                                            <button class="btn btn-outline-dark mx-1 my-1" style="border-radius:20px" type="button" value="Sertifikat">Sertifikat</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ url('/pic-seminar/create-sertifikat/'.$seminar->id) }}">
                                                            <button class="btn btn-outline-dark mx-1 my-1" style="border-radius:20px" type="button" value="Sertifikat">Sertifikat</button>
                                                        </a>
                                                @endif
                                                <a href="{{ url('/pic-seminar/create-pembicara/'.$seminar->id) }}">
                                                    <button class="btn btn-outline-dark mx-1 my-1" style="border-radius:20px" type="button" value="Sertifikat">+ Pembicara</button>
                                                </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- end: grid layout -->
        </section>

    </main><!-- End #main -->

    @endsection
