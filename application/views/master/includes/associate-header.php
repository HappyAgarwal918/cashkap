<?php $segment4=$this->uri->segment(4); ?>

<div class="bd-example">
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Associate</button>
    <div class="dropdown-menu"> <a class="dropdown-item" href="<?php echo site_url("master/associate/view/$segment4"); ?>">View Associate</a> 
    <a class="dropdown-item" href="<?php echo site_url("master/associate/featured-image/$segment4"); ?>">Featured Image</a>
    
    
     </div>
  </div>
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Photo Gallery</button>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="<?php echo site_url("master/associate/photo-gallery/$segment4"); ?>">Manage Photos</a>
     <a class="dropdown-item" href="<?php echo site_url("master/associate/add-photo/$segment4"); ?>">Add New Photo</a> </div>
  </div>
  
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Video Gallery</button>
    <div class="dropdown-menu"> 
    <a class="dropdown-item" href="<?php echo site_url("master/associate/video-gallery/$segment4"); ?>">Manage Videos</a>
    
    <a class="dropdown-item" href="<?php echo site_url("master/associate/add-video/$segment4"); ?>">Add New Video</a> </div>
  </div>
  
  
  
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Associate Approval</button>
    <div class="dropdown-menu"> <a class="dropdown-item" href="<?php echo site_url("master/associate/approval-status/$segment4"); ?>">View Approval Status</a> </div>
  </div>
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</button>
    <div class="dropdown-menu"> <a class="dropdown-item" href="<?php echo site_url("master/associate/manage-courses/$segment4"); ?>">Manage Courses</a>
  <a class="dropdown-item" href="<?php echo site_url("master/associate/add-course/$segment4"); ?>">Add Course</a>
    
    
     </div>
  </div>
  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Student</button>
    <div class="dropdown-menu"> <a class="dropdown-item" href="<?php echo site_url("master/associate/student-enrolled/$segment4"); ?>">Student Enrolled</a> </div>
  </div>
</div>
