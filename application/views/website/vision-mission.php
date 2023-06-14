<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>

<html lang="en">

<head>

	<title><?php if (isset($siteTitle)) {
				echo $siteTitle;
			} ?></title>

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
						<h1 class="text-white">Vision & Mission</h1>
					</div>
				</div>
			</div>
			<div class="breadcrumb-row">
				<div class="container">
					<ul class="list-inline">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li>Vision & Mission</li>
					</ul>
				</div>
			</div>
			<div class="content-block">
				<div class="section-area bg-gray section-sp5">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="company-overseas-info">
									<img src="assets/website/images/vision-mission.jpg">
									<h2>Vision Statement</h2>
									<p class="text-justify">To be the best Education Consultancy by providing exemplary services to the student to get exposure different Institutions in one place. We want to make you feel proud and make us feel proud on overseas level.</p>
									<h2>Mission Statement</h2>
									<p class="text-justify">Our mission is to simplify the challenges of prospective aspirants to get their academic needs Fulfilled or fulfilled their academic needs. In addition, <strong>'cash kap'</strong> aims to tie up with the prestigious educational institutes in country as well as abroad to help the students select the career of their choice from everywhere.</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<?php include("includes/footer.php"); ?>
			<button class="back-to-top fa fa-chevron-up"></button>
		</div>
<?php include("includes/script.php"); ?>

</body>

</html>