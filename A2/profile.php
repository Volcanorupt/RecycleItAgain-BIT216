<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>

<body>
<div class="page-header">
	<h1>Profile</h1>
</div>
<?php
require "includes/config.php";
$customers_id=$_SESSION['loggedin']; // Collecting one record with for user
$count=$dbh->prepare("SELECT id, EmpId, Password
		        FROM tblcollectors
				WHERE EmpId = :username");
$count->bindParam(":username",$EmpId,PDO::PARAM_INT,1);

if($count->execute()){
	$row = $count->fetch();
	print_r($row);

	echo "<h3>Username: $_SESSION[username]</h3>";
	echo "Password: $row[Password]";
	echo "Email: $row[EmailId]";
	echo "Schedule: $row[Dob]";
	echo "Address: $row[Address]";
	echo "Points: $row[Points]";
	echo "Registration Date: $row[RegDate]";
}
?>
<br><br><br><br>
<a href="welcome.php" class="btn btn-primary">Home</a>
</body>
</html>