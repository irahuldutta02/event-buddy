<?php 
session_start();
include "db_conn.php";
  $event_id =$_GET['event_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <style>


        body{

            background-image: linear-gradient(225deg, #111e69, #f6b1a9);
        }
        embed{
            border: 2px solid black;
            margin-top: 30px;
           
        }
        .div1{
            margin-left:400px;
            /* margin: auto; */
        }
    </style>
</head>
<body>
    <div class="div1">
        <?php
        $event_id =$_GET['event_id'];
        

        $sql="SELECT event_broc FROM admins WHERE event_id='{$event_id}'" ;
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            ?> 
             <embed type="application/pdf" src="pdf/<?php echo $row['event_broc'];?>" height="1000px" width="1000px">


    <?php
        }

        ?>
    </div>
</body>
</html>