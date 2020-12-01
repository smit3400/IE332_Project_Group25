<?php
session_start();
include("new_connection.php");

//does not allow use of back arrow after logging out
if ($_SESSION["log"] == 0) {
	header("Location:  student_login.php");
}
//if there is no email, return to main
if ($_POST["Email"] == "") {
	header("Location:  student_main.php");
}

?>

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
	<h1>Welcome <?php echo $_POST["Fname"]; ?></h1>
	<p>Your email address is: <?php echo $_POST["Email"]; ?></p>

<?php
//pulling values from student_update form 
$stud_email = $_POST['Email'];
$stud_password = $_POST['Password'];
$stud_fname = $_POST['Fname'];
$stud_lname = $_POST['Lname'];
$stud_phone = $_POST['Phone_Number'];
$stud_major = $_POST['Major'];
$stud_location = $_POST['Location'];
$stud_GPA = $_POST['GPA'];
$stud_experience = $_POST['Experience'];
$stud_courses = $_POST['Courses'];
$stud_year = $_POST['Year'];
$stud_opp = $_POST['Opportunity_Type'];
$stud_relocation = $_POST['Relocation'];
$stud_sponsorship = $_POST['Work_Sponsorship'];

//updating database with new values from student update form
$sql = "UPDATE Student SET Email = '" .$stud_email. "', Password = '" .$stud_password. "', Fname = '" .$stud_fname. "', Lname = '" .$stud_lname. "', Phone_Number = '" .$stud_phone. "', Major = '" .$stud_major. "', Location = '" .$stud_location. "', GPA = '" .$stud_GPA. "', Experience = '" .$stud_experience. "', Courses = '" .$stud_courses. "', Year = '" .$stud_year. "', Opportunity_Type = '" .$stud_opp. "', Relocation = '" .$stud_relocation. "', Work_Sponsorship = '" .$stud_sponsorship. "' WHERE Email = '" . $_SESSION["stud_email"] . "'";

if (mysqli_query($data_base,$sql)) {
    echo "<p>Account updated succesfully!</p>";
    shell_exec("Rscript /home/campus/g1116905/www/main/Project_R/matchingInputs.R");
    header("Location: student_main.php");
    
    $_SESSION["stud_email"] = $_POST["Email"];
} else {
    echo "Something is wrong";
}

mysqli_close($data_base);
?>

<p><a href = "student_main.php" class = "button1" >Main Page</a></p>

</body>
</html>
