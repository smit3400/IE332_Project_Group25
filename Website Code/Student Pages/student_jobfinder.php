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
  $sql = "SELECT O.*, Weight_Score, Company_Name FROM Match_Score M, Opportunities O, Employer WHERE M.Opportunity_ID = O.Opportunity_ID AND M.Email='" . $_SESSION["stud_email"] . "' ORDER BY Weight_Score DESC";
  $result = mysqli_query($data_base,$sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table border = '1'>
    <tr>
    <th>Opportunity ID</th>
    <th>Company Name</th>
    <th>Job Title</th>
    <th>Opportunity Type</th>
    <th>Job Description</th>
    <th>Matching Score</th>
    </tr>
    ";
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row["Opportunity_ID"] . "</td>";
      echo "<td>" . $row["Company_Name"] . "</td>";
      echo "<td>" . $row["Job_Title"] . "</td>";
      echo "<td>" . $row["Opportunity_Type"] . "</td>";
      echo "<td>" . $row["Job_Description"] . "</td>";
      echo "<td>" . $row["Weight_Score"] . "</td>";
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
