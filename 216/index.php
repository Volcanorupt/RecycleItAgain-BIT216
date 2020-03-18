<?php
session_start();
error_reporting(0);
$conn=mysqli_connect('localhost','root','','codenair');
//Getting Input value
if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password = md5($_REQUEST['password']); 
  if(empty($username)&&empty($password)){
  $error= 'Fileds are Mandatory';
  }else{
 //Checking Login Detail
 $result=mysqli_query($conn,"SELECT*FROM user WHERE username='$username' AND password='$password'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);
 if($count==1){
      $_SESSION['user']=array(
   'username'=>$row['username'],
   'password'=>$row['password'],
   'role'=>$row['role']
   );
   $role=$_SESSION['user']['role'];
   //Redirecting User Based on Role
    switch($role){
  case 'user':
  $_SESSION['userlogin']=$_POST['username'];
  header('location:changepassword.php');
  break;
  case 'recycler':
  header('location:recycler.php');
  break;
  case 'admin':
  header('location:admin.php');
  break;
 }
 }else{
 $error='Your username or password is incorrect';
 }
}
}
?>
<html>
<head>
<title>Recycler It Again System</title>
</head>
<div align="center">
<h3>Recycler It Again System</h3>
<form method="POST" action="">
<table>
   <tr>
     <td>UserName:</td>
  <td><input type="text" name="username"/></td>
   </tr>
   <tr>
     <td>PassWord:</td>
  <td><input type="text" name="password"/></td>
   </tr>
   <tr>
     <td></td>
  <td><input type="submit" name="login" value="Login"/></td>
   </tr>
</table>
</form>
<?php if(isset($error)){ echo $error; }?>
</div>
</html>