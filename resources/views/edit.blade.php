<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Data Buku Perpustakaan MCU</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap" rel="stylesheet">
        <link rel="icon" type="image/ico" >
        <link rel="stylesheet" href="./fontawesome-free-6.2.1-web/css/all.css">
    </head>
  <body style="background-color: antiquewhite;">
    <div class="header">
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgb(244, 172, 78);" data-bs-theme="danger">
          <div class="container text-center">
            <div class="row justify-content-start">
              <div class="col-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="100" class="d-inline-block align-text-top">
              </div>
              <div class="col-8" width="100%">
                <br>
                <h5 align="left"><b>Perpustakaan MCU</b> </h5>
                <p align="left"> Jalan Asgard No. 1, New York</p>
              </div>
            </div>
          </div>
          <div class="container-fluid">
              <button class="navbar-toggler" type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-tabs me-auto mb-2 mb-lg-0">
                <li class="nav-item" style="background-color: rgb(244, 172, 78);">
                    <a class="nav-link" aria-current="page" href="{{url('home')}}" style="color: rgb(0, 0, 0);">Home</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="profil.php" style="color: rgb(0, 0, 0);">Profil</a>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link active" href="{{url('home/table')}}" style="color: rgb(0, 0, 0);">Daftar Buku</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('home/form')}}" style="color: rgb(0, 0, 0);">Peminjaman Buku</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="denda.php" style="color: rgb(0, 0, 0);">Perhitungan Denda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: rgb(0, 0, 0);">Logout</a>
                  </li> -->
                </ul>
              </div>
            </div>
          </nav>
    </div>

    <br><br><br><br><br><br>

    <h1 style="margin-left:50px; margin-right:50px;">Edit User<br></h1>
    <br>
    <form class="row g-3" action="{{ url('users/'.$model->id)}}" method="post" enctype="multipart/form-data" style="margin-left:50px; margin-right:50px;">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
        <div class="col-md-5">
            <label for="nama_user" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_user" name="nama_user" value="{{ $model->nama_user }}">
        </div>
        <div class="col-md-5">
            <label for="email_user" class="form-label">Email</label>
            <input type="text" class="form-control" id="email_user" name="email_user" value="{{ $model->email_user }}">
        </div>
        <div class="col-md-5">
            <label for="asal_instansi" class="form-label">Asal Instansi</label>
            <input type="text" class="form-control" id="asal_instansi" name="asal_instansi" value="{{ $model->asal_instansi }}">
        </div>
        <div class="col-md-5">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $model->no_telp }}">
        </div>
        <div class="col-12">
          <br>
          <button class="btn btn-warning" type="submit" name="submit">Simpan</button>
        </div>
      </form>
        
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/65ec807597.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>        
      </body>
</html>