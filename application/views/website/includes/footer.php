<?php $segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
$segment3 = $this->uri->segment(3);
?>
<footer>
   <div class="container-fluid back1">
      <div class="row">
         <div class="col-md-2 pd text-center">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();  ?>assets/website/images/logo.png" class="img-fluid" alt="footer logo" style="margin-bottom: 20px;"></a><br>
         </div>

         <?php if ($segment1 == "study" && $segment2 == "abroad" || $segment1 == "abroad-student-registration" || $segment1 == "abrod-student-login" || $segment1 == "study-abroad-sendOTP" || $segment1 == "submit-offer-letter") { ?>
            <div class="col-md-2 pd">
            <a style="text-decoration: none;color: black;">
               <h5 class="fsc spc-text" style="font-weight: 500;line-height: 30px;margin-bottom: 20px; ">Important Links</h3>
            </a>
            <a href="<?php echo site_url("study/abroad/about"); ?>" style="text-decoration: none;color: black;">
               <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400; ">About Us</h6>
            </a>
            <a href="<?php echo site_url("study/abroad"); ?>" style="text-decoration: none;color: black;">
               <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Study Abroad</h6>
            </a>
            <a href="<?php echo site_url("study/abroad/contact"); ?>" style="text-decoration: none;color: black;">
               <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Contact Us</h6>
            </a>
         </div>
            <div class="col-md-2 pd">
               <a style="text-decoration: none;color: black;">
                  <h5 class="fsc spc-text" style="font-weight: 500;line-height: 30px;margin-bottom: 20px;">Colleges/Universities</h3>
               </a>
               <a href="<?php echo  site_url("study/abroad/collage/1"); ?>" style="text-decoration: none;color: black;">
                  <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Colleges</h6>
               </a>
               <a href="<?php echo site_url("study/abroad/collage/1"); ?>" style="text-decoration: none;color: black;">
                  <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Universities</h6>
               </a>
            </div>
            <div class="col-md-2 pd">
               <a style="text-decoration: none;color: black;">
                  <h5 class="fsc spc-text" style="font-weight: 500;line-height: 30px;margin-bottom: 20px;">Country Eligibility</h3>
               </a>
               <?php
               $instsubcat = $this->customcode->getAbrodcntry();
               foreach ($instsubcat as $key => $instsubcatrow) {
                  $cntry_code = $instsubcatrow->cntry_code;
                  if ($key == 6) {
                     break;
                  }

               ?>
                  <a href="<?php echo site_url("study/abroad/eligibility/$cntry_code"); ?>" style="text-decoration: none;color: black;">
                     <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400; text-transform: capitalize;"><?php echo $instsubcatrow->cntry_name; ?></h6>
                  </a>
               <?php } ?>



            </div>
            <div class="col-md-2 pd">
               <a style="text-decoration: none;color: black;">
                  <h5 class="fsc spc-text" style="margin-bottom: 52px;">
                     </h3>
               </a>

               <?php foreach ($instsubcat as $key => $instsubcatrow) {
                  if ($key >= 6) {

                     $cntry_code = $instsubcatrow->cntry_code;


               ?>

                     <a href="<?php echo site_url("study/abroad/eligibility/$cntry_code"); ?>" style="text-decoration: none;color: black;">
                        <h6 class="fsc spc-text" style="line-height: 30px;font-weight: 400;text-transform: capitalize;"><?php echo $instsubcatrow->cntry_name; ?></h6>
                     </a>
               <?php }
               } ?>

            </div>

         <?php } else { ?>

            <div class="col-md-2 pd">
            <a style="text-decoration: none;color: black;">
               <h5 class="fsc spc-text" style="font-weight: 500;line-height: 30px;margin-bottom: 20px; ">important Links</h3>
            </a>
            <a href="<?php echo site_url("about-us"); ?>" style="text-decoration: none;color: black;">
               <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400; ">About Us</h6>
            </a>
            <a href="<?php echo site_url("study/abroad"); ?>" style="text-decoration: none;color: black;">
               <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Study Abroad</h6>
            </a>
            <a href="<?php echo site_url("contact-us"); ?>" style="text-decoration: none;color: black;">
               <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Contact Us</h6>
            </a>
         </div>   
            <div class="col-md-2 pd">
               <a style="text-decoration: none;color: black;">
                  <h5 class="fsc spc-text" style="font-weight: 500;line-height: 30px;margin-bottom: 20px;">Schools/Colleges/<br>Universities</h3>
               </a>
               <?php foreach ($schoolsubcat as $schoolsubcatrow) {
                  $school_slug = $schoolsubcatrow->assoccat_slug;
               ?>
                  <a href="<?php echo site_url("category/schools/$school_slug"); ?>" style="text-decoration: none;color: black;">
                     <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Private Schools</h6>
                  </a>
               <?php } ?>
               <a href="<?php echo site_url("category/colleges"); ?>" style="text-decoration: none;color: black;">
                  <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Colleges</h6>
               </a>
               <a href="<?php echo site_url("category/universities"); ?>" style="text-decoration: none;color: black;">
                  <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">Universities</h6>
               </a>
            </div>
            <div class="col-md-2 pd">
               <a style="text-decoration: none;color: black;">
                  <h5 class="fsc spc-text" style="font-weight: 500;line-height: 30px;margin-bottom: 20px;">Coaching Institutions</h3>
               </a>
               <?php
               $instsubcat = $this->customcode->getSubCategory(4);
               foreach ($instsubcat as $key => $instsubcatrow) {
                  $subcat_slug = $instsubcatrow->assoccat_slug;
                  if ($key == 6) {
                     break;
                  }

               ?>
                  <a href="<?php echo site_url("category/coaching-institutes/$subcat_slug"); ?>" style="text-decoration: none;color: black;">
                     <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;"><?php echo $instsubcatrow->assoccat_title; ?></h6>
                  </a>
               <?php } ?>



            </div>
            <div class="col-md-2 pd">
               <a style="text-decoration: none;color: black;">
                  <h5 class="fsc spc-text" style="margin-bottom: 52px;">
                     </h3>
               </a>

               <?php foreach ($instsubcat as $key => $instsubcatrow) {
                  if ($key >= 6) {

                     $subcat_slug = $instsubcatrow->assoccat_slug;


               ?>

                     <a href="<?php echo site_url("category/coaching-institutes/$subcat_slug"); ?>" style="text-decoration: none;color: black;">
                        <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;"><?php echo $instsubcatrow->assoccat_title; ?></h6>
                     </a>
               <?php }
               } ?>

            </div>
         <?php
         }
         ?>
         <div class="col-md-2 pd">
            <a style="text-decoration: none;color: black;">
               <h5 class="fsc spc-text" style="font-weight: 500;line-height: 30px;margin-bottom: 20px;">Contact Us</h3>
            </a>
            <a href="mailto:info@cashkap.com" style="text-decoration: none;color: black;">
               <h6 class="fsc spc-text" style="line-height: 30px;    font-weight: 400;">info@cashkap.com</h6>
            </a>

            <a href="/student/registration"><button class="rdmr3 mb-3 font-weight-bold spc-text" id="button2"> Student registration</button></a><br><a href="/associate/login">
               <button class="rdmr3 font-weight-bold spc-text" id="button">Associate/Partner login</button> </a>
         </div>
      </div>
   </div>
   <div class="footer-bottom  " style="background-color:#07294d;">
      <div class="container  ">
         <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center"><span class="text-white">Copyright © 2021 www.cashkap.com. All Rights Reserved. Website Designed & Developed By : <a href="#" target="_blank" class="text-white">Thefuenix</a></span></div>
         </div>
      </div>
   </div>
</footer>
<a id="gotopbtn" href="https://wa.me/+919592502502" target="_blank" class="float" style="background-color: #00e676;">
   <i class="fab fa-whatsapp my-float"></i>
</a>
<script>
   $(window).on("load", function() {
      $('#loading').remove();

   });
</script>