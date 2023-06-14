<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>

<html lang="en">

<head>

	
	<title><?php if(isset($siteTitle)){ echo $siteTitle; } ?></title>

<?php include("includes/head.php"); ?>

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

                    <h1 class="text-white">Career</h1>

				 </div>

            </div>

        </div>

		<div class="breadcrumb-row">

			<div class="container">

				<ul class="list-inline">

					<li><a href="<?php echo base_url(); ?>">Home</a></li>

					<li>Career</li>

				</ul>

			</div>

		</div>

		<div class="page-banner  section-sp2">

            <div class="container">

					 <div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12 m-b30">

             <div class="bg-gray padbox boxborder">

			<?php 

$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');

echo form_open("career",$attributes);

			?>

           

               <div class="row">

           	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Name<span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'career_name',

            'id'=>'career_name',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('career_name')));

            ?> <?php echo form_error('career_name'); ?> </div>

             

              

				<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Mobile Number <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'career_mobile',

            'id'=>'career_mobile',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('career_mobile')));

            ?> <?php echo form_error('career_mobile'); ?> </div>	 

            

            

             </div>

          

             

             

             

              <div class="row">

           	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Email Id <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'career_email',

            'id'=>'career_email',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('career_email')));

            ?> <?php echo form_error('career_email'); ?> </div>

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Qualification <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'career_qualification',

            'id'=>'career_qualification',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('career_qualification')));

            ?> <?php echo form_error('career_qualification'); ?> </div>

           </div>

					<div class="row">

                    <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Total Experience <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'career_experience',

            'id'=>'career_experience',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('career_experience')));

            ?> <?php echo form_error('career_experience'); ?> </div>

            

            

           	<div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Expected Salary <span class="note">(per month)</span> <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'career_expsalary',

            'id'=>'career_expsalary',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('career_expsalary')));

            ?> <?php echo form_error('career_expsalary'); ?> </div>

            

           

            

           	

            

            </div>

            	

            <div class="row">

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Current Location <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'career_location',

            'id'=>'career_location',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('career_location')));

            ?> <?php echo form_error('career_location'); ?> </div>

            

            <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Resume <span class="req">*</span></label>

                   <?php echo form_input(array(

				'name'  => 'career_resume',

				'id'    => 'career_resume',

				'type'  => 'file',

				'class' => "form-control",

				'value' =>set_value('career_resume')));

				?> 

                  

                  <?php echo form_error('career_resume'); ?> </div>

            

            </div>

           

             <div class="row">

                <div class="form-group col-md-3 col-sm-12 col-xs-12">

                  <button class="btn btn-primary btn-custom-create" type="submit" name="subreg">Submit</button></div>

              </div>

              

              <?php echo form_close(); ?>

              		</div>	

						</div>

					</div>

				</div>

    </div>

   <?php include("includes/footer.php"); ?>

	 <button class="back-to-top fa fa-chevron-up" ></button>

</div>

<?php include("includes/script.php"); ?>

</body>

</html>

