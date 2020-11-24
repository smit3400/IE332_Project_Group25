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
  $sql = "SELECT * FROM Student";
  if ($result = mysqli_query($data_base,$sql)) {
      printf("Select returned %d rows. <br><br>", mysqli_num_rows($result));
      /* free result set */

      echo "<table border = '1'>
      <tr>
      <th>Email</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Major</th>
      <th>Location</th>
      <th>GPA</th>
      <th>Year</th>
      <th>Searching For</th>
      <th>Relocation</th>
      <th>Work Sponsorhsip Required</th>
      <th>Statistics Skill</th>
      <th>Programming Skill</th>
      <th>Technical Design Skill</th>
      </tr>";

      while ($row=mysqli_fetch_array($result))
      {
      	echo "<tr>";

        	echo "<td>" . $row['Email'] . "</td>";
        	echo "<td>" . $row['Fname'] . "</td>";
        	echo "<td>" . $row['Lname'] . "</td>";
        	echo "<td>" . $row['Major'] . "</td>";
          echo "<td>" . $row['Location'] . "</td>";
          echo "<td>" . $row['GPA'] . "</td>";
          echo "<td>" . $row['Year'] . "</td>";
          echo "<td>" . $row['Opportunity_Type'] . "</td>";
          echo "<td>" . $row['Relocation'] . "</td>";
          echo "<td>" . $row['Work_Sponsorship'] . "</td>";
          echo "<td>" . $row['Statistics_Skill'] . "</td>";
          echo "<td>" . $row['Programming_Skill'] . "</td>";
          echo "<td>" . $row['Technical_Design_Skill'] . "</td>";

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