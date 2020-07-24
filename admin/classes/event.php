<?php
session_start();
include('database.php');
class event extends database
{
    protected $link;
    public function eventFunction()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $details = addslashes($_POST['details']);
            $date = $_POST['date'];
            $time = $_POST['time'];
            $image = time() . '_' . $_FILES['image']['name'];
            $venue = $_POST['venue'];
            $type = $_POST['type'];
            $target = 'event_img/' . $image;

            $sql = "INSERT INTO `event` (`id`, `name`, `email`, `details`, `image`, `attachment`, `venue`, `type`, `date`, `time`, `created`, `updated`) VALUES (NULL, '$name', NULL, '$details', '$image', NULL, '$venue', '$type', '$date', '$time', NULL, NULL)";
            $res = mysqli_query($this->link, $sql);
            if ($res) {
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                $msg = "Added";
                // echo "Event Created";
                return $msg;
            } else {
                $msg = "Not_Added";

                return $msg;
            }
        }

        # code...
    }
}
$obj = new event;
$objEvent = $obj->eventFunction();