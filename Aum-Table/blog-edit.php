<?php
require_once "../config.php";
$id = $_GET['id'];

$record = mysqli_query($conn, "SELECT * FROM create_blog WHERE id = '$id'");

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

        .image-align {
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
                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="image" aria-label="Upload"  autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <textarea class="form-control" id="editor2" rows="3" maxlength="120" name="title" required><?php echo $row["title"]; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Short Description(Max Word-limit:120)</label>
                                    <textarea class="form-control" rows="3" id="editor1" maxlength="120" name="shortdescription" required><?php echo $row["shortdescription"]; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                    <textarea class="form-control" id="editor" rows="3" name="description" required><?php echo $row["description"]; ?></textarea>
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


    $title=$_POST["title"];
    $description=$_POST["description"];
    $image = $_FILES["image"]["name"];
    $shortdescription = $_POST["shortdescription"];


    if (strlen($image) > 0) {
        $oldimg = $image;
    }

    $sql = "UPDATE create_blog SET image='$oldimg' ,title='$title', shortdescription='$shortdescription',description='$description' WHERE id = $id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Data updated');window.location='blog.php';</script>";
    } else {
        echo "Unsuccessful";
    }
}
?>
 <script>
            $(document).ready(function() {
                var note = document.querySelector('#editor1')
                CKEDITOR.replace(editor1);
            });
        </script>
        <script>
            $(document).ready(function() {
                var note = document.querySelector('#editor')
                CKEDITOR.replace(editor);
            });
        </script>
        <script>
            $(document).ready(function() {
                var note = document.querySelector('#editor2')
                CKEDITOR.replace(editor2);
            });
        </script>


