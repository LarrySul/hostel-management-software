@extends('layouts.admin.master')
@include('layouts.admin.header')
@include('layouts.admin.aside')
@section('content')
<div class="content-wrapper">
	<section class="content">
		<div class="row"> 
			<div class="box-body table-responsive no-padding">
				<h2 class="text-success" style=" margin: 10px"> View Allocated Hostels</h2>
				<table class="table table-hover">

					<tr>
						<th>ID</th>
						<th>Full names</th>
						<th>Hostel Name</th>
						<th>Date and Time of Allocation</th>
					</tr>
					@foreach ($bookings as $key => $data)
					<tr>
						<td>{{$key + 1}}</td>
						<td>{{$data->student}}</td>
						<td>{{$data->hostel}}</td>
						<td>{{$data->created_at}}</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</section>
</div>
@endsection
