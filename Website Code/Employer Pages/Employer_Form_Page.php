<!DOCTYPE html>
<html>
<body>

<p></p>
<h1>Employer Profile Setup</h1>
<p>Welcome! Please enter all relevant information to create your Employer profile page.</p>

<form action="Employer_Welcome.php" method="get">
E-mail: <input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
Company: <input type="text" name="company"><br>
Phone Number: <input type="number" name="phone"><br>
Description: <input type="text" name="description"><br>
Industry: 
<select name = "industry">
	<option value="Consulting">Consulting</option>
	<option value="Manufacturing">Manufacturing</option>
	<option value="Healthcare">Healthcare</option>
	<option value="Transportation">Transportation</option>
	<option value="Retail">Retail</option>
	<option value="Finance">Finance</option>
</select><br>
<input type="submit">
</form>

</body>  
</html>