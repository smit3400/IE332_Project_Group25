<?php
session_start();
 
if ($_SESSION["ad_log"] == 0) {
	header("Location: IE_login.php");
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

<!-- calling in css external file-->

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
    
    <h1>IE Advisor Profile Update</h1>
    <p>Welcome! Please enter all relevant information to update your IE advisor profile page.</p>
    
	<?php
	
	//selecting the data from specific advisor's row
    $query = "SELECT * FROM Purdue_IE WHERE Email='" . $_SESSION["email"] . "'";
    $result = mysqli_query($data_base,$query);
    if (mysqli_num_rows($result) > 0) {
    ?>
    
    <form action = "IE_update_submit.php" method="post">
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
		
		<!-- allowing IE advisor to change their information and be sent to update_submit file -->
        <p><strong>Email Address:</strong> <input type = "email" name = "email" value = "<?php echo $row["Email"]; ?>" Required></p>
        <p><strong>Password:</strong> <input type = "password" name = "password" value = "<?php echo $row["Password"]; ?>" Required></p>
        <p><strong>First Name:</strong> <input type = "text" name = "firstname" value = "<?php echo $row["Fname"]; ?>" Required></p>
        <p><strong>Last Name:</strong> <input type = "text" name = "lastname" value = "<?php echo $row["Lname"]; ?>" Required></p>
        <p><input type="submit" class = "button1" value="Update Account" /></p>
    </form>
    <?php
        }
    }  
    mysqli_close($data_base);
    ?>
	
	<p><a href="IE_main.php" class = "button1">Main Page</a></p>
</body>
</html>
