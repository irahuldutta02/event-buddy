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
    <link rel="stylesheet" href="css/card.css">

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
            <div class="content">

            <div id="events-section-heading">
                <h3>Register for Upcoming Events</h3>
            </div>

            <!-- card  -->
            <div class="row">

                <div class="card">
                    <div class="card-header">
                        <div style="background-image: url(https://images.unsplash.com/photo-1548217395-6c6095abb49c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1964&q=80);"
                            class="img">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-detais">
                            <h3>EVENT NAME</h3>
                            <p><span>BY : </span>MAKAUT</p>
                            <p><span>VENUE : </span>MAKAUT GROUND</p>
                            <p><span>START DATE : </span>20/12/2022</p>
                            <p><span>START TIME : </span>10:00 am</p>
                            <P><span>SLOTS : </span>UNLIMITED</P>
                            <a href="#" class="btn">REGISTER</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div style="background-image: url(https://images.unsplash.com/photo-1548217395-6c6095abb49c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1964&q=80);"
                            class="img">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-detais">
                            <h3>EVENT NAME</h3>
                            <p><span>BY : </span>MAKAUT</p>
                            <p><span>VENUE : </span>MAKAUT GROUND</p>
                            <p><span>START DATE : </span>20/12/2022</p>
                            <p><span>START TIME : </span>10:00 am</p>
                            <P><span>SLOTS : </span>UNLIMITED</P>
                            <a href="#" class="btn">REGISTER</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div style="background-image: url(https://images.unsplash.com/photo-1548217395-6c6095abb49c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1964&q=80);"
                            class="img">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-detais">
                            <h3>EVENT NAME</h3>
                            <p><span>BY : </span>MAKAUT</p>
                            <p><span>VENUE : </span>MAKAUT GROUND</p>
                            <p><span>START DATE : </span>20/12/2022</p>
                            <p><span>START TIME : </span>10:00 am</p>
                            <P><span>SLOTS : </span>UNLIMITED</P>
                            <a href="#" class="btn">REGISTER</a>
                        </div>
                    </div>
                </div>
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