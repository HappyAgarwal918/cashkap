<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- POPUP  LIKING START -->
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>

    <style>
        /* Text alignment for body */
        .popupbody {
            text-align: center;
        }

        /* Styling h1 tag */
        h1 {
            color: green;
            text-align: center;
        }

        /* Styling modal */
        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
        }

        .modal-dialog {
            display: inline-block;
            vertical-align: middle;
        }

        .modal .modal-content {
            padding: 20px 20px 20px 20px;
            -webkit-animation-name: modal-animation;
            -webkit-animation-duration: 0.5s;
            animation-name: modal-animation;
            animation-duration: 0.5s;
        }

        @-webkit-keyframes modal-animation {
            from {
                top: -100px;
                opacity: 0;
            }

            to {
                top: 0px;
                opacity: 1;
            }
        }

        @keyframes modal-animation {
            from {
                top: -100px;
                opacity: 0;
            }

            to {
                top: 0px;
                opacity: 1;
            }
        }
    </style>
    <!-- END -->
    <title>
        <?php if (isset($siteTitle)) {
            echo $siteTitle;
        } ?>
    </title>

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
                        <h1 class="text-white"><?php echo $catmdata->assoccat_menutitle; ?></h1>
                    </div>
                </div>
            </div>
            <?php $assoccat_slug = $catmdata->assoccat_slug; ?>
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><?php echo $catmdata->assoccat_menutitle; ?></li>
                    </ul>
                </div>
            </div>
            <div class="content-block">
                <div class="section-area section-sp5 listing-detailpage">
                    <div class="container">
                        <div class="row">
                            <div class="col next-style text-left">
                                <?php $back_button = $this->session->userdata('back_button'); ?>
                                <div class="col-md-1">
                                    <a href="<?php echo $back_button; ?>"><button class=" fa fa-arrow-left btn radius-xl text-uppercase btn-new-apply"> &nbsp; Back</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="courses-post">
                                            <div class="ttr-post-info">
                                                <div class="row">
                                                    <div class="ttr-post-title col-md-9">
                                                        <h2 class="post-title"><?php echo $assocdata->assoc_instconame; ?></h2>
                                                    </div>
                                                    <div class="ttr-post-title col-md-3" style="align-self: center;">
                                                        <?php
                                                        //echo form_open('student/get-discount');
                                                        //echo form_hidden('app_associd', $assocdata->assoc_id);
                                                        ?>
                                                        <a href="#signupModal" data-toggle="modal">
                                                            <button class="btn radius-xl text-uppercase btn-apply-main btn-new-apply"> Apply Now </button></a>
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                                <div class="social_dtpage">
                                                    <?php
                                                    $assoc_map_location = $assocdata->assoc_map_location;
                                                    $assoc_social_facebook = $assocdata->assoc_social_facebook;
                                                    $assoc_social_instagram = $assocdata->assoc_social_instagram;
                                                    $assoc_social_twitter = $assocdata->assoc_social_twitter;
                                                    $assoc_social_website = $assocdata->assoc_social_website;
                                                    ?>
                                                    <div class="social_dtpage_widget">
                                                        <div class="profile-social">
                                                            <ul class="list-inline m-a0">
                                                                <?php if ($assoc_social_facebook != "") { ?>
                                                                    <li><a href="<?php echo $assoc_social_facebook; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                                <?php } ?>
                                                                <?php if ($assoc_social_instagram != "") { ?>
                                                                    <li><a href="<?php echo $assoc_social_instagram; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                                <?php } ?>
                                                                <?php if ($assoc_social_twitter != "") { ?>
                                                                    <li><a href="<?php echo $assoc_social_twitter; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                                <?php } ?>
                                                                <?php if ($assoc_social_website != "") { ?>
                                                                    <li><a href="<?php echo $assoc_social_website; ?>" target="_blank" title="Website"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
                                                                <?php } ?>
                                                                <?php if ($assoc_map_location != "") { ?>
                                                                    <li><a href="<?php echo $assoc_map_location; ?>" target="_blank" title="Location"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ttr-post-text">
                                                    <p><?php echo $assocdata->associate_about; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="home" aria-selected="true">Information</a> </li>
                                            <li class="nav-item"> <a class="nav-link" id="profile-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="profile" aria-selected="false">Courses/Fee Detail</a> </li>
                                            <li class="nav-item"> <a class="nav-link" id="facilities-tab" data-toggle="tab" href="#facilities" role="tab" aria-controls="facilities" aria-selected="false">Facilities</a> </li>


                                            <li class="nav-item"> <a class="nav-link" id="achievement-tab" data-toggle="tab" href="#achievement" role="tab" aria-controls="achievement" aria-selected="false">Achievement</a> </li>

                                            <li class="nav-item"> <a class="nav-link" id="contact-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="contact" aria-selected="false">Photo/Video Gallery</a> </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if ($assocdata->assoc_category == 1) { ?>
                                                            <table style="width:100%" class="table table-bordered table-striped">
                                                                <tr>
                                                                    <td width="38%">Total Area in acres</td>
                                                                    <td width="62%"><?php echo $assocdata->assoc_totalarea; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Construction Area (in Sqm)</td>
                                                                    <td><?php echo $assocdata->assoc_consarea; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Affiliated To</td>
                                                                    <td><?php echo $assocdata->assoc_affibody; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Google Rank</td>
                                                                    <td><?php echo $assocdata->assoc_edurank; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Teaching Staff (Graduate)</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher_graduate; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Teaching Staff (Master's)</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher_masters; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Teaching Staff (PhD)</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher_phd; ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Total Staff</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher; ?></td>
                                                                </tr>




                                                                <tr>
                                                                    <td>Student Strength of last Session</td>
                                                                    <td><?php echo $assocdata->assoc_lastses_nostudent; ?></td>
                                                                </tr>



                                                                <tr>
                                                                    <td>Last Session Result Precentage</td>
                                                                    <td><?php echo $assocdata->assoc_lastsesresult; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Last Session Placement % of Students </td>
                                                                    <td><?php echo $assocdata->assoc_lastses_placement; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Company location of placements</td>
                                                                    <td><?php echo $assocdata->assoc_placement_loc; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><?php echo $assocdata->assoc_address_line1;
                                                                        if ($assocdata->assoc_address_line2 != "") {
                                                                            echo ", " . $assocdata->assoc_address_line2;
                                                                        } ?>, <?php echo $assocdata->assoc_address_city;  ?>, <?php echo $assocdata->assoc_address_state;  ?>, <?php echo $assocdata->country_name;  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email Id</td>
                                                                    <td><?php echo $assocdata->assoc_email; ?></td>
                                                                </tr>
                                                            </table>
                                                        <?php } elseif ($assocdata->assoc_category == 2) { ?>
                                                            <table style="width:100%" class="table table-bordered table-striped">
                                                                <tr>
                                                                    <td width="38%">Total Area in acres</td>
                                                                    <td width="62%"><?php echo $assocdata->assoc_totalarea; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Construction Area (in Sqm)</td>
                                                                    <td><?php echo $assocdata->assoc_consarea; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Affiliated To</td>
                                                                    <td><?php echo $assocdata->assoc_affibody; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Google Rank</td>
                                                                    <td><?php echo $assocdata->assoc_edurank; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Teaching Staff (Graduate)</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher_graduate; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Teaching Staff (Master's)</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher_masters; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Teaching Staff (PhD)</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher_phd; ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Total Staff</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Student Strength of last Session</td>
                                                                    <td><?php echo $assocdata->assoc_lastses_nostudent; ?></td>
                                                                </tr>



                                                                <tr>
                                                                    <td>Last Session Result Precentage</td>
                                                                    <td><?php echo $assocdata->assoc_lastsesresult; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Last Session Placement % of Students </td>
                                                                    <td><?php echo $assocdata->assoc_lastses_placement; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Company location of placements</td>
                                                                    <td><?php echo $assocdata->assoc_placement_loc; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><?php echo $assocdata->assoc_address_line1;
                                                                        if ($assocdata->assoc_address_line2 != "") {
                                                                            echo ", " . $assocdata->assoc_address_line2;
                                                                        } ?>, <?php echo $assocdata->assoc_address_city;  ?>, <?php echo $assocdata->assoc_address_state;  ?>, <?php echo $assocdata->country_name;  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email Id</td>
                                                                    <td><?php echo $assocdata->assoc_email; ?></td>
                                                                </tr>
                                                            </table>
                                                        <?php } elseif ($assocdata->assoc_category == 3) {
                                                        ?>
                                                            <table style="width:100%" class="table table-bordered table-striped">

                                                                <tr>
                                                                    <td width="38%">Name of School</td>
                                                                    <td width="62%"><?php echo $assocdata->assoc_instconame; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Area in acres</td>
                                                                    <td><?php echo $assocdata->assoc_totalarea; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Construction Area (in Sqm)</td>
                                                                    <td><?php echo $assocdata->assoc_consarea; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Affiliated Body</td>
                                                                    <td><?php echo $assocdata->assoc_affibody; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Education Rank</td>
                                                                    <td><?php echo $assocdata->assoc_edurank; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Teaching Staff</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Last Session Result Percentage </td>
                                                                    <td><?php echo $assocdata->assoc_lastsesresult; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Last Session Topper No. of Student</td>
                                                                    <td><?php echo $assocdata->assoc_lastsesnostudent; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Boarding School</td>
                                                                    <td><?php echo $assocdata->assoc_boarding_type; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><?php echo $assocdata->assoc_address_line1;
                                                                        if ($assocdata->assoc_address_line2 != "") {
                                                                            echo ", " . $assocdata->assoc_address_line2;
                                                                        } ?>, <?php echo $assocdata->assoc_address_city;  ?>, <?php echo $assocdata->assoc_address_state;  ?>, <?php echo $assocdata->country_name;  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email Id</td>
                                                                    <td><?php echo $assocdata->assoc_email;  ?></td>
                                                                </tr>
                                                            </table>
                                                        <?php } elseif ($assocdata->assoc_category == 4) { ?>
                                                            <table style="width:100%" class="table table-bordered table-striped">
                                                                <tr>
                                                                    <td width="38%">Registration Type</td>
                                                                    <td width="62%"><?php echo $assocdata->assoccat_title; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Name of the Institute</td>
                                                                    <td><?php echo $assocdata->assoc_instconame; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Established Year</td>
                                                                    <td><?php echo $assocdata->assoc_establishyear; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Construction Area (in Sqm)</td>
                                                                    <td><?php echo $assocdata->assoc_consarea; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>How you provide classes online/offline?</td>
                                                                    <td><?php echo $assocdata->assoc_classmode; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Google Rating in Link</td>
                                                                    <td><?php echo $assocdata->assoc_googlerate; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Student strength in a class</td>
                                                                    <td><?php echo $assocdata->assoc_stustrength; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Trainer/Faculty</td>
                                                                    <td><?php echo $assocdata->assoc_noteacher; ?></td>
                                                                </tr>
                                                                <?php if ($assocdata->assoc_subcat == 8) { ?>
                                                                    <tr class="trheadpro5">
                                                                        <td colspan="2">Staff Score in Bands</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7 to 8</td>
                                                                        <td><?php echo $assocdata->assoc_staffscore78; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <tr class="trheadpro5">
                                                                    <td colspan="2">Contact Detail</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td><?php echo $assocdata->assoc_address_line1;
                                                                        if ($assocdata->assoc_address_line2 != "") {
                                                                            echo ", " . $assocdata->assoc_address_line2;
                                                                        } ?>, <?php echo $assocdata->assoc_address_city;  ?>, <?php echo $assocdata->assoc_address_state;  ?>, <?php echo $assocdata->country_name;  ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email Id</td>
                                                                    <td><?php echo $assocdata->assoc_email;  ?></td>
                                                                </tr>
                                                            </table>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table style="width:100%" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th width="32%">Course Name</th>
                                                                    <th width="16%">Duration</th>
                                                                    <th width="21%">Total Seats</th>
                                                                    <th width="21%">Fee</th>
                                                                    <th width="10%">Apply</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $assoc_id = $assocdata->assoc_id;
                                                                $enc_assoc_id = $this->encryptcode->encrypt($assoc_id, ENC_KEY_PASS);
                                                                foreach ($coursesdata as $courserow) {
                                                                    $acourse_id = $courserow->acourse_id;
                                                                    $course = $courserow->course_name;
                                                                    $courseName = $this->encryptcode->encrypt($course, ENC_KEY_PASS);
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $courserow->course_name; ?></td>
                                                                        <td><?php echo $courserow->acourse_duration; ?></td>
                                                                        <td><?php echo $courserow->acourse_totalseats; ?></td>
                                                                        <td><?php echo $courserow->acourse_coursefee; ?></td>
                                                                        <td><a href="<?php echo site_url("student/get-discount/$enc_assoc_id/$acourse_id/$courseName"); ?>" class="apply_link">Apply</a></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!------------------------------------------- POPUP START----------------------- -->
                                            <!-- '' -->

                                            <div class="modal popupbody" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!--  -->
                                                        <div class="m-header">
                                                            <button class="close" data-dismiss="modal">
                                                                ×
                                                            </button>

                                                        </div>
                                                        <h3>Select course</h3>
                                                        <div id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                                            <!-- class="tab-pane fade"   i just remove this class -->
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table style="width:100%" class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="32%">Course Name</th>
                                                                                <th width="16%">Duration</th>
                                                                                <th width="21%">Total Seats</th>
                                                                                <th width="21%">Fee</th>
                                                                                <th width="10%">Apply</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $assoc_id = $assocdata->assoc_id;
                                                                            $enc_assoc_id = $this->encryptcode->encrypt($assoc_id, ENC_KEY_PASS);
                                                                            foreach ($coursesdata as $courserow) {
                                                                                $acourse_id = $courserow->acourse_id;
                                                                                $course = $courserow->course_name;
                                                                                $courseName = $this->encryptcode->encrypt($course, ENC_KEY_PASS);
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $courserow->course_name; ?></td>
                                                                                    <td><?php echo $courserow->acourse_duration; ?></td>
                                                                                    <td><?php echo $courserow->acourse_totalseats; ?></td>
                                                                                    <td><?php echo $courserow->acourse_coursefee; ?></td>
                                                                                    <td><a href="<?php echo site_url("student/get-discount/$enc_assoc_id/$acourse_id/$courseName"); ?>" class="apply_link">Apply</a></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------POPUP END------------------------------>

                                            <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                                                <?php if (count($gallerydata) > 0) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pgtitle_tab">Photo Gallery</div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 gallery-bx">
                                                            <div id="masonry" class="ttr-gallery-listing magnific-image">
                                                                <div class="row">
                                                                    <?php
                                                                    $gal_sr = 1;
                                                                    foreach ($gallerydata as $galleryrow) {
                                                                        $assocph_photo = $galleryrow->assocph_photo;
                                                                        $assocph_title = $galleryrow->assocph_title;
                                                                    ?>
                                                                        <div class="col-md-6">
                                                                            <div class="ttr-box portfolio-bx">
                                                                                <div class="ttr-media  media-effect">

                                                                                    <img src="<?php echo base_url() . $assocph_photo; ?>" alt="<?php echo $assocph_title; ?>">

                                                                                    <div class="ov-box">
                                                                                        <div class="overlay-icon align-m">
                                                                                            <a href="<?php echo base_url() . $assocph_photo; ?>" class="magnific-anchor" title="<?php echo $assocph_title; ?>">
                                                                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <!-- <div class="portfolio-info-bx bg-primary">
                    <h4><a href="events-details.html">Soft skills</a></h4>
                </div>-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                        $gal_sr++;
                                                                    } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php if (count($videodata) > 0) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="pgtitle_tab">Video Gallery</div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <?php foreach ($videodata as $videorow) {
                                                            $assocvg_videolink = $videorow->assocvg_videolink;
                                                            $assocvg_title = $videorow->assocvg_title;
                                                            if ($assocvg_videolink != "") {
                                                        ?>

                                                                <div class="col-md-6">
                                                                    <iframe width="100%" height="300" src="<?php echo $assocvg_videolink; ?>" title="<?php echo $assocvg_title; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                </div>
                                                        <?php
                                                            }
                                                        } ?>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                            <div class="tab-pane fade" id="facilities" role="tabpanel" aria-labelledby="facilities-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php
                                                        $assoc_facility = $assocdata->assoc_facility;
                                                        $assoc_facar = explode(", ", $assoc_facility);
                                                        ?>
                                                        <table style="width:100%" class="table table-bordered table-striped">
                                                            <tr>
                                                                <td width="38%">Transport</td>
                                                                <td width="62%"><?php if (in_array("Transport Facility", $assoc_facar)) {
                                                                                    echo "Yes";
                                                                                } else {
                                                                                    echo "No";
                                                                                } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Canteen</td>
                                                                <td><?php if (in_array("Canteen Facility", $assoc_facar)) {
                                                                        echo "Yes";
                                                                    } else {
                                                                        echo "No";
                                                                    } ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Study Material</td>
                                                                <td><?php if (in_array("Study Material", $assoc_facar)) {
                                                                        echo "Yes";
                                                                    } else {
                                                                        echo "No";
                                                                    } ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Scholarship</td>
                                                                <td><?php if (in_array("Scholarship", $assoc_facar)) {
                                                                        echo "Yes";
                                                                    } else {
                                                                        echo "No";
                                                                    } ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="achievement" role="tabpanel" aria-labelledby="achievement-tab">
                                                <?php if ($assocdata->assoc_achievements != "") { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h5>Achievements</h5>
                                                            <p><?php echo $assocdata->assoc_achievements; ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>




                                                <?php if ($assocdata->assoc_cocuriactivity != "") { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h5>Co-curricular Activities</h5>
                                                            <p><?php echo $assocdata->assoc_cocuriactivity; ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($assocdata->assoc_amenities != "") { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h5> Other Amenities/Infrastructure</h5>
                                                            <p><?php echo $assocdata->assoc_amenities; ?></p>
                                                        </div>

                                                    </div>
                                                <?php } ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ttr-post-title col-md-12" style="align-self: center;">
                                            <!-- //<? php // echo form_open('student/get-discount');
                                                    // echo form_hidden('app_associd', $assocdata->assoc_id); 
                                                    ?> -->
                                            <a href="#signupModal" data-toggle="modal">

                                                <button class="btn radius-xl text-uppercase btn-apply-main btn-new-apply" style="padding:16px"> Apply Now </button></a>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 m-b30">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bg-primary text-white contact-info-bx m-b30">
                                            <h3 class="m-b10 title-head">Enroll <span>Now</span></h3>
                                            <p class="apply_info_text">Apply now and get discount coupon of <?php echo $assocdata->assoc_discount . "%"; ?>. You have to show coupon at the time of admission</p>
                                            <div class="widget widget_getintuch apply-course-box">
                                                <?php
                                                // echo form_open('student/get-discount');
                                                // echo form_hidden('app_associd', $assocdata->assoc_id);
                                                ?>
                                                <a href="#signupModal" data-toggle="modal">
                                                    <button class="btn radius-xl text-uppercase btn-apply-main"> Apply Now </button></a>
                                                <?php echo form_close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (count($relassocdata) > 0) { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="widget recent-posts-entry">
                                                <h6 class="widget-title">Other </h6>
                                                <div class="widget-post-bx" style="height: 550px !important; overflow-y: scroll !important;">
                                                    <?php foreach ($relassocdata as $relassocrow) {
                                                        $relassoc_slug = $relassocrow->assoc_slug;
                                                        $relassoc_feaimg = $relassocrow->assoc_featuredimg;
                                                        if ($relassoc_feaimg == "") {
                                                            $relassoc_feaimg = "assets/website/images/default_pic.png";
                                                        }
                                                        $relassoccat_slug = $relassocrow->assoccat_slug;
                                                    ?>
                                                        <div class="widget-post clearfix">
                                                            <div class="ttr-post-media"> <a href="<?php echo site_url("page/$relassoccat_slug/$relassoc_slug"); ?>" title="<?php echo $relassocrow->assoc_instconame; ?>"><img src="<?php echo base_url() . $relassoc_feaimg ?>" width="200" height="143" alt=""></a> </div>
                                                            <div class="ttr-post-info">
                                                                <div class="ttr-post-header">
                                                                    <h6 class="post-title"><a href="<?php echo site_url("page/$relassoccat_slug/$relassoc_slug"); ?>" title="<?php echo $relassocrow->assoc_instconame; ?>"><?php echo $relassocrow->assoc_instconame; ?></a></h6>
                                                                </div>
                                                                <ul class="media-post">
                                                                    <li><a href="<?php echo site_url("page/$relassoccat_slug/$relassoc_slug"); ?>" title="<?php echo $relassocrow->assoc_instconame; ?>"><i class="fa fa-link" aria-hidden="true"></i> Read More</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <button class="back-to-top fa fa-chevron-up"></button>
    </div>
    <?php include("includes/script.php"); ?>

</html>