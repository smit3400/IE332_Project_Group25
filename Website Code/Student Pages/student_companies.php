<?php
session_start();
//including database connection
include("new_connection.php");

//does not allow student to use back button after logging out
if ($_SESSION["log"] == 0) {
	header("Location:  student_login.php");
}

?>

<!DOCTYPE html>
<html>

<!-- importing css with external file-->
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
	<h1>Company Ratings</h1>
	<p>Table of company ratings based on previous students' feedback.</p>
	<p>Click on the company name to view the company profile and leave a review!</p>
<table class = "center" border="1">

<?php

//selecting ratings from ratings table for specific employer chosen
$sql = "SELECT E.*, AVG(Overall_Rating), AVG(Management_Rating), AVG(Culture_Rating), AVG(Diversity_Rating) FROM Employer E, Company_Rating C WHERE C.Employer_Email = E.Email GROUP BY Employer_Email";
$result = mysqli_query($data_base,$sql);

//displaying ratings in table form
if (mysqli_num_rows($result) > 0) {
    echo "<tr>
    <th>Company Name</th>
    <th>Industry</th>
    <th>Overall Rating</th>
    <th>Management Rating</th>
    <th>Culture Rating</th>
    <th>Diversity Rating</th>
    </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo '<td> <a href="company.php?company=' . $row["Company_Name"] . '">' . $row["Company_Name"] . "</a></td>";
        echo "<td>" . $row["Industry"] . "</td>
        <td>" . round($row["AVG(Overall_Rating)"],1) . "</td>
        <td>" . round($row["AVG(Management_Rating)"],1) . "</td>
        <td>" . round($row["AVG(Culture_Rating)"],1) . "</td>
        <td>" . round($row["AVG(Diversity_Rating)"],1) . "</td>
        </tr>";
    }
}
?>

</table>

<?php
mysqli_close($data_base);
?>

<p><a href = "student_main.php" class = "button1">Main Page</a></p>

</body>
</html>
