<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>

<?php if(isset($siteTitle)){ echo $siteTitle; } ?>

</title>

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

        <h1 class="text-white">Student Terms & Conditions</h1>

      </div>

    </div>

  </div>

  <div class="breadcrumb-row">

    <div class="container">

      <ul class="list-inline">

        <li><a href="<?php echo base_url(); ?>">Home</a></li>

        <li>Student Terms & Conditions</li>

      </ul>

    </div>

  </div>

  <div class="content-block">

    <div class="section-area bg-white section-sp5 our-story">

      <div class="container">

        <div class="row align-items-center d-flex">

          <div class="col-lg-12 col-md-12">

           <ul class="list">
       <li>Portal gives the best coaching institute to Students as a facilitator.</li>
      <li>Student should come to log in on portal site. And give student information to coaching  institute.</li>
      <li>In case student give any fake information and documents to portal in this  condition portal is liable to close the admission file.</li>
      <li>Portal generates a code for student admission. Code valid for 72 hours only.</li>
      <li>Portal gives students details and code to the coaching institute.</li>
      <li>Portal sends that code to student and coaching institute as well.</li>
      <li>In  case the code was expiring student come to portal and regenerate the code.</li>
      <li>After  admission student is liable to adopt institute policies.</li>
      <li>In  case coaching institute and student have any dispute financially and legally.  Student and college discuss the matter and solve it themselves. Portal is not  interfere and responsible for that.</li>
      <li>Once after the  admission is done portal is not responsible for anything for any student and coaching institute issues.</li>
      <li>When student go  for the admission that time student have to submit the code to institute to eligible for admission.</li>
      <li>When student  complete the admission process and also deposit the fee. Student have to come to the portal to upload the fee deposit scanned sleep and liable to get 10% cash back.</li>
            </ul>

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

