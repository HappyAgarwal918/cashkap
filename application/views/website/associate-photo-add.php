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
				<h4 class="breadcrumb-title">Photo Gallery</h4>
				<ul class="db-breadcrumb-list">
        <li><a href="<?php echo site_url("associate/dashboard"); ?>"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="<?php echo site_url("associate/photo-gallery"); ?>">Photo Gallery
</a></li><li>Add Photo</li>
				</ul>
			</div>	
            
            <div class="widget-box">
						<div class="wc-title">
							<h4>Add New Photo</h4>
						</div>
						<div class="widget-inner">
			<div class="row">
            	<div class="col-md-12">
                <?php 
$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');
echo form_open_multipart("associate/photo-gallery/add",$attributes);
			?>
            
            
            	<div class="row">
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Photo Title <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assocph_title',
            'id'=>'assocph_title',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assocph_title')));
            ?> <?php echo form_error('assocph_title'); ?> </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Attach Photo <span class="note">(800*600px)</span><span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'assocph_photo',
				'id'    => 'assocph_photo',
				'type'  => 'file',
				'class' => "form-control",
				'value' =>set_value('assocph_photo')));
				?> <?php echo form_error('assocph_photo'); ?> <span class="error1">
                    <?php if(isset($error1)){ echo $error1; } ?>
                    </span> </div>
            
           	
            </div>
            
            	
            <div class="row">
                <div class="form-group col-md-3 col-sm-12 col-xs-12">
                  <button class="btn btn-primary btn-custom-create" type="submit" name="addCourse">Submit</button></div>
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
<script src="<?php echo base_url(); ?>assets/dashboard/vendors/datepicker/js/jquery-ui.js"></script>
<script type="text/javascript">
$('#acourse_lastdate').datepicker({
    dateFormat:'dd-mm-yy',
	changeYear: true,
	changeMonth: true,
	yearRange: "-50:+0",
});
</script>
</body>
</html>