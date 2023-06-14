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
<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/color/color-1.css">
<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/custom.css">
<?php include("includes/script.php"); ?>

</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
<?php include("includes/associate-header.php"); ?>
<?php include("includes/associate-sidebar.php"); ?>
<main class="ttr-wrapper">
  <div class="container-fluid">
    <div class="db-breadcrumb">
      <h4 class="breadcrumb-title">Student Detail</h4>
      <ul class="db-breadcrumb-list">
        <li><a href="<?php echo site_url("associate/dashboard"); ?>"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="<?php echo site_url("associate/student-pending/manage"); ?>">Student- Pending</a></li>
        <li>Student Detail</li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
        		<ul class="asoctab_nav">
        <li><a href="<?php echo site_url("associate/student/view/$segment4"); ?>">Student Detail</a></li>
        <li><a href="<?php echo site_url("associate/student/redeem-coupon/$segment4"); ?>">Redeem Coupon</a></li>
                </ul>
        </div>
    </div>
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
            <td>Discount Value</td>
            <td><?php echo $studata->stuco_couponval; ?>%</td>
          </tr>
          <tr>
            <td>Redeem Status</td>
            <td><?php $stuco_redeemstatus=$studata->stuco_redeemstatus; if($stuco_redeemstatus==1){ echo "Redeemed"; }else{ echo "Pending"; } ?></td>
          </tr>
          <tr>
            <td>Coupon Gen. Date</td>
            <td><?php echo $studata->stuco_date;  ?></td>
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