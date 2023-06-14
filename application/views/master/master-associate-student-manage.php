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
</head>

<body id="page-top">
<div id="wrapper">
  <?php include("includes/sidebar.php"); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php include("includes/top-nav.php"); ?>
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/dashboard");  ?>">Home</a></li>
            <?php if($assocdata->assoc_status==1){ ?>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/associate/manage");  ?>">Manage Associates</a></li>
            <?php }elseif($assocdata->assoc_status==0){ ?>
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/associate/manage-pending");  ?>">Manage Associates</a></li>
            <?php }?>
            <li class="breadcrumb-item active" aria-current="page">Manage Student Enrolled</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">View Associate</h1>
        </div>
        <?php include("includes/associate-header.php"); ?>
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="2%" valign="top" class="column-title">Sr.</th>
                        <th width="22%">Course</th>
                        <th width="15%">Coupon</th>
                        <th width="10%">Status</th>
                        <th width="7%">Slip</th>
                        <th width="7%">Cashback</th>
                        <th width="10%">Date</th>
                        <th width="4%" valign="top" class="column-title">View</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
				$count=0;
					foreach($studata as $sturow){
					$stuco_id=$sturow->stuco_id;
					?>
                      <tr class="even pointer">
                        <td><?php echo ++$count; ?></td>
                        <td><?php echo $sturow->course_name; ?></td>
                        <td><?php echo $sturow->stuco_coupon; ?></td>
                        <td><?php $stuco_redeemstatus=$sturow->stuco_redeemstatus; if($stuco_redeemstatus==1){ echo "Redeemed"; }else{ echo "Pending"; } ?></td>
                        <td><?php $slip=$sturow->stuco_redeemslip; if($slip!=""){ ?>
                          <a href="<?php echo base_url().$slip; ?>" target="_blank">View</a>
                          <?php } ?></td>
                        <td><?php if($sturow->stuco_cashbackpaid==1){ echo "Yes"; }else{ echo "No"; } ?></td>
                        <td><?php $stuco_redeemdate=$sturow->stuco_redeemdate;
					 		if($stuco_redeemdate!="" && $stuco_redeemdate!="0000-00-00"){
								echo date('d-m-y',strtotime($stuco_redeemdate));	
							}
					  ?></td>
                        <td><a href="<?php echo site_url("master/coupon/view/$stuco_id"); ?>" target="_blank">View</a></td>
                      </tr>
                      <?php }  ?>
                    </tbody>
                  </table>
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
</body>
</html>
