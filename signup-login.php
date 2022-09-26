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
                    <a href="index.php#events-section" class="nav-item nav-link">Events</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="signup-login.php" class="nav-item nav-link">Login / Create an Event</a>
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

            <a href="index.html"><i class="fas fa-angle-left"></i> Cancel</a>

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
            } elseif (empty($a_mail)) {
            } elseif (empty($a_password)) {
            } else {
                $sql = "SELECT * FROM admins WHERE event_id='$event_id' AND a_mail='$a_mail' AND a_password='$a_password'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($row['event_id'] === $event_id && $row['a_mail'] === $a_mail && $row['a_password']) {
                        $_SESSION['event_id'] = $row['event_id'];
                        $_SESSION['a_mail'] = $row['a_mail'];
                        $_SESSION['a_password'] = $row['a_password'];

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
        <form method="post" class="form-signup ">

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

            <label for="event-brochure">Event Brochure:(pdf file under 40mb)</label>
            <input type="file" accept="application/pdf" id="event-brochure" name="event_broc">

            <label for="Carousel-image">Carousel image: (3, 1460x620 images)</label>
            <input type="file" accept="image/*" multiple id="corousel-image" name="event_caro">

            <button class="btn btn-primary btn-block btn-danger" type="reset">
                <i class="fas fa-eraser"></i> Reset
            </button>

            <button class="btn btn-primary btn-block" type="submit">
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $event_id = substr(str_shuffle($data), 0, 6);
            // $_SESSION["event_id"] = $event_id;
            // echo "$event_id"; 

            // //admin name
            // if (empty($_POST["a_name"])) {
            //   $a_nameErr = "Name is required";
            // } else {
            //   $a_name = test_input($_POST["a_name"]);
            //   $_SESSION["a_name"]= $a_name;
            //   // check if name only contains letters and whitespace
            //   if (!preg_match("/^[a-zA-Z-' ]*$/",$a_name)) {
            //     $a_nameErr = "Only letters and white space allowed";
            //   }
            // }

            // //admin mail
            // if (empty($_POST["a_mail"])) {
            //   $a_mailErr = "Email is required";
            // } else {
            //   $a_mail = test_input($_POST["a_mail"]);
            //   $_SESSION["a_mail"]= $a_mail;
            //   // check if e-mail address is well-formed
            //   if (!filter_var($a_mail, FILTER_VALIDATE_EMAIL)) {
            //     $a_mailErr = "Invalid email format";
            //   }
            // }

            // // admin password
            // if (empty($_POST["a_password"])) {
            //   $a_passwordErr = "Password is required";
            // } else {
            //   $a_password = test_input($_POST["a_password"]);
            // //   $_SESSION["event_id"]= $event_id;

            // }
            // //event name
            // if (empty($_POST["event_name"])) {
            //   $event_nameErr = "Password is required";
            // } else {
            //   $event_name = test_input($_POST["event_name"]);
            //   $_SESSION["event_name"]= $event_name;
            //   if (!preg_match("/^[a-zA-Z-' ]*$/",$event_name)) {
            //     $event_nameErr = "Only letters and white space allowed";
            //   }

            //   //event start date
            // if (empty($_POST["event_sdate"])) {
            //   $event_sdateErr = "Event start date is required";
            // } else {
            //   $event_sdate = test_input($_POST["event_sdate"]);
            //   $_SESSION["event_sdate"]= $event_sdate;


            // }
            //   //event start time
            // if (empty($_POST["event_stime"])) {
            //   $event_stimeErr = "Password is required";
            // } else {
            //   $event_stime = test_input($_POST["event_stime"]);
            //   $_SESSION["event_stime"]= $event_stime;


            // }
            //   //event end date
            // if (empty($_POST["event_edate"])) {
            //   $event_edateErr = "Password is required";
            // } else 
            //   $event_edate = test_input($_POST["event_edate"]);
            //   $_SESSION["event_edate"]= $event_edate;


            // }
            //   //event end time
            // if (empty($_POST["event_etime"])) {
            //   $event_etimeErr = "Password is required";
            // } else {
            //   $event_etime = test_input($_POST["event_etime"]);
            //   $_SESSION["event_etime"]= $event_etime;


            // }

            // //event venue
            // if (empty($_POST["event_venue"])) {
            //     $event_venueErr = "Event venue  is required";
            //   } else {
            //     $event_venue = test_input($_POST["event_venue"]);
            //     $_SESSION["event_venue"]= $event_venue;

            //   }


            // //event organizer
            // if (empty($_POST["organizer"])) {
            //     $organizerErr = "Event organizer  is required";
            //   } else {
            //     $organizer = test_input($_POST["organizer"]);
            //     $_SESSION["organizer"]= $organizer;

            //   }
            // //event description
            // if (empty($_POST["event_desc"])) {
            //     $event_descErr = "event_desc  is required";
            //   } else {
            //     $event_desc = test_input($_POST["event_desc"]);
            //     $_SESSION["event_desc"]= $event_desc;

            //   }

            //   //event brochure
            // if (empty($_POST["event_broc"])) {
            //     $event_brocErr = "Event Brochure  is required";
            //   } else {
            //     $event_broc= test_input($_POST["event_broc"]);
            //     // $_SESSION["event_id"]= $event_id;

            //   }


            //   //event carousel
            // if (empty($_POST["event_caro"])) {
            //     $event_caroErr = "Event carousel  is required";
            //   } else {
            //     $event_caro= test_input($_POST["event_broc"]);
            //     // $_SESSION["event_id"]= $event_id;

            //   }



            //admin name
            if (empty($_POST["a_name"])) {
            } else {
                $a_name = test_input($_POST["a_name"]);
                // $_SESSION["a_name"] = $a_name;
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/", $a_name)) {
                    $a_nameErr = "Only letters and white space allowed";
                }
            }

            //admin mail
            if (empty($_POST["a_mail"])) {
            } else {
                $a_mail = test_input($_POST["a_mail"]);
                // $_SESSION["a_mail"] = $a_mail;
                // check if e-mail address is well-formed
                if (!filter_var($a_mail, FILTER_VALIDATE_EMAIL)) {
                    $a_mailErr = "Invalid email format";
                }
            }

            // admin password
            if (empty($_POST["a_password"])) {
            } else {
                $a_password = test_input($_POST["a_password"]);
                //   $_SESSION["event_id"]= $event_id;

            }
            //event name
            if (empty($_POST["event_name"])) {
            } else {
                $event_name = test_input($_POST["event_name"]);
                // $_SESSION["event_name"] = $event_name;
                if (!preg_match("/^[a-zA-Z-' ]*$/", $event_name)) {
                    $event_nameErr = "Only letters and white space allowed";
                }

                //event start date
                if (empty($_POST["event_sdate"])) {
                } else {
                    $event_sdate = test_input($_POST["event_sdate"]);
                }
                //event start time
                if (empty($_POST["event_stime"])) {
                } else {
                    $event_stime = test_input($_POST["event_stime"]);
                }
                //event end date
                if (empty($_POST["event_edate"])) {
                } else
                    $event_edate = test_input($_POST["event_edate"]);
            }
            //event end time
            if (empty($_POST["event_etime"])) {
            } else {
                $event_etime = test_input($_POST["event_etime"]);
            }

            //event venue
            if (empty($_POST["event_venue"])) {
            } else {
                $event_venue = test_input($_POST["event_venue"]);
            }


            //event organizer
            if (empty($_POST["organizer"])) {
            } else {
                $organizer = test_input($_POST["organizer"]);
            }
            //event description
            if (empty($_POST["event_desc"])) {
            } else {
                $event_desc = test_input($_POST["event_desc"]);
            }

            //event brochure
            if (empty($_POST["event_broc"])) {
            } else {
                $event_broc = test_input($_POST["event_broc"]);
                // $pdf=$_FILES['pdf']['name'];
                // $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
                // $pdf_store="pdf/".$pdf;

                // move_uploaded_file($pdf_tem_loc,$pdf_store);

            }


            //event carousel
            if (empty($_POST["event_caro"])) {
            } else {
                $event_caro = test_input($_POST["event_broc"]);
                // $_SESSION["event_id"]= $event_id;

            }

            // //   <br>
            // echo "admin name :$a_name <br>";
            // echo "admin mail: $a_mail <br>";
            // echo "admin password: $a_password <br>";
            // echo "event name : $event_name <br>";
            // echo"event start date and time : $event_sdate";
            // echo"$event_stime <br>";
            // echo"event end date and time : $event_edate";
            // echo"$event_etime <br>";

            // echo "event brochure: $event_broc <br>";
            // echo"event carousel: $event_caro <br>";

            // $filePointer = fopen($_FILES['fileUpload']['tmp_name'], 'r');
            // $fileData = fread($filePointer, filesize($_FILES['fileUpload']['tmp_name']));
            // $fileData = addslashes($fileData);

            $stmt = $conn->prepare("INSERT INTO admins (event_id, a_mail, a_name, a_password, event_name, event_sdate, event_stime, event_edate, event_etime, event_venue, organizer, event_desc, event_broc, event_caro) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssssbb", $event_id, $a_mail, $a_name, $a_password, $event_name, $event_sdate, $event_stime, $event_edate, $event_etime, $event_venue, $organizer, $event_desc, $event_broc, $event_caro);
            $stmt->execute();
            echo "New records created successfully";
            $stmt->close();
        }


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