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
                        <h1 class="h3 mb-0 text-gray-800 mb-2">college</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="inner-section">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="8%" valign="top" class="column-title">Sr.</th>
                                            <th width="30%">collage Name</th>
                                            <th>collage Address</th>
                                            <th>collage Country</th>
                                            <th>collage img</th>
                                            <th width="5%" valign="top" class="column-title">View</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        foreach ($clginfo as $instrow) {
                                            $id = $instrow->id;
                                        ?>
                                            <tr class="even pointer">
                                                <td><?php echo ++$count; ?></td>
                                                <td><?php echo $instrow->clg_name; ?></td>
                                                <td><?php echo $instrow->clg_addresh; ?></td>
                                                <td><?php echo $instrow->clg_cuntry; ?></td>
                                                <td><img src="<?php echo base_url();  ?>assets/website/images/clgImg/<?php echo $instrow->clg_img; ?>" alt="not available"><br> <a href="<?php echo site_url("master/abroad/Upload/page/$instrow->id"); ?>" class="">Change image</a></td>
                                                <td><a href="<?php echo site_url("master/abroad/colleges/details/$id"); ?>" class="">View Courses</a></td>
                                                <td><a href="<?php echo site_url("master/abroad/delete/college/$id"); ?>"><i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a></td>
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
    </div>
    <?php include("includes/common-footer.php"); ?>
    <?php include("includes/style-footer.php"); ?>
    <script src="<?php echo base_url(); ?>assets/master/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/master/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/master/js/demo/datatables-demo.js"></script>
</body>

</html>