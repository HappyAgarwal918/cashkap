<?php

defined('BASEPATH') or exit('No direct script access allowed');

$segment3 = $this->uri->segment(3);
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <title>
    <?php if (isset($siteTitle)) {
      echo $siteTitle;
    } ?>
  </title>
  <?php include "includes/head.php"; ?>
  <link href="<?php echo base_url(); ?>assets/website/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jquery.datetimepicker.css" />
  <style>
    span.select2-selection.select2-selection--single {
      border-radius: 0px !important;
      box-shadow: 3px 3px 7px -3px !important;
      height: calc(2.25rem + 2px) !important;
      box-shadow: none !important;
      font-size: 13px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 0px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 28px !important;
    }
  </style>
</head>

<body id="bg">
  <div class="page-wraper">
    <div id="loading-icon-bx"></div>
    <?php include "includes/header.php"; ?>
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
            <li><a href="<?php echo base_url("student/login"); ?>">Signup</a></li>
            <li>Student Registration</li>
          </ul>
        </div>
      </div>
      <div class="content-block">
        <div class="section-area section-sp2">
          <div class="container">
            <?php if ($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')) { ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
                </div>
              </div>
            <?php } ?>

            <div class="row">
              <div class="col-md-12">
                <p class="text-center">Already have an account? <a href="<?php echo site_url("student/login"); ?>" class="logreg">Log In </a></p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                <div class="bg-gray padbox boxborder">
                  <?php
                  $attributes = array('class' => 'create_account style2 ', 'method' => 'post', 'autocomplete' => 'off');

                  echo form_open("student/registration", $attributes);

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

                        'name' => 'stureg_name',

                        'id' => 'stureg_name',

                        'type' => 'text',

                        'maxlength' => 60,

                        'class' => "form-control",

                        'value' => set_value('stureg_name')
                      ));

                      ?> <?php echo form_error('stureg_name'); ?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                      <label>Mobile Number <span class="req">*</span></label>
                      <?php echo form_input(array(

                        'name' => 'stureg_mobileno',

                        'id' => 'stureg_mobileno',

                        'type' => 'text',

                        'maxlength' => 10,

                        'class' => "form-control",

                        'value' => set_value('stureg_mobileno')
                      ));

                      ?> <?php echo form_error('stureg_mobileno'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                      <label>Email Id <span class="req">*</span></label>
                      <?php echo form_input(array(

                        'name' => 'stureg_email',
                        'id' => 'stureg_email',
                        'type' => 'text',
                        'maxlength' => 80,
                        'class' => "form-control",

                        'value' => set_value('stureg_email')
                      ));

                      ?> <?php echo form_error('stureg_email'); ?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                      <label>Date of Birth <span class="req">*</span></label>
                      <div style="display: flex; justify-content: space-between;">
                      
                      <select class="select form-control" id="stureg_date" name="stureg_date" style="width: 30%;">
                        <option value="" selected="selected">Day</option>
                        <?php foreach ($dates as $date) { ?>
                          <option value="<?php echo $date->date ?>"><?php echo $date->date ?></option>
                        <?php } ?>
                      </select>
                      <select class="select form-control" id="stureg_month" name="stureg_month" style="width: 30%;">
                        <option value="" selected="selected">Month</option>
                        <?php foreach ($months as $month) { ?>
                          <option value="<?php echo $month->id ?>"><?php echo $month->month ?></option>
                        <?php } ?>
                      </select>
                     
                      <select class="select form-control" id="stureg_year" name="stureg_year" style="width: 30%;">
                        <option value="" selected="selected">Year</option>
                        <?php foreach ($years as $year) { ?>
                          <option value="<?php echo $year->year ?>"><?php echo $year->year ?></option>
                        <?php } ?>
                      </select>
                      </div>
                      <?php echo form_error('stureg_dob'); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                      <label>Qualification <span class="req">*</span></label>

                      <?php echo form_input(array(

                        'name' => 'stureg_qualification',

                        'id' => 'stureg_qualification',

                        'type' => 'text',

                        'maxlength' => 80,

                        'class' => "form-control",

                        'value' => set_value('stureg_qualification'),
                      ));

                      ?>
                      <?php echo form_error('stureg_qualification'); ?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                      <label>Course Interested <span class="req">*</span></label>
                      <select class=" form-control select2" name="stureg_course_" id="stureg_course" tabindex="-1">
                        <option value="">Select Course</option>
                      </select>
                      <p class="errorhome"><?php echo form_error('course_id'); ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-head">Address </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-sm-12 col-xs-12 perma_stateother">
                      <label>State </label>
                      <select class=" form-control " name="stureg_address_state" id="state">
                        <option value="">Select State</option>
                        <?php foreach ($statedata as $staterow) { ?>
                          <option value="<?php echo $staterow->state_name; ?>" <?php echo set_select('state', $staterow->state_name); ?>><?php echo $staterow->state_name; ?></option>
                        <?php } ?>
                      </select>
                      <?php echo form_error('stureg_address_state'); ?>
                    </div>

                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                      <label>City </label>
                      <?php echo form_input(array(

                        'name' => 'stureg_address_city',

                        'id' => 'stureg_address_city',

                        'type' => 'text',

                        'class' => "form-control",

                        'value' => set_value('stureg_address_city'),
                      ));

                      ?> <?php echo form_error('stureg_address_city'); ?>
                    </div>
                  </div>

                  <!-- ---------------start--------------------- -->
                  <?php
                  $id = $this->session->userdata('stusesid');
                  if (empty($id)) {
                  ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-head">Create your Login Detail </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>

                  <div class="row">
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                      <label>Create Username <span class="note">(Min. 6-20 character)</span> <span class="req">*</span></label>
                      <?php echo form_input(array(

                        'name' => 'stureg_username',

                        'id' => 'stureg_username',

                        'type' => 'text',

                        'maxlength' => 50,
                        'readonly' => true,
                        'class' => "form-control",

                        'value' => set_value('stureg_username')
                      ));

                      ?> <?php echo form_error('stureg_username'); ?>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                      <label>Create Password <span class="note">(Min. 6-20 character)</span> <span class="req">*</span></label>
                      <?php echo form_input(array(

                        'name' => 'stureg_password',

                        'id' => 'stureg_password',

                        'type' => 'password',

                        'maxlength' => 20,

                        'class' => "form-control",

                        'value' => set_value('stureg_password')
                      ));

                      ?> <?php echo form_error('stureg_password'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12"> <?php echo form_checkbox('stureg_declaration', '1', set_checkbox('stureg_declaration', "1")); ?> I've read and accept the <a href="javascript:void(0)" data-toggle="modal" data-target="#termscond">terms & conditions</a> <span class="req">*</span> <br />
                      <?php echo form_error('stureg_declaration'); ?> </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <button class="btn btn-primary btn-custom-create" type="submit" onclick="analaticscript()" name="subreg">Submit</button>
                    </div>
                  </div>
                  <?php form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "includes/footer.php"; ?>
    <button class="back-to-top fa fa-chevron-up"></button>
  </div>
  
  <?php include "includes/script.php"; ?>
  <script src="<?php echo base_url(); ?>assets/website/js/gijgo.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/jquery.datetimepicker.full.min.js"></script>
  <script type="text/javascript">
    $("#stureg_email").on("keyup", function() {
      var value = $(this).val();
      $("#stureg_username").val(value);
    });
  </script>
  <script type="text/javascript">
    //   jQuery('#stureg_dob').datetimepicker({
    //  timepicker:false,
    //  format: 'd-m-Y',
    //  mask:true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
    // });
  </script>
  <!-- <script>
        $('.stureg_dob').datepicker({
            uiLibrary: 'bootstrap4',
			format: 'dd-mm-yyyy'
        });
    </script> -->
  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  </script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: "<?php echo base_url(); ?>get-course",
        method: "GET",
        success: function(data) {
          $('#stureg_course').html(data);
        }
      });
    });
    $(document).ready(function() {
      $.ajax({
        url: "<?php echo base_url(); ?>get/DOB",
        method: "GET",
        dataType: "JSON",
        success: function(data) {
          // $('#stureg_course').html(data);
          console.log('data--------', data);
        }
      });
    });
    
     function analaticscript(){
       //  fbq('track', 'CompleteRegistration');
       console.log("hello-------------")
    }
    
  </script>
  <div class="modal fade" id="termscond" tabindex="-1" role="dialog" aria-labelledby="termscondTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termscondTitle">Terms & Conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="model_list">
            <li>Portal gives the best coaching institute to Students as a facilitator.</li>
            <li>Student should come to log in on portal site. And give student information to coaching institute.</li>
            <li>In case student give any fake information and documents to portal in this condition portal is liable to close the admission file.</li>
            <li>Portal generates a code for student admission. Code valid for 72 hours only.</li>
            <li>Portal gives students details and code to the coaching institute.</li>
            <li>Portal sends that code to student and coaching institute as well.</li>
            <li>In case the code was expiring student come to portal and regenerate the code.</li>
            <li>After admission student is liable to adopt institute policies.</li>
            <li>In case coaching institute and student have any dispute financially and legally. Student and college discuss the matter and solve it themselves. Portal is not interfere and responsible for that.</li>
            <li>Once after the admission is done portal is not responsible for anything for any student and coaching institute issues.</li>
            <li>When student go for the admission that time student have to submit the code to institute to eligible for admission.</li>
            <li>When student complete the admission process and also deposit the fee. Student have to come to the portal to upload the fee deposit scanned sleep and liable to get 10% cash back.</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>