@extends('layouts.main-ip')
@section('title','SeminarKu')

    
    @section('container')
    <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('users')}}">Dashboard</a></li>
          <li><a href="{{url('profile')}}">Profile</a></li>
          <li>Edit Profile</li>
        </ol>
        <!-- <h2>Inner Page</h2> -->

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
        <div>
			<div>
			<h4>Edit Profile Saya</h4>
			</div>
			<div style="padding-top: 20px">
				<form action="{{ route('profile.update', $user->id) }}" method="post" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
				<div class="form-group mt-3">
					<label for="nama_user">Nama Lengkap</label>
					<input type="text" name="nama_user" class="form-control " value="{{ $user->nama_user }}" id="nama_user">
					<div class="invalid-feedback"></div>
				</div>
                <div class="form-group mt-3">
					<label for="email_user">Email</label>
					<input type="email" name="email_user" class="form-control " value="{{ $user->email_user }}" id="email_user">
					<div class="invalid-feedback"></div>
				</div>
                <div class="form-group mt-3">
					<label for="no_telp">Nomor Telepon</label>
					<input type="text" name="no_telp" class="form-control " value="{{ $user->no_telp }}" id=" no_telp">
					<div class="invalid-feedback"></div>
				</div>
                <div class="form-group mt-3">
					<label for="asal_instansi">Asal Instansi</label>
					<input type="text" name="asal_instansi" class="form-control " value="{{ $user->asal_instansi }}" id="asal_instansi">
					<div class="invalid-feedback"></div>
				</div>
				<div class="form-group mt-5">
					<a href="{{url('profile')}}" class="btn btn-danger">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
                    
            </form>
            @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                     @endif
				</div>
						<!--End: Modal Box-->
				</div>
                

        <!-- <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<div>
							<h4>Profile Saya</h4>
						</div>
						<div style="padding-top: 20px">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
							<table class="table">
								<tbody><tr>
									<td class="my-td" style="width: 150px;">Nama Lengkap</td>
									<td class="my-td">:</td>
									<td class="my-td">
										<h5>{{ $user->nama_user }}</h5>
									</td>
								</tr>

								<tr class="my-tr">
									<td class="my-td">Email</td>
									<td class="my-td">:</td>
									<td class="my-td">
										<h5>{{ $user->email_user }}</h5>
									</td>
								</tr>
								<tr class="my-tr">
									<td class="my-td">Nomor Telepon</td>
									<td class="my-td">:</td>
									<td class="my-td">
										<h5>{{ $user->no_telp }}</h5>

									</td>
								</tr>

								<tr class="my-tr">
									<td class="my-td">Asal Instansi</td>
									<td class="my-td">:</td>
									<td class="my-td">
                                        <h5>{{ $user->asal_instansi }}</h5>

									</td>
								</tr>
							</tbody></table>
							 </form> 
						</div>
					</div>
				</div>
			</div>
		</div> -->
        
        </p>
      </div>
    </section>

  </main><!-- End #main -->
    @endsection