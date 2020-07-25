<?php

session_start();

//    protected $link;

        if (isset($_POST['submit'])) {
//            $is_valid = 0;
            $password1 = $_POST['password'];
            
            $uMail = $_SESSION["user_mail"];
            $uId =  $_SESSION["user_id"];
            echo $uMail;
            
            /*defining variabes for database connection*/
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumni";
            $link = mysqli_connect($hostname, $username, $password, $dbname);

            $pass = password_hash("$password1", PASSWORD_DEFAULT);

            $update = "UPDATE user SET password = '$pass' WHERE email='$uMail'";
            $up2 = mysqli_query($link, $update);
            header("location:login.php");
        }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/change_Pass.css">
</head>

<body class="Main">
    <section>
        <?php include('layout/header.php'); ?>
    </section>
    
    <section>
        <div class="container wow fadeInUp">
            <br>
            <h3 class="header" >Change Password</h3>
            <form class="Form"
                
                onsubmit="return validation()" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <span id="passwordError" class="text-danger font-wight-bold"></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" id="cnfPassword" name="" class="form-control">
                    <span id="cnfPassError" class="text-danger font-wight-bold"></span>
                </div>
               <input  type="submit" value="CONFIRM" id="submitBtn" name="submit"
                    class="btn btn-success mb-4">

            </form>
        </div>
    </section>


    <section>
        <?php include('layout/footer.php'); ?>
    </section>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="js/wow.js"></script>
    <script>
    new WOW().init();
    </script>
    <script type="text/javascript">
    function validation() {
        /*receiving input value from user*/
        var password = document.getElementById('password').value;
        var cnfPassword = document.getElementById('cnfPassword').value;
        /*receiving user innputs*/


        /*assigning regular expressions*/
        var passwordCheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
        /*assigning regular expressions*/


        /*validation starts*/
        if (passwordCheck.test(password)) //cheking password
        {
            document.getElementById('passwordError').innerHTML = " ";
        } else {
            document.getElementById('passwordError').innerHTML = "** Invalid password!";
            return false;
        }

        if (cnfPassword.match(password)) //matching actu
        {
            document.getElementById('cnfPassError').innerHTML = " ";
        } else {
            document.getElementById('cnfPassError').innerHTML = "** Password not matching! ";
            return false;
        }
        /*validation ends*/
    }
    </script>
</body>

</html>