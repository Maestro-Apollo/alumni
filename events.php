<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/gallery.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/events.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Events</title>
</head>

<body>

    <section>
        <?php include('layout/header.php'); ?>
    </section>

    <div class="container mb-5">
        <div class="row">

            <div class="col-md-8 wow slideInLeft">
                <div class="left-div p-5">
                    <button class="btn btn-success">2020-08-13</button>
                    <div class="row pt-4">

                        <div class="col-md-6">
                            <img src="image/image5.jpg" class="img-fluid pb-4" alt="image">
                            <p class="ml-1">Event Activity</p>
                            <p class="ml-1">Event Activity</p>
                        </div>
                        <div class="col-md-6 list_text">
                            <h5>NEW TOUR</h5>
                            <p>Test Activity</p>
                            <p>Date</p>
                            <p>Time</p>
                            <p>Type</p>
                            <p>Duration</p>
                        </div>
                    </div>
                </div>
                <button class="btn btn-info mt-5">Add Event</button>

            </div>

            <div class="col-md-4 right-div wow slideInRight">

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
            </div>
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