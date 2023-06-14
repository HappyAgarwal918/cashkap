<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
<link href="<?php echo base_url(); ?>assets/master/css/jquery-ui.css" rel="stylesheet">
<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
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
<li class="breadcrumb-item"><a href="<?php echo site_url("master/video-gallery/manage");  ?>">Manage Videos</a></li>
<li class="breadcrumb-item active" aria-current="page">Add New Video</li>
  </ol>
</nav>


        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Add New Video</h1>
          
        </div>
        <!-- Content Row -->
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
          	<div class="inner-section">
             <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>
              <div class="col-md-12">
                <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
              </div>
              <?php  } ?>
              <?php 
		$attributes = array('class' => 'formAdmin form-horizontal','method'=>'post','autocomplete'=>'off');
		echo form_open_multipart("master/video-gallery/add-new",$attributes);
 			 ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Video Title <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'video_title',
				'id'    => 'video_title',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('video_title')));
				?> <?php echo form_error('video_title'); ?> </div>
                </div>
                 <div class="row">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Video Code <span class="req">*</span></label>
                    <?php echo form_textarea(array(
				'name'  => 'video_code',
				'id'    => 'video_code',
				'rows'  => 3,
				'class' => "form-control",
				'value' =>set_value('video_code',false)));
				?> <?php echo form_error('video_code'); ?> </div>
                
                </div>
                
                
                <div class="row">
                  
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Display Status <span class="req">*</span></label>
                    
                    <select name="video_status" class="form-control">
                    <option value="">--Select--</option>
<option value="1" <?php echo set_select('video_status',1); ?>>Active</option>
<option value="0" <?php echo set_select('video_status',0); ?>>Inactive</option>
				 </select>
<?php echo form_error('video_status'); ?>
                
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Display Order <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'video_disorder',
				'id'    => 'video_disorder',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('video_disorder')));
				?> <?php echo form_error('video_disorder'); ?> </div>
                
                </div>
                
                
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12 mtop20"> <?php echo form_button(array( 'name'=>'submit_video','id'=> 'submit_video','value'=> 'true','class'=>'btn btn-primary','type'=> 'submit','content' => 'Submit')); ?> </div>
                </div>
              </div>
              <?php echo form_close();?>
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
<script src="<?php echo base_url(); ?>assets/master/js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url(); ?>assets/master/js/jquery-ui.js"></script>
  <script>
  $( function() {
    $("#event_fromdate").datepicker({ dateFormat: 'dd-mm-yy' });
	 $("#event_todate").datepicker({ dateFormat: 'dd-mm-yy' });
  } );
  </script>
 <script> CKEDITOR.replace('event_description'); </script> 
</body>
</html>
