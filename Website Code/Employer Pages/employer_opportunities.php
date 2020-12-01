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
	<h1>Job Postings</h1>
	<p>Table of Current Job Postings.</p>
	<p>Click on job posting title to see the most qualified students!</p>
	
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

  //Pulling info from sql
  $sql = "SELECT * FROM Opportunities WHERE Email='" . $_SESSION["email"] . "'";
  if ($result = mysqli_query($data_base,$sql)) {

      //Creating table header
      echo "<table class = 'center' border = '1'>
      <tr>
      <th>Job ID</th>
      <th>Job Title</th>
      <th>Job Description</th>
      <th>Job Type</th>
      <th>Min GPA</th>
      <th>Min Year</th>
      <th>Required Major</th>
      <th>Location</th>
      <th>Work Sponsorship</th>
      <th>Skill</th>
      </tr>";

      //Displaying columns from sql table
      while ($row=mysqli_fetch_array($result))
      {
      	echo "<tr>";

        	echo "<td>" . $row['Opportunity_ID'] . "</td>";
        	echo '<td> <a href="employer_opportunities_students.php?id=' . $row["Opportunity_ID"] . '">' . $row["Job_Title"] . "</a></td>";
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

      //End of table
      echo "</table>";
      
      // Free result set
      mysqli_free_result($result);
    }
	
	$filename3 = "employerPlot".rand(1,50);

	shell_exec("Rscript /home/campus/g1116905/www/main/Project_R/matchPlotsEmployers.R $filename3");
	
    mysqli_close($data_base);
    ?>
<br>
<br>
    <?php

    exec("Rscript /home/campus/g1116905/www/main/Project_R/machineLearning.R",$output);

    $json = $output[0];
    $var = json_decode($json);

    $array = json_decode(json_encode($var), true);
    $array_count = count($array);
    $names = array_keys($array);
    ?>

    <br>
    <p>Possible job postings and predicted score.</p>
    
    <table class='center' border = 1>
        <tr>
        <th>Opportunity Type</th>
        <th>Minimum GPA</th>
        <th>Minimum Year</th>
        <th>Required Major</th>
        <th>Location</th>
        <th>Work Sponsorship</th>
        <th>Skill</th>
        <th>Predicted Score</th>
        </tr>
        <?php
        for ($i = 0; $i < $array_count; $i+=1)
        {
            echo "<tr>
            <td>" . $array[$names[0]][$i] . "</td>
            <td>" . $array[$names[1]][$i] . "</td>
            <td>" . $array[$names[2]][$i] . "</td>
            <td>" . $array[$names[3]][$i] . "</td>
            <td>" . $array[$names[4]][$i] . "</td>
            <td>" . $array[$names[5]][$i] . "</td>
            <td>" . $array[$names[6]][$i] . "</td>
            <td>" . $array[$names[7]][$i] . "</td>
            </tr>";
        }
        ?>
    </table>
	
	<h3><p>Employer Statistics</p></h3>
	<p><img src="https://web.ics.purdue.edu/~g1116905/main/Project_R/plots/<?php echo $filename3;?>.png" /></p>

  <p><a href = "employer_main.php" class = "button1" >Main Page</a></p>

</body>
</html>
