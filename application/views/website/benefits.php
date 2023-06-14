<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>

<html lang="en">

<head>

	<title><?php if(isset($siteTitle)){ echo $siteTitle; } ?></title>
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

                    <h1 class="text-white">Benefits</h1>

				 </div>

            </div>

        </div>

		<div class="breadcrumb-row">

			<div class="container">

				<ul class="list-inline">

					<li><a href="<?php echo base_url(); ?>">Home</a></li>

					<li>Benefits</li>

				</ul>

			</div>

		</div>

		<div class="content-block">

			

          

			<div class="section-area bg-gray section-sp5">

				<div class="container">

					<div class="row">

						<div class="col-lg-12 col-md-12">

<div class="company-overseas-info">

<img src="assets/website/images/benefits.jpg">

<h2>To Students</h2>

<p class="text-justify">From the students, making a selection of the right course and right institution at a right place is a

crucial decision. Hence, students will get assistance in the selection of institution of their choice.

Apart, the financial assistance in kind of cash or reward points, cost of the study, fields of

specialization, faculty &amp; infrastructure, employment chances, and further education prospects

would be some of the key informative points provided by the company. In this the student will be

benefited.</p>





<h2>To Institute</h2>

<p class="text-justify">Through this collaborative initiative, <strong>'Cash kap'</strong> will collaborate with the institutions regarding

the quantity of admissions in an academic year and accordingly, the commission would be

agreed. This platform would help the institutions to increase the quantity of admission in an

academic year. All the information about institutions would be promoted on 'cash kap' . This

would allow the student to access the information such as fees structures, mode of payments,

suitable courses, and other informatory points with all the necessary details in order to make the

selection of the institution.</p>

						</div>

</div>



						

					</div>

				</div>

			</div>

			

		</div>

   <?php include("includes/footer.php"); ?>

	 <button class="back-to-top fa fa-chevron-up" ></button>

</div>

<?php include("includes/script.php"); ?>

</body>

</html>

