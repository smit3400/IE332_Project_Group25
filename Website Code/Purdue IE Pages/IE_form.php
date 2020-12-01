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
    
    <h1>IE Advisor Profile Setup</h1>
    <p>Welcome! Please enter all relevant information to create your IE Advisor profile page.</p>
	<!-- Form for IE advisor profile -->
	<form action = "IE_form_submit.php" method="post">
        <p><strong>First Name: </strong> <input type = "text" name = "fname" placeholder = "Enter first name" Required></p>
        <p><strong>Last Name: </strong> <input type = "text" name = "lname" placeholder = "Enter last name" Required></p>
		<p><strong>Email Address: </strong> <input type = "email" name = "email" placeholder = "Enter email address" Required></p>
        <p><strong>Password: </strong> <input type = "password" name = "password" placeholder = "Enter password" Required></p>
		<p><input type="submit" class = "button1" value="Create Account" /></p>
	</form>
</body>
</html>
