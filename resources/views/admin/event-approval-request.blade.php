@extends('layouts-admin.main')
@section('title','Dashboard Admin SeminarKu')

    
    @section('container')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Seminar Approval Request</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<!-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Seminar</th>
                        <th>Poster</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Manajemen</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Seminar</th>
                        <th>Poster</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Manajemen</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                    <?php $i = 1;?>
                    @foreach($seminar as $key=>$value)
                        <td>{{ $i }}</td>
                        <td>{{ $value->nama_seminar }}</td>
                        <td>{{ $value->poster }}</td>
                        <td>{{ $value->tanggal_seminar }}</td>
                        <td>{{ $value->status }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.more-details', $value->id) }}">DETAILS</a>
                            <a class="btn btn-danger" href="{{url('admin-edit-user/'.$value->id.'/edit')}}">VALIDASI</a>
                        </td>
                    </tr>
                        <?php $i++; ?>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection