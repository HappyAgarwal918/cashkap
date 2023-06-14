<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url("master/dashboard"); ?>">
    <div class="sidebar-brand-icon rotate-n-15"> <i class="fas fa-laugh-wink"></i> </div>
    <div class="sidebar-brand-text mx-3">Welcome <sup> Admin</sup></div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active"> <a class="nav-link" href="<?php echo site_url("master/dashboard"); ?>"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
  <hr class="sidebar-divider">
  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> <i class="fas fa-user-shield"></i> <span>Admin</span> </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="<?php echo site_url("master/profile"); ?>">Admin Profile</a> <a class="collapse-item" href="<?php echo site_url("master/logout"); ?>">Logout</a> </div>
    </div>
  </li>
  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser"> <i class="fas fa-users"></i> <span>Users</span> </a>
    <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="<?php echo site_url("master/user/manage"); ?>">Manage Users</a> </div>
    </div>
  </li>


  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse" aria-expanded="true" aria-controls="collapseCourse"> <i class="fas fa-clipboard-list"></i> <span>Courses</span> </a>
    <div id="collapseCourse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="<?php echo site_url("master/course/manage"); ?>">Manage Courses</a> <a class="collapse-item" href="<?php echo site_url("master/course/add"); ?>">Add New</a> </div>
    </div>
  </li>



  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCoupon" aria-expanded="true" aria-controls="collapseCoupon"> <i class="fas fa-certificate"></i> <span>Coupon</span> </a>
    <div id="collapseCoupon" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="<?php echo site_url("master/coupon/manage"); ?>">Coupon Redeemed</a> <a class="collapse-item" href="<?php echo site_url("master/coupon/manage-pending"); ?>">Coupon Pending</a> </div>
    </div>
  </li>



  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAssociates" aria-expanded="true" aria-controls="collapseAssociates"> <i class="fas fa-users"></i> <span>Associates</span> </a>
    <div id="collapseAssociates" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="<?php echo site_url("master/associate/manage-pending"); ?>">Pending Associates</a> <a class="collapse-item" href="<?php echo site_url("master/associate/manage"); ?>">Approved Associates</a> </div>
    </div>
  </li>

  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVideoGallery" aria-expanded="true" aria-controls="collapseVideoGallery"> <i class="fas fa-video"></i> <span>Featured Videos</span> </a>
    <div id="collapseVideoGallery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="<?php echo site_url("master/video-gallery/manage"); ?>">View All</a> <a class="collapse-item" href="<?php echo site_url("master/video-gallery/add-new"); ?>">Add New</a> </div>
    </div>
  </li>

  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeaGal" aria-expanded="true" aria-controls="collapseFeaGal"> <i class="fas fa-images"></i> <span>Featured Images</span> </a>
    <div id="collapseFeaGal" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="<?php echo site_url("master/featured-gallery/manage");  ?>">View All</a> <a class="collapse-item" href="<?php echo site_url("master/featured-gallery/add-new");  ?>">Add New</a> </div>
    </div>
  </li>


  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseSettings"> <i class="fas fa-cog"></i> <span>Settings</span> </a>
    <div id="collapseSettings" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="<?php echo site_url("master/setting/manage-state"); ?>">Manage State</a>

        <a class="collapse-item" href="<?php echo site_url("master/setting/manage-institutes"); ?>">Institute Categories</a>

      </div>
    </div>
  </li>
  <div class="text-center" style="color: #ffffff;"><u><h4>Abroad</h4></u></div>
  <hr class="sidebar-divider">
  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#AbroadAppy" aria-expanded="true" aria-controls="collapseSettings"><i class="fas fa-solid fa-user"></i><span>users</span> </a>
    <div id="AbroadAppy" class="collapse" aria-labelledby="headingTwo" data-parent="#AbroadAppy">
      <div class="bg-white py-2 collapse-inner rounded"> 
        <a class="collapse-item" href="<?php echo site_url('master/abroad/all/applications'); ?>">view All registerd users</a>
      </div>
    </div>
  </li>
  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#clgData" aria-expanded="true" aria-controls="collapseSettings"><i class="fas fa fa-university"></i><span>collage</span> </a>
    <div id="clgData" class="collapse" aria-labelledby="headingTwo" data-parent="#clgData">
      <div class="bg-white py-2 collapse-inner rounded"> 
        <a class="collapse-item" href="<?php echo site_url('master/abroad/all/colleges'); ?>">view collages</a>
        <a class="collapse-item" href="<?php echo site_url('master/abroad/add/colleges/page'); ?>">Add New collages</a>
      </div>
    </div>
  </li>
  <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cntryData" aria-expanded="true" aria-controls="collapseSettings"><i class="fas fa fa-university"></i><span>Country eligiblity</span> </a>
    <div id="cntryData" class="collapse" aria-labelledby="headingTwo" data-parent="#cntryData">
      <div class="bg-white py-2 collapse-inner rounded"> 
        <a class="collapse-item" href="<?php echo site_url('master/abroad/country/eligiblity'); ?>"> View All Country eligiblity</a>
      </div>
    </div>
  </li>



  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>