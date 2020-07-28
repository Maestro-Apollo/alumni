<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/profile.css">-->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/profile.css">

</head>

<body class="Main">

    <?php

    session_start();

    /*receiving values using session variable*/
    $uMail = $_SESSION["user_mail"];
    $uId = $_SESSION["user_id"];


    /*defining variabes for database connection*/
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alumni";
    $link = mysqli_connect($hostname, $username, $password, $dbname);

    /*fetching from user table*/
    $sql1 = "Select * from user where email = '$uMail' ";
    $resEmail = mysqli_query($link, $sql1);

    /*fetching from user_info table*/
    $sql2 = "Select * from user_info where user_id = '$uId' ";
    $resID = mysqli_query($link, $sql2);
    
    /*feteching job information*/
    $sql3 = "Select * from user_career where user_id = '$uId' ";
    $resCareer = mysqli_query($link, $sql3);
    
    /*fetching publication information*/
    $sql4 = "Select * from publications where user_id = '$uId' ";
    $resPublication = mysqli_query($link, $sql4);

    /*values are fetched and are in the row1 and row2 arrays*/
    $row1 = mysqli_fetch_assoc($resEmail);
    $row2 = mysqli_fetch_assoc($resID);

    
    /*image update starts*/

    if (isset($_POST['submit'])) {
        $image = time() . '_' . $_FILES['image']['name'];
        $target = 'user_img/' . $image;

        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $userInoUo = "UPDATE user_info SET image = '$image' WHERE user_id='$uId'";

        $up2 = mysqli_query($link, $userInoUo);
        header("location:profile.php");
    }
    /*image update ends*/
    ?>

    <section>
        <?php include('layout/header.php'); ?>
    </section>


    <!--creating div for other information-->
    <div class="container main_info_area">

        <div class="edit_profile">
            <a 
                class="edit_btn" href="update_Info.php">Edit Profile</a>
        </div>

        <!--    creating a div for user image-->
        <div class="image_area">
            <img style="height:350px;width:350px;border-radius:5px" class="user_image" src="user_img/<?php echo $row2['image']; ?>">
        </div>
        
        <div class="chngImg">
            <form class="imgForm" method="post" enctype="multipart/form-data">
                <div  class="custom-file mb-3">
                    <input type="file" class="custom-file-input Imgcng" id="customFile" name="image"
                        value="Browse Photo">
                    <label class="custom-file-label" for="customFile">New Photo</label>
                </div>
                <input class="fileInp"  type="submit" id="submitBtn"
                    name="submit" class="btn btn-primary" value="Change Image">
            </form>

        </div>
        
        
        <h2 class="header1">Biodata</h2>

        <div class="user_information">
            <div class="row">
                <div class="col-md-6 name_batch">
                    <label class="Label1">Name - </label><a class="Label"  href="#"> <?php echo $row2['name']; ?> </a><br>
                    
                    <label class="Label1">Batch - </label><a class="Label"  href="#"> <?php echo $row2['batch']; ?> </a><br>
                    <label class="Label1">Current Country - </label><a class="Label" href="#">
                        <?php echo $row2['current_country']; ?> </a><br>
                </div>

                <div class="col-md-6 institute">
                    <label class="Label1">Institute - </label><a class="Label"  href="#"> Institute name </a><br>
                    <label class="Label1">Position - </label><a class="Label" href="#"> Position name </a><br>
                    <label class="Label1">Current City - </label><a class="Label"  href="#">
                        <?php echo $row2['current_city']; ?> </a><br>
                </div>
            </div>

            <div class="contact">
                <label class="Label">Phone - </label><a class="Label phone"  href="#" class="phone">
                    <?php echo $row2['phone']; ?> </a>
                <label class="Label">Email - </label><a class="Label email" href="#" class="mail"> <?php echo $row1['email']; ?>
                </a>
            </div>
        </div>
    </div>
    
    
    <!--another area for career information-->
    
     <!--creating div for other information-->
     
     <?php
            if($resCareer){   
                ?>
                
                <h2 class="header" >Previous Jobs</h2>
                
                <?php
                while($row = mysqli_fetch_row($resCareer)){
                    
                    $ins = $row[2];
                    $pos = $row[3];
                    $j_date = $row[4];
                    $e_date = $row[5];
                    ?>

                    <div class="container main_info_area">
                        <div class="user_information">
                            <div class="row">
                                <div class="col-md-6 name_batch">
                                    <label class="Label">Institute - </label><a class="Label"  href="#"> <?php  echo $ins; ?> </a><br>
                                    <label class="Label">Position - </label><a class="Label" href="#"> <?php  echo $pos; ?> </a><br>
                                </div>

                                <div class="col-md-6 institute">
                                    <label class="Label">Joining Date - </label> <a class="Label" href="#"> <?php  echo $j_date; ?> </a><br>
                                    <label class="Label">Ending Date - </label> <a class="Label" href="#"> <?php  echo $e_date; ?> </a><br>
                                </div>
                            </div>
                            
                            <div class="row">
                                <a class="Label" href="edit_Job.php?id1=<?php echo $row['id']; ?>" style="padding:10px 10px; text-decoration:none;backgrouond:white;color:black">Edit</a>
                                <a class="Label" href="delete_Job.php?id2=<?php echo $row['id']; ?>" style="padding:10px 10px; text-decoration:none;backgrouond:white;color:black">Delete</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
        
            ?>
 
    
    <!--another area for career information-->
    
    <!--Research Publication area starts-->
      <?php
            if($resPublication){   
                ?>
                
                <h2 style="margin-left:580px; margin-top:20px;">Previous Jobs</h2>
                
                <?php
                while($row1 = mysqli_fetch_row($resPublication)){
                    
                    $title = $row1[2];
                    $link = $row1[3];
                    $date = $row1[4];
                    ?>

                    <div class="container main_info_area">
                        <div class="user_information">
                            <div class="row">
                                <div class="col-md-6 name_batch">
                                    Title - <a style="text-decoration:none;color:black" href="#"> <?php  echo $title; ?> </a><br>
                                    Link - <a style="text-decoration:none;color:black" href="#"> <?php  echo $link; ?> </a><br>
                                </div>

                                <div class="col-md-6 institute">
                                    Publication date - <a style="text-decoration:none;color:black" href="#"> <?php  echo $date; ?> </a><br>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
        
            ?>
            <!--Research Publication Area Ends-->
    
    

    <div style="margin-top:30px;margin-bottom:30px" class="container">
        <div class="add_more">
            <a style="color:white; padding:10px 10px; background:#007B5E; border-radius:10px; text-decoration:none"
                class="more_btn" href="add_More.php">Add More</a>
        </div>
        <div class="add_more">
            <a style="color:white; padding:10px 10px; background:#007B5E; border-radius:10px; text-decoration:none"
                class="more_btn" href="change_Pass.php">Change Password</a>
        </div>
        <div class="add_more">
            <a style="color:white; padding:10px 10px; background:#007B5E; border-radius:10px; text-decoration:none"
                class="more_btn" href="add_Publications.php">Add Publications</a>
        </div>
    </div>



    <section>
        <?php include('layout/footer.php') ?>
    </section>
    
    

    
</body>

</html>