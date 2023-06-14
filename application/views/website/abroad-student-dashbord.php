<!DOCTYPE html>
<html lang="en">

<head>
    <title>abroad-student-dashbord</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: #07294D;

        }

        #back-p {
            color: white;
            text-decoration: none;
        }

        .tab {
            float: left;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            background-color: #ecf0f1;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 20%;
            height: 100vh;
        }

        .tab button {
            display: block;
            background-color: inherit;
            color: navy;
            padding: 10px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 15px;
            font-weight: bolder;
        }

        .tab button:hover {
            background-color: #7efff5;
        }

        .tab button.active {
            background-color: #FC427B;
        }

        .tabcontent {
            float: left;
            border: none;
            width: 100%;
            height: 250px;
        }

        .table {
            width: 97% !important;
        }

        table,
        th,
        td {
            margin-top: 30px;
            margin-left: 20px;
            border: 1px solid #ccc;
            width: 100px;
            font-size: 10px;
        }

        #p1 {
            margin-left: 20px;
        }

        @media only screen and (max-width: 1100px) {
            .tab {
                width: 28%;
            }
        }

        @media only screen and (max-width: 920px) {
            .tab {
                width: 31%;
            }
        }

        @media only screen and (max-width: 820px) {
            .tab {
                width: 35%;
            }
        }

        @media only screen and (max-width: 770px) {
            .tab {
                width: 37%;
            }
        }

        @media only screen and (max-width: 540px) {
            .tab {
                float: none;
                width: auto;
                height: auto;
            }

            table,
            th,
            td {
                font-size: 15px;
            }

            .tab button {
                font-size: 20px;
            }
        }

        .textHeading {
            font-size: 25px;
            font-weight: 600;
        }

        <?php include "includes/head.php"; ?>
    </style>
</head>

<body>
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url();  ?>assets/website/images/logo.png" width="200px" height="30" class="d-inline-block align-top" alt="">
        </a>
    </nav>

    <div class="tab">
        <nav class="navbar navbar-expand-sm navbar-light bg-transparent">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="tablinks-tab me-auto mb-2 mb-lg-0">
                        <div class="tab-item active">
                            <button class="tablinks" onclick="openxyz(event, 'My Profile')" id="defaultOpen"><i class="bi bi-person-circle"></i> My Profile</button>
                        </div>
                        <div class="tab-item">
                            <button class="tablinks" onclick="openxyz(event, 'Discount Coupon')"><i class="bi bi-cash-coin"></i>
                                Discount Coupon</button>
                        </div>
                        <div class="tab-item">
                            <a href="<?php echo base_url() ?>abroad-student-logout"><button class="tablinks"><i class="bi bi-file-earmark-lock"></i>
                                    Logout</button></a>
                        </div>
                        <div class="tab-item">
                            <a href="<?php echo base_url() ?>study/abroad"><button class="tablinks"><i class="bi bi-file-earmark-lock"></i>
                                    <i class="fa ">&#xf060;</i> &nbsp; Back to Home</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </div>




    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 mt-2">
                <div id="My Profile" class="tabcontent">
                    <div style="overflow-x: auto;">
                        <table class="table">
                            <tr>
                                <th colspan="2" style="background-color: whitesmoke;">MY PROFILE</th>
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
                                        <th colspan="6" style="background-color: whitesmoke;">EDUCATIONAL DETAILS</th>
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
                    </div>

                    <div style="overflow-x: auto;">
                        <?php if (!empty($studentILTS)) { ?>
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th colspan="7" style="background-color: whitesmoke;">IELTS/PTE/TOEFL TEXT DETAILS
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
                                        <th colspan="5" style="background-color: whitesmoke;">WORK EXPERIENCE</th>
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
            </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div id="Discount Coupon" class="tabcontent">
                    <div style="overflow-x: auto;">
                        <div class="text-center" style="background-color: whitesmoke;">
                            <span class="textHeading">Applied College</span>
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
                        <div class="text-center" style="background-color: whitesmoke;">
                            <span class="textHeading">Applied Country</span>

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
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>  -->
    <script>
        function openxyz(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
</body>

</html>