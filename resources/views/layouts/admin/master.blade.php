<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bisi Admin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet"  href="{{asset('admin/css/font-awesome.min.css')}}">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	Ionicons
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
	<!-- Theme style -->
	<link rel="stylesheet"  href="{{asset('admin/css/AdminLTE.min.css')}}">
  	<!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="{{asset('admin/css/skins/_all-skins.min.css')}}">
  	<!-- iCheck -->
  	<link rel="stylesheet" href="{{asset('admin/css/blue.css')}}">
  
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
  	<div id="app">
  		<div>@yield('content')</div>
  	</div>
  	<script src="{{ asset('admin/js/jquery-2.2.3.min.js') }}"></script>
  	<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
  	<script src="{{ asset('admin/js/fastclick.js') }}"></script>
  	<script src="{{ asset('admin/js/app.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo.js') }}"></script>
  </body>
  </html>
