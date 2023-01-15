<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="author"/>
	<meta content="Rancang Bangun Sistem Informasi Manajemen Persediaan Obat" name="description"/>
	<meta property="og:locale" content="en_US"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="Rancang Bangun Sistem Informasi Manajemen Persediaan Obat "/>
	<meta property="og:description" content="Ahmad Hardian Fadhi - 2018240074"/>
	<meta property="og:image" content=""/>
	<meta property="og:site_name" content="atlas "/>
	<title>Login</title>
	<link rel="icon" type="image/x-icon" href="assets/img/logo.png"/>
	<link rel="icon" href="assets/img/logo.png" type="image/png" sizes="16x16">
	<link rel='stylesheet' href='assets/css/478ccdc1892151837f9e7163badb055b8a1833a5/light/assets/vendor/pace/pace.css'/>
	<script src='assets/js/3d1965f9e8e63c62b671967aafcad6603deec90c/light/assets/vendor/pace/pace.min.js'></script>
	<link rel='stylesheet' type='text/css' href='assets/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css'/>
	<link rel='stylesheet' href='assets/bundles/fc681442cee6ccf717f33ccc57ebf17a4e0792e1.css'/>
	<link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
	<link rel='stylesheet' href='assets/css/04cc97dcdd1c8f6e5b9420845f0fac26b54dab84/default/assets/fonts/jost/jost.css'/>
	<link rel='stylesheet' type='text/css' href='assets/css/548117a22d5d22545a0ab2dddf8940a2e32c04ed/default/assets/fonts/materialdesignicons/materialdesignicons.min.css'/>
	<link rel='stylesheet' type='text/css' href='assets/css/ed18bd005cf8b05f329fad0688d122e0515499ff/default/assets/css/atmos.min.css'/>
</head>
<body class="jumbo-page">
	<main class="admin-main  ">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-lg-4  bg-white">
					<div class="row align-items-center m-h-100">
						<div class="mx-auto col-md-8">
							<h3 class="text-center p-b-20 fw-400">Login</h3>
							<?php if (isset($_SESSION['flash']['username'])): ?>
								<div class="p-b-20 text-center">
									<div class="<?php echo $_SESSION['flash']['class'] ?>">
										<i class="<?php echo $_SESSION['flash']['icon'] ?>"></i>
										<?php echo "  ".$_SESSION['flash']['label'];
										?>
									</div>
								</div>
							<?php endif ?>
							<form class="needs-validation" action="login.php" method="post">
								<div class="form-row">
									<div class="form-group floating-label col-md-12">
										<label>Username</label>
										<input type="text" required class="form-control" name="username" <?php if (isset($_SESSION['flash']['username'])){ ?> value="<?php echo $_SESSION['flash']['username'] ?>" <?php } ?> placeholder="Username">
									</div>
									<div class="form-group floating-label col-md-12">
										<label>Password</label>
										<input type="password" required class="form-control " placeholder="Password" name="password" >
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
							</form>
							<p class="text-right p-t-10">
								<a href="#!" class="text-underline">Forgot Password?</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8 d-none d-md-block bg-cover" style="background-image: url('assets/img/login.svg');">
				</div>
			</div>
		</div>
	</main>

	<script src='assets/bundles/85bd871e04eb889b6141c1aba0fedfa1a2215991.js'></script>
</body>
<?php unset($_SESSION['flash']) ?>
</html>