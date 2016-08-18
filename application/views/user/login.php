<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
    <link href="<?php echo base_url();?>Eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Eshopper/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Eshopper/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url();?>Eshopper/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>Eshopper/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url();?>Eshopper/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>Eshopper/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>Eshopper/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>Eshopper/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>Eshopper/images/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>
	<header id="header">
		<?php echo $this->load->view('user/header');?>
	</header>

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php echo site_url('member/login');?>" method="post">
							<input type="text" placeholder="Username" name="username" />
							<input type="password" placeholder="Password" name="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="#">
							<input type="text" placeholder="Name"/>
							<input type="email" placeholder="Email Address"/>
							<input type="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<footer id="footer"><!--Footer-->
		<?php echo $this->load->view('user/footer');?>
	</footer><!--/Footer-->
	

  
    <script src="<?php echo base_url();?>Eshopper/js/jquery.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/price-range.js"></script>
    <script src="<?php echo base_url();?>Eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>Eshopper/js/main.js"></script>

</body>
</html>
