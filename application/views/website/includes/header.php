<?php $segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
$segment3 = $this->uri->segment(3);
?>

<header class="header rs-nav">
  <div class="top-bar">
    <div class="container">
      <div class="row d-flex justify-content-between">
        <div class="topbar-left">
          <div class="secondary-inner">
            <ul>
              <li><a href="<?php echo site_url("contact-us"); ?>"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
              <li><a href="mailto:info@cashkap.com"><i class="fa fa-envelope-o"></i>info@cashkap.com</a></li>
            </ul>
          </div>
        </div>
        <div class="topbar-right">
          <div class="secondary-inner">
            <ul>
              <li><a href="https://www.facebook.com/Cash-kap-111695841279893" class="btn-link"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/cash_kap" class="btn-link"><i class="fa fa-twitter"></i></a></li>
              <!--  <li><a href="" class="btn-link"><i class="fa fa-linkedin"></i></a></li>-->
              <li><a href="https://www.instagram.com/cash_kap/" class="btn-link"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://api.whatsapp.com/send?phone=+919592502502&text=Hello" class="btn-link"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sticky-header navbar-expand-lg">
    <div class="menu-bar clearfix">
      <div class="container-fluid  ">
        <!-- Mobile Nav Button ==== -->
        <!-- <p class="menu_mobile">Menu </p> -->
        <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span></span> <span></span> <span></span> </button>
        <div class="menu-logo"> <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();  ?>assets/website/images/logo.png" alt=""></a> </div>
        <div class="menu-links navbar-collapse collapse float-right justify-content-start" id="menuDropdown">
          <?php if ($segment1 == "study" && $segment2 == "abroad" || $segment1 == "abroad-student-registration" || $segment1 == "abrod-student-login" || $segment1 == "study-abroad-sendOTP" || $segment1 == "submit-offer-letter") { ?>
            <ul class="nav navbar-nav">
              <li><a class="<?php if ($segment1 == "") {
                              echo "active";
                            } ?>" href="<?php echo site_url(""); ?>">Home</a></li>

              <li><a class="<?php if ( $segment3 =="collage") {
                              echo "active";} ?>" href="<?php echo site_url("study/abroad/collage/1"); ?>">Abrod Clg/Uni</a></li>
              <li><a class="<?php if ($segment3 == "about") {
                              echo "active";
                            } ?>" href="<?php echo site_url("study/abroad/about"); ?>">About Us</a></li>
              <?php
              $cntrydata = $this->customcode->getAbrodcntry();
              if (count($cntrydata) > 0) { ?>

                <li><a class="<?php if ($segment1 == "study" && $segment2 == "abroad" && $segment3 == "eligibility") {
                                echo "active";
                              } ?>" href="javascript:void(0);">Eligibility <i class="fa fa-chevron-down"></i></a>
                  <ul class="sub-menu">
                    <?php foreach ($cntrydata as $cntrydatarow) {
                      $cntry_code = $cntrydatarow->cntry_code; ?>
                      <li><a href="<?php echo site_url("study/abroad/eligibility/$cntry_code"); ?>"><?php echo $cntrydatarow->cntry_name; ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
              <?php }
              ?>

              <li><a class="<?php if ($segment1 == "study" && $segment2 == "abroad" && $segment3 == "") {
                              echo "active";
                            } ?>" href="<?php echo site_url("study/abroad"); ?>">Study Abroad</a></li>
              <li><a class="<?php if ($segment1 == "study" && $segment2 == "abroad" && $segment3 == "contact") {
                              echo "active";
                            } ?>" href="<?php echo site_url("study/abroad/contact"); ?>">Contact Us</a></li>

              <?php
              $stdyAbrodSutID = $this->session->userdata('stdyAbrodSutID');
              if (empty($stdyAbrodSutID)) { ?>
                <a href="<?php echo site_url("abroad-student-registration");  ?>" class="btn button-md associate_login mblhide"> <i class="fas fa-user-graduate icn"></i>Abroad Student Registration</a>
              <?php } else { ?>
                <a href="<?php echo site_url("abrad-student-dashbord");  ?>" class="btn button-md associate_login mblhide"> <i class="fas fa-user-graduate icn"></i>Abroad Student Account</a>
              <?php  } ?>
              <?php $assocsesid = $this->session->userdata('assocsesid');
              if (empty($assocsesid)) {
              ?>
                <li class="othmenu"><a href="<?php echo site_url("associate/login");  ?>" class=""><i class="fas fa-users icn"></i>Associate Login</a></li>
              <?php } else { ?>
                <li class="othmenu"><a href="<?php echo site_url("associate/profile");  ?>" class=""><i class="fas fa-users icn"></i>Associate Account</a></li>
              <?php } ?>
              <?php $assocsesid = $this->session->userdata('assocsesid');
              if (empty($assocsesid)) {
              ?>
                <a href="<?php echo site_url("associate/login");  ?>" class="btn button-md mblhide"><i class="fas fa-users icn"></i> Associate Login</a>
              <?php } else { ?>
                <a href="<?php echo site_url("associate/profile");  ?>" class="btn button-md mblhide"><i class="fas fa-users icn"></i> Associate Account</a>
              <?php } ?>
            </ul>
          <?php } else { ?>
            <ul class="nav navbar-nav">
              <li><a class="<?php if ($segment1 == "") {
                              echo "active";
                            } ?>" href="<?php echo site_url(""); ?>">Home</a></li>
              <li><a class="<?php if ($segment1 == "about-us") {
                              echo "active";
                            } ?>" href="<?php echo site_url("about-us"); ?>">About Us</a></li>
              <li><a class="<?php if ($segment1 == "study" && $segment2 == "abroad") {
                              echo "active";
                            } ?>" href="<?php echo site_url("study/abroad"); ?>">Study Abroad</a></li>
              <li><a class="<?php if ($segment1 == "category" && $segment2 == "colleges") {
                              echo "active";
                            } elseif ($segment1 == "category" && $segment2 == "universities") {
                              echo "active";
                            } ?>" href="javascript:void(0);">Clg/Uni <i class="fa fa-chevron-down"></i></a>
                <ul class="sub-menu">
                  <li><a href="<?php echo site_url("category/colleges"); ?>">Colleges</a></li>
                  <li><a href="<?php echo site_url("category/universities"); ?>">Universities</a></li>
                </ul>
              </li>
              <?php $schoolsubcat = $this->customcode->getSubCategory(3);
              if (count($schoolsubcat) > 0) { ?>
                <li><a class="<?php if ($segment1 == "category" && $segment2 == "schools") {
                                echo "active";
                              } ?>" href="javascript:void(0);">Schools <i class="fa fa-chevron-down"></i></a>
                  <ul class="sub-menu">
                    <?php foreach ($schoolsubcat as $schoolsubcatrow) {
                      $school_slug = $schoolsubcatrow->assoccat_slug; ?>
                      <li><a href="<?php echo site_url("category/schools/$school_slug"); ?>"><?php echo $schoolsubcatrow->assoccat_title; ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
              <?php } else { ?>
                <li><a class="<?php if ($segment1 == "category" && $segment2 == "schools") {
                                echo "active";
                              } ?>" href="<?php echo site_url("category/schools"); ?>">Schools</a></li>
              <?php } ?>
              <?php
              $instsubcat = $this->customcode->getSubCategory(4);
              if (count($instsubcat) > 0) { ?>
                <li><a class="<?php if ($segment1 == "category" && $segment2 == "coaching-institutes") {
                                echo "active";
                              } ?>" href="javascript:void(0);">Coaching Institutes <i class="fa fa-chevron-down"></i></a>
                  <ul class="sub-menu">
                    <?php foreach ($instsubcat as $instsubcatrow) {
                      $subcat_slug = $instsubcatrow->assoccat_slug; ?>
                      <li><a href="<?php echo site_url("category/coaching-institutes/$subcat_slug"); ?>"><?php echo $instsubcatrow->assoccat_title; ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
              <?php } else { ?>
                <li><a href="<?php echo site_url("category/institutes"); ?>">Institutes</a></li>
              <?php } ?>

              <!-- <li><a href="<?php //echo site_url("testimonials"); 
                                ?>">Testimonials</a></li>-->
              <li><a class="<?php if ($segment1 == "contact-us") {
                              echo "active";
                            } ?>" href="<?php echo site_url("contact-us"); ?>">Contact Us</a></li>
              <?php $stusesid = $this->session->userdata('stusesid');
              if (empty($stusesid)) { ?>
                <li class="othmenu"><a href="<?php echo site_url("student/registration");  ?>" class=""><i class="fas fa-user-graduate icn"></i>Student registration</a></li>
              <?php } else { ?>
                <li class="othmenu"><a href="<?php echo site_url("student/profile");  ?>" class=""><i class="fas fa-user-graduate icn"></i>Student Account</a></li>
              <?php  } ?>
              <?php $assocsesid = $this->session->userdata('assocsesid');
              if (empty($assocsesid)) {
              ?>
                <li class="othmenu"><a href="<?php echo site_url("associate/login");  ?>" class=""><i class="fas fa-users icn"></i>Associate Login</a></li>
              <?php } else { ?>
                <li class="othmenu"><a href="<?php echo site_url("associate/profile");  ?>" class=""><i class="fas fa-users icn"></i>Associate Account</a></li>
              <?php } ?>
              <?php $stusesid = $this->session->userdata('stusesid');
              if (empty($stusesid)) {
              ?>
                <a href="<?php echo site_url("student/registration");  ?>" class="btn button-md associate_login mblhide"> <i class="fas fa-user-graduate icn"></i>Student registration</a>
              <?php } else { ?>
                <a href="<?php echo site_url("student/profile");  ?>" class="btn button-md associate_login mblhide"> <i class="fas fa-user-graduate icn"></i>Student Account</a>
              <?php  } ?>
              <?php $assocsesid = $this->session->userdata('assocsesid');
              if (empty($assocsesid)) {
              ?>
                <a href="<?php echo site_url("associate/login");  ?>" class="btn button-md mblhide"><i class="fas fa-users icn"></i> Associate Login</a>
              <?php } else { ?>
                <a href="<?php echo site_url("associate/profile");  ?>" class="btn button-md mblhide"><i class="fas fa-users icn"></i> Associate Account</a>
              <?php } ?>
            </ul>
          <?php } ?>
        </div>
        <!-- Navigation Menu END ==== -->
      </div>
    </div>
  </div>
</header>
<div id="loading" class="loderBody">
  <div class="wrapper1">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="shadow"></div>
    <div class="shadow"></div>
    <div class="shadow"></div>
    <span>Loading</span>
  </div>
</div>