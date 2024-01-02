@extends('sidebar.index')
@section('content')
<h1>Admin</h1>

{{-- <h1>laporan</h1>

<body>
	<body>
		<h1>How to Use Charts.JS in Laravel 9 - LaravelTuts.com</h1>
		<canvas id="myChart" height="100px"></canvas>
	</body>
	  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	  
	<script type="text/javascript">
	  
		var labels =  {{ Js::from($labels) }};
		var users =  {{ Js::from($data) }};
	  
		const data = {
			labels: labels,
			datasets: [{
				label: 'My First dataset',
				backgroundColor: 'rgb(255, 99, 132)',
				borderColor: 'rgb(255, 99, 132)',
				data: users,
			}]
		};
	  
		const config = {
			type: 'line',
			data: data,
			options: {}
		};
	  
		const myChart = new Chart(
			document.getElementById('myChart'),
		config
		);
	  
	</script> --}}



@endsection