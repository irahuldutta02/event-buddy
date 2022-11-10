<?php

session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="icon" type="image/x-icon" href="assets/logo/eb-transperent-logo.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- external css links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />

    <link rel="stylesheet" href="/style.css" />

    <!-- external css -->
    <link rel="stylesheet" href="css/signup-login.css">

    <!-- internal css  -->
    <style>

    </style>

    <!-- title of the page  -->
    <title>EVENT BUDDY || SIGNUP-LOGIN</title>





    <!-- login php -->


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
                    <a href="signup-login.php" class="nav-item active nav-link">Login / Create an Event</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- all forms  -->
    <div id="logreg-forms">





        <!-- signin form  -->
        <form class="form-signin" method="post">

            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">
                Sign in
            </h1>




            <input type="text" id="inputeventid" name="event_id" class="form-control" autofocus="" placeholder="Enter the alphanumaric event ID" pattern="[a-zA-Z0-9]+" />



            <input type="email" id="inputEmail" name="a_mail" class="form-control" placeholder="Email address" autofocus="" />

            <!-- required="" -->
            <input type="password" id="inputPassword" name="a_password" class="form-control" placeholder="Password" />

            <button class="btn btn-success btn-block" type="submit">
                <i class="fas fa-sign-in-alt"></i> Sign in
            </button>

            <a href="#" id="forgot_pswd">Forgot password?</a>

            <hr />

            <button class="btn btn-primary btn-block" type="button" id="btn-signup">
                <i class="fas fa-user-plus"></i> Create New Event
            </button>

            <a href="index.php"><i class="fas fa-angle-left"></i> Cancel</a>

        </form>
        <!-- signin php -->
        <?php

        if (isset($_POST['event_id']) && isset($_POST['a_password']) && isset($_POST['a_mail'])) {


            function validate($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $event_id = validate($_POST['event_id']);
            $a_password = validate($_POST['a_password']);
            $a_mail = validate($_POST['a_mail']);

            if (empty($event_id)) {
                // header("Location: signup-login.php?error=event id is required");
                exit();
            } elseif (empty($a_mail)) {
                exit();
            } elseif (empty($a_password)) {
                exit();
            } else {
                $sql = "SELECT * FROM admins WHERE event_id='$event_id' AND a_mail='$a_mail' AND a_password='$a_password'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($row['event_id'] === $event_id && $row['a_mail'] === $a_mail && $row['a_password']) {
                        $_SESSION['event_id'] = $row['event_id'];
                        $_SESSION['a_mail'] = $row['a_mail'];
                        // $_SESSION['a_password'] = $row['a_password'];

                        $_SESSION['event_name'] = $row['event_name'];

                        $_SESSION["event_sdate"] = $row["event_sdate"];
                        $_SESSION["event_stime"] = $row["event_stime"];
                        $_SESSION["event_etime"] = $row["event_etime"];
                        $_SESSION["event_edate"] = $row["event_edate"];
                        $_SESSION["event_venue"] = $row["event_venue"];
                        $_SESSION["organizer"] = $row["organizer"];
                        $_SESSION["event_desc"] = $row["event_desc"];
                        $_SESSION["event_broc"] = $row["event_broc"];



                        // echo "hi".
                        // echo" hi ";
                        header('Location: admin.php');
                        // open
                        exit();
                    } else {
                        echo "no such file";
                        // exit();
                    }
                } else {
                    echo "no such file";
                    // exit();
                }
            }
        } else {
            // echo "no such file";
            // exit();
        }




        ?>













        <!-- reset password form -->
        <form action="/reset/password/" class="form-reset">

            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">
                Password Reset
            </h1>

            <input type="text" id="inputeventid" class="form-control" placeholder="Enter the alphanumaric event ID" required="" autofocus="" pattern="[a-zA-Z0-9]+" />

            <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="" />

            <button class="btn btn-primary btn-block" type="submit">
                Reset Password
            </button>

            <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>

        </form>







        <!-- signup form  -->
        
        <form action="signup-login.php" method="post" class="form-signup" enctype="multipart/form-data" >

            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">
                Create New Event
            </h1>





            <input type="text" id="event-name" name="event_name" class="form-control" required="" placeholder="Event Name" />

            <input type="text" id="event-organizer" name="organizer" class="form-control" required="" placeholder="Event Organizer" autofocus="" />

            <label for="event-start-date">Event Start Date :</label>
            <input type="date" id="event-start-date" name="event_sdate" class="form-control" required="" autofocus="" />

            <label for="event-start-time">Event Start Time :</label>
            <input type="time" id="event-start-time" name="event_stime" class="form-control" required="" autofocus="" />

            <label for="event-end-date">Event End Date :</label>
            <input type="date" id="event-end-date" name="event_edate" class="form-control" required="" autofocus="" />

            <label for="event-end-time">Event End Time :</label>
            <input type="time" id="event-end-duration" name="event_etime" class="form-control" required="" autofocus="" />

            <label for="event-description">Event Description :</label>
            <textarea class="form-control" id="event-description" required="" name="event_desc" rows="3">Event Description ...</textarea>

            <input type="text" id="event-venue" class="form-control" name="event_venue" required="" placeholder="Event Venue" autofocus="" />

            <input type="text" id="event-admin-name" class="form-control" name="a_name" required="" placeholder="Event Admin Name" autofocus="" />

            <input type="email" id="event-admin-email" class="form-control" name="a_mail" required="" placeholder="Event Admin Email address" autofocus="" />

            <input type="password" id="user-pass" class="form-control" placeholder="Password" required="" autofocus="" />

            <input type="password" id="user-repeatpass" class="form-control" name="a_password" required="" placeholder="Repeat Password" autofocus="" />

            <label for="event-brochure">Event Brochure: (pdf file under 40mb)</label>
            <input type="file"  id="event-brochure" name="event_broc" value="">

            <label for="Carousel-image">Carousel image: (1, 1460x620 image) (Cover Image)</label>
            <input type="file"  multiple id="corousel-image" name="event_caro" multiple>

            <label for="Carousel-image">Carousel image: (2, 1460x620 image)</label>
            <input type="file"  multiple id="corousel-image" name="event_caro" multiple>

            <label for="Carousel-image">Carousel image: (3, 1460x620 image)</label>
            <input type="file"  multiple id="corousel-image" name="event_caro" multiple>

            <button class="btn btn-primary btn-block btn-danger" type="reset">
                <i class="fas fa-eraser"></i> Reset
            </button>

            <button class="btn btn-primary btn-block" type="submit" name="submit">
                <i class="fas fa-user-plus"></i> Create Event
            </button>

            <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>

        </form>

        <!-- signup.php -->
        <?php
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if (isset($_POST['submit'])) {
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $event_id = substr(str_shuffle($data), 0, 6);

            if (!empty($_POST['event_name']) && !empty($_POST['organizer']) && !empty($_POST['event_sdate']) && !empty($_POST['event_stime']) && !empty($_POST['event_edate']) && !empty($_POST['event_etime']) && !empty($_POST['event_desc']) && !empty($_POST['event_venue']) && !empty($_POST['a_name']) && !empty($_POST['a_mail']) && !empty($_POST['a_password'])) {

                $event_name = test_input($_POST['event_name']);
                $organizer = test_input($_POST['organizer']);
                $event_sdate = test_input($_POST['event_sdate']);
                $event_stime = test_input($_POST['event_stime']);
                $event_edate = test_input($_POST['event_edate']);
                $event_etime = test_input($_POST['event_etime']);
                $event_desc = test_input($_POST['event_desc']);
                $event_venue = test_input($_POST['event_venue']);
                $a_name = test_input($_POST['a_name']);
                $a_mail = test_input($_POST['a_mail']);
                $a_password = test_input($_POST['a_password']);
                // $event_broc = $_POST['event_broc'];

                //Inserting Event Brochure to database 
                $pdf=$_FILES['event_broc']['name'];

                $pdf_type = $_FILES['event_broc']['type'];

                $pdf_size=$_FILES['event_broc']['size'];

                $pdf_temp_loc = $_FILES['event_broc']['tmp_name'];

                $pdf_store="pdf/".$pdf;

                move_uploaded_file($pdf_temp_loc, $pdf_store);

                //Inserting carousel to database
                // $c_img1=$_FILES['c_image1']['name'];
                // $c_img2=$_FILES['c_image1']['name'];

                // $pdf_type = $_FILES['event_broc']['type'];

                // $pdf_size=$_FILES['event_broc']['size'];

                // $pdf_temp_loc = $_FILES['event_broc']['tmp_name'];

                // $pdf_store="pdf/".$pdf;

                // move_uploaded_file($pdf_temp_loc, $pdf_store);

                // $event_caro= $_POST['event_caro'];


                
                // $sql ="INSERT INTO admins (event_id, a_mail, a_name, a_password, event_name, event_sdate, event_stime, event_edate, event_etime, event_venue, organizer, event_desc, event_broc)VALUES('$event_id','$a_mail','$a_name', '$a_password', '$event_name', '$event_sdate', '$event_stime', '$event_edate', '$event_etime', '$event_venue', '$organizer', '$event_desc', '$pdf')";
                // $query = mysqli_query($conn,$sql);

                $stmt = $conn->prepare("INSERT INTO admins (event_id, a_mail, a_name, a_password, event_name, event_sdate, event_stime, event_edate, event_etime, event_venue, organizer, event_desc, event_broc) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssssssss", $event_id, $a_mail, $a_name, $a_password, $event_name, $event_sdate, $event_stime, $event_edate, $event_etime, $event_venue, $organizer, $event_desc, $pdf);
                $stmt->execute();
                $stmt->close();

                if ($stmt) {
       
                     ?><script>
                        alert("Event Created");
                        window.location.href = "index.php";
                     </script><?php
        
                }
            } else {
                ?> 
                <script>alert("Error in creating event")</script>
                <?php
            }
        }








        // header("Location:index.php");

        // exit();



        ?>
    </div>


    <!-- scripts  -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // toggleResetPswd script 
        function toggleResetPswd(e) {
            e.preventDefault();
            $("#logreg-forms .form-signin").toggle(); // display:block or none
            $("#logreg-forms .form-reset").toggle(); // display:block or none
        }

        // toggleSignUp script 
        function toggleSignUp(e) {
            e.preventDefault();
            $("#logreg-forms .form-signin").toggle(); // display:block or none
            $("#logreg-forms .form-signup").toggle(); // display:block or none
        }

        $(() => {
            // Login Register Form
            $("#logreg-forms #forgot_pswd").click(toggleResetPswd);
            $("#logreg-forms #cancel_reset").click(toggleResetPswd);
            $("#logreg-forms #btn-signup").click(toggleSignUp);
            $("#logreg-forms #cancel_signup").click(toggleSignUp);
        });
    </script>



</body>

</html>