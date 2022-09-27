<?php
session_start();
include "db_conn.php";
?>


<?php 
        //   $hi=$_SESSION['event_ids'];
        //   $sql = "SELECT * FROM admins WHERE event_id = '$hi'";
        //   $result = $conn->query($sql);

        //   if ($result->num_rows > 0) {

        //   // output data of each row
        //   while($row = $result->fetch_assoc()) {
         

            
          $i=$_SESSION["i"];

          if ($_SESSION["i"] > 0) {

          
        //   while($i>=1) 
          for(;$i>=1; $i--){
            $temp=$_SESSION['event_ids'][$i];
            $sql = "SELECT * FROM admins WHERE event_id = $temp";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                // echo $row['event_id'];d
                
            
            
         

      ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $row["event_name"]?></title>

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


            <!-- <div class="container-lg my-3">
                    <h1>Event Name</h1>
                    <p class="lead">MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL
                    <p> -->

        

               
                <div class="container-lg my-3">
                    <h1><?php echo $row["event_name"]?></h1>
                    <p class="lead"><?php echo $row["organizer"]?>
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
                                <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                    class="d-block w-100" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                    class="d-block w-100" alt="Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
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

                <p class="card-date-time"> <b>Start Date & time :</b> [20/12/2022] [10.00 am] </p>
                <p class="card-date-time"><b>End Date & time :</b> [21/12/2022] [03.00 pm] </p>
                <p class="card-Venue"><b>Venue :</b> University Ground</p>
                <p class="card-event-description-title"><b>Event Description :</b></p>
                <p class="card-event-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur
                    quasi molestiae quos in asperiores earum, quod odio architecto enim, magni libero reprehenderit
                    dicta labore, provident magnam voluptates accusantium ratione consectetur optio nisi quae
                    cupiditate. Neque fugit, incidunt minima eaque impedit, corrupti natus quibusdam, dolores et nam
                    placeat. Eos, temporibus fugiat?</p>
                <a href="#" type="button" class="btn btn-primary">Event Brochure</a>

                <!-- event-registration-form  -->
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Register for the Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">                        
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control">
                        </div>                      
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                        
                    
            </div>

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

</body>

</html>


<?php
       
            }
           
        }
         
          } else {
              echo "0 results";
          }
            
            ?>