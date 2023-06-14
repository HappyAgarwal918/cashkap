<?php
defined('BASEPATH') or exit('No direct script access allowed');
$segment4 = $this->uri->segment(4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php if (isset($siteTitle)) {
            echo $siteTitle;
        } ?>
    </title>
    <?php include("includes/style-header.php"); ?>
    <link href="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .headingStyle {
            background-color: #5D3076;
            text-align: center;
            color: white;
            font-size: 18px;
            font-weight: 700;
        }
    </style>


</head>

<body id="page-top" >
    <div id="wrapper">
        <?php include("includes/sidebar.php"); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("includes/top-nav.php"); ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800 mb-2 ">User profile</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="inner-section">
                                <div>
                                    <table class="table">
                                        <tr>
                                            <th colspan="2" class="headingStyle">PROFILE</th>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo $studentinfo->name ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile Number</th>
                                            <td><?php echo $studentinfo->phone ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email Id</th>
                                            <td><?php echo $studentinfo->email ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date Of Birth</th>
                                            <td><?php echo $studentinfo->dob ?></td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td><?php echo $studentinfo->city ?></td>
                                        </tr>
                                        <tr>
                                            <th>state</th>
                                            <td><?php echo $studentinfo->state ?></td>
                                        </tr>
                                        <tr>
                                            <th>Desired Country</th>
                                            <td><?php echo $studentinfo->desiredCountry ?></td>
                                        </tr>
                                        <tr>
                                            <th>passport No</th>
                                            <td><?php echo $studentinfo->passportNo ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow-x: auto;">
                                    <?php if (!empty($studenteducation)) { ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" class="headingStyle">EDUCATIONAL DETAILS</th>
                                                </tr>
                                                <tr>
                                                    <th>LEVEL</th>
                                                    <th>YEAR OF PASSING</th>
                                                    <th>STREAM</th>
                                                    <th>BOARD</th>
                                                    <!-- <th>TOTAL MARKS </th> -->
                                                    <th>ENGLISH</th>
                                                    <th>MATHS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($studenteducation as $studenteducation) { ?>
                                                    <tr>
                                                        <td style="height: 60px;"><?php echo $studenteducation->class ?></td>
                                                        <td><?php echo $studenteducation->yearOfPassing ?></td>
                                                        <td><?php echo $studenteducation->stream ?></td>
                                                        <td><?php echo $studenteducation->bord ?></td>
                                                        <!-- <td><?php echo $studenteducation->totalScore ?></td> -->
                                                        <td><?php echo $studenteducation->english ?></td>
                                                        <td><?php echo $studenteducation->maths ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        <?php } ?>
                                        </table>
                                        <div style="overflow-x: auto;">
                                            <?php if (!empty($studentILTS)) { ?>
                                                <table class="table">

                                                    <thead>
                                                        <tr>
                                                            <th colspan="7" class="headingStyle">IELTS/PTE/TOEFL TEXT DETAILS
                                                            </th>
                                                        </tr>

                                                        <tr>
                                                            <th>TEXT</th>
                                                            <th>TEXT DATE</th>
                                                            <th>LISTENING</th>
                                                            <th>WRITING</th>
                                                            <th>READING</th>
                                                            <th>SPEAKING</th>
                                                            <th>OVERALL SCORE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($studentILTS as $studentILTS) { ?>
                                                            <tr>
                                                                <td style="height: 60px;"><?php echo $studentILTS->test ?></td>
                                                                <td><?php echo $studentILTS->testDate ?></td>
                                                                <td><?php echo $studentILTS->listening ?></td>
                                                                <td><?php echo $studentILTS->writing ?></td>
                                                                <td><?php echo $studentILTS->reading ?></td>
                                                                <td><?php echo $studentILTS->speking ?></td>
                                                                <td><?php echo $studentILTS->totalScore ?></td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                        <?php if (!empty($studentexp)) { ?>

                                            <div style="overflow-x: auto;">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="5" class="headingStyle">WORK EXPERIENCE</th>
                                                        </tr>
                                                        <?php foreach ($studentexp as $studentexp) { ?>
                                                            <tr>
                                                                <th>COMPANY NAME</th>
                                                                <th>DESIGNATION</th>
                                                                <th>TIME PERIOD</th>
                                                                <th>SALARY</th>
                                                                <th>JOB DESCRIPTION</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $studentexp->companyName ?></td>
                                                            <td><?php echo $studentexp->designation ?></td>
                                                            <td><?php echo $studentexp->timePeriod ?></td>
                                                            <td><?php echo $studentexp->salary ?></td>
                                                            <td><?php echo $studentexp->jobDescription ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>
                                </div>
                                <div style="overflow-x: auto;">
                                    <?php if (!empty($studentform)) { ?>

                                        <div class=" headingStyle ">
                                            <span>Applied College</span>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>Course </th>
                                                    <!-- <th>Institute/College/School </th> -->
                                                    <th>Date </th>
                                                    <!-- <th>View</th>  -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($studentform as $studentform) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $studentform->stureg_course_name ?></td>
                                                        <td><?php echo $studentform->apply_date ?></td>
                                                        <!-- <td>view</td> -->
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>

                                    <?php if (!empty($offerLtr)) { ?>
                                        <div class=" headingStyle ">
                                            <span>Applied Country</span>

                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>Country </th>
                                                    <th>Apply Date </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($offerLtr as $offerLtr) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $offerLtr->cntry_applyFor ?></td>
                                                        <td><?php echo $offerLtr->Apply_date ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
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
</body>

</html>