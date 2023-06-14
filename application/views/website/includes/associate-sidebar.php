<div class="ttr-sidebar">
  <div class="ttr-sidebar-wrapper content-scroll">
    <div class="ttr-sidebar-logo"> <a href="#"><img alt="" src="<?php echo base_url(); ?>assets/dashboard/images/logo.png" width="122" height="27"></a>
      <div class="ttr-sidebar-toggle-button"> <i class="ti-arrow-left"></i> </div>
    </div>
    <nav class="ttr-sidebar-navi">
      <ul>
        <li> <a href="<?php echo site_url("associate/dashboard"); ?>" class="ttr-material-button"> <span class="ttr-icon"><i class="ti-home"></i></span> <span class="ttr-label">Dashboard</span> </a> </li>
        <li> <a href="#" class="ttr-material-button"> <span class="ttr-icon"><i class="ti-user"></i></span> <span class="ttr-label">My Profile</span> <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span> </a>
          <ul>
            <li> <a href="<?php echo site_url("associate/profile"); ?>" class="ttr-material-button">Basic Profile</span></a> </li>
            <li> <a href="<?php echo site_url("associate/featured-image"); ?>" class="ttr-material-button">Featured Image</span></a> </li>
            <li> <a href="<?php echo site_url("associate/courses"); ?>" class="ttr-material-button"><span class="ttr-label">Courses</span></a> </li>
            <li> <a href="<?php echo site_url("associate/about"); ?>" class="ttr-material-button"><span class="ttr-label">About</span></a> </li>
            <li> <a href="<?php echo site_url("associate/photo-gallery"); ?>" class="ttr-material-button"><span class="ttr-label">Photo Gallery</span></a> </li>
          </ul>
        </li>
        <li> <a href="#" class="ttr-material-button"> <span class=""><i class="ti-layout-accordion-list"></i></span> <span class="ttr-label">Student</span> <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span> </a>
          <ul>
            <li> <a href="<?php echo site_url("associate/student-pending/manage"); ?>" class="ttr-material-button"><span class="ttr-label">Pending to Redeem</span></a> </li>
            <li> <a href="<?php echo site_url("associate/student-redeemed/manage"); ?>" class="ttr-material-button"><span class="ttr-label">Redeemed</span></a> </li>
          </ul>
        </li>
        <li> <a href="<?php echo site_url("associate/logout"); ?>" class="ttr-material-button"> <span class="ttr-icon"><i class="ti-lock"></i></span> <span class="ttr-label">Logout</span> </a> </li>
        <li class="ttr-seperate"></li>
      </ul>
    </nav>
  </div>
</div>