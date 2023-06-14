<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="robots" content="index, follow">

	<meta property="og:type" content="website" />

	<meta property="og:locale" content="en_us" />

	<meta name="twitter:card" content="summary">

	<meta name="format-detection" content="telephone=no">

	<link rel="icon" href="<?php echo base_url();  ?>assets/website/images/favicon.ico" type="image/x-icon" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();  ?>assets/website/images/favicon.png" />

	<title><?php if(isset($siteTitle)){ echo $siteTitle; } ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>

	<script src="js/html5shiv.min.js"></script>

	<script src="js/respond.min.js"></script>

	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/assets.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/typography.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/shortcodes.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/style.css">

	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/color-1.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/layers.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/settings.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/navigation.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.min.css" />

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/custom.css">

	<!-- REVOLUTION SLIDER END -->	
<?php include("includes/script.php"); ?>

</head>

<body id="bg">

<div class="page-wraper">

<div id="loading-icon-bx"></div>

   <?php include("includes/header.php"); ?>

    <div class="page-content">

        <!-- Page Heading Box ==== -->

        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/bg4.jpg);">

            <div class="container">

                <div class="page-banner-entry">

                    <h1 class="text-white">Associate Login</h1>

				 </div>

            </div>

        </div>

		<div class="breadcrumb-row">

			<div class="container">

				<ul class="list-inline">

					<li><a href="<?php echo base_url(); ?>">Home</a></li>

					<li>Associate Login</li>

				</ul>

			</div>

		</div>

		<!-- Page Heading Box END ==== -->

		<!-- Page Content Box ==== -->

		<div class="content-block">

            <!-- About Us ==== -->

			<div class="section-area section-sp1">

                <div class="container">

					 <div class="row">

						<div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 m-b30">

                        		<div class="bg-gray padbox boxborder">

                        <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>

                <div class="row">

                  <div class="col-md-12">

                    <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>

                  </div>

                </div>

                <?php  } ?>

              <?php 

$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');

echo form_open("associate/login",$attributes);



			?>

              <?php //echo validation_errors(); ?>

              <div class="row">

                <div class="form-group col-md-12 col-sm-12 col-xs-12">

                  <label>Username <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'assoc_username',

            'id'=>'assoc_username',

			'maxlength'=>40,

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('assoc_username')));

            ?> <?php echo form_error('assoc_username'); ?> </div>

              </div>

              <div class="row">

                <div class="form-group col-md-12 col-sm-12 col-xs-12">

                  <label>Password <span class="req">*</span></label>

                  <?php echo form_input(array(



            'name'=> 'assoc_password',



            'id'=> 'assoc_password',

			'maxlength'=>20,

            'type'=> 'password',



            'class'=> "form-control",



            'value'=>set_value('assoc_password')));



            ?> <?php echo form_error('assoc_password'); ?> </div>

              </div>

              

              <div class="row">

                <div class="col-md-3 col-sm-12 col-xs-12">

                  <button class="btn btn-primary btn-custom-create" type="submit" name="sublogin">Submit</button>

                </div>

              </div>

              <div class="row">

                <div class="col-md-12"><p class="forgotpass">If you <a  href="<?php echo site_url("associate/forgot-password"); ?>" class="forgot">forget your password</a>, you can request to retrieve your password ?</a></p></div>

              </div>

              <div class="row">

                <div class="col-md-12"> <a  href="<?php echo site_url("associate/registration"); ?>" class="btn signup">New Associate Register Here</a> </div>

              </div>

              

              

              

              <?php form_close(); ?>

              		</div>	

						</div>

					</div>

				</div>

            </div>

			

		</div>

		<!-- Page Content Box END ==== -->

    </div>

   <?php include("includes/footer.php"); ?>

	 <button class="back-to-top fa fa-chevron-up" ></button>

</div>



<script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/bootstrap-select.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/jquery.bootstrap-touchspin.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/waypoints-min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/counterup.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/imagesloaded.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/masonry.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/filter.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/owl.carousel.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/functions.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/contact.js"></script>

</body>

</html>

