<?php
session_start();
error_reporting(0);
include('includes/config.php');
{
if(isset($_POST['update']))
{
$lid=intval($_GET['lid']);
$name=$_POST['name'];
$description=$_POST['description'];
$points=$_POST['points'];
$sql="update tblmaterial set Name=:name,Description=:description,Points=:points where id=:lid";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':points',$points,PDO::PARAM_STR);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$msg="Material updated Successfully";
}
?>
<html>
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Material</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="admin.php"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span class="splash-description"><b>Change input below to edit material information</b></span></div>
            <div class="card-body">
                <form method="POST" action="">
                    <?php 
                        if($error){?><div class="errorWrap"><strong>ERROR</strong> : <?php echo htmlentities($error); 
                    ?> </div>
                    <?php } 
                        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div>
                    <?php }
                    ?>
                    <?php
                        $lid=intval($_GET['lid']);
                        $sql = "SELECT * from tblmaterial where id=:lid";
                        $query = $dbh -> prepare($sql);
                        $query->bindParam(':lid',$lid,PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {               
                    ?>  
                    <div class="form-group">
                        <label for="name">Material Name</label>
                        <input class="form-control form-control-lg" id="name" type="text" name="name" value="<?php echo htmlentities($result->Name);?>" placeholder="New Material Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input class="form-control form-control-lg" id="description" type="text" name="description" value="<?php echo htmlentities($result->Description);?>" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <label for="name">Points per Kg</label>
                        <input class="form-control form-control-lg" id="points" type="text" name="points" value="<?php echo htmlentities($result->Points);?>" placeholder="Points per kg">
                    </div>
                    <?php }} ?>
                    <button type="submit" name="update" value="Update" class="btn btn-primary btn-lg btn-block">Update</button>
                    <a href="admin.php" class="btn btn-primary btn-lg btn-block">Back</a>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>
<?php } ?> 