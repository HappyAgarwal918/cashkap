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
            <li class="breadcrumb-item active" aria-current="page">View Associate</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0 text-gray-800 mb-2">View Associate</h1>
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
                  <p><a href="<?php echo site_url("master/associate/edit/$segment4"); ?>"><i class="fas fa-pencil-alt"></i> Edit Associate Profile</a></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr>
                      <td width="32%">Approval Status</td>
                      <td width="68%"><?php $assoc_status=$assocdata->assoc_status;

						if($assoc_status==1){ echo "Active"; }elseif($assoc_status==0){ echo "Inactive"; }elseif($assoc_status==2){ echo "Suspend"; }

					 ?></td>
                    </tr>
                    <tr>
                      <td>Page URL</td>
                      <td><?php echo $assocdata->assoc_slug; ?></td>
                    </tr>
                    <tr>
                      <td>Discount Precent</td>
                      <td><?php echo $assocdata->assoc_discount; ?></td>
                    </tr>
                  </table>
                  <?php if($assocdata->assoc_category==1 || $assocdata->assoc_category==2){ ?>
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr class="trheadpro1">
                      <td colspan="2">General Information</td>
                    </tr>
                    <tr>
                      <td width="32%">Registration Type</td>
                      <td width="68%"><?php echo $assocdata->assoccat_title; ?></td>
                    </tr>
                    <tr>
                      <td>Name of College/University</td>
                      <td><?php echo $assocdata->assoc_instconame; ?></td>
                    </tr>
                    <tr>
                      <td>Total Area in acres</td>
                      <td><?php echo $assocdata->assoc_totalarea; ?></td>
                    </tr>
                    <tr>
                      <td>Construction Area (in Sqm)</td>
                      <td><?php echo $assocdata->assoc_consarea; ?></td>
                    </tr>
                    <tr>
                      <td>Affiliated To</td>
                      <td><?php echo $assocdata->assoc_affibody; ?></td>
                    </tr>
                    <tr>
                      <td>Google Rank</td>
                      <td><?php echo $assocdata->assoc_edurank; ?></td>
                    </tr>
                    <tr>
                      <td>Total Teaching Staff (Graduate)</td>
                      <td><?php echo $assocdata->assoc_noteacher_graduate; ?></td>
                    </tr>
                    <tr>
                      <td>Total Teaching Staff (Master's)</td>
                      <td><?php echo $assocdata->assoc_noteacher_masters; ?></td>
                    </tr>
                    <tr>
                      <td>Total Teaching Staff (PhD)</td>
                      <td><?php echo $assocdata->assoc_noteacher_phd; ?></td>
                    </tr>
                     <tr>
            <td>Total Staff</td>
            <td><?php echo $assocdata->assoc_noteacher; ?></td>
          </tr>
                    <tr>
                      <td>Student Strength of last Session</td>
                      <td><?php echo $assocdata->assoc_lastses_nostudent; ?></td>
                    </tr>
                     <tr>
            <td>Last Session Result Percentage</td>
            <td><?php echo $assocdata->assoc_lastsesresult; ?></td>
          </tr>
                    <tr>
                      <td>Last Session Placement % of Students</td>
                      <td><?php echo $assocdata->assoc_lastses_placement; ?></td>
                    </tr>
                    <tr>
                      <td>Company location of placements</td>
                      <td><?php echo $assocdata->assoc_placement_loc; ?></td>
                    </tr>
                    <tr class="trheadpro1">
                      <td colspan="2">Facilities</td>
                    </tr>
                    <tr>
                      <td>Facilities</td>
                      <td><?php echo $assocdata->assoc_facility; ?></td>
                    </tr>
                    <tr class="trheadpro">
                      <td colspan="2">Address</td>
                    </tr>
                    <tr>
                      <td>Street Address</td>
                      <td><?php echo $assocdata->assoc_address_line1; if($assocdata->assoc_address_line2!=""){ echo ", ".$assocdata->assoc_address_line2; } ?></td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td><?php echo $assocdata->assoc_address_city;  ?></td>
                    </tr>
                    <tr>
                      <td>State</td>
                      <td><?php echo $assocdata->assoc_address_state;  ?></td>
                    </tr>
                    <tr>
                      <td>Country</td>
                      <td><?php echo $assocdata->country_name;  ?></td>
                    </tr>
                    <tr>
                      <td>Landmark</td>
                      <td><?php echo $assocdata->assoc_address_landmark;  ?></td>
                    </tr>
                    <tr class="trheadpro">
                      <td colspan="2">Contact Detail</td>
                    </tr>
                    <tr>
                      <td>Contact Person Name</td>
                      <td><?php echo $assocdata->assoc_contactname;  ?></td>
                    </tr>
                    <tr>
                      <td>Designation</td>
                      <td><?php echo $assocdata->assoc_designation;  ?></td>
                    </tr>
                    <tr>
                      <td>Contact Number</td>
                      <td><?php echo $assocdata->assoc_contactno;  ?></td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td><?php echo $assocdata->assoc_email;  ?></td>
                    </tr>
                  </table>
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr class="trheadpro">
                      <td colspan="2">Other Information</td>
                    </tr>
                    <tr>
                      <td width="32%">Achievements</td>
                      <td width="68%"><?php echo $assocdata->assoc_achievements; ?></td>
                    </tr>
                    <tr>
                      <td>Co-curricular Activities</td>
                      <td><?php echo $assocdata->assoc_cocuriactivity; ?></td>
                    </tr>
                    <tr>
                      <td> Other Amenities/Infrastructure</td>
                      <td><?php echo $assocdata->assoc_amenities; ?></td>
                    </tr>
                  </table>
                  <?php }elseif($assocdata->assoc_category==3){ ?>
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr class="trheadpro1">
                      <td colspan="2">General Information</td>
                    </tr>
                    <tr>
                      <td width="32%">Registration Type</td>
                      <td width="68%"><?php echo $assocdata->assoccat_title; ?></td>
                    </tr>
                    <?php if($subcatrow){ ?>
                    <tr>
                      <td width="32%">School Type</td>
                      <td width="68%"><?php echo $subcatrow->assoccat_title; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td>Total Area in acres</td>
                      <td><?php echo $assocdata->assoc_totalarea; ?></td>
                    </tr>
                    <tr>
                      <td>Construction Area (in Sqm)</td>
                      <td><?php echo $assocdata->assoc_consarea; ?></td>
                    </tr>
                    <tr>
                      <td>Affiliated Body</td>
                      <td><?php echo $assocdata->assoc_affibody; ?></td>
                    </tr>
                    <tr>
                      <td>Education Rank</td>
                      <td><?php echo $assocdata->assoc_edurank; ?></td>
                    </tr>
                    <tr>
                      <td>Total Teaching Staff</td>
                      <td><?php echo $assocdata->assoc_noteacher; ?></td>
                    </tr>
                    <tr>
                      <td>Last Session Result Percentage </td>
                      <td><?php echo $assocdata->assoc_lastsesresult; ?></td>
                    </tr>
                    <tr>
                      <td>Last Session Topper No. of Student</td>
                      <td><?php echo $assocdata->assoc_lastsesnostudent; ?></td>
                    </tr>
                    <tr class="trheadpro1">
                      <td colspan="2">Facilities</td>
                    </tr>
                    <tr>
                      <td>Facilities</td>
                      <td><?php echo $assocdata->assoc_facility; ?></td>
                    </tr>
                    <tr class="trheadpro">
                      <td colspan="2">Address</td>
                    </tr>
                    <tr>
                      <td>Street Address</td>
                      <td><?php echo $assocdata->assoc_address_line1; if($assocdata->assoc_address_line2!=""){ echo ", ".$assocdata->assoc_address_line2; } ?></td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td><?php echo $assocdata->assoc_address_city;  ?></td>
                    </tr>
                    <tr>
                      <td>State</td>
                      <td><?php echo $assocdata->assoc_address_state;  ?></td>
                    </tr>
                    <tr>
                      <td>Country</td>
                      <td><?php echo $assocdata->country_name;  ?></td>
                    </tr>
                    <tr>
                      <td>Landmark</td>
                      <td><?php echo $assocdata->assoc_address_landmark;  ?></td>
                    </tr>
                    <tr class="trheadpro">
                      <td colspan="2">Contact Detail</td>
                    </tr>
                    <tr>
                      <td>Contact Person Name</td>
                      <td><?php echo $assocdata->assoc_contactname;  ?></td>
                    </tr>
                    <tr>
                      <td>Designation</td>
                      <td><?php echo $assocdata->assoc_designation;  ?></td>
                    </tr>
                    <tr>
                      <td>Contact Number</td>
                      <td><?php echo $assocdata->assoc_contactno;  ?></td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td><?php echo $assocdata->assoc_email;  ?></td>
                    </tr>
                  </table>
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr class="trheadpro">
                      <td colspan="2">Other Information</td>
                    </tr>
                    <tr>
                      <td width="32%">Achievements</td>
                      <td width="68%"><?php echo $assocdata->assoc_achievements; ?></td>
                    </tr>
                    <tr>
                      <td>Co-curricular Activities</td>
                      <td><?php echo $assocdata->assoc_cocuriactivity; ?></td>
                    </tr>
                  </table>
                  <?php }elseif($assocdata->assoc_category==4){ ?>
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr class="trheadpro1">
                      <td colspan="2">General Information</td>
                    </tr>
                    <tr>
                      <td width="32%">Registration Type</td>
                      <td width="68%"><?php echo $assocdata->assoccat_title; ?></td>
                    </tr>
                    <?php if($subcatrow){ ?>
                    <tr>
                      <td width="32%">Sub Category</td>
                      <td width="68%"><?php echo $subcatrow->assoccat_title; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td>Name of the Institute</td>
                      <td><?php echo $assocdata->assoc_instconame; ?></td>
                    </tr>
                    <tr>
                      <td>Established Year</td>
                      <td><?php echo $assocdata->assoc_establishyear; ?></td>
                    </tr>
                    <tr>
                      <td>Construction Area (in Sqm)</td>
                      <td><?php echo $assocdata->assoc_consarea; ?></td>
                    </tr>
                    <tr>
                      <td>How you provide class</td>
                      <td><?php echo $assocdata->assoc_classmode; ?></td>
                    </tr>
                    <tr>
                      <td>Student strength in a class</td>
                      <td><?php echo $assocdata->assoc_stustrength; ?></td>
                    </tr>
                    <tr>
                      <td>Last Year results in % </td>
                      <td><?php echo $assocdata->assoc_lastsesresult; ?></td>
                    </tr>
                    <tr>
                      <td>Google Rating in Link</td>
                      <td><?php echo $assocdata->assoc_googlerate; ?></td>
                    </tr>
                    <tr>
                      <td>Google Rating in Link</td>
                      <td><?php echo $assocdata->assoc_googlerate; ?></td>
                    </tr>
                    <tr>
                      <td>Total Trainer/Faculty</td>
                      <td><?php echo $assocdata->assoc_noteacher; ?></td>
                    </tr>
                    <tr class="trheadpro1">
                      <td colspan="2">Staff Score in Bands</td>
                    </tr>
                    <tr>
                      <td>5 to 6</td>
                      <td><?php echo $assocdata->assoc_staffscore56; ?></td>
                    </tr>
                    <tr>
                      <td>6 to 7</td>
                      <td><?php echo $assocdata->assoc_staffscore67; ?></td>
                    </tr>
                    <tr>
                      <td>7 to 8</td>
                      <td><?php echo $assocdata->assoc_staffscore78; ?></td>
                    </tr>
                    <tr class="trheadpro1">
                      <td colspan="2">Staff Qualification</td>
                    </tr>
                    <tr>
                      <td>12<sup>th</sup></td>
                      <td><?php echo $assocdata->assoc_staffquali_twe; ?></td>
                    </tr>
                    <tr>
                      <td>Diploma</td>
                      <td><?php echo $assocdata->assoc_staffquali_diploma; ?></td>
                    </tr>
                    <tr>
                      <td>Graduation</td>
                      <td><?php echo $assocdata->assoc_noteacher_graduate; ?></td>
                    </tr>
                    <tr>
                      <td>Masters</td>
                      <td><?php echo $assocdata->assoc_noteacher_masters; ?></td>
                    </tr>
                    <tr>
                      <td>PhD</td>
                      <td><?php echo $assocdata->assoc_noteacher_phd; ?></td>
                    </tr>
                    <tr class="trheadpro1">
                      <td colspan="2">Facilities</td>
                    </tr>
                    <tr>
                      <td>Facilities</td>
                      <td><?php echo $assocdata->assoc_facility; ?></td>
                    </tr>
                    <tr class="trheadpro">
                      <td colspan="2">Address</td>
                    </tr>
                    <tr>
                      <td>Street Address</td>
                      <td><?php echo $assocdata->assoc_address_line1; if($assocdata->assoc_address_line2!=""){ echo ", ".$assocdata->assoc_address_line2; } ?></td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td><?php echo $assocdata->assoc_address_city;  ?></td>
                    </tr>
                    <tr>
                      <td>State</td>
                      <td><?php echo $assocdata->assoc_address_state;  ?></td>
                    </tr>
                    <tr>
                      <td>Country</td>
                      <td><?php echo $assocdata->country_name;  ?></td>
                    </tr>
                    <tr>
                      <td>Landmark</td>
                      <td><?php echo $assocdata->assoc_address_landmark;  ?></td>
                    </tr>
                    <tr class="trheadpro">
                      <td colspan="2">Contact Detail</td>
                    </tr>
                    <tr>
                      <td>Contact Person Name</td>
                      <td><?php echo $assocdata->assoc_contactname;  ?></td>
                    </tr>
                    <tr>
                      <td>Designation</td>
                      <td><?php echo $assocdata->assoc_designation;  ?></td>
                    </tr>
                    <tr>
                      <td>Contact Number</td>
                      <td><?php echo $assocdata->assoc_contactno;  ?></td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td><?php echo $assocdata->assoc_email;  ?></td>
                    </tr>
                  </table>
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr class="trheadpro">
                      <td colspan="2">Other Information</td>
                    </tr>
                    <tr>
                      <td width="32%">Achievements</td>
                      <td width="68%"><?php echo $assocdata->assoc_achievements; ?></td>
                    </tr>
                    <tr>
                      <td width="32%">Co-curricular Activities</td>
                      <td width="68%"><?php echo $assocdata->assoc_cocuriactivity; ?></td>
                    </tr>
                  </table>
                  <?php }elseif($assocdata->assoc_category==5){ ?>
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr>
                      <td width="32%">Registration Type</td>
                      <td width="68%"><?php echo $assocdata->assoccat_title; ?></td>
                    </tr>
                    <tr>
                      <td>Name of the Institute</td>
                      <td><?php echo $assocdata->assoc_instconame; ?></td>
                    </tr>
                    <tr>
                      <td>Total Staff</td>
                      <td><?php echo $assocdata->assoc_noteacher; ?></td>
                    </tr>
                    <tr>
                      <td>Facilities</td>
                      <td><?php echo $assocdata->assoc_facility; ?></td>
                    </tr>
                    <tr class="trheadpro">
                      <td colspan="2">Address</td>
                    </tr>
                    <tr>
                      <td>Street Address</td>
                      <td><?php echo $assocdata->assoc_address_line1; if($assocdata->assoc_address_line2!=""){ echo ", ".$assocdata->assoc_address_line2; } ?></td>
                    </tr>
                    <tr>
                      <td>City</td>
                      <td><?php echo $assocdata->assoc_address_city;  ?></td>
                    </tr>
                    <tr>
                      <td>State</td>
                      <td><?php echo $assocdata->assoc_address_state;  ?></td>
                    </tr>
                    <tr>
                      <td>Country</td>
                      <td><?php echo $assocdata->country_name;  ?></td>
                    </tr>
                    <tr>
                      <td>Landmark</td>
                      <td><?php echo $assocdata->assoc_address_landmark;  ?></td>
                    </tr>
                    <tr class="trheadpro">
                      <td colspan="2">Contact Detail</td>
                    </tr>
                    <tr>
                      <td>Contact Person Name</td>
                      <td><?php echo $assocdata->assoc_contactname;  ?></td>
                    </tr>
                    <tr>
                      <td>Designation</td>
                      <td><?php echo $assocdata->assoc_designation;  ?></td>
                    </tr>
                    <tr>
                      <td>Contact Number</td>
                      <td><?php echo $assocdata->assoc_contactno;  ?></td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td><?php echo $assocdata->assoc_email;  ?></td>
                    </tr>
                  </table>
                  <table  style="width:100%" class="table table-bordered table-striped">
                    <tr>
                      <td width="32%">Achievements</td>
                      <td width="68%"><?php echo $assocdata->assoc_achievements; ?></td>
                    </tr>
                    <tr>
                      <td>Co-curricular Activities</td>
                      <td><?php echo $assocdata->assoc_cocuriactivity; ?></td>
                    </tr>
                  </table>
                  <?php } ?>
                  <table  style="width:100%" class="table table-bordered table-striped">
                  	<tr class="trheadpro">
                      <td colspan="2">Social Pages</td>
                    </tr>
                     <tr>
                      <td width="32%">Facebook</td>
                      <td width="68%"><?php echo $assocdata->assoc_social_facebook; ?></td>
                    </tr>
                    <tr>
                      <td width="32%">Instagram</td>
                      <td width="68%"><?php echo $assocdata->assoc_social_instagram; ?></td>
                    </tr>
                    <tr>
                      <td width="32%">Twitter</td>
                      <td width="68%"><?php echo $assocdata->assoc_social_twitter; ?></td>
                    </tr>
                      <tr>
                      <td width="32%">Website</td>
                      <td width="68%"><?php echo $assocdata->assoc_social_website; ?></td>
                    </tr>
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
