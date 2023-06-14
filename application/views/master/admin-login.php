<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
<?php if(isset($siteTitle)){ echo $siteTitle; } ?>
</title>
<link href="<?php echo base_url(); ?>assets/master/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/master/css/sb-admin-2.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/master/css/custom.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-12 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            
            <div class="col-lg-12">
              <div class="p-3">
              	<?php  if($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')){ ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
                  </div>
                </div>
                <?php  } ?>
              
              	<div class="row">
                <div class="col-md-8 offset-md-2">
                <h2 class="text-center"> <img src="<?php echo base_url(); ?>assets/master/img/logo.png" class="img-responsive"/> </h2>
                </div>
                </div>
              	<?php if(isset($error)){ ?>
                <div class="row">
                	<div class="col-md-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert"> <?php echo $error;  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                </div>
                </div>
                <?php } ?>
             <?php 
			 	$attributes = array('class'=> 'user','method'=>'post','autocomplete'=>'off','id'=>'formLogin');  
          		echo form_open('master/login',$attributes);
				
				?>
                <div class="row">
                <div class="col-md-12">
                <div class="form-group"> 
				<label>Login Id <span class="req">*</span></label>
				<?php echo form_input(array('name'=>'loginid','id'=>'loginid','class'=>'form-control form-control-user','value'=>set_value('loginid'),'maxlength'=>'100')); ?> <?php echo form_error('loginid'); ?> </div>
                </div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                <div class="form-group"> 
                <label>Password <span class="req">*</span></label>
				<?php echo form_password(array('name'=>'password','id'=>'password','class'=>'form-control form-control-user','maxlength'=>'100')); ?> <?php echo form_error('password'); ?>

				 </div>
                	</div>
                    </div>
           
              
                <div class="row">
                	<div class="col-md-12">
     <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                  <?php echo form_close(); ?>
                </div>
                </div>
               <?php form_close(); ?>
                
                <hr>
                <div class="text-center"><a class="small" href="<?php echo site_url("master/forgot-password"); ?>" title="Forgot Password">Forgot Password?</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/master/vendor/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/vendor/jquery-easing/jquery.easing.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/js/sb-admin-2.min.js"></script>


</body>
</html>
