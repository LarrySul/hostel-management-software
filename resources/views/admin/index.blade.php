@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.aside')
@section('content')
<div class="content-wrapper">
	<section class="content">
		@if(Session::has('flash_message'))
		<div class="alert alert-danger alert-dismissible col-md-3 pull-right" role="alert" >
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ Session::get('flash_message') }}
		</div>
		@endif
		<div class="row">
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>{{count($student)}}<h3>
						<p>Registered Students</p>
					</div>
					<div class="icon">
						<span class="glyphicon glyphicon-user"></span>
					</div>
					<a href="/admin/views" class="small-box-footer">More info <span class="glyphicon glyphicon-menu-right"></span></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3>{{count($hostel)}}</h3>

						<p>Hostel Uploads</p>
					</div>
					<div class="icon">
						<span class="glyphicon glyphicon-home"></span>
					</div>
					<a href="/admin/upload" class="small-box-footer">More info <span class="glyphicon glyphicon-menu-right"></span></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->

				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>{{count($booking)}}</h3>

						<p>Allocated Hostels</p>
					</div>
					<div class="icon">
						<span class="glyphicon glyphicon-info-sign"></span>
					</div>
					<a href="/admin/allocation" class="small-box-footer">More info <span class="glyphicon glyphicon-menu-right"></span></a>
				</div>
			</div>
		</div>
	</section>
</div>
<style type="text/css">
	.glyphicon-user, .glyphicon-home, .glyphicon-info-sign{
		font-size: 45px;
		margin-top: 20px
	}
	.glyphicon-info-sign:hover, .glyphicon-home:hover, .glyphicon-user:hover{
		font-size: 75px;
		margin-top: 20px
	}
</style>
@endsection
