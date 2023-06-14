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

                    <h1 class="text-white">Company Overseas</h1>

				 </div>

            </div>

        </div>

		<div class="breadcrumb-row">

			<div class="container">

				<ul class="list-inline">

					<li><a href="<?php echo base_url(); ?>">Home</a></li>

					<li>Company Overseas</li>

				</ul>

			</div>

		</div>

		<div class="content-block">

			

          

			<div class="section-area bg-gray section-sp5">

				<div class="container">

					<div class="row">

						<div class="col-lg-12 col-md-12">

<div class="company-overseas-info">

<img src="assets/website/images/company-overseas.jpg">

							

							<p class="text-justify"><strong>'Cash kap'</strong> is a significant platform based in India specializing in providing guidance, expert assistance, authentic, and accurate information to the students through its different services. This new venture is the result of the idea of assisting students worldwide to explore their career choices. To ensure an extra edge, we are into the business of lending a hand to the aspirants who want to study at any level.</p>

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

