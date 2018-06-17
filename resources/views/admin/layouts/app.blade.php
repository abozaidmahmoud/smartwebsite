<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashbord</title>
		@include('admin/layouts/head')
	</head>
	<body class="hold-transition skin-red sidebar-mini">
		<div class="wrapper">
			@include('admin/layouts/header')	
			@include('admin/layouts/sidebar')
			<div class="content-wrapper">
				<section class="content-header">
					@section('content')
					@show
				</section>

			</div>			
		</div>	
		@include('admin/layouts/footer')	
	</body>

</html>