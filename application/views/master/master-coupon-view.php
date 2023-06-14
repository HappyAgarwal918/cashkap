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
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/coupon/manage");  ?>">Manage Coupon </a></li>
            <li class="breadcrumb-item active" aria-current="page">View Coupon</li>
          </ol>
        </nav>
       	<div class="row">
        	<div class="col-md-12">
            	<ul class="asoctab_nav">
                	<li><a href="<?php echo site_url("master/coupon/view/$segment4"); ?>" class="active">View Coupon</a></li>
                    <li><a href="<?php echo site_url("master/coupon/cashback/$segment4"); ?>">Cashback</a></li>
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
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
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
            <td>Student Slip</td>
            <td><?php $stuco_redeemslip=$studata->stuco_redeemslip; if($stuco_redeemslip!=""){
				?>
                <a href="<?php echo base_url().$stuco_redeemslip; ?>" target="_blank">View Receipt</a>
                <?php
				} ?></td>
          </tr>
          <tr>
            <td>Slip Updated on Date</td>
            <td><?php $stuco_redeemslipdatetime=$studata->stuco_redeemslipdatetime;
					if($stuco_redeemslipdatetime!="" && $stuco_redeemslipdatetime!="0000-00-00 00:00:00"){
						echo date('d-m-Y h:i a',strtotime($stuco_redeemslipdatetime));
					}
			 ?> </td>
          </tr>
          <tr>
            <td>Cashback Paid</td>
            <td><?php if($studata->stuco_cashbackpaid==1){ echo "Yes"; }else{ echo "No"; } ?></td>
          </tr>
          
          <tr>
            <td>Cashback Amount</td>
            <td><?php echo $studata->stuco_cashbackamt;  ?></td>
          </tr>
          <tr>
            <td>Cashback Remarks</td>
            <td><?php echo $studata->stuco_cashbackremarks;  ?></td>
          </tr>
           <tr>
            <td>Cashback Proof</td>
            <td><?php $stuco_cashbackslip=$studata->stuco_cashbackslip; if($stuco_cashbackslip!=""){
				?>
                <a href="<?php echo base_url().$stuco_cashbackslip; ?>" target="_blank">View</a>
                <?php
				}  ?></td>
          </tr>
          
          
          
         
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
</body>
</html>
