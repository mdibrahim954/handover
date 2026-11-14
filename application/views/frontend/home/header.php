<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">
	<link rel="icon" href="ico/favicon.png">
	
    <title>Handover Express</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>resources/theme/css/bootstrap.min.css" rel="stylesheet">

    <!-- Overwrite bootstrap style -->
    <link href="<?php echo base_url(); ?>resources/theme/css/bootsnav.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resources/theme/css/overwrite.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='<?php echo base_url(); ?>resources/theme/fonts/opensans/stylesheet.css' rel='stylesheet' type='text/css'>
    
    <!-- Icons -->
    <link href="<?php echo base_url(); ?>resources/theme/fonts/FontAwesome/font-awesome.css" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>resources/theme/css/style.css" rel="stylesheet">

    <!-- Skins style -->
    <link id="skin" href="<?php echo base_url(); ?>resources/theme/skins/default.css" rel="stylesheet">
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>resources/theme/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	
</head>

<body> 
    <!-- Strat Top Menu -->
    <div class="top-menu">
        <div class="container">
            <ul class="menu-link">
                <?php if ($this->session->userdata('user_type_id') && $this->session->userdata('user_type_id') == 2) { ?>
                    <li><a href="<?php echo base_url(); ?>deliveryman/dashboard">Dashboard</a></li>
                <?php } ?>
                <?php if ($this->session->userdata('user_type_id') && ($this->session->userdata('user_type_id') == 3 || $this->session->userdata('user_type_id') == 5)) { ?>
                    <li><a href="<?php echo base_url(); ?>client/dashboard">Dashboard</a></li>
                <?php } ?>
                <?php if ($this->session->userdata('user_type_id') && $this->session->userdata('user_type_id') == 1) { ?>
                    <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                <?php } ?>

                <?php if ($this->session->userdata('user_id')) { ?>                                               
                    <li><a href="<?php echo base_url(); ?>logout/user_logout">Sign Out</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo base_url(); ?>signup">Register free</a></li>
                    <li><a href="<?php echo base_url(); ?>signin">Sign in</a></li>
                <?php } ?>
            </ul>
            <ul class="menu-icon">
<!--				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
            </ul>
        </div>
    </div>
    <!-- End Top Menu -->

    <!-- Start Navigation -->  
    <nav class="navbar navbar-default navbar-sticky bootsnav">
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->
        <div class="container"> 
            <!-- Start Atribute Navigation -->
            <!--			<div class="attr-nav">
                                            <ul>
                                                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                                            </ul>
                                    </div>        -->
            <!-- End Atribute Navigation -->
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/site/logo.jpg" class="logo" alt="" width="50" height="65"></a>
            </div>
            <!-- End Header Navigation -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>about">About Us</a></li>
                    <li><a href="<?php echo base_url(); ?>contact_us">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>   
    </nav>
    <!-- End Navigation -->

    <div class="clearfix"></div>