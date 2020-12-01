<!DOCTYPE html>
<html>
<!-- CSS Connection -->
<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="employerForm.css" rel="stylesheet" type="text/css" />
</head>

<!-- Website header -->
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
    
    <h1>Employer Profile Setup</h1>
    <p>Welcome! Please enter all relevant information to create your employer profile page.</p>

<!-- Employer Form Input -->
	<form action = "employer_form_submit.php" method="post">
        <p><strong>Email Address: </strong> <input type = "email" name = "email" placeholder = "Enter email address" Required></p>
        <p><strong>Password: </strong> <input type = "password" name = "password" placeholder = "Enter password" Required></p>
        <p><strong>Company: </strong> <input type = "text" name = "company" placeholder = "Enter company name" Required></p>
        <p><strong>Phone Number (area code first): </strong> <input type = "number" name = "phone" placeholder = "1234567890" Required></p>
		<p><strong>Company Description: </strong> <input type = "text" name = "description" placeholder = "Enter company description" Required></p>
        <p><strong>Industry: </strong>
        <select type = "text" name="industry">
			<option value="Consulting">Consulting</option>
			<option value="Manufacturing">Manufacturing</option>
			<option value="Healthcare">Healthcare</option>
			<option value="Transportation">Transportation</option>
			<option value="Retail">Retail</option>
			<option value="Finance">Finance</option>
        </select></p>
        <p><input type="submit" class = "button1" value="Create Account" /></p>

	</form>
</body>
</html>
