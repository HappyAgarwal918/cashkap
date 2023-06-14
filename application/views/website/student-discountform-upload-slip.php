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
     <li><a href="<?php echo site_url("student/discount-coupon/view/$segment4"); ?>">Discount Form</a></li>
     <li><a href="<?php echo site_url("student/discount-coupon/upload-slip/$segment4"); ?>" class="active">Upload Slip</a></li>
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
      
      
    <div class="widget-box">
      <div class="widget-inner">
        <?php 
		$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');
		echo form_open_multipart("student/discount-coupon/upload-slip/$segment4",$attributes);
		echo form_hidden('enc_stuco_id',$segment4);
		?>
        <div class="row">
          <div class="col-md-6 form-group">
            <label>Coupon Code <span class="req">*</span></label>
            <?php echo form_input(array(
            'name'=>'stuco_coupon',
            'id'=>'stuco_coupon',
            'type'=>'text',
			'readonly'=>true,
            'class'=> "form-control",
            'value'=>set_value('stuco_coupon',$studata->stuco_coupon)));
            ?> <?php echo form_error('stuco_coupon'); ?> </div>
            
            <div class="col-md-6 form-group">
                  
                    <label>Attach Slip  <span class="req">*</span></label>
                    <?php echo form_upload(array('name'=>'stuco_redeemslip','class'=>'form-control upField')); ?> <?php echo form_error('stuco_redeemslip'); ?> <span class="error">
                    <?php if(isset($error1)){ echo $error1; } ?>
                    </span> </div>
          
        </div>
        <div class="row">
          <div class="form-group col-md-3 col-sm-12 col-xs-12">
            <button class="btn btn-primary btn-custom-create" type="submit" name="submit">Submit</button>
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