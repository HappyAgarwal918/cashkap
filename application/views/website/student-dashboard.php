<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>

<html lang="en">

<head>

	<!-- META ============================================= -->

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.ico" type="image/x-icon" />

<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.png" />

	

	<!-- PAGE TITLE HERE ============================================= -->

	<title><?php if(isset($siteTitle)){ echo $siteTitle; } ?></title>

	

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

				<li><a href="<?php echo site_url("student/dashboard"); ?>"><i class="fa fa-home"></i>Home</a></li>

				<li>My Profile</li>

				</ul>

			</div>	

			<div class="row">

						<div class="col-md-12">

                         <table  style="width:100%" class="table table-bordered table-striped">

                          <tr>

                            <td width="35%"><strong>Name</strong></td>

                            <td width="65%"><?php echo $studata->stureg_name; ?></td>

                          </tr>

                           <tr>

                            <td><strong>Mobile Number</strong></td>

                            <td><?php echo $studata->stureg_mobileno; ?></td>

                          </tr>

                           <tr>

                            <td><strong>Email Id</strong></td>

                            <td><?php echo $studata->stureg_email; ?></td>

                          </tr>

                          <tr>

                            <td><strong>Date of Birth</strong></td>

                            <td><?php $stureg_dob=$studata->stureg_dob;
							if($stureg_dob!="" && $stureg_dob!="0000-00-00"){
								echo date('d-m-Y',strtotime($stureg_dob));
							}
							
							 ?></td>

                          </tr>

                          <!-- <tr>

                            <td><strong>Qualification</strong></td>

                            <td><?php// echo $studata->qualification_name; ?></td>

                          </tr> -->

                          <!-- <tr>

                            <td><strong>Course Interested</strong></td>

                            <td><?php// echo $studata->course_name; ?></td>

                          </tr> -->

                          <tr>

                            <td><strong>Address</strong></td>

                            <td><?php echo $studata->stureg_address_line1;

									

									if($studata->stureg_address_city!=""){

										echo ", ".$studata->stureg_address_city;

									}

									if($studata->stureg_address_state!=""){

										echo ", ".$studata->stureg_address_state;

									}

							

							 ?>

                             <br/>

                           		 <?php if($studata->stureg_address_country!=""){

										echo $studata->stureg_address_country;

									}

									?>

                                    

                                    <?php if($studata->stureg_address_pin!=""){

										echo " - ".$studata->stureg_address_pin;

									}

									?>

                             </td>

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