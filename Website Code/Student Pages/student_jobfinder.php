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
  $sql = "SELECT O.*, Weight_Score FROM Match_Score M, Opportunities O WHERE M.Opportunity_ID = O.Opportunity_ID AND M.Email='" . $_SESSION["stud_email"] . "' ORDER BY Weight_Score DESC";
  $result = mysqli_query($data_base,$sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<td>Score</td>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>";
      echo $row["Weight_Score"];
      echo "</td>";
      echo "</tr>";
    }
  } else {
    echo "No result found";
  }
  
  mysqli_close($data_base);
  ?>
  
  <p><a href = "employer_main.php">Main Page</a></p>

</body>
</html>