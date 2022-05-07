@extends('agen/layouts/main')
@section('agen/index')

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{ $title }} {{ auth()->user()->nama }}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                        <i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="/agen/dashboard">Home</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }} {{ auth()->user()->nama }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <div class="card">
                        <div class="card-body no-padding height-9">
                            <div class="row">
                                <img src="{{ asset('storage/'. Auth::guard('agen')->user()->photo_profil) }}" class="img-responsive" alt="Photo Profil {{ auth()->user()->nama }}">
                            </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{ auth()->user()->nama }} </div>
                                <div class="profile-usertitle-job"> {{ auth()->user()->kode }} </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <header>About Me</header>
                        </div>
                        <div class="card-body no-padding height-9">
                            <div class="profile-desc">
                                {{ auth()->user()->alamat }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Form Biodata</header>
								</div>
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ auth()->user()->nama }}" readonly>
											<label class="mdl-textfield__label" for="text4">Nama</label>
										</div>
									</div>
                                    <div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="Sales" readonly>
											<label class="mdl-textfield__label" for="text4">Sebagai</label>
										</div>
									</div>
                                    <div class="col-lg-3 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ auth()->user()->kontak }}" readonly>
											<label class="mdl-textfield__label" for="text4">Kontak</label>
										</div>
									</div>
                                    <div class="col-lg-3 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ \Carbon\Carbon::parse(auth()->user()->tanggal_lahir)->diffInYears() }} Tahun" readonly>
											<label class="mdl-textfield__label" for="text4">Usia</label>
										</div>
									</div>
                                    <div class="col-lg-3 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ ucwords(auth()->user()->jenis_kelamin) }}" readonly>
											<label class="mdl-textfield__label" for="text4">Jenis Kelamin</label>
										</div>
									</div>
                                    <div class="col-lg-3 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ auth()->user()->mulai_bekerja }}" readonly>
											<label class="mdl-textfield__label" for="text4">Mulai Bekerja</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <!-- Kartu Identitas -->
                    <div class="card">
                        <div class="card-head">
                            <header>Kartu Identitas {{ auth()->user()->nama }}</header>
                        </div>
                        <div class="card-body no-padding height-9">
                            <div class="profile-desc">
                                <img src="{{ asset('storage/'.Auth::guard('agen')->user()->photo_ktp) }}" class="img-responsive" alt="Photo Profil {{ auth()->user()->nama }}">
                            </div>
                        </div>
                    </div>
                    <!-- End Kartu Identitas -->
                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
    </div>
    <!-- end page content -->
</div>
<!-- end page container -->

@endsection