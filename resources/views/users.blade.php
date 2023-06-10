<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daftar Buku Perpustakaan MCU</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel="icon" type="image/ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                    <a class="nav-link active" href="{{url('books')}}" style="color: rgb(0, 0, 0);">Daftar Buku</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('form')}}" style="color: rgb(0, 0, 0);">Peminjaman Buku</a>
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

    <div class="main-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('img/lib.jpg') }}" class="d-block w-100" alt="library-image1">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/lib3.jpg') }}" class="d-block w-100" alt="library-image2">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/lib4.jpg') }}" class="d-block w-100" alt="library-image3">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/lib5.jpg') }}" class="d-block w-100" alt="library-image4">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/lib6.jpg') }}" class="d-block w-100" alt="library-image5">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

    <div class="notice-section">
        <div class="container">
            <h1>Daftar User</h1><br><br>
            <button style="background-color: rgb(244, 172, 78); border-radius: 7px; border-color: rgb(244, 172, 78);" type="button" onclick="window.location.href='{{url('users/create')}}'" style="color: rgb(0, 0, 0);">TAMBAH USULAN BUKU</button>
            <br><br>
            <form action="" method="post" class="d-flex" role="search">
                <input class="form-control me-2" type="text" name="keyword" size="20" autofocus autocomplete="off" placeholder="Masukkan Keyword" aria-label="Search">
                <button style="background-color: rgb(244, 172, 78); border-radius: 7px; border-color: rgb(244, 172, 78);" type="submit" name="search">Search</button>
            </form>
            <br>
            <div class="card">
                <div class="card-body" style="background-color: rgb(244, 172, 78); border-radius: 7px;">
                  <blockquote class="blockquote mb-0">
                    <table class="table table-bordered">
                        <tr align="center">
                            <td><b>No.</td>
                            <td><b>Nama</td>
                            <td><b>Email</td>
                            <td><b>Asal Instansi</td>
                            <td><b>Nomor Telepon</td>
                            <td><b>Manajemen</td>

                        </tr>
                        <tr align="center">
                            <?php $i = 1;?>
                            @foreach($datas as $key=>$value)
                                <td align="center">{{ $i }}</td>
                                <td align="center">{{ $value->nama_user }}</td>
                                <td align="center">{{ $value->email_user }}</td>
                                <td align="center">{{ $value->asal_instansi }}</td>
                                <td align="center">{{ $value->no_telp }}</td>
                                <td>
                                    <a href="{{url('users/update')}}">UPDATE</a>
                                    <a href="{{url('users/delete')}}">DELETE</a>
                                </td>
                        </tr>
                            <?php $i++; ?>
                            @endforeach
                    </table>
            </div>
        
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>  
    </body>


</html>
        
       