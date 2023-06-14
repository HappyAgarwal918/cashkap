<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
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
         <li class="breadcrumb-item"><a href="<?php echo site_url("master/setting/manage-city");  ?>">Manage City</a></li>
         <li class="breadcrumb-item"><a href="<?php echo site_url("master/setting/manage-city/$segment4");  ?>">Manage Cities</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add City</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Add City</h1>
        </div>
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
              <?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>
              <div class="col-md-12">
                <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
              </div>
              <?php  } ?>
              <?php 
			$attributes=array('class' => 'formAdmin form-horizontal','name'=>'chpassform','id'=>'formuser','method'=>'post','autocomplete'=>'off');

				echo form_open_multipart("master/setting/add-city/$segment4",$attributes);

 			 ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>State Name <span class="req">*</span></label>
                        <?php echo form_input(array(
				'name'  => 'city_stateid',
				'id'    => 'city_stateid',
				'type'  => 'text',
				'readonly'=>true,
				'class' => "form-control",
				'value' =>set_value('city_stateid',$statedata->state_name)));
				?> 
                      <?php echo form_error('city_stateid'); ?> </div>
                  </div>
                  
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                     <label>City Name <span class="req">*</span></label>
                        <?php echo form_input(array(
				'name'  => 'city_name',
				'id'    => 'city_name',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('city_name')));
				?> 
                      <?php echo form_error('city_name'); ?> </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status <span class="req">*</span></label>
                      <select name="city_status" class="form-control">
                        <option value="1"  <?php echo set_select('city_status',1); ?>>Active</option>
                        <option value="0"  <?php echo set_select('city_status',0); ?>>Inactive</option>
                      </select>
                      <?php echo form_error('city_status'); ?> </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12 mtop20">
                    <button name="upState" class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </div>
              </div>
              <?php echo form_close();?> </div>
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