<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['userlogin'])==0)
    {   
header('location:index.php');
}
else{

// code for update the read notification status
$isread=1;
$did=intval($_GET['leaveid']);  
date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update submission set IsRead=:isread where id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();

// code for action taken on leave
if(isset($_POST['update']))
{ 
$did=intval($_GET['leaveid']);
$status=$_POST['status'];   
date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update submission set Status=:status,AdminRemarkDate=:admremarkdate where id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="Submission updated Successfully";
}

?>
<!doctype html>
<html class="fixed">
  <head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Collector | Confirm Submissions</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="assets/vendor/morris/morris.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>
 <style>
.errorWrap 
{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
  </head>
  <body>
    <section class="body">

      <!-- start: header -->
      <?php include('includes/header.php');?>
      <!-- end: header -->

      <div class="inner-wrapper">
        <!-- start: sidebar -->
        <?php include('includes/sidebar.php');?>
        <!-- end: sidebar -->

          <!-- start: page -->
          <section role="main" class="content-body">
          <header class="page-header">
            <h2>Submission</h2>
          </header>

          <!-- start: page -->
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <section class="panel">
                  <header class="panel-heading">
                    <h2 class="panel-title">Edit Materials</h2>
                  </header>
                  <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="post">
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong> : <?php echo htmlentities($error); ?> </div><?php } 
                                        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                    
                                      <?php 
                                      $lid=intval($_GET['leaveid']);
                                      $sql = "SELECT submission.id as lid,user.Fullname,user.id,submission.Name,submission.PostingDate,submission.Status,submission.Weights,submission.TotalPoints,submission.AdminRemarkDate from submission join user on submission.uid=user.id where submission.id=:lid";
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
                        <label class="col-md-3 control-label" for="inputRounded">Recycler's Name</label>
                        <div class="col-md-6">
                          <input id="name" type="text"  class="form-control" autocomplete="off" name="name" value="<?php echo htmlentities($result->Fullname);?>"  readonly>
                        </div>
                      </div>
            
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputHelpText">Material</label>
                        <div class="col-md-6">
                          <textarea id="textarea1" name="description" class="form-control" name="description" length="500" readonly><?php echo htmlentities($result->Name);?></textarea>
                        </div>
                      </div>
            
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputHelpText">Submit Date</label>
                        <div class="col-md-6">
                          <textarea id="textarea1" name="description" class="form-control" name="description" length="500" readonly><?php echo htmlentities($result->PostingDate);?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputHelpText">Total Weights</label>
                        <div class="col-md-6">
                          <textarea id="textarea1" name="description" class="form-control" name="description" length="500" readonly><?php echo htmlentities($result->Weights);?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputHelpText">Total Points</label>
                        <div class="col-md-6">
                          <textarea id="textarea1" name="description" class="form-control" name="description" length="500" readonly><?php echo htmlentities($result->TotalPoints);?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputHelpText">Collected Date</label>
                        <div class="col-md-6">
                          <textarea id="textarea1" name="" class="form-control" readonly><?php
                            if($result->AdminRemarkDate==""){
                            echo "Not Collected Yet";  
                            }
                            else{
                            echo htmlentities($result->AdminRemarkDate);
                            }
                            ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputHelpText">Status</label>
                        <div class="col-md-6">
                          <textarea id="textarea1" name="" class="form-control" name="description" ><?php $stats=$result->Status;if($stats==1){?>Approved<?php }if($stats==2)  { ?>Not Approved<?php }if($stats==0)  { ?>waiting for approval<?php } ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputHelpText">Action</label>
                        <div class="col-md-6">
                          <select class="form-control" name="status" data-plugin-multiselect id="ms_example1">
                            <option value="" selected>None Selected</option>
                            <option value="1">Collect</option>
                            <option value="2">Reject</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary" name="update">Confirm</button>
                        </div>
                      </div> <?php } ?>
                     <?php $cnt++;} }?>
                    </form>
                  </div>
                </section> 
              </div>
            </div>    
          <!-- end: page -->
        </section>

    </section>

    <!-- Vendor -->
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Specific Page Vendor -->
    <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
    <script src="assets/vendor/flot/jquery.flot.js"></script>
    <script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
    <script src="assets/vendor/flot/jquery.flot.pie.js"></script>
    <script src="assets/vendor/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendor/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="assets/vendor/raphael/raphael.js"></script>
    <script src="assets/vendor/morris/morris.js"></script>
    <script src="assets/vendor/gauge/gauge.js"></script>
    <script src="assets/vendor/snap-svg/snap.svg.js"></script>
    <script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
    <script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
    <script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
    <script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="assets/javascripts/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="assets/javascripts/theme.custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="assets/javascripts/theme.init.js"></script>


    <!-- Examples -->
    <script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
  </body>
</html>