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
            <div class="container" style="padding: 0 50px;">

                <form action="{{ url('/pic-seminar/store-pembicara') }}" method="POST" enctype="multipart/form-data">
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
                            <!-- <div id="form-tambahan"></div>
                                <div align="right" style="padding-bottom: 10px;">
                                <a class="btn btn-light" style="border-radius: 20px; border: 1px solid green;" onclick="tambahForm()">
                                    <span class="fa fa-plus"></span>
                                    <strong> + Tambah Pembicara </strong>
                                </a>
                            </div> -->
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </main><!-- End #main -->

    <!-- @endsection -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="wizard.js"></script>

    <script>
        // Fungsi untuk menambahkan form tambahan
        var nomor = 2;
        function tambahForm() {
        var formTambahan = document.getElementById('form-tambahan');
        
        // Buat elemen-elemen form tambahan
        var formGroupNama = document.createElement('div');
        formGroupNama.className = 'mb-3 form-group';

        var labelNama = document.createElement('label');
        labelNama.htmlFor = 'nama_pembicara';
        labelNama.className = 'form-label';
        labelNama.textContent = 'Nama Pembicara ke-' + nomor;

        var inputNama = document.createElement('input');
        inputNama.type = 'text';
        inputNama.className = 'form-control';
        inputNama.id = 'nama_pembicara';

        var formGroupAsal = document.createElement('div');
        formGroupAsal.className = 'mb-3 form-group';

        var labelAsal = document.createElement('label');
        labelAsal.htmlFor = 'asal_instansi';
        labelAsal.className = 'form-label';
        labelAsal.textContent = 'Asal Instansi';

        var inputAsal = document.createElement('input');
        inputAsal.type = 'text';
        inputAsal.className = 'form-control';
        inputAsal.id = 'asal_instansi';

        var formGroupTopik = document.createElement('div');
        formGroupTopik.className = 'mb-3 form-group';

        var labelTopik = document.createElement('label');
        labelTopik.htmlFor = 'topik_pembicara';
        labelTopik.className = 'form-label';
        labelTopik.textContent = 'Topik';

        var inputTopik = document.createElement('input');
        inputTopik.type = 'text';
        inputTopik.className = 'form-control';
        inputTopik.id = 'topik_pembicara';

        var formGroupMateri = document.createElement('div');
        formGroupMateri.className = 'mb-3 form-group';

        var labelMateri = document.createElement('label');
        labelMateri.htmlFor = 'materi_seminar';
        labelMateri.className = 'form-label';
        labelMateri.textContent = 'File Materi';

        var inputMateri = document.createElement('input');
        inputMateri.type = 'file';
        inputMateri.className = 'form-control';
        inputMateri.id = 'materi_seminar';

        var garis = document.createElement('hr');

        // Tambahkan elemen-elemen form tambahan ke dalam div form-tambahan
        formGroupNama.appendChild(labelNama);
        formGroupNama.appendChild(inputNama);
        formGroupAsal.appendChild(labelAsal);
        formGroupAsal.appendChild(inputAsal);
        formGroupTopik.appendChild(labelTopik);
        formGroupTopik.appendChild(inputTopik);
        formGroupMateri.appendChild(labelMateri);
        formGroupMateri.appendChild(inputMateri);
        formTambahan.appendChild(garis);
        formTambahan.appendChild(formGroupNama);
        formTambahan.appendChild(formGroupAsal);
        formTambahan.appendChild(formGroupTopik);
        formTambahan.appendChild(formGroupMateri);

        nomor++;
        }
    </script>