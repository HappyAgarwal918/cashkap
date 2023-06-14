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
        .headingStyle {
            background-color: #5D3076;
            text-align: center;
            color: white;
            font-size: 18px;
            font-weight: 700;
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
                        <h1 class="h3 mb-0 text-gray-800 mb-2 ">Add New College</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="inner-section">
                                <div>
                                    <h5 id="message" style="color: green;"></h5>
                                    <h5 id="email_message" style="color: red;"></h5>

                                </div>
                                <form id="addnewclg">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">College Name</label>
                                            <input type="text" class="form-control" name="clg_name" id="inputAddress" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" class="form-control" name="clg_addresh" id="inputAddress" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputcntry">college Country</label>
                                            <select id="inputcntry" name="clgcntry" class="form-control">
                                                <option>Select</option>
                                                <?php foreach ($CountryData as $row) {
                                                    echo '<option value="' . $row->country_code . '">' . $row->country_name . ' </option>';
                                                } ?>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputcode">country Code</label>
                                            <input name="clg_cuntry" type="text" readonly class="form-control" id="inputcode" placeholder="Code">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <button type="submit" id="submitAddclg" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("includes/footer.php"); ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
       
        $(document).ready(function() {
            $('#inputcntry').change(function() {
                let cntrycode = document.getElementById('inputcntry').value
                document.getElementById("inputcode").value = cntrycode;
            });
        });
        $(function() {
            $("#submitAddclg").click(function(e) {
                e.preventDefault();
                formData = $("#addnewclg").serialize();

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>master/abroad/add/colleges",
                    data: formData,
                    success: function(rec) {
                        if (rec == 200) {
                            document.getElementById("message").innerHTML = "Added Successfully *";
                            document.getElementById("addnewclg").style.display = "none";
                            document.getElementById("addimgform").style.display = "block";
                        } else {
                            document.getElementById("email_message").innerHTML = "error *";
                        }
                    }

                });
                return false; //stop the actual form post !important!

            });
        });
    </script>
    <?php include("includes/common-footer.php"); ?>
    <?php include("includes/style-footer.php"); ?>
    <script src="<?php echo base_url(); ?>assets/master/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/master/js/demo/datatables-demo.js"></script>
</body>

</html>