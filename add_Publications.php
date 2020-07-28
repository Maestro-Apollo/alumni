<?php

session_start();
include('classes/database.php');
class publication extends database
{
    protected $link;
    public function publicationFunction()
    {
        if (isset($_POST['submit'])) {
            $user_id = $_SESSION['user_id'];
            $link = $_POST['link'];
            $title = $_POST['title'];
            $date = $_POST['date'];

            $sql = "INSERT INTO `publications` (`id`, `user_id`, `title`, `link`, `date`, `created`, `updated`) VALUES (NULL, '$user_id', '$title', '$link', '$date', '', '')";
            $res = mysqli_query($this->link, $sql);
            if ($res) {
                header('location:profile.php');
                return $res;
            } else {
                echo "Not Added";
                return false;
            }
        }
        # code...
    }
}
$obj = new publication;
$objPublic = $obj->publicationFunction();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Newa</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/add_more.css" />
</head>

<body class="Main">

    <section>

        <?php include('layout/header.php'); ?>
    </section>


    <section>
        <br>
        <h3 style="margin-left:80px" class="header1" >Add Research Publications</h3>
        <form class="Form"
            style="width:600px;margin-left:400px; border:solid 2px black; border-radius:10px;background:white;margin-bottom:30px"
            onsubmit="return validation()" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Title</label>
                <input type="text" id="name" name="title" class="form-control">
                <span id="nameError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" id="name" name="date" class="form-control">
                <span id="nameError" class="text-danger font-wight-bold"></span>
            </div>


            <div class="form-group">
                <label>Link</label>
                <input type="text" id="email" name="link" class="form-control">
                <span id="emailError" class="text-danger font-wight-bold"></span>
            </div>

            <input type="submit" value="ADD" id="submitBtn" name="submit" style="margin-left:260px"
                class="btn btn-success mb-4">

        </form>

    </section>


    <section>

        <?php include('layout/footer.php'); ?>
    </section>

</body>

</html>