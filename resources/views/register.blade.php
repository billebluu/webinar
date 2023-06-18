@extends('layouts.aplikasi')
@section('content')
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Let's Get Your Experiences<br />
            <span class="text-primary">In SEMINARKU</span>
          </h1>
          
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="/register" method= "POST">
                
        @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="nama_user">Nama Lengkap</label>
                      <input type="text" id="nama_user" class="form-control" name="nama_user" value="{{old('nama_user')}}" required />
                      
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="asal_instansi">Asal Instansi</label>
                      <input type="text" id="asal_instansi" class="form-control" name="asal_instansi" value="{{old('asal_instansi')}}" required/>
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="email_user">Email</label>
                      <input type="email" id="email_user" class="form-control" name ="email_user" required value="{{old('email_user')}}" required />
                      
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="no_telp">No Telpon</label>
                      <input type="text" id="no_telp" class="form-control" name="no_telp" value="{{old('no_telp')}}"  required/>
                      
                    </div>
                  </div>
                </div>


                
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" class="form-control" name="password" required />
                 
                </div>

                
                
                <div>
                <button type="submit" class="btn btn-primary btn-block mb-4" style="width:100%;" >
                  Sign up
                </button>
                </div>
                

                <!-- Register buttons -->
                <div class="text-center">
                  <p>If you Have Account <a href="/login">Sign In</a> Here</p>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection



