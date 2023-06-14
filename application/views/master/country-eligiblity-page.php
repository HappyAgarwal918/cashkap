<?php
defined('BASEPATH') or exit('No direct script access allowed');
$segment4 = $this->uri->segment(4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php if (isset($siteTitle)) {
            echo $siteTitle;
        } ?>
    </title>
    <?php include("includes/style-header.php"); ?>
    <link href="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .col-sm-12 {
            overflow: auto;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include("includes/sidebar.php"); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("includes/top-nav.php"); ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800 mb-2">Country Eligiblity</h1>
                    </div>
                    <?php if ($this->session->flashdata('feedback') && $this->session->flashdata('feedbackerr')) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert <?php echo $this->session->flashdata('feedbackerr'); ?>  alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $this->session->flashdata('feedback'); ?></div>
                            </div>
                        </div>
                    <?php  } ?>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="inner-section">
                                <div>
                                    <h5 id="message" style="color: green;"></h5>
                                    <h5 id="email_message" style="color: red;"></h5>
                                </div>
                                <div class="form-row pb-4">
                                    <div class="col-md-4 ">
                                        <button type="submit" id="addcuntryForm" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                            Add New Country</button>
                                    </div>
                                </div>
                                <form id="addnewCNTRY" class="mb-3 " style="display: none;">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputcntry1">Country</label>
                                            <select id="inputcntry1" name="cntry_name" class="form-control">
                                                <option>Select</option>
                                                <?php foreach ($CountryData as $row) {
                                                    echo '<option cntrycode ="'. $row->country_code .'" value="' . $row->country_name . '">' . $row->country_name . ' </option>';
                                                } ?>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputcode1">Country Code</label>
                                            <input name="cntry_code" type="text" readonly class="form-control" id="inputcode1" placeholder="Code">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">IELTS required</label>
                                            <select name="ielts_requ" id="inputState" class="form-control">
                                                <option selected>yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Twelth per %</label>
                                            <input type="text" class="form-control" name="twelth_per" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Twelth gap acceptable</label>
                                            <input type="text" class="form-control" name="twelth_gap_acceptable" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Twelth Ielts requirment</label>
                                            <input type="text" class="form-control" name="twelth_Ielts_requirment" id="inputAddress">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Twelth funds </label>
                                            <input type="text" class="form-control" name="twelth_funds" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Graduation per %</label>
                                            <input type="text" class="form-control" name="graduation_per" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Graduation gap acceptable</label>
                                            <input type="text" class="form-control" name="graduation_gap_acceptable" id="inputAddress">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Graduation Ielts requirment</label>
                                            <input type="text" class="form-control" name="graduation_Ielts_requirment" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Graduation funds </label>
                                            <input type="text" class="form-control" name="graduation_funds" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Masters percentage</label>
                                            <input type="text" class="form-control" name="masters_percentage" id="inputAddress">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Masters gap acceptable</label>
                                            <input type="text" class="form-control" name="masters_gap_acceptable" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Masters Ielts requirment </label>
                                            <input type="text" class="form-control" name="masters_Ielts_requirment" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Masters funds </label>
                                            <input type="text" class="form-control" name="masters_funds" id="inputAddress">
                                        </div>


                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Spouse qualification</label>
                                            <input type="text" class="form-control" name="spouse_qualification" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Spouse percentage</label>
                                            <input type="text" class="form-control" name="spouse_percentage" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Spouse gap acceptable </label>
                                            <input type="text" class="form-control" name="spouse_gap_acceptable" id="inputAddress">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Spouse age</label>
                                            <input type="text" class="form-control" name="spouse_age" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Spouse marrige time period</label>
                                            <input type="text" class="form-control" name="spouse_marrige_time_period" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Spouse Ielts requirment </label>
                                            <input type="text" class="form-control" name="spouse_Ielts_requirment" id="inputAddress">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Spouse funds</label>
                                            <input type="text" class="form-control" name="spouse_funds" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Spouse intakes</label>
                                            <input type="text" class="form-control" name="spouse_intakes" id="inputAddress">
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <button type="submit" id="submitAddcntry" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th valign="top" class="column-title">Sr.</th>
                                            <th> country</th>
                                            <th>code</th>
                                            <th>ielts req</th>
                                            <th>12th %</th>
                                            <th>12th gap</th>
                                            <th>12th ielts req</th>
                                            <th>12th funds</th>
                                            <th>Desired Country</th>
                                            <th>graduation %</th>
                                            <th>graduation gap</th>
                                            <th>graduation funds</th>
                                            <th>masters %</th>
                                            <th>masters gap</th>
                                            <th>masters ielts req</th>
                                            <th>masters funds</th>
                                            <th>spouse qualifi</th>
                                            <th>spouse %</th>
                                            <th>spouse gap</th>
                                            <th>spouse age</th>
                                            <th>spouse marrige</th>
                                            <th>spouse ielts req</th>
                                            <th>spouse funds</th>
                                            <th>intakes</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        foreach ($eligiblity as $instrow) {
                                            $id = $instrow->id;
                                        ?>
                                            <tr class="even pointer">
                                                <td><?php echo ++$count; ?></td>
                                                <td><?php echo $instrow->cntry_name; ?></td>
                                                <td><?php echo $instrow->cntry_code; ?></td>
                                                <td><?php echo $instrow->ielts_requ; ?></td>
                                                <td><?php echo $instrow->twelth_per; ?></td>
                                                <td><?php echo $instrow->twelth_gap_acceptable; ?></td>
                                                <td><?php echo $instrow->twelth_Ielts_requirment; ?></td>
                                                <td><?php echo $instrow->twelth_funds; ?></td>
                                                <td><?php echo $instrow->graduation_per; ?></td>
                                                <td><?php echo $instrow->graduation_gap_acceptable; ?></td>
                                                <td><?php echo $instrow->graduation_Ielts_requirment; ?></td>
                                                <td><?php echo $instrow->graduation_funds; ?></td>
                                                <td><?php echo $instrow->masters_percentage; ?></td>
                                                <td><?php echo $instrow->masters_gap_acceptable; ?></td>
                                                <td><?php echo $instrow->masters_Ielts_requirment; ?></td>
                                                <td><?php echo $instrow->masters_funds; ?></td>
                                                <td><?php echo $instrow->spouse_qualification; ?></td>
                                                <td><?php echo $instrow->spouse_percentage; ?></td>
                                                <td><?php echo $instrow->spouse_gap_acceptable; ?></td>
                                                <td><?php echo $instrow->spouse_age; ?></td>
                                                <td><?php echo $instrow->spouse_marrige_time_period; ?></td>
                                                <td><?php echo $instrow->spouse_Ielts_requirment; ?></td>
                                                <td><?php echo $instrow->spouse_funds; ?></td>
                                                <td><?php echo $instrow->spouse_intakes; ?></td>
                                                <td><a href="<?php echo site_url("master/abroad/delete/countryeligiblity/$id"); ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                            </tr>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#inputcntry1').change(function() {
                       var cntrycode = $(this).find('option:selected').attr("cntrycode");
                        document.getElementById("inputcode1").value = cntrycode;
                    });
                });
                $(document).ready(function() {
                    $('#addcuntryForm').click(function() {
                        // location.reload();
                        document.getElementById("addnewCNTRY").style.display = "block";
                    });
                });
                $(function() {
                    $("#submitAddcntry").click(function(e) {
                        e.preventDefault();
                        formData = $("#addnewCNTRY").serialize();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>master/abroad/add/newcntry",
                            data: formData,
                            success: function(rec) {
                                if (rec == 200) {
                                    document.getElementById("message").innerHTML = "Added Successfully *";
                                    document.getElementById("addnewCNTRY").style.display = "none";
                                    const form = document.getElementById('addnewCNTRY');
                                    form.reset();
                                } else {
                                    document.getElementById("email_message").innerHTML = "error *";
                                }
                            }

                        });
                        return false; //stop the actual form post !important!

                    });
                });
            </script>
            <?php include("includes/footer.php"); ?>
        </div>
    </div>
    <?php include("includes/common-footer.php"); ?>
    <?php include("includes/style-footer.php"); ?>
    <script src="<?php echo base_url(); ?>assets/master/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/master/js/demo/datatables-demo.js"></script>
</body>

</html>