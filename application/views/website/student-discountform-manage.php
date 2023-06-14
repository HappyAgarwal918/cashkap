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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/extra-libs/datatables/dataTables.bootstrap4.min.css">
<?php include("includes/script.php"); ?>

</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">
<?php include("includes/student-header.php"); ?>
<?php include("includes/student-sidebar.php"); ?>

<!-- Left sidebar menu end --> 

<!--Main container start -->

<main class="ttr-wrapper">
  <div class="container-fluid">
    <div class="db-breadcrumb">
      <h4 class="breadcrumb-title">My Profile</h4>
      <ul class="db-breadcrumb-list">
        <li><a href="<?php echo site_url("student/profile"); ?>"><i class="fa fa-home"></i>Home</a></li>
        <li>Discount Form</li>
      </ul>
    </div>
     <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
                  </div>
                </div>
      <?php  } ?>
      
    <div class="row">
      <div class="col-md-12">
        <table style="width:100%" id="example" class="table table-striped table-bordered  custom-table">
        <thead>
          <tr>
            <th width="9%">Sr.</th>
            <th width="22%">Course</th>
            <th width="43%">Institute/College/School </th>
            <!-- <th width="13%">Coupon</th> -->
            <th width="13%">Date</th>
            <th width="13%">View</th>
          </tr>
          </thead>
          <tbody>
          <?php 
  $sr=1;
  foreach($discountdata as $discountrow){
	  $stuco_id=$discountrow->stuco_id;
	  $stuco_redeemstatus=$discountrow->stuco_redeemstatus;
	  $enc_stuco_id=$this->encryptcode->encrypt($stuco_id,ENC_KEY_PASS);
	   ?>
          <tr class="<?php if($stuco_redeemstatus==1){ echo "greenrow"; } ?>">
            <td><?php echo $sr; ?></td>
            <td><?php echo $discountrow->stuco_course_name; ?></td>
            <td><?php echo $discountrow->assoc_instconame; ?></td>
            <!-- <td><?//php// echo $discountrow->stuco_coupon; ?></td> -->
            <td><?php $stuco_date=$discountrow->stuco_date; if($stuco_date!="" && $stuco_date!="0000-00-00"){ echo date('d-m-Y',strtotime($stuco_date));  } ?></td>
            <td><a href="<?php echo site_url("student/discount-coupon/view/$enc_stuco_id"); ?>">View</a></td>
          </tr>
          <?php
  $sr++;
   } ?>
   </tbody>
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
<script src="<?php echo base_url(); ?>assets/dashboard/extra-libs/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/extra-libs/datatables/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>