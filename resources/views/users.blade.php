     @extends('layouts.users_layout')
     @section('content')
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
                                    <a class="btn btn-secondary" href="{{url('users/'.$value->id.'/edit')}}">UPDATE</a>                               
                                </td>
                                <td>
                                    <form action="{{ url('users/'.$value->id )}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-secondary" type="submit">DELETE</button>
                                    </form>
                                </td> 
                        </tr>
                            <?php $i++; ?>
                            @endforeach
                    </table>
            </div>
        
          </div>
          
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>  
    <!-- </body>


</html> -->
@endsection
        
       