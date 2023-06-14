<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$segment4=$this->uri->segment(4);
?>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/custom.css">

<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/color/color-1.css">
<?php include("includes/script.php"); ?>

</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
<?php include("includes/student-header.php"); ?>
<?php include("includes/student-sidebar.php"); ?>
<main class="ttr-wrapper">
  <div class="container-fluid">
    <div class="db-breadcrumb">
      <h4 class="breadcrumb-title">My Profile</h4>
      <ul class="db-breadcrumb-list">
        <li><a href="<?php echo site_url("student/profile"); ?>"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="<?php echo site_url("student/discount-coupon"); ?>">Discount Form</a></li>
         <li>View Discount Form</li>
      </ul>
    </div>
      <div class="row">
        <div class="col-md-12">
        		<ul class="asoctab_nav">
        <li><a href="<?php echo site_url("student/discount-coupon/view/$segment4"); ?>" class="active">Discount Form</a></li>
        <li><a href="<?php echo site_url("student/discount-coupon/upload-slip/$segment4"); ?>">Upload Slip</a></li>
                </ul>
        </div>
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
        <table  style="width:100%" class="table table-bordered table-striped">
          <tr>
            <td width="32%">Name</td>
            <td width="68%"><?php echo $studata->stuco_name; ?></td>
          </tr>
          <tr>
            <td>Mobile</td>
            <td><?php echo $studata->stuco_mobile; ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $studata->stuco_email; ?></td>
          </tr>
          <tr>
            <td>Course</td>
            <td><?php echo $studata->course_name; ?></td>
          </tr>
          <tr>
            <td>Coupon</td>
            <td><?php echo $studata->stuco_coupon; ?></td>
          </tr>
           <tr>
            <td>Amount</td>
            <td><?php if($studata->stuco_redeemamount>0){ ?> Rs. <?php echo $studata->stuco_redeemamount; } ?></td>
          </tr>
          <tr>
            <td>Discount Value</td>
            <td><?php echo $studata->stuco_couponval; ?>%</td>
          </tr>
           
           <tr>
            <td>Redeem Status</td>
            <td><?php $stuco_redeemstatus=$studata->stuco_redeemstatus;  if($stuco_redeemstatus==1){ echo "Redeemed"; }else{ echo "Pending"; } ?></td>
          </tr>
          <tr>
            <!-- <td>Student Slip</td>
            <td><?php //$stuco_redeemslip=$studata->stuco_redeemslip; if($stuco_redeemslip!=""){
				?>
                <a href="<?php //echo base_url().$stuco_redeemslip; ?>" target="_blank">View Receipt</a>
                <?php
			//	} ?></td> -->
          </tr>
          <tr>
            <td>Slip Updated on Date</td>
            <td><?php $stuco_redeemslipdate=$studata->stuco_date;
					if($stuco_redeemslipdate!="" && $stuco_redeemslipdate!="0000-00-00 00:00:00"){
						echo date('d-m-Y h:i a',strtotime($stuco_redeemslipdate));
					}
			 ?> </td>
          </tr>
          <tr>
            <td>Cashback Paid</td>
            <td><?php if($studata->stuco_cashbackpaid==1){ echo "Yes"; }else{ echo "No"; } ?></td>
          </tr>
          
         
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