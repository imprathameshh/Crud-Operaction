<?php
require_once "../config.php";
$id = $_GET['id'];

$record = mysqli_query($conn, "SELECT * FROM gallery WHERE id = '$id'");

$row = mysqli_fetch_array($record);
$oldimg = $row["image"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_update.css">
    <?php include('include/head.php'); ?>
    <title>Update Record</title>
    <style>
        .form {
            margin: 90px;
            padding: 20px;
        }
        .image-align{
            margin-left: 25%;
        }
       
    </style>
</head>

<body data-sidebar="dark">
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>


    <div>
        <div>
            <div>
                <div>
                    <div class="main-content">

                        <div class="form">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <p><b>Image you want to update:</b></p>
                                <img class="image-align" src="../admin/img/<?php echo $row["image"]; ?>" height="50%" width="50%"><br> <br>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image" aria-label="Upload" required autofocus>
                                </div>
                                <br><br>
                                <input class="btn btn-outline-dark" value="submit" type="submit" id="inputGroupFileAddon04">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php include('include/footer.php'); ?>
<?php include('include/script.php'); ?>

</html>

<?php
require_once "../config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/img/" . $_FILES["image"]["name"]);



    $image = $_FILES["image"]["name"];

    if (strlen($image) > 0) {
        $oldimg = $image;
    }

    $sql = "UPDATE gallery SET image='$oldimg' WHERE id = $id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Data updated');window.location='ui-images.php';</script>";
    } else {
        echo "Unsuccessful";
    }
}


?>