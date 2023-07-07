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
            <li>Pembicara</li>
            </ol>
            <h2>Pembicara</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section id="inner-page">
            <div class="container">
                <div class="mt-4 p-4">
                <h3 class="" style="color:#37517e;">Pembicara Seminar</h3>
                <div class="d-flex justify-content-between">
                    <div></div> <!-- Bagian kiri, kosongkan atau isi dengan elemen lain jika diperlukan -->
                    <div class="ml-auto">
                        <a href="{{ url('/pic-seminar/create-pembicara/'.request()->segment(3)) }}" style="color:black; text-decoration:underline;">
                            <button class="btn btn-primary my-1 mx-1" style="border-radius: 5px;">
                                <strong>+ Tambah Pembicara</strong>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-start table-primary">
                                <th>No.</th>
                                <th>Nama Pembicara</th>
                                <th>Asal Instansi</th>
                                <th>Topik Pembicara</th>
                                <th class="text-center">Materi Seminar</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp

                            @forelse($pembicaras as $pembicara)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pembicara->nama_pembicara }}</td>
                                    <td>{{ $pembicara->asal_instansi }}</td>
                                    <td>{{ $pembicara->topik_pembicara }}</td>
                                    @php
                                        $fileName = basename($pembicara->materi_seminar);
                                    @endphp
                                    <td class="text-center">
                                        <a href="{{ Storage::url('materi/'.$fileName) }}" target="_blank" style="color:black; text-decoration:underline;"><button class="btn btn-outline-dark my-1 mx-1" style="border-radius: 20px;">Lihat Materi</button></a>
                                        <a href="{{ url('/pic-seminar/upload-ulang-materi/'.$pembicara->id) }}" style="color:black; text-decoration:underline;"><button class="btn btn-outline-dark my-1 mx-1" style="border-radius: 20px;">Upload Ulang Materi</button></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/pic-seminar/edit-pembicara/'.$pembicara->id) }}" style="color:black; text-decoration:underline;"><button class="btn btn-outline-dark my-1 mx-1" style="border-radius: 20px;">Edit</button></a>
                                        <form action="{{ route('pembicara.delete', $pembicara->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-dark mx-1 my-1" style="border-radius:20px;" onclick="return confirm('Apakah Anda yakin ingin menghapus data pembicara ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @endsection