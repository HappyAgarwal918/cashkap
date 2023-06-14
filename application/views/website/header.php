<?php $segment1=$this->uri->segment(1);
$segment2=$this->uri->segment(2);
$segment3=$this->uri->segment(3);
 ?>

<header class="header rs-nav">
  <div class="top-bar">
    <div class="container">
      <div class="row d-flex justify-content-between">
        <div class="topbar-left">
          <ul>
            <li><a href="<?php echo site_url("contact-us"); ?>"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
            <li><a href="mailto:info@cashkap.com"><i class="fa fa-envelope-o"></i>info@cashkap.com</a></li>
          </ul>
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
  <div class="navbar-expand-lg">
    <div class="header-bar clearfix">
      <div class="container clearfix"> 
        <!-- Header Logo ==== -->
        <div class="menu-logo"> <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();  ?>assets/website/images/logo.png" alt=""></a> </div>
        <!-- Author Nav ==== -->
        <div class="secondary-menu">
          <?php $stusesid=$this->session->userdata('stusesid');
						if(empty($stusesid)){
					 ?>
          <a href="<?php echo site_url("student/login");  ?>" class="btn1 button-md associate_login spc-brd"><i class="fa fa-user"></i> Student Login</a>
          <?php }else{ ?>
          <a href="<?php echo site_url("student/profile");  ?>" class="btn1 button-md associate_login  spc-brd"><i class="fa fa-user"></i> Student Account</a>
          <?php  }?>
          <?php $assocsesid=$this->session->userdata('assocsesid');
						if(empty($assocsesid)){
					 ?>
          <a href="<?php echo site_url("associate/login");  ?>" class="btn1 button-md spc-brd"><i class="fa fa-bars"></i> Associate/Partner Login</a>
          <?php }else{ ?>
          <a href="<?php echo site_url("associate/profile");  ?>" class="btn1 button-md spc-brd" ><i class="fa fa-bars"></i> Associate/Partner Account</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="sticky-header navbar-expand-lg">
    <div class="menu-bar clearfix">
    
      <div class="container clearfix"> 
        <!-- Mobile Nav Button ==== -->
       <p  class="menu_mobile">Menu </p>
        <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">  <span></span> <span></span> <span></span>  </button>
        
        <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
          <ul class="nav navbar-nav">
            <li class="<?php if($segment1==""){ echo "active"; } ?>"><a href="<?php echo site_url(""); ?>">Home</a></li>
            <li class="<?php if($segment1=="about-us"){ echo "active"; } ?>"><a href="<?php echo site_url("introduction"); ?>">About Us</a></li>
            <li class="<?php if($segment1=="category" && $segment2=="colleges"){ echo "active"; }elseif($segment1=="category" && $segment2=="universities"){ echo "active";} ?>"><a href="javascript:void(0);">Colleges/Universities <i class="fa fa-chevron-down"></i></a>
              <ul class="sub-menu">
                <li><a href="<?php echo site_url("category/colleges"); ?>">Colleges</a></li>
                <li><a href="<?php echo site_url("category/universities"); ?>">Universities</a></li>
              </ul>
            </li>
            <?php $schoolsubcat=$this->customcode->getSubCategory(3); 
						   	if(count($schoolsubcat)>0){ ?>
            <li><a href="javascript:void(0);">Schools <i class="fa fa-chevron-down"></i></a>
              <ul class="sub-menu">
                <?php foreach($schoolsubcat as $schoolsubcatrow){
										$school_slug=$schoolsubcatrow->assoccat_slug;
										?>
                <li><a href="<?php echo site_url("category/schools/$school_slug"); ?>"><?php echo $schoolsubcatrow->assoccat_title; ?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php }else{ ?>
            <li class="<?php if($segment1=="category" && $segment2=="schools"){ echo "active"; } ?>"><a href="<?php echo site_url("category/schools"); ?>">Schools</a></li>
            <?php }?>
            <?php 
						   		$instsubcat=$this->customcode->getSubCategory(4); 
						   		if(count($instsubcat)>0){
						   ?>
            <li class="<?php if($segment1=="category" && $segment2=="coaching-institutes"){ echo "active"; } ?>"><a href="javascript:void(0);">Coaching Institutes <i class="fa fa-chevron-down"></i></a>
              <ul class="sub-menu">
                <?php foreach($instsubcat as $instsubcatrow){
										$subcat_slug=$instsubcatrow->assoccat_slug;
										 ?>
                <li><a href="<?php echo site_url("category/coaching-institutes/$subcat_slug"); ?>"><?php echo $instsubcatrow->assoccat_title; ?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php }else{ ?>
            <li><a href="<?php echo site_url("category/institutes"); ?>">Institutes</a></li>
            <?php }?>
            
<!-- <li><a href="<?php //echo site_url("testimonials"); ?>">Testimonials</a></li>-->
            <li class="<?php if($segment1=="contact-us"){ echo "active"; } ?>"><a href="<?php echo site_url("contact-us"); ?>">Contact Us</a></li>
          </ul>
        </div>
        <!-- Navigation Menu END ==== --> 
      </div>
    </div>
  </div>
</header>
