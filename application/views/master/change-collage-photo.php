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
                        <h1 class="h3 mb-0 text-gray-800 mb-2 ">Add College image</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="inner-section">
                                <div>
                                    <h5 id="message" style="color: green;"></h5>
                                    <h5 id="error_message" style="color: red;"></h5>

                                </div>
                                <form id="addimgform">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="clgimg">Select Photo</label>s
                                            <input type="file" name="file" class="form-control-file" id="file">
                                            <input type="hidden" name="clgid" value="<?php echo $collegeid ?>" class="form-control-file" id="clgid">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <button type="submit" id="submitAddclg" class="btn btn-primary">Upload image</button>
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
       
        $(document).ready(function(e) {

            $('#addimgform').submit(function(e) {
                e.preventDefault();
                form = new FormData(this);
                var file_data = $('#file')[0].files;
                var clgid = document.getElementById('clgid').value
                form.append('file', file_data);
                form.append('clgid', clgid);
                $.ajax({
                    url: '<?php echo base_url(); ?>master/abroad/Upload/fileUpload',
                    type: "post",
                    data: form,clgid,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(rec) {
                        if (rec.error) {
                            $("#file").val(null);
                            document.getElementById('error_message').innerHTML = rec.error
                        }
                        if (rec == 200) {
                            $("#file").val(null);
                            document.getElementById('message').innerHTML = "Successfully Updated"
                        }
                    }
                });
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