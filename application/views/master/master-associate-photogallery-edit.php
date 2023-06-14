<?php defined('BASEPATH') OR exit('No direct script access allowed');
$segment4=$this->uri->segment(4);
$segment5=$this->uri->segment(5);
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
            <li class="breadcrumb-item active" aria-current="page">Edit Associate</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Edit Associate</h1>
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
                  <p><a href="<?php echo site_url("master/associate/photo-gallery/$segment4"); ?>">&raquo; Back to Photo Gallery</a></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <?php 

$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');

echo form_open_multipart("master/associate/edit-gallery/$segment4/$segment5",$attributes);

			?>

            

            

            	<div class="row">

                    <div class="form-group col-md-6 col-sm-12 col-xs-12">

                  <label>Photo Title <span class="req">*</span></label>

                  <?php echo form_input(array(

            'name'=>'assocph_title',

            'id'=>'assocph_title',

            'type'=>'text',

            'class'=> "form-control",

            'value'=>set_value('assocph_title',$phgaldata->assocph_title)));

            ?> <?php echo form_error('assocph_title'); ?> </div>

            <div class="form-group col-md-6 col-sm-6 col-xs-12">
					<?php $assocph_photo=$phgaldata->assocph_photo; ?>
                    <label>Attach Photo <?php if($assocph_photo!=""){?><a href="<?php echo base_url().$assocph_photo; ?>" target="_blank">Old File</a> <?php } ?><span class="note">(800*600px)</span> </label>

                    <?php echo form_input(array(

				'name'  => 'assocph_photo',

				'id'    => 'assocph_photo',

				'type'  => 'file',

				'class' => "form-control",

				'value' =>set_value('assocph_photo')));

				?> <?php echo form_error('assocph_photo'); ?> <span class="error1">

                    <?php if(isset($error1)){ echo $error1; } ?>

                    </span> </div>

            

           	

            </div>

            

            	

            <div class="row">

                <div class="form-group col-md-3 col-sm-12 col-xs-12">

                  <button class="btn btn-primary btn-custom-create" type="submit" name="addCourse">Submit</button></div>

              </div>

            <?php form_close(); ?>

                  
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
