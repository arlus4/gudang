@extends('admin/layouts/main')
@section('admin/index')

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{ $title }}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                        <i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="/admin/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Semua {{ $title }}</header>
								</div>
								<div class="card-body row">
                                    {{--  --}}
								</div>
							</div>
						</div>
					</div>
                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
    </div>
    <!-- end page content -->
</div>
<!-- end page container -->

@endsection