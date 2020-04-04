<?php 
$uid=$_SESSION['uid'];
$sql = "SELECT Fullname from  user where id=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
<header class="header">
                <div class="logo-container">
                    <div class="logo">
                         <h4><?php echo htmlentities($result->Fullname);?></h4>
                    </div>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
<?php }} ?>