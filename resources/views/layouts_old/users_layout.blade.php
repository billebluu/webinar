<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daftar Buku Perpustakaan MCU</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel="icon" type="image/ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="header">
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgb(244, 172, 78);" data-bs-theme="danger">
          <div class="container text-center">
            <div class="row justify-content-start">
              <div class="col-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="100" class="d-inline-block align-text-top">
              </div>
              <div class="col-8" width="100%">
                <br>
                <h5 align="left"><b>Webinar Sistem</b> </h5>
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
                    <a class="nav-link active" href="{{url('books')}}" style="color: rgb(0, 0, 0);">Daftar User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('form')}}" style="color: rgb(0, 0, 0);">Daftar Event</a>
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

    <div class="container">
        @yield('content')

    </div>
    
</body>
</html>