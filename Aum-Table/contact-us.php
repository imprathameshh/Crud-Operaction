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
// error_reporting(0);

$record = mysqli_query($conn, "SELECT * FROM contact_us WHERE id='5'");
$row = mysqli_fetch_array($record);


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
                <h3 class="text-center m-2">Contact Us</h3>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="inputGroupFile02" name="email" value="<?php echo $row["email"]; ?>">
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="phonenumber" required value="<?php echo $row["phonenumber"]; ?>">
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" required><?php echo $row["address"]; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="update" name="update" class="btn btn-outline-success">
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
        $email = $_POST["email"];
        $phone = $_POST["phonenumber"];
        $address = $_POST["address"];

        $sql =  "UPDATE contact_us SET email='$email',phonenumber='$phone',address='$address' WHERE id='5'";
        // echo $sql;
        // die;

        $data = mysqli_query($conn, $sql);
        if ($data) {
            echo "<script>alert('Data Updated Into Database'); window.location.href='contact-us.php';</script>";
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