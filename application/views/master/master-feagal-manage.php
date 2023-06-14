<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
          <h1 class="h3 mb-0 text-gray-800 mb-2">Manage Images</h1>
          <a href="<?php echo site_url('master/featured-gallery/add-new'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" title="Add New Photo"><i class="fas fa-angle-right text-white-50"></i> Add New Photo</a> </div>
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
                    <th width="7%">Sr.</th>
                    <th width="14%"> Thumb </th>
                    <th width="56%">Title</th>
                    <th width="56%">Popup Pic</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
        <?php 
		$sr=1;
		foreach($feaimgdata as $feaimgrow){
		$feagal_id=$feaimgrow->feagal_id;
		$feagal_thumb=$feaimgrow->feagal_thumb;
		$feagal_orgpic=$feaimgrow->feagal_orgpic;

		

		?>
                  <tr>
                    <td><?php echo $sr; ?></td>
                    <td><?php if($feagal_thumb!=""){?>
                      <img src="<?php echo base_url().$feagal_thumb; ?>" class="imgpic"/>
                      <?php } ?></td>
                    <td><?php echo $feaimgrow->feagal_title; ?></td>
                    <td><?php if($feagal_orgpic!=""){ ?>
                      <img src="<?php echo base_url().$feagal_orgpic; ?>" class="imgpic"/>
                      <?php }?>
                      <br/>
                      <a href="<?php echo site_url("master/featured-gallery/add-image/$feagal_id"); ?>" class="add_change">Add/Change Picture</a></td>
                    <td width="5%" align="center"><a href="<?php echo site_url("master/featured-gallery/delete/$feagal_id"); ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fas fa-trash-alt"></i> </a></td>
                    <td width="4%" align="center"><a href="<?php echo site_url("master/featured-gallery/edit/$feagal_id"); ?>" title="Edit"><i class="fas fa-pencil-alt"></i> </a></td>
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
