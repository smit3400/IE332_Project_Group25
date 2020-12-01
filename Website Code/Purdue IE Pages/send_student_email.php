<?php
session_start();
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
	
	<h1>Survey sent successfully!</h1>
	
	<p><a href="IE_main.php" class = "button1">Main Page</a></p>
</body>
</html>


<?php
// email information/code help retrieved from https://www.w3schools.com/php/func_mail_mail.asp

// message with survey link for students
$msg = "Greetings student,\nPlease complete the survey below:\nhttps://web.ics.purdue.edu/~g1116905/main/advisor/IE_student_survey.php";

$email = $_GET['email'];

// wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email to student email
mail($email,"IE Connect Survey",$msg);
?>
