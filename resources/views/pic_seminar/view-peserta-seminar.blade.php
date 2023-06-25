@extends('layouts.main-ip')
@section('title','SeminarKu')
    
    @section('container')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('dashboard')}}">Dashboard</a></li>
          <li><a href="{{url('pic-seminar')}}">List Seminar  </a></li>
          <li>Lihat Peserta</li>
        </ol>
        <h2>Lihat Peserta</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="inner-page">
      <div class="container">
        <h3 class="m-2" style="color:#37517e;">Informasi Seminar</h3>
        <table class="m-2">
            <tr>
                <td style="padding-right:50px;">Judul</td>
                <td>: PINGFEST</th>
            </tr>
            <tr>
                <td style="padding-right:50px;">Deskripsi</td>
                <td>: Acara tahunan</td>
            </tr>
            <tr>
                <td style="padding-right:50px;">Tanggal Pelaksanaan</td>
                <td>: 23/06/2023</td>
            </tr>
        </table>

        <hr class="solid">
        <h3 class="ms-2 mt-5" style="color:#37517e;">Peserta Seminar</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="sticky-top">
                    <tr class="text-start">
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Nomor Identitas</th>
                        <th>Nomor Telepon</th>
                        <th>Asal Instansi</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- <tr>
                        <td colspan="4">Belum ada data.</td>
                    </tr> -->
                    <tr>
                        <td>1</td>
                        <td>Jisoo</td>
                        <td>M0521001</td>
                        <td>081234567899</td>
                        <td>Universitas Sebelas Maret</td>
                        <td>Peserta<a href=""><i class="ps-2 bi bi-pencil"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
      <!-- end: grid layout -->
    </section>

  </main><!-- End #main -->

  @endsection