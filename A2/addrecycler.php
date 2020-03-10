<?php
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

error_reporting(0);
include('includes/config.php');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ecosave');
if(isset($_POST['add']))
{
$rid=$_POST['rcode'];
$fname=$_POST['firstName'];
$email=$_POST['email']; 
$password=$_POST['password']; 
$dob=$_POST['dob']; 
$address=$_POST['address']; 
$points=1;

$sql="INSERT INTO tblrecyclers(RId,FirstName,EmailId,Password,Dob,Address,Points) 
VALUES(:rid,:fname,:email,:password,:dob,:address,:points)";
$query = $dbh->prepare($sql);
$query->bindParam(':rid',$param_rid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$param_password,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':points',$points,PDO::PARAM_STR);

$param_rid = $rid;
$param_password = password_hash($password, PASSWORD_DEFAULT);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	$msg="Recycler record added Successfully";
}
else 
{
	$error="Something went wrong. Please try again";
}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Add Recycler</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
			body{ font: 14px sans-serif; }
			.wrapper{ width: 350px; padding: 20px; }
		</style>
    <script type="text/javascript">
function valid()
{
if(document.addr.password.value!= document.addr.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match!");
document.addr.confirmpassword.focus();
return false;
}
return true;
}
</script>

<script>
function checkAvailabilityRid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'rcode='+$("#rcode").val(),
type: "POST",
success:function(data){
$("#rid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function checkAvailabilityEmailid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#emailid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>



    </head>
    <body>
		<div class="wrapper">
            <h2>Add Recycler</h2>
                <form id="example-form" method="post" name="addr">
                    <div>
						<br><br>
							<section>
    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
	
	<br>

<div class="form-group">
<label for="rcode">Username</label>
<input name="rcode" id="rcode" onBlur="checkAvailabilityrid()" type="text" class="form-control" autocomplete="off" required>
<span id="rid-availability" style="font-size:12px;"></span> 
</div>


<div class="form-group">
<label for="firstName">Full name</label>
<input id="firstName" name="firstName" type="text" class="form-control" required>
</div>

<div class="form-group">
<label for="email">Email</label>
<input name="email" type="email" id="email" onBlur="checkAvailabilityEmailid()" class="form-control" autocomplete="off" required>
<span id="emailid-availability" style="font-size:12px;"></span> 
</div>

<div class="form-group">
<label for="password">Password</label>
<input id="password" name="password" type="password" class="form-control" autocomplete="off" required>
</div>

<div class="form-group">
<label for="confirm">Confirm Password</label>
<input id="confirm" name="confirmpassword" type="password" class="form-control" autocomplete="off" required>
</div>

<div class="form-group">
<label for="birthdate">Schedule</label>
<input id="birthdate" name="dob" type="date" class="form-control" autocomplete="off" >
</div>

<div class="form-group">
<label for="address">Address</label>
<input id="address" name="address" type="text" class="form-control" autocomplete="off" required>
</div>
                                                    
<div class="form-group">
<button type="submit" name="add" onclick="return valid();" id="add" class="btn btn-primary">ADD</button>
</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        
    </body>
</html>