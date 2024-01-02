<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="{{'/css/login.css'}}" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
	<link href="{{'template/css/login.css'}}" rel="stylesheet">

</head>
<body>
	

<section class="background">
	<div class="container py-5 h-100">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white" style="border-radius: 1rem;">
			<div class="card-body p-5 text-center">
  
			  <div class="mb-md-5 mt-md-4 pb-5">
				@if(session()->has('succes')) 
				<div class="alert alert-succes alert-dismissible fade show" role="alert">
					{{ session('succes') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
						</button> 
				</div>
				@endif

				@if(session()->has('loginError'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ session('loginError') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">

					</button>
				</div>
				@endif
  
				<h2 class="fw-bold mb-2 text-uppercase">Login</h2>
				<form action="/login" method="post">
					@csrf

				<p class="text-white-50 mb-3">Please enter your login and password!</p>

				<div class="form-outline form-white mb-4">
					<label class="form-label" for="email">Email</label>
				  <input type="email" name="email" class="form-control form-control-lg" @error('email') is-invalid 
				  @enderror id="email" placeholder="Input Your Email..." autofocus  value="{{ old('email') }}"/>

				  @error('email')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				  @enderror
				
					<label class="form-label" for="password">Password</label>
				  <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Input Your Password..." autofocus  />
				 
				</div>
  
				<a href="/dashboard"></a>
				<button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
			  
			  <div>
				<p class="mb-5">Don't have an account? <a href="/register" class="text-white-50 fw-bold">Sign Up</a>
				</p>
			  </div>
			</div>
		</div>
	</div>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </section>
</body>
</html>	 	  