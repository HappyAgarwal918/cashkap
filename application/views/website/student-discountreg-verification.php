<?php
defined('BASEPATH') or exit('No direct script access allowed');
$segment4 = $this->uri->segment(4);
if ($segment4 == '') {
  $segment4 = $enc_stuco_id;
}
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
    <?php if (isset($siteTitle)) {
      echo $siteTitle;
    } ?>
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
      <!-- Page Heading Box ==== -->
      <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
        <div class="container">
          <div class="page-banner-entry">
            <h1 class="text-white">OTP Verification</h1>
          </div>
        </div>
      </div>
      <div class="breadcrumb-row">
        <div class="container">
          <ul class="list-inline">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li>OTP Verification</li>
          </ul>
        </div>
      </div>
      <div class="content-block">
        <div class="section-area section-sp2">
          <div class="container">
            <?php if ($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')) { ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
                </div>
              </div>
            <?php  } ?>
            

            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                <div class="bg-gray padbox boxborder">
                  <?php
                  $attributes = array('class' => 'create_account style2 ', 'method' => 'post', 'autocomplete' => 'off');
                  echo form_open("student/get-discount/verify-mobile/$segment4", $attributes);
                  echo form_hidden('enc_stuco_id', $segment4);
                  ?>
                  <div class="row">

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                      <label>Mobile Number <span class="req">*</span></label>
                      <?php echo form_input(array(
                        'name' => 'stuco_mobile',
                        'id' => 'stuco_mobile',
                        'type' => 'text',
                        'readonly' => true,
                        'maxlength' => 10,
                        'class' => "form-control",
                        'value' => set_value('stuco_mobile', $studisdata->stuco_mobile)
                      ));
                      ?> <?php echo form_error('stuco_mobile'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                      <label>Enter OTP sent to above number <span class="req">*</span></label>
                      <?php echo form_input(array(
                        'name' => 'stuco_otp',
                        'id' => 'stuco_otp',
                        'type' => 'text',
                        'maxlength' => 10,
                        'class' => "form-control",
                        'value' => set_value('stuco_otp')
                      ));
                      ?> <?php echo form_error('stuco_otp'); ?>
                    </div>

                  </div>
                  <div class="row">
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <button class="btn btn-primary btn-custom-create" type="submit" name="subdis">Submit</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button id="OTPresend" class="resend_otp">RESEND OTP</button>

                    </div>
                  </div>
                  <?php form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("includes/footer.php"); ?>
    <button class="back-to-top fa fa-chevron-up"></button>
  </div>
  <script>
    $(document).ready(function() {
      $('#OTPresend').click(function() {
       
        $.ajax({
          url: "<?php echo base_url(); ?>resend/OTP",
          success: function(response) {
          }
        });

      });
    });
  </script>
  <script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/jquery.bootstrap-touchspin.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/waypoints-min.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/functions.js"></script>
  <script src="<?php echo base_url(); ?>assets/website/js/jquery-ui.js"></script><br>
</body>

</html>