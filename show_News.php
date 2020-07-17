<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show News</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/profile.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

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


    
    /*feteching job information*/
    $sql = "Select * from news ORDER BY date DESC";
    $newsInfo = mysqli_query($link, $sql);


    ?>

    <section>
        <?php include('layout/header.php'); ?>
    </section>

    
    
    <!--another area for career information-->
    
     <!--creating div for other information-->
     
     <?php
            if($newsInfo){   
                ?>
                
                <h2 style="margin-left:640px; margin-top:20px;">News</h2>
                
                <?php
                while($row = mysqli_fetch_row($newsInfo)){
                    
                    $details = $row[1];
                    $headline = $row[2];
                    $date = $row[3];
                    $image = $row[4];
                    ?>

                    <div class="container main_info_area" style="width:1000px;margin-bottom:20px">
                        <div class="user_information">
                           <div class="row">
                               <div class="col-md-6">
                                   <img style="border-radius:10px" class="user_image" src="news_Img//<?php echo $image; ?>">
                               </div>
                                
                                <div class="col-md-6">
                                    <br>
                                    Published on -<a style="text-decoration:none;color:black" href="#"> <?php  echo $date; ?> </a><br>
                                    Headline- <a style="text-decoration:none;color:black" href="#"> <?php  echo $headline; ?> </a><br>
                                    <br><br><a style="text-decoration:none;color:black" href="#"> <?php  echo $details; ?> </a><br>
                                </div>
                            </div>
                           
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
        
            ?>
 
    
    <!--another area for career information-->

   



    <section>
        <?php include('layout/footer.php') ?>
    </section>
</body>

</html>