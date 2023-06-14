<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Best IELTS Institutes in Mohali | IELTS Coaching Center in Punjab | Cashkap</title>
  <meta name="description" content="Cashkap is one of the top IELTS Institutes providers in Mohali, providing individuals with tutoring to help them pass their IELTS exam with a decent Band score. Get 10% off on the first time apply." />
  <meta name="keywords" content="best college in chandigarh, best college in Punjab, best coaching institute in chandigarh, ielts coaching centre in punjab, 10% discount on admission, cashback coupons on ielts, Best ielts coaching centre" />
  <?php include("includes/head.php"); ?>
</head>

<body id="bg">
  

  <div class="page-wraper">
    <?php include("includes/header.php"); ?>
    <!-- Main Slider -->
    <section>
      <div class="container-fluid bnbck">
        <div class="container cd">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1 class="text-white h1 headding" data-aos="zoom-in">FIND BEST COACHING CENTERS, COLLEGES & UNIVERSITIES</h1>
              <!-- <p data-aos="fade-in">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
              <button class="btnn" data-aos="fade-up">Learn more</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
    <div class="container  position-relative vs  spccont ">
      <div class="row justify-content-center">

        <div class="col-md-12" data-aos="">
          <?php $attributes = array('method' => 'post', 'autocomplete' => 'off', 'id' => 'deliverycheck');
          echo form_open_multipart('', $attributes); ?>
          <div class="row">
            <div class="col-md-4">
              <select class="inpp form-control form-controlsearch state frm select2" name="state" id="state" required>
                <option value="">Select State</option>
                <?php foreach ($statedata as $staterow) { ?>
                  <option value="<?php echo $staterow->state_name; ?>" <?php echo set_select('state', $staterow->state_name); ?>><?php echo $staterow->state_name; ?></option>
                <?php } ?>
              </select>
              <p class="errorhome"><?php echo form_error('state'); ?></p>
            </div>
            <div class="col-md-4">
              <select class="inpp form-control form-controlsearch city select2" name="city" id="city" tabindex="-1" required>
                <option value="">Select </option>
              </select>
              <p class="errorhome"><?php echo form_error('city'); ?></p>
            </div>
            <div class="col-md-4">
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
    <div class="page-content bg-white">
      <div class="content-block">
        <?php if (count($instdata) > 0) { ?>
          <div class="section-area section-sp2 popular-courses-bx">
            <div class="container">
              <div class="row">
                <div class="col-md-12 heading-bx text-center">
                  <h2 class="title-head mb-2" data-aos="fade-up" data-aos-duration="2000"><a href="<?php echo site_url("category/coaching-institutes"); ?>">Apply in Coaching Institutes</a></h2>
                  <img data-aos="fade-down" src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                </div>
              </div>
              <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                  <?php foreach ($instdata as $instrow) {
                    $inst_slug = $instrow->assoc_slug;
                    $inst_assoccat_slug = $instrow->assoccat_slug;
                    $inst_featuredimg = $instrow->assoc_featuredimg;
                    if ($inst_featuredimg == "") {
                      $inst_featuredimg = "assets/website/images/default_pic.png";
                    }
                  ?>
                    <div class="item cchinst spchgt">
                      <div class="cours-bx">
                        <div class="action-box"><a href="<?php echo site_url("page/$inst_assoccat_slug/$inst_slug"); ?>"> <img class="img-fluid" src="<?php echo base_url() . $inst_featuredimg;  ?>"></a> </div>
                        <div class="info-bx text-center">
                          <h5><a href="<?php echo site_url("page/$inst_assoccat_slug/$inst_slug"); ?>"><?php echo $instrow->assoc_instconame; ?></a></h5>
                          <i class="fa fa-map-marker"></i> <strong>Location:</strong> <?php echo $instrow->assoc_address_state; ?>, <?php echo $instrow->country_name; ?>
                        </div>
                        <div class="cours-more-info">
                          <div class="price"> <a href="<?php echo site_url("page/$inst_assoccat_slug/$inst_slug"); ?>" class="btn2 margin">View Details</a> </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if (count($schooldata) > 0) { ?>
          <div class="section-area section-sp2 popular-courses-bx bg2 spcback">
            <div class="container">
              <div class="row">
                <div class="col-md-12 heading-bx text-center">
                  <h2 class="title-head"><a href="<?php echo site_url("category/schools"); ?>" data-aos="fade-up" data-aos-duration="2000">Apply in Schools</a></h2>
                  <img data-aos="fade-down" src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                </div>
              </div>
              <div class="row" data-aos="fade-up">
                <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                  <?php foreach ($schooldata as $schoolrow) {
                    $school_slug = $schoolrow->assoc_slug;
                    $school_assoccat_slug = $schoolrow->assoccat_slug;
                    $school_featuredimg = $schoolrow->assoc_featuredimg;
                    if ($school_featuredimg == "") {
                      $school_featuredimg = "assets/website/images/default_pic.png";
                    }
                  ?>
                    <div class="item cchinst ">
                      <div class="cours-bx">
                        <div class="action-box"> <a href="<?php echo site_url("page/$school_assoccat_slug/$school_slug"); ?>"><img src="<?php echo base_url() . $school_featuredimg;  ?>"> </a></div>
                        <div class="info-bx text-center">
                          <h5><a href="<?php echo site_url("page/$school_assoccat_slug/$school_slug"); ?>"><?php echo $schoolrow->assoc_instconame; ?></a></h5>
                          <i class="fa fa-map-marker"></i> <strong>Location:</strong> <?php echo $schoolrow->assoc_address_state; ?>, <?php echo $schoolrow->country_name; ?>
                        </div>
                        <div class="cours-more-info">
                          <div class="price"> <a href="<?php echo site_url("page/$school_assoccat_slug/$school_slug"); ?>" class="btn2 margin">View Details</a> </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if (count($collegedata) > 0) { ?>
          <div class="section-area section-sp2 popular-courses-bx">
            <div class="container">
              <div class="row">
                <div class="col-md-12 heading-bx text-center">
                  <h2 class="title-head" data-aos="fade-up" data-aos-duration="2000"><a href="<?php echo site_url("category/colleges"); ?>">Apply in Colleges/Universities</a></h2>
                  <img data-aos="fade-down" src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                </div>
              </div>
              <div class="row" data-aos="fade-up">
                <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                  <?php foreach ($collegedata as $collegerow) {
                    $college_slug = $collegerow->assoc_slug;
                    $college_assoccat_slug = $collegerow->assoccat_slug;
                    $college_featuredimg = $collegerow->assoc_featuredimg;
                    if ($college_featuredimg == "") {
                      $college_featuredimg = "assets/website/images/default_pic.png";
                    }
                  ?>
                    <div class="item cchinst spchgt">
                      <div class="cours-bx">
                        <div class="action-box"><a href="<?php echo site_url("page/$college_assoccat_slug/$college_slug"); ?>"><img src="<?php echo base_url() . $college_featuredimg;  ?>"></a></div>
                        <div class="info-bx text-center">
                          <h5><a href="<?php echo site_url("page/$college_assoccat_slug/$college_slug"); ?>"><?php echo $collegerow->assoc_instconame; ?></a></h5>
                          <i class="fa fa-map-marker"></i> <strong>Location:</strong> <?php echo $collegerow->assoc_address_state; ?>, <?php echo $collegerow->country_name; ?>
                        </div>
                        <div class="cours-more-info">
                          <div class="price"> <a href="<?php echo site_url("page/$college_assoccat_slug/$college_slug"); ?>" class="btn2 margin">View Details</a> </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <!-- Popular Courses -->
        <?php if (count($univdata) > 0) { ?>
          <div class="section-area section-sp2 popular-courses-bx">
            <div class="container">
              <div class="row" data-aos="fade-up">
                <div class="col-md-12 heading-bx text-center">
                  <h2 class="title-head" data-aos="fade-up" data-aos-duration="2000"><a href="<?php echo site_url("category/universities"); ?>">Apply in Universities</a></h2>
                  <img data-aos="fade-down" src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                </div>
              </div>
              <div class="row" data-aos="fade-up">
                <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                  <?php foreach ($univdata as $univrow) {
                    $univ_slug = $univrow->assoc_slug;
                    $univ_assoccat_slug = $univrow->assoccat_slug;
                    $uni_featuredimg = $univrow->assoc_featuredimg;
                    if ($uni_featuredimg == "") {
                      $uni_featuredimg = "assets/website/images/default_pic.png";
                    }
                  ?>
                    <div class="item cchinst">
                      <div class="cours-bx">
                        <div class="action-box"><a href="<?php echo site_url("page/$univ_assoccat_slug/$univ_slug"); ?>"><img src="<?php echo base_url() . $uni_featuredimg;  ?>"></a></div>
                        <div class="info-bx text-center">
                          <h5><a href="<?php echo site_url("page/$univ_assoccat_slug/$univ_slug"); ?>"><?php echo $univrow->assoc_instconame; ?></a></h5>
                          <i class="fa fa-map-marker"></i> <strong>Location:</strong> <?php echo $univrow->assoc_address_state; ?>, <?php echo $univrow->country_name; ?>
                        </div>
                        <div class="cours-more-info">
                          <div class="price"> <a href="<?php echo site_url("page/$univ_assoccat_slug/$univ_slug"); ?>" class="btn2 margin">View Details</a> </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if (count($videodata) > 0) { ?>
          <div class="section-area section-sp2 popular-courses-bx bg1">
            <div class="container">
              <div class="row">
                <div class="col-md-12 heading-bx text-center ">
                  <h1 class="title-head fdf mb-2" data-aos="fade-up" data-aos-duration="2000">FEATURED VIDEOS</h1>
                  <img data-aos="fade-down" src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="video-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                    <?php foreach ($videodata as $videorow) {
                      $video_code = $videorow->video_code;

                    ?>
                      <div class="item cchinst">
                        <div class="video-bx"> <?php echo $video_code; ?> </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if (count($galdata) > 0) { ?>
          <div class="section-area section-sp2 popular-courses-bx">
            <div class="container">
              <div class="row">
                <div class="col-md-12 heading-bx text-center">
                  <h2 class="title-head fdf mb-2" data-aos="fade-up" data-aos-duration="2000">FEATURED IMAGES</h2>
                  <img data-aos="fade-down" src="<?php echo base_url(); ?>assets/website/images/barr.svg">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div id="masonry" class="ttr-gallery-listing magnific-image">
                    <div class="gallery-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                      <?php foreach ($galdata as $galrow) {
                        $feagal_thumb = $galrow->feagal_thumb;
                        $feagal_orgpic = $galrow->feagal_orgpic;

                      ?>
                        <div class="item cchinst">
                          <div class="ttr-box portfolio-bx">
                            <div class="ttr-media media-ov2"> <img src="<?php echo base_url() . $feagal_thumb; ?>" alt="">
                              <div class="ov-box">
                                <div class="overlay-icon align-m"> <a href="<?php echo $feagal_orgpic; ?>" class="magnific-anchor" title=""> <img src="<?php echo base_url() . $feagal_thumb; ?>" alt=""> </a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

        <section class="pt-5 pb-5 bg2">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <img src="assets/website/images/abtbnr.jpg" class="img-fluid">
              </div>
              <div class="col-md-6">
                <h1 class="tt">About Cashkap</h1>
                <p class="text-justify font-weight-bold"> In today's hectic life; students have to go to schools, colleges, Universities and coaching institutes of different cities to get their information. With this, both the time and money of the students are wasted. "Cashkap.com" is an online platform designed to keeping in mind the needs of the students and the institutes. It is a platform where students can find the best and reputed schools, colleges, Universities and coaching institutes according to their city. Along with this they can compare the course information, fees, facilities and .... </p>
                <a class="rdmr" href="<?php echo site_url("about-us"); ?>">Read more</a>
              </div>
            </div>
          </div>
        </section>

        <div class="count-down-area pt-90 pb-60 section-bg">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-12 col-md-12">
                <div class="count-down-wrapper">
                  <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center text-black">
                      <!-- Counter Up -->
                      <div class="row ">
                        <div class="col-md-12 mb-3 spc-text">
                          <i class="fas fa-university fa-4x spc-text"></i>
                        </div>
                        <div class="col-md-12 mb-2 h3">
                          <span class="counter spc-text" data-target="3000">0 </span> <span class="spc-text">+</span>
                        </div>
                      </div>
                      <h5 class="spc-text">TOTAL LEARNERS</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center text-black">
                      <!-- Counter Up -->
                      <div class="row ">
                        <div class="col-md-12 mb-3">
                          <i class="far fa-laugh-beam fa-4x spc-text"></i>
                        </div>
                        <div class="col-md-12 mb-2 h3">
                          <span class="counter  spc-text" data-target="2500">0 </span> <span class="spc-text">+</span>
                        </div>
                      </div>
                      <h5 class="spc-text">HAPPY CLIENTS</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center text-black">
                      <!-- Counter Up -->
                      <div class="row ">
                        <div class="col-md-12 mb-3">
                          <i class="far fa-question-circle fa-4x spc-text"></i>
                        </div>
                        <div class="col-md-12 mb-2 h3">
                          <span class="counter spc-text" data-target="1500">0 </span> <span class="spc-text">+</span>
                        </div>
                      </div>
                      <h5 class="spc-text">QUESTIONS ANSWERED</h5>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 text-center text-black">
                      <!-- Counter Up -->
                      <div class="row ">
                        <div class="col-md-12 mb-3">
                          <i class="fas fa-graduation-cap fa-4x spc-text"></i>
                        </div>
                        <div class="col-md-12 mb-2 h3">
                          <span class="counter spc-text" data-target="1000">0 </span> <span class="spc-text">+</span>
                        </div>
                      </div>
                      <h5 class="spc-text">TOTAL Graduates</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="section-area section-sp2 ppl pb-5 spcback  ">
          <div class="container">
            <div class="row">
              <div class="col-md-12 heading-bx text-center">
                <h2 class="title-head text-uppercase">what people say</h2>
              </div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
              <div class="item">
                <div class="testimonial-bx">
                  <div class="testimonial-info">
                    <h5 class="name">Robin Singh</h5>
                  </div>
                  <div class="testimonial-content">
                    <p>It was a great experience with Cashkap. I earned a lot using coupons and cashback from this Cashkap.com Website. Cashkap is the first ever Website which provides India's best deal at nominal price plus lots of cashback</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-bx">
                  <div class="testimonial-info">
                    <h5 class="name">Sandeep Sharma</h5>
                  </div>
                  <div class="testimonial-content">
                    <p>I am using Cashkap. I have the best experience ever with this earning/deal website. Cashkap helped me in my savings and infact I have earned extra income too.</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-bx">
                  <div class="testimonial-info">
                    <h5 class="name">Diljeet Singh</h5>
                  </div>
                  <div class="testimonial-content">
                    <p>Cashkap.com is a genuine & professional cashback site. I use for College Admission. India's top cashback site!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section>
        <div class="container-fluid end">
          <div class="row">
            <div class="col-md-12 text-center text-white">
              <h1 class="mb-5">Search for best institutions near you </h1>
              <a class="rdmr2" href="#search">search now</a>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include("includes/footer.php"); ?>
    <button class="back-to-top fa fa-chevron-up"></button>
  </div>
  <?php include("includes/script.php"); ?>

  
</body>

</html>