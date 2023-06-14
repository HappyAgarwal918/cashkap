<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$segment4=$this->uri->segment(4);

?>
<!DOCTYPE html>

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
<title>
<?php if(isset($siteTitle)){ echo $siteTitle; } ?>
</title>
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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/jquery-ui.css">
<?php include("includes/script.php"); ?>

</head>

<body id="bg">
<div class="page-wraper">
  <div id="loading-icon-bx"></div>
  <?php include("includes/header.php"); ?>
  <div class="page-content"> 
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
      <div class="container">
        <div class="page-banner-entry">
          <h1 class="text-white">Discount Code</h1>
        </div>
      </div>
    </div>
    <div class="breadcrumb-row">
      <div class="container">
        <ul class="list-inline">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li>Discount Code</li>
        </ul>
      </div>
    </div>
    <div class="content-block">
      <div class="section-area section-sp2">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 m-b30">
              <div class="stu_dis_box">
              	<div class="row">
                	<div class="col-md-12"><p style="color:#348E2B; padding-top:15px; text-align:center;">Thank You. Coupon code generated successfully please check your mobile number.</p>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table  style="width:100%" class="table table-bordered table-striped">
                      <tr>
                        <td width="31%"><strong>Name</strong></td>
                        <td width="69%"><?php echo $studisdata->stureg_name; ?></td>
                      </tr>
                      <tr>
                        <td><strong>College/Institute</strong></td>
                        <td><?php echo $studisdata->assoc_instconame; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Course</strong></td>
                        <td><?php echo $studisdata->course_name; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Discount Coupon</strong></td>
                        <td><?php echo $studisdata->stuco_coupon; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Date</strong></td>
                        <td><?php $stuco_date=$studisdata->stuco_date;

											if($stuco_date!=""){

												echo date('d-m-Y',strtotime($stuco_date));

											}

									 ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><p class="note_small">Please show same coupon at the time of admission</p></td>
                      </tr>
                    </table>
                  </div>
                </div>
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
<script src="<?php echo base_url(); ?>assets/website/js/functions.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/jquery-ui.js"></script><br>
</body>
</html>
