<div class="ttr-sidebar">

  <div class="ttr-sidebar-wrapper content-scroll">
    <!-- side menu logo start -->
    <div class="ttr-sidebar-logo">
      <!--<a href="#"><img alt="" src="<?php //echo base_url();
                                        ?>assets/dashboard/images/logo.png" width="122" height="27"></a> -->
      <!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
					<i class="material-icons ttr-fixed-icon">gps_fixed</i>
					<i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
		</div> -->
      <div class="ttr-sidebar-toggle-button"> <i class="ti-arrow-left"></i> </div>
    </div>
    <!-- side menu logo end -->
    <!-- sidebar menu start -->
    <nav class="ttr-sidebar-navi">
      <ul>
        <li> <a href="<?php echo site_url("student/profile"); ?>" class="ttr-material-button"> <span class="ttr-icon"><i class="ti-user"></i></span> <span class="ttr-label">My Profile</span> </a> </li>
        <li> <a href="<?php echo site_url("student/discount-coupon"); ?>" class="ttr-material-button"> <span class="ttr-icon"><i class="ti-user"></i></span> <span class="ttr-label">Discount Coupon</span> </a> </li>
        <!-- <li>
						<a href="#" class="ttr-material-button">
							<span class=""><i class="ti-layout-accordion-list"></i></span>
		                	<span class="ttr-label">Student</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="javascript:void(0)" class="ttr-material-button"><span class="ttr-label">Pending to Redeem</span></a>
		                	</li>
		                	<li>
		                		<a href="javascript:void(0)" class="ttr-material-button"><span class="ttr-label">Redeemed</span></a>
		                	</li>
                            <li>
		                		<a href="javascript:void(0)" class="ttr-material-button"><span class="ttr-label">Add New</span></a>
		                	</li>
							      </ul>
		            </li>-->
        <li><a href="<?php echo site_url("student/logout"); ?>" class="ttr-material-button"> <span class="ttr-icon"><i class="ti-lock"></i></span> <span class="ttr-label">Logout</span> </a> </li>
        <li class="ttr-seperate"></li>
      </ul>
      <!-- sidebar menu end -->
    </nav>
    <!-- sidebar menu end -->
  </div>
</div>