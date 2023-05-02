<!doctype html>
<html lang="en">



<head>

    <meta charset="utf-8" />
    <title>Cabana | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('include/head.php'); ?>

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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Blog</h4>

                              

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php include('../config.php'); ?>
                    <div class="row">

                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">

                                            <div class="d-flex flex-wrap">
                                                <div class="me-3">
                                                    <p class="text-muted mb-2">Total Blogs</p>
                                                    <?php $record = mysqli_query($conn, "SELECT COUNT(*) AS tblog FROM create_blog");
                                                    $result = mysqli_fetch_array($record); ?>
                                                    <h5 class="mb-0"><?php echo $result["tblog"]; ?></h5>
                                                </div>

                                                <div class="avatar-sm ms-auto">
                                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                        <i class="bx bxs-book-bookmark"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="card blog-stats-wid">
                                        <div class="card-body">

                                            <div class="d-flex flex-wrap">
                                                <div class="me-3">
                                                    <p class="text-muted mb-2">Total Comments</p>
                                                    <?php $record = mysqli_query($conn, "SELECT COUNT(*) AS tfeedback FROM feedback");
                                                    $result = mysqli_fetch_array($record); ?>
                                                    <h5 class="mb-0"><?php echo $result["tfeedback"]; ?></h5>
                                                </div>

                                                <div class="avatar-sm ms-auto">
                                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                        <i class="bx bxs-note"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card blog-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap">
                                                <div class="me-3">
                                                    <p class="text-muted mb-2">Total Messages</p>
                                                    <?php $record = mysqli_query($conn, "SELECT COUNT(*) AS tmsgrecived FROM send_msg");
                                                    $result = mysqli_fetch_array($record); ?>
                                                    <h5 class="mb-0"><?php echo $result["tmsgrecived"]; ?></h5>
                                                </div>

                                                <div class="avatar-sm ms-auto">
                                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                        <i class="bx bxs-message-square-dots"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                           
                        

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