@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.aside')
@section('content')
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			@if(Session::has('flash_message'))
			<div class="alert alert-success alert-dismissible col-md-3 pull-right" role="alert" >
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{ Session::get('flash_message') }}
			</div>
			@endif
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Available Hostel Section</h3>
					</div>
					<form role="form" method="post" action="/upload" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Name of hostel</label>
								<input type="text" class="form-control" name="name" placeholder="Enter hostel name" maxlength="10">
							</div>
							<div class="form-group">
								<div class="form-group">
									<label>Select Location </label>
									<select class="form-control" name="location">
										<option>Ijagun</option>
										<option>Ijele</option>
										<option>Imaweje</option>
										<option>Ojuri</option>
										<option>Catholic</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Price</label>
								<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
								<div class="input-group">
									<div class="input-group-addon">#</div>
									<input type="text" class="form-control" name="price" placeholder="Amount" maxlength="5">
									<div class="input-group-addon">.00</div>
								</div>
							</div>
							<div class="form-group">
								<label>Brief Description</label>
								<textarea class="form-control" rows="3" placeholder="Enter desc..." name="description" maxlength="50" minlength="50"></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Upload Hostel Image</label>
								<input type="file" name="upload">
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				@if(count($errors)>0)
				<ul>
					@foreach($errors->all() as $error)
					<li class="alert close " data-dismiss="alert" aria-label="Close" style="color: red;list-style: none">{{$error}}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
	</section>
</div>
@endsection
