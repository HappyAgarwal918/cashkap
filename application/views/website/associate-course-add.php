<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>

<html lang="en">

<head>



    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dashboard/images/favicon.png" />

    <!-- PAGE TITLE HERE ============================================= -->
    <title><?php if (isset($siteTitle)) {
                echo $siteTitle;
            } ?></title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/assets.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/vendors/calendar/fullcalendar.css">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/typography.css">


    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/shortcodes/shortcodes.css">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/dashboard.css">
    <link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/color/color-1.css">
    <link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dashboard/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/vendors/datepicker/css/jquery-ui.css">

    <?php include("includes/script.php"); ?>
</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">

    <!-- header start -->
    <?php include("includes/associate-header.php"); ?>
    <!-- header end -->

    <!-- Left sidebar menu start -->
    <?php include("includes/associate-sidebar.php"); ?>
    <!-- Left sidebar menu end -->

    <!--Main container start -->
    <main class="ttr-wrapper">
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">Courses</h4>
                <ul class="db-breadcrumb-list">
                    <li><a href="<?php echo site_url("associate/dashboard"); ?>"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="<?php echo site_url("associate/courses"); ?>">Courses</a></li>
                    <li>Add Course</li>
                </ul>
            </div>
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Add Course</h4>
                </div>
                <div class="widget-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $attributes = array('class' => 'create_account style2 ', 'method' => 'post', 'autocomplete' => 'off');
                            echo form_open("associate/course/add", $attributes);
                            ?>
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label>Course <span class="req">*</span></label>
                                    <select class="form-control" name="acourse_courseid">
                                        <option value="">--Select--</option>
                                        <?php foreach ($cocatdata as $cocatrow) {
                                            $course_id = $cocatrow->course_id;
                                            $coursedata = $this->customcode->getAllCoursePerCategory($course_id);
                                            if (count($coursedata) > 0) {
                                        ?>
                                                <optgroup label="<?php echo $cocatrow->course_name; ?>">
                                                    <?php foreach ($coursedata as $courserow) { ?>
                                                        <option value="<?php echo $courserow->course_id; ?>" <?php echo set_select('acourse_courseid', $courserow->course_id); ?>><?php echo $courserow->course_name; ?></option>
                                                    <?php } ?>
                                                </optgroup>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                    <?php echo form_error('acourse_courseid'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <label>Duration <span class="req">*</span></label>
                                    <?php echo form_input(array(
                                        'name' => 'acourse_duration',
                                        'id' => 'acourse_duration',
                                        'type' => 'text',
                                        'placeholder' => "For eg. 1 Year",
                                        'class' => "form-control",
                                        'value' => set_value('acourse_duration')
                                    ));
                                    ?> <?php echo form_error('acourse_duration'); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <label>Total Seats <span class="req">*</span></label>
                                    <?php echo form_input(array(
                                        'name' => 'acourse_totalseats',
                                        'id' => 'acourse_totalseats',
                                        'type' => 'text',
                                        'class' => "form-control",
                                        'value' => set_value('acourse_totalseats')
                                    ));
                                    ?> <?php echo form_error('acourse_totalseats'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <label>Fee <span class="req">*</span></label>
                                    <?php echo form_input(array(
                                        'name' => 'acourse_coursefee',
                                        'id' => 'acourse_coursefee',
                                        'type' => 'text',
                                        'placeholder' => "For eg. Rs. 14000/Sem",
                                        'class' => "form-control",
                                        'value' => set_value('acourse_coursefee')
                                    ));
                                    ?> <?php echo form_error('acourse_coursefee'); ?>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <label>Last Date <span class="req">*</span></label>
                                    <?php echo form_input(array(
                                        'name' => 'acourse_lastdate',
                                        'id' => 'acourse_lastdate',
                                        'type' => 'text',
                                        'class' => "form-control",
                                        'value' => set_value('acourse_lastdate')
                                    ));
                                    ?> <?php echo form_error('acourse_lastdate'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                    <button class="btn btn-primary btn-custom-create" type="submit" name="addCourse">Submit</button>
                                </div>
                            </div>
                            <?php form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="ttr-overlay"></div>
    <script src="<?php echo base_url(); ?>assets/dashboard/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashboard/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src='<?php echo base_url(); ?>assets/dashboard/vendors/scroll/scrollbar.min.js'></script>
    <script src="<?php echo base_url(); ?>assets/dashboard/vendors/chart/chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashboard/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashboard/vendors/datepicker/js/jquery-ui.js"></script>
    <script type="text/javascript">
        $('#acourse_lastdate').datepicker({
            dateFormat: 'dd-mm-yy',
            changeYear: true,
            changeMonth: true,
            yearRange: "-50:+0",
        });
    </script>
</body>
</html>