<?php
session_start();

if ($_SESSION["emp_log"] == 0) {
	header("Location:  employer_login.php");
}

?>

<!DOCTYPE html>
<html>

<!-- CSS Connection -->
<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="employerForm.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <!-- Website header -->
	<header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://www.cco.purdue.edu/Content/Layout/logo.svg" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">IE Connect</p>
          <p class="title">Simplifying the recruiting process</p>
        </div>
      </div>
      <img class="banner1" src="https://cdn.shopify.com/s/files/1/0241/9737/products/1008-PUR-Tank-black_2_1800x.jpg?v=1571442802" style= "width:100px">
    </header>
	<h1>Students</h1>
	<p>Table of best students for this job:</p>
	
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
  }

  $Opportunity_ID = $_GET["id"];

  //Pulling info from sql
  $sql = "SELECT * FROM Student JOIN Match_Score ON  Student.Email = Match_Score.Email WHERE Opportunity_ID = '" . $Opportunity_ID . "' ORDER BY Match_Score DESC, Weight_Score DESC";
  if ($result = mysqli_query($data_base,$sql)) {
      
      //Create table headers
      echo "<table class = 'center' border = '1'>
      <tr>
      <th>Match Score</th>
      <th>Weight Score</th>
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

      //Columns of data from SQL table
      while ($row=mysqli_fetch_array($result))
      {
      	 echo "<tr>";
            echo "<td>" . $row['Match_Score'] . "</td>";
            echo "<td>" . $row['Weight_Score'] . "</td>";
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

      //End of table
      echo "</table>";
      
      // Free result set
      mysqli_free_result($result);
    }

    //Closing connection
    mysqli_close($data_base);
    ?>
  <p><a href = "employer_opportunities.php" class = "button1">Back to Job Table</a><a href = "employer_main.php" class = "button1" >Main Page</a></p>

</body>
</html>
