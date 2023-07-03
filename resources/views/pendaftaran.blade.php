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
                    <h3 class="text-center card-header">Pendaftaran Seminar</h3>
                    <form action="{{ url('submitpendaftaran') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-text grid-item p-4">
                        <div class="mb-3">
                                <label form="no_identitas" class="form-label">No Identitas(NIK)</label>
                                <input type="text" name="no_identitas" class="form-control" id="no_identitas" aria-describedby="no_identitas" required>
                            </div>
                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" id="bukti_pembayaran" aria-describedby="bukti_pembayaran" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_pembayaran" class="form-label">Tanggal Pembayaran</label>
                                <input type="date" name="tgl_pembayaran" class="form-control" id="tgl_pembayaran" aria-describedby="tgl_pembayaran" required>
                            </div>
                            <div class="mb-3">
                                <label for="sumber_info" class="form-label">Sumber Informasi Tau dari mana ??? anjaay</label>
                                <input type="text" name="sumber_info" class="form-control" id="sumber_info" aria-describedby="sumber_info" required>
                            </div>
                            <div class="mb-3">
                                <label for="status_peserta" class="form-label">Status Peserta</label>
                                <input type="text" name="status_peserta" class="form-control" id="status_peserta" aria-describedby="status_peserta" required>
                            </div>
                            
                            <!-- <a href="{{ url('/submitpendaftaran') }}"><button class="btn btn-primary mx-2" type="button" value="Lihat Peserta">submit</button></a> -->
                        
                         <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection