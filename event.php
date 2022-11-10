<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php

$event_id = $_GET['event_id'];
// $events_id =$_POST['events_id'];

$sql = "SELECT event_id,event_name, organizer, event_sdate, event_stime, event_edate, event_etime, event_venue, event_desc, event_broc, c_image1, c_image2, c_image3  FROM admins WHERE event_id='{$event_id}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {



        // event name
        // event organizer
        // Start Date & time
        // End Date & time 
        // Venue 
        // Event Description
        // Event Description :
        // Event Brochure


?>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>event name</title>

            <link rel="icon" type="image/x-icon" href="assets/logo/eb-transperent-logo.png" />

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

            <link rel="stylesheet" href="css/event.css">

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
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="index.php#events-section" class="nav-item active nav-link">Events</a>
                        </div>
                        <div class="navbar-nav ms-auto">
                            <a href="signup-login.php" class="nav-item active nav-link">Login / Creat an Event</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container">
                <!-- home-heading  -->
                <div class="p-5 home-heading">
                    <div class="home-heading-content">


                        <!-- <div class="container-lg my-3">
                    <h1>Event Name</h1>
                    <p class="lead">MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL
                    <p> -->




                        <div class="container-lg my-3">
                            <h1><?php echo $row['event_name']; ?></h1>
                            <p class="lead"><?php echo $row['organizer']; ?>
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
                                    <div class="carousel-item active">
                                        <img src="image/<?php echo $row['c_image1'];?>" class="d-block w-100" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="image/<?php echo $row['c_image2'];?>" class="d-block w-100" alt="Slide 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="image/<?php echo $row['c_image3'];?>" class="d-block w-100" alt="Slide 3">
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

                        <p class="card-date-time"> <b>Start Date & time :</b> [<?php echo $row['event_sdate']; ?>] [<?php echo $row['event_stime']; ?>] </p>
                        <p class="card-date-time"><b>End Date & time :</b> [<?php echo $row['event_edate']; ?>] [<?php echo $row['event_etime']; ?>] </p>
                        <p class="card-Venue"><b>Venue :</b> <?php echo $row['event_venue']; ?></p>
                        <p class="card-event-description-title"><b>Event Description :</b></p>
                        <p class="card-event-description"><?php echo $row['event_desc']; ?></p>
                      
                       
                        <a target="_blank" href="pdf/<?php echo $row['event_broc'];?>" type="button" class="btn btn-primary">Event Brochure</a>

                       
                        <!-- event-registration-form  -->
                        <span id="Message"></span>


                        <form  action="event.php?event_id=<?php echo $event_id?>" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title">Register for the Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" id="p_name" class="form-control form_data" name="p_name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email:</label>
                                    <input type="email" id="p_email" class="form-control form_data" name="p_email">
                                </div>

                               

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                     
                        <!-- inserting data to database -->
                        <?php 
                         function test_input($data)
                         {
                             $data = trim($data);
                             $data = stripslashes($data);
                             $data = htmlspecialchars($data);
                             return $data;
                         }
                        
                        if(isset($_POST['submit'])){
                            if(!empty($_POST['p_name']) && !empty($_POST['p_email'])){
                                $p_name = test_input($_POST['p_name']);
                                $p_email = test_input($_POST['p_email']);
                                $stmt = $conn->prepare("INSERT INTO participants (p_email, event_id, p_name) VALUES(?, ?, ?)");
                                $stmt->bind_param("sss", $p_email, $event_id, $p_name);
                                $stmt->execute();
                                $stmt->close();
                                if($stmt){
                                    ?><script>
                                        alert("Registered for the event");
                                        window.location.href = "index.php";
                                        </script><?php
                                }
                                else{
                                    ?><script>
                                    alert("Error try again");
                                    window.location.href = "index.php";
                                    </script><?php
                                }
                            }
                        }
                        ?>
                       
                    </div>

                </div>

                <!-- footer  -->
                <footer>
                    <div class="footer-content">
                        <a href="https://github.com/rdtech2002/event-buddy-university-project-01" target="_blank"><i class="bi bi-github"></i></a>
                        <p>Copyright © 2022 Event Buddy</p>
                    </div>
                </footer>
            </div>

        </body>

</html>




<?php

    }
} else {
    echo "0 results";
}
?>