<?php
session_start();

//does not allow student to use back arrow after logging out
if ($_SESSION["log"] == 0) {
	header("Location:  student_login.php");
}

?>
<!DOCTYPE html>
<html>
<!-- importing css from external file-->
<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="studentForm.css" rel="stylesheet" type="text/css" />
</head>
<body>
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
	<h1>Job Finder</h1>
	<p>Table of Current Job Postings and your corresponding match score.</p>
	<p>Click on the job ID to see the posting, or click on the company name to see its description!</p>
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

  //Pulling company job info from sql
  $sql = "SELECT O.*, M.Weight_Score, E.Company_Name FROM Match_Score M, Opportunities O, Employer E WHERE M.Opportunity_ID = O.Opportunity_ID AND M.Email='" . $_SESSION["stud_email"] . "' AND O.Email = E.Email ORDER BY Weight_Score DESC";
  $result = mysqli_query($data_base,$sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table class = 'center' border = '1'>
    <tr>
    <th>Job ID</th>
    <th>Company Name</th>
    <th>Job Title</th>
    <th>Job Type</th>
    <th>Job Description</th>
    <th>Matching Score</th>
    </tr>
    ";
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo '<td> <a href="opportunity.php?id=' . $row["Opportunity_ID"] . '">' . $row["Opportunity_ID"] . "</td>";
      echo '<td> <a href="company.php?company=' . $row["Company_Name"] . '">' . $row["Company_Name"] . "</td>";
      echo "<td>" . $row["Job_Title"] . "</td>";
      echo "<td>" . $row["Opportunity_Type"] . "</td>";
      echo "<td>" . $row["Job_Description"] . "</td>";
      echo "<td>" . $row["Weight_Score"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "No result found";
  }
  echo "</table>";
  mysqli_close($data_base);
  ?>
<p><a href = "student_main.php" class = "button1">Main Page</a></p>

</body>
</html>
