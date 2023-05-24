<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>EWW-Portal</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
		<meta content="Coderthemes" name="author" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
	</head>

	<body>
		<div id="wrapper">
		@include('admin.layouts.header')
		@include('admin.layouts.sidebar')
			<div class="content-page">
				<div class="content">
				<div class="container-fluid">
					@yield('content')
				</div>
					@include('admin.layouts.footer')    
				</div>
			</div>
		</div>
        @yield('footer_script')
	</body>
</html>
