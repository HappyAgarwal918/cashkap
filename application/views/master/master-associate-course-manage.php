<?php defined('BASEPATH') OR exit('No direct script access allowed');
$segment4=$this->uri->segment(4);
 ?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
<?php if(isset($siteTitle)){ echo $siteTitle; } ?>
</title>
<?php include("includes/style-header.php"); ?>
<link href="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
<div id="wrapper">
  <?php include("includes/sidebar.php"); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include("includes/top-nav.php"); ?>
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/dashboard");  ?>">Home</a></li>
            <?php if($assocdata->assoc_status==1){ ?>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/associate/manage");  ?>">Manage Associates</a></li>
            <?php }elseif($assocdata->assoc_status==0){ ?>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/associate/manage-pending");  ?>">Manage Associates</a></li>
            <?php }?>
            <li class="breadcrumb-item active" aria-current="page">Manage Courses</li>
          </ol>
        </nav>
        
        
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Course </h1>
        </div>
        <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>
        <div class="row">
          <div class="col-md-12">
            <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
          </div>
        </div>
        <?php  } ?>
        
          <?php include("includes/associate-header.php"); ?>
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive​">
                    <table style="width:100%" class="table table-bordered custom-table">
                      <tr>
                        <th width="6%">Sr.</th>
                        <th width="27%">Course</th>
                        <th width="16%">Duration</th>
                        <th width="14%">Total Seats</th>
                        <th width="15%">Fee</th>
                        <th width="15%">Last Date</th>
                        <th width="7%">Delete</th>
                        <th width="7%">Edit</th>
                      </tr>
  <?php 
  $sr=1;
  foreach($coursedata as $courserow){
	   $acourse_id=$courserow->acourse_id;
	   ?>
                  <tr>
                    <td>Sr.</td>
                    <td><?php echo $courserow->course_name ?></td>
                    <td><?php echo $courserow->acourse_duration ?></td>
                    <td><?php echo $courserow->acourse_totalseats ?></td>
                    <td><?php echo $courserow->acourse_coursefee ?></td>
                    <td><?php $acourse_lastdate=$courserow->acourse_lastdate; if($acourse_lastdate!="" && $acourse_lastdate!="0000-00-00"){ echo date('d-m-Y',strtotime($acourse_lastdate));  } ?></td>
                    
                     <td><a href="<?php echo site_url("master/associate/delete-course/$segment4/$acourse_id"); ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a></td>
                    <td><a href="<?php echo site_url("master/associate/edit-course/$segment4/$acourse_id"); ?>">Edit</a></td>
                  </tr>
      <?php

  $sr++;

   } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("includes/footer.php"); ?>
  </div>
</div>
<?php include("includes/common-footer.php"); ?>
<?php include("includes/style-footer.php"); ?>
<script src="<?php echo base_url(); ?>assets/master/vendor/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/js/demo/datatables-demo.js"></script>
</body>
</html>
