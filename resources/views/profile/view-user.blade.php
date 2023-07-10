@extends('layouts.main-ip')
@section('title','SeminarKu')

    
    @section('container')
    <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
			<li><a href="{{url('dashboard')}}">Dashboard</a></li>        
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
						<h4>Profile Saya <a href="{{ route('profile.edit-user', ['id' => Auth::user()->id]) }}"><i class="bi bi-pencil" style="color:blue"></i></a></h4>
						@if(session('success'))
						<script>
						window.onload = function() {
							alert('{{ session('success') }}');
						};
						</script>
						@endif
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
										<h5>{{  $user->email_user}}</h5>
									</td>
								</tr>
								<tr class="my-tr">
									<td class="my-td">Nomor Telepon</td>
									<td class="my-td">:</td>
									<td class="my-td">
										<h5>{{$user->no_telp}}</h5>

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
					<div class="card-body  ">
						<div>
							<h4>Acara yang saya ikuti<a title="Edit Profile" style="color: green; margin-left: 15px" href="https://temumaya.id/peserta/edit_profile"><span class="fa fa-pencil-alt"></span></a></h4>
						</div>
						 <div style="padding-top: 20px">
						 
						 @foreach ($acara as $a)
						
				
								<div class="card my-3">
								<div class="card-body">
								<div>
									<div class="d-flex justify-content-between">
									<h5><a href="{{ route('dashboard.details-seminar', $a->id_pic_seminar) }}" style="color: black; text-decoration: none;" onmouseover="this.style.color='blue'; this.style.fontWeight='bold';" onmouseout="this.style.color='black'; this.style.fontWeight='normal';">{{ $a->picSeminar->nama_seminar }}</a></h5>

									
										
									<div>
										@if (now()->gte($a->picSeminar->setup_tgl_unduh))
                                        <a href="{{ route('unduh-sertifikat', ['id_pic_seminar' => $a->picSeminar->id]) }}" class="btn btn-primary">Unduh Sertifikat</a>
                                        @else
                                        <span class="text-muted">Belum tersedia</span>
                                        @endif

									</div>

										   
									</div>
                                     <br>
							
									<div >
										@foreach ($a->picSeminar->pembicara as $pembicara)
											<div class="d-flex justify-content-between">
												<h6>{{ $pembicara->nama_pembicara }}</h6>
												@if ($pembicara->materi_seminar)
													<a href="{{ route('unduh-materi', ['id_pembicara' => $pembicara->id]) }}" class="btn btn-primary my-2">Unduh Materi</a>
												@else
													<span class="text-muted">Materi tidak tersedia</span>
												@endif
											</div>
										@endforeach
										</div>
                                    
								</div>
								</div>
								</div>
								
							@endforeach
							<!-- </form> -->
						</div>
					</div>
				</div>
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