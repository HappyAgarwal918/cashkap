<?php defined('BASEPATH') OR exit('No direct script access allowed');
$segment4=$this->uri->segment(4);
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
<?php if(isset($siteTitle)){ echo $siteTitle; } ?>
</title>
<?php include("includes/style-header.php"); ?>
<link href="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
<div id="wrapper">
  <?php include("includes/sidebar.php"); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include("includes/top-nav.php"); ?>
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="<?php echo site_url("master/dashboard");  ?>">Home</a></li>
   <li class="breadcrumb-item"><a href="<?php echo site_url("master/user/manage");  ?>">Manage User</a></li>
   <li class="breadcrumb-item active" aria-current="page">View User</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">View User</h1>
        </div>
        <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>
        <div class="row">
          <div class="col-md-12">
            <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
          </div>
        </div>
        <?php  } ?>
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
              <div class="row">
                <div class="col-md-12">
                  <table  style="width:100%" class="table table-bordered table-striped">
                  
                    <tr>
                      <td width="32%">Name</td>
                      <td width="68%"><?php echo $userdata->stureg_name; ?></td>
                    </tr>
                    <tr>
                      <td>Mobile Number</td>
                      <td><?php echo $userdata->stureg_mobileno; ?></td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td><?php echo $userdata->stureg_email; ?></td>
                    </tr>
                    <tr>
                      <td>Date of Birth</td>
                      <td><?php $stureg_dob=$userdata->stureg_dob;
							if($stureg_dob!="" && $stureg_dob!="0000-00-00"){
								echo date('d-m-Y',strtotime($stureg_dob));
							}
							
							 ?></td>
                    </tr>
                    <tr>
                      <td>Qualification</td>
                      <td><?php echo $userdata->qualification_name; ?></td>
                    </tr>
                    <tr>
                      <td>Course Interested</td>
                      <td><?php echo $userdata->course_name; ?></td>
                    </tr>
                    <tr>
                      <td>Address</td>
                      <td><?php echo $userdata->stureg_address_line1;
									if($userdata->stureg_address_line2!=""){
										echo ", ".$userdata->stureg_address_line2;
									}
									if($userdata->stureg_address_city!=""){
										echo ", ".$userdata->stureg_address_city;
									}
									if($userdata->stureg_address_city!=""){
										echo ", ".$userdata->stureg_address_state;
									}
							 ?>

                             <br/>
                           		 <?php if($userdata->stureg_address_country!=""){
										echo $userdata->stureg_address_country;
									}
									?>
								<?php if($userdata->stureg_address_pin!=""){
										echo " - ".$userdata->stureg_address_pin;
									}
									 ?></td>
                    </tr>
                    <tr>
                      <td>Reg. Date</td>
                      <td><?php echo date('d-m-Y',strtotime($userdata->stureg_date)); ?></td>
                    </tr>
                    
                    <tr>
                      <td>Associate Name</td>
                      <td><?php echo $userdata->assoc_instconame; ?></td>
                    </tr>
                    <tr>
                      <td>Associate Address</td>
                      <td><?php echo $userdata->assoc_address_line1; if($userdata->assoc_address_line2!=""){ echo ", ".$userdata->assoc_address_line2; }  if($userdata->assoc_address_city!=""){ echo ", ".$userdata->assoc_address_city; } echo "<br/>";  if($userdata->assoc_address_state!=""){ echo $userdata->assoc_address_state; } ?>  <?php if($userdata->assoc_address_country!=""){ echo ", ".$userdata->assoc_address_country; } ?> <?php if($userdata->assoc_address_pin!=""){ echo " - ".$userdata->assoc_address_pin; } ?>  </td>
                    </tr>
                    <tr>
                      <td>Associate Contact Number</td>
                      <td><?php echo $userdata->assoc_contactno; ?></td>
                    </tr>
                    
                    </table>
                </div>
              </div>
              <div class="row">
              	<div class="col-md-12">
                	<h5 style="color:#333333;"><strong>Coupon Generated</strong></h5>
                </div>
              </div>
              <div class="row">
              		<div class="col-md-12">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
  <tr>
    <th>Sr.</th>
    <th>Institute Name</th>
    <th>Course</th>
    <th>Redeem Status</th>
    <th>Cashback</th>
    <th>Date</th>
    <th>View</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $sr=1;
   foreach($discountdata as $disrow){ 
   	$stuco_id=$disrow->stuco_id;
   ?>
	<tr>
    <td><?php echo $sr; ?></td>
    <td><?php echo $disrow->assoc_instconame; ?></td>
    <td><?php echo $disrow->course_name; ?></td>
    <td><?php $stuco_redeemstatus=$disrow->stuco_redeemstatus; if($stuco_redeemstatus==1){ echo "Yes"; }else{ echo "No"; } ?></td>
    <td><?php echo $disrow->stuco_cashbackamt; ?></td>
    <td><?php echo date('d-m-Y',strtotime($disrow->stuco_date)); ?></td>
    <td><a href="<?php echo site_url("master/user/view-coupon/$segment4/$stuco_id"); ?>" target="_blank">View</a></td>
   </tr>  
	<?php 
	$sr++;
	} ?>
	</tbody>
</table>
			</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("includes/footer.php"); ?>
  </div>
</div>
<?php include("includes/common-footer.php"); ?>
<?php include("includes/style-footer.php"); ?>
<script src="<?php echo base_url(); ?>assets/master/vendor/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/js/demo/datatables-demo.js"></script>
</body>
</html>
