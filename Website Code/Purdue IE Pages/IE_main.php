<?php
session_start();

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
	
	<!-- links to all IE pages from main -->
	
	<h1>IE Advisor Main Page</h1>
	<p><a href = "IE_profile.php" class = "button1">Profile Page</a></p>
	<p><a href = "IE_survey_choice.php" class = "button1">Student/Employer Survey</a></p>
	<p><a href = "IE_feedback.php" class = "button1">Feedback</a></p>
	<p><a href = "IE_statistics.php" class = "button1">Graphs and statistics</a></p>
	<p><a href = "IE_logout.php" class = "button1">Logout</a></p>
	<br>
	<p><i>Thank you for using IE Connect!</i></p>
</body>
</html>
