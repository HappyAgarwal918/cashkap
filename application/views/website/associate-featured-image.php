<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>

<html lang="en">

<head>



	<!-- META ============================================= -->

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.ico" type="image/x-icon" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.png" />

	

	<!-- PAGE TITLE HERE ============================================= -->

	<title><?php if(isset($siteTitle)){ echo $siteTitle; } ?></title>

	

	<!-- MOBILE SPECIFIC ============================================= -->

	<meta name="viewport" content="width=device-width, initial-scale=1">

	

	<!--[if lt IE 9]>

	<script src="assets/js/html5shiv.min.js"></script>

	<script src="assets/js/respond.min.js"></script>

	<![endif]-->

	

	<!-- All PLUGINS CSS ============================================= -->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/assets.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/vendors/calendar/fullcalendar.css">

	

	<!-- TYPOGRAPHY ============================================= -->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/typography.css">

	

	<!-- SHORTCODES ============================================= -->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/shortcodes/shortcodes.css">

	

	<!-- STYLESHEETS ============================================= -->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/style.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/dashboard.css">

	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/color/color-1.css">

    <link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/custom.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/vendors/datepicker/css/jquery-ui.css">

<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/custom.css">

<?php include("includes/script.php"); ?>


</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">

	

	<!-- header start -->

	<?php include("includes/associate-header.php"); ?>

	<!-- header end -->

	<!-- Left sidebar menu start -->

	<?php include("includes/associate-sidebar.php"); ?>

	<!-- Left sidebar menu end -->

	<!--Main container start -->

	<main class="ttr-wrapper">

		<div class="container-fluid">

			<div class="db-breadcrumb">

				<h4 class="breadcrumb-title">Featured Image</h4>

				<ul class="db-breadcrumb-list">

					<li><a href="<?php echo site_url("associate/dashboard"); ?>"><i class="fa fa-home"></i>Home</a></li>

					<li>Featured Image</li>

				</ul>

			</div>	

            

            

            <div class="widget-box">

						

						<div class="widget-inner">

                          <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>

                <div class="row">

                  <div class="col-md-12">

                    <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>

                  </div>

                </div>

                <?php  } ?>

			<div class="row">

            	<div class="col-md-12">

                <?php 

$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');

echo form_open_multipart("associate/featured-image",$attributes);

echo form_hidden("assoc_id",$assocdata->assoc_id);

$assoc_featuredimg=$assocdata->assoc_featuredimg;

			?>

            <div class="row">

                   <div class="form-group col-md-12 col-sm-6 col-xs-12">

                    <label>Attach Photo <span class="note">(800*600px)</span><span class="req">*</span><?php if($assoc_featuredimg!=""){ ?> <a href="<?php echo base_url().$assoc_featuredimg; ?>" target="_blank" class="preview_link">Preview Picture</a> <?php } ?></label>

                    <?php echo form_input(array(

				'name'  => 'assoc_featuredimg',

				'id'    => 'assoc_featuredimg',

				'type'  => 'file',

				'class' => "form-control",

				'value' =>set_value('assoc_featuredimg')));

				?> <?php echo form_error('assoc_featuredimg'); ?> <span class="error1">

                    <?php if(isset($error1)){ echo $error1; } ?>

                    </span> </div>

            </div>

            	

            <div class="row">

                <div class="form-group col-md-3 col-sm-12 col-xs-12">

                  <button class="btn btn-primary btn-custom-create" type="submit" name="addAbout">Update</button></div>

              </div>

            <?php form_close(); ?>

                </div>

            </div>

            </div>

					</div>

		</div>

	</main>

	<div class="ttr-overlay"></div>

<script src="<?php echo base_url(); ?>assets/dashboard/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap/js/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap/js/bootstrap.min.js"></script>

<script src='<?php echo base_url(); ?>assets/dashboard/vendors/scroll/scrollbar.min.js'></script>

<script src="<?php echo base_url(); ?>assets/dashboard/vendors/chart/chart.min.js"></script>

<script src="<?php echo base_url(); ?>assets/dashboard/js/admin.js"></script>

<script> 

 CKEDITOR.replace('tb_associate_about'); 

 </script>

</body>

</html>