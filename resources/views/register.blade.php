@extends('layouts-admin.main-login')
@section('title','Register User SeminarKu')

    
@section('container')
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Let's Get Your Experiences<br />
            <span class="text-primary">In SeminarKu</span>
          </h1>
          
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="{{ route('register') }}" method="POST">
                
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="form-outline mb-4">
                        <label class="form-label" for="nama_user">{{ __('Nama Lengkap') }}</label>
                      <input type="text" id="nama_user" class="form-control @error('nama_user') is-invalid @enderror" name="nama_user" required value="{{old('nama_user')}}"  />
                      @error('nama_user')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email_user">{{ __('Email Address') }}</label>
                      <input type="email" id="email_user" class="form-control @error('email_user') is-invalid @enderror" name ="email_user" required value="{{old('email_user')}}"  />
                      @error('email_user')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="asal_instansi">{{ __('Asal Instansi') }}</label>
                      <input type="text " id="asal_instansi" class="form-control @error('asal_instansi') is-invalid @enderror" name ="asal_instansi" required value="{{old('asal_instansi')}}"  />
                      @error('asal_instansi')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="no_telp">{{ __('Nomor Telepon') }}</label>
                      <input type="text" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" name ="no_telp" required value="{{old('no_telp')}}"  />
                      @error('no_telp')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required />
                  @error('password')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                </div>

                <div class="form-outline mb-4">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>   

                
                
                <div>
                <button type="submit" class="btn btn-primary btn-block mb-4" style="width:100%;" >
                {{ __('Register') }}
                </button>
                </div>
                

                <!-- Register buttons -->
                <div class="text-center">
                  <p>If you Have Account <a href="{{ route('login') }}">Sign In</a> Here</p>
                  
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