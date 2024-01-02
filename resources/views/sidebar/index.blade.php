<!doctype html>
<html lang="en">
  <head>
  	<title>Sistem Kantin Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
		<link rel="stylesheet" href="/sidebar/css/style.css">
		<link rel="stylesheet" href="/public/template/css/dashboard.css" />
		<link rel="stylesheet" href="/public/template/css/product.css">
		<link rel="stylesheet" href="/public/template/css/cart.css">
  </head>
  
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="/dashboard/admin" class="logo">SIKAT<span>Sistem Informasi Kantin</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="/dashboard/admin"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>

				<li>
				<a href="/dashboard/admin/products"><span class="bi bi-bag mr-3"></span> Product</a>
				</li>
				<li>
	              <a href="/dashboard/admin/sarans"><span class="bi bi-chat-left-dots mr-3"></span>Masukan/Saran</a>
	          </li>
	          <li>
              <a href="/dashboard/admin/riwayats"><span class="bi bi-clock-history mr-3"></span> Riwayat Pembelian</a>
	          </li>
	        </ul>
			
			

			<form action="/logout" method="post" onclick="return confirm('Apakah Yakin Ingin Logout?')">
				<a href="/" class="btn btn-danger bi bi-box-arrow-left mr-3 btn-lg active" role="button" aria-pressed="true">Logout</a>
			</form>
	      </div>
    	</nav>

		
		

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
       @yield('content')
		</div>

    <script src="/sidebar/js/jquery.min.js"></script>
    <script src="/sidebar/js/popper.js"></script>
    <script src="/sidebar/js/bootstrap.min.js"></script>
    <script src="/sidebar/js/main.js"></script>
  </body>
</html>