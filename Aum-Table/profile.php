<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Cabana | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('include/head.php'); ?>
    <style>
        .form {
            margin: 0%;
            padding: 50px;
        }
    </style>
</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include('include/header.php'); ?>
        <?php include('include/sidebar.php'); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <?php
                    require_once('../config.php');
                    $result = mysqli_query($conn, "SELECT * FROM admin_login where id='1'");
                    $row = mysqli_fetch_array($result)
                    ?>

                    <h4 class="mb-sm-0 font-size-18" style="text-align: center;">Profile</h4>
                    <div class="form">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputGroupFile02" name="username" value="<?php echo $row["username"]; ?>">
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" name="password" required value="<?php echo $row["password"]; ?>">
                            </div>


                            <div class="mb-3">
                                <input type="submit" value="update" name="update" class="btn btn-outline-success">
                            </div>
                        </form>
                    </div>


                </div>
                <!-- end page title -->
                <?php
                require_once "../config.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    

                    $sql = "UPDATE admin_login SET username='$username' ,password='$password' WHERE id = 1";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>alert('Data updated');window.location='profile.php';</script>";
                    } else {
                        echo "Unsuccessful";
                    }
                }


                ?>



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?php include('include/footer.php'); ?>




    <?php include('include/script.php'); ?>



</body>


</html>