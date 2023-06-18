@extends('layouts.aplikasi')
@section('content')

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <h2>Login To Your Account</h2>
                <br>
              <form method="post" action="/login">
                @csrf
                <div class="form-outline mb-4">
                    <label class="form-label" for="email_user">Email address</label>
                  <input type="email" id="email_user" class="form-control form-control-lg" name="email_user" required />
                </div>
      
                
                <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" class="form-control form-control-lg" name="password" required />
                 
                </div>

                <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" style="width:100%;">Sign in</button>
                </div>
                
                <br>
                <div class="text-center">
                    <p>If you Doesn't Have an Account <a href="/register">Sign Up !</a></p>
                    
                  </div>
      
              </form>
            </div>
          </div>
        </div>
      </section>
@endsection 