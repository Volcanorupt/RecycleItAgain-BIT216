<?php 
require_once("includes/config.php");
// code for empid availablity
if(!empty($_POST["empcode"])) {
	$empid=$_POST["empcode"];
	
$sql ="SELECT EmpId FROM user WHERE EmpId=:empid";
$query= $dbh->prepare($sql);
$query-> bindParam(':empid',$empid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
echo "<span style='color:red'> Employee id already exists .</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> Employee id available for Registration .</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
}
}

// code for emailid availablity
if(!empty($_POST["username"])) {
$empid= $_POST["username"];
$sql ="SELECT username FROM user WHERE username=:username";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username',$empid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Username already exists .</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> Username available for Registration .</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
}
}




?>
