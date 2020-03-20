<?php include('server.php') ?>
<script>
function checkAvailabilityEmailid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#email-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Register</h2>
  </div>
  <form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Full Name</label>
      <input type="fullname" name="fullname">
    </div>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <label>Address</label>
      <input type="address" name="address">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email">
    </div>
    <div class="input-group">
      <label>Role</label>
      <input type="role" name="role" value="<?php echo $role; ?>">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>

    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>
 
</html>