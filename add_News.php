<?php

session_start();



        if (isset($_POST['submit'])) {
            
            $headline = $_POST['headline'];
            $details = $_POST['details'];
            $date = $_POST['date'];
            $image = time() . '_' . $_FILES['image']['name'];
            $target = 'news_Img/' . $image;

            /*defining variabes for database connection*/
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumni";
            $link = mysqli_connect($hostname, $username, $password, $dbname);
            
            
            $sql = "INSERT INTO `news` (`id`, `details`, `headline`,`date`, `image`, `created`, `updated`) VALUES (NULL, '$details', '$headline','$date', '$image', NULL, NULL)";
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $res = mysqli_query($link, $sql);
            
        header("location:show_News.php");
            
        }
        # code...
    

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
            <h3 style="margin-left:540px;margin-top:10px;margin-bottom:20px">Add News Here</h3>
            <form
                style="width:600px ;border:solid 1px #007B5E;padding:0px 10px;border-radius:10px;margin-bottom:30px;margin-left:360px"
                onsubmit="return validation()" method="post" enctype="multipart/form-data">

                <div style="margin-top:15px" class="form-group">
                    <label>Headline</label>
                    <input  type="text" id="name" name="headline" class="form-control">
                    <span id="nameError" class="text-danger font-wight-bold"></span>
                </div>
                
                <div style="margin-top:15px" class="form-group">
                    <label>Date</label>
                    <input  type="date" id="name" name="date" class="form-control">
                    <span id="nameError" class="text-danger font-wight-bold"></span>
                </div>


                <div class="form-group">
                    <label>Details</label>
                    <input style="height:100px" type="text" id="email" name="details" class="form-control">
                    <span id="emailError" class="text-danger font-wight-bold"></span>
                </div>

                

                <p>Image:</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="image" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    <!--<div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>-->
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