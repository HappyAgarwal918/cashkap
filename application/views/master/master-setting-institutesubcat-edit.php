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
         <li class="breadcrumb-item"><a href="<?php echo site_url("master/setting/manage-institutes");  ?>">
Manage Institute Categories
</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Institute Category</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Edit Institute Category</h1>
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
		echo form_open_multipart("master/setting/edit-institute/$segment4",$attributes);
		echo form_hidden('old_assoccat_slug',$catdata->assoccat_slug);
 			 ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Category Title <span class="req">*</span></label>
                        <?php echo form_input(array(
				'name'  => 'assoccat_title',
				'id'    => 'assoccat_title',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('assoccat_title',$catdata->assoccat_title)));
				?> 
                      <?php echo form_error('assoccat_title'); ?> </div>
                  </div>
                  
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Slug <span class="req">*</span></label>
                        <?php echo form_input(array(
				'name'  => 'assoccat_slug',
				'id'    => 'assoccat_slug',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('assoccat_slug',$catdata->assoccat_slug)));
				?> 
                      <?php echo form_error('assoccat_slug'); ?> </div>
                  </div>
                  
                </div>
                
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                     <label>Display Order <span class="req">*</span></label>
                        <?php echo form_input(array(
				'name'  => 'assoccat_disorder',
				'id'    => 'assoccat_disorder',
				'type'  => 'text',
				'class' => "form-control",
				'value' =>set_value('assoccat_disorder',$catdata->assoccat_disorder)));
				?> 
                      <?php echo form_error('assoccat_disorder'); ?> </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status <span class="req">*</span></label>
                      <select name="assoccat_status" class="form-control">
                        <option value="1"  <?php echo set_select('assoccat_status',1,$catdata->assoccat_status==1); ?>>Active</option>
                        <option value="0"  <?php echo set_select('assoccat_status',0,$catdata->assoccat_status==0); ?>>Inactive</option>
                      </select>
                      <?php echo form_error('assoccat_status'); ?> </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12 mtop20">
                    <button name="addInst" class="btn btn-primary" type="submit">Submit</button>
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