<?php
$conn=mysqli_connect('localhost','root','','codenair');
if(!$conn){
	echo "Database Error!";
}

$query = "select SUM(Points) as `total` from tblmaterial where id = 1";
$res=mysqli_query($conn, $query);
$data=mysqli_fetch_array($res);

echo "SUM of points: ".$data['total'];