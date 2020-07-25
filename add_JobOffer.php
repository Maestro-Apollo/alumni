<?php

session_start();



        if (isset($_POST['submit'])) {
            $uMail = $_SESSION["user_mail"];
            $uId = $_SESSION["user_id"];
            
            $title = $_POST['title'];
            $position = $_POST['position'];
            $requirement = $_POST['requirement'];
            $salary = $_POST['salary'];
            $description = $_POST['description'];
            $deadline = $_POST['deadline'];
            $institute = $_POST['institute'];
            

            /*defining variabes for database connection*/
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumni";
            $conn = mysqli_connect($hostname, $username, $password, $dbname);
            
            
            $sql1 = "INSERT INTO `job_offer` (`id`, `user_id`, `title`,`position`, `requirements`, `salary`, `institute`, `description`, `created`, `updated`) VALUES (NULL, '$uId', '$title','$position', '$image', '$requirement', '$salary','$institute','$description',NULL,NULL)";
            
            $res = mysqli_query($conn, $sql1);
            
        header("location:profile.php");
            
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
    <link rel="stylesheet" type="text/css" href="css/add_JobOffer.css" />
</head>

<body class="Main">
    
    <section>

        <?php include('layout/header.php'); ?>
    </section>
    
    
    <section>

            <br>
            <h3 class="header" >Add Job Offer</h3>
            <form
                 class="Form"
                onsubmit="return validation()" method="post" enctype="multipart/form-data">

                <div style="margin-top:15px" class="form-group">
                    <label>Title</label>
                    <input  type="text" id="name" name="title" class="form-control">
                    <span id="nameError" class="text-danger font-wight-bold"></span>
                </div>
                
                <div style="margin-top:15px" class="form-group">
                    <label>Position</label>
                    <input   id="name" name="position" class="form-control">
                    <span id="nameError" class="text-danger font-wight-bold"></span>
                </div>


                <div class="form-group">
                    <label>Requirements</label>
                    <input style="height:100px" type="text" id="email" name="requirement" class="form-control">
                    <span id="emailError" class="text-danger font-wight-bold"></span>
                </div>
                
                <div class="form-group">
                    <label>Expected Salary</label>
                    <input  type="text" id="email" name="salary" class="form-control">
                    <span id="emailError" class="text-danger font-wight-bold"></span>
                </div>
                
                <div class="form-group">
                    <label>Institute</label>
                    <input  type="text" id="email" name="institute" class="form-control">
                    <span id="emailError" class="text-danger font-wight-bold"></span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input style="height:100px" type="text" id="email" name="description" class="form-control">
                    <span id="emailError" class="text-danger font-wight-bold"></span>
                </div>
                <div class="form-group">
                    <label>Application Deadline</label>
                    <input  type="date" id="email" name="deadline" class="form-control">
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