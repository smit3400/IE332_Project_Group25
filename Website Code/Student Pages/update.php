<?php
session_start();
include("new_connection.php");

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

$sql = "UPDATE Student SET Email = '" .$stud_email. "', Password = '" .$stud_password. "', Fname = '" .$stud_fname. "', Lname = '" .$stud_lname. "', Phone_Number = '" .$stud_phone. "', Major = '" .$stud_major. "', Location = '" .$stud_location. "', GPA = '" .$stud_GPA. "', Experience = '" .$stud_experience. "', Courses = '" .$stud_courses. "', Year = '" .$stud_year. "', Opportunity_Type = '" .$stud_opp. "', Relocation = '" .$stud_relocation. "', Work_Sponsorship = '" .$stud_sponsorship. "' WHERE Email = '" . $_SESSION["stud_email"] . "'";

if (mysqli_query($data_base,$sql)) {
    echo "Account updated succesfully";
    header("Location: student_main.php");

    $_SESSION["stud_email"] = $_POST["Email"];
} else {
    echo "Something is wrong";
}

mysqli_close($data_base);
?>