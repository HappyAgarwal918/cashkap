<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>

<html lang="en">
<head>

<!-- META ============================================= -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.png" />

<!-- PAGE TITLE HERE ============================================= -->

<title>
<?php if(isset($siteTitle)){ echo $siteTitle; } ?>
</title>

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
      <h4 class="breadcrumb-title">Courses</h4>
      <ul class="db-breadcrumb-list">
        <li><a href="<?php echo site_url("associate/dashboard"); ?>"><i class="fa fa-home"></i>Home</a></li>
        <li>Photo Gallery</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12  text-right"> <a href="<?php echo site_url("associate/photo-gallery/add"); ?>" class="btn btn-secondry add-item m-r5 m-b15"><i class="fa fa-fw fa-plus-circle"></i> Add New Photo</a> </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table style="width:100%" class="table table-bordered custom-table">
          <tr>
            <th width="9%">Sr.</th>
            <th width="76%">Photo</th>
            <th width="5%">Edit</th>
          </tr>
          <?php 

  $sr=1;

  if(count($photogaldata)>0){

  foreach($photogaldata as $photogalrow){
	  $assocph_id=$photogalrow->assocph_id;
	   ?>
          <tr>
            <td><?php echo $sr; ?></td>
            <td><?php $assocph_photo=$photogalrow->assocph_photo; 

				if($assocph_photo!=""){ ?>
              <img src="<?php echo base_url().$assocph_photo; ?>" class="galpic"/>
              <?php } ?></td>
            <td><a href="<?php echo site_url("associate/edit-gallery/$assocph_id"); ?>">Edit</a></td>
          </tr>
          <?php

  $sr++;

   }

  }else{ ?>
          <tr>
            <td colspan="4">No record found..</td>
          </tr>
          <?php }?>
        </table>
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
</body>
</html>