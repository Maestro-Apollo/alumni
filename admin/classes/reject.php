<?php

include('database.php');
class rejectClass extends database
{
    protected $link;
    public function rejectFunction()
    {
        $id = $_GET['id'];
        $sql = "DELETE from user_info WHERE `user_id` = '$id' ";
        $res = mysqli_query($this->link, $sql);
        if ($res) {
            $sql2 = "DELETE from user WHERE `id` = '$id'";
            $res2 = mysqli_query($this->link, $sql2);
            if ($res2) {
                header('location:../tables.php');
                return $res2;
            } else {
                return false;
            }
        } else {
            return false;
        }
        # code...
    }
}
$obj = new rejectClass;
$objreject = $obj->rejectFunction();