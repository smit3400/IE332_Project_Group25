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
	
<!-- beginning of survey -->

	<h1>Student Survey</h1>
	<p>Welcome! Please complete survey below.</p>

	<form action = "IE_survey_submit.php" method="post">
        <p><strong>Email Address: </strong> <input type = "email" name = "email" placeholder = "Enter email address" Required></p>
        <p><strong>Please provide feedback regarding the following questons:</strong><br><br>
		How well did your Purdue IE education prepare you for your internship/co-op/full time job?<br><br>
		What skills would you have liked to have more of?<br><br>
		Is there anything that the Purdue IE Advising department could improve?<br></p>
		<!-- survey submission, goes to survey submit page -->
		<p><textarea name = "survey_answer" placeholder = "Answer here" Required></textarea></p>
		<p><input type="submit" class = "button1" value="Submit Survey" /></p>
	</form>
</body>
</html>
