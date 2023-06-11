@extends('layouts.create_layout')
     @section('create')

    <br><br><br><br><br><br>

    <h1 style="margin-left:50px; margin-right:50px;">Form Tambah User<br></h1>
    <br>
    <form class="row g-3" action="{{ url('users')}}" method="post" enctype="multipart/form-data" style="margin-left:50px; margin-right:50px;">
    @csrf
        <div class="col-md-5">
            <label for="nama_user" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_user" name="nama_user" required>
        </div>
        <div class="col-md-5">
            <label for="email_user" class="form-label">Email</label>
            <input type="text" class="form-control" id="email_user" name="email_user" required>
        </div>
        <div class="col-md-5">
            <label for="asal_instansi" class="form-label">Asal Instansi</label>
            <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" required>
        </div>
        <div class="col-md-5">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
        </div>
        <div class="col-12">
          <br>
          <button class="btn btn-warning" type="submit" name="submit">Submit</button>
        </div>
      </form>
        
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/65ec807597.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>        
    @endsection  
    <!-- </body>

</html> -->