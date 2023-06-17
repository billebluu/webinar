@extends('layouts.main2')
@section('title','SeminarKu')

    
    @section('container')
    <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Pengguna</a></li>
          <li>Profile</li>
        </ol>
        <!-- <h2>Inner Page</h2> -->

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
        <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<div>
							<h4>Profile Saya  <a href="{{'edit'}}"><i class="bi bi-pencil"></i></a></h4>
						</div>
						<div style="padding-top: 20px">
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
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="row mt-3">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<div>
							<h4>Acara yang saya ikuti<a title="Edit Profile" style="color: green; margin-left: 15px" href="https://temumaya.id/peserta/edit_profile"><span class="fa fa-pencil-alt"></span></a></h4>
						</div>
						 <div style="padding-top: 20px">
							<table class="table">
								<!--<tbody><tr>
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
								</tr> -->
							</tbody></table>
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
    @endsection