<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>


<!DOCTYPE html>
<html>

<head>
    <title>Study Abroad login </title>
    <?php include "includes/head.php"; ?>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"> -->
    <style>
        .login,
        .image {
            min-height: 100vh
        }

        .bg-image {
            background-image: url ('https://www.cashkap.com/assets/website/images/logo.png');
            background-color: #144366;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media only screen and (max-width: 991px) {
            .bg-image {
                height: 600px;
            }
        }
    </style>
</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <?php include "includes/header.php"; ?>
    </div>
    <div class="container-fluid">
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url("study/abroad"); ?>">Study Abroad</a></li>
                    <li>Abroad Student Login</li>
                </ul>
            </div>
        </div>
        <div class="row no-gutter">
            <div class="col-lg-6 col-sm-12 d-none d-md-flex bg-image"></div>
            <div class="col-lg-6 col-sm-12 bg-light">
                <div class="login d-flex  py-5">
                    <div class="container py-5">
                        <div class="row pt-5">
                            <div class="col-lg-7 col-xl-6 mx-auto">
                                <h3 class="display-4">LOGIN!!</h3> <br>
                                <form>
                                    <div class="form-group mb-3"> <input id="studEmail" type="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4"> </div>
                                    <div class="form-group mb-3"> <input id="studPassword" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-danger"><br> </div>
                                    <button type="button" id="submitLogin" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>

                                    <div class="text-center d-flex justify-content-between mt-4">
                                        <p> OR &nbsp;<a href="<?php echo base_url(); ?>abroad-student-registration" class="font-italic text-muted"> <u>Create Account</u></a></p>
                                    </div>
                                    <span id="email_message" style="color: red;"></span><br />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#submitLogin').click(function() {
                var studEmail = $('#studEmail').val()
                var studPassword = $('#studPassword').val()
                $.ajax({
                    url: "<?php echo base_url(); ?>submit-login-form",
                    method: "POST",
                    data: {
                        'studEmail': studEmail,
                        'studPassword': studPassword
                    },
                    success: function(rec) {

                        if (rec == 200) {
                            window.location.href = "<?php echo base_url(); ?>study/abroad"
                        } else {
                            document.getElementById("email_message").innerHTML = "invalid credentials *";
                        }
                    }
                })
            })
        })
    </script>


    <?php include "includes/footer.php"; ?>
    <button class="back-to-top fa fa-chevron-up"></button>
    <?php include "includes/script.php"; ?>

</body>

</html>