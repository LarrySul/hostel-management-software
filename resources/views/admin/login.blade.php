@extends('layouts.admin.master')

@section('content')
<body class="hold-transition lockscreen" style="background-color: #b8c7ce">
	<div class="lockscreen-wrapper">
		<div class="lockscreen-logo">
			<a href="#"><b>Tasued</b>HOSTEL</a>
		</div>
		<div class="lockscreen-name" style="text-align: center;">Administrator Login</div>

		<div class="lockscreen-item">
			<div class="lockscreen-image">
				<img src="img/user1-128x128.jpg" alt="User Image">
			</div>
			<form class="lockscreen-credentials" action="/say" method="post">
				{{csrf_field()}}
				<div class="input-group">
					<input type="text" name="admin" class="form-control" placeholder="username" required>
					<div class="input-group-btn">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class="lockscreen-footer text-center">
			Copyright &copy; 2018 <b><a href="#" class="text-danger"> &nbsp; Olabisi Nosirah</a></b><br>
		</div>
		<div class="col-md-12">
			@if(count($errors)>0)
			<ul>
				@foreach($errors->all() as $error)
				<li class="alert close " data-dismiss="alert" aria-label="Close" style="color: red;list-style: none">{{$error}}</li>
				@endforeach
			</ul>
			@endif
		</div>
	</div>
</body>
@endsection
