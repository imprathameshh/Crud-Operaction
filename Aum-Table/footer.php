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
$is = $_GET['id'];
$record = mysqli_query($conn, "SELECT * FROM footer WHERE id='1'");
$row = mysqli_fetch_array($record);
$oldimg = $row["image"];


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
                <h3 class="text-center m-2">Footer Elements</h3>

                <form action="" method="POST" enctype="multipart/form-data">
                    <p><b>Logo you want to update:</b></p>
                    <img class="image-align" src="../admin/img/<?php echo $row["image"]; ?>" height="30%" width="30%"><br> <br>
                    <div class="input-group">
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image" aria-label="Upload" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="des"><?php echo $row["des"]; ?></textarea>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Facebook Link</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputGroupFile02" name="facebook_link" value="<?php echo $row["facebook_link"]; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Twitter Link</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputGroupFile02" name="twitter_link" value="<?php echo $row["twitter_link"]; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Linkedin Link</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputGroupFile02" name="linkedin_link" value="<?php echo $row["linkedin_link"]; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Instagram Link</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputGroupFile02" name="instagram_link" value="<?php echo $row["instagram_link"]; ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Update" name="update" class="btn btn-outline-success">
                    </div>
                </form>
            </div>


            <?php include("include/footer.php"); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/img/" . $_FILES["image"]["name"]);

        $image = $_FILES["image"]["name"];
        $des = $_POST["des"];
        $facebook_link = $_POST["facebook_link"];
        $twitter_link = $_POST["twitter_link"];
        $linkedin_link = $_POST["linkedin_link"];
        $instagram_link = $_POST["instagram_link"];

        if (strlen($image) > 0) {
            $oldimg = $image;
        }

        $sql =  "UPDATE footer SET image='$oldimg',des='$des',facebook_link='$facebook_link',twitter_link='$twitter_link',linkedin_link='$linkedin_link',instagram_link='$instagram_link' WHERE id='1'";
        // echo $sql;
        // die;

        $data = mysqli_query($conn, $sql);
        if ($data) {
            echo "<script>alert('Data Updated Into Database'); window.location.href='footer.php';</script>";
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