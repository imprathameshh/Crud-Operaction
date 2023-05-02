<!DOCTYPE html>
<html lang="en">


<head>
    <title>Blog</title>
    <?php include("include/head.php"); ?>
   
</head>
<?php
include("../config.php");
error_reporting(0);
$result = mysqli_query($conn, "SELECT * FROM create_blog");
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
                <!-- <h2 style="text-align:center; margin:5px; padding:2px;">BLOG</h2> -->

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Image To Gallery</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="blog.php" method="POST" enctype="multipart/form-data">

                                    <label for="exampleFormControlInput1" class="form-label">Image</label><br>

                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile02" name="image" required>
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <textarea class="form-control" id="editor2" rows="3" maxlength="120" name="title" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Short Description</label>
                                        <textarea class="form-control" id="editor1" rows="3" maxlength="120" name="shortdescription" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="editor" rows="3" name="description" required></textarea>
                                    </div>

                                    <!-- <div class="mb-3">
                                        <input type="submit" value="Submit" name="submit" class="btn btn-outline-success">
                                    </div> -->
                                   <!-- <div class="modal-footer"> -->
                                <div class="mb-3">
                                    <input type="submit" value="Upload" name="submit" class="btn btn-outline-success">
                                </div>
                            <!-- </div> -->
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>


            </div>

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <h2 style="text-align:center; margin:5px; padding:2px;">Blog List</h2>

                        <div class="col-12">
                            <div class="col md-2" style="display:flex; justify-content:right;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding: 5px; background-color: darkgreen; color:white;">
                                    Create New Blog
                                </button>
                            </div>
                            
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                ?>

</div>
<p></p>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <h4 class="card-title" style="text-align: center;">Blog Details</h4><br>
                                   
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100" style="text-align: center; width:100px;">

                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Short Description</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>


                                                <tr>
                                                    <td style="width: 10px;"><?php echo $i++; ?></td>

                                                    <td style="width: 100px;"> <img src="../admin/img/<?php echo $row["image"]; ?>" height="100px" width="100px"><br>
                                                    </td>
                                                    <td><?php echo $row["title"]; ?></td>
                                                    <td><?php echo $row["shortdescription"]; ?></td>
                                                    <td style="width:60%;"><?php echo $row["description"]; ?></td>
                                                    <td>
                                                        <a href="blog-edit.php?id=<?php echo $row["id"]; ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                            </svg>
                                                        </a>

                                                        <a class="text-danger" href="delete-blog.php?id=<?php echo $row["id"]; ?>">
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

                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // if (isset($_POST["submit"])) {

                    move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/img/" . $_FILES["image"]["name"]);
                    $image = $_FILES["image"]["name"];
                    $title = $_POST["title"];
                    $description = $_POST["description"];
                    $shortdescription = $_POST["shortdescription"];



                    $sql = "INSERT INTO create_blog (image,title,shortdescription,description) VALUES('$image','$title','$shortdescription','$description')";


                    $data = mysqli_query($conn, $sql);
                    if ($data) {
                        echo "<script>alert('Data Inserted Into Database'); window.location.href='blog.php';</script>";
                    } else {
                        echo "Failed";
                    }
                }






                ?>

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
        <script>
            $(document).ready(function() {
                var note = document.querySelector('#editor1')
                CKEDITOR.replace(editor1);
            });
        </script>
        <script>
            $(document).ready(function() {
                var note = document.querySelector('#editor2')
                CKEDITOR.replace(editor2);
            });
        </script>





</body>

</html>