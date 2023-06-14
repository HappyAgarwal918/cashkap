<?php defined('BASEPATH') OR exit('No direct script access allowed');
$segment4=$this->uri->segment(4);
$segment5=$this->uri->segment(5);
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
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/dashboard");  ?>">Home</a></li>
            <?php if($assocdata->assoc_status==1){ ?>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/associate/manage");  ?>">Manage Associates</a></li>
            <?php }elseif($assocdata->assoc_status==0){ ?>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/associate/manage-pending");  ?>">Manage Associates</a></li>
            <?php }?>
            <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
          </ol>
        </nav>
        
        
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Edit Course</h1>
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
            <?php 
			$attributes=array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');
			echo form_open("master/associate/edit-course/$segment4/$segment5",$attributes);
			?>
				<div class="row">

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">

                  <label>Course <span class="req">*</span></label>

                 <select class="form-control" name="acourse_courseid" disabled>

                    <option value="">--Select--</option>

                    <?php foreach($cocatdata as $cocatrow){ 

								$course_id=$cocatrow->course_id;

								$coursedata=$this->customcode->getAllCoursePerCategory($course_id);

								if(count($coursedata)>0){

					

					?>

                    <optgroup label="<?php echo $cocatrow->course_name; ?>">

                    		<?php foreach($coursedata as $courserow){ ?>

                            <option value="<?php echo $courserow->course_id; ?>" <?php echo set_select('acourse_courseid',$courserow->course_id,$coursemdata->acourse_courseid==$courserow->course_id); ?>><?php echo $courserow->course_name; ?></option>

                            <?php } ?>

                    </optgroup>

                    

                    <?php 

								}

					} ?>	

                  </select>

                   <?php echo form_error('acourse_courseid'); ?> </div>

            </div>
				<div class="row">

                    <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Duration <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'acourse_duration',

            'id'=>'acourse_duration',

            'type'=>'text',

			'placeholder'=>"For eg. 1 Year",

            'class'=> "form-control",

            'value'=>set_value('acourse_duration',$coursemdata->acourse_duration)));

            ?> <?php echo form_error('acourse_duration'); ?> </div>

            

            

           	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Total Seats <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'acourse_totalseats',

            'id'=>'acourse_totalseats',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('acourse_totalseats',$coursemdata->acourse_totalseats)));

            ?> <?php echo form_error('acourse_totalseats'); ?> </div>

            </div>
				<div class="row">

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Fee <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'acourse_coursefee',

            'id'=>'acourse_coursefee',

            'type'=>'text',

			'placeholder'=>"For eg. Rs. 14000/Sem",

            'class'=> "form-control",

            'value'=>set_value('acourse_coursefee',$coursemdata->acourse_coursefee)));

            ?> <?php echo form_error('acourse_coursefee'); ?> </div>

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Last Date <span class="req">*</span></label>

                  <?php
				  $last_date="";
			$acourse_lastdate=$coursemdata->acourse_lastdate;
			if($acourse_lastdate!=""){
				$last_date=date('d-m-Y',strtotime($acourse_lastdate));		
			}
			echo form_input(array(
			'name'=>'acourse_lastdate',
            'id'=>'acourse_lastdate',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('acourse_lastdate',$last_date)));
            ?> <?php echo form_error('acourse_lastdate'); ?> </div>

            

            </div>	
				<div class="row">
				<div class="form-group col-md-3 col-sm-12 col-xs-12">

                  <button class="btn btn-primary btn-custom-create" type="submit" name="addCourse">Submit</button>									</div>

              </div>
			<?php echo form_close(); ?>
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
<script src="<?php echo base_url(); ?>assets/master/js/jquery-ui.js"></script>
<script type="text/javascript">
$('#acourse_lastdate').datepicker({
    dateFormat:'dd-mm-yy',
	changeYear: true,
	changeMonth: true,
	yearRange: "-50:+0",

});

</script>
</body>
</html>
