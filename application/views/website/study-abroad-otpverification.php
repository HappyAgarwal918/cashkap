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
    <?php include "includes/head.php"; ?>

    <style>

    </style>


</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <?php include "includes/header.php"; ?>
        <!-- page conntent -->
        <div class="container-fluid" id="otpform">
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url("study/abroad"); ?>">Study Abroad</a></li>
                        <li>Abroad OTP Varification</li>
                    </ul>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5 my-5">
                <div class="col-6 border pt-3 pb-3 ">
                    <p style="font-weight: 400; color:#000">
                        Get the OTP verification number submitted from the mobile number entered by the student.
                    </p>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputText">Mobile Number</label>
                            <input type="text" class="form-control" id="exampleInputText" readonly value=<?php echo $phoneNo ?> aria-describedby="textHelp">
                        </div>
                        <div class="form-group">
                            <label for="otp">Enter OTP sent to above number</label>
                            <input type="text" class="form-control" id="otp" placeholder="OTP">
                        </div>
                        <button type="button" id="otpsubmit" class="btn btn-info mb-2">Submit</button>
                    </form>
                    <span id="otp_error" style="color: red;"></span><br />
                    <span id="otp_suc" style="color: green;"></span><br />
                    <div class="d-flex">
                    <u><span id="resendOTP" class="pr-3">Resend OTP</span></u>
                    <u><span id="editNo" class="pl-3"><a href="javascript:void(0)" data-toggle="modal" data-target="#termscond">Edit Mobile Number</a></span></u>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="termscond" tabindex="-1" role="dialog" aria-labelledby="termscondTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row d-flex justify-content-center mt-5 my-5">
                <div class="col-6 border pt-3 pb-3 ">
                    <p style="font-weight: 400; color:#000">
                        Update Your Mobile Number
                    </p>
                    <form >
                        <div class="form-group">
                            <label for="exampleInputText">Enter New Mobile Number</label>
                            <input type="text" id="NewMob" class="form-control" name="NewMob" aria-describedby="textHelp">
                        </div>
                        <button id="UpdateMob" type="submit" class="btn btn-info mb-2">Updae</button>
                    </form>
                </div>
            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- **************** after otp sucesfully ********************** -->
        <script>
            $(document).ready(function() {
                $('#otpsubmit').click(function() {
                    var otp = $('#otp').val();
                    if (otp != '') {
                        console.log("apicall------------")
                        $.ajax({
                            url: "<?php echo base_url(); ?>study-abroad-verifyotp",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                'otp': otp
                            },
                            success: function(rec) {
                                console.log(rec, "rec------------")
                                if (rec == 200) {
                                    document.getElementById('otpsubmit').disabled = true;
                                    document.getElementById("otp").readOnly = true;
                                    window.location.href = "<?php echo base_url(); ?>submit-offer-letter"
                                } else {
                                    document.getElementById("otp_error").innerHTML = "invalid OTP *";
                                }
                            }
                        });
                    } else {
                        document.getElementById("otp_error").innerHTML = "Enter OTP then click submit *";
                    }
                });
            })
            $(document).ready(function() {
                $('#UpdateMob').click(function() {
                    var NewMob = $('#NewMob').val();
                    if (NewMob != '') {
                        console.log("apicall------------")
                        $.ajax({
                            url: "<?php echo base_url(); ?>update/mobile/number",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                'NewMob': NewMob
                            },
                            success: function(rec) {
                                console.log(rec, "rec------------")
                                // if (rec == 200) {
                                //     document.getElementById('otpsubmit').disabled = true;
                                //     document.getElementById("otp").readOnly = true;
                                //     window.location.href = "<?php echo base_url(); ?>submit-offer-letter"
                                // } else {
                                //     document.getElementById("otp_error").innerHTML = "invalid OTP *";
                                // }
                            }
                        });
                    } else {
                        document.getElementById("otp_error").innerHTML = "Enter OTP then click submit *";
                    }
                });
            })
            $(document).ready(function() {
                $('#resendOTP').click(function() {
                    window.location.reload()
                })
            })
        </script>

    </div>
    <!-- Page Heading Box ==== -->
    <?php include "includes/footer.php"; ?>
    <button class="back-to-top fa fa-chevron-up"></button>
    <?php include "includes/script.php"; ?>

</body>

</html>