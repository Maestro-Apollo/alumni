<?php

include('database.php');
class pendingMember extends database
{
    protected $link;
    public function pendingFunction()
    {
        $sql = "SELECT * FROM user INNER JOIN user_info ON user.id = user_info.user_id WHERE user.is_valid = 0 ";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {

            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new pendingMember;
$objPending = $obj->pendingFunction();