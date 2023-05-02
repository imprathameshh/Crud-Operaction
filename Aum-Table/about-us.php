<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cabana About Us | Dashboard</title>
    <?php include("include/head.php"); ?>
    <style>
        .form {
            margin: 90px;
            padding: 20px;
        }
    </style>
</head>
<?php
include("../config.php");
error_reporting(0);

$record = mysqli_query($conn, "SELECT * FROM about_us1 WHERE id='3'");
$row = mysqli_fetch_array($record);
$oldimg= $row["image"];

?>

<body data-sidebar="dark">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include("include/header.php"); ?>
        <?php include("include/sidebar.php"); ?>


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="form">
                <h3 class="text-center m-2">About Us First Title</h3>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <p><b>Image you want to update:</b></p>
                        <img class="image-align" src="../admin/img/<?php echo $row["image"]; ?>" height="25%" width="25%"><br> <br>
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image" aria-label="Upload"  autofocus>
                        </div>

                    <div class="row mb-3">
                        <label for="inputText3" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputGroupFile02" name="title" value="<?php echo $row["title"]; ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" ><?php echo $row["description"]; ?></textarea>
                    </div>


                    </div>
                    <div class="mb-3">
                        <input type="submit" value="update" name="update" class="btn btn-outline-success">
                    </div>
                </form>
            </div>



            <!-- Second Title Start -->
            

            <?php include("include/footer.php"); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/img/" . $_FILES["image"]["name"]);

        $image = $_FILES["image"]["name"];
        $title = $_POST["title"];
        $description= $_POST["description"];

        if (strlen($image) > 0) {
        $oldimg = $image;
        }

        $sql =  "UPDATE about_us1 SET title='$title', description='$description' ,image='$oldimg' WHERE id='3'";

        $data = mysqli_query($conn, $sql);
        if ($data) {
            echo "<script>alert('Data Updated Into Database'); window.location.href='about-us.php';</script>";
        } else {
            echo "Failed";
        }
    }
    ?>
    <?php include("include/script.php"); ?>

    <script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            var note = document.querySelector('#editor')
            CKEDITOR.replace(editor);
        });
    </script>

</body>

</html>