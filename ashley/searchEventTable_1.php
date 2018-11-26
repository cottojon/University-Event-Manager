<?php
      	require('connect.php');

      	$getTableQuery = "SELECT *
      					 FROM ";
        $result = mysqli_query($connect, $getTableQuery);
        
        //table header
        echo '<div class="table-responsive searchTable">';
        echo '<table class="table table-dark table-hover">';
        echo '<thead ><tr> <th>Event Name</th><th>Event Description</th><th>RSO Hosting</th></tr></thead> <tbody>';

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //each table row
            ////place onclick event for each table row in a custom html attribute in side table row just in case we need it 
            echo '<tr onclick="eventPage.php?eventID='; //make each row clickable and send them to eventPage.php and send eventID as a variable
            echo $row['eventID'] ;
            echo '">';
            echo '<td>'; 
            echo $row['eventName']; 
            echo '</td>';
            echo '<td>'; 
            echo $row['eventDescription'] 
            echo '</td>';
            echo '<td>'; 
            echo $row['rsoName']; 
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody></table></div>'; //close table body, table, and div
      ?>