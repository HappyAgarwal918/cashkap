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

            <li class="breadcrumb-item active" aria-current="page">Change Approval Status</li>

          </ol>

        </nav>

        <div class="d-sm-flex align-items-center justify-content-between">

          <h1 class="h3 mb-0 text-gray-800 mb-2">Change Approval Status</h1>

        </div>

        <?php include("includes/associate-header.php"); ?>

        <div class="row">

          <div class="col-xl-12 col-md-12 mb-4">

            	<div class="inner-section">

                	<div class="row">

            			<div class="col-md-12">

         <?php 

		$attributes = array('class'=>'formAdmin form-horizontal','name'=>'chpassform','id'=>'formuser','method'=>'post','autocomplete'=>'off');

		echo form_open_multipart("master/associate/approval-status/$segment4",$attributes);

		echo form_hidden('old_assoc_slug',$assocdata->assoc_slug);

 		?>

              <div class="col-md-12">

              <div class="row">

              <div class="form-group col-md-12 col-sm-12 col-xs-12">

                    <label>Name College/Institute/School/Other <span class="req">*</span></label>

                    <?php echo form_input(array(

				'name'=> 'assoc_instconame',

				'id'=> 'assoc_instconame',

				'type'=> 'text',

				'readonly'=>true,

				'class'=>"form-control",

				'value'=>set_value('assoc_instconame',$assocdata->assoc_instconame)));

				?> <?php echo form_error('assoc_instconame'); ?> </div>

                </div>

                

                

              <div class="row">

              <div class="col-md-6">

                    <div class="form-group">

                      <label>Approval Status <span class="req">*</span></label>

                      <select name="assoc_status" class="form-control">

                      	<option value="">--Select--</option>

    <option value="1" <?php echo set_select('assoc_status',1,$assocdata->assoc_status==1); ?>>Active</option>

     <option value="0" <?php echo set_select('assoc_status',0,$assocdata->assoc_status==0); ?>>Inactive</option>
       <option value="2" <?php echo set_select('assoc_status',2,$assocdata->assoc_status==2); ?>>Suspend</option>

                      </select>

                      <?php echo form_error('assoc_status'); ?> </div>

                  </div>

             <div class="form-group col-md-6 col-sm-12 col-xs-12">

                    <label>Slug <span class="req">*</span></label>

                    <?php echo form_input(array(

				'name'  => 'assoc_slug',

				'id'    => 'assoc_slug',

				'type'  => 'text',

				'class' => "form-control",

				'value' =>set_value('assoc_slug',$assocdata->assoc_slug)));

				?> <?php echo form_error('assoc_slug'); ?> </div>

                

              </div>

                <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                      <label>Featured <span class="req">*</span></label>

                      <select name="assoc_featured" class="form-control">

   <option value="0" <?php echo set_select('assoc_featured',0,$assocdata->assoc_featured==0); ?>>No</option>

    <option value="1" <?php echo set_select('assoc_featured',1,$assocdata->assoc_featured==1); ?>>Yes</option>

     

                      </select>

                      <?php echo form_error('assoc_featured'); ?> </div>

                  </div>

                    <div class="form-group col-md-6 col-sm-12 col-xs-12">

                    <label>Discount Percent <span class="req">*</span></label>

                    <?php echo form_input(array(

				'name'  => 'assoc_discount',

				'id'    => 'assoc_discount',

				'type'  => 'text',

				'class' => "form-control",

				'value' =>set_value('assoc_discount',$assocdata->assoc_discount)));

				?> <?php echo form_error('assoc_discount'); ?> </div>

                </div>

                <div class="row">

                  <div class="form-group col-md-6 col-sm-12 col-xs-12 mtop20"> 

					<button name="assocbtn" class="btn btn-primary" type="submit">Submit</button>

			 </div>

                </div>

              </div>

              <?php echo form_close();?>

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

