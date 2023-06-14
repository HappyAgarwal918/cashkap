<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$segment3=$this->uri->segment(3);
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index, follow">
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="en_us" />
	<meta name="twitter:card" content="summary">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="<?php echo base_url();  ?>assets/website/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();  ?>assets/website/images/favicon.png" />
	<title><?php if(isset($siteTitle)){ echo $siteTitle; } ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/assets.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/typography.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/shortcodes.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/color-1.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/settings.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/navigation.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/website/font/css/font-awesome.min.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/custom.css">
   <script src="<?php echo base_url(); ?>assets/website/ckeditor/ckeditor.js"></script>
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
   <?php include("includes/header.php"); ?>
    <div class="page-content">
        <!-- Page Heading Box ==== -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner2.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Associate Registration</h1>
				 </div>
            </div>
        </div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url("associate/registration"); ?>">Associate Registration </a></li>
					<li>Associate Registration  - Step 2</li>
				</ul>
			</div>
		</div>
        
		<div class="content-block">
			<div class="section-area section-sp2">
                <div class="container">
					 <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 m-b30">
             <div class="bg-gray padbox boxborder">
			<?php 
$attributes = array('class' => 'create_account style2 ','method'=>'post','autocomplete'=>'off');
echo form_open("associate/registration-form/$segment3",$attributes);
echo form_hidden('assoc_category',$maincatdata->assoccat_id);
			?>
            <div class="row">
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Registration Category <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_catname',
            'id'=>'assoc_catname',
            'type'=>'text',
			'readonly'=>true,
            'class'=> "form-control",
            'value'=>set_value('assoc_catname',$maincatdata->assoccat_title)));
            ?>
              <?php echo form_error('assoc_category'); ?> </div>
              <?php if($assoc_category==3 || $assoc_category==4){ ?>
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Sub Category <span class="req">*</span></label>
                <select class="form-control assoc_subcat" name="assoc_subcat">
                 <option value="">--Select--</option>
                 <?php foreach($subcatdata as $subcatrow){ ?>
                <option value="<?php echo $subcatrow->assoccat_id; ?>" <?php echo set_select('assoc_subcat',$subcatrow->assoccat_id); ?>><?php echo $subcatrow->assoccat_title; ?></option>
                <?php } ?>
              </select>   
              <?php echo form_error('assoc_subcat'); ?> </div>
              <?php } ?>
              
              </div>
              <?php 
			  if($assoc_category==1 || $assoc_category==2){ ?>
              <div class="row">
				 <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label>Name of College/University <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_instconame',
            'id'=>'assoc_instconame',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_instconame')));
            ?> <?php echo form_error('assoc_instconame'); ?> </div> 
             </div>
            <div class="row">
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Total Area in acres <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_totalarea',
            'id'=>'assoc_totalarea',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_totalarea')));
            ?> <?php echo form_error('assoc_totalarea'); ?> </div>
            
            
           	<div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Construction Area (in Sqm) <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_consarea',
            'id'=>'assoc_consarea',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_consarea')));
            ?> <?php echo form_error('assoc_consarea'); ?> </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Affiliated To <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_affibody',
            'id'=>'assoc_affibody',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_affibody')));
            ?> <?php echo form_error('assoc_affibody'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Rank <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_edurank',
            'id'=>'assoc_edurank',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_edurank')));
            ?> <?php echo form_error('assoc_edurank'); ?> </div>
            </div>
            <div class="row">
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>Total Teaching Staff (Graduate) <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_noteacher_graduate',
            'id'=>'assoc_noteacher_graduate',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_noteacher_graduate',0)));
            ?> <?php echo form_error('assoc_noteacher_graduate'); ?> </div>
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>Total Teaching Staff (Master's) <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_noteacher_masters',
            'id'=>'assoc_noteacher_masters',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_noteacher_masters',0)));
            ?> <?php echo form_error('assoc_noteacher_masters'); ?> </div>
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>Total Teaching Staff (PhD) <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_noteacher_phd',
            'id'=>'assoc_noteacher_phd',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_noteacher_phd',0)));
            ?> <?php echo form_error('assoc_noteacher_phd'); ?> </div>
            
            </div>
            
            <div class="row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Student Strength of last Session <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_lastses_nostudent',
            'id'=>'assoc_lastses_nostudent',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_lastses_nostudent')));
            ?> <?php echo form_error('assoc_lastses_nostudent'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Last Session Placement % of Students </label>
                  <?php echo form_input(array(
            'name'=>'assoc_lastses_placement',
            'id'=>'assoc_lastses_placement',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_lastses_placement')));
            ?> <?php echo form_error('assoc_lastses_placement'); ?> </div>
             </div>
             <div class="row">
             	<div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label>Company location of placements <span class="note">(enter comma separated location name)</span> </label>
                  <?php echo form_input(array(
            'name'=>'assoc_placement_loc',
            'id'=>'assoc_placement_loc',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_placement_loc')));
            ?> <?php echo form_error('assoc_placement_loc'); ?> </div>
             </div>
             <div class="row">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Achievements </label>
                    <?php echo form_textarea(array(
				'name'  => 'assoc_achievements',
				'id'    => 'assoc_achievements',
				'class' => "form-control",
				'rows' => 3,
				'value' =>set_value('assoc_achievements','',false)));
				?> 
                   <?php echo form_error('assoc_achievements'); ?> </div>
                </div>
         	 <div class="row">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Co-curricular Activities </label>
                    <?php echo form_textarea(array(
				'name'  => 'assoc_cocuriactivity',
				'id'    => 'assoc_cocuriactivity',
				'class' => "form-control",
				'rows' => 3,
				'value' =>set_value('assoc_cocuriactivity','',false)));
				?> 
                   
                    <?php echo form_error('assoc_cocuriactivity'); ?> </div>
                </div>
             <div class="row">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Other Amenities/Infrastructure </label>
                    <?php echo form_textarea(array(
				'name'  => 'assoc_amenities',
				'id'    => 'assoc_amenities',
				'class' => "form-control",
				'rows' => 3,
				'value' =>set_value('assoc_amenities','',false)));
				?> 
                <?php echo form_error('assoc_amenities'); ?> </div>
                </div>
				  
				  
			  <?php }
			  if($assoc_category==5){ ?>
              <div class="row">
				 <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Name of Entity <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_instconame',
            'id'=>'assoc_instconame',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_instconame')));
            ?> <?php echo form_error('assoc_instconame'); ?> </div> 
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Total Staff  <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_noteacher',
            'id'=>'assoc_noteacher',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_noteacher',0)));
            ?> <?php echo form_error('assoc_noteacher'); ?> </div>
            </div>
             <?php }
			  
			  if($assoc_category==4){ ?>
               <div class="row">
           	<div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Name of the Institute <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_instconame',
            'id'=>'assoc_instconame',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_instconame')));
            ?> <?php echo form_error('assoc_instconame'); ?> </div>
            
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Established Year <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_establishyear',
            'id'=>'assoc_establishyear',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_establishyear')));
            ?> <?php echo form_error('assoc_establishyear'); ?> </div>
            
              </div>
             
              <?php }elseif($assoc_category==3){ ?>
               <div class="row">
				<div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label>Name of School <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_instconame',
            'id'=>'assoc_instconame',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_instconame')));
            ?> <?php echo form_error('assoc_instconame'); ?> </div>	 
            </div>
          
             
             
             
			 <?php  }?>
              <?php if($assoc_category==4){ ?>
              <div class="row">
           	<div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Construction Area <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_consarea',
            'id'=>'assoc_consarea',
            'type'=>'text',
			'placeholder'=>'in square meter',
            'class'=> "form-control",
            'value'=>set_value('assoc_consarea')));
            ?> <?php echo form_error('assoc_consarea'); ?> </div>
            <div class="form-group col-lg-6 col-sm-12 col-xs-12">
                  <label>How you provide class <span class="req">*</span></label>
               <select class="form-control" name="assoc_classmode">
                 <option value="">--Select--</option>
                <option value="Online" <?php echo set_select('assoc_classmode',"Online"); ?>>Online</option>
                <option value="Offline" <?php echo set_select('assoc_classmode',"Offline"); ?>>Offline</option>
                <option value="Both" <?php echo set_select('assoc_classmode',"Both"); ?>>Both</option>
              </select>
                <?php echo form_error('assoc_classmode'); ?> 
                  
                  </div>
            </div>
            <div class="row">
            	
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Student Strength in a Class <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_stustrength',
            'id'=>'assoc_stustrength',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_stustrength')));
            ?> <?php echo form_error('assoc_stustrength'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Last Year results in  % <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_lastsesresult',
            'id'=>'assoc_lastsesresult',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_lastsesresult')));
            ?> <?php echo form_error('assoc_lastsesresult'); ?> </div>
            
                  
            </div>
            <div class="row">
            	
            
            
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Google Rating in Link <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_googlerate',
            'id'=>'assoc_googlerate',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_googlerate')));
            ?> <?php echo form_error('assoc_googlerate'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Total Trainer/Faculty <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_noteacher',
            'id'=>'assoc_noteacher',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_noteacher')));
            ?> <?php echo form_error('assoc_noteacher'); ?> </div>
            </div>
            <div class="row ielts">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Best Score of Last Session <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_bestscorelastses',
            'id'=>'assoc_bestscorelastses',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_bestscorelastses')));
            ?> <?php echo form_error('assoc_bestscorelastses'); ?> </div>
            
            </div>
            
            <div class="row ielts">
              	<div class="col-md-12">
                	<div class="form-head1">Staff Score in Bands </div>
                </div>
              </div>
            <div class="row ielts">
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>5 to 6 <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_staffscore56',
            'id'=>'assoc_staffscore56',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_staffscore56',0)));
            ?> <?php echo form_error('assoc_staffscore56'); ?> </div>
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>6 to 7 <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_staffscore67',
            'id'=>'assoc_staffscore67',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_staffscore67',0)));
            ?> <?php echo form_error('assoc_staffscore67'); ?> </div>
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>7 to 8 <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_staffscore78',
            'id'=>'assoc_staffscore78',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_staffscore78',0)));
            ?> <?php echo form_error('assoc_staffscore78'); ?> </div>
            
            
            </div>
           	 <div class="row ielts">
              	<div class="col-md-12">
                	<div class="form-head1">Staff Qualification </div>
                </div>
              </div>
            <div class="row ielts">
            	<div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>12<sup>th</sup> <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_staffquali_twe',
            'id'=>'assoc_staffquali_twe',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_staffquali_twe',0)));
            ?> <?php echo form_error('assoc_staffquali_twe'); ?> </div>
            
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>Diploma <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_staffquali_diploma',
            'id'=>'assoc_staffquali_diploma',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_staffquali_diploma',0)));
            ?> <?php echo form_error('assoc_staffquali_diploma'); ?> </div>
            <div class="form-group col-md- col-sm-4 col-xs-12">
                  <label>Graduation <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_staffquali_graduation',
            'id'=>'assoc_staffquali_graduation',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_staffquali_graduation',0)));
            ?> <?php echo form_error('assoc_staffquali_graduation'); ?> </div>
            </div>
            <div class="row ielts">
            
            
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Masters <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_staffquali_masters',
            'id'=>'assoc_staffquali_masters',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_staffquali_masters',0)));
            ?> <?php echo form_error('assoc_staffquali_masters'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>PhD <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_staffquali_phd',
            'id'=>'assoc_staffquali_phd',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_staffquali_phd',0)));
            ?> <?php echo form_error('assoc_staffquali_phd'); ?> </div>
            
            </div>  
            <div class="row">
            	
            </div>
            <?php }elseif($assoc_category==3){ ?>
					<div class="row">
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Total Area in acres <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_totalarea',
            'id'=>'assoc_totalarea',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_totalarea')));
            ?> <?php echo form_error('assoc_totalarea'); ?> </div>
            
            
           	<div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Construction Area (in Sqm) <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_consarea',
            'id'=>'assoc_consarea',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_consarea')));
            ?> <?php echo form_error('assoc_consarea'); ?> </div>
            
           
            
           	
            
            </div>
            <div class="row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Affiliated Body <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_affibody',
            'id'=>'assoc_affibody',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_affibody')));
            ?> <?php echo form_error('assoc_affibody'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Education Rank <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_edurank',
            'id'=>'assoc_edurank',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_edurank')));
            ?> <?php echo form_error('assoc_edurank'); ?> </div>
            </div>	
            <div class="row">
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>Total Teaching Staff <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_noteacher',
            'id'=>'assoc_noteacher',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_noteacher')));
            ?> <?php echo form_error('assoc_noteacher'); ?> </div>
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>Last Session Result Percentage  <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_lastsesresult',
            'id'=>'assoc_lastsesresult',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_lastsesresult')));
            ?> <?php echo form_error('assoc_lastsesresult'); ?> </div>
            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                  <label>Last Session Topper No. of Student <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_lastsesnostudent',
            'id'=>'assoc_lastsesnostudent',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_lastsesnostudent')));
            ?> <?php echo form_error('assoc_lastsesnostudent'); ?> </div>
            
            </div>
            <div class="row">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Achievements </label>
                    <?php echo form_textarea(array(
				'name'  => 'assoc_achievements',
				'id'    => 'assoc_achievements',
				'class' => "form-control",
				'rows' => 3,
				'value' =>set_value('assoc_achievements','',false)));
				?> 
                   <?php echo form_error('assoc_achievements'); ?> </div>
                </div>
            <div class="row">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Co-curricular Activities </label>
                    <?php echo form_textarea(array(
				'name'  => 'assoc_cocuriactivity',
				'id'    => 'assoc_cocuriactivity',
				'class' => "form-control",
				'rows' => 3,
				'value' =>set_value('assoc_cocuriactivity','',false)));
				?> 
                   
                    <?php echo form_error('assoc_cocuriactivity'); ?> </div>
                </div>
                
				<?php }?>
           <div class="row">
              	<div class="col-md-12">
                	<div class="form-head1">Facilities </div>
                    </div></div>
            <div class="row">
            	<?php foreach($facilitydata as $facilityrow){ ?>
                	<div class="col-md-3 col-sm-12">
		<label class="checklabel"><?php  echo form_checkbox('assoc_facility[]',$facilityrow->facilitity_title,set_checkbox('assoc_facility[]',$facilityrow->facilitity_title)); ?> <?php echo $facilityrow->facilitity_title; ?></label>
						</div>
                 <?php } ?>
                
            </div>
            <div class="row">
            	<div class="col-md-12">
                &nbsp;
                </div>
            </div>
            <div class="row">
              	<div class="col-md-12">
                	<div class="form-head">Address </div>
                </div>
              </div>
              <div class="row">
           	<div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Address Line 1 <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_address_line1',
            'id'=>'assoc_address_line1',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_address_line1')));
            ?> <?php echo form_error('assoc_address_line1'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Address Line 2 </label>
                  <?php echo form_input(array(
            'name'=>'assoc_address_line2',
            'id'=>'assoc_address_line2',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_address_line2')));
            ?> <?php echo form_error('assoc_address_line2'); ?> </div>
            
              </div>
              <div class="row">
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Country <span class="req">*</span></label>
                  <select class="form-control assoc_address_country" name="assoc_address_country">
                    <option value="">--Select--</option>
                    <?php foreach($countrydata as $countryrow){ ?>
                    <option value="<?php echo $countryrow->country_name; ?>" <?php echo set_select('assoc_address_country',$countryrow->country_name); ?>><?php echo $countryrow->country_name; ?></option>
                    <?php } ?>
                  </select>
				  
				  <?php echo form_error('assoc_address_country'); ?> </div>
                  
                  
                  <div class="form-group col-md-6 col-sm-12 col-xs-12 perma_stateother">
                  <label>State/Province <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_address_state',
            'id'=>'assoc_address_state',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_address_state')));
            ?> <?php echo form_error('assoc_address_state'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12 perma_stateindia">
                  <label>State <span class="req">*</span></label>
                  <select class="form-control" name="assoc_address_state">
                   <option value="">--Select--</option>
                    <?php foreach($statedata as $staterow){ ?>
                    <option value="<?php echo $staterow->state_name; ?>" <?php echo set_select('assoc_address_state',$staterow->state_name); ?>><?php echo $staterow->state_name; ?></option>
                    <?php } ?>
                  </select>
				  <?php echo form_error('assoc_address_state'); ?> </div>
                  
           	</div>
            <div class="row">
           	<div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>City <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_address_city',
            'id'=>'assoc_address_city',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_address_city')));
            ?> <?php echo form_error('assoc_address_city'); ?> </div>
             <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Pincode <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_address_pin',
            'id'=>'assoc_address_pin',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_address_pin')));
            ?> <?php echo form_error('assoc_address_pin'); ?> </div>
            </div>  
            <div class="row">
           	<div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label>Landmark</label>
                  <?php echo form_input(array(
            'name'=>'assoc_address_landmark',
            'id'=>'assoc_address_landmark',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_address_landmark')));
            ?> <?php echo form_error('assoc_address_landmark'); ?> </div>
            
            </div>
            <div class="row">
              	<div class="col-md-12">
                	<div class="form-head">Contact Detail </div>
                </div>
              </div>
              <div class="row">
           	<div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Contact Person Name <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_contactname',
            'id'=>'assoc_contactname',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_contactname')));
            ?> <?php echo form_error('assoc_contactname'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Designation  <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_designation',
            'id'=>'assoc_designation',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_designation')));
            ?> <?php echo form_error('assoc_designation'); ?> </div>
            </div>
              <div class="row">
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Contact Number <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_contactno',
            'id'=>'assoc_contactno',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_contactno')));
            ?> <?php echo form_error('assoc_contactno'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Email Id <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_email',
            'id'=>'assoc_email',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_email')));
            ?> <?php echo form_error('assoc_email'); ?> </div>
            </div>
              
               <div class="row">
              	<div class="col-md-12">
                	<div class="form-head">Create Login </div>
                </div>
              </div>
				<div class="row">
           	<div class="form-group col-md-6 col-sm-12 col-xs-12">
      <label>Create Username <span class="note">(Min. 6-20 character)</span> <span class="req">*</span></label>
            <?php echo form_input(array(
            'name'=>'assoc_username',
            'id'=>'assoc_username',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_username')));
            ?> <?php echo form_error('assoc_username'); ?> </div>
            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label>Create Password  <span class="note">(Min. 6-20 character)</span> <span class="req">*</span></label>
                  <?php echo form_input(array(
            'name'=>'assoc_password',
            'id'=>'assoc_password',
            'type'=>'text',
            'class'=> "form-control",
            'value'=>set_value('assoc_password')));
            ?> <?php echo form_error('assoc_password'); ?> </div>
            </div>

             <div class="row">
                <div class="form-group col-md-3 col-sm-12 col-xs-12">
                  <button class="btn btn-primary btn-custom-create" type="submit" name="subreg">Submit</button></div>
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
	 <button class="back-to-top fa fa-chevron-up" ></button>
</div>

<script src="<?php echo base_url(); ?>assets/website/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/jquery.bootstrap-touchspin.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/waypoints-min.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/imagesloaded.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/masonry.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/filter.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/website/js/functions.js"></script>
<script> 
 CKEDITOR.replace('assoc_achievements'); 
 CKEDITOR.replace('assoc_cocuriactivity');
</script> 
<script type="text/javascript">
$(document).ready(function() {
toggleFields();
toggleFields1();
$(".assoc_address_country").change(function(){ toggleFields(); });
$(".assoc_subcat").change(function(){ toggleFields1(); });


});
function toggleFields(){
 if($(".assoc_address_country").val()=="India"){ 
	$('.perma_stateother').hide(); 
	$('.perma_stateindia').show(); 
 }else{
	$('.perma_stateother').show(); 
	$('.perma_stateindia').hide(); 
 }
}
 
function toggleFields1(){
 if($(".assoc_subcat").val()==8){ 
	$('.ielts').show(); 
 }else{
	$('.ielts').hide(); 
 }
}
</script>
</body>
</html>
