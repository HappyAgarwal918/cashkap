<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Abroad Registration</title>
    <?php include "includes/head.php"; ?>
    <style>
        .form-head {
            background: #EAE9E7;
            color: #111111;
            padding: 2px 10px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .boxborder {
            background-color: #fff;
            box-shadow: 0 3px 10px 0px rgb(0 0 0 / 8%);
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-style {
            padding-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            margin-block: 50px;

        }

        select {
            width: 100%;
            height: 42px;
        }

        .td-input {
            width: 100%;
        }

        .td-marks {
            width: 33%;
        }

        .tr-marks {
            display: flex;
            justify-content: space-between;
        }

        .terms {
            padding-left: 1rem;
        }


        .icon-style {
            border: solid 0.1em;
        }

        .spfont {
            font-size: 20px;
        }

        .spwidth {
            width: 100%;
        }

        .ui-datepicker-calendar {
            display: none;
        }
    </style>

</head>

<body>
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <?php include "includes/header.php"; ?>
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Abroad Student Registration</h1>
                </div>

            </div>
        </div>
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url("study/abroad"); ?>">Study Abroad</a></li>
                    <li>Abroad Student Registration</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="boxborder form-style ">
                    <marquee class="text-center" style="text-align: center;font-weight: 500;">
                        Fill your personal information .&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>&emsp;Fill your educational details.
                        &emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>&emsp;
                        If you have cleared your IELTS/PTE/TOFEL/OTHER LANGUAGE test then enter the details.&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>
                        &emsp;
                        &emsp;If you have experience then fill it.&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>&emsp; Create your ID & Password.&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>&emsp; Submit the filled details.
                    </marquee>
                </div>
                <div class="col-md-12">
                    <p class="text-center">Already have an Account? <a href="<?php echo site_url("abrod-student-login"); ?>" class="logreg">Log In </a></p>
                </div>
            </div>
            <div class="boxborder form-style ">
                <form id="register">
                    <div id="userInfo">
                        <div class="form-head">
                            <label for="">TELL US ABOUT YOURSELF</label>
                        </div>
                        <div class="row spcrow">
                            <div class="col">
                                <label for="">FULL NAME <span class="req">*</span></label>
                                <input name="fullname" id="fullname" type="text" class="form-control" required placeholder="FULL NAME">
                                <span id="name_error" style="color: red;"></span><br />
                            </div>
                            <div class="col">
                                <label for="">DATE OF BIRTH<span class="req">*</span></label>
                                <!-- <input type="text" id="dob" name="dob" class="form-control" placeholder="DATE OF BIRTH"> -->
                                <div class="d-flex">
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
                                <span id="dob_error" style="color: red;"></span><br />
                            </div>
                        </div>
                        <div class="row spcrow">
                            <div class="col">
                                <label for="">EMAIL<span class="req">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="eg . cashkap@gmail.com">
                                <span id="email_error" style="color: red;"></span><br />

                            </div>
                            <div class="col">
                                <label for="">CONTACT NO <span class="req">*</span></label>
                                <input type="phone" id="phone" name="phone" class="form-control" placeholder="CONTACT NO">
                                <span id="phone_error" style="color: red;"></span><br />
                            </div>
                        </div>
                        <div class="row spcrow">
                            <div class="col">
                                <label for="">PASSPORT NO <span class="req">*</span></label>
                                <input type="text" id="passport" name="passport" class="form-control" placeholder="PASSPORT NO">
                                <span id="passport_error" style="color: red;"></span><br />
                            </div>
                            <div class="col ">
                                <label for="">CITY<span class="req">*</span></label>
                                <input type="text" id="city" name="city" class="form-control" placeholder="CITY">
                                <span id="city_error" style="color: red;"></span><br />
                            </div>
                        </div>

                        <div class="row spcrow">
                            <div class="col">
                                <label for="">STATE <span class="req">*</span></label>
                                <select class="form-control" name="state" id="select_state">
                                    <option>select state</option>
                                    <?php foreach ($statedata as $staterow) { ?>
                                        <option value="<?php echo $staterow->state_name; ?>"><?php echo $staterow->state_name; ?></option>
                                    <?php } ?>
                                </select>
                                <span id="state_error" style="color: red;"></span><br />
                            </div>
                            <div class="col">
                                <label for="">DESIRED COUNTRY <span class="req">*</span></label>
                                <select class="form-control" name="desiredCountry" id="desiredCountry">data
                                    <option>select desired country</option>
                                    <?php foreach ($CountryData as $row) {
                                        echo '<option value="' . $row->cntry_code . '">' . $row->cntry_name . ' </option>';
                                    } ?>
                                </select>
                                <span id="desiredCountry_error" style="color: red;"></span><br />
                            </div>
                        </div>
                        <div class="row spcrow">

                            <div class="col">
                                <label for="">PASSWORD<span class="req">*</span></label>
                                <input name="password" id="password" type="password" class="form-control" placeholder="password">
                                <span id="password_error" style="color: red;"></span><br />
                            </div>
                            <div class="col">
                                <div>
                                    <label for="">IF YOU HAVE GIVEN IELTS OR PTE TEST IN LAST TWO YEARS, THEN PLEASE
                                        SPECIFY BELOW <span class="req">*</span></label>

                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="ielts" id="ielts_yes" value="YES">
                                    <label class="form-check-label" for="ielts_yes">YES</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="ielts" id="ielts_no" checked value="NO">
                                    <label class="form-check-label" for="ielts_no">NO</label>
                                </div>
                            </div>
                        </div>
                        <div class="row spcrow">
                            <div class="col next-style text-right">
                                <button class="btn btn-primary btn-lg button-size" type="button" onclick="saveNext1()">save & next <i class="fa ">&#xf061;</i></button>
                            </div>
                        </div>
                    </div>
                    <!-- --------------------ielts info start------------------------- -->
                    <div id="ieltsInfo" style="display: none;">
                        <div class="row ">
                            <div class="col">
                                <div class="form-head">
                                    <label for="">IELTS/PTE/TOEFL TEST DETAILS</label>
                                </div>
                                <table class="table table-bordered spctable" id="ieltsTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">TEST</th>
                                            <th scope="col">TEST DATE</th>
                                            <th scope="col">LISTENING</th>
                                            <th scope="col">WRITING</th>
                                            <th scope="col">READING</th>
                                            <th scope="col">SPEAKING</th>
                                            <th scope="col">OVERALL SCORE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="test[]" placeholder="TEST" class="td-input form-control spwidth">
                                            </td>
                                            <td><input type="date" name="test-date[]" class="td-input form-control spwidth" placeholder="TEST DATE"></td>
                                            <td><input type="text" placeholder="LISTENING" name="listening[]" class="td-input form-control spwidth"></td>
                                            <td><input type="text" name="writing[]" placeholder="WRITING" class="td-input form-control spwidth"></td>
                                            <td><input type="text" placeholder="READING" name="reading[]" class="td-input form-control spwidth"></td>
                                            <td><input type="text" placeholder="SPEAKING" name="speking[]" class="td-input form-control spwidth"></td>
                                            <td><input type="text" name="total-score[]" placeholder="OVERALL SCORE" class="td-input form-control spwidth"></td>

                                        </tr>

                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button type="button" onclick="addIeltsRow()">Add more</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col next-style text-left">
                                <button class="btn btn-primary btn-lg button-size" type="button" onclick="stepback('1')"><i class="fa ">&#xf060;</i> &nbsp;step Back </button>
                            </div>
                            <div class="col next-style text-right">
                                <button class="btn btn-primary btn-lg button-size" type="button" onclick="saveNext2()">save & next &nbsp;<i class="fa ">&#xf061;</i></button>
                            </div>
                        </div>
                    </div>
                    <!-- --------------------ielts info end--------------------------->
                    <!-- --------------------educationInfo info start--------------------------->
                    <div id="educationInfo" style="display: none;">
                        <div class="row ">
                            <div class="col">
                                <table class="table table-bordered spctable" id="eduTable">

                                    <thead>
                                        <div class="form-head">
                                            <label for="">EDUCATIONAL DETAILS</label>
                                        </div>
                                        <tr>
                                            <th scope="col">LEVEL</th>
                                            <th scope="col">YEAR OF PASSING</th>
                                            <th scope="col">STREAM</th>
                                            <th scope="col">BOARD</th>
                                            <th scope="col">TOTAL MARKS IN BELOW SUBJECTS IN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="level[]" placeholder=" LEVEL eg: 12th" class="td-input form-control spwidth"></td>
                                            <td><input type="text" name="yearOfPassing[]" placeholder="YEAR OF PASSING" class="td-input form-control spwidth date-picker-year">
                                            </td>
                                            <td><input type="text" name="stream[]" placeholder="STREAM" class="td-input form-control spwidth"></td>
                                            <td><input type="text" placeholder="BOARD" name="bord[]" class="td-input form-control spwidth"></td>
                                            <td class="tr-marks">
                                                <input type="text" name="english[]" class="td-marks form-control spwidth" placeholder="English">
                                                <input type="hidden" name="maths[]" value="null" class="td-marks form-control spwidth" placeholder="Maths">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="level[]" placeholder=" LEVEL eg: 10th" class="td-input form-control spwidth"></td>
                                            <td><input type="text" name="yearOfPassing[]" placeholder="YEAR OF PASSING" class="td-input form-control spwidth date-picker-year">
                                            </td>
                                            <td><input type="hidden" value="null" name="stream[]" placeholder="STREAM" class="td-input form-control spwidth"></td>
                                            <td><input type="text" placeholder="BOARD" name="bord[]" class="td-input form-control spwidth"></td>
                                            <td class="tr-marks">
                                                <input type="text" name="english[]" class="td-marks form-control spwidth" placeholder="English">
                                                <input type="text" name="maths[]" class="td-marks form-control spwidth" placeholder="Maths">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    <button type="button" onclick="addEducationRow()">Add more</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col next-style text-left">
                                <button class="btn btn-primary btn-lg button-size" type="button" onclick="stepback('2')"><i class="fa ">&#xf060;</i>&nbsp;step Back</button>
                            </div>
                            <div class="col next-style text-right">
                                <button class="btn btn-primary btn-lg button-size" type="button" onclick="saveNext3()">save & next &nbsp;<i class="fa ">&#xf061;</i></button>
                            </div>
                        </div>
                    </div>
                    <!-- --------------------educationInfo info end--------------------------->
                    <!-- --------------------EXPERIENCE info start--------------------------->
                    <div id="experience" style="display: none;">
                        <div class="form-head">
                            <label for="">WORK EXPERIENCE</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " onclick=" expTogle('yes')" type="radio" name="workexe" id="workexe" value="YES">
                            <label class="form-check-label" for="workexe">YES</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" onclick=" expTogle('no')" type="radio" name="workexe" id="workexe2" checked value="NO">
                            <label class="form-check-label" for="workexe2">NO</label>
                        </div>
                        <div>
                            <div class="row " id="expTableDIv" style="display: none;">
                                <div class="col">
                                    <table class="table table-bordered spctable" id="expTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">COMPANY NAME</th>
                                                <th scope="col">DESIGNATION</th>
                                                <th scope="col">TIME PERIOD</th>
                                                <th scope="col">SALARY</th>
                                                <th scope="col">JOB DESCRIPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" placeholder="COMPANY NAME" name="companyName[]" class="td-input form-control spwidth">
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="DESIGNATION" name="designation[]" class="td-input form-control spwidth">
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="TIME PERIOD" name="time-period[]" class="td-input form-control spwidth">
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="SALARY" name="salary[]" class="td-input form-control spwidth">
                                                </td>
                                                <td class="tr-marks">
                                                    <textarea placeholder="JOB DESCRIPTION" class="td-input  form-control" name="job-description[]"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <button type="button" onclick="addExperinceRow()">Add more</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="terms">
                                    <input type="checkbox" id="termsCondition" name="terms"> <label data-toggle="modal" data-target="#termscond" for="terms" style="color : #0075ff;">I've read and accept the terms & conditions</label>
                                    <span class="req">*</span><br>

                                </div>
                                <br />
                                <span id="termsCondition_error" style="color: red;"></span><br />
                                <span id="email_message" style="color: red;"></span><br />
                                <span id="message" style="color:green;"></span><br />
                            </div>
                            <div class="row">


                                <div class="col next-style text-left">
                                    <button class="btn btn-primary btn-lg button-size" type="button" onclick="stepback('3')"><i class="fa ">&#xf060;</i>&nbsp;step Back </button>
                                </div>
                                <div class="col text-right">
                                    <button id="submitFormData" type="submit" class="btn btn-primary btn-lg button-size">submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- --------------------EXPERIENCE info end--------------------------->
                </form>
            </div>
        </div>
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

        <?php include "includes/footer.php"; ?>
        <button class="back-to-top fa fa-chevron-up"></button>
        <?php include "includes/script.php"; ?>
        <script>
            $(function() {
                $('.date-picker-year').datepicker({
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'yy',
                    onClose: function(dateText, inst) {
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, 1));
                    }
                });
                $(".date-picker-year").focus(function() {
                    $(".ui-datepicker-month").hide();
                });
            });

            function addEducationRow() {
                var table = document.getElementById("eduTable");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = '<input name="level[]" type="text" placeholder="LEVEL" class="td-input form-control spwidth">';
                cell2.innerHTML = '<input name="yearOfPassing[]" type="text" class="td-input form-control spwidth date-picker-year">';
                cell3.innerHTML = '<input name="stream[]" placeholder="STREAM" type="text" class="td-input form-control spwidth">';
                cell4.innerHTML = '<input name="bord[]" placeholder="BOARD" type="text" class="td-input form-control spwidth">';
                cell5.innerHTML =
                    '<input type="text" name="english[]" class="td-marks form-control spwidth" placeholder="English">' +
                    '<input type="text" name="maths[]" class="td-marks form-control spwidth" placeholder="Maths">';
                cell5.className = 'tr-marks';
                $(function() {
                    $('.date-picker-year').datepicker({
                        changeYear: true,
                        showButtonPanel: true,
                        dateFormat: 'yy',
                        onClose: function(dateText, inst) {
                            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                            $(this).datepicker('setDate', new Date(year, 1));
                        }
                    });
                    $(".date-picker-year").focus(function() {
                        $(".ui-datepicker-month").hide();
                    });
                });
            }

            function addExperinceRow() {
                var table = document.getElementById("expTable");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = '<input type="text" placeholder="COMPANY NAME" name="companyName[]" class="td-input form-control spwidth">';
                cell2.innerHTML = '<input type="text" placeholder="DESIGNATION" name="designation[]" class="td-input form-control spwidth">';
                cell3.innerHTML = '<input type="text" placeholder="TIME PERIOD"  name="time-period[]" class="td-input form-control spwidth">';
                cell4.innerHTML = '<input type="text" placeholder="SALARY" name="salary[]" class="td-input form-control spwidth">';
                cell5.innerHTML = ' <textarea placeholder="JOB DESCRIPTION" class="td-input  form-control" name="job-description[]"></textarea>';
            }

            function addIeltsRow() {
                var table = document.getElementById("ieltsTable");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);
                cell1.innerHTML = '<input type="text" placeholder = "TEST" name="test[]"  class="td-input form-control">';
                cell2.innerHTML = '<input type="date" placeholder = "TEST DATE" name="test-date[]" class="td-input form-control">';
                cell3.innerHTML = '<input type="text" placeholder = "LISTENING" name="listening[]" class="td-input form-control">';
                cell4.innerHTML = '<input type="text" placeholder = "WRITING" name="writing[]" class="td-input form-control">';
                cell5.innerHTML = '<input type="text" placeholder = "READING" name="reading[]" class="td-input form-control">';
                cell6.innerHTML = '<input type="text" placeholder = "SPEAKING" name="speking[]" class="td-input form-control">';
                cell7.innerHTML = '<input type="text" placeholder = "OVERALL SCORE" name="total-score[]" class="td-input form-control">';
            }

            $(function() {
                $("#submitFormData").click(function(e) {
                    e.preventDefault();
                    formData = $("#register").serialize();
                    if (document.getElementById('termsCondition').checked == false) {
                        console.log(fullname, "fullname-----------------")
                        document.getElementById("termsCondition_error").innerHTML = " required *";
                        return false;
                    }
                    document.getElementById("termsCondition_error").innerHTML = "";
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>submit-registration-form",
                        data: formData,
                        success: function(rec) {
                            if (rec == 200) {
                                document.getElementById("message").innerHTML = "Your account has been created successfully*";
                                window.location.href = "<?php echo base_url(); ?>study/abroad"
                            } else if (rec == 409) {
                                document.getElementById("email_message").innerHTML = "email already exists *";
                                return false;
                            } else {
                                document.getElementById("email_message").innerHTML = "internal server error please try again later *";
                                window.location.href = "<?php echo base_url(); ?>abroad-student-registration"
                            }
                        }

                    });

                    return false; //stop the actual form post !important!

                });
            });
            // save next 1

            function saveNext1() {
                document.getElementById("name_error").innerHTML = "";
                document.getElementById("email_error").innerHTML = "";
                document.getElementById("phone_error").innerHTML = "";
                document.getElementById("passport_error").innerHTML = "";
                document.getElementById("city_error").innerHTML = "";
                document.getElementById("state_error").innerHTML = "";
                document.getElementById("desiredCountry_error").innerHTML = "";
                document.getElementById("password_error").innerHTML = "";
                var fullname = document.getElementById('fullname').value
                // var dob = document.getElementById('dob').value
                var email = document.getElementById('email').value
                var phone = document.getElementById('phone').value
                var passport = document.getElementById('passport').value
                var password = document.getElementById('password').value
                var city = document.getElementById('city').value
                var state = document.getElementById('select_state').value
                var desiredCountry = document.getElementById('desiredCountry').value

                if (fullname == '' || fullname == null) {
                    document.getElementById("name_error").innerHTML = "Name required *";
                    return false;
                } else if (email == '' || email == null) {
                    document.getElementById("email_error").innerHTML = "email required *";
                    return false;

                } else if (phone == '' || phone.length < 10) {
                    document.getElementById("phone_error").innerHTML = "phone number required & must be at least 10 digit long *";
                    return false;
                } else if (isNaN(phone)) {
                    document.getElementById("phone_error").innerHTML = "Enter Numeric value only";
                    return false;
                } else if (passport == '' || passport == null) {
                    document.getElementById("passport_error").innerHTML = "passport number required *";
                    return false;
                } else if (city == 'select city' || city == null) {
                    document.getElementById("city_error").innerHTML = "city is required select one*";
                    return false;
                } else if (state == 'select state' || state == null) {
                    document.getElementById("state_error").innerHTML = "state is required select one*";
                    return false;
                } else if (desiredCountry == 'select desired country' || city == null) {
                    document.getElementById("desiredCountry_error").innerHTML = "desiredCountry is required select one*";
                    return false;
                } else if (password == '' || password == null || password.length <= 5) {
                    document.getElementById("password_error").innerHTML = "password number required & must be at least 6 char long*";
                    return false;
                }

                if (document.getElementById('ielts_yes').checked) {

                    document.getElementById("ieltsInfo").style.display =
                        'block';
                    document.getElementById("userInfo").style.display =
                        'none';
                }
                if (document.getElementById('ielts_no').checked) {
                    document.getElementById("educationInfo").style.display =
                        'block';
                    document.getElementById("userInfo").style.display =
                        'none';
                }


            }

            function expTogle(data) {
                if (data == 'yes') {
                    document.getElementById("expTableDIv").style.display =
                        'block';
                }
                if (data == 'no') {
                    document.getElementById("expTableDIv").style.display =
                        'none';
                }
            }


            function saveNext2() {
                document.getElementById("userInfo").style.display =
                    'none';
                document.getElementById("ieltsInfo").style.display =
                    'none';
                document.getElementById("educationInfo").style.display =
                    'block';
            }

            function saveNext3() {
                document.getElementById("userInfo").style.display =
                    'none';
                document.getElementById("ieltsInfo").style.display =
                    'none';
                document.getElementById("educationInfo").style.display =
                    'none';
                document.getElementById("experience").style.display =
                    'block';
            }

            // step back button -------------------


            function stepback(value) {
                if (value == 1) {
                    document.getElementById("userInfo").style.display =
                        'block';
                    document.getElementById("ieltsInfo").style.display =
                        'none';
                    document.getElementById("educationInfo").style.display =
                        'none';
                    document.getElementById("experience").style.display =
                        'none';
                } else if (value == 2) {
                    if (document.getElementById('ielts_yes').checked) {
                        document.getElementById("ieltsInfo").style.display =
                            'block';
                        document.getElementById("userInfo").style.display =
                            'none';
                        document.getElementById("educationInfo").style.display =
                            'none';
                        document.getElementById("experience").style.display =
                            'none';
                    }
                    if (document.getElementById('ielts_no').checked) {
                        document.getElementById("userInfo").style.display =
                            'block';
                        document.getElementById("ieltsInfo").style.display =
                            'none';
                        document.getElementById("educationInfo").style.display =
                            'none';
                        document.getElementById("experience").style.display =
                            'none';

                    }
                } else if (value == 3) {
                    document.getElementById("userInfo").style.display =
                        'none';
                    document.getElementById("ieltsInfo").style.display =
                        'none';
                    document.getElementById("educationInfo").style.display =
                        'block';
                    document.getElementById("experience").style.display =
                        'none';
                }

            }
        </script>
</body>


</html>