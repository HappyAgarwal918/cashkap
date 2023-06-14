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
          <h1 class="h3 mb-0 text-gray-800 mb-2">Student Detail</h1>
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
                      <td width="68%"><?php echo $disrow->stuco_name; ?></td>
                    </tr>
                    <tr>
                      <td>Mobile Number</td>
                      <td><?php echo $disrow->stuco_mobile; ?></td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td><?php echo $disrow->stuco_email; ?></td>
                    </tr>
                   
                    
                     <tr>
                      <td>Course Applied</td>
                      <td><?php echo $disrow->assoc_instconame; ?></td>
                    </tr>
                     <tr>
                      <td>Discount Coupon Code</td>
                      <td><?php echo $disrow->stuco_coupon; ?></td>
                    </tr>
                    <tr>
                      <td>Fee Amount</td>
                      <td><?php echo $disrow->stuco_redeemamount; ?></td>
                    </tr>
                    <tr>
                      <td>Discount value</td>
                      <td><?php   if($disrow->stuco_couponval>0){ echo $disrow->stuco_couponval."%"; } ?></td>
                    </tr>
                     <tr>
                      <td>Redeem Status</td>
                      <td><?php $stuco_redeemstatus=$disrow->stuco_redeemstatus;
					  		if($stuco_redeemstatus==1){ echo "Yes"; }else{ echo "No"; }
					  
					   ?></td>
                    </tr>
                    <tr>
                      <td>Redeem Slip</td>
                      <td><?php $stuco_redeemslip=$disrow->stuco_redeemslip;
					  		if($stuco_redeemslip!=""){
								?>
                                <a href="<?php echo base_url().$stuco_redeemsli; ?>" target="_blank">Download Slip</a>
                                <?php 	
							}
					   ?></td>
                    </tr>
                    <tr>
                      <td>Cashback Paid</td>
                      <td><?php $stuco_cashbackpaid=$disrow->stuco_cashbackpaid; 
					  	if($stuco_cashbackpaid==1){ echo "Yes"; }else{ echo "No"; }
					  ?></td>
                    </tr>
                     <tr>
                      <td>Cashback Amount</td>
                      <td><?php echo $disrow->stuco_cashbackamt; ?></td>
                    </tr>
                    <tr>
                      <td>Cashback Slip</td>
                      <td><?php $stuco_cashbackslip=$userdata->stuco_cashbackslip;
					  		if($stuco_cashbackslip!=""){
								?>
                         <a href="<?php echo base_url().$stuco_cashbackslip; ?>" target="_blank">Download Slip</a>  
                                <?php
							}
					   ?></td>
                    </tr>
                    </table>
                </div>
              </div>
              
              <div class="row">
              		<div class="col-md-12">
							
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
