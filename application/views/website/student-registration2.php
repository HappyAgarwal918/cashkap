<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$segment3=$this->uri->segment(3);

?><!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="robots" content="index, follow">

	<meta property="og:type" content="website" />

	<meta property="og:locale" content="en_us" />

	<meta name="twitter:card" content="summary">

	<meta name="format-detection" content="telephone=no">

	<link rel="icon" href="<?php echo base_url();  ?>assets/website/images/favicon.ico" type="image/x-icon" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();  ?>assets/website/images/favicon.png" />

	<title><?php if(isset($siteTitle)){ echo $siteTitle; } ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>

	<script src="js/html5shiv.min.js"></script>

	<script src="js/respond.min.js"></script>

	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/assets.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/typography.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/shortcodes.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/style.css">

	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/color-1.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/layers.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/settings.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/navigation.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.min.css" />

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/custom.css">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/jquery-ui.css">
<?php include("includes/script.php"); ?>

</head>

<body id="bg">

<div class="page-wraper">

<div id="loading-icon-bx"></div>

   <?php include("includes/header.php"); ?>

    <div class="page-content">

        <!-- Page Heading Box ==== -->

        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">

            <div class="container">

                <div class="page-banner-entry">

                    <h1 class="text-white">Student Registration</h1>

				 </div>

            </div>

        </div>

		<div class="breadcrumb-row">

			<div class="container">

				<ul class="list-inline">

					<li><a href="<?php echo base_url(); ?>">Home</a></li>

                    <li><a href="<?php echo base_url("student/login"); ?>">Student Login</a></li>

					<li>Student Registration</li>

				</ul>

			</div>

		</div>

        

		<div class="content-block">

			<div class="section-area section-sp2">

                <div class="container">

                 <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>

                <div class="row">

                  <div class="col-md-12">

                    <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>

                  </div>

                </div>

                <?php  } ?>

                	<div class="row">

                    	<div class="col-md-12">

                        	<p class="text-center">Already have an account? <a href="<?php echo site_url("student/login"); ?>" class="logreg">Log In </a></p>

                        </div>    

                    </div>	

					 <div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12 m-b30">

             <div class="bg-gray padbox boxborder">

			<?php 

$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');

echo form_open("student/registration",$attributes);

			?>

              <div class="row">

              	<div class="col-md-12">

                	<div class="form-head">Personal Detail </div>

                </div>

              </div>

           		 <div class="row">

           	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Name <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_name',

            'id'=>'stureg_name',

            'type'=>'text',

			'maxlength'=>60,

            'class'=> "form-control",

            'value'=>set_value('stureg_name')));

            ?> <?php echo form_error('stureg_name'); ?> </div>

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Mobile Number <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_mobileno',

            'id'=>'stureg_mobileno',

            'type'=>'text',

			'maxlength'=>10,

            'class'=> "form-control",

            'value'=>set_value('stureg_mobileno')));

            ?> <?php echo form_error('stureg_mobileno'); ?> </div>

            

            </div>

              <div class="row">

           		 <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Email Id <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_email',

            'id'=>'stureg_email',

            'type'=>'text',

			'maxlength'=>80,

            'class'=> "form-control",

            'value'=>set_value('stureg_email')));

            ?> <?php echo form_error('stureg_email'); ?> </div>

            	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Date of Birth <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_dob',

            'id'=>'stureg_dob',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('stureg_dob')));

            ?> <?php echo form_error('stureg_dob'); ?> </div>

            	</div>

              <div class="row">

           		 <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Qualification <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_qualification',

            'id'=>'stureg_qualification',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('stureg_qualification')));

            ?> <?php echo form_error('stureg_qualification'); ?> </div>

            		

            	</div>

            

            

            <div class="row">

              	<div class="col-md-12">

                	<div class="form-head">Address </div>

                </div>

              </div>

              <div class="row">

           	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Address Line 1 <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_address_line1',

            'id'=>'stureg_address_line1',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('stureg_address_line1')));

            ?> <?php echo form_error('stureg_address_line1'); ?> </div>

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Address Line 2 </label>

                  <?php echo form_input(array(

            'name'=>'stureg_address_line2',

            'id'=>'stureg_address_line2',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('stureg_address_line2')));

            ?> <?php echo form_error('stureg_address_line2'); ?> </div>

            

              </div>

              <div class="row">

              <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Country <span class="req">*</span></label>

                  

				  <select class="form-control stureg_address_country" name="stureg_address_country">

                    <option value="">--Select--</option>

                    <?php foreach($countrydata as $countryrow){ ?>

                    <option value="<?php echo $countryrow->country_name; ?>" <?php echo set_select('stureg_address_country',$countryrow->country_name); ?>><?php echo $countryrow->country_name; ?></option>

                    <?php } ?>

                  </select>

				  

				  <?php echo form_error('stureg_address_country'); ?> </div>

                  

                  

           	

            

            <div class="form-group col-md-6 col-sm-12 col-xs-12 perma_stateindia">

                  <label>State <span class="req">*</span></label>

                  <select class="form-control" name="stureg_address_state">

                   <option value="">--Select--</option>

                    <?php foreach($statedata as $staterow){ ?>

                    <option value="<?php echo $staterow->state_name; ?>" <?php echo set_select('stureg_address_state',$staterow->state_name); ?>><?php echo $staterow->state_name; ?></option>

                    <?php } ?>

                  </select>

				  <?php echo form_error('stureg_address_state'); ?> </div>

            <div class="form-group col-md-6 col-sm-12 col-xs-12 perma_stateother">

                  <label>State <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_address_state',

            'id'=>'stureg_address_state',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('stureg_address_state')));

            ?> <?php echo form_error('stureg_address_state'); ?> </div>

            </div>

            <div class="row">

           	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>City <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_address_city',

            'id'=>'stureg_address_city',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('stureg_address_city')));

            ?> <?php echo form_error('stureg_address_city'); ?> </div>

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Pincode <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_address_pin',

            'id'=>'stureg_address_pin',

            'type'=>'text',

			'maxlength'=>6,

            'class'=> "form-control",

            'value'=>set_value('stureg_address_pin')));

            ?> <?php echo form_error('stureg_address_pin'); ?> </div>

            </div>  

            

            <div class="row">

              	<div class="col-md-12">

                	<div class="form-head">Create Your  Login Detail </div>

                </div>

              </div>

				<div class="row">

           	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Create Username <span class="note">(Min. 6-20 character)</span> <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_username',

            'id'=>'stureg_username',

            'type'=>'text',

			'maxlength'=>20,

            'class'=> "form-control",

            'value'=>set_value('stureg_username')));

            ?> <?php echo form_error('stureg_username'); ?> </div>

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Create Password  <span class="note">(Min. 6-20 character)</span> <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'stureg_password',

            'id'=>'stureg_password',

            'type'=>'password',

			'maxlength'=>20,

            'class'=> "form-control",

            'value'=>set_value('stureg_password')));

            ?> <?php echo form_error('stureg_password'); ?> </div>

            </div>

<div class="row">

           	<div class="form-group col-md-12 col-sm-12 col-xs-12">

                      

<?php echo form_checkbox('stureg_declaration','1',set_checkbox('stureg_declaration',"1")); ?>  I've read and accept the <a href="" target="_blank">terms & conditions</a>



<br/><?php echo form_error('stureg_declaration'); ?>

		

		

  </div>

            </div>

			



				







             <div class="row">

                <div class="form-group col-md-3 col-sm-12 col-xs-12">

                  <button class="btn btn-primary btn-custom-create" type="submit" name="subreg">Submit</button></div>

              </div>

              

              <?php form_close(); ?>

              		</div>	

						</div>

					</div>

				</div>

            </div>

			

		</div>

    </div>

   <?php include("includes/footer.php"); ?>

	 <button class="back-to-top fa fa-chevron-up" ></button>

</div>

<script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/jquery.bootstrap-touchspin.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/waypoints-min.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/functions.js"></script>

<script src="<?php echo base_url(); ?>assets/website/js/jquery-ui.js"></script><br>

<script type="text/javascript">

$('#stureg_dob').datepicker({

    dateFormat:'dd-mm-yy',

	changeYear: true,

	changeMonth: true,

	yearRange: "-60:+0"

});

</script>

<script type="text/javascript">

$(document).ready(function() {

toggleFields();

$(".stureg_address_country").change(function(){ toggleFields(); });

});

function toggleFields(){

 if($(".stureg_address_country").val()=="India"){ 

	$('.perma_stateother').hide(); 

	$('.perma_stateindia').show(); 

 }else{

	$('.perma_stateother').show(); 

	$('.perma_stateindia').hide(); 

 }

}

</script>

</body>

</html>

