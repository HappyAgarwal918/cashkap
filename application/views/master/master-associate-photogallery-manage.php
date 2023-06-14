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
            <?php if($assocdata->assoc_status==1){ ?>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/associate/manage");  ?>">Manage Associates</a></li>
            <?php }elseif($assocdata->assoc_status==0){ ?>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/associate/manage-pending");  ?>">Manage Associates</a></li>
            <?php }?>
            <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Photo Gallery</h1>
        </div>
        <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>
        <div class="row">
          <div class="col-md-12">
            <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
          </div>
        </div>
        <?php  } ?>
        <?php include("includes/associate-header.php"); ?>
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
             
              <div class="row">
                <div class="col-md-12">
                  <table style="width:100%" class="table table-bordered custom-table">
                    <tr>
                      <th width="9%">Sr.</th>
                      <th width="76%">Photo</th>
                        <th width="5%">Delete</th>
                      <th width="5%">Edit</th>
                    </tr>
                    <?php 

  $sr=1;

  if(count($photogaldata)>0){

  foreach($photogaldata as $photogalrow){
	  	$assocph_id=$photogalrow->assocph_id;
	   ?>
                    <tr>
                      <td><?php echo $sr; ?></td>
                      <td><?php $assocph_photo=$photogalrow->assocph_photo; 

	if($assocph_photo!=""){ ?>
                        <img src="<?php echo base_url().$assocph_photo; ?>" class="galpic"/>
                        <?php } ?></td>
                        <td><a href="<?php echo site_url("master/associate/remove-gallery/$segment4/$assocph_id"); ?>" onclick="return confirm('Are you sure you want to delete this record')">Delete</a></td>
                      <td><a href="<?php echo site_url("master/associate/edit-gallery/$segment4/$assocph_id"); ?>">Edit</a></td>
                    </tr>
                    <?php

  $sr++;

   }

  }else{ ?>
                    <tr>
                      <td colspan="4">No record found..</td>
                    </tr>
                    <?php }?>
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
