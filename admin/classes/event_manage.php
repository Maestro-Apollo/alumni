<?php

include('database.php');
class eventManage extends database
{
    protected $link;
    public function eventFunction()
    {
        $sql = "Select * from event order by id desc";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new eventManage;
$objEvent = $obj->eventFunction();