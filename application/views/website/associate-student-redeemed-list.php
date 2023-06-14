<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.png" />
<title>
<?php if(isset($siteTitle)){ echo $siteTitle; } ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/assets.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/vendors/calendar/fullcalendar.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/typography.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/shortcodes/shortcodes.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/dashboard.css">
<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/color/color-1.css">
<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/extra-libs/datatables/dataTables.bootstrap4.min.css">
<?php include("includes/script.php"); ?>

</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">
<?php include("includes/associate-header.php"); ?>
<?php include("includes/associate-sidebar.php"); ?>
<main class="ttr-wrapper">
  <div class="container-fluid">
    <div class="db-breadcrumb">
      <h4 class="breadcrumb-title">Student- Redeemed</h4>
      <ul class="db-breadcrumb-list">
        <li><a href="<?php echo site_url("associate/dashboard"); ?>"><i class="fa fa-home"></i>Home</a></li>
        <li>Student</li>
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
        <table style="width:100%" id="example" class="table table-bordered custom-table">
        <thead>
          <tr>
            <th width="7%">Sr.</th>
            <th width="21%">Name</th>
            <th width="21%">Course</th>
            <th width="18%">Amount</th>
            <th width="15%">Casback</th>
            <th width="12%">Date</th>
            <th width="6%">View</th>
          </tr>
          </thead>
          <tbody>
          <?php 
  $sr=1;
  foreach($studata as $sturow){
	  $stuco_id=$sturow->stuco_id;
	  $enc_stuco_id=$this->encryptcode->encrypt($stuco_id,ENC_KEY_PASS);
	   ?>
          <tr>
            <td><?php echo $sr; ?></td>
            <td><?php echo $sturow->stuco_name ?></td>
            <td><?php echo $sturow->course_name ?></td>
            <td>Rs. <?php echo $sturow->stuco_redeemamount ?></td>
            <td><?php $stuco_cashbackpaid=$sturow->stuco_cashbackpaid; if($stuco_cashbackpaid==1){ echo "Yes"; }else{echo "No"; } ?></td>
            <td><?php $stuco_date=$sturow->stuco_date; if($stuco_date!="" && $stuco_date!="0000-00-00"){ echo date('d-m-Y',strtotime($stuco_date));  } ?></td>
            <td><a href="<?php echo site_url("associate/student-redeemed/view/$enc_stuco_id"); ?>">View</a></td>
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