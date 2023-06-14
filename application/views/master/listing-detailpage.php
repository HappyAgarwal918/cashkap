<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="index, follow">
<meta property="og:type" content="website" />
<meta property="og:locale" content="en_us" />
<meta name="twitter:card" content="summary">
<meta name="format-detection" content="telephone=no">
<link rel="icon" href="<?php echo base_url();  ?>assets/website/images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();  ?>assets/website/images/favicon.png" />
<title>
<?php if(isset($siteTitle)){ echo $siteTitle; } ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/assets.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/typography.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/shortcodes.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/style.css">
<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/color-1.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/layers.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/settings.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/navigation.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/custom.css">
<?php include("includes/script.php"); ?>

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
          <h1 class="text-white"><?php echo $catmdata->assoccat_menutitle; ?></h1>
        </div>
      </div>
    </div>
    <?php $assoccat_slug=$catmdata->assoccat_slug; ?>
    <div class="breadcrumb-row">
      <div class="container">
        <ul class="list-inline">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><?php echo $catmdata->assoccat_menutitle; ?></li>
        </ul>
      </div>
    </div>
    <div class="content-block">
      <div class="section-area section-sp5 listing-detailpage">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="courses-post">
                    <div class="ttr-post-info">
                      <div class="ttr-post-title">
                        <h2 class="post-title"><?php echo $assocdata->assoc_instconame; ?></h2>
                      </div>
                      <div class="social_dtpage">
                      	<?php 
							$assoc_social_facebook=$assocdata->assoc_social_facebook;
							$assoc_social_instagram=$assocdata->assoc_social_instagram;
							$assoc_social_twitter=$assocdata->assoc_social_twitter;
							$assoc_social_website=$assocdata->assoc_social_website;
							
						?>
                        <div class="social_dtpage_widget">
                        			<div class="profile-social">
                        			<ul class="list-inline m-a0">
                 <?php if($assoc_social_facebook!=""){ ?>
				<li><a href="<?php echo $assoc_social_facebook; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                 <?php } ?>
                 <?php if($assoc_social_instagram!=""){ ?>    
					<li><a href="<?php echo $assoc_social_instagram; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <?php } ?>
                   <?php if($assoc_social_twitter!=""){ ?>    
						<li><a href="<?php echo $assoc_social_twitter; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                       <?php } ?>    
					 <?php if($assoc_social_website!=""){ ?>                
                         <li><a href="<?php echo $assoc_social_website; ?>" target="_blank" title="Website"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
                      <?php } ?>
									</ul>
                                    </div>
                        </div>
                      </div>
                      
                      
                      
                      <div class="ttr-post-text">
                        <p><?php echo $assocdata->associate_about; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="home" aria-selected="true">Information</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="profile-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="profile" aria-selected="false">Courses/Fee Detail</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="facilities-tab" data-toggle="tab" href="#facilities" role="tab" aria-controls="facilities" aria-selected="false">Facilities</a> </li>
                    
                    
                     <li class="nav-item"> <a class="nav-link" id="achievement-tab" data-toggle="tab" href="#achievement" role="tab" aria-controls="achievement" aria-selected="false">Achievement</a> </li>
                     
                     <li class="nav-item"> <a class="nav-link" id="contact-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="contact" aria-selected="false">Photo/Video Gallery</a> </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                      <div class="row">
                        <div class="col-md-12">
                          <?php if($assocdata->assoc_category==1){ ?>
                          <table  style="width:100%" class="table table-bordered table-striped">
                            <tr>
                              <td>Total Area in acres</td>
                              <td><?php echo $assocdata->assoc_totalarea; ?></td>
                            </tr>
                            <tr>
                              <td>Construction Area (in Sqm)</td>
                              <td><?php echo $assocdata->assoc_consarea; ?></td>
                            </tr>
                            <tr>
                              <td>Affiliated To</td>
                              <td><?php echo $assocdata->assoc_affibody; ?></td>
                            </tr>
                            <tr>
                              <td>Google Rank</td>
                              <td><?php echo $assocdata->assoc_edurank; ?></td>
                            </tr>
                            <tr>
                              <td>Total Teaching Staff (Graduate)</td>
                              <td><?php echo $assocdata->assoc_noteacher_graduate; ?></td>
                            </tr>
                            <tr>
                              <td>Total Teaching Staff (Master's)</td>
                              <td><?php echo $assocdata->assoc_noteacher_masters; ?></td>
                            </tr>
                            <tr>
                              <td>Total Teaching Staff (PhD)</td>
                              <td><?php echo $assocdata->assoc_noteacher_phd; ?></td>
                            </tr>
                            
                
                   
                            
                            
                            <tr>
                              <td>Student Strength of last Session</td>
                              <td><?php echo $assocdata->assoc_lastses_nostudent; ?></td>
                            </tr>
                            <tr>
                              <td>Last Session Result Precentage</td>
                              <td><?php echo $assocdata->assoc_lastses_placement; ?></td>
                            </tr>
                            <tr>
                              <td>Company location of placements</td>
                              <td><?php echo $assocdata->assoc_placement_loc; ?></td>
                            </tr>
                            <tr>
                              <td>Address</td>
                              <td><?php echo $assocdata->assoc_address_line1; if($assocdata->assoc_address_line2!=""){ echo ", ".$assocdata->assoc_address_line2; } ?>, <?php echo $assocdata->assoc_address_city;  ?>, <?php echo $assocdata->assoc_address_state;  ?>, <?php echo $assocdata->country_name;  ?></td>
                            </tr>
                            <tr>
                              <td>Email Id</td>
                              <td><?php echo $assocdata->assoc_email; ?></td>
                            </tr>
                          </table>
                          <?php }elseif($assocdata->assoc_category==2){ ?>
                           <table  style="width:100%" class="table table-bordered table-striped">
                            <tr>
                              <td>Total Area in acres</td>
                              <td><?php echo $assocdata->assoc_totalarea; ?></td>
                            </tr>
                            <tr>
                              <td>Construction Area (in Sqm)</td>
                              <td><?php echo $assocdata->assoc_consarea; ?></td>
                            </tr>
                            <tr>
                              <td>Affiliated To</td>
                              <td><?php echo $assocdata->assoc_affibody; ?></td>
                            </tr>
                            <tr>
                              <td>Google Rank</td>
                              <td><?php echo $assocdata->assoc_edurank; ?></td>
                            </tr>
                            <tr>
                              <td>Total Teaching Staff (Graduate)</td>
                              <td><?php echo $assocdata->assoc_noteacher_graduate; ?></td>
                            </tr>
                            <tr>
                              <td>Total Teaching Staff (Master's)</td>
                              <td><?php echo $assocdata->assoc_noteacher_masters; ?></td>
                            </tr>
                            <tr>
                              <td>Total Teaching Staff (PhD)</td>
                              <td><?php echo $assocdata->assoc_noteacher_phd; ?></td>
                            </tr>
                            
                				<tr>
                              <td>Total Staff</td>
                              <td><?php echo $assocdata->assoc_noteacher; ?></td>
                            </tr>
                            
                   
                            
                            
                            <tr>
                              <td>Student Strength of last Session</td>
                              <td><?php echo $assocdata->assoc_lastses_nostudent; ?></td>
                            </tr>
                            
                            
                            
                             <tr>
                              <td>Last Session Result Precentage</td>
                              <td><?php echo $assocdata->assoc_lastsesresult; ?></td>
                            </tr>
                            <tr>
                              <td>Last Session Placement % of Students </td>
                              <td><?php echo $assocdata->assoc_lastses_placement; ?></td>
                            </tr>
                            <tr>
                              <td>Company location of placements</td>
                              <td><?php echo $assocdata->assoc_placement_loc; ?></td>
                            </tr>
                            <tr>
                              <td>Address</td>
                              <td><?php echo $assocdata->assoc_address_line1; if($assocdata->assoc_address_line2!=""){ echo ", ".$assocdata->assoc_address_line2; } ?>, <?php echo $assocdata->assoc_address_city;  ?>, <?php echo $assocdata->assoc_address_state;  ?>, <?php echo $assocdata->country_name;  ?></td>
                            </tr>
                            <tr>
                              <td>Email Id</td>
                              <td><?php echo $assocdata->assoc_email; ?></td>
                            </tr>
                          </table>
                          <?php }elseif($assocdata->assoc_category==3){
					 ?>
                          <table  style="width:100%" class="table table-bordered table-striped">
                           
                          <tr>
                              <td>Name of School</td>
                              <td><?php echo $assocdata->assoc_instconame; ?></td>
                            </tr>
                            <tr>
                              <td>Total Area in acres</td>
                              <td><?php echo $assocdata->assoc_totalarea; ?></td>
                            </tr>
                            <tr>
                              <td>Construction Area (in Sqm)</td>
                              <td><?php echo $assocdata->assoc_consarea; ?></td>
                            </tr>
                               <tr>
                              <td>Affiliated Body</td>
                              <td><?php echo $assocdata->assoc_affibody; ?></td>
                            </tr>
                              <tr>
                              <td>Education Rank</td>
                              <td><?php echo $assocdata->assoc_edurank; ?></td>
                            </tr>
                            
                            
                            <tr>
                              <td>Total Teaching Staff</td>
                              <td><?php echo $assocdata->assoc_noteacher; ?></td>
                            </tr>
                            <tr>
                              <td>Last Session Result Percentage </td>
                              <td><?php echo $assocdata->assoc_lastsesresult; ?></td>
                            </tr>
                            
                          
                            <tr>
                              <td>Last Session Topper No. of Student</td>
                              <td><?php echo $assocdata->assoc_lastsesnostudent; ?></td>
                            </tr>
                            <tr>
                              <td>Address</td>
                              <td><?php echo $assocdata->assoc_address_line1; if($assocdata->assoc_address_line2!=""){ echo ", ".$assocdata->assoc_address_line2; } ?>, <?php echo $assocdata->assoc_address_city;  ?>, <?php echo $assocdata->assoc_address_state;  ?>, <?php echo $assocdata->country_name;  ?></td>
                            </tr>
                            <tr>
                              <td>Email Id</td>
                              <td><?php echo $assocdata->assoc_email;  ?></td>
                            </tr>
                          </table>
                          <?php 
				}elseif($assocdata->assoc_category==4){
					 ?>
                          <table  style="width:100%" class="table table-bordered table-striped">
                            <tr>
                              <td width="32%">Registration Type</td>
                              <td width="68%"><?php //echo $assocdata->assoccat_title; ?><?php echo $assocdata->assoccat_title; ?></td>
                            </tr>
                            <tr>
                              <td>Name of the Institute</td>
                              <td><?php echo $assocdata->assoc_instconame; ?></td>
                            </tr>
                           
                             <tr>
                    <td>Established Year</td>
                    <td><?php echo $assocdata->assoc_establishyear; ?></td>
                  </tr>
                  
                  
                    <tr>
                    <td>Construction Area (in Sqm)</td>
                    <td><?php echo $assocdata->assoc_consarea; ?></td>
                  </tr>
                  	
                    
                    
                  
                  
                    <tr>
                    <td>How you provide classes online/offline?</td>
                    <td><?php echo $assocdata->assoc_classmode; ?></td>
                  </tr>
                   
                      <tr>
                    <td>Google Rating in Link</td>
                    <td><?php echo $assocdata->assoc_googlerate; ?></td>
                  </tr>
                  	
                   <tr>
                    <td>Student strength in a class</td>
                    <td><?php echo $assocdata->assoc_stustrength; ?></td>
                  </tr>
                  
                  
                  
                  
                   <tr>
                    <td>Total Trainer/Faculty</td>
                    <td><?php echo $assocdata->assoc_noteacher; ?></td>
                  </tr>
                  
                
                  <tr class="trheadpro5">
                    <td colspan="2">Staff Score in Bands</td>
                  </tr>
                 
                    <tr>
                    <td>7 to 8</td>
                    <td><?php echo $assocdata->assoc_staffscore78; ?></td>
                  </tr>
                   
                   <tr class="trheadpro5">
                    <td colspan="2">Contact Detail</td>
                  </tr>
                            <tr>
                              <td>Address</td>
                              <td><?php echo $assocdata->assoc_address_line1; if($assocdata->assoc_address_line2!=""){ echo ", ".$assocdata->assoc_address_line2; } ?>, <?php echo $assocdata->assoc_address_city;  ?>, <?php echo $assocdata->assoc_address_state;  ?>, <?php echo $assocdata->country_name;  ?></td>
                            </tr>
                            <tr>
                              <td>Email Id</td>
                              <td><?php echo $assocdata->assoc_email;  ?></td>
                            </tr>
                          </table>
                          <?php 
				} ?>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                    	<div class="row">
      <div class="col-md-12">
                    <table  style="width:100%" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th width="32%">Course Name</th>
                        <th width="16%">Duration</th>
                        <th width="21%">Total Seats</th>
                        <th width="21%">Fee</th>
                        <th width="10%">Apply</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
					  $assoc_id=$assocdata->assoc_id;
					  $enc_assoc_id=$this->encryptcode->encrypt($assoc_id,ENC_KEY_PASS);
					  foreach($coursesdata as $courserow){
						  $acourse_id=$courserow->acourse_id;
						   ?>
                       <tr>
                        <td><?php echo $courserow->course_name; ?></td>
                        <td><?php echo $courserow->acourse_duration; ?></td>
                        <td><?php echo $courserow->acourse_totalseats; ?></td>
                        <td><?php echo $courserow->acourse_coursefee; ?></td>
                        <td><a href="<?php echo site_url("student/get-discount/$enc_assoc_id/$acourse_id"); ?>" class="apply_link">Apply</a></td>
                      </tr>
                      <?php } ?>
                      </tbody>
                     </table>
						</div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    	<?php if(count($gallerydata)>0){ ?>
                        <div class="row">
                        	<div class="col-md-12"><div class="pgtitle_tab">Photo Gallery</div></div>
                        </div>
                    	<div class="row">
                        	<div class="col-md-12 gallery-bx">
                            <div id="masonry" class="ttr-gallery-listing magnific-image">
                            	<div class="row">
                            	<?php
								$gal_sr=1;
								 foreach($gallerydata as $galleryrow){
										$assocph_photo=$galleryrow->assocph_photo;
										$assocph_title=$galleryrow->assocph_title;
									 ?>
                                   	<div class="col-md-6">
                                    <div class="ttr-box portfolio-bx">
                                        <div class="ttr-media  media-effect">
                                          
                                                <img src="<?php echo base_url().$assocph_photo; ?>" alt="<?php echo $assocph_title; ?>"> 
                                           
                                            <div class="ov-box">
                                                <div class="overlay-icon align-m"> 
                               <a href="<?php echo base_url().$assocph_photo; ?>" class="magnific-anchor" title="<?php echo $assocph_title; ?>">
                                                        <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                               <!-- <div class="portfolio-info-bx bg-primary">
                                                    <h4><a href="events-details.html">Soft skills</a></h4>
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                               
                                <?php 
								$gal_sr++;
								} ?>
                                </div>
                                	</div>
                               
                              </div>
                        </div>
                        <?php } ?>
                        <?php if(count($videodata)>0){ ?>
                        <div class="row">
                        	<div class="col-md-12"><div class="pgtitle_tab">Video Gallery</div></div>
                        </div>
                        <div class="row">
                        	<?php foreach($videodata as $videorow){ 
							$assocvg_videolink=$videorow->assocvg_videolink;
							 $assocvg_title=$videorow->assocvg_title;
							 if($assocvg_videolink!=""){
							?>
                        	
                            <div class="col-md-6">
                            <iframe width="100%" height="300" src="<?php echo $assocvg_videolink; ?>" title="<?php echo $assocvg_title; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           
                            
                            
                         
                            </div>
                            <?php 
							 }
							} ?>
                        </div>
                       <?php } ?>
                        
                    </div>
                    <div class="tab-pane fade" id="facilities" role="tabpanel" aria-labelledby="facilities-tab">
                      		<div class="row">
                        	<div class="col-md-12">
                            <?php 
									$assoc_facility=$assocdata->assoc_facility;
									$assoc_facar=explode(", ",$assoc_facility);
							?>
                            <table  style="width:100%" class="table table-bordered table-striped">
                            <tr>
                              <td width="32%">Transport</td>
                              <td width="68%"><?php if(in_array("Transport Facility", $assoc_facar)){ echo "Yes"; }else{ echo "No"; } ?></td>
                            </tr>
                            <tr>
                              <td>Canteen</td>
                              <td><?php if(in_array("Canteen Facility", $assoc_facar)){ echo "Yes"; }else{ echo "No"; } ?></td>
                            </tr>
                            <tr>
                              <td>Study Material</td>
                              <td><?php if(in_array("Study Material", $assoc_facar)){ echo "Yes"; }else{ echo "No"; } ?></td>
                            </tr>
                            <tr>
                              <td>Scholarship</td>
                              <td><?php if(in_array("Scholarship", $assoc_facar)){ echo "Yes"; }else{ echo "No"; } ?></td>
                            </tr>
                            
                            </table>
                            
                            </div>
                            </div>
                      </div>
                    
                      <div class="tab-pane fade" id="achievement" role="tabpanel" aria-labelledby="achievement-tab">
                      	<?php if($assocdata->assoc_achievements!=""){ ?>
                        <div class="row">
                        	<div class="col-md-12">
                            	<h5>Achievements</h5>
                                <p><?php echo $assocdata->assoc_achievements; ?></p>
                            </div>
                        
                        </div>
                        <?php } ?>
                  
                 
                        
                        
                        <?php if($assocdata->assoc_cocuriactivity!=""){ ?>
                        <div class="row">
                        	<div class="col-md-12">
                            	<h5>Co-curricular Activities</h5>
                                <p><?php echo $assocdata->assoc_cocuriactivity; ?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($assocdata->assoc_amenities!=""){ ?>
                        <div class="row">
                        	<div class="col-md-12">
                            	<h5> Other Amenities/Infrastructure</h5>
                                <p><?php echo $assocdata->assoc_amenities; ?></p>
                            </div>
                        
                        </div>
                        <?php } ?>
                        
                      	
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 m-b30">
             	<div class="row">
                <div class="col-md-12">	
                 <div class="bg-primary text-white contact-info-bx m-b30">
              	<h3 class="m-b10 title-head">Enroll <span>Now</span></h3>
                <p class="apply_info_text">Apply now and get discount coupon of  <?php echo $assocdata->assoc_discount."%"; ?>. You have to show coupon at the  time of admission</p>
                <div class="widget widget_getintuch apply-course-box">
        	<?php
			echo form_open('student/get-discount'); 
			echo form_hidden('app_associd',$assocdata->assoc_id);
		 	?>
           <button class="btn radius-xl text-uppercase btn-apply-main"> Apply Now </button>
			<?php echo form_close(); ?>
         
                </div>
                <!--<h5 class="m-t0 m-b20">Follow Us</h5>
                <ul class="list-inline contact-social-bx">
                    <li><a href="#" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-linkedin"></i></a></li>								<li><a href="#" class="btn outline radius-xl"><i class="fa fa-google-plus"></i></a></li>
                </ul>--> 
              </div>
              	</div>
              	</div>
                <?php if(count($relassocdata)>0){ ?>
                 <div class="row">
                 	<div class="col-md-12">
                    	<div class="widget recent-posts-entry">
									<h6 class="widget-title">Other </h6>
									<div class="widget-post-bx">
                                    	<?php foreach($relassocdata as $relassocrow){
												$relassoc_slug=$relassocrow->assoc_slug;
												$relassoc_feaimg=$relassocrow->assoc_featuredimg;
												if($relassoc_feaimg==""){
													$relassoc_feaimg="assets/website/images/default_pic.png";
												}
												$relassoccat_slug=$relassocrow->assoccat_slug;
											 ?>
											<div class="widget-post clearfix">
											<div class="ttr-post-media"> <a href="<?php echo site_url("page/$relassoccat_slug/$relassoc_slug"); ?>" title="<?php echo $relassocrow->assoc_instconame; ?>"><img src="<?php echo base_url().$relassoc_feaimg ?>" width="200" height="143" alt=""></a> </div>
											<div class="ttr-post-info">
												<div class="ttr-post-header">
													<h6 class="post-title"><a href="<?php echo site_url("page/$relassoccat_slug/$relassoc_slug"); ?>" title="<?php echo $relassocrow->assoc_instconame; ?>"><?php echo $relassocrow->assoc_instconame; ?></a></h6>
												</div>
												<ul class="media-post">
		<li><a href="<?php echo site_url("page/$relassoccat_slug/$relassoc_slug"); ?>" title="<?php echo $relassocrow->assoc_instconame; ?>"><i class="fa fa-link" aria-hidden="true"></i> Read More</a></li>
												</ul>
											</div>
										</div>
                                        <?php } ?>
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
  <?php include("includes/footer.php"); ?>
  <button class="back-to-top fa fa-chevron-up" ></button>
</div>
<script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/popper.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/jquery.bootstrap-touchspin.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/magnific-popup.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/waypoints-min.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/counterup.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/imagesloaded.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/masonry.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/filter.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/owl.carousel.js"></script> 
<script src="<?php echo base_url(); ?>assets/website/js/functions.js"></script> 
</body>
</html>
