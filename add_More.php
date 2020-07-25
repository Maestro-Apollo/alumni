   <?php


        if (isset($_POST['submit'])) {
            
            session_start();
            $uMail = $_SESSION["user_mail"];
            $uId = $_SESSION["user_id"];

            /*defining variabes for database connection*/
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumni";
            $link = mysqli_connect($hostname, $username, $password, $dbname);
           
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
    
 
    
    <h2 class="header1" >Job Information</h2>
    
    <form class="needs-validation" method="post" novalidate>
            <div class="form-group" style="padding: 0px 20px;padding-top:20px">
                <label for="uname">Institute:</label>
                <input style="width:400px" type="text" class="form-control" id="uname" placeholder="Enter institute name"
                    name="ins_name">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <div class="form-group" style="padding: 10px 20px">
                <label for="uname">Position:</label>
                <input style="width:400px" type="text" class="form-control" id="uname" placeholder="Enter position name"
                    name="position">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <div class="form-group" style="padding: 0px 20px">
                <label for="pwd">Joining Date</label>
                <input style="width:400px" type="date" class="form-control" id="pwd" placeholder="Enter joining date"
                    name="join_date" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group" style="padding: 0px 20px">
                <label for="pwd">Ending Date</label>
                <input style="width:400px" type="date" class="form-control" id="pwd" placeholder="Enter ending date"
                    name="end_date" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <button style="margin:20px 0px; margin-left:180px; background:#007B5E; color:white" type="submit"
                name="submit" class="btn btn-primary">Add</button>
        </form>
    
    
    <section>

        <?php include('layout/footer.php'); ?>
    </section>   
</body>

</html>