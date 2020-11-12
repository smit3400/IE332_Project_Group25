<!DOCTYPE html>
<html>
<body>

<h1>IE Survey Page</h1>
<p>Welcome! Please enter all information to create the survey page.</p>
  
<form action="/action_page.php"
  <label for="img">Upload Survey:</label>
  <input type="file" id="img" name="img" accept="image/*">
  <div>&nbsp;
<div class="form-group"><label for="fname">Student First Name</label> <input id="fname" class="form-control" type="text" placeholder="Enter first name" aria-describedby="fname" />
<div>&nbsp;
  
<div class="form-group"><label for="lname">Student Last Name</label> <input id="lname" class="form-control" type="text" placeholder="Enter last name" aria-describedby="lname" />
<div>&nbsp;
  
<div class="form-group"><label for="gpa">Add Advice </label> <input id="gpa" class="form-control" type="text" placeholder="Enter Advice" />
<div>&nbsp;
<div class="form-group"><label for="studentcourses">Recommended Courses</label> <input id="studentcourses" class="form-control" type="text" placeholder="Enter courses" />
<div>&nbsp;

<div>&nbsp;

<button class="btn btn-primary" type="submit">Submit</button></div>
  
  </form>
</body>
</html>
