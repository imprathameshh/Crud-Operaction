<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Cabana Feedback | Dashboard</title>
    <?php include('include/head.php'); ?>
    <style>
        .form {
            margin: -1%;
            padding: 0;
        }
    </style>

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

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
        require_once "../config.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];


            $sql = "INSERT INTO feedback (name, email, comment) VALUES ('$name','$email','$comment')";
        }
        ?>
        <!-- Fetch Image Start-->
        <?php
        include_once '../config.php';
        $result = mysqli_query($conn, "SELECT * FROM feedback");

        ?>
        <div class="main-content">
            <div class="form">




            </div>

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <h2 style="text-align:center; margin:5px; padding:2px;">Feedback</h2>

                        <div class="col-12">

                            <?php
                            if (mysqli_num_rows($result) > 0) {
                            ?>

                                <!-- </div> -->
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col md-10">
                                            <h4 class="card-title" style="text-align:center;">Comments Recived</h4>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body ">

                                    <!-- Button trigger modal -->


                                    <!-- Modal -->

                                    <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Comment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>

                                                    <td> <?php echo $row["name"]; ?></td>
                                                    <td> <?php echo $row["email"]; ?></td>
                                                    <td> <?php echo $row["comment"]; ?></td>

                                                    <td>
                                                        <a class="text-danger" href="delete-feedback.php?id=<?php echo $row["id"]; ?>">
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
                                            </tbody>
                                    </table>

                                <?php
                            } else {
                                echo "No result found";
                            }

                                ?>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->




                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->
            <?php include('include/footer.php'); ?>
            <?php include('include/script.php'); ?>

            <!-- App js -->
            <script src="assets/js/app.js"></script>

</body>

</html>