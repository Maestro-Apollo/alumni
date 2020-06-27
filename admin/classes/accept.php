<?php

include('database.php');
class acceptClass extends database
{
    protected $link;
    public function acceptFunction()
    {
        $id = $_GET['id'];
        $valid = 1;
        $sql = "UPDATE `user` SET `is_valid`='$valid' WHERE id = '$id' ";
        $res = mysqli_query($this->link, $sql);
        if ($res) {
            header('location:../tables.php');
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new acceptClass;
$objAccept = $obj->acceptFunction();