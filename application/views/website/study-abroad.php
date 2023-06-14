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
    <script>
        $(document).ready(function() {
            $(".testimonial .indicators li").click(function() {
                var i = $(this).index();
                var targetElement = $(".testimonial .tabs li");
                targetElement.eq(i).addClass('active');
                targetElement.not(targetElement[i]).removeClass('active');
            });
            $(".testimonial .tabs li").click(function() {
                var targetElement = $(".testimonial .tabs li");
                targetElement.addClass('active');
                targetElement.not($(this)).removeClass('active');
            });
        });
        $(document).ready(function() {
            $(".slider .swiper-pagination span").each(function(i) {
                $(this).text(i + 1).prepend("0");
            });
        });
    </script>
    <style>
        .slect-cntry {
            text-align: center;
            font-size: 20px;
            /* margin-top: 3px; */
        }

        /*         
        PLEASE DON'T TOUCH THIS CSS BEACOUSE ITS VERY IMPORTANT */

        select#state {
            text-transform: capitalize !important;
            background: transparent url(http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png) no-repeat 100% center;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #ffffff;
            margin-left: -30px;
            background-origin: content-box;
        }

        h1#cntryName {
            text-transform: capitalize !important;
        }

        .project-tab {
            padding: 10%;
            margin-top: -8%;
        }

        .project-tab #Search_data_table {
            background: #007b5e;
            color: #eee;
        }

        .project-tab #Search_data_table h6.section-title {
            color: #eee;
        }

        .project-tab #Search_data_table .nav-Search_data_table .nav-item.show .nav-link,
        .nav-Search_data_table .nav-link.active {
            color: #0062cc;
            background-color: transparent;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 3px solid !important;
            font-size: 16px;
            font-weight: bold;
        }

        .project-tab .nav-link {
            border: 2px solid rgb(255 255 255);
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            color: #ffffff;
            background-color: #b6242e;
            font-size: 16px;
            font-weight: 500;
        }

        .project-tab .nav-link:hover {
            border: none;
        }

        .project-tab thead {
            background: #f3f3f3;
            color: #333;
        }

        .project-tab a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }

        .btn-style1 {
            margin: auto;
            margin-top: 2px;
            width: fit-content;
        }

        .btn-style2 {
            margin: auto;
            margin-top: -20px;
        }

        .img-bgg {
            background: url("<?php echo base_url();  ?>assets/website/images/edu.svg");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .img-bgg1 {
            background: url("<?php echo base_url();  ?>assets/website/images/check.svg");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .top_bg {
            background-color: #eceef1;
        }

        .bgimg {
            background-image: url();
        }

        .serchbg {
            background-image: url("https://sevenoceans.in/wp-content/uploads/2017/02/study_abroad.jpg");
            height: 560px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

        }
        

        .serchdropdown {
            padding-top: 12rem;
        }

        button#country_checklist {
            border: 2px solid #fff;
            border-radius: 3em;
            font-size: 20px;
        }

        button#country_Provinces_checklist {
            border-radius: 3em;
            border: 2px solid #fff;
        }

        button#Search_data_btn {
            border-radius: 3em;
            border: 2px solid #fff;
        }


        /* home testimonial */
        body {
            background-color: #eee
        }

        .card {
            border: none
        }

        .user-content p {
            margin-top: 5px;
            font-size: 12px
        }

        .ratings i {
            color: blue
        }

        .clgInfocard {
            overflow: hidden;
            background: #f8f8f8;
            border: 1px solid #fff;
            min-height: 175px;
        }

        .info_bx {
            position: relative;
        }

        .viuedetals {
            text-align: center;
            padding: 6px;
            /* padding-top: 41px; */
        }

        .viuedetals a {
            color: white;
        }

        @import url("https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-size: 16px;
            font-weight: 300;
            line-height: 23px;
            font-family: "Poppins", sans-serif;
        }

        /* li{
            font-size: 21px;
            color: #000;
        } */

        a,
        a:hover {
            text-decoration: none;
        }

        body {
            font-family: "Montserrat", sans-serif;
        }

        body .testimonial {
            padding: 100px 0;
        }

        body .testimonial .row .tabs {
            all: unset;
            margin-right: 50px;
            display: flex;
            flex-direction: column;
        }

        body .testimonial .row .tabs li {
            all: unset;
            display: block;
            position: relative;
        }

        body .testimonial .row .tabs li.active::before {
            position: absolute;
            content: "";
            width: 50px;
            height: 50px;
            background-color: #71b85f;
            border-radius: 50%;
        }

        body .testimonial .row .tabs li.active::after {
            position: absolute;
            content: "";
            width: 30px;
            height: 30px;
            background-color: #71b85f;
            border-radius: 50%;
        }

        body .testimonial .row .tabs li:nth-child(1) {
            align-self: flex-end;
        }

        body .testimonial .row .tabs li:nth-child(1)::before {
            left: 64%;
            bottom: -50px;
        }

        body .testimonial .row .tabs li:nth-child(1)::after {
            left: 97%;
            bottom: -81px;
        }

        body .testimonial .row .tabs li:nth-child(1) figure img {
            margin-left: auto;
        }

        body .testimonial .row .tabs li:nth-child(2) {
            align-self: flex-start;
        }

        body .testimonial .row .tabs li:nth-child(2)::before {
            right: -65px;
            top: 50%;
        }

        body .testimonial .row .tabs li:nth-child(2)::after {
            bottom: 101px;
            border-radius: 50%;
            right: -120px;
        }

        body .testimonial .row .tabs li:nth-child(2) figure img {
            margin-right: auto;
            max-width: 300px;
            width: 100%;
            margin-top: -50px;
        }

        body .testimonial .row .tabs li:nth-child(3) {
            align-self: flex-end;
        }

        body .testimonial .row .tabs li:nth-child(3)::before {
            right: -10px;
            top: -66%;
        }

        body .testimonial .row .tabs li:nth-child(3)::after {
            top: -130px;
            border-radius: 50%;
            right: -46px;
        }

        body .testimonial .row .tabs li:nth-child(3) figure img {
            margin-left: auto;
            margin-top: -50px;
        }

        body .testimonial .row .tabs li:nth-child(3):focus {
            border: 10px solid red;
        }

        body .testimonial .row .tabs li figure {
            position: relative;
        }

        body .testimonial .row .tabs li figure img {
            display: block;
        }

        body .testimonial .row .tabs li figure::after {
            content: "";
            position: absolute;
            top: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            border: 4px solid #dff9d9;
            border-radius: 50%;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }

        body .testimonial .row .tabs li figure:hover::after {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        body .testimonial .row .tabs.carousel-indicators li.active figure::after {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        body .testimonial .row .carousel>h3 {
            font-size: 20px;
            line-height: 1.45;
            color: rgba(0, 0, 0, 0.5);
            font-weight: 600;
            margin-bottom: 0;
        }

        body .testimonial .row .carousel h1 {
            font-size: 40px;
            line-height: 1.225;
            margin-top: 23px;
            font-weight: 700;
            margin-bottom: 0;
        }

        body .testimonial .row .carousel .carousel-indicators {
            all: unset;
            padding-top: 43px;
            display: flex;
            list-style: none;
        }

        body .testimonial .row .carousel .carousel-indicators li {
            background: #000;
            background-clip: padding-box;
            height: 2px;
        }

        body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper {
            margin-top: 42px;
        }

        body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper p {
            font-size: 18px;
            line-height: 1.72222;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.7);
        }

        body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper h3 {
            color: #000;
            font-weight: 700;
            margin-top: 37px;
            font-size: 20px;
            line-height: 1.45;
            text-transform: uppercase;
        }

        @media only screen and (max-width: 1200px) {
            body .testimonial .row .tabs {
                margin-right: 25px;
            }
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

        p {
            font-size: 21px;
            font-weight: 500;
        }

        /* tabs */
        #tab-padding-bottom {
            padding-bottom: 30px !important;
        }

        .tab {
            float: none;
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #07294D;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color: white;
        }

        .tab button:hover {
            background-color: #ddd;
            color: #07294D;
            outline: none;
        }

        .tab button.active {
            background-color: #b6242e;
            color: white;
            outline: none;
        }

        .tabcontent_tab {
            height: 270px;
            display: none;
            padding: 6px 30px;
            border: 1px solid #ccc;
            border-top: none;
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s;
            background: #ffffff;
        }

        #coursh_insert {
            font-size: 10px;
            font-weight: 600;
        }

        #coursh_list_head {
            font-size: 15px;
        }

        #table-font {
            margin: auto !important;
        }

        #country_checklist_table h6 {
            color: #cf2a35;
        }

        #country_checklist_table p {
            color: #07294D;
        }

        @-webkit-keyframes fadeEffect {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeEffect {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        #country_checklist_table h1 {

            margin-bottom: 0px;
        }

        .serchbg .serchRow .form-control {
            width: 53%;
        }

        @media only screen and (max-width:1370px) {

            /* please do not remove this code ,  this is important and not send for external this code is important in enternal ! */
            .menu-links .nav .button-md {
                padding: 10px 10px;
                margin: 33px 3px;
            }

            .menu-logo img {
                margin-top: 17px
            }

            .aboutusRow {
                width: 731px !important;
                height: 468px !important;
                margin-top: 141px !important;
            }
        }

        @media only screen and (max-width:1100px) {
            #text-header {
                width: 100% !important;
                padding: 0px 1px 0px 1px;
            }

            .serchbg h3 {
                line-height: 50px !important;
            }

            #coursh_insert {
                font-size: 10px;
            }

            #Spouse_ql {
                font-size: 18px;
            }

            .aboutusRow {

                height: 629px !important;

            }
        }


        @media only screen and (max-width: 920px) {
            .tab {
                float: left;
                border: 1px solid #ccc;
                background-color: #07294D;
                width: 30%;
                height: 100%;
            }

            .btn-style1 {
                width: fit-content;
            }

            .tab button {
                display: block;
                background-color: inherit;
                color: white;
                width: 100%;
                border: none;
                outline: none;
                text-align: left;
                cursor: pointer;
                transition: 0.3s;
                font-size: 19px;
            }

            .tabcontent_tab {
                float: left;
                padding: 25px;
                border: 1px solid #ccc;
                width: 70%;
                border-left: none;
                height: 100%;
                font-size: 19px;
            }
        }

        @media only screen and (max-width: 912px) {
            .tab {
                height: 22vh;
            }

            .liStyle {
                font-size: 17px !important;
            }

            #text-header h3 {
                font-size: 20px;
            }

            .serchbg .serchRow .form-control {
                width: 95%;
            }
            .serchRow{left: 3% !important; padding-left: 0px !important; padding-right: 0px !important;}
        }

        @media only screen and (max-width: 820px) {
            .tab {
                height: 23vh;
            }

            .liStyle {
                font-size: 20px;
            }
            .aboutusRow{height: 773px !important; margin-top: 181px !important;}

        }

        @media only screen and (max-width: 768px) {
            .tab {
                height: 30vh;
            }

            .liStyle {
                font-size: 17px !important;
            }

            .tabcontent_tab {
                padding: 30px;
            }

            #tab-padding-bottom {
                padding-bottom: 2px !important;
            }
            .aboutusRow{height: 790px !important; margin-top: 186px !important;}
        }


        @media only screen and (max-width: 600px) and (min-width: 200px) {
            .tab {
                height: 53vh;
            }

            .tab button {
                font-size: 1.6vh;
            }

            .tabcontent_tab {
                font-size: 1.6vh;
                border: none;
            }

            .li-offer {
                padding-bottom: 10px;
            }

            ul {
                padding: 0px 10px 0px 20px;
            }
        }

        @media only screen and (max-width: 540px) {
            #text-header {
                margin-top: 15px !important;
                border-radius: 25px 25px 25px 25px !important;
                margin-left: 0px !important;
            }

            .serchbg .serchRow .form-control {
                width: 100%;
            }

            .slect-cntry {
                margin-top: 42px;
            }

            .serch #state {
                margin: auto;
                height: 50px !important;
                width: 72%;
            }

            select#state {
                margin-left: 0px;
            }

            .serchRow {
                left: 0px !important;
                padding-top: 0px !important;
            }

            .page-content {
                margin-top: 0px;
            }

            .eligibl {
                padding-bottom: 0px !important;
                box-shadow: none !important;
            }

            .aboutusRow {
                margin-top: 0px !important;
                height: auto !important;
                width: auto !important;
            }
            .serchbg .container{
                width: 95%;
            }
            .btn-style1{
                margin-top: -20px;
                padding-bottom: 25px;
            }
        }

        @media only screen and (max-width: 414px) {
          

            .serchbg h3 {
                font-size: 15px;
            }

            .tab {
                height: 59vh;
            }

            #coursh_list_head {
                font-size: 11px;
            }

            #coursh_insert {
                font-size: 9px;
            }

            button#country_checklist {
                font-size: 17px;
            }

            .serchRow {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
        }

        @media only screen and (max-width: 412px) {
            .tab {
                height: 58vh;
            }

            #text-header {
                margin-top: 30px !important;
            }

            .slect-cntry {
                margin-top: 23px;
            }

            #coursh_list_head {
                font-size: 8px;
            }

            #coursh_insert {
                font-size: 7px;
            }

        }

        @media only screen and (max-width: 393px) {
            .tab {
                height: 67vh;
            }

          

            .serchbg h3 {
                font-size: 15px;
            }

        }

        @media only screen and (max-width: 375px) {
            .tab {
                height: 89vh;
            }

            .serchbg h3 {
                font-size: 14px;
            }

            
        }

        @media only screen and (max-width: 280px) {
            .liStyle {
                font-size: 10px !important;
            }

            .tabcontent_tab {
                padding: 0px 0px 0px 10px;
                padding-top: 6px !important;
            }

            .serchdropdown {
                padding-top: 14rem;
            }

            .form-controlsearch {
                height: 50px !important;
            }

            .btn-style1 #country_checklist {
                font-size: 10px;
            }

            .tab button {
                text-align: center;
                padding: 14px 1px;
            }

            #tab-padding-bottom {
                padding-bottom: 0px !important;
            }

            .tab {
                height: 60vh;
            }

            .button {
                width: 142px;
            }

          
            .serchbg h3 {
                line-height: 30px;
                font-size: 15px;
            }

            #table-font {
                margin-left: -12px;
            }

            #coursh_list_head {
                font-size: 8px;
            }

            #clgName {
                font-size: 14px;
            }

            #coursh_list h3 {
                font-size: 14px;
            }

            #coursh_list_head {
                font-size: 5px;
            }

            #coursh_insert {
                font-size: 5px;
            }

            #text-header h3 {
                font-size: 15px;
            }

        }

        #coursh_list {
            width: 100%;
            padding-right: 0px;
            padding-left: 0px;
            margin-right: auto;
            margin-left: auto;
        }

        .liStyle {
            font-size: 16px;
            font-weight: 500;
        }

        .serchbg h3 {
            line-height: 42px;
        }

        #text-header {
            height: 67px;
            background-color: #b6242e;
            border-radius: 25px 0px 0px 25px;
            width: 100%;
            padding-top: 2px;
            margin: auto;
            /* margin-top: 40px; */
            margin-left: 20px;
            box-shadow: 3px 3px 7px -3px !important;
        }

        .aboutusRow {
            width: 731px;
            height: 420px;
            margin-top: 92px;

        }

        .eligibl {
            padding-bottom: 50px;
            background-color:#f5f5f5c2;
            border-radius: 20px;
            box-shadow: 3px 3px 3px 3px #d3d0d0
        }

        .serchRow {
            position: relative;
            left: 11%;
            padding-top: 53px;
            padding-left: 60px;
            padding-right: 60px;
        }
    </style>


</head>

<body id="bg">


    <div class="page-wraper">
        <!-- <div id="loading-icon-bx"></div> -->
        <?php include "includes/header.php"; ?>
        <div class="serchbg serchdropdown ">
            <div class="page-content eligibl container">
                <div class=" mt-5 pt-3">
                    <div class="row serchRow">
                        <div class="col-sm-6">
                            <div class="text-center " id="text-header">
                                <h3 style="color:#fff;margin-top: 2%;">Select your desired Country </h3>

                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <select class="slect-cntry inpp margininpp form-control form-controlsearch state frm btd " name="stateName " id="state" required="">
                                <option value="">Select Country</option>
                                <?php foreach ($CountryData as $row) {
                                    echo '<option value="' . $row->cntry_code . '">' . $row->cntry_name . ' </option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- checklist button  -->
                <div class="btn-style1 row " id="scrollTable">
                    <button type="button" id="country_checklist" class="btn mt-5 btn-primary btn-lg btn-block" onclick="scrollTable()">Check Country Eligibility</button>
                </div>
            </div>
        </div>
        <div class="boxborder form-style " style="background-color:#07294D;">
            <marquee class="text-center" style="text-align: center;font-weight: 500; color:#fff">
                Check eligibility for Canada Study Visa.&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>&emsp; Check eligibility for Australia study visa.&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>
                &emsp;Check eligibility for UK study visa.&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>
                &emsp;Check eligibility for USA study visa.&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>&emsp; Check eligibility for Singapore study visa.

                .&emsp;<i class="fa " style="color:#b6242e;">&#xf061;</i>&emsp; Check eligibility for Cyprus study visa.
            </marquee>
        </div>
        <div class="container">
            <!-- cntry table -->
            <div class="container text-center  my-4" id="country_checklist_table" style="border:2px solid black;">
                <div class="row">
                    <div class="col-12 p-0 top_bg">
                        <div class="row m-0">
                            <div class="col-12 p-2 " style="border-bottom: 2px solid black; background-color:white;">
                                <u>
                                    <h1 class="text-center display-5" id="cntryName"></h1>
                                </u>
                            </div>
                        </div>

                        <h4 class="text-center "></h4>
                        <div class="row p-0 m-0">
                            <div class="col-md-6  ">
                                <h6 class="text-center" style="padding-top: 21px;">IELTS MANDETORY</h6>
                            </div>
                            <div class="col-md-6 text-center">
                                <p id="ielts_YN" style="padding-top: 21px;"></p>
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
                                <h6 class="">12th%</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p id="twelth_p"></p>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6 py-2">
                                <h6 class="">Gap acceptable</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p id="gap_twelth"></p>
                            </div>
                        </div>
                        <div class="row py-2 bg-light">
                            <div class="col-md-6 py-2">
                                <h6 class="">Ielts requirment</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p id="ielts_req"></p>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6">
                                <h6 class="">Funds</h6>
                            </div>
                            <div class="col-md-6 py-2">
                                <div id="fund_twelth"></div>
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
                                <p id="Graduation_p"></p>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6 py-2">
                                <h6 class="">Gap acceptable</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p class="" id="gap_Graduation"></p>
                            </div>
                        </div>
                        <div class="row py-2 bg-light">
                            <div class="col-md-6 py-2">
                                <h6 class="">Ielts requirment</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p class="" id="bands_Graduation"></p>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-6 py-2">
                                <h6 class="">Funds</h6>
                            </div>

                            <div class="col-md-6 py-2" id="funds_Graduation"></div>
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
                                <p class="" id="master_p"></p>
                            </div>
                        </div>
                        <div class="row bg-light">
                            <div class="col-md-6 py-2">
                                <h6 class="">Gap acceptable</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p class="" id="gat_master"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 py-2">
                                <h6 class="">Ielts requirment</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p id="ielts_rq_master"></p>
                            </div>
                        </div>
                        <div class="row bg-light">
                            <div class="col-md-6 py-2">
                                <h6 class="">Funds</h6>
                            </div>
                            <div class="col-md-6 py-2" id="fund_master"></div>
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
                                <p class="" id="Spouse_ql"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 py-2">
                                <h6 class="">Percentage %</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p class="" id="Spouse_p"></p>
                            </div>
                        </div>
                        <div class="row bg-light">
                            <div class="col-md-6 py-2">
                                <h6 class="">Gap acceptable</h6>
                            </div>

                            <div class="col-md-6 py-2">
                                <p class="" id="Spouse_gap"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 py-2">
                                <h6 class="">Age</h6>
                            </div>
                            <div class="col-md-6 py-2" id="Spouse_eag"></div>
                        </div>

                        <div class="row bg-light">
                            <div class="col-md-6 py-2">
                                <h6 class="">Marrige time period</h6>
                            </div>
                            <div class="col-md-6 py-2" id="Spouse_marrige"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 py-2">
                                <h6 class="">Ielts requirment</h6>
                            </div>
                            <div class="col-md-6 py-2">
                                <p class="" id="Spouse_iltsRq"></p>
                            </div>
                        </div>

                        <div class="row bg-light">
                            <div class="col-md-6 py-2">
                                <h6 class="">Funds</h6>
                            </div>
                            <div class="col-md-6 py-2" id="Spouse_fund"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 py-2">
                                <h6 class="">Intakes</h6>
                            </div>
                            <div class="col-md-6 py-2">
                                <p class="" id="intake"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 pb-3">
                                <div class="btn-style2" id="Apply_btn"></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- testimonial Data -->
        <div class="page-content bg-white">
            <div class="content-block">
                <div class="section-area section-sp2 popular-courses-bx">
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-around">
                            <div class="col-md-5">
                                <img class="aboutusRow" src="<?php echo base_url(); ?>assets/website/images/aboutUsStudy.jpg">

                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12 heading-bx text-center">
                                        <h2 class="title-head mt-3 mb-2">About Study Abroad</a></h2>
                                        <img src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                                    </div>
                                </div>
                                <div class="row text-justify font-weight-bold">
                                    <ul style="list-style-type:disc;">
                                        <li class="li-offer">Cashkap.com provides Quality clg./ uni. for study in abroad. You can go to Canada, USA, UK, Australia, Singapore & Cyprus for Abroad study through Cashkap.com and can get upto 5% to 10% cashback on your Admission fee.</li>
                                        <li class="li">Through Cashkap.com you can check your profile by yourself for abroad study
                                            & may conclude whether you can go to your desired country or not.</li>
                                        <li class="li">You can now access your profile absolutely free of Charge from the Ex visa officer/lawyer of the desired country .</li>
                                        <li class="li">On Cashkap.com students can use both online & offline modes to get their
                                            (1) offer letter (2)COE,LOA ,I-20 (3) Visa apply through associated LAW form.</li>
                                        <li class="li">At Cashkap.com, student can check on their eligibilities for different countries like Canada,Australia, USA, UK, Singapore, Cyprus to study in & may select their desired country .</li>
                                        <li class="li">At Cashkap.com there are approx 350 best coll./univ. from Canada, Australia, UK, USA ,Singapore & Cyprus. You can easily select one of them for your further studies.</li>
                                        <li class="li">When you pay the admission fee through the LAW firm , we will provide you a discount coupon from cashkap.com & when you attend the classes , Cashback will be sent in your bank account. </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section style="background: #eee;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mb-3 text-center">
                                    <h2 class="title-head mt-3 mb-2">Countries We Serve</h2>
                                    <img src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                                </div>
                            </div>
                            <div id="tab-padding-bottom">
                                <div class="tab">
                                    <button class="tablinks active" onclick="openCity(event, 'CANADA')">CANADA</button>
                                    <button class="tablinks" onclick="openCity(event, 'AUSTRALIA')">AUSTRALIA</button>
                                    <button class="tablinks" onclick="openCity(event, 'UK')">UK</button>
                                    <button class="tablinks" onclick="openCity(event, 'USA')">USA</button>
                                    <button class="tablinks" onclick="openCity(event, 'SINGAPORE')">SINGAPORE</button>
                                    <button class="tablinks" onclick="openCity(event, 'Cyprus')">CYPRUS</button>
                                </div>


                                <div id="CANADA" class="tabcontent_tab " style="display: block; padding-top:25px">
                                    <ul>
                                        <li class="liStyle"> On Cashkap.com there are approx 200 best Clg. & Univ. in Canadian provinces. You can
                                            easily get enrolled in one of them by the help of cashkap.com .</li>
                                        <li class="liStyle">If you go for study in Canada through Cashkap.com then you can get upto 10% cashback on your fee.</li>
                                        <li class="liStyle">Cashback will be sent in your account when you start attending the classes</li>
                                        <li class="liStyle">Register for the discount coupon of 10% by clicking on the apply button</li>

                                    </ul>
                                </div>

                                <div id="AUSTRALIA" class="tabcontent_tab" style=" padding-top:25px">
                                    <ul>
                                        <li class="liStyle"> On Cashkap.com there are approx 180 best Clg. & Univ. in Australian provinces. You can
                                            easily get enrolled in one of them by the help of cashkap.com .</li>
                                        <li class="liStyle">If you go for study in Australia through Cashkap.com then you can get upto 10% cashback on your fee.</li>
                                        <li class="liStyle">Cashback will be sent in your account when you start attending the classes</li>
                                        <li class="liStyle">Register for the discount coupon of 10% by clicking on the apply button</li>

                                    </ul>
                                </div>
                                <div id="UK" class="tabcontent_tab" style=" padding-top:25px">
                                    <ul>
                                        <li class="liStyle">On Cashkap.com there are approx 150 best Clg. & Univ. in UK's provinces. You can
                                            easily get enrolled in one of them by the help of cashkap.com .</li>
                                        <li class="liStyle">If you go for study in UK through Cashkap.com then you can get upto 10% cashback
                                            on your fee.</li>


                                        <li class="liStyle">Cashback will be sent in your account when you start attending the classes.</li>
                                        <li class="liStyle">Register for the discount coupon of 10% by clicking on the apply button</li>
                                    </ul>
                                </div>

                                <div id="USA" class="tabcontent_tab" style=" padding-top:25px">
                                    <ul>
                                        <li class="liStyle">On Cashkap.com there are approx 180 best Clg. & Univ. in USA's provinces. You can
                                            easily get enrolled in one of them by the help of cashkap.com .</li>
                                        <li class="liStyle">If you go for study in USA through Cashkap.com then you can get upto 10% cashback
                                            on your admission fee.</li>


                                        <li class="liStyle">Cashback will be sent in your account when you start attending the classes.</li>
                                        <li class="liStyle">Register for the discount coupon of 10% by clicking on the apply button</li>
                                    </ul>
                                </div>

                                <div id="SINGAPORE" class="tabcontent_tab" style=" padding-top:25px">
                                    <ul>
                                        <li class="liStyle">On Cashkap.com there are approx 100 best Clg. & Univ. in Singapore . You can
                                            easily get enrolled in one of them by the help of cashkap.com .</li>
                                        <li class="liStyle">If you go for study in Singapore through Cashkap.com then you can get upto 10% cashback
                                            on your admission fee.</li>

                                        <li class="liStyle">Cashback will be sent in your account when you start attending the classes.</li>
                                        <li class="liStyle">Register for the discount coupon of 10% by clicking on the apply button</li>

                                    </ul>
                                </div>
                                <div id="Cyprus" class="tabcontent_tab" style=" padding-top:25px">
                                    <ul>
                                        <li class="liStyle">On Cashkap.com there are approx 90 best Clg. & Univ. in Cyprus . You can
                                            easily get enrolled in one of them by the help of cashkap.com .</li>
                                        <li class="liStyle">If you go for study in Cyprus through Cashkap.com then you can get upto 10% cashback
                                            on your fee.</li>

                                        <li class="liStyle">Cashback will be sent in your account when you start attending the classes.</li>
                                        <li class="liStyle">Register for the discount coupon of 10% by clicking on the apply button</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </div>
        <div style="background: #ffffff;" id="Abslider">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 heading-bx text-center">
                        <h2 class="title-head mt-3 mb-2">Our Associated Universities & Colleges</a></h2>
                        <img src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                    </div>
                </div>
                <div class="row">
                    <div class="courses-carousel owl-carousel owl-btn-1 mb-3 col-12 p-lr0">
                        <?php
                        foreach ($instdata as $instrow) {

                        ?>
                            <div class="item cchinst">
                                <div class="action-box"><img src="<?php echo base_url();  ?>assets/website/images/clgImg/<?php echo $instrow->clg_img; ?>"></div>
                                <div class="clgInfocard">
                                    <div class="info_bx text-center" style="font-weight: 500;">
                                        <h5><?php echo $instrow->clg_name; ?></h5>
                                        <i class="fa fa-map-marker" style="color: #b6242e;"></i> <strong>Location:</strong></br> <?php echo $instrow->clg_addresh; ?>, <?php echo $instrow->clg_cuntry; ?>
                                    </div>
                                </div>
                                <div class="viuedetals card-footer ">
                                    <div class=""><span collegeNamne="<?php echo $instrow->clg_name; ?>" dataid="<?php echo $instrow->id ?>" class="btn2 margin"><a href="javascript:void(0)" data-toggle="modal" data-target="#termscond">View Details</a></span> </div>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- this section for pop for me  -->
        <div class="modal fade" id="termscond" tabindex="-1" role="dialog" aria-labelledby="termscondTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container" id="coursh_list" style="display: none;">
                            <div class="row">
                                <div class="col-md-12 heading-bx text-center">
                                    <h2 class="title-head mt-3 mb-2" id="clgName"></h2>
                                    <h3 class="title-head mt-3 mb-2">Course List</h3>
                                    <img src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                                </div>
                            </div>
                            <div>
                                <table class="table table-striped" id="table-font">
                                    <thead id="coursh_list_head">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Courses</th>
                                            <th scope="col">Tution fee</th>
                                            <th scope="col">Application fee</th>
                                            <th scope="col">Apply</th>
                                        </tr>
                                    </thead>
                                    <tbody id="coursh_insert">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial Data end-->

        <div class="container mt-5 mb-5">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="card p-3 text-center px-4">
                        <div class="user-image"> <img src="https://i.imgur.com/PKHvlRS.jpg" class="rounded-circle" width="80"> </div>
                        <div class="user-content">
                            <h5 class="mb-0">Bruce Hardy</h5> <span>Software Developer</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 text-center px-4">
                        <div class="user-image"> <img src="https://i.imgur.com/w2CKRB9.jpg" class="rounded-circle" width="80"> </div>
                        <div class="user-content">
                            <h5 class="mb-0">Mark Smith</h5> <span>Web Developer</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 text-center px-4">
                        <div class="user-image"> <img src="https://i.imgur.com/ACeArwY.jpg" class="rounded-circle" width="80"> </div>
                        <div class="user-content">
                            <h5 class="mb-0">Veera Duncan</h5> <span>Software Architect</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    </div>
                </div>
            </div>
        </div>

    </div>






    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        // ********** button /tablele script*************
        // $(".tab").css("float", "none");

        window.onload = function() {
            // document.getElementById("country_checklist").style.display = 'none';
            // document.getElementById("country_Provinces_checklist").style.display = 'none';
            document.getElementById("country_checklist_table").style.display = 'none';
            document.getElementById("country_Provinces_checklist_table").style.display = 'none';
            document.getElementById("Search_data_btn").style.display = 'none';
            document.getElementById("Search_data_table").style.display = 'none';


        }

        function openCity(evt, cityName) {
            var i, tabcontent_tab, tablinks;
            tabcontent_tab = document.getElementsByClassName("tabcontent_tab");
            for (i = 0; i < tabcontent_tab.length; i++) {
                tabcontent_tab[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }


        //PROVINCES loding from hear----------------
        $(document).ready(function() {
            $('#state').change(function() {
                var state_name = $('#state').val();
                if (state_name != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>provinces/list",
                        method: "POST",
                        data: {
                            country_code: state_name
                        },
                        success: function(response) {
                            $('#PROVINCES').html(response);
                            document.getElementById("country_checklist").style.display =
                                'block';
                            document.getElementById("country_checklist_table").style.display =
                                'none';
                            document.getElementById("country_Provinces_checklist_table").style
                                .display = 'none';
                            // document.getElementById("Search_data_btn").style.display = 'none';
                            // document.getElementById("Search_data_table").style.display = 'none';
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $('.btn2').click(function() {
                var id = $(this).attr('dataid')
                var collegeNamn = $(this).attr('collegeNamne')
                console.log(collegeNamn, "-------------------collegeNamne")
                document.getElementById('clgName').innerHTML = collegeNamn;
                console.log(id, "-------------------id")
                $.ajax({
                    url: "<?php echo base_url(); ?>abroad-get-coursh",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        dataid: id
                    },
                    success: function(rec) {
                        $("#coursh_insert").empty();
                        var tableRows = '';
                        console.log("responce----------------")
                        console.log(rec, "responce----------------")
                        for (let i = 0; i < rec.coursh.length; i++) {
                            tableRows += `
                    <tr>
                        <td>${[i+1]}</td>
                        <td>${rec.coursh[i].coursh}</td>
                        <td>${rec.coursh[i].tutionfee}</td>
                        <td>${rec.coursh[i].applicationfee}</td>
                        <td><a href="<?php echo base_url(); ?>abroad-apply/${rec.coursh[i].id}">Apply</a></td>
    

                    </tr>`;
                        }
                        if (tableRows == '' || tableRows == null) {
                            tableRows = `
                    <tr>
                        <td>NULL</td>
                        <td>NULL</td>
                        <td>NULL</td>
                        <td>NULL</td>
                        <td>coming soon</td>
                    </tr>`;

                        }
                        $("#coursh_insert").html(tableRows);
                        document.getElementById('coursh_list').style.display = 'block';
                    }
                });
            });
        });

        //************************ country checklist script***************
        $(document).ready(function() {
            $('#country_checklist').click(function() {

                var state_name = $('#state').val();
                if (state_name != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>country/checklist",
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            country_code: state_name
                        },
                        success: function(response) {
                            $("#cntryName,#apcntryname ,#Apply_btn, #ielts_YN,#twelth_p ,#gap_twelth ,#ielts_req ,#fund_twelth ,#Graduation_p ,#gap_Graduation ,#bands_Graduation ,#funds_Graduation ,#master_p,#gat_master ,#ielts_rq_master,#fund_master,#Spouse_ql ,#Spouse_p ,#Spouse_gap, #Spouse_eag ,#Spouse_marrige ,#Spouse_iltsRq ,#Spouse_fund ,#intake").empty();
                            console.log(response, "----------------------response")
                            console.log("cntry_name------------------", response[0].cntry_name)
                            $('#cntryName').append(response[0].cntry_name + "&nbsp; Eligibility List");
                            $('#ielts_YN').append(response[0].ielts_requ);
                            $('#twelth_p').append(response[0].twelth_per);
                            $('#gap_twelth').append(response[0].twelth_gap_acceptable);
                            $('#ielts_req').append(response[0].twelth_Ielts_requirment);
                            $('#fund_twelth').append(response[0].twelth_funds);
                            $('#Graduation_p').append(response[0].graduation_per);
                            $('#gap_Graduation').append(response[0].graduation_gap_acceptable);
                            $('#bands_Graduation').append(response[0].graduation_Ielts_requirment);
                            $('#funds_Graduation').append(response[0].graduation_funds);
                            $('#master_p').append(response[0].masters_percentage);
                            $('#gat_master').append(response[0].masters_gap_acceptable);
                            $('#ielts_rq_master').append(response[0].masters_Ielts_requirment);
                            $('#fund_master').append(response[0].masters_funds);
                            $('#Spouse_ql').append(response[0].spouse_qualification);
                            $('#Spouse_p').append(response[0].spouse_percentage);
                            $('#Spouse_gap').append(response[0].spouse_gap_acceptable);
                            $('#Spouse_eag').append(response[0].spouse_age);
                            $('#Spouse_marrige').append(response[0].spouse_marrige_time_period);
                            $('#Spouse_iltsRq').append(response[0].spouse_Ielts_requirment);
                            $('#Spouse_fund').append(response[0].spouse_funds);
                            $('#intake').append(response[0].spouse_intakes);
                            $('#Apply_btn').append(`<a href="<?php echo base_url() ?>abroad-apply-counrty/${response[0].cntry_name}">
                                <button type="button" class=" button  mt-5  btn-lg "> Apply Now </button></a>
                            `);

                            document.getElementById("country_checklist_table").style.display =
                                'block';
                        }
                    });
                }
            });
        });
    </script>
    <script>
        function scrollTable() {
            const element = document.getElementById("scrollTable");
            element.scrollIntoView();
        }
    </script>


    <!-- Page Heading Box ==== -->


    <?php include "includes/footer.php"; ?>
    <button class="back-to-top fa fa-chevron-up"></button>
    <?php include "includes/script.php"; ?>

</body>

</html>