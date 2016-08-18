<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	  <meta name="og:url" content="http://labs.carsonshold.com/social-sharing-buttons/">
  <meta name="og:image" content="http://labs.carsonshold.com/social-sharing-buttons/demo.png">

    <title>Home | Demo-Toko</title>
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
	
	<link href="<?php echo base_url();?>lightbox/css/lightbox.css" rel="stylesheet" />
<script src="<?php echo base_url();?>lightbox/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url();?>lightbox/js/lightbox.min.js"></script>

    <link href="<?php echo base_url();?>AdminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url();?>AdminLTE/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <!--<link rel="stylesheet" href="http://labs.carsonshold.com/demos.css">-->
  <link rel="stylesheet" href="<?php echo base_url();?>public/js/social/social-buttons.css">

</head>

<body>
	<header id="header">
		<?php echo $this->load->view('user/header');?>
	</header>
	
	<section id="slider">
		<?php echo $this->load->view('user/slider');?>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php echo $this->load->view('user/kiri');?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<?php echo $this->load->view($content);?>
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php echo $this->load->view('user/footer');?>
	</footer><!--/Footer-->
	

  
    <script src="<?php echo base_url();?>Eshopper/js/jquery.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/price-range.js"></script>
    <script src="<?php echo base_url();?>Eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>Eshopper/js/main.js"></script>
    
    <script src="<?php echo base_url();?>AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>AdminLTE/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>AdminLTE/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>AdminLTE/dist/js/demo.js" type="text/javascript"></script>
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
  <script src="<?php echo base_url();?>public/js/social/social-buttons.js"></script>

  <!-- Don't use this code in your pages -->
  <script>
    // These analytics are here for the page at http://labs.carsonshold.com/social-share-buttons/
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-8697235-1']);
    _gaq.push(['_setDomainName', 'carsonshold.com']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;g.src="//www.google-analytics.com/ga.js";s.parentNode.insertBefore(g,s);}(document,"script"));
  </script>

</body>
</html>