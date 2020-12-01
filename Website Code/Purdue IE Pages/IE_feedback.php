<?php
session_start();
include("new_connection.php");

if ($_SESSION["ad_log"] == 0) {
	header("Location: IE_login.php");
}

?>

<!DOCTYPE html>
<html>

<!-- calling in css external file -->

<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="advisorForm.css" rel="stylesheet" type="text/css" />
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
	<h1>Survey Feedback</h1>
	<h3><p>Student Feedback</p></h3>

  <?php
  //Pulling student info from sql
  $sql = "SELECT Student.Email, Feedback_Text FROM Feedback, Student WHERE Feedback.Email = Student.Email";
  if ($result = mysqli_query($data_base,$sql)) {
      /* free result set */
      echo "<table class = 'center' border = '1'>
      <tr>
      <th>Student Email</th>
      <th>Feedback</th>
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
      #mysqli_free_result($result);
    }
    ?>
	
	<h3><p>Employer Feedback</p></h3>
	
	<?php
  //Pulling employer info from sql
  $sql = "SELECT Employer.Email, Feedback_Text FROM Feedback, Employer WHERE Feedback.Email = Employer.Email";
  if ($result = mysqli_query($data_base,$sql)) {
      #printf("Select returned %d rows. <br><br>", mysqli_num_rows($result));
      /* free result set */
      echo "<table class = 'center' border = '1'>
      <tr>
      <th>Employer Email</th>
      <th>Feedback</th>
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
      #mysqli_free_result($result);
    }
    ?>
<?php
mysqli_close($data_base);
?>
  <p><a href="IE_main.php" class = "button1">Main Page</a></p>

</body>
</html>
