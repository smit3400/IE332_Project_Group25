<?php
session_start();

if ($_SESSION["emp_log"] == 0) {
	header("Location:  employer_login.php");
}

//Connecting to database
$servername = "mydb.itap.purdue.edu";
$username = "g1116905";
$password = "iegroup25";
$dbname = "g1116905";

$data_base = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>

<!DOCTYPE html>
<html>
<!-- CSS Connection -->
<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="employerForm.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- Website header -->
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
    
    <h1>Employer Profile Update</h1>
    <p>Welcome! Please enter all relevant information to update your employer profile page.</p>
    
	<?php
    //SQL query of Employer info from user email
    $query = "SELECT * FROM Employer WHERE Email='" . $_SESSION["email"] . "'";
    $result = mysqli_query($data_base,$query);
    if (mysqli_num_rows($result) > 0) {
    ?>

    <!-- Form for employer profile with variables filled -->
    <form action = "employer_update_submit.php" method="post">
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <p><strong>Email Address:</strong> <input type = "email" name = "email" value = "<?php echo $row["Email"]; ?>" Required></p>
        <p><strong>Password:</strong> <input type = "password" name = "password" value = "<?php echo $row["Password"]; ?>" Required></p>
        <p><strong>Company:</strong> <input type = "text" name = "company" value = "<?php echo $row["Company_Name"]; ?>" Required></p>
        <p><strong>Phone Number (area code first):</strong> <input type = "number" name = "phone" value = "<?php echo $row["Phone_Number"]; ?>" Required></p>
        <p><strong>Company Description</strong> <input type = "text" name = "description" value = "<?php echo $row["Description"]; ?>"Required></p>
        <p><strong>Industry:</strong>
        <select type = "text" name="industry" value = "<?php echo $row["Industry"]; ?>">
            <option <?php if ($row["Industry"] == "Consulting") {echo "selected";} ?>>Consulting</option>
            <option <?php if ($row["Industry"] == "Manufacturing") {echo "selected";} ?>>Manufacturing</option>
            <option <?php if ($row["Industry"] == "Healthcare") {echo "selected";} ?>>Healthcare</option>
            <option <?php if ($row["Industry"] == "Transportation") {echo "selected";} ?>>Transportation</option>
            <option <?php if ($row["Industry"] == "Retail") {echo "selected";} ?>>Retail</option>
            <option <?php if ($row["Industry"] == "Finance") {echo "selected";} ?>>Finance</option>
        </select></p>
        <p><input type="submit" class = "button1" value="Update Account" /></p>

    </form>
    <?php
        }
    }

    //Closing database connection
    mysqli_close($data_base);
    ?>
	
	<p><a href="employer_main.php" class = "button1">Main Page</a></p>
</body>
</html>
