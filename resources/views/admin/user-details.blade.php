@extends('layouts-admin.main')
@section('title','Dashboard Admin SeminarKu')

    
    @section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data User</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Manajemen</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Manajemen</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                    <?php $i = 1;?>
                    @foreach($user as $key=>$value)
                        <td>{{ $i }}</td>
                        <td>{{ $value->nama_user }}</td>
                        <td>{{ $value->email_user }}</td>
                        <td>
                            <form action="{{ route('user.destroy', ['user' => $value->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                DELETE
                                </button>
                            </form>                        
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