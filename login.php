<?php
session_start();
include('classes/database.php');
class login extends database
{
    protected $link;
    public function loginFunction()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $is_valid = 1;

            $sql = "Select * from user where email = '$email' AND is_valid = '$is_valid' ";
            $res = mysqli_query($this->link, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $pass = $row['password'];
                $u_id = $row['id'];


                $passValid = password_verify($password, $pass);
                if ($passValid == true) {

                    $_SESSION["user_mail"] = $email;
                    $_SESSION["user_id"] = $u_id;


                    header('location:profile.php');
                    return $res;
                } else {
                    echo "Wrong password";
                    return false;
                }
            } else {
                header('location:reg.php');
                return false;
            }
        }
        # code...
    }
}
$obj = new login;
$objLogin = $obj->loginFunction();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--    <link rel="stylesheet" href="css/stylelog.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Montserrat', sans-serif;
    }
    </style>
</head>

<body>


    <section>
        <?php include('layout/header.php'); ?>
    </section>

    <div class="container wow fadeInUp align-items-center">
        <form class="needs-validation " method="post" novalidate>
            <div class="card w-50 mx-auto mt-5 mb-5 shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">


                        </div>
                        <div class="col-md-4 mt-3 text-center">
                            <h2>SIGN IN</h2>

                        </div>
                        <div class="col-md-4"></div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="uname">Email:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="email"
                            required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                            name="password" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="card-footer">
                    <a href="reg.php">Register Now</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Footer -->




    <section>
        <?php include('layout/footer.php') ?>
    </section>

    <!-- ./Footer -->
    <script src="js/wow.js"></script>
    <script>
    new WOW().init();
    </script>
    <script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>

</body>

</html>