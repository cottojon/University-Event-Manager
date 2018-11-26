
      <?php
      	require('connect.php');

      	$getTableQuery = "SELECT *
      					 FROM ";
        $result = mysqli_query($connect, $getTableQuery);
        
        //table header
        echo '<div class="table-responsive searchTable">';
        echo '<table class="table table-dark table-hover">';
        echo '<thead ><tr> <th>RSO Name</th><th>RSO Type</th><th>RSO Description</th></tr></thead> <tbody>';

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //each table row
            ////place rso ID in a custom html attribute in side table row just in case we need it 
            echo '<tr data-rsoID = "';
            echo $row['rsoID'] ;
            echo '">';
            echo '<td>'; 
            echo $row['rsoName']; 
            echo '</td>';
            echo '<td>'; 
            echo $row['rsoType'] 
            echo '</td>';
            echo '<td>'; 
            echo $row['rsoDescription']; 
            echo '</td></tr>';
        }

        echo '</tbody></table></div>'; //close table body, table, and div
      ?>