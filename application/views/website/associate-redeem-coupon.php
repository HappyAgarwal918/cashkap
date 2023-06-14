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
        <li><a href="<?php echo site_url("associate/student-pending/manage"); ?>"><i class="fa fa-home"></i>Student- Pending</a></li>
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
    <div class="widget-box">
      <div class="widget-inner">
        <?php 
		$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');
		echo form_open("associate/student/redeem-coupon/$segment4",$attributes);
		echo form_hidden('stuco_id',$segment4);
		?>
        <div class="row">
          <div class="col-md-6 form-group">
            <label>Coupon Code <span class="req">*</span></label>
            <?php echo form_input(array(
            'name'=>'stuco_coupon',
            'id'=>'stuco_coupon',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('stuco_coupon')));
            ?> <?php echo form_error('stuco_coupon'); ?> </div>
          <div class="col-md-6 form-group">
            <label>Amount <span class="req">*</span></label>
            <?php echo form_input(array(
            'name'=>'stuco_redeemamount',
            'id'=>'stuco_redeemamount',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('stuco_redeemamount')));
            ?> <?php echo form_error('stuco_redeemamount'); ?> </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3 col-sm-12 col-xs-12">
            <button class="btn btn-primary btn-custom-create" type="submit" name="redeem">Redeem</button>
          </div>
        </div>
        <?php 
		echo form_close();
		?>
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