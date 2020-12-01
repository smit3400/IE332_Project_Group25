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
    
    <h1>Student Profile Setup</h1>
    <p>Welcome! Please enter all relevant information to create your student profile page.</p>
	<!-- creating student profile form-->
	<form action = "welcome.php" method="post">
        <p><strong>Email Address: </strong> <input type = "email" name = "Email" placeholder = "Enter Email Address" Required></p>
        <p><strong>Password: </strong> <input type = "password" name = "Password" placeholder = "Enter Password" Required></p>
        <p><strong>First Name: </strong> <input type = "text" name = "Fname" placeholder = "Enter First Name" Required></p>
        <p><strong>Last Name: </strong> <input type = "text" name = "Lname" placeholder = "Enter Last Name" Required></p>
        <p><strong>Phone Number (area code first): </strong> <input type = "number" name = "Phone_Number" placeholder = "1234567890" Required></p>
        <p><strong>Major:</strong>
        <select type = "text" name="Major">
        <option>FYE</option>
        <option>IE</option>
        </select></p>
        <p><strong>Location Preference: </strong>
        <select type = "text" name = "Location">
                <option>Northeast</option>
                <option>South</option>
                <option>Midwest</option>
                <option>West</option>
        </select></p>
        <p><strong>GPA: </strong> <input type="text" name = "GPA" placeholder="Enter GPA" Required></p>
        <p><strong>Technical Skills (no commas, e.g. python CAD java):</strong> <input type = "text" name = "Experience" placeholder="Enter Technical Skills" Required><p>
        <p><strong>Courses (only relevant to IE and/or FYE,no commas, e.g. IE230 IE343 IE270):</strong> <input type="text" name = "Courses" placeholder="Enter Courses" Required></p>
        <p><strong>Year (1, 2, 3, etc.):</strong> <input type="text" name = "Year" placeholder="Enter Year" Required></p>
        <p><strong>Oportunity Type:</strong>
        <select type = "text" name = "Opportunity_Type">
                <option>internship</option>
                <option>co-op</option>
                <option>full Time</option>
        </select></p>
        <p><strong>Willing to Relocate?</strong>
        <select type = "text" name = "Relocation">
                <option>Yes</option>
                <option>No</option>
        </select></p>
        <p><strong>Will you now or in the future <br>require visa sponsorship for employment?</strong>
        <select type = "text" name = "Work_Sponsorship">
                <option>Yes</option>
                <option>No</option>
        </select></p>
        <p><input type="submit" class = "button1" value="Create Account" /></p>

	</form>

</body>
</html>
