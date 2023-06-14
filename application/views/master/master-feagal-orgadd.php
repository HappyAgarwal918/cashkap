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
<link href="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <li class="breadcrumb-item"><a href="<?php echo site_url("master/media-gallery/manage");  ?>">Manage Images</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Original Picture</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Update Original Picture</h1>
        </div>
        
        <!-- Content Row -->
        
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="inner-section">
 <?php $attributes = array('class' => 'tender-form form-horizontal','method'=>'post','autocomplete'=>'off');
			 echo form_open_multipart("master/featured-gallery/add-image/$segment4",$attributes);
			 echo form_hidden('feagal_id',$feaimgdata->feagal_id);?>
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Picture <span class="req">*</span></label>
                    <?php echo form_input(array(
				'name'  => 'feagal_orgpic',
				'id'    => 'feagal_orgpic',
				'type'  => 'file',
				'class' => "form-control",
				'value' =>set_value('feagal_orgpic')));
				?> <?php echo form_error('feagal_orgpic'); ?> <span class="error1">
                    <?php if(isset($error)){ echo $error; } ?>
                    </span> </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12"> <?php echo form_button(array( 'name'=>'submit_galphoto','id'=> 'submit_galphoto','value'=> 'true','class'=>'btn btn-primary','type'=> 'submit','content' => 'Submit')); ?> </div>
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
<script src="<?php echo base_url(); ?>assets/master/vendor/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/master/js/demo/datatables-demo.js"></script> 
<script type="text/javascript">
		$(document).ready(function() {
			/*

			*   Examples - images

			*/

			$("a#example1").fancybox();
			$("a#example2").fancybox({
				'overlayShow'	: false,
				'trasitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});
			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});
			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});
			$("a#example5").fancybox();
			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});
			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});
			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});
			$("a[rel=example_group]").fancybox({

				'transitionIn'		: 'none',

				'transitionOut'		: 'none',

				'titlePosition' 	: 'over',

				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {

					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';

				}

			});



			/*

			*   Examples - various

			*/



			$("#various1").fancybox({

				'titlePosition'		: 'inside',

				'transitionIn'		: 'none',

				'transitionOut'		: 'none'

			});



			$("#various2").fancybox();



			$("#various3").fancybox({

				'width'				: '75%',

				'height'			: '75%',

				'autoScale'			: false,

				'transitionIn'		: 'none',

				'transitionOut'		: 'none',

				'type'				: 'iframe'

			});



			$("#various4").fancybox({

				'padding'			: 0,

				'autoScale'			: false,

				'transitionIn'		: 'none',

				'transitionOut'		: 'none'

			});

		});

	</script>
</body>
</html>
