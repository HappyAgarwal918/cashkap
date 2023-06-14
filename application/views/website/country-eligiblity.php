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
        #country_checklist_table h6 {
            color: #cf2a35;
        }

        #country_checklist_table p {
            color: #07294D;
        }
        #country_checklist_table p {
    color: #07294D;
}
.button {
            background-color: #1c87c9;
            -webkit-border-radius: 60px;
            border-radius: 60px;
            border: none;
            color: #eeeeee;
            cursor: pointer;
            display: inline-block;
            font-family: sans-serif;
            font-size: 20px;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            width: 14em;
        }

        @keyframes glowing {
            0% {
                background-color: #b62d2e;
                box-shadow: 0 0 5px #b62d2e;
            }

            50% {
                background-color: #06294d;
                box-shadow: 0 0 20px #06294d;
            }

            100% {
                background-color: #b62d2e;
                box-shadow: 0 0 5px #b62d2e;
            }
        }

        .button {
            animation: glowing 1300ms infinite;
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
                        <h1 class="text-white">Country Eligibility</h1>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>study/abroad">Study Abroad</a></li>
                        <li>Country Eligibility</li>
                    </ul>
                </div>
            </div>
            <div class="page-banner contact-page section-sp2">

                <!-- cntry table -->
                <div class="container text-center  my-4" id="country_checklist_table" style="border:2px solid black;">
                    <div class="row">
                        <div class="col-12 p-0 top_bg">
                            <div class="row m-0">
                                <?php foreach ($cantrydata as $rwo) { ?>
                                    <div class="col-12 p-2 " style="border-bottom: 2px solid black; background-color:white;">
                                        
                                            <h1 class="text-center display-5" id="cntryName" style="  text-transform: capitalize;
"><?php echo $rwo->cntry_name; ?> Eligibility List</h1>
                                        
                                    </div>
                            </div>
                            <h4 class="text-center "></h4>
                            <div class="row p-0 m-0">
                                <div class="col-md-6  ">
                                    <h6 class="text-center" style="padding-top: 21px;">IELTS MANDETORY</h6>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p id="ielts_YN" style="padding-top: 21px;"><?php echo $rwo->ielts_requ; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="row">
                                <div class="col-12 p-0 m-0" style="border-bottom: 2px solid black; border-top:2px solid black; background-color:white;">
                                    <h1 class="text-center">12th pass</h1>
                                </div>
                            </div>

                            <div class="row  bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">12th% </h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p id="twelth_p"><?php echo $rwo->twelth_per; ?></p>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Gap acceptable</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p id="gap_twelth"><?php echo $rwo->twelth_gap_acceptable; ?></p>
                                </div>
                            </div>
                            <div class="row py-2 bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Ielts requirment</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p id="ielts_req"><?php echo $rwo->twelth_Ielts_requirment; ?></p>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <h6 class="">Funds</h6>
                                </div>
                                <div class="col-md-6 py-2">
                                    <div id="fund_twelth"><?php echo $rwo->twelth_funds; ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-1">
                        <div class="col-12">
                            <div class="row" style="border-top:2px solid black; border-bottom: 2px solid black; background-color:white;">
                                <div class="col-12">
                                    <h1 class="text-center">Graduation</h1>
                                </div>
                            </div>

                            <div class="row bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Graduation %</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p id="Graduation_p"><?php echo $rwo->graduation_per; ?></p>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Gap acceptable</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p class="" id="gap_Graduation"><?php echo $rwo->graduation_gap_acceptable; ?></p>
                                </div>
                            </div>
                            <div class="row py-2 bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Ielts requirment</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p class="" id="bands_Graduation"><?php echo $rwo->graduation_Ielts_requirment; ?></p>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Funds</h6>
                                </div>

                                <div class="col-md-6 py-2" id="funds_Graduation"><?php echo $rwo->graduation_funds; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-12">
                            <div class="row" style="border-top:2px solid black; border-bottom: 2px solid black; background-color:white;">
                                <div class="col-12">
                                    <h1 class="text-center">Masters</h1>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <h6>Percentage %</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p class="" id="master_p"><?php echo $rwo->masters_percentage; ?></p>
                                </div>
                            </div>
                            <div class="row bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Gap acceptable</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p class="" id="gat_master"><?php echo $rwo->masters_gap_acceptable; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Ielts requirment</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p id="ielts_rq_master"><?php echo $rwo->masters_Ielts_requirment; ?></p>
                                </div>
                            </div>
                            <div class="row bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Funds</h6>
                                </div>
                                <div class="col-md-6 py-2" id="fund_master"><?php echo $rwo->masters_funds; ?></div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 img-bgg1"></div> -->
                    </div>
                    <div class="row mt-5">
                        <!-- <div class="col-md-6 img-bgg"></div> -->
                        <div class="col-12">
                            <div class="row" style="border-top:2px solid black; border-bottom: 2px solid black; background-color:white;">
                                <div class="col-12">
                                    <h1 class="text-center">Spouse</h1>
                                </div>
                            </div>

                            <h5 class="text-center m-3">Main applicant & spouse both</h5>
                            <div class="row bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Qualification</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p class="" id="Spouse_ql"><?php echo $rwo->spouse_qualification; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Percentage %</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p class="" id="Spouse_p"><?php echo $rwo->spouse_percentage; ?></p>
                                </div>
                            </div>
                            <div class="row bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Gap acceptable</h6>
                                </div>

                                <div class="col-md-6 py-2">
                                    <p class="" id="Spouse_gap"><?php echo $rwo->spouse_gap_acceptable; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Age</h6>
                                </div>
                                <div class="col-md-6 py-2" id="Spouse_eag"><?php echo $rwo->spouse_age; ?></div>
                            </div>

                            <div class="row bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Marrige time period</h6>
                                </div>
                                <div class="col-md-6 py-2" id="Spouse_marrige"><?php echo $rwo->spouse_marrige_time_period; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Ielts requirment</h6>
                                </div>
                                <div class="col-md-6 py-2">
                                    <p class="" id="Spouse_iltsRq"><?php echo $rwo->spouse_Ielts_requirment; ?></p>
                                </div>
                            </div>

                            <div class="row bg-light">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Funds</h6>
                                </div>
                                <div class="col-md-6 py-2" id="Spouse_fund"><?php echo $rwo->spouse_funds; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <h6 class="">Intakes</h6>
                                </div>
                                <div class="col-md-6 py-2">
                                    <p class="" id="intake"><?php echo $rwo->spouse_intakes; ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 pb-3">
                                    <div class="btn-style2" id="Apply_btn">
                                    <a href="<?php echo base_url() ?>abroad-apply-counrty/<?php echo $rwo->cntry_name; ?>">
                                <button type="button" class=" button  mt-5  btn-lg "> Apply Now </button></a>
                                    </div>
                                </div>
                            </div>
            <?php } ?>

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