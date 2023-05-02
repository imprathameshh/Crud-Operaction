<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Cabana | Gallery Dashboard</title>
    <?php include('include/head.php'); ?>
    <style>
        /* *{
            margin: 0;
            padding: 0;
        } */
        .form {
            margin: -2%;
        }

        .form-table {
            margin: 1% 0 5% 1%;
            padding: 1%;
        }

        .btn {
            color: darkgreen;
        }

        .image {
            display: inline-block;
            width: 100%;

        }

        table {
            text-align: center;
            border-bottom: 3px solid black;
        }

        .img {
            display: flex;
            justify-content: center;
        }

        .image-inline {
            display: inline-table;
            justify-content: center;

        }
    </style>
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <!-- <div id="layout-wrapper"> -->


    <?php include('include/header.php'); ?>


    <!-- ========== Left Sidebar Start ========== -->
    <?php include('include/sidebar.php'); ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <?php

    $id = $image = "";
    $id_err = $image_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["image"])) {
            $image_err = "Image Required";
        } else {
            $image = ($_POST["image"]);
        }
    }
    ?>

    <?php
    require_once "../config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/img/" . $_FILES["image"]["name"]);


        $image = $_FILES["image"]["name"];
        if ($image > 0) {



            $sql = "INSERT INTO gallery (image) VALUES ('$image')";


            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Data Submitted');</script>";
            } else {
                echo "Unsuccessful";
            }
        }
    }
    ?>
    <!-- Fetch Image Start-->
    <?php
    include_once '../config.php';
    $result = mysqli_query($conn, "SELECT * FROM gallery");

    ?>
    <div class="main-content">
        <div class="form">




        </div>

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <h2 style="text-align:center; margin:5px; padding:2px;">Gallery</h2>

                    <div class="col-12">

                        <!-- <div class="page-title-box d-sm-flex align-items-center justify-content-between"> -->

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
                                        <h4 class="card-title">Gallery Images</h4>
                                    </div>
                                    <div class="col md-2" style="display:flex; justify-content:right;">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding: 5px; background-color: darkgreen; color:white;">
                                            Add Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">

                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Image To Gallery</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="ui-images.php" method="POST" enctype="multipart/form-data">

                                                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control" id="inputGroupFile02" name="image">

                                                    </div>


                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="mb-3">
                                                    <input type="submit" value="Upload" name="submit" class="btn btn-outline-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">No.</th>
                                            <th style="width: 10%;">Image</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                        <tbody>
                                            <tr>
                                                <td style="width: 25%;"><?php echo $i++; ?></td>

                                                <td style="width: 25%;"> <img src="../admin/img/<?php echo $row["image"]; ?>" height="5%" width="50%"><br>
                                                </td>
                                                <td style="width: 25%;">
                                                        <a href="update-image.php?id=<?php echo $row["id"]; ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                            </svg>
                                                        </a>

                                                        <a class="text-danger" href="delete-image.php?id=<?php echo $row["id"]; ?>">
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




            <!-- Fetch Image End-->

            <!-- End Page-content -->


            <?php include('include/footer.php'); ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <?php include('include/script.php'); ?>


    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>