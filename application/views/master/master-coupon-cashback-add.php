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
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/coupon/manage");  ?>">Manage Coupon </a></li>
            <li class="breadcrumb-item active" aria-current="page">View Coupon</li>
          </ol>
        </nav>
       	<div class="row">
        	<div class="col-md-12">
            	<ul class="asoctab_nav">
                	<li><a href="<?php echo site_url("master/coupon/view/$segment4"); ?>">View Coupon</a></li>
                    <li><a href="<?php echo site_url("master/coupon/cashback/$segment4"); ?>" class="active">Cashback</a></li>
                </ul>
        </div>
        </div>
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
              	<div class="row">
                	<div class="col-md-12">
                    	 <?php 
$attributes = array('class' => 'formAdmin form-horizontal','name'=>'chpassform','id'=>'formuser','method'=>'post','autocomplete'=>'off');
				echo form_open_multipart("master/coupon/cashback/$segment4",$attributes);
				 ?>
                  <div class="row">
                		<div class="form-group col-md-6 col-sm-12 col-xs-12">
                 <label>Amount <span class="req">*</span></label>
                 <?php echo form_input(array(
            			'name'  => 'stuco_cashbackamt',
                			'id'    => 'stuco_cashbackamt',
                		'type'  => 'text',
                		'class' => "form-control",
            		'value' =>set_value('stuco_cashbackamt',$studata->stuco_cashbackamt)));
               ?> <?php echo form_error('stuco_cashbackamt'); ?> </div>
               
               		<div class="col-md-6 form-group">
                  <label>Payment Proof <?php $stuco_cashbackslip=$studata->stuco_cashbackslip; if($stuco_cashbackslip!=""){?><a href="<?php echo base_url().$stuco_cashbackslip; ?>" target="_blank">Old File</a>  <?php }  ?> </label>
                    <?php echo form_upload(array('name'=>'stuco_cashbackslip','class'=>'form-control upField')); ?> <?php echo form_error('stuco_cashbackslip'); ?> <span class="error">
                    <?php if(isset($error1)){ echo $error1; } ?>
                    </span> </div>
               			</div>
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                 <label>Remarks </label>
                 <?php echo form_textarea(array(
            			'name' => 'stuco_cashbackremarks',
                		'id' =>'stuco_cashbackremarks',
                		'rows' => 2,
                		'class' => "form-control",
            		'value' =>set_value('stuco_cashbackremarks',$studata->stuco_cashbackremarks)));
               ?> <?php echo form_error('stuco_cashbackremarks'); ?> </div>
                        	
                        </div>
                        
                       <div class="row">
          <div class="form-group col-md-3 col-sm-12 col-xs-12">
            <button class="btn btn-primary btn-custom-create" type="submit" name="submit">Submit</button>
          </div>
        </div> 
                        
                 <?php echo form_close(); ?>             
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
