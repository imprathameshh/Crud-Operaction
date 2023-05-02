<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cabana About Us | Dashboard</title>
    <?php include("include/head.php"); ?>
    <style>
        .form {
            margin-top: 10%;
        }
    </style>
</head>
<?php
include("../config.php");
error_reporting(0);
$id = $_GET['id'];
$record = mysqli_query($conn, "SELECT * FROM banner WHERE id='$id'");
$row = mysqli_fetch_array($record);
$oldimg = $row["image"];
?>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include("include/header.php"); ?>
        <?php include("include/sidebar.php"); ?>


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="form">
                <h3 class="text-center m-2">Banner</h3>

                <!-- <nav aria-label="breadcrumb"> -->
  <ol class="breadcrumb">
    <li class="breadcrumb-text" ><a style="text-decoration: none; color:black;" href="index.php">Home/</a></li>
    <li class="breadcrumb-text active" aria-current="page">Banner</li>
  </ol>
<!-- </nav> -->

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Banner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <p><b>Image:</b></p>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image" aria-label="Upload">
                                        </div>

                                        <div class="row mb-3">
                                            <label for="inputText3" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="inputGroupFile02" name="title">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea id="editor" class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                        </div>


                                    </div>
                                    <input type="submit" value="Upload" name="submit" class="btn btn-outline-success">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col md-2" style="display:flex; justify-content:right;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding: 5px; background-color: darkgreen; color:white;">
                            Create New Banner
                        </button>
                    </div><br>


                </div>
                <?php
                include("../config.php");
                error_reporting(0);
                $result = mysqli_query($conn, "SELECT * FROM banner");
                ?>

                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <div class="row" style="margin-bottom: 10%;">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title" style="text-align: center;">Banner Details</h4><br>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" style="text-align: center;  margin-bottom: 5%;">

                                        <thead>
                                            <tr style="max-width: 300px;">
                                                <th>No.</th>
                                                <th style="max-width: auto;">Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>


                                                <tr>
                                                    <td><?php echo $i++; ?></td>

                                                    <td> <img src="../admin/img/<?php echo $row["image"]; ?>" height="200px" width="200px"><br>
                                                    </td>
                                                    <td>
                                                        <div class="pretty p-switch p-fill">
                                                            <input type="checkbox" class="checkbox" id="input-switch2" onclick="status_category(2)" checked="">
                                                            <div class="state p-success">
                                                                <label for="input-switch2"></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
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



            <?php include("include/footer.php"); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->


    <?php include("include/script.php"); ?>
    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            var note = document.querySelector('#editor')

            CKEDITOR.replace(editor);
        });
    </script>






</body>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/img/" . $_FILES["image"]["name"]);

    $image = $_FILES["image"]["name"];
    $title = $_POST["title"];
    $description = $_POST["description"];



    if (strlen($image) > 0) {
        $oldimg = $image;
    }

    $sql =  "INSERT INTO banner ( image,title,description) VALUES ('$image','$title','$description')";

    $data = mysqli_query($conn, $sql);
    if ($data) {
        echo "<script>alert('Data Inserted Into Database'); window.location.href='banner.php';</script>";
    } else {
        echo "Failed";
    }
}
?>


</div>
<?php include("include/script.php"); ?>
<?php include("include/footer.php"); ?>
<script src="assets/js/app.js"></script>

<script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>


</body>

</html>