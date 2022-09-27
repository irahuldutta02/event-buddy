<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EVENT BUDDY || HOME</title>

    <link rel="icon" type="image/x-icon" href="assets/logo/eb-transperent-logo.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/index.css">

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
                    <a href="index.php#events-section" class="nav-item nav-link">Events</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="signup-login.php" class="nav-item nav-link">Login / Creat an Event</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- home-heading  -->
        <div class="p-5 home-heading">
            <div class="home-heading-content">
                <h1>Welcome to Event Buddy</h1>
                <p class="lead">Manage your events smartly
                <p>
                    <a href="signup-login.php" type="button" class="btn btn-primary btn-lg">Login / Creat an Event</a>
                    <a href="#events-section" type="button" class="btn btn-primary btn-lg">Register for Event</a>
                </p>
            </div>
        </div>

        <!-- events-section -->
        <div id="events-section">
            <div id="events-section-heading">
                <h3>Register for Upcoming Events</h3>
            </div>

        <?php 
          
          $sql = "SELECT * FROM admins ORDER BY event_sdate";
          $result = $conn->query($sql);
        
          
        $event_ids = array();

        $i=$result->num_rows; 
        // echo "$result->num_rows";
        $_SESSION["i"]=$i;
        

          if ($result->num_rows > 0) {
         
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $event_ids[$i]=$row["event_id"];

        ?><div class="card" style="width: 300px;">
                <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" class="card-img-top" alt="Sample Image">
                <div class="card-body text-center">
                    <h5 class="card-title"> <?php echo $row["event_name"]?> </h5>
                    <p class="card-Organiser"> <?php echo $row["organizer"]?></p>
                    <p class="card-date-time">Start Date & time : [<?php echo $row['event_sdate']; ?>] [<?php echo $row['event_stime']; ?>] </p>
                    <p class="card-date-time">End Date & time : [<?php echo $row['event_edate']; ?>] [<?php echo $row['event_etime']; ?>] </p>
                    <p class="card-Venue">Venue :  <?php echo $row["event_venue"]?></p>
                    <a href="event.php" type="button" class="btn btn-primary">Register</a>
                </div>
            </div>
          
            <?php
        $i--;  
        }
        $_SESSION["event_ids"]= $event_ids;
          } else {
              echo "0 results";
          }
           

            
            ?>
            









            <!-- <div class="card" style="width: 300px;">
                <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" class="card-img-top" alt="Sample Image">
                <div class="card-body text-center">
                    <h5 class="card-title">Event Name</h5>
                    <p class="card-Organiser">[Maulana Abul Klam Azad University Of Technology, West Bengal] </p>
                    <p class="card-date-time">Start Date & time : [20/12/2022] [10.00 am] </p>
                    <p class="card-date-time">End Date & time : [21/12/2022] [03.00 pm] </p>
                    <p class="card-Venue">Venue : University  Ground</p>
                    <a href="event.html" type="button" class="btn btn-primary">Register</a>
                </div>
            </div> -->

            <!-- <div class="card" style="width: 300px;">
                <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" class="card-img-top" alt="Sample Image">
                <div class="card-body text-center">
                    <h5 class="card-title">Event Name</h5>
                    <p class="card-Organiser">[Maulana Abul Klam Azad University Of Technology, West Bengal] </p>
                    <p class="card-date-time">Start Date & time : [20/12/2022] [10.00 am] </p>
                    <p class="card-date-time">End Date & time : [21/12/2022] [03.00 pm] </p>
                    <p class="card-Venue">Venue : University  Ground</p>
                    <a href="event.html" type="button" class="btn btn-primary">Register</a>
                </div>
            </div> -->

            <!-- <div class="card" style="width: 300px;">
                <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" class="card-img-top" alt="Sample Image">
                <div class="card-body text-center">
                    <h5 class="card-title">Event Name</h5>
                    <p class="card-Organiser">[Maulana Abul Klam Azad University Of Technology, West Bengal] </p>
                    <p class="card-date-time">Start Date & time : [20/12/2022] [10.00 am] </p>
                    <p class="card-date-time">End Date & time : [21/12/2022] [03.00 pm] </p>
                    <p class="card-Venue">Venue : University  Ground</p>
                    <a href="event.html" type="button" class="btn btn-primary">Register</a>
                </div>
            </div> -->

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