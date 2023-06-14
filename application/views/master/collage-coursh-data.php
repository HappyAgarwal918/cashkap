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
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include("includes/sidebar.php"); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("includes/top-nav.php"); ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800 mb-2">Collage Courses</h1>
                    </div>
                    <div class="form-row pb-4">
                        <div class="col-md-4 ">
                            <button type="submit" id="addcourshForm" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                Add Coursh</button>
                        </div>
                    </div>
                    <div>
                        <h5 id="message" style="color: green;"></h5>
                        <h5 id="email_message" style="color: red;"></h5>
                    </div>
                    <form id="addnewcoursh" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputAddress">Coursh Name</label>
                                <input type="text" class="form-control" name="coursh" id="inputAddress" placeholder="Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputAddress">Application Fee</label>
                                <input type="text" class="form-control" name="applicationfee" id="inputAddress" placeholder="Application Fee">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputcode">Tuetion Fee </label>
                                <input name="tutionfee" type="text" class="form-control" id="inputcode" placeholder="Tuetion Fee">
                            </div>
                            <div class="form-group col-md-3">
                                <input name="cllgid" type="hidden" class="form-control" value="<?php echo $clgid; ?>">
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="form-group col-md-8 text-center">
                                <button type="submit" id="submitAddcoursh" class="btn btn-primary">Add Course</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="inner-section">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="8%" valign="top" class="column-title">Sr.</th>
                                            <th width="30%">coursh Name</th>
                                            <th>collage Tution Fee</th>
                                            <th>collage Application Fee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        foreach ($clgcourshinfo as $instrow) {
                                            $id = $instrow->id;
                                        ?>
                                            <tr class="even pointer">
                                                <td><?php echo ++$count; ?></td>
                                                <td><?php echo $instrow->coursh; ?></td>
                                                <td><?php echo $instrow->tutionfee; ?></td>
                                                <td><?php echo $instrow->applicationfee; ?></td>
                                            </tr>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("includes/footer.php"); ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#addcourshForm').click(function() {
                    document.getElementById("addnewcoursh").style.display = "block";
                });
            });


            $(function() {
                $("#submitAddcoursh").click(function(e) {
                    e.preventDefault();
                    formData = $("#addnewcoursh").serialize();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>master/abroad/add/coursh",
                        data: formData,
                        success: function(rec) {
                            if (rec == 200) {
                                document.getElementById("message").innerHTML = "Added Successfully *";
                                location.reload();
                            } else {
                                document.getElementById("email_message").innerHTML = "error *";
                            }
                        }

                    });
                    return false; //stop the actual form post !important!

                });
            });
        </script>
    </div>
    <?php include("includes/common-footer.php"); ?>
    <?php include("includes/style-footer.php"); ?>
    <script src="<?php echo base_url(); ?>assets/master/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/master/js/demo/datatables-demo.js"></script>
</body>

</html>