<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Update Informationo</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!--    <link rel="stylesheet" href="profile.css" />-->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/update_Info.css">

</head>

<body class="Main">

    <?php
    session_start();
    /*session variable that holds user's mail and id*/
    $uMail = $_SESSION["user_mail"];
    $uId =  $_SESSION["user_id"];

    /*defining variabes for database connection*/
    $hostname = "localhost:3325";
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

    /*updating image*/
    if (isset($_POST['submit1'])) {
        $image = time() . '_' . $_FILES['image']['name'];
        $target = 'user_img/' . $image;

        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $userInoUo = "UPDATE user_info SET image = '$image' WHERE user_id='$uId'";

        $up2 = mysqli_query($link, $userInoUo);
        header("location:update_Info.php");
    }


    /*updating information*/
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

        <h2 class="header">Update Profile</h2>

        <!--creating form and image area starts-->
        <div class="row">
            <!--image area starts-->
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="image_area">
                            <img class="user_image" src="user_img/<?php echo $row2['image']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <form class="ImgForm" method="post" enctype="multipart/form-data">
                            <!--                <p>Image:</p>-->
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input Imgcng" id="customFile" name="image"
                                    value="Browse Photo">
                                <label class="custom-file-label" for="customFile">New Photo</label>
                            </div><br>
                            <input class="inputBtn" type="submit" id="submitBtn" name="submit1" class="btn btn-primary"
                                value="Change Image">

                        </form>


                    </div>
                </div>

            </div>
            <!--image area ends-->

            <!--form area for update starts-->
            <div class="col-md-7">

                <form class="Form" onsubmit="return validation()" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="<?php echo $row2['name']; ?>">
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
                    <input style="background:#007B5E" type="submit" id="submitBtn" name="submit"
                        class="btn btn-primary">

                </form>

            </div>
            <!--form area for update ends-->
        </div>
        <!--ccreating form and image area ends-->

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