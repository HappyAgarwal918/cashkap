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
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Manage Associates: Approved </h1>
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
                  <div class="table-responsive​">
                    <table class="table table-bordered table-responsive​" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="7%" valign="top" class="column-title">Sr.</th>
                          <th width="29%" valign="top" class="column-title">College/University/Institute</th>
                          <th width="13%" valign="top" class="column-title">Category</th>
                          <th width="17%" valign="top" class="column-title">Contact Person</th>
                          <th width="10%" valign="top" class="column-title">Mobile</th>
                          <th width="9%" valign="top" class="column-title">Status</th>
                          <th width="9%" valign="top" class="column-title">Featured</th>
                          <th width="5%"  align="center" class="column-title no-sort">Delete</th>
                          <th width="6%"  align="center" class="column-title no-sort">View</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
					$count=0;
					foreach($assocdata as $assocrow){
					$assoc_id=$assocrow->assoc_id;
					?>
                        <tr class="even pointer">
                          <td><?php echo ++$count; ?></td>
                          <td><?php echo $assocrow->assoc_instconame; ?></td>
                          <td><?php echo $assocrow->assoccat_title; ?></td>
                          <td><?php echo $assocrow->assoc_contactname; ?></td>
                          <td><?php echo $assocrow->assoc_contactno; ?></td>
                          <td><?php if($assocrow->assoc_status==1){ echo "Active";}elseif($assocrow->assoc_status==2){ echo "Suspend"; }else{ echo "Inactive";} ?></td>
                          <td><?php if($assocrow->assoc_featured==1){ echo "Yes";}else{ echo "No";} ?></td>
                          <td width="5%" align="center"><a href="<?php echo site_url("master/associate/remove/$assoc_id"); ?>"  title="Remove" onclick="return confirm('Are you sure you want to delete this record')"><i class="fa fa-trash"></i> </a></td>
                          <td width="6%" align="center"><a href="<?php echo site_url("master/associate/view/$assoc_id"); ?>"  title="Edit"><i class="fa fa-eye"></i> </a></td>
                        </tr>
                        <?php }  ?>
                      </tbody>
                    </table>
                  </div>
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
