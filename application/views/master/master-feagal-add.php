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
<link href="<?php echo base_url(); ?>assets/master/css/jquery-ui.css" rel="stylesheet">
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
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/featured-gallery/manage");  ?>">Manage Images</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New photo</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Add  New Photo</h1>
        </div>
        
        <!-- Content Row -->
        
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
          <?php $attributes = array('class' => 'tender-form form-horizontal','method'=>'post','autocomplete'=>'off');   	echo form_open_multipart("master/featured-gallery/add-new",$attributes);

 			 ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Title <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'feagal_title',
				'id'    => 'feagal_title',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('feagal_title')));
				?> <?php echo form_error('feagal_title'); ?> </div>
                </div>
                <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Display Order <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'feagal_disorder',
				'id'    => 'feagal_disorder',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('feagal_disorder')));
				?> <?php echo form_error('feagal_disorder'); ?> </div>
                
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Thumbnail <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'feagal_thumb',
				'id'    => 'feagal_thumb',
				'type'  => 'file',
				'class' => "form-control",
				'value' =>set_value('feagal_thumb')));
				?> <?php echo form_error('feagal_thumb'); ?> <span class="error1">
                    <?php if(isset($error)){ echo $error; } ?>
                    </span> </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12"> <?php echo form_button(array( 'name'=>'submit_feagal','id'=> 'submit_feagal','value'=> 'true','class'=>'btn btn-primary','type'=> 'submit','content' => 'Submit')); ?> </div>
                </div>
              </div>
              <?php echo form_close();?> </div>
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
<script src="<?php echo base_url(); ?>assets/master/js/jquery-ui.js"></script> 
<script>
  $( function() {
    $("#media_date").datepicker({ dateFormat: 'dd-mm-yy' });
  });
  </script>
</body>
</html>
