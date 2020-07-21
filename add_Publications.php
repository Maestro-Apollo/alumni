<?php

session_start();



        if (isset($_POST['submit'])) {
            
            $uMail = $_SESSION["user_mail"];
            $uId = $_SESSION["user_id"];
            
            $title = $_POST['title'];
            $link = $_POST['link'];
            $date = $_POST['date'];

            /*defining variabes for database connection*/
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumni";
            $conn = mysqli_connect($hostname, $username, $password, $dbname);
            
            
            $sql1 = "INSERT INTO `publications` (`id`, `user_id`, `title`,`link`, `date`, `created`, `updated`) VALUES (NULL, '$uId', '$title','$link','$date',NULL, NULL)";
            $res = mysqli_query($conn, $sql1);
            
            header("location:profile.php");
            
        }
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

<body>
    
    <section>

        <?php include('layout/header.php'); ?>
    </section>
    
    
    <section>

            <br>
            <h3 style="margin-left:510px;margin-top:10px;margin-bottom:20px">Add Research Publications</h3>
            <form
                style="width:600px ;border:solid 1px #007B5E;padding:0px 10px;border-radius:10px;margin-bottom:30px;margin-left:360px"
                onsubmit="return validation()" method="post" enctype="multipart/form-data">

                <div style="margin-top:15px" class="form-group">
                    <label>Titile</label>
                    <input  type="text" id="name" name="title" class="form-control">
                    <span id="nameError" class="text-danger font-wight-bold"></span>
                </div>
                
                <div style="margin-top:15px" class="form-group">
                    <label>Date</label>
                    <input  type="date" id="name" name="date" class="form-control">
                    <span id="nameError" class="text-danger font-wight-bold"></span>
                </div>


                <div class="form-group">
                    <label>Link</label>
                    <input  type="text" id="email" name="link" class="form-control">
                    <span id="emailError" class="text-danger font-wight-bold"></span>
                </div>

                <input style="margin-left:240px;padding:5px 20px" type="submit" value="ADD" id="submitBtn" name="submit"
                    class="btn btn-success mb-4">

            </form>

    </section>
    
    
    <section>

        <?php include('layout/footer.php'); ?>
    </section>
    
</body>
</html>