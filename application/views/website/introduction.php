<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php if(isset($siteTitle)){ echo $siteTitle; } ?></title>
<meta name="description" content= <?php if(isset($description)){ echo $description; } ?> /> 

<?php include("includes/head.php"); ?>

</head>

<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
<?php include("includes/header.php"); ?>
<div class="page-content">
<div class="page-banner " style="background-image:url(assets/website/images/abtbnrr.jpg);">
  <div class="container">
    <div class="page-banner-entry">
      <h1 data-aos="fade-up" class="text-white">About Us</h1>
    </div>
  </div>
</div>
<div class="breadcrumb-row">
  <div class="container">
    <ul class="list-inline" data-aos="fade-in">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li>About Us</li>
    </ul>
  </div>
</div>
<div class="container mt-3">
    <div class="row  py-3">
        <div class=" col-md-3 order-1" id="sticky-sidebar">
            <div class="sticky-top">
                <div class="col-md-12" >
                  <p>SEARCH HERE</p>
                        <?php
              $attributes = array( 'method' => 'post', 'autocomplete' => 'off', 'id' => 'deliverycheck');
              echo form_open_multipart('', $attributes);
              ?>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="inpp form-control form-controlsearch state frm select2" name="state" id="state" required>
                    <option value="">Select State</option>
                    <?php foreach ($statedata as $staterow) { ?>
                      <option value="<?php echo $staterow->state_name; ?>" <?php echo set_select('state', $staterow->state_name); ?>><?php echo $staterow->state_name; ?></option>
                    <?php } ?>
                  </select>
                  <p class="errorhome"><?php echo form_error('state'); ?></p>
                            </div>
                            <div class="col-md-12">
                                <select class="inpp form-control form-controlsearch city select2" name="city" id="city" tabindex="-1" required>
                    <option value="">Select City</option>
                  </select>
                  <p class="errorhome"><?php echo form_error('city'); ?></p>
                            </div>
                            <div class="col-md-12">
                                <select class="inpp form-control form-controlsearch course_id select2" name="course_id" id="course_id" tabindex="-1" required>
                    <option value="">Select Course</option>
                  </select>
                  <p class="errorhome"><?php echo form_error('course_id'); ?></p>
                            </div>
                            <div class="col-md-12 text-center mt-5">
                                <button class="btn button-md3 sbbtn" type="submit" name="submit">SEARCH</button>
                            </div>
                            <?php echo form_close();  ?>
                        </div>
              
              
            </div>
            </div>
        </div>
        <div class=" col-12 col-md-9 order-2" id="main">
          <div class="row">
                <div class="col-md-12 mb-4" data-aos="fade-in">
                  <img class="img-fluid" src="assets/website/images/abtbnr.jpg">
                </div>
                <div class="col-md-12" data-aos="fade-in">
                  <h2 class="m-b10" style="font-size:32px;">About CashKap</h2>
                      
                      <p class="text-justify" style="line-height: 26px">In today's hectic life; students have to go to schools, colleges, Universities and coaching institutes of different cities to get their information. With this, both the time and money of the students are wasted. "Cashkap.com" is an online platform designed to keeping in mind the needs of the students and the institutes. It is a platform where students can find the best and reputed schools, colleges, Universities and coaching institutes according to their city. Along with this they can compare the course information, fees, facilities and achievements of the schools, colleges, Universities and coaching institutes. Also they can get admission in a best coaching institute sitting at their home. After taking admission in any education institute Student can save time and money by taking 5-10 % cash back of their fees on "cashkap.com".</p>
                </div>
              </div>
              <div class="row">
      <div class="col-md-6" data-aos="fade-in">
        <h2 class="m-b10" style="font-size:32px;">Students save Money and Time?</h2>
            
            <p class="text-justify" style="line-height: 30px">Now students can search and choose the best and reputed coaching institutes for them online out of a list of institutes situated in their cities and take admission in the same through "cashkap.com". "Cashkap.com" not only lets you compare the details of the institutes but also makes you applicable for cash back on your fees. To avail cash back you can simply book your seat, then after paying your fees to the institutes you can avail up to 5-10% cash back on your fees from "cashkap.com".</p>
      </div>
            <div class="col-md-6 mb-4" data-aos="fade-in">
        <img class="img-fluid" src="assets/website/images/bfd.jpg">
      </div>
    </div>
       <div class="row">
      <div class="col-md-12">
        <h2 data-aos="fade-down" style="margin-bottom:10px">What does a student have to do?</h2>
         <ul data-aos="fade-up" style="padding:0px; margin-left:12px;line-height: 40px;">
          <li>Firstly you have to choose your state, city and course on "cashkap.com".</li>
            <li>Now you can see a complete list of all the institutes in your city offering your desired course.</li>
            <li>Now you can choose and compare these institutes based on your requirements and then select the one best suitable for you.</li>
            <li>After choosing the institute the student can apply for admission.</li>
             <li>The student will now have to create a login account on "cashkap.com" after which the student will receive an email or a message which will contain the details of their course and institute which will be used as a discount coupon by the student to avail cash back later.</li>
               <li>Students can take admission in their coaching institutes within four working days, after they receive their email/discount coupon.</li>
               
                <li>After that student can login into their account and then apply for cash back up to 5-10% on their fees from cashkap.com.</li>
             
         </ul>
      </div>
    </div>
     <div class="row">
      <div class="col-md-12 text-center">
        <h2 data-aos="fade-up" style="margin-bottom:10px">Business Opportunity for Coaching Institutes</h2>
          <p data-aos="fade-up" class="text-center">Coaching institutes can now get students with good profiles for their institutes without even spending a penny through "cashkap.com". For this, the institute has to register as an associate on "cashkap.com", and then has to fill in their authentic details like their courses, fee structure, facilities, achievements and some photographs of their institute to create their profile.("cashkap.com" can anytime visit the institute to cross check the information provided in the associate's profile about their institute.)<br>
            <br>
            "Cashkap.com" will also promote your institute's profile on different platforms like print media, TV, Unipoles, and social media platforms like Face book, Instagram, You tube and Google ads in order to get admission of good profile students in their institute.</p>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-12" data-aos="fade-in">
        <div class="tabs">
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Vision</label>
      <div class="tab-content">To provide a one stop platform to the students and reputed coaching institutes on a national and international level so the student can choose the best and reputed institutes for their admission and the institutes can offer their services to some good student profiles. </div>
    </div>
    <div class="tab mt-3">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Mission</label>
      <div class="tab-content">Our mission is to save the student's time and money that gets wasted when a student goes out looking for the best and reputed institutes in their cities. As cashkap.com provide all the relevant information like their reputation, level of education, facilities, fees and course details etc. everything under one roof. <br>
            <br>Our dream is to bring together best and reputed institutes providing quality education and authentic information along with best rankings, infrastructure and reputation.</div>
    </div>
      </div>
    </div>
  </div>

    </div>
        </div>
    </div>
<section>
        <div class="container-fluid end bck2">
          <div class="row">
            <div class="col-md-12 text-center text-white">
              <h1 class="mb-5">Search for best institutions near you </h1>
              <a class="rdmr2" href="#search">search now</a>
            </div>
          </div>
        </div>
      </section>

  
  <?php include("includes/footer.php"); ?>
  <button class="back-to-top fa fa-chevron-up" ></button>
<?php include("includes/script.php"); ?>
</body>
</html>
