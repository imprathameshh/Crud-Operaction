<?php
include_once('../config.php');
$result = mysqli_query($conn, "SELECT * FROM send_msg");
?>
<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Cabana Messages Recived | Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('include/head.php'); ?>
    <style>
        .form {
            margin: 6% 0 0 20%;
            padding: 1%;
        }


        table {
            text-align: center;
        }
    </style>
</head>

<body data-sidebar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include('include/header.php'); ?>


        <!-- ========== Left Sidebar Start ========== -->
        <?php include('include/sidebar.php'); ?>

        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <?php
        if (mysqli_num_rows($result) > 0) {

        ?>

            <div class="form">
                <h2 style="text-align:center; margin:5px; padding:2px;">Messages Recived</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Copy</span></button>
                                        <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Excel</span></button>
                                        <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>PDF</span></button>
                                        <div class="btn-group">
                                            <button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="datatable-buttons" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100" style="text-align: center;">
                                <tr>
                                    <th>Sr no</th>
                                    <th>First Name</th>
                                    <th>Last Name:</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row["fname"]; ?></td>
                                        <td><?php echo $row["lname"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["subject"]; ?></td>
                                        <td><?php echo $row["message"]; ?></td>
                                        <td> <a class="text-danger" href="delete-message.php?id=<?php echo $row["id"]; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete">
                                                    <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                                                    <line x1="18" y1="9" x2="12" y2="15"></line>
                                                    <line x1="12" y1="9" x2="18" y2="15"></line>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>
    </div>

<?php
        } else {
            echo "No result found";
        }
?>


<!-- End Page-content -->


<?php include('include/footer.php'); ?>

<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<script src="assets/js/app.js"></script>


<?php include('include/script.php'); ?>

<!-- Bootstrap rating js -->
<script src="assets/libs/bootstrap-rating/bootstrap-rating.min.js"></script>

<script src="assets/js/pages/rating-init.js"></script>



</body>

</html>