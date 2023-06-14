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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/master/css/jquery-ui.css">
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
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/academic-session/manage");  ?>">Manage Session</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/academic-session/manage-fee/$segment4");  ?>">Manage Fee</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Fee</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Add Fee</h1>
        </div>
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
              <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>
              <div class="col-md-12">
                <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
              </div>
              <?php  } ?>
              <?php 
			  	$attributes = array('class' => 'formAdmin form-horizontal','name'=>'chpassform','id'=>'formuser','method'=>'post','autocomplete'=>'off');
				echo form_open_multipart("master/course/add",$attributes);
 			 ?>
              <div class="col-md-12">
              <div class="row">
              <div class="col-md-6">
                    <div class="form-group">
                      <label>Course Level <span class="req">*</span></label>
                      <select name="course_eduparent" class="form-control">
                      	<option value="">--Select--</option>
                      <?php  foreach($cocatdata as $cocatrow){ ?>
                        <option value="<?php echo $cocatrow->course_id; ?>"  <?php echo set_select('course_eduparent',$cocatrow->course_id); ?>><?php echo $cocatrow->course_name; ?></option>
                       <?php } ?> 
                      </select>
                      <?php echo form_error('course_eduparent'); ?> </div>
                  </div>
             <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Course Name <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'course_name',
				'id'    => 'course_name',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('course_name')));
				?> <?php echo form_error('course_name'); ?> </div>
                
              </div>
                <div class="row">
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Course Slug <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'course_slug',
				'id'    => 'course_slug',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('course_slug')));
				?> <?php echo form_error('course_slug'); ?> </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Status <span class="req">*</span></label>
                      <select name="course_status" class="form-control">
                        <option value="1"  <?php echo set_select('course_status',1); ?>>Active</option>
                         <option value="0"  <?php echo set_select('course_status',0); ?>>Inactive</option>
                      </select>
                      <?php echo form_error('course_status'); ?> </div>
                  </div>
           		
                </div>
                <div class="row">
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Display Order <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'course_disorder',
				'id'    => 'course_disorder',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('course_disorder')));
				?> <?php echo form_error('course_disorder'); ?> </div>
                	<div class="col-md-6">
                    <div class="form-group">
                      <label>Show in Institute Menu <span class="req">*</span></label>
                      <select name="course_catsubmenu" class="form-control">
                      	<option value="0"  <?php echo set_select('course_catsubmenu',0); ?>>No</option>
                        <option value="4"  <?php echo set_select('course_catsubmenu',4); ?>>Yes</option>
                      </select>
                     <?php echo form_error('course_catsubmenu'); ?> </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12 mtop20"> 
					<button name="addCourse" class="btn btn-primary" type="submit">Submit</button>
			 </div>
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
<script type="text/javascript">
$('#staff_dob').datepicker({
    dateFormat:'dd-mm-yy',
	changeYear: true,
	changeMonth: true,
	yearRange: "-80:+0",
});
</script>
<script type="text/javascript">
$('#staff_doj').datepicker({
    dateFormat:'dd-mm-yy',
	changeYear: true,
	changeMonth: true,
	yearRange: "-50:+0",
});
</script>
</body>
</html>