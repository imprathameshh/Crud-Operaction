<?php

// Without logging you can't access the table directly so we need this

// session_start();
// if(!isset ($_SESSION['login'])){
//   echo "<script>window.location='../frontend/index.php'</script>";
// }


ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

//Show the database of values gender and job-role
include_once("../config.php");

session_start();
$id = $_SESSION['id'];


$sql = "SELECT *, 
CASE when gender = 1 THEN 'Male'else 'Female' END AS gender,

CASE WHEN jobtitle = 1 THEN 'Designer'
WHEN jobtitle = 2 THEN 'Developer'  
WHEN jobtitle = 3 THEN 'Manager' else 'Accountant' END AS jobtitle
FROM employee_record";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php  include("include/head.php") ?>
  <link rel="stylesheet" href="include/style.css">
</head>
<!-- Showing the data -->
<body>

<?php

        if (mysqli_num_rows($result) > 0) {
        ?>

         
            <div class="form">

                <h2 style="text-align:center; margin:15px; padding:15px;" class="heading">Dashboard</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                        <div class="card-body">
                        <a href="../index.php"  class="heading" >Back To Login</a>

                                <!-- <div class="col-sm-12 col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <button class="btn btn-secondary buttons-copy buttons-html5  " tabindex="0" aria-controls="datatable-buttons" type="button"><span>Copy</span></button>
                                        <button class="btn btn-secondary buttons-excel buttons-html5  " tabindex="0" aria-controls="datatable-buttons" type="button"><span>Excel</span></button>
                                        <button class="btn btn-secondary buttons-pdf buttons-html5  " tabindex="0" aria-controls="datatable-buttons" type="button"><span>PDF</span></button>
                                        <div class="btn-group">
                                            <button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="datatable-buttons" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button>
                                        </div>
                                    </div>
                                </div> -->
                       
                            </div>
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100" style="text-align: center;">
                            <tr class="table-head">
                                    <th>Sr No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Department</th>
                                    <th>Gender</th>
                                    <th width=10%>Image</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                       <tr class="table-hover">
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row["first_name"]; ?></td>
                                        <td><?php echo $row["last_name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone"]; ?></td>
                                        <td><?php echo $row["jobtitle"]; ?></td>
                                        <td><?php echo $row["gender"]; ?></td>
                                        <td><img src="../frontend/images/<?php echo $row['image']; ?>" style="height:50px;width:50px"></td>
                                        <td> <a class="text-danger" href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return checkDelete()">Delete</a> &nbsp;&nbsp;&nbsp; 
                                        <a class="text" href="edit.php?id=<?php echo $row["id"]; ?>">Edit
                                        </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>

<?php
    } else {
        echo "No result found";
    }
?>
  </div>
</body>
</html>

