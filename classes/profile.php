<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="profile.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    
</head>

<body>

<!--    <h2>Welcome</h2>-->
    
    <?php
    
//        include('database.php');
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
                
    /*values are fetched and are in the row1 and row2 arrays*/
        $row1 = mysqli_fetch_assoc($resEmail);
        $row2 = mysqli_fetch_assoc($resID);
                
    /*values can be fetched using indexing-- indexes are column names in the respective table*/
       /* echo $row1['email'];
        echo $row2['name'];*/


//        class profileClass extends database
//        {
//            protected $link;
//            public function fetchClass()
//            {
//
//                $sql1 = "Select * from user where email = '$uMail' ";
//                $resEmail = mysqli_query($this->link, $sql1);
//                $sql2 = "Select * from user_info where user_id = '$uId' ";
//                $resID = mysqli_query($this->link, $sql2);
//                
//                $row1 = mysqli_fetch_assoc($resEmail);
//                $row2 = mysqli_fetch_assoc($resID);
//                
//                echo $row1['email'];
//                echo $row2['name'];
//            }
//        }
//        $obj = new resgistrationClass;
//        $ObjReg = $obj->resgistrationFunction();
    
    ?>
    
    
   
   <!--creating div for other information-->
    <div class="container main_info_area">  
       
       
       <div class="edit_profile">
           <button class="edit_btn">Edit Profile</button>
       </div>
    
<!--    creating a div for user image-->
       <div class="image_area">
       
           <img class="user_image" src="../user_img/<?php echo $row2['image']; ?>">
       
       </div>
       
        
        <div class="user_information">
       
          <div class="row">
               <div class="col-md-6 name_batch">
                    Name - <a href="#"> <?php echo $row2['name']; ?> </a><br>
                    Batch - <a href="#"> <?php echo $row2['batch']; ?> </a><br>
                    Current Country - <a href="#"> <?php echo $row2['current_country']; ?> </a><br>
               </div>


               <div class="col-md-6 institute">
                   Institute - <a href="#"> Institute name </a><br>
                   Position -  <a href="#"> Position name </a><br>
                    Current City - <a href="#"> <?php echo $row2['current_city']; ?> </a><br>
               </div> 
          </div>
          
          <div class="contact">
           Phone - <a href="#" class="phone"> <?php echo $row2['phone']; ?> </a>
           Email - <a href="#" class="mail"> <?php echo $row1['email']; ?> </a>
           </div>
          
       </div>
       
       
        
    </div>
    
        <div class="container">
            <div class="add_more">
                <button class="more_btn">Add More</button>
            </div>
        </div>
         
    
    <!--<a href="$$"> <?php echo $row1['email']; ?></a>-->

</body>

</html>