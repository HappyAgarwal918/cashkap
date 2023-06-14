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
<?php include("includes/script.php"); ?>

</head>

<body id="bg">

<div class="page-wraper">

<div id="loading-icon-bx"></div>

   <?php include("includes/header.php"); ?>

    <div class="page-content">

        <!-- Page Heading Box ==== -->

        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">

            <div class="container">

                <div class="page-banner-entry">

                    <h1 class="text-white">Associate Registration</h1>

				 </div>

            </div>

        </div>

		<div class="breadcrumb-row">

			<div class="container">

				<ul class="list-inline">

					<li><a href="<?php echo base_url(); ?>">Home</a></li>

					<li>Associate Registration  - Step 1</li>

				</ul>

			</div>

		</div>

		<div class="content-block">

			<div class="section-area section-sp1">

                <div class="container">

					 <div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12 m-b30">

                        		<div class="bg-gray padbox boxborder">

			<?php 

$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');

echo form_open("associate/registration",$attributes);

			?>

              <div class="row">

                <div class="form-group col-lg-12 col-sm-12 col-xs-12">

                  <label>Choose Category <span class="req">*</span></label>

                  <select class="form-control" name="assoc_category">

                    <option value="">--Select--</option>

                    <?php foreach($catdata as $catrow){ ?>

                    <option value="<?php echo $catrow->assoccat_id; ?>" <?php echo set_select('assoc_category',$catrow->assoccat_id); ?>><?php echo $catrow->assoccat_title; ?></option>

                    <?php } ?>

                  </select>

                  <?php echo form_error('assoc_category'); ?> </div>

              </div>

             <div class="row">

                <div class="form-group col-md-3 col-sm-12 col-xs-12">

                  <button class="btn btn-primary btn-custom-create" type="submit" name="subreg">Save & Next</button></div>

              </div>

              <?php form_close(); ?>

              		</div>	

						</div>

					</div>

				</div>

            </div>

			

		</div>

    </div>

   <?php include("includes/footer.php"); ?>

	 <button class="back-to-top fa fa-chevron-up" ></button>

</div>



<script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/jquery.bootstrap-touchspin.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/waypoints-min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/counterup.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/imagesloaded.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/masonry.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/filter.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/owl.carousel.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/functions.js"></script>

</body>

</html>

