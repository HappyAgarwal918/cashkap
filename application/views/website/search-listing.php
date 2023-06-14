<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
          <h1 class="text-white">Search</h1>
        </div>
      </div>
    </div>
    <div class="breadcrumb-row">
      <div class="container">
        <ul class="list-inline">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li>Search</li>
        </ul>
      </div>
    </div>
    <div class="page-banner contact-page section-sp2">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-lg-3 col-xl-3">
            <div class="side-bar1">
            <div class="widget search-widget">
                   <div class="widget-title">Search</div>
         <?php
           $attributes = array('class' =>'course-searchside','method'=>'post','autocomplete'=>'off','id'=>'deliverycheck');
                echo form_open("category/$segment2/$segment3",$attributes);
          ?>
                  <div class="row">
                            <div class="col-md-12">
                                <select class="inpp form-control form-controlsearch state frm select2" name="state" id="state" required>
                    <option value="">Select State</option>
                    <?php
                      $statedata=$this->customcode->getAllStateSearch();
                      foreach($statedata as $staterow){ ?>
                    <option <?php if(isset($state) && $state  == $staterow->state_name){ ?> selected <?php } ?>value="<?php echo $staterow->state_name; ?>" <?php echo set_select('state',$staterow->state_name); ?>><?php echo $staterow->state_name; ?></option>
                    <?php } ?>
                  </select>
                  <p class="errorhome"><?php echo form_error('state'); ?></p>
                            </div>
                            <div class="col-md-12">
                                <select class="inpp form-control form-controlsearch city select2" name="city" id="city" tabindex="-1" required>
                    <option value="">Select City</option>
                    <?php if(isset($city)){ ?>
                      <option  selected value="<?php echo $city; ?>"><?php echo $city; ?></option>
                      <?php } ?>
                  </select>
                  <p class="errorhome"><?php echo form_error('city'); ?></p>
                            </div>
                            <div class="col-md-12">
                                <select class="inpp form-control form-controlsearch course_id select2" name="course_id" id="course_id" tabindex="-1" required>
                    <option value="">Select Course</option>
                    <?php if(isset($course)){ ?>
                      <option  selected value="<?php echo $course; ?>"><?php echo $coursename; ?></option>
                    <?php } ?>
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
          <div class="col-md-9 col-lg-9 col-xl-9">
            <div class="row">
              <?php 

					if(count($catlistdata)>0){

					foreach($catlistdata as $catlistrow){
							$assoc_slug=$catlistrow->assoc_slug;
							$assoc_featuredimg=$catlistrow->assoc_featuredimg;
							
							$assoc_category=$catlistrow->assoc_category;
							$assoc_subcat=$catlistrow->assoc_subcat;
							$ascatdata=$this->customcode->getSearchPerAssocCat($assoc_category);
							$assoccat_slug=$ascatdata->assoccat_slug;
							
							if($assoc_featuredimg==""){
									$assoc_featuredimg="assets/website/images/default_pic.png";	
								}

						 ?>
              <div class="col-md-4">
                <div class="coursemain-bx">
                  <div class="img-box"> <a href="<?php echo site_url("page/$assoccat_slug/$assoc_slug"); ?>"><img src="<?php echo base_url().$assoc_featuredimg;  ?>"></a> </div>
                  <div class="content_box">
                    <div class="info-bx text-center">
                      <h5><a href="<?php echo site_url("page/$assoccat_slug/$assoc_slug"); ?>"><?php echo $catlistrow->assoc_instconame; ?></a></h5>
                    </div>
                    <div class="loc-bx text-center">
                      <p><i class="fa fa-map-marker"></i> <?php echo $catlistrow->assoc_address_state; ?>, <?php echo $catlistrow->assoc_address_country; ?></p>
                    </div>
                    <div class="view-dt">
                      <p><a href="<?php echo site_url("page/$assoccat_slug/$assoc_slug"); ?>" class="btn2">View Details</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php }

					}else{

						?>
              <div class="col-md-12">
                <p style="color:#ff0000;">No result found. Please try after some time</p>
              </div>
              <?php	

					}

					?>
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
