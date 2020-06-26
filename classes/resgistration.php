<?php

include('database.php');
session_start();
class resgistrationClass extends database
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
            $password = $_POST['password'];
            $image = time() . '_' . $_FILES['image']['name'];
            $target = '../user_img/' . $image;

            $pass = password_hash("$password", PASSWORD_DEFAULT);

            $sqlEmail = "Select * from user where email = '$email' ";
            $resEmail = mysqli_query($this->link, $sqlEmail);
            if (mysqli_num_rows($resEmail) > 0) {
                echo "Email is already taken";
                return false;
            } else {
                $sql = "INSERT INTO `user` (`id`, `email`, `password`, `token`, `is_valid`, `created`, `updated`) VALUES (NULL, '$email', '$pass', NULL, NULL, NULL, NULL)";
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
                        echo "Added";

                        /*passing email and id using session variable to profile page*/

                        $_SESSION["user_mail"] = $email;
                        $_SESSION["user_id"] = $id;
                        $_SESSION["name"] = $name;

                        header("location:profile.php");
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
$obj = new resgistrationClass;
$ObjReg = $obj->resgistrationFunction();