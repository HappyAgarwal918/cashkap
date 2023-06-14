<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>
        <?php if (isset($siteTitle)) {
            echo $siteTitle;
        } ?>
    </title>
    <?php include("includes/head.php"); ?>
    <style>
        .row {
            color: black;
        }
    </style>

</head>

<body id="bg">

    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <?php include("includes/header.php"); ?>
        <div class="page-content">

            <!-- Page Heading Box ==== -->

            <div class="page-banner " style="background-image:url(<?php echo base_url(); ?>assets/website/images/cntbnr.jpg);">
                <div class="container">
                    <div class="page-banner-entry">
                        <h1 class="text-white">Contact Us</h1>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>study/abroad">Study Abroad</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
            <div class="page-banner contact-page section-sp2">
                <div class="container">

                    <?php if (isset($_REQUEST['sent']) && $_REQUEST['sent'] == 1) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Thank You. Your query submitted successfully. Our representative will revert you soon.</div>
                            </div>
                        </div>
                    <?php  } ?>
                    <div class="row mb-3">
                        <div class="col-md-4 text-center mb-4">
                            <a href="#" class="social-button">
                                <i class="fa fa-map-marker"></i>
                            </a><br><br>
                            SCO 67 Phase 3B2, S.A.S Nagar, 160059, Mohali India
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <a href="#" class="social-button">
                                <i class="fa fa-mobile"></i>
                            </a><br><br>
                            098880 42255 (9:30AM to 6:30PM Support Line)
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <a href="#" class="social-button">
                                <i class="fa fa-envelope-o"></i>
                            </a><br><br>
                            info@cashkap.com
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <?php $attributes = array('class' => ' ', 'method' => 'post', 'autocomplete' => 'off');
                            echo form_open("contact-us", $attributes); ?>
                            <div class="ajax-message"></div>
                            <div class="heading-bx text-center">
                                <h2 class="title-head">Get In Touch</h2>
                                <img data-aos="fade-down" src="http://localhost/cashkap/assets/website/images/barr.svg" class="aos-init aos-animate mb-4">


                            </div>
                            <div class="row placeani">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Name <span class="req">*</span></label>
                                        <?php echo form_input(array(
                                            'name'  => 'name',
                                            'id'    => 'name',
                                            'type'  => 'text',
                                            'maxlength'  => 60,
                                            'class' => "form-control",
                                            'value' => set_value('name')
                                        ));
                                        ?> <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Email Address <span class="req">*</span></label>
                                        <?php echo form_input(array(
                                            'name'  => 'email',
                                            'id'    => 'email',
                                            'type'  => 'text',
                                            'maxlength'  => 100,
                                            'class' => "form-control",
                                            'value' => set_value('email')
                                        ));
                                        ?> <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Phone <span class="req">*</span></label>
                                        <?php echo form_input(array(
                                            'name'  => 'contact_number',
                                            'id'    => 'contact_number',
                                            'type'  => 'text',
                                            'maxlength'  => 10,
                                            'onkeypress' => 'return IsNumeric(event);',
                                            'class' => "form-control",
                                            'value' => set_value('contact_number')
                                        ));
                                        ?> <?php echo form_error('contact_number'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Subject <span class="req">*</span></label>
                                        <?php echo form_input(array(
                                            'name'  => 'subject',
                                            'id'    => 'subject',
                                            'type'  => 'text',
                                            'class' => "form-control",
                                            'value' => set_value('subject')
                                        ));
                                        ?> <?php echo form_error('subject'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Type Message <span class="req">*</span></label>
                                        <?php echo form_textarea(array(
                                            'name' => 'message',
                                            'id' => 'message',
                                            'type' => 'text',
                                            'maxlength' => 500,
                                            'rows' => '2',
                                            'class' => "form-control",
                                            'value' => set_value('message')
                                        ));
                                        ?> <?php echo form_error('message'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" id="submit" name="submit" value="Send Message" class="btn button-md rdmr4">
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <h3>Follow Us</h3>
                            <img data-aos="fade-down" src="http://localhost/cashkap/assets/website/images/barr.svg" class="aos-init aos-animate mb-4">
                            <ul class="list-inline contact-social-bx">
                                <li><a href="https://www.facebook.com/Cash-kap-111695841279893" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/cash_kap" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/cash_kap/" class="btn outline radius-xl"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://api.whatsapp.com/send?phone=+919592502502&text=Hello" class="btn outline radius-xl"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27440.91044063107!2d76.71829258038386!3d30.71520088338138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf211a2be1bb415a6!2sCashkap!5e0!3m2!1sen!2sin!4v1641534987500!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <button class="back-to-top fa fa-chevron-up"></button>
    </div>
    <?php include("includes/script.php"); ?>

</body>

</html>