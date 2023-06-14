<?php

defined('BASEPATH') or exit('No direct script access allowed');
$segment2 = $this->uri->segment(2);
$segment3 = $this->uri->segment(3)

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <?php include("includes/head.php"); ?>
    <title>
        <?php if (isset($siteTitle)) {
            echo $siteTitle;
        } ?>
    </title>
    <meta name="description" content=<?php if (isset($description)) {
                                            echo $description;
                                        } ?> />
    <meta name="keywords" content=<?php if (isset($keywords)) {
                                        echo $keywords;
                                    } ?> />
    <style>
        .coursemain-bx {
            /* padding-bottom: 2px; */
            height: 452px;
        }

        #coursh_list {
            width: 100%;
            padding-right: 0px;
            padding-left: 0px;
            margin-right: auto;
            margin-left: auto;
        }

        #clgName {
            font-size: 14px;
        }

        #table-font {
            margin: auto !important;
        }

        #table-font {
            margin-left: -12px;
        }

        #coursh_list_head {
            font-size: 15px;
        }

        @media only screen and (max-width: 1300px) {

            .row-style {
                width: 100% !important;
                margin-left: 0px;
            }
        }


        @media only screen and (max-width: 414px) {
            

            #text-header {
                padding: 0px !important;
            }

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

            #text-header {
                padding: 0px !important;
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

            #text-header {
                padding: 0px !important;
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

            #text-header {
                padding: 0px !important;
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

        .row-style {
            width: 1470px;
        }
        li ,span{
    text-transform: capitalize;
}
    </style>
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
                        <h1 class="text-white">Abroad/Collage/Universities</h1>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-row">
                <div class="container">
                    <ul class="list-inline">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>study/abroad">Study Abroad</a></li>
                        <li>Collage/Universities</li>
                    </ul>
                </div>
            </div>
            <div class="page-banner contact-page section-sp2 ">
                <div class="container  mt-3">
                    <div class="row row-style py-3">
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="side-bar1">
                                <div class="widget search-widget">
                                    <div class="widget-title">Search</div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="inpp form-control form-controlsearch state frm select2" name="cntrycode" id="cntrycode" required>
                                                <option value="">Select Country</option>
                                                <?php $cntrydata = $this->customcode->getAbrodcntry();
                                                foreach ($cntrydata as $staterow) { ?>
                                                    <option value="<?php echo $staterow->cntry_code; ?>"><?php echo $staterow->cntry_name; ?></option><?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12 text-center mt-5">
                                            <button class="btn button-md3 sbbtn" id="serchcontryform" type="submit" name="submit">SEARCH</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-9 order-2" id="main">
                            <div class="row">
                                <?php
                                if (count($AbroadClg) > 0) {
                                    foreach ($AbroadClg as $AbroadClgrow) {
                                        $clg_featuredimg = $AbroadClgrow->clg_img;
                                        if ($clg_featuredimg == "not available") {
                                            $clg_featuredimg = "assets/website/images/default_pic.png";
                                        } ?>
                                        <div class="col-md-4">
                                            <div class="coursemain-bx card">
                                                <div class="img-box" style="background-image: url(<?php echo base_url();  ?>assets/website/images/clgImg/<?php echo $clg_featuredimg; ?>);background-size: 100% 100%;"> </div>
                                                <div class="content_box">
                                                    <div class="info-bx text-center card-title">
                                                        <h5><?php echo $AbroadClgrow->clg_name; ?></h5>
                                                    </div>
                                                    <div class="loc-bx text-center">
                                                        <p><i class="fa fa-map-marker"style="color: #b6242e;"></i> <?php echo $AbroadClgrow->clg_addresh; ?>, <?php echo $AbroadClgrow->clg_cuntry; ?></p>
                                                    </div>
                                                    <div class="view-dt">
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#termscond" style="color: #ffffff;">
                                                            <p><span collegeNamne="<?php echo $AbroadClgrow->clg_name; ?>" dataid="<?php echo $AbroadClgrow->id ?>" class="btn2 margin">View Details</span> </p>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="col-md-12">
                                        <p style="color:#ff0000;">No result found. Please try after some time</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this section for pop for me  -->
                <div class="modal fade" id="termscond" tabindex="-1" role="dialog" aria-labelledby="termscondTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width: fit-content;">
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
                <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#serchcontryform').click(function() {
                            var cntrycode = $('#cntrycode').val();
                            if (cntrycode != '') {
                                window.location.href = "<?php echo base_url(); ?>study/abroad/collage/" + cntrycode;
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
                </script>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <button class="back-to-top fa fa-chevron-up"></button>
    </div>
    <?php include("includes/script.php"); ?>

</body>

</html>