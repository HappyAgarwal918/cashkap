<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
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
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Manage States</h1>
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
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="8%" valign="top" class="column-title">Sr.</th>
                    <th width="65%">State Name</th>
                     <th width="13%">Cities</th>
                    <th width="13%">Status</th>
                    <th width="9%">Search</th>
                    <th width="5%" valign="top" class="column-title">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
				$count=0;
					foreach($statedata as $staterow){
					$state_id=$staterow->state_id;
					?>
                  <tr class="even pointer">
              <td><?php echo ++$count; ?></td>
              <td><?php echo $staterow->state_name; ?></td>
            <td align="center"><a href="<?php echo site_url("master/setting/manage-city/$state_id"); ?>" class="btn btn-secondary">Cities</a></td>
                    
                    
                  <td><?php $state_status=$staterow->state_status; if($state_status==1){ echo "Active"; }else{ echo "Inactive"; } ?></td>
                      <td><?php $state_search=$staterow->state_search; if($state_search==1){ echo "Yes"; }else{ echo "No"; } ?></td>
                    <td><a href="<?php echo site_url("master/setting/edit-state/$state_id"); ?>" class="">Edit</a></td>
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
