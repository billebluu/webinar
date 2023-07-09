@extends('layouts-admin.main')
@section('title','Dashboard Admin SeminarKu')

    
    @section('container')

    @if (Session::has('success'))
        <!-- Modal Sukses Diterima -->
        <div class="modal fade" id="validasiAcceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"><b>Event Berhasil Diterima!</b></div>
                </div>
            </div>
        </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#validasiAcceptModal').modal('show');
                
                // Menghapus sesi flash 'success' setelah beberapa saat
                setTimeout(function() {
                    $('#validasiAcceptModal').modal('hide');
                    {{ Session::forget('success') }};
                }, 1000000); // Menutup modal setelah 3 detik (3000 milidetik)
                });

            </script>  
    @endif

    @if (Session::has('success2'))
        <!-- Modal Sukses Ditolak -->
        <div class="modal fade" id="validasiRejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"><b>Event Berhasil Ditolak!</b></div>
                </div>
            </div>
        </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#validasiRejectModal').modal('show');
                
                // Menghapus sesi flash 'success' setelah beberapa saat
                setTimeout(function() {
                    $('#validasiRejectModal').modal('hide');
                    {{ Session::forget('success') }};
                }, 1000000); // Menutup modal setelah 3 detik (3000 milidetik)
                });

            </script>  
    @endif


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="{{ url('event-approval-request')}}">  
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" name="keyword" value="{{ $keyword }}" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

          

            <div class="topbar-divider d-none d-sm-block"></div>
        @auth
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nama_user }}</span>
                    <!-- <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg"> -->
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
                @endauth
                 <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                        Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Seminar Approval Request</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" align="center">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Seminar</th>
                        <th>Poster</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th colspan="2">Manajemen</th>
                    </tr>
                </thead>
                <tfoot align="center">
                    <tr align="center">
                        <th>No</th>
                        <th>Nama Seminar</th>
                        <th>Poster</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th colspan="2">Manajemen</th>
                    </tr>
                </tfoot>
                <tbody align="center">
                    <tr>
                    <?php $i = 0;?>
                    @foreach($seminar as $key=>$value)
                        <td>{{ $seminar->firstItem() + $i }}</td>
                        <td>{{ $value->nama_seminar }}</td>
                        @php
                            $fileName = basename($value->poster);
                        @endphp
                        <td><img src="{{  Storage::url('poster/' . $fileName) }}" width="90%" align="center" alt="poster_seminar"></td>
                        <td>{{ $value->tanggal_seminar }}</td>
                        <td>{{ $value->status }}</td>
                        <td><a class="btn btn-primary" href="{{ route('admin.more-details', $value->id) }}">DETAILS</a></td>
                        <td>
                            <?php if($value["status"]=='PENDING'):?>
                                    <a class="btn btn-danger" data-toggle="modal" href="#"  data-target="#validasiModal<?= $value["id"]; ?>">VALIDASI</a> 
                            <?php endif ?>
                        </td>
                        
                        <!-- Validasi Modal-->
                        <div class="modal fade" id="validasiModal<?= $value["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yakin untuk validasi?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Tekan tombol di bawah ini untuk melakukan validasi.</div>
                                        <div class="modal-footer">
                                        <form action="{{ route('approve', $value->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">ACCEPT</button>
                                        </form>                                            
                                        <form action="{{ route('reject', $value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">REJECT</button>
                                            </form>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </tr>
                        <?php $i++; ?>
                        @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            <div>
                Showing
                {{ $seminar->firstItem() }}
                to
                {{ $seminar->lastItem() }}
                of
                {{ $seminar->total() }}
                entries
            </div>
            <div class="float-right">
            {{ $seminar->links() }}
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



@endsection