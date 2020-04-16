<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="google-site-verification" content="hjhffO4DNFkidOy1SZYWOP6XDg8sbJ1XwgYAQrC5cOk" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Author-Kayode's Blog</title>
		<link rel="icon" type="image/png" sizes="16x16" href="assets/img/icon.png">
		
        <!-- Common Plugins -->
		<link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css" rel="stylesheet">
		
		
		<!-- Vector Map Css-->
        <link href="assets/lib/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
		
		<!-- Chart C3 -->
		<link href="assets/lib/chart-c3/c3.min.css" rel="stylesheet">
		<link href="assets/lib/chartjs/chartjs-sass-default.css" rel="stylesheet">


        <!-- DataTables -->
        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/toast/jquery.toast.min.css" rel="stylesheet">

		
        <!-- Custom Css-->
        <link href="assets/scss/style.css" rel="stylesheet">
	
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    	<div class="top-bar primary-top-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<a class="admin-logo" href="../index.php">
							<h1>
								<img alt="" src="../img/logo.png" style="width: 50%;height: 50px" class="toggle-none hidden-xs">
							</h1>
						</a>				
						<div class="left-nav-toggle" >
							<a  href="#" class="nav-collapse"><i class="fa fa-bars"></i></a>
						</div>
						<div class="left-nav-collapsed" >
							<a  href="#" class="nav-collapsed"><i class="fa fa-bars"></i></a>
						</div>
						<div class="search-form hidden-xs">
							<form>
								<input class="form-control" placeholder="Search for..." type="text"> <button class="btn-search" type="button"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<ul class="list-inline top-right-nav">
							
							<li class="dropdown avtar-dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<img alt="" class="rounded-circle" src="assets/img/avtar-2.png" width="30">
									<?php echo $username; ?>
								</a>
								<ul class="dropdown-menu top-dropdown">
									<li>
										<a class="dropdown-item" href="logout.php"><i class="icon-logout"></i> Logout</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>