<!DOCTYPE html>
<html>
<body>
<h1>Employer Profile Setup</h1>
<p>Welcome! Please enter all relevant information to create your Employer profile page.</p>
<form action="employer_form_submit.php" method="get">
E-mail: <input type="text" name="email"><br>
  <div>
  </div>
Password: <input type="password" name="password"><br>
    <div>
  </div>
Company: <input type="text" name="company"><br>
    <div>
  </div>
Phone Number: <input type="number" name="phone"><br>
    <div>
  </div>
Description: <input type="text" name="description"><br>
    <div>
  </div>
Industry:  
<select name = "industry">
	<option value="Consulting">Consulting</option>
	<option value="Manufacturing">Manufacturing</option>
	<option value="Healthcare">Healthcare</option>
	<option value="Transportation">Transportation</option>
	<option value="Retail">Retail</option>
	<option value="Finance">Finance</option>
</select><br>
    <div>
  </div>
<input type="submit">
</form>
</body>  
</html>
