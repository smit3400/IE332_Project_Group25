<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
  <?php
  //Connecting to database
  $servername = "mydb.itap.purdue.edu";
  $username = "g1116905";
  $password = "iegroup25";
  $dbname = "g1116905";

  $data_base = mysqli_connect($servername, $username, $password, $dbname);

  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }else{
  	echo "Connected Successfully!" . "<br>";
  }

  //Pulling info from sql
  $sql = "SELECT * FROM Feedback";
  if ($result = mysqli_query($data_base,$sql)) {
      printf("Select returned %d rows. <br><br>", mysqli_num_rows($result));
      /* free result set */

      echo "<table border = '1'>
      <tr>
      <th>Email</th>
      <th>Feedback_Text</th>
      </tr>";

      while ($row=mysqli_fetch_array($result))
      {
      	echo "<tr>";

        	echo "<td>" . $row['Email'] . "</td>";
        	echo "<td>" . $row['Feedback_Text'] . "</td>";
        	echo "</tr>";
    	}

      echo "</table>";
      // Free result set
      mysqli_free_result($result);
    }
    mysqli_close($sql);
    ?>
  <p><a href = "IE_main.php">Main Page</a></p>

</body>
</html>