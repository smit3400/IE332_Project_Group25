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
  $sql = "SELECT * FROM Opportunities WHERE Email='" . $_SESSION["email"] . "'";
  if ($result = mysqli_query($data_base,$sql)) {
      printf("Select returned %d rows. <br><br>", mysqli_num_rows($result));
      /* free result set */

      echo "<table border = '1'>
      <tr>
      <th>Email</th>
      <th>Job Title</th>
      <th>Job Description</th>
      <th>Opportunity Type</th>
      <th>Min GPA</th>
      <th>Min Year</th>
      <th>Required Major</th>
      <th>Location</th>
      <th>Work Sponsorship</th>
      <th>Skill</th>
      </tr>";

      while ($row=mysqli_fetch_array($result))
      {
      	echo "<tr>";

        	echo "<td>" . $row['Email'] . "</td>";
        	echo "<td>" . $row['Job_Title'] . "</td>";
        	echo "<td>" . $row['Job_Description'] . "</td>";
        	echo "<td>" . $row['Opportunity_Type'] . "</td>";
          echo "<td>" . $row['Min_GPA'] . "</td>";
          echo "<td>" . $row['Min_Year'] . "</td>";
          echo "<td>" . $row['Required_Major'] . "</td>";
          echo "<td>" . $row['Location'] . "</td>";
          echo "<td>" . $row['Work_Sponsorship'] . "</td>";
          echo "<td>" . $row['Skill'] . "</td>";

        	echo "</tr>";
    	}

      echo "</table>";
      // Free result set
      mysqli_free_result($result);
    }
    mysqli_close($sql);
    ?>
  <p><a href = "employer_main.php">Main Page</a></p>

</body>
</html>