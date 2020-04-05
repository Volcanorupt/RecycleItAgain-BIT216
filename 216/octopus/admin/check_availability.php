<?php 
require_once("includes/config.php");
// code for material availablity
if(!empty($_POST["name"])) {
	$name=$_POST["name"];
	
$sql ="SELECT name FROM material WHERE name=:name";
$query= $dbh->prepare($sql);
$query-> bindParam(':name',$name, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
echo "<span style='color:red'> Material already exists.</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> Material available to be added.</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
}
}


?>
