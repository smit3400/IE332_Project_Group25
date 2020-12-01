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
	<!-- form to send employer survey -->
	<h1>Send Employer Survey</h1>
	<form action = "send_employer_email.php" method="get">
        <p><strong>Email Address: </strong><input type = "email" name = "email" placeholder = "Enter email address" Required></p>
		<p><input type="submit" class = "button1" value="Send survey" /></p>
	</form>
  <p><a href="IE_main.php" class = "button1">Main Page</a></p>
</body>
</html>
