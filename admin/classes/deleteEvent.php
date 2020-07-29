<?php
session_start();
include('database.php');
class rejectClass extends database
{
    protected $link;
    public function rejectFunction()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM `event` WHERE id = '$id' ";
        $res = mysqli_query($this->link, $sql);
        if ($res) {
            $msg = "Delete";
            $_SESSION['delete'] = $msg;
            header('location:../event_manage.php');
            return $msg;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new rejectClass;
$objreject = $obj->rejectFunction();