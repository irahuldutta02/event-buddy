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

?>          <div class="card" style="width: 300px;">
                <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80"
                    class="card-img-top" alt="Sample Image">
                <div class="card-body text-center">
                    <h5 class="card-title"> <?php echo $row["event_name"]?> </h5>
                    <p class="card-Organiser"> <?php echo $row["organizer"]?></p>
                    <p class="card-date-time">Start Date & time : [<?php echo $row['event_sdate']; ?>]
                        [<?php echo $row['event_stime']; ?>] </p>
                    <p class="card-date-time">End Date & time : [<?php echo $row['event_edate']; ?>]
                        [<?php echo $row['event_etime']; ?>] </p>
                    <p class="card-Venue">Venue : <?php echo $row["event_venue"]?></p>
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