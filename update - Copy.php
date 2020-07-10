<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Update Informationo</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="profile.css" />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php
    session_start();
    /*session variable that holds user's mail and id*/
    $uMail = $_SESSION["user_mail"];
    $uId =  $_SESSION["user_id"];

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

    /*update starts here*/

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $batch = $_POST['batch'];
        //                $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $city = $_POST['city'];

        //                $userTableUp = "UPDATE user SET email = '$email' WHERE id = '$uId'";
        $userInoUo = "UPDATE user_info SET batch = '$batch]', name = '$name',phone = '$phone',current_country = '$country',current_city = '$city' WHERE user_id='$uId'";

        $up2 = mysqli_query($link, $userInoUo);
        $up1 = mysqli_query($link, $userTableUp);

        $_SESSION["user_mail"] = $uMail;
        $_SESSION["user_id"] = $uId;

        header("location:profile.php");
    }
    /*update ends here*/
    ?>





    <!--    creating form-->
    <section>
        <?php include('layout/header.php'); ?>
    </section>
    <div class="container">
        <br>

        <h2 style="margin-left:440px;margin-bottom:30px">Update Profile</h2>

        <form
            style="width:400px; border:solid 1px #007B5E;padding:10px 10px;border-radius:10px;margin-left:360px;margin-bottom:40px"
            onsubmit="return validation()" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $row2['name']; ?>">
                <span id="nameError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Batch</label>
                </div>

                <select class="custom-select" name="batch">
                    <option disabled>Your batch number...</option>
                    <option value="39" <?php if ($row2['batch'] == 39) {
                                            echo "selected";
                                        } ?>>39</option>
                    <option value="40" <?php if ($row2['batch'] == 40) {
                                            echo "selected";
                                        } ?>>40</option>
                    <option value="41" <?php if ($row2['batch'] == 41) {
                                            echo "selected";
                                        } ?>>41</option>
                    <option value="42" <?php if ($row2['batch'] == 42) {
                                            echo "selected";
                                        } ?>>42</option>
                    <option value="43" <?php if ($row2['batch'] == 43) {
                                            echo "selected";
                                        } ?>>43</option>
                </select>
            </div>

            <!--<div class="form-group">
                <label>Email</label>
                <input type="text" id="email" name="email" class="form-control">
                <span id="emailError" class="text-danger font-wight-bold"></span>
            </div>-->

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" id="phoneNumber" name="phone" class="form-control"
                    value="<?php echo $row2['phone']; ?>">
                <span id="phoneNoError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="form-group">
                <label>Current Country</label>
                <input type="text" id="currentCountry" name="country" class="form-control"
                    value="<?php echo $row2['current_country']; ?>">
                <span id="crntCountryError" class="text-danger font-wight-bold"></span>
            </div>

            <div class="form-group">
                <label>Current City</label>
                <input type="text" id="currentCity" name="city" class="form-control"
                    value="<?php echo $row2['current_city']; ?>">
                <span id="crntCityError" class="text-danger font-wight-bold"></span>
            </div>
            <input style="background:#007B5E; color:white;margin-left:150px" type="submit" id="submitBtn" name="submit"
                class="btn btn-primary">

        </form>
    </div>

    <section>
        <?php include('layout/footer.php') ?>
    </section>

    <!--    creating form-->

    <script>
    function validation() {
        /*receiving input value from user*/
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phoneNumber = document.getElementById('phoneNumber').value;
        var currentCountry = document.getElementById('currentCountry').value;
        var currentCity = document.getElementById('currentCity').value;
        /*receiving user innputs*/

        /*assigning regular expressions*/
        var nameCheck = /^[A-Za-z. ]{3,30}$/;
        var emailCheck = /^[A-Za-z_0-9]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
        var mobileCheck = /^[0-9]{11}$/;
        var crntCountryCheck = /^[A-Z]{1}[A-Za-z. ]$/;
        var crntCityCheck = /^[A-Z]{1}[A-Za-z. ]$/;

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
        /*validation ends*/
    </script>



</body>

</html>