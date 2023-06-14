<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>submit offer later</title>
    <?php include "includes/head.php"; ?>

    <style>
        #student_auto_fill {
            border: 1px solid rgba(0, 0, 0, 0.548);
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 gray;
        }
        #text_block{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 gray;
            width:80%;
        }
        .text-center{
            padding-top:20px;
        }
        .text-center p{
            font-size:14px;
        }
        .text-center h3{
            background-color:#07294d;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 gray;
            color:white;
        }
        .student-paragraph {
            height: 100%;
            width: 100%;
            padding: 20px;
             
        }

        .anim {
            animation: animate 1.5s linear infinite;
            color: red;
        }

        .anim2 {
            animation: animate 1.8s linear infinite;
            color: green;
        }

        @keyframes animate {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 0.7;
            }

            100% {
                opacity: 0;
            }
        }
        @media only screen and (max-width: 420px){
            #text_block{ width:100%;}
            tbody{font-size:10px;}
            .text-center p{font-size:10px;}
        }
        @media only screen and (max-width: 280px){
            #text_block{ width:100%;}
            tbody{font-size:10px;}
            .text-center p{font-size:10px;}
            #student_auto_fill{font-size:10px;}
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
        <?php include "includes/header.php"; ?>
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url("study/abroad"); ?>">Study Abroad</a></li>
                    <li>Apply Oﬀer Letter</li>
                </ul>
            </div>
        </div>
        <div class="container-fluid" id="text_block">
            
            <div class="text-center mt-5">
                <h3>APPLY OFFER LETTER</h3>
                <div>
                    <p class="h5 text-danger mt-5">Students can apply oﬀer letter directly through Clg./Univ.'s website .</p>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="student-paragraph">
                        <div class="text-center">
                            <p class="h5 mb-4" style="color: #07294d;"><u>Students can apply oﬀer letter with the LAW firm.</u></p>
                        </div>
                        <table class="table">
        
                            <tr>
                                <th>Name of LAW firm</th>
                                <td>Flywayoverseas pvt. Ltd.</td>
                            </tr>
                            <tr>
                                <th>LAW firm address</th>
                                <td>SCO - 67, 2nd floor above belle hair & beauty salon </br>3b2 market mohali 160059</td>
                            </tr>
                            <tr>
                                <th>Phone no</th>
                                <td>098880 42255</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>Mohali(Panjab)</td>
                            </tr>
                            <tr>
                                <th>Office address</th>
                                <td>SCO - 67, 2nd floor above belle hair & beauty salon </br>3b2 market mohali 160059</td>
                            </tr>
                           
                        </table>
                        <div class="text-center">
                            <p class="h5" style="color: #07294d;"><u>Your (offer letter) profile has been sent to the lawyer of the visa firm . You will be the contacted soon via call or mail.  </u></p>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div>
                                <button class="button" onclick="buttonevnt(1)" id="offrLtrDir" type="button" value="submit" style="background-color:#07294D; color: white;">APPLY OFFER LETTER</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <H3>APPLY COE , LOA , I - 20</H3>
                <div>
                    <p class="h5 text-danger mt-5">Student can apply COE,LOA,I-20 directly through Clg./Univ's website.</p>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="student-paragraph">
                        <div class="text-center">
                            <p class="h5 mb-4" style="color: #07294d;"><u>Student can apply COE.LOA.I-20 with the LAW firm</u></p>
                        </div>
                        <table class="table">
        
                            <tr>
                                <th>Name of LAW firm</th>
                                <td>Flywayoverseas pvt. Ltd.</td>
                            </tr>
                            <tr>
                                <th>LAW firm address</th>
                                <td>SCO - 67, 2nd floor above belle hair & beauty salon </br>3b2 market mohali 160059</td>
                            </tr>
                            <tr>
                                <th>Phone no</th>
                                <td>098880 42255</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>Mohali(Panjab)</td>
                            </tr>
                            <tr>
                                <th>Office address</th>
                                <td>SCO - 67, 2nd floor above belle hair & beauty salon </br>3b2 market mohali 160059</td>
                            </tr>
                           
                        </table>
                        <div class="text-center">
                            <p class="h5" style="color: #07294d;"><u>Your (COE,LOA,I-20 ) profile has been sent to the lawyer of the visa firm. You will be contacted soon via call or mail.</u></p>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div>
                                <button class="button" onclick="buttonevnt(1)" id="offrLtrDir" type="button" value="submit" style="background-color:#07294D; color: white;">APPLY COE,LOA I-20
</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <H3>VISA  APPLY </H3>
                <div>
                    <p class="h5 text-danger mt-5">Student can apply Visa directly through Clg./Univ's. website.</p>
                </div>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="student-paragraph">
                        <div class="text-center">
                            <p class="h5 mb-4" style="color: #07294d;"><u>Student can apply Visa with the LAW firm</u></p>
                        </div>
                        <table class="table">
        
                            <tr>
                                <th>Name of LAW firm</th>
                                <td>Flywayoverseas pvt. Ltd.</td>
                            </tr>
                            <tr>
                                <th>LAW firm address</th>
                                <td>SCO - 67, 2nd floor above belle hair & beauty salon </br>3b2 market mohali 160059</td>
                            </tr>
                            <tr>
                                <th>Phone no</th>
                                <td>098880 42255</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>Mohali(Panjab)</td>
                            </tr>
                            <tr>
                                <th>Office address</th>
                                <td>SCO - 67, 2nd floor above belle hair & beauty salon </br>3b2 market mohali 160059</td>
                            </tr>
                           
                        </table>
                        <div class="text-center">
                            <p class="h5" style="color: #07294d;"><u>Your (VISA FILE ) profile has been sent to the lawyer of the visa firm. You will be contacted soon via call or mail.</u></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h4 style="color: #07294d;">LAWYER/EX-VISA OFFICER</h4>
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="student-paragraph">
                        <ul class="ml-4">
                            <li>Offer letter</li>
                            <li>COE</li>
                            <li>LOA</li>
                            <li>I-20</li>
                            <li>VISA FILE</li>
                        <div class="text-center">
                            <p class="h5" style="color: #07294d;">Lawyers work for students offer letter,COE,LOA,I-20 & VISA FILES.</p>
                        </div>
                        <div class="text-center mt-2">
                            <p class="h5" style="color: #07294d;">Your ( Offer letter , COE,LOA ,I-20 , VISA FILE) profile has been sent to the lawyer  of the visa firm . You will be contacted soon via call or mail.</p>
                        </div>
                        <div class="text-center mt-2">
                            <p class="h5" style="color: #07294d;">Whenever you pay the admission fee through the  LAW firm , Cashkap.com will provide you a Discount Coupon and when you start attending the classes , the cashback amount will be sent in your account.</p>
                        </div>

                        <div class="row mt-5 justify-content-center">
                            <div>
                                <button class="button" onclick="buttonevnt(1)" id="offrLtrDir" type="button" value="submit" style="background-color:#07294D; color: white;">VISA APPLY</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row  justify-content-center" id="autofill" style="display:  none; text-align:-webkit-center;">
                <div class="col-md-8 mt-5 text-center">
                    <h4 class="text-success anim2"> Thank you CASHKAP received your Application form we'll contact you shortly !....</h4>
                </div>
                <div class="col-12 mt-3  text-center">
                    <h2>DETAILS</h2>
                </div>
                <div class="col-lg-5  col-11 mt-3" id="student_auto_fill">
                    <span>
                        <p><b>STUDENT NAME -</b><?php echo $UserData->name  ?></p>
                    </span>
                    <span>
                        <p><b>CONTACT NO -</b> <?php echo $UserData->phone ?></p>
                    </span>
                    <span>
                        <p><b>MAIL ID - </b> <?php echo $UserData->email ?></p>
                    </span>
                    <span>
                        <p><b>CITY-</b> <?php echo $UserData->city ?></p>
                    </span>
                    <span>
                        <p><b>DESIRED COUNTRY - </b> <?php echo $UserData->desiredCountry ?></p>
                    </span>
                </div>
                <div class="col-12 mt-5 mb-5 text-center">
                    <div>
                        <a href="<?php echo base_url(); ?>">
                            <button class="button" type="button" value="submit"> back to website</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function buttonevnt(value) {
            if (value == 1) {

                document.getElementById('autofill').style.display = "none"
                document.getElementById('autofill').style.display = "block"
                document.getElementById('offrLtrDir').disabled = true
                document.getElementById('text_block').style.display = "none"

                // document.getElementById('offrLtr').disabled = true

            }
            // if (value == 2) {
            //     document.getElementById('autofill').style.display = "-webkit-box"
            //     document.getElementById('submitdoc').style.display = "none"
            //     document.getElementById('offrLtrDir').disabled = true
            //     // document.getElementById('offrLtr').disabled = true
            // }
        }


        // $(document).ready(function(e) {

        //     $('#file_upload_form').submit(function(e) {
        //         e.preventDefault();
        //         form = new FormData(this);
        //         var file_data = $('#file')[0].files;
        //         form.append('file', file_data);
        //         console.log('form-----------', ...form)
        //         $.ajax({
        //             url: '<?php echo base_url(); ?>Upload/fileUpload',
        //             type: "post",
        //             data: form,
        //             dataType: 'json',
        //             processData: false,
        //             contentType: false,
        //             cache: false,
        //             success: function(rec) {
        //                 console.log("data-------------", rec)
        //                 if (rec.error) {
        //                     document.getElementById('submit_error').innerHTML = rec.error
        //                 }
        //                 if (rec == 200) {
        //                     document.getElementById('submit_error').style.display = "-webkit-box"
        //                     document.getElementById('autofill').style.display = "-webkit-box"
        //                     document.getElementById('submitdoc').style.display = "none"
        //                     document.getElementById('text_block').style.display = "none"
        //                     document.getElementById('offrLtrDir').disabled = true
        //                     document.getElementById('offrLtr').disabled = true
        //                     alert("Upload Image Successful.");
        //                 }
        //             }
        //         });
        //     });


        // });
    </script>
    <?php include "includes/footer.php"; ?>
    <button class="back-to-top fa fa-chevron-up"></button>
    <?php include "includes/script.php"; ?>
</body>

</html>