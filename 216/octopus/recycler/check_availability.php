<?php 
require_once("includes/config.php");
// code for material availablity
if(!empty($_POST["fullname"])) {
	$fullname=$_POST["fullname"];
	
$sql ="SELECT fullname FROM user WHERE fullname=:fullname";
$query= $dbh->prepare($sql);
$query-> bindParam(':fullname',$fullname, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
echo "<span style='color:red'> Name already exists.</span>";
 echo "<script>$('#change').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> Name available.</span>";
echo "<script>$('#change').prop('disabled',false);</script>";
}
}


?>
