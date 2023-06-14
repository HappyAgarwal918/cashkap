<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.png" />
  <title>
    <?php if (isset($siteTitle)) {
      echo $siteTitle;
    } ?>
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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/typography.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/shortcodes/shortcodes.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/dashboard.css">
  <link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/color/color-1.css">
  <?php include("includes/script.php"); ?>

</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">
  <?php include("includes/associate-header.php"); ?>
  <?php include("includes/associate-sidebar.php"); ?>
  <main class="ttr-wrapper">
    <div class="container-fluid">
      <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Dashboard</h4>
        <ul class="db-breadcrumb-list">
          <li><a href="<?php echo site_url("associate/dashboard"); ?>"><i class="fa fa-home"></i>Home</a></li>
          <li>Dashboard</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
          <div class="widget-card widget-bg1">
            <div class="wc-item">
              <h4 class="wc-title">Associate Profile </h4>
              <span class="wc-des"> &nbsp; </span> <span class="wc-progress-bx"> <span class="wc-change"> <a href="<?php echo site_url("associate/profile") ?>" style="color:#fff; text-decoration:underline;">View</a> </span> <span class="wc-number ml-auto"> </span> </span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
          <div class="widget-card widget-bg2">
            <div class="wc-item">
              <h4 class="wc-title"> Student Pending </h4>
              <span class="wc-des"> &nbsp; </span> <span class="wc-stats counter"> <?php echo count($stupend); ?> </span> <span class="wc-progress-bx"> <span class="wc-change"><a href="<?php echo site_url("associate/student-pending/manage"); ?>" style="color:#fff;  text-decoration:underline;">View</a> </span> </span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-4 col-sm-6 col-12">
          <div class="widget-card widget-bg3">
            <div class="wc-item">
              <h4 class="wc-title"> Student Redeemed </h4>
              <span class="wc-des"> &nbsp; </span> <span class="wc-stats counter"> <?php echo count($stuapproved); ?> </span> <span class="wc-progress-bx"> <span class="wc-change"><a href="<?php echo site_url("associate/student-redeemed/manage"); ?>" style="color:#fff;  text-decoration:underline;">View</a></span> </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 m-b30">
          <div class="widget-box">
            <div class="wc-title">
              <h4>New Students</h4>
            </div>
            <div class="widget-inner">
              <div class="new-user-list">
                <table style="width:100%" class="table table-bordered custom-table">
                  <tr>
                    <th width="8%">Sr.</th>
                    <th width="21%">Name</th>
                    <th width="27%">Course</th>
                    <th width="11%">Date</th>
                    <th width="7%">View</th>
                  </tr>
                  <?php
                  $sr = 1;
                  if (count($stupend) > 0) {
                    foreach ($stupend as $sturow) {
                      $stuco_id = $sturow->stuco_id;
                      $enc_stuco_id = $this->encryptcode->encrypt($stuco_id, ENC_KEY_PASS);

                  ?>
                      <tr>
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $sturow->stuco_name ?></td>
                        <td><?php echo $sturow->course_name ?></td>
                        <td><?php $stuco_date = $sturow->stuco_date;
                            if ($stuco_date != "" && $stuco_date != "0000-00-00") {
                              echo date('d-m-Y', strtotime($stuco_date));
                            } ?></td>
                        <td><a href="<?php echo site_url("associate/student/view/$enc_stuco_id"); ?>">View</a></td>
                      </tr>
                    <?php

                      $sr++;
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="5">No record found..</td>
                    </tr>
                  <?php
                  }

                  ?>
                </table>
              </div>
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
</body>

</html>