<html>
	<head>
		<title>Task Manager</title>
		<link rel="stylesheet" href="{{ URL::asset('css/site.css') }}"/>
	</head>
		
	<body>
		<div class="header">
			@yield('header')
		</div>
		<div class="container">
			@yield('content')
		</div>
	</body>
</html>