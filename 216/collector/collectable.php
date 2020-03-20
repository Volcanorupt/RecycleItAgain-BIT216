<?php
session_start();
error_reporting(0);
include('includes/config.php');
{
if(isset($_POST['add']))
{
$name=$_POST['name'];
$description=$_POST['description'];
$points=$_POST['points'];
$sql="INSERT INTO tblmaterial(Name,Description,Points) VALUES(:name,:description,:points)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':points',$points,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Material added Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Add Material</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include('includes/navbar.php');?>
        <?php include('includes/leftsidebar.php');?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="offset-xl-3 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="mb-0">Add Material</h4>
                                        </div>
                                        <div class="card-body">
                                            <form class="col s12" name="chngpwd" method="post">
                                                <?php 
                                                    if($error){?>
                                                        <div class="errorWrap"><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                                                    else if($msg){?>
                                                        <div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                                <div class="mb-3">
                                                        <label for="name">Material Name</label>
                                                        <div class="input-group">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required="">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="description" name="description" placeholder="" required="">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="points">Points Per Kg</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="points" name="points" placeholder="" required="">
                                                    </div>
                                                </div>
                                                <hr class="mb-4">
                                                <button class="btn btn-primary btn-lg btn-block" name="add" type="submit">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js-->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js-->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js-->
    <script src="assets/libs/js/main-js.js"></script>
</body>

 
</html>
<?php } ?> 