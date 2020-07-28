   <?php

     session_start();
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
    


    if (isset($_POST['submit'])) {
       
        

        

        $inst_name = $_POST['ins_name'];
        $position = $_POST['position'];
        $join_date = $_POST['join_date'];
        $end_date = $_POST['end_date'];

        $sql = "INSERT INTO `user_career` (`id`, `user_id`, `institute`, `position`, `joining_date`, `ending_date`, `created`,`updated`) VALUES (NULL, '$uId', '$inst_name', '$position', '$join_date', '$end_date', NULL,NULL)";
        $res = mysqli_query($link, $sql);
        header("location:profile.php");
    }

    ?>



   <!DOCTYPE html>
   <html lang="en">

   <head>
       <title>Add More</title>
       <meta charset="utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1" />
      
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
       
       <link rel="stylesheet" type="text/css" href="css/style.css" />
       <link rel="stylesheet" href="css/animate.css">
       <link rel="stylesheet" type="text/css" href="css/add_more.css" />


   </head>

   <body class="Main">

       <section>

           <?php include('layout/header.php'); ?>
       </section>



       <h2 class="header1">Add Job Information</h2>
       
       
       <!--previous user information starts-->
       
       <div class="container">
           
           <div class="row">
              <!--previous information starts-->
               <div class="col-md-6">
                 <h3 class="header2">Personal Info.</h3>
                  <div class="information">
                    <div class="row info">
                        
                        <label class="Label">Name-</label><a class="Anchor"  href="#"> <?php echo $row2['name']; ?> </a><br>
                    </div>
                        
                    <div class="row info">
                        <label class="Label">Batch-</label><a class="Anchor"  href="#"> <?php echo $row2['batch']; ?> </a><br>
                    </div>
                           
                    <div class="row info">
                        <label class="Label">Current Country-</label><a class="Anchor"  href="#">
                                <?php echo $row2['current_country']; ?> </a><br>
                    </div>

                    <div class="row info">
                        <label class="Label">Institute-</label><a class="Anchor"  href="#"> Institute name </a><br><br>
                    </div>
                    <div class="row info">
                               <label class="Label">Position-</label><a class="Anchor"  href="#"> Position name </a><br>
                    </div>
                    <div class="row info">
                        <label class="Label">Current City-</label><a class="Anchor"  href="#">
                                <?php echo $row2['current_city']; ?> </a><br>
                    </div>
                            
                    
                    <div class="row info">
                        <label class="Label">Phone-</label><a class="Anchor"  href="#" class="phone">
                            <?php echo $row2['phone']; ?> </a>
                    </div>
                    <div class="row info">
                         <label class="Label">Email-</label><a class="Anchor"  href="#" class="mail"> <?php echo $row1['email']; ?>
                        </a>
                    </div>  
                       
                   
                  </div>
                   

               </div>
               <!--previous user information ends-->
               
               
               <!--add more information area starts-->
               <div class="col-md-6 form-area">
                  <h3 class="header3">Previous Job Info.</h3>
                  
                   <form  class="needs-validation" method="post" novalidate>
                       <div class="form-group" >
                           <label for="uname">Institute:</label>
                           <input type="text" class="form-control" id="uname" placeholder="Enter institute name"
                               name="ins_name">
                           <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                       </div>

                       <div class="form-group" >
                           <label for="uname">Position:</label>
                           <input type="text" class="form-control" id="uname" placeholder="Enter position name"
                               name="position">
                           <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                       </div>

                       <div class="form-group" >
                           <label for="pwd">Joining Date</label>
                           <input  type="date" class="form-control" id="pwd" placeholder="Enter joining date"
                               name="join_date" required>
                           <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                       </div>
                       <div class="form-group" >
                           <label for="pwd">Ending Date</label>
                           <input  type="date" class="form-control" id="pwd" placeholder="Enter ending date"
                               name="end_date" required>
                           <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                       </div>

                       <button  type="submit"
                           name="submit" class="btn btn-primary">Add</button>
                   </form>
               </div>
               <!--add more information area ends-->
               
           </div>
           
            
        </div>
       
       

       


       <section>

           <?php include('layout/footer.php'); ?>
       </section>
   </body>

   </html>