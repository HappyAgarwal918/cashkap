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
<style type="text/css">
.tbsm td{font-size:14px;}
</style>
</head>

<body id="page-top">
<div id="wrapper">
  <?php include("includes/sidebar.php"); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include("includes/top-nav.php"); ?>
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Manage Coupon Code</h1>
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
              <table class="table table-bordered tbsm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="2%" valign="top" class="column-title">Sr.</th>
                    <th width="23%">Associate</th>
                    <th width="22%">Course</th>
                     <th width="15%">Coupon</th>
                    <th width="10%">Status</th>
                      <th width="10%">Date</th>
                     <th width="4%" valign="top" class="column-title">View</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
				$count=0;
					foreach($disdata as $disrow){
					$stuco_id=$disrow->stuco_id;
					?>
                  <tr class="even pointer">
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $disrow->assoc_instconame; ?></td>
                    <td><?php echo $disrow->course_name; ?></td>
                    <td><?php echo $disrow->stuco_coupon; ?></td>
                    <td><?php $stuco_redeemstatus=$disrow->stuco_redeemstatus; if($stuco_redeemstatus==1){ echo "Redeemed"; }else{ echo "Pending"; } ?></td>
                  
                     <td><?php $stuco_date=$disrow->stuco_date;
					 		if($stuco_date!="" && $stuco_date!="0000-00-00"){
								echo date('d-m-Y',strtotime($stuco_date));	
							}
					  ?></td>
                    
                   
                    <td><a href="<?php echo site_url("master/coupon/pending-view/$stuco_id"); ?>" class="">View</a></td>
                  </tr>
                  <?php }  ?>
                </tbody>
              </table>
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
