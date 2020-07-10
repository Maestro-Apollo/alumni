<?php

session_start();
include('classes/database.php');

class resgistration extends database
{
    protected $link;
    public function resgistrationFunction()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $batch = $_POST['batch'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $is_valid = 0;
            $password = $_POST['password'];
            $image = time() . '_' . $_FILES['image']['name'];
            $target = 'user_img/' . $image;

            $pass = password_hash("$password", PASSWORD_DEFAULT);

            $sqlEmail = "Select * from user where email = '$email' ";
            $resEmail = mysqli_query($this->link, $sqlEmail);
            if (mysqli_num_rows($resEmail) > 0) {
                echo "Email is already taken";
                return false;
            } else {
                $sql = "INSERT INTO `user` (`id`, `email`, `password`, `token`, `is_valid`, `created`, `updated`) VALUES (NULL, '$email', '$pass', NULL, '$is_valid', NULL, NULL)";
                $res = mysqli_query($this->link, $sql);
                if ($res) {

                    $sqlFind = "Select * from user where email = '$email' ";
                    $resFind = mysqli_query($this->link, $sqlFind);
                    $rowID = mysqli_fetch_assoc($resFind);
                    $id = $rowID['id'];

                    $sql2 = "INSERT INTO `user_info` (`id`, `user_id`, `batch`, `image`, `name`, `phone`, `current_country`, `current_city`, `created`, `updated`) VALUES (NULL, '$id', '$batch', '$image', '$name', '$phone', '$country', '$city', NULL, NULL)";
                    $res2 = mysqli_query($this->link, $sql2);
                    if ($res2) {
                        move_uploaded_file($_FILES['image']['tmp_name'], $target);
                        echo "Pending";

                        /*passing email and id using session variable to profile page*/

                        // $_SESSION["user_mail"] = $email;
                        // $_SESSION["user_id"] = $id;
                        // $_SESSION["name"] = $name;

                        // header("location:profile.php");
                        //                        header("location:welcome.php");
                        return $res2;
                    }
                } else {
                    echo "Not added";
                    return false;
                }

                /*after entering values into database, registration page should redirect user to it's profile*/
                /*for redirection, we need to have $id from $res2 and $email from $sql*/
            }
        }
        # code...
    }
}
$obj = new resgistration;
$ObjReg = $obj->resgistrationFunction();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Registration</title>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <h1 class="text-center bg-dark text-white">Register here!</h1>

    <!--form area starts-->

    <div class="container">
        <br>

        <form onsubmit="return validation()" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control">
                <span id="nameError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Batch</label>
                </div>

                <select class="custom-select" name="batch" id="inputGroupSelect01">
                    <option selected disabled>Your batch number...</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                </select>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" name="email" class="form-control">
                <span id="emailError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" id="phoneNumber" name="phone" class="form-control">
                <span id="phoneNoError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="form-group">
                <label>Current Country</label>
                <input type="text" id="currentCountry" name="country" class="form-control">
                <span id="crntCountryError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="form-group">
                <label>Current City</label>
                <input type="text" id="currentCity" name="city" class="form-control">
                <span id="crntCityError" class="text-danger font-wight-bold"></span>
            </div>

            <!--no need for now-->
            <!--<div class="form-group">
                    <label>Current Institution</label>
                    <input type="text" id="institute" name="" class="form-control">
                    <span id="instituteError" class="text-danger font-wight-bold"></span>
                </div>

                <div class="form-group">
                    <label>Position</label>
                    <input type="text" id="position" name="" class="form-control">
                    <span id="positionError" class="text-danger font-wight-bold"></span>
                </div>-->
            <!--no need for now-->

            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control">
                <span id="passwordError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="cnfPassword" name="" class="form-control">
                <span id="cnfPassError" class="text-danger font-wight-bold"></span>
            </div>

            <p>Image:</p>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="image" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
                <!--<div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>-->
            </div>

            <input type="submit" id="submitBtn" name="submit" class="btn btn-primary">

        </form>

    </div>

    <!--form area ends-->
    <section>
        <?php include('layout/footer.php') ?>
    </section>




    <script type="text/javascript">
    function validation() {
        /*receiving input value from user*/
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phoneNumber = document.getElementById('phoneNumber').value;
        var currentCountry = document.getElementById('currentCountry').value;
        var currentCity = document.getElementById('currentCity').value;

        /*no need for now*/
        /*var institute = document.getElementById('institute').value;
        var position = document.getElementById('position').value;*/
        /*no need for now*/

        var password = document.getElementById('password').value;
        var cnfPassword = document.getElementById('cnfPassword').value;
        /*receiving user innputs*/


        /*assigning regular expressions*/

        var nameCheck = /^[A-Za-z. ]{3,30}$/;
        var passwordCheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
        var emailCheck = /^[A-Za-z_0-9]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;

        var mobileCheck = /^[0-9]{11}$/;
        var crntCountryCheck = /^[A-Z]{1}[A-Za-z. ]$/;
        var crntCityCheck = /^[A-Z]{1}[A-Za-z. ]$/;

        /*no need for now*/
        /*var instituteCheck = /^[A-Z]{1}[A-Za-z. ]$/ ;
        var positionCheck = /^[A-Z]{1}[A-Za-z ]$/ ;*/
        /*no need for now*/


        /*assigning regular expressions*/


        /*validation starts*/

        if (nameCheck.test(name)) //checking name
        {
            document.getElementById('nameError').innerHTML = " ";
        } else {
            document.getElementById('nameError').innerHTML = "** Invalid name!";
            return false;
        }

        if (emailCheck.test(email)) //checking email
        {
            document.getElementById('emailError').innerHTML = " ";
        } else {
            document.getElementById('emailError').innerHTML = "** Use standard mail format!";
            return false;
        }

        if (mobileCheck.test(phoneNumber)) //checking phone number
        {
            document.getElementById('phoneNoError').innerHTML = " ";
        } else {
            document.getElementById('phoneNoError').innerHTML = "** Phone number starts with 01 and length=11";
            return false;
        }


        /* if(crntCountryCheck.test(currentCountry)) //checking country
             {
                 document.getElementById('crntCountryError').innerHTML=" ";
             }else{
             document.getElementById('crntCountryError').innerHTML="** Invalid country name!(Ex- Peru)";
             return false;
         }*/

        /* if(crntCityCheck.test(currentCity)) //checking city
             {
                 document.getElementById('crntCityError').innerHTML=" ";
             }else{
             document.getElementById('crntCityError').innerHTML="** Invalid city name!(Ex-Dhaka)";
             return false;
         }*/


        /*no need for now*/
        /*if(instituteCheck.test(institute)) //checking institute
            {
                document.getElementById('instituteError').innerHTML=" ";
            }else{
            document.getElementById('instituteError').innerHTML="** Use standard institute name";
            return false;
        }*/

        /*if(positionCheck.test(position)) //checking position
            {
                document.getElementById('positionError').innerHTML=" ";
            }else{
            document.getElementById('positionError').innerHTML="** Invalid position name!";
            return false;
        }*/
        /*no need for now*/


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