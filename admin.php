<?php
session_start();
include "db_conn.php";
?>
<?php
    /* at the top of 'check.php' */
    if(isset($_SESSION['event_id']) &&  isset($_SESSION['a_mail'])){
        // redirect them to your desired location
       
    
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EVENT BUDDY || ADMIN</title>

    <link rel="icon" type="image/x-icon" href="assets/logo/eb-transperent-logo.png" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><img style="height:40px; width: 40px;
                " src="assets/logo/eb-white-bg-logo.png" alt=""> Event Buddy</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="logout.php" class="nav-item nav-link active">logout <i
                            class="bi bi-box-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- home-heading  -->
        <div id="event-details" class="p-5 home-heading">


            <div class="home-heading-content">
                <div class="container-lg my-3">
                    <h1> <?php echo $_SESSION['event_name']; ?> </h1>
                    <p class="lead"> <?php echo $_SESSION['organizer']; ?>
                    <p>
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                          
                        <?php 
                        
                        $event_id =  $_SESSION['event_id'];
                        $sql = "SELECT * FROM admins WHERE event_id ='$event_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="carousel-item active">
                                <img src="image/<?php echo $row['c_image1']?>"
                                    class="d-block w-100" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="image/<?php echo $row['c_image2']?>"
                                    class="d-block w-100" alt="Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img src="image/<?php echo $row['c_image3']?>"
                                    class="d-block w-100" alt="Slide 3">
                            </div>
                        </div>


                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <?php

    }
} else {
    echo "0 results";
}
?>

                <p class="card-date-time"> <b>Start Date & time :</b> [<?php echo $_SESSION['event_sdate']; ?>]
                    [<?php echo $_SESSION['event_stime']; ?>] </p>
                <p class="card-date-time"><b>End Date & time :</b> [<?php echo $_SESSION['event_edate']; ?>]
                    [<?php echo $_SESSION['event_etime']; ?>] </p>
                <p class="card-Venue"><b>Venue :</b> <?php echo $_SESSION['event_venue']; ?></p>
                <p class="card-event-description-title"><b>Event Description :</b></p>
                <p class="card-event-description"><?php echo $_SESSION['event_desc']; ?></p>
               
               
                <a target="_blank" href="pdf/<?php echo $_SESSION['event_broc'];?>" type="button" class="btn btn-primary">Event Brochure</a>

                <a href="#" id="edit-event" type="button" class="btn btn-primary">Edit Event Details</a>
                <a href="#" id="p-list-btn" type="button" class="btn btn-primary">Participant List</a>
                <a href="#" id="l-p-list-btn" type="button" class="btn btn-primary">Live Participant List</a>
            </div>
        </div>

        <!-- signup form  -->
        <div id="logreg-forms">
            <form action="/signup/" class="form-signup">

                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">
                    Edit Event Details
                </h1>

                <input type="text" id="event-name" class="form-control" placeholder="Event Name" required=""
                    autofocus="" />

                <input type="text" id="event-organizer" class="form-control" placeholder="Event Organizer" required=""
                    autofocus="" />

                <label for="event-start-date">Event Start Date :</label>
                <input type="date" id="event-start-date" class="form-control" required="" autofocus="" />

                <label for="event-start-time">Event Start Time :</label>
                <input type="time" id="event-start-time" class="form-control" required="" autofocus="" />

                <label for="event-end-date">Event End Date :</label>
                <input type="date" id="event-end-date" class="form-control" required="" autofocus="" />

                <label for="event-end-time">Event End Time :</label>
                <input type="time" id="event-end-duration" class="form-control" required="" autofocus="" />

                <label for="event-description">Event Description :</label>
                <textarea class="form-control" id="event-description" rows="3">Event Description ...</textarea>

                <input type="text" id="event-venue" class="form-control" placeholder="Event Venue" required=""
                    autofocus="" />

                <label for="event-brochure">Event Brochure:</label>
                <input type="file" id="event-brochure" name="event-brochure">

                <label for="Carousel-image">Carousel image: (1, 1460x620 image) (Cover Image)</label>
                <input type="file" accept="image/*" multiple id="corousel-image" name="event_caro" multiple>

                <label for="Carousel-image">Carousel image: (2, 1460x620 image)</label>
                <input type="file" accept="image/*" multiple id="corousel-image" name="event_caro" multiple>

                <label for="Carousel-image">Carousel image: (3, 1460x620 image)</label>
                <input type="file" accept="image/*" multiple id="corousel-image" name="event_caro" multiple>

                <button class="btn btn-primary btn-block btn-danger" type="reset">
                    <i class="fas fa-eraser"></i> Reset
                </button>

                <button class="btn btn-primary btn-block" type="submit">
                    <i class="fas fa-user-plus"></i> Save
                </button>

                <a href="#" id="back-1"><i class="fas fa-angle-left"></i> Back</a>

            </form>
        </div>


        <!-- participant-list -->
        <div id="participant-list" class="participant-list">
            <div class="participant-list-title">
                <h2>Participant List</h2>
            </div>

            <!-- <table class="table table-dark">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registration Date</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                        <td>10/10/2022</td>
                        <td><button><i class="bi bi-shield-fill-x"></i></button></td>
                        <td>Attended</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                        <td>10/10/2022</td>
                        <td><button><i class="bi bi-shield-fill-x"></i></button></td>
                        <td>Not Attended</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                        <td>10/10/2022</td>
                        <td><button><i class="bi bi-shield-fill-x"></i></button></td>
                        <td></td>
                    </tr>
                </tbody>
                </table> -->

            <!-- <?php ?> -->

            <?php

            $event =  $_SESSION['event_id'];
            // PHP MySQL Use The ORDER BY Clause
            $sql = "SELECT * FROM participants WHERE event_id ='$event'";
            $result = $conn->query($sql);
            $row_cont = 1;
            if ($result->num_rows > 0) {
                echo "
                        <table class='table table-dark'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                  
                                </tr>
                            </thead>
                            
                            <tbody>
                        
                            ";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . "$row_cont" . "</td><td>" . $row["p_name"] . "</td><td>" . $row["p_email"] . "</td></tr>";
                    $row_cont++;
                }
            } else {
                echo "0 results";
            }
            ?>
            <!-- <tr>
                        <td>1</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                        <td>10/10/2022</td>
                        <td><button><i class="bi bi-shield-fill-x"></i></button></td>
                        <td>Attended</td>
                    </tr> -->
            <!-- <tr>
                        <td>2</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                        <td>10/10/2022</td>
                        <td><button><i class="bi bi-shield-fill-x"></i></button></td>
                        <td>Not Attended</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                        <td>10/10/2022</td>
                        <td><button><i class="bi bi-shield-fill-x"></i></button></td>
                        <td></td>
                    </tr> -->
            </tbody>
            </table>
            <button class="btn btn-primary">Download As Excel File</button><br>
            <a href="#" id="back-2"><i class="fas fa-angle-left"></i> Back</a>
        </div>


        <!-- live-participant-list -->
        <div id="live-participant-list" class="participant-list">
            <div class="participant-list-title">
                <h2>Live Participant List</h2>
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Test Name</td>
                        <td>email@testemail.com</td>
                    </tr>

                </tbody>
            </table> <br>
            <a href="#" id="back-3"><i class="fas fa-angle-left"></i> Back</a>
        </div>
        <!-- footer  -->
        <footer>
            <div class="footer-content">
                <a href="https://github.com/rdtech2002/event-buddy-university-project-01" target="_blank"><i
                        class="bi bi-github"></i></a>
                <p>Copyright © 2022 Event Buddy</p>
            </div>
        </footer>
    </div>

    <!-- scripts  -->

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function toggleplist(e) {
        e.preventDefault();
        $("#event-details").toggle();
        $("#participant-list").toggle();
    }

    function togglelplist(e) {
        e.preventDefault();
        $("#event-details").toggle();
        $("#live-participant-list").toggle();
    }

    function editevent(e) {
        e.preventDefault();
        $("#event-details").toggle();
        $("#logreg-forms .form-signup").toggle();
    }

    function back1(e) {
        e.preventDefault();
        $("#event-details").toggle();
        $("#logreg-forms .form-signup").toggle();
    }

    function back2(e) {
        e.preventDefault();
        $("#event-details").toggle();
        $("#participant-list").toggle();
    }

    function back3(e) {
        e.preventDefault();
        $("#event-details").toggle();
        $("#live-participant-list").toggle();
    }

    $(() => {
        // Login Register Form
        $("#p-list-btn").click(toggleplist);
        $("#l-p-list-btn").click(togglelplist);
        $("#edit-event").click(editevent);
        $("#back-1").click(back1);
        $("#back-2").click(back2);
        $("#back-3").click(back3);

    });
    </script>
</body>

</html>


<?php
}else{
    header("Location: signup-login.php");
    exit();
        // echo "hi";
}
?>