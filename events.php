<?php

include('classes/database.php');
class eventData extends database
{
    protected $link;
    public function eventFunction()
    {
        if (isset($_POST['search'])) {
            $name = $_POST['name'];
            $sql = "select * from event where name like '%$name%' order by id desc";
            $res = mysqli_query($this->link, $sql);
        } else {
            $sql = "select * from event order by id desc";
            $res = mysqli_query($this->link, $sql);
        }

        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new eventData;
$objEvent = $obj->eventFunction();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/gallery.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/events.css">
    <title>Events</title>
</head>

<body style="background-color: #fff;">

    <section>
        <?php include('layout/header.php'); ?>
    </section>

    <div class="container mb-5">
        <div class="">
            <div class="text-right">
                <form class=" pt-5" method="post">
                    <input placeholder="Search event name" class="form-control d-inline-block w-auto" name="name"
                        type="search" placeholder="Search" aria-label="Search">
                    <button name="search" class="btn btn-info mb-1" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">



            <?php if ($objEvent) { ?>
            <?php while ($row = mysqli_fetch_assoc($objEvent)) { ?>
            <div class="col-md-12 wow slideInUp shadow mb-5" style="background: rgb(2,0,36);
background: linear-gradient(141deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 100%);">
                <div class="left-div p-5">
                    <button class="btn btn-info" style=""><?php echo $row['date']; ?></button>
                    <div class="row pt-4">

                        <div class="col-md-6">
                            <div>
                                <img src="admin/event_img/<?php echo $row['image']; ?>" class="event_img img-fluid pb-4"
                                    alt="image"></div>

                        </div>
                        <div class="col-md-6 list_text text-light">
                            <h5><?php echo $row['name']; ?></h5>
                            <p>Venue: <?php echo $row['venue']; ?></p>
                            <p>Time: <?php echo $row['time']; ?></p>
                            <p>Category: <?php echo $row['type']; ?></p>
                            <p>Details: <?php echo $row['details']; ?></p>
                        </div>
                    </div>

                </div>

            </div>
            <?php } ?>
            <?php } else { ?>
            <p>No Event</p>
            <?php } ?>

            <!-- <div class="col-md-4 right-div wow slideInRight">

                <h3 class="header">Event Finder</h3>
                <hr>
                <div class="searchbar">
                    <form action="/action_page.php">
                        <input type="text" class="form-control" placeholder="Search events here...." name="search">
                    </form>
                </div>
                <h4 class="news mt-4">NEWS</h4>
                <hr>
                <a href="#">Seminar on ROBOTICS - Introductions And Challenges</a>
                <br>
                <a href="#">Seminar on ROBOTICS - Introductions And Challenges</a>
                <br>
                <a href="#">Seminar on ROBOTICS - Introductions And Challenges</a>

                <h4 class="archives mt-4">ARCHIVES</h4>
                <hr>
                <a href="#">December 2019</a>
                <br>
                <a href="#">July 2019</a>
                <br>
                <a href="#">March 2019</a>
                <br>
                <a href="#">January 2019</a>
            </div> -->
        </div>

    </div>



    <section>
        <?php include('layout/footer.php'); ?>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script>
    new WOW().init();
    </script>

</body>

</html>