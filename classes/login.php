<?php

include('database.php');
class loginClass extends database
{
    protected $link;
    public function loginFunction()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "Select * from user where email = '$email' ";
            $res = mysqli_query($this->link, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $pass = $row['password'];
                $passValid = password_verify($password, $pass);
                if ($passValid == true) {

                    header('location:../pages/profile.php');
                    return $res;
                } else {
                    echo "Wrong password";
                    return false;
                }
            } else {
                header('location:../pages/reg.php');
                return false;
            }
        }
        # code...
    }
}
$obj = new loginClass;
$objLogin = $obj->loginFunction();